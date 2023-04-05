<?php

use yii\db\Migration;

/**
 * Class m230402_144255_add_coluna_link_imagem
 */
class m230402_144255_add_coluna_link_imagem extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('produtos', 'link_imagem', $this->string()->notNull());
        $this->addColumn('loja', 'link_imagem', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('produtos', 'link_imagem');
        $this->dropColumn('loja', 'link_imagem');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230402_144255_add_coluna_link_imagem cannot be reverted.\n";

        return false;
    }
    */
}
