<?php

use yii\db\Migration;

/**
 * Class m230401_223828_loja
 */
class m230401_223828_loja extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('loja', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'cnpj' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'telefone' => $this->string(),
            'data_abertura' => $this->date()->notNull(),
            'data_fechamento' => $this->date(),
            'rua' => $this->string()->notNull(),
            'cidade' => $this->string()->notNull(),
            'estado' => $this->string()->notNull(),
            'bairro' => $this->string()->notNull(),
            'pais' => $this->string()->notNull(),
            'numero' => $this->integer()->notNull(),
            'complemento' => $this->string(),
            'pessoa_fk' => $this->integer()
        ]);

        $this->addForeignKey('fk_pessoa_loja','loja','pessoa_fk','pessoa','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_pessoa_loja', 'loja');
        $this->dropTable('loja');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230401_223828_loja cannot be reverted.\n";

        return false;
    }
    */
}
