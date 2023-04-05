<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Parcela $model */

$this->title = 'Atualizar Parcela: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Parcelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'compra_fk' => $model->compra_fk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parcela-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
