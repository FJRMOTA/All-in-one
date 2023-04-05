<?php

use yii\db\Migration;

/**
 * Class m230401_230834_compras
 */
class m230401_230834_compras extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('compras', [
            'id' => $this->primaryKey(),
            'data' => $this->date()->notNull(),
            'valor_bruto' => $this->money()->notNull(),
            'valor_liquido' => $this->money(),
            'desconto' => $this->money(),
            'frete' => $this->money(),
            'status' => $this->integer()->notNull(), //status possíveis: 1: pendente, 2: parcialemente paga, 3: pendente, 4: cancelada
            'pessoa_fk' => $this->integer(),
            'loja_fk' => $this->integer()
        ]);

        $this->addForeignKey('fk_pessoa_compras','compras','pessoa_fk','pessoa','id');
        $this->addForeignKey('fk_loja_compras','compras','loja_fk','loja','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_pessoa_compras', 'compras');
        $this->dropForeignKey('fk_loja_compras', 'compras');
        $this->dropTable('compras');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230401_230834_compras cannot be reverted.\n";

        return false;
    }
    */
}
