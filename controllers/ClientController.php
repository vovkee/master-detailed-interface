<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Client;
use yii\web\NotFoundHttpException;
use yii\web\View;


class ClientController extends Controller
{
    public function actionCreate($id = null)
    {
        $model = new Client;
        if (!is_null($id)) {
            $model = Client::find()->where(['id' => $id])->one();
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
        $model = Client::find()->where(['id' => $id])->one();
        if($model) {
            $model->delete();
        }
        return $this->goHome();
    }

    public function actionPayment($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $client = Client::find()->with('payments')->where(['id' => $id])->asArray()->one();
        if ($client) {

            return $client;
        }
        throw new NotFoundHttpException;
    }
}
