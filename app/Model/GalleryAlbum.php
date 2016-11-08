<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 26.07.16
 * Time: 17:30
 */
class GalleryAlbum extends AppModel
{


    public function getAll()
    {
        return $this->find('all');

    }

    public function getImgOnId($id)
    {
        return $this->find('all', [
            'conditions' => [
                'gallery_id' => $id
            ]
        ]);
    }

    public function getImage($id)
    {
        return $this->find('first', ['conditions'=> ['id'=> $id]]);
    }
}