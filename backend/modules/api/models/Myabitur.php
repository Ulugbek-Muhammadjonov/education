<?php

namespace backend\modules\api\models;

use backend\models\Abitur;
use backend\models\Groupedu;

class Myabitur extends Abitur
{
    public function fields(){

        return [
            'id',
            'fullname',
            'parentname',
            'phoneself',
            'phoneparent',
            'socials',
            'region' => function ($data) {
                return $data->region->name_uz;
            },
            'district' => function ($data) {

                return $data->district->name_uz;
            },
            'quarter' => function ($data){

                return $data->quarter->name;
            },
            'bitrhfull' => function ($data){
                $data = date('d-m-Y',$data->bitrhfull);
                return $data;
            },
            'image',
            'created_at' => function ($data){

                return date('d-m-Y H:i',$data->created_at);
            },
            'gender',
            'group' => function ($data) {
                $xdata = explode(',',$data->group_id);
                $newdata = Mygroup::find()
                ->where(['id' => $xdata])->all();

                return $newdata;
            },
        ];

    }
}


?>