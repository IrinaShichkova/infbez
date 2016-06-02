<?php

namespace app\controllers;

use Yii;
use app\models\Seed;
use app\models\SeedSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\NewSort;
use yii\web\UploadedFile;
/**
 * SeedController implements the CRUD actions for Seed model.
 */
class SeedController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Seed models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Seed model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Seed model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Seed();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->save()) {
                if ($model->upload()) {
                    // file is uploaded successfully
//                    return;
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing Seed model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->save()) {
                if ($model->upload()) {
                    // file is uploaded successfully
//                    return;
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);

    }

    /**
     * Deletes an existing Seed model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionToSeed($id = null)
    {
        $model = new Seed();
        $model->technology_id = 1;
        $model->period_id = 1;
        $model->save(false);

        $newSort = NewSort::findOne($id);
        $newSort->seed_id = $model->id;

        return $this->redirect(Url::to(['/seed/update', 'id' => $model->id]));
    }


    /**
     * Finds the Seed model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seed the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seed::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
    }
}
