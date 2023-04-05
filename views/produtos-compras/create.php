<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProdutosCompras $model */

$this->title = 'Carrinho';
$this->params['breadcrumbs'][] = ['label' => 'Produtoscompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtoscompras-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
