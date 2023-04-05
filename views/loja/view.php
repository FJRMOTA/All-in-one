<?php

use app\models\Pessoa;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Loja $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Lojas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="loja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir esta loja?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Produtos', ['produtos/index', 'id_loja' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Voltar para lojas', ['loja/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'cnpj',
            'email:email',
            'telefone',
            [
                'attribute'=> 'data_abertura',
                'format' => ['date', 'php:d/m/Y'],
            ],
            [
                'attribute'=> 'data_fechamento',
                'format' => ['date', 'php:d/m/Y'],
            ],
            'rua',
            'cidade',
            'estado',
            'bairro',
            'pais',
            'numero',
            'complemento',
            'link_imagem',
            [
                'attribute'=>'pessoa.nome',
                'label'=>'Lojista',
            ],
        ],
    ]) ?>

</div>