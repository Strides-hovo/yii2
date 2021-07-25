<?php
/**
 * Created by PhpStorm.
 * User: hovik
 * Date: 25.07.2021
 * Time: 17:58
 */

namespace backend\modules\admin\controllers;


use yii\web\Controller;

class AdminController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}