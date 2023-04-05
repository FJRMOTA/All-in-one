<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Relatório de Vendas Por Loja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="body-content">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Quantidade</th>
                    <th>Valor Total</th>
                    <th class="text-center">Loja</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $result) : ?>
                    <tr>
                        <td><?= $result['quantidade'] ?></td>
                        <td>R$ <?=  number_format($result['valor'], 2, ',', '.') ?></td>
                        <td class="text-center"><?= $result['loja'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>