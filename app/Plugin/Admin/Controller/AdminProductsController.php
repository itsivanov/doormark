<?php
App::uses('AdminAppController', 'Admin.Controller');
/**
 *@property Product $Product
 * @property ProductImage $ProductImage
 * @property Laminate $Laminate
 * @property LaminateCategory $LaminateCategory
 * @property ProductLaminate $ProductLaminate
 */

class AdminProductsController extends AdminAppController
{
    public $uses = ['Product','ProductImage','Laminate','LaminateCategory', 'ProductLaminate'];
    public $hasOne = 'ProductRental';
    const ACTIVE = 1;
    const INACTIVE = 0;

    public $hasAndBelongsToMany = array(
        'ProductRental',
    );


    public function index()
    {
        $this->setActiveMenu(array('products'));

        $list = $this->Product->find('all');
        $this->set([
            'listProduct' => $list
        ]);
    }

    /**
     *   Product adding to rent
     *
     */

    public function add()
    {
        $category = $this->Category->find('all');

        if ($this->request->is('post')){
            $this->Product->saveAll($this->request->data);
            $lastId = $this->Product->getLastInsertId();
            $productImg = $this->ProductImage->insactionData($this->request->data['ProductImage'], $lastId);
            $this->ProductImage->saveAll($productImg);
            $this->ProductLaminate->mainSave($this->request->data);
            $this->setFlash('Save product', 'success');
            $this->redirect(['action' => 'index']);
        }

        $palette =$this->Laminate->find('all');

        $this->set(compact('category','palette'));
    }

    public function edit()
    {
        $id = $this->request->id;
        if ($this->request->data){
            $this->Product->save($this->request->data['Product']);
            $this->ProductImage->saveAll($this->request->data['ProductImage']);
            $this->ProductLaminate->mainSave($this->request->data);
            $this->setFlash('Save product', 'success');
            $this->redirect(['action' => 'index']);
        }

        $laminateCheck = $this->Laminate->getItem($id);
        $category = $this->Category->find('all');
        $productImg = $this->ProductImage->find('all',['conditions'=> ['product_id' => $id]]);
        $this->set([
            'productInfo' => $this->Product->getProduct($id),
            'category'    => $category,
            'productImg'  => $productImg,
            'palette'     => $this->Laminate->find('all'),
            'lamCheck'    => $laminateCheck
        ]);
    }

    public function activate ()
    {
        $this->Product->id = $this->request->id;
        $page = $this->Product->read('active');
        if ($page['Product']['active'] == self::ACTIVE) {
            $this->Product->saveField('active', self::INACTIVE);
            $this->setFlash('Sales is blocked', 'success');
        } else {
            $this->Product->saveField('active', self::ACTIVE);
            $this->setFlash('Sales is active', 'success');
        }

        $this->redirect(['action' => 'index']);
    }

    public function del()
    {
        $this->Product->delete($this->request->id);
        $this->setFlash('Remove done', 'success');
        $this->redirect(['action' => 'index']);
    }






}