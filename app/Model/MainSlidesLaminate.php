<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 26.07.16
 * Time: 17:30
 */
class MainSlidesLaminate extends AppModel
{
//    public $uses = 'MainSlide';

    public function deleteLaminates($id)
    {
        $this->deleteAll([
            'main_slide_id' => intval($id)
        ]);
    }

    public function treatment ($data, $id)
    {
        $arr = [];
        $i = 0;
        foreach ($data as $item) {
            $arr[$i]['laminate_id'] = $item['laminate_id'];
            $arr[$i]['main_slide_id'] = $id;
        $i++;
        }

        return $arr;
    }


    public function getIdLaminateForSlider($data)
    {
        $arr = [];
        foreach ( $data as $key => $item) {
                $arr[$key]['MainSlide'] = $item['MainSlide'];
                 $query = $this->find('all',['conditions' => ['main_slide_id'=> $item['MainSlide']['id'] ]]);
            foreach($query as $items){
                $arr[$key]['MainSlidesLaminate'][] = $items['MainSlidesLaminate'];
            }
        }

       return $arr;
    }


}