<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 26.07.16
 * Time: 17:30
 */
class Gallery extends AppModel
{
    public $useTable = 'gallery';


    public function getAll()
    {
        return $this->find('all');

    }

    public function getImgOnId($id)
    {
        return $this->find('first', [
            'conditions' => [
                'id' => $id
            ]
        ]);
    }
}