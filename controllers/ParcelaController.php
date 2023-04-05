<?php

namespace app\controllers;

use app\models\Parcela;
use app\models\ParcelaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParcelaController implements the CRUD actions for Parcela model.
 */
class ParcelaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ParcelaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param int $id ID
     * @param int $compra_fk Compra Fk
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $compra_fk)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $compra_fk),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate($id_compra)
    {
        $model = new Parcela();
        $model->compra_fk = $id_compra;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['compras/view', 'id' => $model->compra_fk]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @param int $id 
     * @param int $compra_fk 
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $compra_fk)
    {
        $model = $this->findModel($id, $compra_fk);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'compra_fk' => $model->compra_fk]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param int $id 
     * @param int $compra_fk 
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $compra_fk)
    {
        $this->findModel($id, $compra_fk)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param int $id 
     * @param int $compra_fk 
     * @return Parcela the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $compra_fk)
    {
        if (($model = Parcela::findOne(['id' => $id, 'compra_fk' => $compra_fk])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
