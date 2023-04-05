<?php

use app\models\Parcela;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ParcelaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Parcelas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parcela-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'compra_fk',
            [
                'attribute' => 'valor',
                'format' => ['currency'],
            ],
            'tipo',
            [
                'attribute' => 'data_vencimento',
                'format' => ['date', 'php:d/m/Y'],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Parcela $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'compra_fk' => $model->compra_fk]);
                }
            ],
        ],
    ]); ?>


</div>