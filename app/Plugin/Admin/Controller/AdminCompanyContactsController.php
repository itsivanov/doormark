<?php
App::uses('AdminAppController', 'Admin.Controller');

/**
 * Contacts Controller
 *
 * @property CompanyContact $CompanyContact
 *
 */
class AdminCompanyContactsController extends AdminAppController {

    public $uses = ['CompanyContact'];
    const ACTIVE   = 1;
    const INACTIVE = 0;


    public function index()
    {
        $contacts = $this->CompanyContact->find('all');
        $this->set(compact('contacts'));
    }

    public function edit()
    {
        if($this->request->is('post')){
            $this->CompanyContact->save($this->request->data);
            $this->setFlash('Service is created', 'success');
            $this->redirect(['action'=>'index']);
        }
        $contact = $this->CompanyContact->find('first', ['conditions'=> ['id' => $this->request->id]]);
        $this->set(compact('contact'));
    }

}
