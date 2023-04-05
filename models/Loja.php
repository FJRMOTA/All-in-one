<?php

namespace app\models;

use Yii;
use yiibr\brvalidator\CnpjValidator;
use yii\validators\UrlValidator;

/**
 * This is the model class for table "Loja".
 *
 * @property int $id
 * @property string $nome
 * @property string $cnpj
 * @property string $email
 * @property string|null $telefone
 * @property string $data_abertura
 * @property string|null $data_fechamento
 * @property string $rua
 * @property string $cidade
 * @property string $estado
 * @property string $bairro
 * @property string $pais
 * @property int $numero
 * @property string|null $complemento
 * @property int|null $pessoa_fk
 * @property string $link_imagem
 *
 * @property Pessoa $pessoaFk
 * @property Produtos[] $produtos
 */
class Loja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cnpj', 'email', 'data_abertura', 'rua', 'cidade', 'estado', 'bairro', 'pais', 'numero', 'link_imagem'], 'required', 'message' => 'Este campo não pode ficar em branco.'],
            [['data_abertura', 'data_fechamento'], 'safe'],
            [['numero', 'pessoa_fk'], 'integer'],
            [['nome', 'email', 'telefone', 'rua', 'cidade', 'estado', 'bairro', 'pais', 'complemento', 'link_imagem'], 'string', 'max' => 255],
            [['pessoa_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::class, 'targetAttribute' => ['pessoa_fk' => 'id']],
            ['cnpj', CnpjValidator::className(),'message'=>'CNPJ inválido'],
            ['link_imagem', UrlValidator::className(),'message'=>'Link inválido'],
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
            'cnpj' => 'Cnpj',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'data_abertura' => 'Data Abertura',
            'data_fechamento' => 'Data Fechamento',
            'rua' => 'Rua',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'bairro' => 'Bairro',
            'pais' => 'País',
            'numero' => 'Número',
            'complemento' => 'Complemento',
            'pessoa_fk' => 'Lojista',
            'link_imagem' => 'Link da imagem da loja'
        ];
    }

    /**
     * Gets query for [[PessoaFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa()
    {
        return $this->hasOne(Pessoa::class, ['id' => 'pessoa_fk']);
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produtos::class, ['loja_fk' => 'id']);
    }
}
