<?php

App::uses('AppController', 'Controller');
/**
 * Pages Controller
 *
 * @property Publication $Publication
 * @property GalleryAlbum $GalleryAlbum
 * @property Contact $Contact
 * @property Storytab $Storytab
 * @property Product $Product
 * @property Laminate $Laminate
 * @property Gallery $Gallery
 * @property HomePart $HomePart
 * @property Slide $Slide
 * @property MainSlide $MainSlide
 * @property MainSlidesLaminate $MainSlidesLaminate
 * @property Download $Download
 * @property CompanyContact $CompanyContact
 *
 */
class PagesController extends AppController {

    private $limit = 3;
    private $limitCategory = 3;

    public $components = [
        'Email',
        'Messenger',
        'Captcha'
    ];

    public $uses = [

        'Slide',
        'Faq',
        'FaqBlock',
        'HomePart',
        'Gallery',
        'CompanyContact',
        'Download',
        'Page',
        'GalleryAlbum',
        'MainSlide',
        'Category',
        'MainSlidesLaminate',
        'Laminate',
        'FaqBlock',
        'Product'
    ];

    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    public function home()
    {
        if($this->request->is('ajax')) {
            $laminate = $this->Laminate->find('first', ['conditions'=> ['id' => $this->request->data['id']]]);
            $this->set(compact('laminate'));
            $response = $this->render('conditionParts/htmlForLaminate');
            echo $response->body();
            exit();
        }

        $content = $this->HomePart->find('all');
        $slidesSecond  = $this->Slide->findActiveSlides();
        $mainSlides = $this->MainSlide->getLaminate();
        $mainSlidesViews = $this->MainSlidesLaminate->getIdLaminateForSlider($mainSlides);
//        $mainSlides = $this->Laminate->getLaminetIsView($mainSlidesViews);

        $this->set(compact('content','slidesSecond', 'mainSlides'));
    }

    public function door()
    {
        $parentMenus = $this->Category->getParent();
        $products = $this->Product->find('all');

        $option = ['conditions' => ['parent_id' => 0, 'active' => 1],'limit' => $this->limitCategory];
        $categoryContent = $this->Category->find('all', $option);
        $this->set(compact('products', 'parentMenus', 'categoryContent'));

        if($this->request->is('ajax')){
            $settings = [
                'conditions' => ['parent_id' => 0, 'active'=>1],
                'limit'     => $this->limitCategory,
                'offset'    => $this->request->data['offset']
            ];

            $categoryAjax = $this->Category->find('all', $settings);
            $this->set(['categoryContent' => $categoryAjax]);

            $response = $this->render('conditionParts/getCategoryContent');
            echo $response->body(); exit();
        }

    }


    public function faq()
    {
        $this->set([
            'faqs'  => $this->FaqBlock->getJoin(),
        ]);
    }

    public function gallery()
    {

        $settings = [
            'limit'     => $this->limit,
        ];

        $this->set([
            'img' => $this->Gallery->find('all', $settings)
        ]);

        if($this->request->is('ajax')){
            $settings = [
                'limit'     => $this->limit,
                'offset'    => $this->request->data['offset']
            ];

            $arrImages = $this->Gallery->find('all', $settings);

            $this->set(['image' => $arrImages]);
            $response = $this->render('conditionParts/htmlForAjax');
            echo $response->body(); exit();
        }
    }

    public function albumAjax()
    {
        if($this->request->is('ajax')){
            $data = $this->request->data;

            $imagesAlbum = $this->GalleryAlbum->getImgOnId($data['id']);
            $this->set(['imagesAlbum' => $imagesAlbum]);
            $response = $this->render('conditionParts/htmlForSlideshow');
            echo $response->body();
        }
        exit();
    }

    public function downloads()
    {

        $this->set([
            'files' => $this->Download->find('all')
        ]);
    }

    public function contact()
    {
        $this->set([
            'contact_main' => $this->CompanyContact->find('first', ['conditions'=> ['position' => 'main']]),
            'contacts' => $this->CompanyContact->find('all', ['conditions'=> ['position ' => '1']]),
            'form_title' => $this->CompanyContact->find('first', ['conditions'=> ['position ' => 'form']]),
        ]);
    }

    public function display()
    {
        //code
    }









}