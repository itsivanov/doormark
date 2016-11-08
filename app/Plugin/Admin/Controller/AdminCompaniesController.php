<?php
App::uses('AdminAppController', 'Admin.Controller');
/**
 *@property Company $Company
 *@property Profile $Profile
 *@property User $User
 */
class AdminCompaniesController extends AdminAppController
{
    public $uses = [ 'Profile', 'User'];
    public $helpers = array('Admin.ExtTree');

    const ACTIVE = 1;
    const INACTIVE = 0;

    public function beforeFilter() {
        parent::beforeFilter();
        $this->setHoverFlag('companies');
        $this->setActiveMenu(array('companies'));
    }

    public function index()
    {

        $users = $this->User->find('all', ['conditions'=> ['group_id !=' => 1]]);
        $this->set(compact('users'));
    }

    public function add()
    {
        if ($this->request->data) {
            if ($this->Company->save($this->request->data)) {
                $this->setFlash('Company is created', 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->setFlash('Company is not created', 'error');
            }
        }
    }

    public function edit($id)
    {
        if ($this->request->data) {
//            $this->Profile->id = $id;

            if ($this->Profile->save($this->request->data)) {
                $this->setFlash('Company is saved', 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->setFlash('Company is not saved', 'error');
            }
        }

        $data = $this->User->read('', $id);
        $this->request->data = $data;

        $this->set(compact('data'));
        $this->render('add');
    }

    public function newCompany()
    {
        if($this->request->is('post')){
            if ($this->User->save($this->request->data['User'])) {
                $this->request->data['Profile']['company_name'] = $this->request->data['User']['username'];
                $this->request->data['Profile']['primary_email'] = $this->request->data['User']['email'];
                $this->request->data['Profile']['user_id'] = $this->User->getLastInsertID();
                $this->Profile->save($this->request->data['Profile']);
                $this->setFlash('Company is saved', 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->setFlash('Company is not saved', 'error');
            }
        }
        $time = date('Y-m-d H:i:s');
        $this->set(compact('time'));
    }

    public function delete($id)
    {
        if ($this->User->delete($id)) {
            $this->setFlash('Company is deleted', 'success');
        } else {
            $this->setFlash('Company is not deleted', 'error');
        }
        $this->redirect($this->referer());
    }

}