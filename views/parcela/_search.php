<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ParcelaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="parcela-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'compra_fk') ?>

    <?= $form->field($model, 'valor') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'data_vencimento') ?>

    <?php // echo $form->field($model, 'data_pagamento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
