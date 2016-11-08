<?php
App::uses('AppModel', 'Model');

/**
 * Product Model
 *
 */

class ProductImage extends AppModel {


    public function getImagesOnId($id)
    {
        $option = [
          'conditions'=> [
              'product_id'=>$id
          ]
        ];
        return $this->find('all', $option);

    }

    public function insactionData($data, $id)
    {
        for($i=0; $i<count($data);$i++){
            $data[$i]['product_id'] = $id ;
        }
        return $data;
    }
}
