<?php

namespace backend\modules\api\models;

use backend\models\Groupedu;

class Mygroup extends Groupedu
{

    public function fields()
    {
        return [
            // 'id',
            'name'
        ];
    }
}


?>