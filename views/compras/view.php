<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Compras $model */

$this->title = 'Compra: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="compras-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir esta compra?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Adicionar Produto', ['paginas/produto', 'id_compra' => $model->id, 'id_loja' => $model->loja_fk], ['class' => 'btn btn-success']) ?>

        <?= Html::a('Adicionar Parcela', ['parcela/create', 'id_compra' => $model->id], ['class' => 'btn btn-warning']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'data',
                'format' => ['date', 'php:d/m/Y'],
            ],            [
                'attribute' => 'valor_bruto',
                'format' => ['currency']
            ],
            [
                'attribute' => 'valor_liquido',
                'format' => ['currency'],
            ],
            [
                'attribute' => 'desconto',
                'format' => ['currency'],
            ],
            [
                'attribute' => 'frete',
                'format' => ['currency'],
            ],
            'status',
            [
                'attribute' => 'pessoa.nome',
                'label' => 'Cliente',
            ],
            [
                'attribute' => 'loja.nome',
                'label' => 'Loja',
            ],
        ],
    ]) ?>

   <h1>Itens da Compra</h1><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'produto.nome',
            'quantidade',
            [
                'attribute' => 'valor',
                'format' => ['currency'],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <h1>Parcelas da Compra</h1><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'columns' => [
            'id',
            'valor',
            'tipo',
            [
                'attribute' => 'data_vencimento',
                'format' => ['date', 'php:d/m/Y'],
            ],
            [
                'attribute' => 'data_pagamento',
                'format' => ['date', 'php:d/m/Y'],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>