<?php
App::uses('AdminAppController', 'Admin.Controller');

/**
 * Downloads Controller
 *
 * @property Download $Download
 */
class AdminDownloadsController extends AdminAppController {

    public $uses = [
            'Download'
        ];

    const ACTIVE   = 1;
    const INACTIVE = 0;

    public function index()
    {
        $files = $this->Download->find('all');
        $this->set(compact('files'));
    }

    public function add()
    {
        if($this->request->is('post')){

            $size = filesize($_SERVER['DOCUMENT_ROOT'] . $this->request->data['Download']['link'])/1000000;
            if($size <= 0.01){
                $this->request->data['Download']['size'] = 0.01;
            }else{
                $this->request->data['Download']['size'] = $size;
            }
            $this->Download->save($this->request->data);
            $this->setFlash('Service is created', 'success');
            $this->redirect(['action'=> 'index']);

        }
    }

    public function edit()
    {
        if($this->request->is('post')){
            $size = filesize($_SERVER['DOCUMENT_ROOT'] . $this->request->data['Download']['link'])/1000000;
            if($size <= 0.01){
                $this->request->data['Download']['size'] = 0.01;
            }else{
                $this->request->data['Download']['size'] = $size;
            }
            $this->Download->save($this->request->data);
            $this->setFlash('Service is created', 'success');
            $this->redirect(['action'=> 'index']);

        }

        $downloads = $this->Download->find('first', ['conditions' => ['id' => $this->request->id]]);
        $this->set(compact('downloads'));
    }

    public function status()
    {
        $this->Download->id = $this->request->id;
        $page = $this->Download->read('new');
        if ($page['Download']['new'] == self::ACTIVE) {
            $this->Download->saveField('new', self::INACTIVE);
            $this->setFlash('File not new', 'success');
        } else {
            $this->Download->saveField('new', self::ACTIVE);
            $this->setFlash('File is new', 'success');
        }
        $this->redirect(['action'=> 'index']);
    }


    public function del()
    {
        $this->Download->delete($this->request->id);
        $this->setFlash('Remove done', 'success');
        $this->redirect(['action'=> 'index']);

    }
}
