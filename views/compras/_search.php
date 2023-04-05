<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ComprasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="compras-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'valor_bruto') ?>

    <?= $form->field($model, 'valor_liquido') ?>

    <?= $form->field($model, 'desconto') ?>

    <?php // echo $form->field($model, 'frete') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'pessoa_fk') ?>

    <?php // echo $form->field($model, 'loja_fk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
