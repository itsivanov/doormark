<?php
App::uses('AdminAppController', 'Admin.Controller');
/**
 *@property FaqBlock $FaqBlock
 * @property  ProductRental $ProductRental
 */

class AdminFaqBlocksController extends AdminAppController
{

    const ACTIVE = 1;
    const INACTIVE = 0;

    public $uses = [
        'Faq',
        'FaqBlock'
    ];


    public function index()
    {
        $this->setActiveMenu(array('blog'));

        $this->set([
            'questions' => $this->FaqBlock->find('all')
        ]);
    }


    public function addBlock()
    {
        $this->setActiveMenu(array('blog'));

        if ($this->request->is('post')){
            $this->FaqBlock->save($this->request->data['Faq']);
            $this->setFlash('Service is created', 'success');
            $this->redirect(['action' => 'index']);
        }
    }

    public function edit()
    {
        $this->setActiveMenu(array('blog'));

        if ($this->request->data){
            $this->Faq->save($this->request->data);
            $this->setFlash('Service is created', 'success');
            $this->redirect(['action' => 'index']);

        }
        $faq = $this->Faq->getOnId($this->request->id);

        foreach ($faq as $items) {
            foreach ($items as $item) {
                $arrFaq = $item;
            }
        }

        $this->set(['faq' => $arrFaq]);
    }

    public function editBlock()
    {
        $this->setActiveMenu(array('blog'));

        if ($this->request->data){
            $this->FaqBlock->save($this->request->data['Faq']);
            $this->setFlash('Service is created', 'success');
            $this->redirect(['action' => 'index']);

        }
        $faq = $this->FaqBlock->find('first', ['conditions' => ['id'=> $this->request->id]]);
        $this->set(compact('faq'));
    }



    public function deleteBlock()
    {
        $this->FaqBlock->delete($this->request->id);
        $this->setFlash('Remove done', 'success');
        $this->redirect(['action' => 'index']);
    }


    public function activate()
    {
        $this->FaqBlock->id = $this->request->id;
        $page = $this->FaqBlock->read('active');
        if ($page['FaqBlock']['active'] == self::ACTIVE) {
            $this->FaqBlock->saveField('active', self::INACTIVE);
            $this->setFlash('Block is blocked', 'success');
        } else {
            $this->FaqBlock->saveField('active', self::ACTIVE);
            $this->setFlash('Block is active', 'success');
        }
        $this->redirect(array('action' => 'index'));
    }

}