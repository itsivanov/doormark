<?php
App::uses('AdminAppController', 'Admin.Controller');
/**
 *@property Gallery $Gallery
 *@property GalleryAlbum $GalleryAlbum
 * @property  ProductRental $ProductRental
 */

class AdminGalleryAlbumsController extends AdminAppController
{
    public $uses = ['Gallery', 'GalleryAlbum'];


    public function index()
    {
        $_SESSION['id'] = $this->request->id;
        $this->setActiveMenu(array('gallery'));
        $img = $this->GalleryAlbum->find('all', ['conditions' => ['gallery_id' => $this->request->id]]);
        $this->set(['img' => $img]);
    }

    public function add()
    {
        $this->setActiveMenu(array('gallery'));

        if ($this->request->is('post')){
            $this->request->data['gallery_id'] = $_SESSION['id'];
            $this->GalleryAlbum->save($this->request->data);

            $this->redirect('/admin/albums/view/'.$_SESSION['id']);
        }
    }

    public function edit()
    {
        $this->setActiveMenu(array('gallery'));

        if ($this->request->is('post')){
            $this->request->data['content'] = $this->request->data['Gallery']['content'];
            unset( $this->request->data['Gallery']);

            $this->GalleryAlbum->save($this->request->data);
            $this->setFlash('Service is created', 'success');
            $this->redirect('/admin/albums/view/'.$_SESSION['id']);
        }

        $url_img = $this->GalleryAlbum->getImage($this->request->id);
        $this->set([
            'img' => $url_img
        ]);


    }

    public function del()
    {
        $this->GalleryAlbum->delete($this->request->id);
        $this->setFlash('Remove done', 'success');
        $this->redirect('/admin/albums/view/'.$_SESSION['id']);

    }

}