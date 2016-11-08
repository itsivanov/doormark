<?php
App::uses('AdminAppController', 'Admin.Controller');
/**
 * @property  LaminateCategory $LaminateCategory
 * @property  Laminate $Laminate
 */

class AdminLaminateCategoriesController extends AdminAppController
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    public $uses = [
        'LaminateCategory',
        'Laminate'
    ];

    /**
     * Show active elements for sliders
     */
    public function index()
    {
        $this->setActiveMenu(array('paletteCategory'));

        $this->set([
            'category' => $this->LaminateCategory->find('all')
        ]);

    }

    /**
     *  Add slider
     */
    public function add()
    {
        $this->setActiveMenu(array('paletteCategory'));

        if($this->request->is('post')){

            if($this->LaminateCategory->save($this->request->data)){
                $this->setFlash('Item is saved', 'success');
                $this->redirect(['action'=> 'index']);
            }
        }

    }
    /**
     * Edit sliders
     */
    public function edit($id = null)
    {
        $this->setActiveMenu(array('paletteCategory'));

        if($this->request->data){
            if($this->LaminateCategory->save($this->request->data)){
                $this->setFlash('Category is saved', 'success');
                $this->redirect(['action'=> 'index']);
            }
        }

        $this->set([
           'category' => $this->LaminateCategory->find('first',['conditions'=> ['id'=>$id]])
        ]);

    }


    /**
     * Delete sliders
     */
    public function delete($id = null)
    {
        if(isset($id)){
            if($this->LaminateCategory->delete($id)){
                $this->setFlash('Delete success', 'success');
                $this->redirect(['action' => 'index']);
            }
        }

    }
}