<?php

use yii\db\Migration;

/**
 * Class m230401_233945_produtos_compras
 */
class m230401_233945_produtos_compras extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('produtoscompras', [
            'id_compra' => $this->integer(),
            'id_produto' => $this->integer(),
            'valor' =>$this->money(),
            'quantidade' =>$this->float()
        ]);

        $this->addPrimaryKey('pk-produto-compra', 'produtoscompras', ['id_compra', 'id_produto']);
        $this-> addForeignKey('idx_produtoscompras_compra','produtoscompras','id_compra','compras','id');
        $this-> addForeignKey('idx_produtoscompras_produto','produtoscompras','id_produto','produtos','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk-produto-compra', 'produtoscompras');
        $this->dropForeignKey('idx_produtoscompras_compra', 'produtoscompras');
        $this->dropForeignKey('idx_produtoscompras_produto', 'produtoscompras');   
        $this->dropTable('produtoscompras');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230401_233945_produtos_compras cannot be reverted.\n";

        return false;
    }
    */
}
