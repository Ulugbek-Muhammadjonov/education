<?php

namespace backend\modules\api\controllers;

use backend\models\Abitur;
use backend\models\Parentabitur;
use backend\modules\api\models\Myabitur;
use backend\modules\api\models\Myparentabitur;
use stdClass;
use Yii;
use yii\rest\Controller;

/**
 * Default controller for the `api` module
 */
class ParentabiturController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return 'Test';
    }
    public function actionLogin(){
        
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        
        $name = $request->post('name');
        $phone = $request->post('phone');

        $message = "";
        
        $response->statusCode = 200;

        //? Data 2 xil usulda qaytadi struktura va massiv birinchisi massiv usul 2 chisi structura okey :)
        $data = [];
        // $data = new stdClass;
       if($request->isPost && $phone != null && $name != null){

        $parent = Myparentabitur::findOne([
            'name' => $name,
            'phone' => $phone
        ]);

        if($parent){
            $response->statusCode = 200;
            $error = false;
            $message = 'Natija topildi!';
            $parent->token = Yii::$app->security->generateRandomString(255);
            $data = $parent;
            $parent->save();
        }else {
            $error = false;
            $response->statusCode = 200;
            $message = 'Login yoki Parolda xatolik!';
        }
        
       }else {
        $error = true;
        $response->statusCode = 404;
        $message = 'Login yoki Parol bo`sh!';
    }

       

    return 
    [
        'error' => $error, 
        'message' => $message, 
        'data' => $data,
        'statusCode' => $response->statusCode,
    ];

    }
    public function actionGetParentchilder(){
        $request = Yii::$app->request;
        $response = Yii::$app->response;

        $headers = $request->headers;
        $token = $headers->get('token');
        $response->statusCode = 405;

        $myparent = Myparentabitur::findOne([
            'token' => $token
        ]);
        $error = true;
        $data = [];
        $message = '';
        $error_code = 0;

        if ($request->isGet && $myparent) {
            $response->statusCode = 200;
            $error = false;
            $message = 'Ota-onaga tegishli abituryentlar ro`yhati';
            $ids = explode(",",$myparent->abitur_id);
            $abiturs = Myabitur::find()
            ->where(['id'=>$ids])
            ->all();
            $data = $abiturs;
        } else {
            $response->statusCode  = 200;
            $error_code = 1;
            $message = "Tokenda xatolik";
        }
        return [
            'error' => $error,
            'error_code' => $error_code,
            'message' => $message,
            'data' => $data,
        ];
    }


}
