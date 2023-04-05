<?php

use yii\db\Migration;

/**
 * Class m230401_221212_pessoa
 */
class m230401_221212_pessoa extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pessoa', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'cpf' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'telefone' => $this->string(),
            'data_nascimento' => $this->date()->notNull(),
            'rua' => $this->string()->notNull(),
            'cidade' => $this->string()->notNull(),
            'estado' => $this->string()->notNull(),
            'bairro' => $this->string()->notNull(),
            'pais' => $this->string()->notNull(),
            'numero' => $this->integer()->notNull(),
            'complemento' => $this->string(),
        
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pessoa');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230401_221212_pessoa cannot be reverted.\n";

        return false;
    }
    */
}
