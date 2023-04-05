<?php

use app\models\Compras;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ComprasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compras-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=> 'data',
                'format' => ['date', 'php:d/m/Y'],
            ],
            [
                'attribute'=> 'valor_bruto',
                'format' => ['currency', 'BRL'],
            ],
            [
                'attribute'=> 'valor_liquido',
                'format' => ['currency'],
            ],
            [
                'attribute'=> 'desconto',
                'format' => ['currency'],
            ],
            [
                'attribute'=> 'frete',
                'format' => ['currency'],
            ],
            [
                'attribute'=>'pessoa.nome',
                'label'=>'Cliente',
            ],
            [
                'attribute'=>'loja.nome',
                'label'=>'Loja',
            ],
            'status',
            //'pessoa_fk',
            //'loja_fk',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Compras $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
