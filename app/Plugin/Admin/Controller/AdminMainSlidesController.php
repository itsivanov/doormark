<?php
App::uses('AdminAppController', 'Admin.Controller');
/**
 * @property  Slider $Slider
 *@property Product $Product
 *@property MainSlide $MainSlide
 *@property Laminate $Laminate
 *@property MainSlidesLaminate $MainSlidesLaminate
 *@property ProductLaminate $ProductLaminate
 */

class AdminMainSlidesController extends AdminAppController
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    public $uses = [
        'MainSlide',
        'Product',
        'MainSlidesLaminate',
        'Laminate',
        'ProductLaminate'
    ];

    /**
     * Show active elements for sliders
     */
    public function index()
    {
        $this->setActiveMenu(array('content'));
        $this->set([
            'allSlides' => $this->MainSlide->find('all')
        ]);
    }

    /**
     *  Add slider
     */
    public function add()
    {
        $this->setActiveMenu(array('content'));

        if ($this->request->data){
            $this->MainSlide->save($this->request->data);
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
        $prelaminate = $this->MainSlide->getLaminateOnSlide($this->request->id);

        $laminateCheck = $this->Laminate->getLaminate($prelaminate);

        $laminate = $this->Laminate->find('all', ['conditions' => ['element' => 'laminate']]);

        if ($this->request->data) {
            if ($this->MainSlide->saveAll($this->request->data)) {
                $this->MainSlidesLaminate->deleteLaminates($this->request->id);
                if (isset($this->request->data['MainSlidesLaminate'])) {
                    $laminateDate = $this->MainSlidesLaminate->treatment($this->request->data['MainSlidesLaminate'], $this->request->id);
                    $this->MainSlidesLaminate->saveAll($laminateDate);
                    $this->setFlash('Service is created', 'success');
                    $this->redirect(['action' => 'index']);
                } else {
                    $this->setFlash('Slider is not saved', 'error');
                }
            }
        }

        $this->set([
            'allSlides' => $this->MainSlide->find('first', ['conditions'=> ['id'=>$this->request->id]]),
            'laminate' => $laminate,
            'laminateCheck' => $laminateCheck
        ]);
    }

    public function activate()
    {
//        var_dump($this->request->id);die;
        $this->MainSlide->id = $this->request->id;
        $page = $this->MainSlide->read('active');

        if ($page['MainSlide']['active'] == self::ACTIVE) {
            $this->MainSlide->saveField('active', self::INACTIVE);
            $this->setFlash('Proposition is blocked', 'success');
        } else {
            $this->MainSlide->saveField('active', self::ACTIVE);
            $this->setFlash('Proposition is active', 'success');
        }
        $this->redirect(['action' => 'index']);

    }

    /**
     * Delete sliders
     */
    public function delete()
    {
        $this->MainSlide->delete($this->request->id);
        $this->setFlash('Remove done', 'success');
        $this->redirect(['action' => 'index']);

    }
}