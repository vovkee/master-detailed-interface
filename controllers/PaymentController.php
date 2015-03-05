<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Payment;
use app\models\Client;
use yii\web\NotFoundHttpException;
use yii\web\View;


class PaymentController extends Controller
{
    public function actionCreate($id = null)
    {
        $model = new Payment;
        if (!is_null($id)) {
            $model = Payment::find()->where(['id' => $id])->one();
            if (!$model) throw new NotFoundHttpException;
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect('');
        } else {
            return $this->render('form', ['model' =>  $model]);
        }
    }

    public function actionDelete($id)
    {
        $model = Payment::find()->where(['id' => $id])->one();
        if ($model) {
            $model->delete();
        }
        return $this->goHome();
    }

}
