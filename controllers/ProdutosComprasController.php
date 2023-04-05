<?php

namespace app\controllers;

use app\models\ProdutosCompras;
use app\models\ProdutosComprasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProdutosComprasController implements the CRUD actions for ProdutosCompras model.
 */
class ProdutosComprasController extends Controller
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
        $searchModel = new ProdutosComprasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param int $id_compra 
     * @param int $id_produto 
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_compra, $id_produto)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_compra, $id_produto),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate($id, $compra, $valor)
    {
        $model = new ProdutosCompras();
        $model->id_compra = $compra;
        $model->id_produto = $id;
        $model->valor = $valor;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['compras/view', 'id' => $model->id_compra]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'idCompra' => $model->id_compra
        ]);
    }

    /**
     * @param int $id_compra Id Compra
     * @param int $id_produto Id Produto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_compra, $id_produto)
    {
        $model = $this->findModel($id_compra, $id_produto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_compra' => $model->id_compra, 'id_produto' => $model->id_produto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param int $id_compra Id Compra
     * @param int $id_produto Id Produto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_compra, $id_produto)
    {
        $this->findModel($id_compra, $id_produto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param int $id_compra 
     * @param int $id_produto 
     * @return ProdutosCompras the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_compra, $id_produto)
    {
        if (($model = ProdutosCompras::findOne(['id_compra' => $id_compra, 'id_produto' => $id_produto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
