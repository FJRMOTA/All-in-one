<?php

use yii\db\Migration;

/**
 * Class m230401_224959_produtos
 */
class m230401_224959_produtos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('produtos', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'codigo_interno' => $this->integer(),
            'descricao' => $this->string(),
            'preco' => $this->money()->notNull(),
            'unidade_medida' => $this->string(15)->notNull(),
            'loja_fk' => $this->integer()
        ]);

        $this->addForeignKey('fk_loja_produtos','produtos','loja_fk','loja','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_loja_produtos', 'produtos');
        $this->dropTable('produtos');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230401_224959_produtos cannot be reverted.\n";

        return false;
    }
    */
}
