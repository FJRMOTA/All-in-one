<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">


    <div class="body-content">

        <h1 class="text-center"><?= Html::encode($this->title) ?></h1><br>
        <div class="row">
            <?php foreach ($dataProvider->getModels() as $data) : ?>

                <div class="col-md-3" style="margin: 4%">
                    <h2 class="text-center"><?= $data->nome ?></h2>

                    <div>
                        <img src=<?= $data->link_imagem ?> width="300" height="250">
                    </div>
                    <p class="text-center">Preço: R$ <?= number_format($data->preco, 2, ',', '.') ?></p>

                    <div class="text-center">
                        <?= Html::a('Comprar este produto', ['produtos-compras/create', 'id' => $data->id, 'compra' => $id_compra, 'valor' => $data->preco], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

    </div>
</div>