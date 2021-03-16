<?php

namespace backend\modules\api\models;

use backend\models\Parentabitur;

class Myparentabitur extends Parentabitur
{
    public function fields()
    {
        return [
            'id',
            'name',
            'phone',
            'abitur_id',
            'created_at',
            'status',
            'token',
        ];
    }
}

?>