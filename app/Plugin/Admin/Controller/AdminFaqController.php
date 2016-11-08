<?php
App::uses('AdminAppController', 'Admin.Controller');
/**
 *@property Faq $Faq
 * @property  ProductRental $ProductRental
 */

class AdminFaqController extends AdminAppController
{

    const ACTIVE = 1;
    const INACTIVE = 0;

    public $uses = [
        'Faq',
        'FaqBlock'
    ];


    public function index()
    {
        $_SESSION['id_block'] = $this->request->id;
        $this->setActiveMenu(array('blog'));
        $questions  = $this->Faq->find('all',['conditions' => ['block_id' => $this->request->id]]);
        $this->set(compact('questions'));

    }

    public function add()
    {
        $this->setActiveMenu(array('blog'));

        if ($this->request->is('post')){
            $this->Faq->save($this->request->data);
            $this->setFlash('Service is created', 'success');
            $this->redirect('/admin/faq/block/'.$_SESSION['id_block']);
        }
        $block_id = $_SESSION['id_block'];
        $this->set(compact('block_id'));
    }


    public function edit()
    {
        $this->setActiveMenu(array('blog'));

        if ($this->request->data){
            $this->Faq->save($this->request->data);
            $this->setFlash('Service is created', 'success');
            $this->redirect('/admin/faq/block/'.$_SESSION['id_block']);
        }
        $faq = $this->Faq->getOnId($this->request->id);

        foreach ($faq as $items) {
            foreach ($items as $item) {
                $arrFaq = $item;
            }
        }

        $this->set(['faq' => $arrFaq]);
    }

    public function del()
    {
        $this->Faq->delete($this->request->id);
        $this->setFlash('Remove done', 'success');
        $this->redirect('/admin/faq/block/'.$_SESSION['id_block']);

    }



    public function activate()
    {
        $this->Faq->id = $this->request->id;
        $page = $this->Faq->read('active');
        if ($page['Faq']['active'] == self::ACTIVE) {
            $this->Faq->saveField('active', self::INACTIVE);
            $this->setFlash('FAQ is blocked', 'success');
        } else {
            $this->Faq->saveField('active', self::ACTIVE);
            $this->setFlash('FAQ is active', 'success');
        }
        $this->redirect('/admin/faq/block/'.$_SESSION['id_block']);

    }


}