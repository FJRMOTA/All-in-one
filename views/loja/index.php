<?php

use app\models\Loja;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LojaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lojas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova Loja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nome',
            'cnpj',
            'email:email',
            'telefone',
            [
                'attribute'=>'pessoa.nome',
                'label'=>'Lojista',
            ],
            [
                'attribute'=> 'data_abertura',
                'format' => ['date', 'php:d/m/Y'],
            ],
            //'data_abertura',
            //'data_fechamento',
            //'rua',
            //'cidade',
            //'estado',
            //'bairro',
            //'pais',
            //'numero',
            //'complemento',
            //'pessoa_fk',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Loja $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
