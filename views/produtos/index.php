<?php

use app\models\Produtos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProdutosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Produto', ['create', 'id_loja' => $id_loja], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Voltar para a loja', ['loja/view', 'id' => $id_loja], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nome',
            'codigo_interno',
            'descricao',
            [
                'attribute'=> 'preco',
                'format' => ['currency'],
            ],
            [
                'attribute'=>'loja.nome',
                'label'=>'Loja',
            ],
            //'unidade_medida',
            //'loja_fk',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Produtos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
