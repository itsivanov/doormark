<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 26.07.16
 * Time: 17:30
 */
class Laminate extends AppModel
{
    public $hasOne = ['ProductLaminate'];

    public function getLaminate($data)
    {
        $arrLaminate = [];

        foreach ($data as $item) {
            $arrLaminate[] = $this->find('first', [ 'conditions' => ['Laminate.id' => $item['MainSlidesLaminate']['laminate_id']]]);
        }
        return $arrLaminate;
    }

    public function getLaminetIsView($data)
    {
        $arrLaminate = [];
        foreach ($data as $key => $items) {
            $arrLaminate[$key]['MainSlide'] = $data[$key]['MainSlide'];

            if(!empty($items['MainSlidesLaminate'])){

                foreach ($items['MainSlidesLaminate'] as $item ) {
                     $arr = $this->find('first', [ 'conditions' => ['id' => $item['laminate_id']]]);
                    if(!empty($arr)){
                        foreach ($arr as $val) {
                            $arrLaminate[$key]['MainSlidesLaminate'][] = $val;
                        }
                    }

                }
            }
        }

        return $arrLaminate;
    }

    public function getItem($id)
    {
        return $this->find('all', ['conditions'=> ['ProductLaminate.product_id' => $id]]);
    }

}





