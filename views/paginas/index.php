<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'ALL IN ONE - LOJAS';
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
                    </div><br>

                    <div class="text-center" style="margin-left: 2em;">
                        <?= Html::a('Comprar nessa loja', ['compras/create', 'id' => $data->id], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

    </div>
</div>