<?php
namespace app\controllers;
use app\models\algo;
use app\models\ReportForm;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ReportController extends Controller
{
    public function actionIndex()
    {
        $model = new ReportForm();
        return $this->render('index', ['model' => $model]);
    }
}