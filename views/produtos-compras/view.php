<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ProdutosCompras $model */

$this->title = $model->id_compra;
$this->params['breadcrumbs'][] = ['label' => 'Produtos Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produtoscompras-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id_compra' => $model->id_compra, 'id_produto' => $model->id_produto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id_compra' => $model->id_compra, 'id_produto' => $model->id_produto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir este produto da compra?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_compra',
            'id_produto', 
            [
                'attribute' => 'valor',
                'format' => ['currency'],
            ],
            'quantidade',
        ],
    ]) ?>

</div>
