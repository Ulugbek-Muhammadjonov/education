<?php

namespace backend\modules\api\models;

use backend\models\Regions;

class Myregion extends Regions
{
    public function fields()
    {
        return [
            'id',
            'name_uz',
            // 'name_oz',
            // 'name_ru',
        ];
    }
}

?>