<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 26.07.16
 * Time: 17:30
 */
class ProductLaminate extends AppModel
{
    public $hasMany = ['Laminate'];

    public function mainSave($data)
    {
        $arr = [];
        $i = 0;
        if(!empty($data['ProductLaminate'] )) {
            foreach ($data['ProductLaminate'] as $item) {
                if (!empty($item)) {
                    $arr[$i]['product_id'] = $data['Product']['id'];
                    $arr[$i]['laminate_id'] = $item['laminate_id'];
                }
                $i++;
            }
            $this->deleteAll(['product_id' => $data['Product']['id']]);
            $this->saveAll($arr);

        }
        return true;

    }

    public function getItem($id)
    {
        return $this->find('all', ['conditions'=> ['ProductLaminate.product_id' => $id]]);
    }
}