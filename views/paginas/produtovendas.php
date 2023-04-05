<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Relatório de Produtos Vendidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="body-content">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Produto</th>
                    <th>Quantidade</th>
                    <th>Valor Total</th>
                    <th class="text-center">Loja</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $result) : ?>
                    <tr>
                        <td class="text-center"><?= $result['produto'] ?></td>
                        <td><?= $result['quantidade'] ?></td>
                        <td>R$ <?= number_format( $result['valor'], 2, ',', '.') ?></td>
                        <td class="text-center"><?= $result['loja'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>