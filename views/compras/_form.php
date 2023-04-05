<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pessoa;


/** @var yii\web\View $this */
/** @var app\models\compras $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="compras-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'valor_bruto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor_liquido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desconto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'frete')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'pessoa_fk')->
       dropDownList(ArrayHelper::map(Pessoa::find()
           ->orderBy('nome')
           ->all(),'id','nome'),
           ['prompt' => 'Selecione o cliente'] )
    ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
