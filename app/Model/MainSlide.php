<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 26.07.16
 * Time: 17:30
 */
class MainSlide extends AppModel
{
    public $uses = 'MainSlide';
//    public $hasMany = 'MainSlidesLaminate';
    public function getLaminateOnSlide($slide_id)
    {
        //SELECT * FROM vt_tidings as tid INNER JOIN vt_tids_on_categories as toc ON tid.id = toc.tiding_id
        $options['joins'] = [
            ['table' => 'main_slides_laminates',
                'alias' => 'MainSlidesLaminate',
                'type' => 'INNER',
                'conditions' => [
                    'MainSlide.id = MainSlidesLaminate.main_slide_id',
                    'MainSlide.id' => $slide_id,
                ],
            ]
        ];

        $options['fields'] =[
            'MainSlidesLaminate.laminate_id'
        ];

        return $this->find('all', $options);
    }

    public function getLaminate()
    {
        //SELECT * FROM vt_tidings as tid INNER JOIN vt_tids_on_categories as toc ON tid.id = toc.tiding_id
        $options['joins'] = [
            ['table' => 'main_slides_laminates',
                'alias' => 'MainSlidesLaminate',
                'type' => 'INNER',
                'conditions' => [
                    'MainSlide.id = MainSlidesLaminate.main_slide_id',
                ],
            ]
        ];

        $options['fields'] =[
            'MainSlidesLaminate.*',
            'MainSlide.*'
        ];

        return $this->find('all');
    }
}