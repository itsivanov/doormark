<?php

class Category extends AppModel
{

    public function getParent()
    {
        $options = [
          'conditions'=>[
              'parent_id' => 0,
              'active'  => 1
          ]
        ];
        return $this->find('all', $options);
    }

    public function getChild()
    {
        $options = [
            'conditions'=>[
                'parent_id !=' => 0
            ]
        ];
        return $this->find('all', $options);
    }

}