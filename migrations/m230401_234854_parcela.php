<?php

use yii\db\Migration;

/**
 * Class m230401_234854_parcela
 */
class m230401_234854_parcela extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('parcela', [
            'id' => $this->integer(),
            'compra_fk' => $this->integer(),
            'valor' =>$this->money(),
            'tipo' => $this->integer(), //status possíveis: 1: pix, 2: boleto, 3: cartão de débito, 4: cartão de crédito
            'data_vencimento' => $this->date()->notNull(),
            'data_pagamento' => $this->date(),
        ]);

        $this->addPrimaryKey('pk-parcela-compra', 'parcela', ['id', 'compra_fk']);
        $this->addForeignKey('fk_compra_parcela','parcela','compra_fk','compras','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk-parcela-compra', 'parcela');
        $this->dropForeignKey('fk_compra_parcela', 'parcela');
        $this->dropTable('parcela');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230401_234854_parcela cannot be reverted.\n";

        return false;
    }
    */
}
