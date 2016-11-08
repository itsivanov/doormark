<?php
App::uses('AdminAppController', 'Admin.Controller');
/**
 *@property Laminate $Laminate
 *@property LaminateCategory $LaminateCategory
 *
 */

class AdminLaminatesController extends AdminAppController
{
    public $uses = ['Laminate', 'LaminateCategory'];

    public function index()
    {
        $this->setActiveMenu(array('palette'));

    }

    //views all category laminate on name category
    public function laminatesView()
    {
        $this->setActiveMenu(array('palette'));

        $element = $this->request->params['element'];
        $_SESSION['element'] = $element;

        $component = $this->Laminate->find('all', ['conditions' => ['element' => $element ]]);
        $this->set(compact('component'));
    }

    public function edit()
    {
        $this->setActiveMenu(array('palette'));

        $product = $this->Laminate->find('first', ['conditions'=> ['Laminate.id' => $this->request->id]]);
        if($this->request->is('post')){
            if($this->Laminate->save($this->request->data)){
                $this->setFlash('Item is saved', 'success');
                $this->redirect('/admin/laminates-view/' . $_SESSION['element']);
            }
        }

        $back = $_SESSION['element'];
        $category = $this->LaminateCategory->find('all');
        $this->set(compact('product', 'back','category'));
    }

    public function add()
    {
        $this->setActiveMenu(array('palette'));

        if($this->request->data){
            if($this->Laminate->save($this->request->data)){
                $this->setFlash('Item is saved', 'success');
                $this->redirect('/admin/laminates-view/' . $_SESSION['element']);
            }
        }

        $this->set([
            'element' => $_SESSION['element'],
            'category' => $this->LaminateCategory->find('all')
        ]);
    }

    public function del()
    {
            if($this->Laminate->delete($this->request->id)){
                $this->setFlash('Delete success', 'success');
                $this->redirect('/admin/laminates-view/' . $_SESSION['element']);

            }

    }


}