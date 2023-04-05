<?php

use app\models\ProdutosCompras;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProdutosComprasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produtos - Compra';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtoscompras-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_compra',
            'id_produto',
            [
                'attribute' => 'valor',
                'format' => ['currency'],
            ],
            'quantidade',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProdutosCompras $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_compra' => $model->id_compra, 'id_produto' => $model->id_produto]);
                 }
            ],
        ],
    ]); ?>


</div>
