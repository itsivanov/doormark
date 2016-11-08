<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 27.07.16
 * Time: 18:11
 */

class FaqBlock extends AppModel
{

    public $hasMany = array(
        'Faq' => array(
            'className' => 'Faq',
            'foreignKey' => 'block_id',
            'conditions' => ['active' => 1]
        )
    );
    /**
     * Get active blocks questions
     * @return array
     */
    public function getAll()
    {
        $option = [
            'conditions' => [
                'active' => 1
            ]
        ];
        return $this->find('all', $option);
    }

    public function getJoin()
    {
        return $this->find('all', ['conditions' => ['active'=> 1]]);
    }


}