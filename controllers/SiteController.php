<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MainForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionForm()
    {
        $model = new MainForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->dataFile = UploadedFile::getInstance($model, 'dataFile');
            //if ($model->save()) {
                if ($model->upload()) {
                    // file is uploaded successfully
//                    return;
                }
                //return $this->redirect(['view', 'id' => $model->id]);
//                return $this->redirect(\Yii::$app->request->referrer);
            //}
        }

        return $this->render('form', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
