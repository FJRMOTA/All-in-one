<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LojaSearch;
use app\models\ProdutosSearch;
use app\models\Compras;
use app\models\ProdutosCompras;
use yii\validators\Validator;

class PaginasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LojaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string
     */
    public function actionProduto($id_compra, $id_loja)
    {
        $searchModel = new ProdutosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere('produtos.loja_fk = ' . $id_loja);

        return $this->render('produtos', [
            'dataProvider' => $dataProvider,
            'id_compra' => $id_compra
        ]);
    }

    /**
     * @return string
     */
    public function actionVendas()
    {
        $compras = new Compras();
        $resultado = $compras->getComprasPorLoja();

        return $this->render('vendas', [
            'resultado' => $resultado,
        ]);  
    }

      /**
     * @return string
     */
    public function actionProdutovendas()
    {
        $produtosCompras = new ProdutosCompras();
        $resultado = $produtosCompras->getVendasPorProdutos();
        
        return $this->render('produtovendas', [
            'resultado' => $resultado,
        ]);  
    }

}
