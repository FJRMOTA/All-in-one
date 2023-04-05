<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Parcela $model */

$this->title = 'Nova Parcela';
$this->params['breadcrumbs'][] = ['label' => 'Parcelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parcela-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
