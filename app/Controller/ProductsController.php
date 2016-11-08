<?php

App::uses('AppController', 'Controller');

define('PRODUCT_MAIN_PAGINATE', 6);

/**
 * Products Controller
 *
 * @property Category $Category
 * @property Product $Product
 * @property ProductImage $ProductImage
 * @property Laminate $Laminate
 * @property LaminateCategory $LaminateCategory
 * @property ProductLaminate $ProductLaminate
 *
 */
class ProductsController extends AppController
{

    public $uses = [
        'Product',
        'ProductImage',
        'Laminate',
        'LaminateCategory',
        'ProductLaminate'
    ];



    public function beforeFilter()
    {
        parent::beforeFilter();
    }


    public function index()
    {
        $id = $this->request->id;
        $categoryItem = $this->Category->find('first', ['conditions'=> ['id'=> $id ]]);
        $parentMenus = $this->Category->getParent();
        $category = $this->Category->getChild();
        $products = $this->Product->find('all', ['conditions'=> ['category_id'=> $id ]]);
        $productsAll = $this->Product->find('all');

        $this->set(compact('parentMenus', 'category', 'categoryItem', 'products', 'productsAll'));
    }

    public function view()
    {
        $id = $this->request->id;
        $product = $this->Product->find('first', ['conditions'=> ['id'=> $id]]);
        $advice = $this->Product->find('all', ['conditions'=> ['id !='=> $id, 'category_id' => $product['Product']['category_id'] ]]);
        $images = $this->ProductImage->getImagesOnId($id);
        $palette = $this->Laminate->getItem($id);
        $categoryLam = $this->LaminateCategory->find('all');
        $this->set(compact('product', 'images', 'advice','palette','categoryLam' ));

    }
}

