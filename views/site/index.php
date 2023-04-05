<?php

/** @var yii\web\View $this */
use yii\helpers\Html;

$this->title = 'All In One';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Loja X</h1>

        <p class="lead">Aqui você encontra o menor preço!</p>
        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Feijão</h2>

                <p>
                    <?= Html::img('@web/img/feijao.jpg') ?>                   
                </p>

                <p>
                    <?= Html::a('Compre', ['/produto/view', 'id' => 1], ['class' => 'btn btn-outline-secondary']) ?>
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Arroz</h2>

                <p>
                    <?php echo Html::img('@web/img/arroz.jpg') ?>
                </p>

                <p>
                    <?= Html::a('Compre', ['/produto/view', 'id' => 2], ['class' => 'btn btn-outline-secondary']) ?>
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Macarrão</h2>

                <p>
                    <?php echo Html::img('@web/img/macarrao.jpg') ?>
                </p>

                <p>
                    <?= Html::a('Compre', ['/produto/view', 'id' => 3], ['class' => 'btn btn-outline-secondary']) ?>
                </p>
            </div>
        </div>

    </div>
</div>