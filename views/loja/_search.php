<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LojaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="loja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'cnpj') ?>

    <?= $form->field($model, 'pessoa_fk') ?>

    <?= $form->field($model, 'cidade') ?>

    <? $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'data_abertura') ?>

    <?php // echo $form->field($model, 'data_fechamento') ?>

    <?php // echo $form->field($model, 'rua') ?>

    <?php // echo $form->field($model, 'telefone')  ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'bairro') ?>

    <?php // echo $form->field($model, 'pais') ?>

    <?php // echo $form->field($model, 'numero') ?>

    <?php // echo $form->field($model, 'complemento') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'link_imagem') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
