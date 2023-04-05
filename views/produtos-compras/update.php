<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProdutosCompras $model */

$this->title = 'Atualizar Produtos Compra: ' . $model->id_compra;
$this->params['breadcrumbs'][] = ['label' => 'Produtos Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_compra, 'url' => ['view', 'id_compra' => $model->id_compra, 'id_produto' => $model->id_produto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produtoscompras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
