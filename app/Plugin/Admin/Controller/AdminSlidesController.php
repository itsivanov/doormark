<?php
App::uses('AdminAppController', 'Admin.Controller');
/**
 * @property  Slider $Slider
 *@property Product $Product
 */

class AdminSlidesController extends AdminAppController
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    public $uses = [
        'Slide',
        'Product'
    ];

    /**
     * Show active elements for sliders
     */
    public function index()
    {
        $this->setActiveMenu(array('content'));
        $this->set([
            'allSlides' => $this->Slide->find('all')
        ]);
    }

    /**
     *  Add slider
     */
    public function add()
    {
        $this->setActiveMenu(array('content'));

        if ($this->request->data){
           $this->Slide->save($this->request->data);
           $this->setFlash('Service is created', 'success');
           $this->redirect(['action' => 'index']);
        }

    }
    /**
     * Edit sliders
     */
    public function edit()
    {

        $this->setActiveMenu(array('content'));

        if ($this->request->data){
            if ($this->Slide->update($this->request->data)){
                $this->setFlash('Service is created', 'success');
                $this->redirect(['action' => 'index']);
            } else{
                $this->setFlash('Slider is not saved', 'error');
            }
        }
        $this->set([
            'allSlides' => $this->Slide->findId($this->request->id)
        ]);
    }

    public function activate()
    {
        $this->Slide->id = $this->request->id;
        $page = $this->Slide->read('active');

        if ($page['Slide']['active'] == self::ACTIVE) {
            $this->Slide->saveField('active', self::INACTIVE);
            $this->setFlash('Proposition is blocked', 'success');
        } else {
            $this->Slide->saveField('active', self::ACTIVE);
            $this->setFlash('Proposition is active', 'success');
        }
        $this->redirect($_SERVER[HTTP_REFERER]);

    }

    /**
     * Delete sliders
     */
    public function delete()
    {
        $this->Slide->delete($this->request->id);
        $this->setFlash('Remove done', 'success');
        $this->redirect(['action' => 'index']);

    }
}