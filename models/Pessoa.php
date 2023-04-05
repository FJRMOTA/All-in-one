<?php

namespace app\models;

use Yii;
use yiibr\brvalidator\CpfValidator;

/**
 * This is the model class for table "Pessoa".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $email
 * @property string|null $telefone
 * @property string $data_nascimento
 * @property string $rua
 * @property string $cidade
 * @property string $estado
 * @property string $bairro
 * @property string $pais
 * @property int $numero
 * @property string|null $complemento
 *
 * @property Compras[] $compras
 * @property Compras[] $compras0
 * @property Loja[] $lojas
 */
class Pessoa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pessoa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf', 'email', 'data_nascimento', 'rua', 'cidade', 'estado', 'bairro', 'pais', 'numero'], 'required', 'message' => 'Este campo não pode ficar em branco.'],
            [['data_nascimento'], 'safe'],
            [['numero'], 'integer'],
            [['nome', 'email', 'telefone', 'rua', 'cidade', 'estado', 'bairro', 'pais', 'complemento'], 'string', 'max' => 255],
            ['cpf', CpfValidator::className(),'message'=>'CPF inválido']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'data_nascimento' => 'Data Nascimento',
            'rua' => 'Rua',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'bairro' => 'Bairro',
            'pais' => 'Pais',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
        ];
    }

    /**
     * Gets query for [[ComprasPorLoja]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComprasPorLoja()
    {
        return $this->hasMany(Compras::class, ['loja_fk' => 'id']);
    }

    /**
     * Gets query for [[ComprasPorPessoa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComprasPorPessoa()
    {
        return $this->hasMany(Compras::class, ['pessoa_fk' => 'id']);
    }

    /**
     * Gets query for [[Lojas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLojas()
    {
        return $this->hasMany(Loja::class, ['pessoa_fk' => 'id']);
    }
}
