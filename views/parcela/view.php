<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Parcela $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Parcelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="parcela-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id, 'compra_fk' => $model->compra_fk], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id, 'compra_fk' => $model->compra_fk], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir esta parcela?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'compra_fk',
            [
                'attribute' => 'valor',
                'format' => ['currency'],
            ],
            'tipo',
            [
                'attribute'=> 'data_vencimento',
                'format' => ['date', 'php:d/m/Y'],
            ],
            [
                'attribute'=> 'data_pagamento',
                'format' => ['date', 'php:d/m/Y'],
            ],
        ],
    ]) ?>

</div>
