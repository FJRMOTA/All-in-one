<?php

namespace app\models;

use Yii;
use yii\validators\UrlValidator;

/**
 * This is the model class for table "Produtos".
 *
 * @property int $id
 * @property string $nome
 * @property int|null $codigo_interno
 * @property string|null $descricao
 * @property float $preco
 * @property string $unidade_medida
 * @property string $link_imagem
 * @property int|null $loja_fk
 *
 * @property Compras[] $compras
 * @property Loja $lojaFk
 * @property ProdutosCompras[] $produtoscompras
 */
class Produtos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'preco', 'unidade_medida', 'link_imagem'], 'required', 'message' => 'Este campo não pode ficar em branco.'],
            [['codigo_interno', 'loja_fk'], 'integer'],
            [['preco'], 'number'],
            [['nome', 'descricao', 'link_imagem'], 'string', 'max' => 255],
            [['unidade_medida'], 'string', 'max' => 15],
            [['loja_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Loja::class, 'targetAttribute' => ['loja_fk' => 'id']],
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
            'codigo_interno' => 'Codigo Interno',
            'descricao' => 'Descricao',
            'preco' => 'Preco',
            'unidade_medida' => 'Unidade Medida',
            'link_imagem' => 'Link da imagem do Produto',
            'loja_fk' => 'Loja',
        ];
    }

    /**
     * Gets query for [[Compras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compras::class, ['id' => 'id_compra'])->viaTable('produtoscompras', ['id_produto' => 'id']);
    }

    /**
     * Gets query for [[Loja]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoja()
    {
        return $this->hasOne(Loja::class, ['id' => 'loja_fk']);
    }

    /**
     * Gets query for [[ProdutosCompras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutosCompras()
    {
        return $this->hasMany(ProdutosCompras::class, ['id_produto' => 'id']);
    }
}
