<?php

namespace app\models;

use Yii;
use \yii\db\Query;

/**
 * This is the model class for table "ProdutosCompras".
 *
 * @property int $id_compra
 * @property int $id_produto
 * @property float|null $valor
 * @property float|null $quantidade
 *
 * @property Compras $compra
 * @property Produtos $produto
 */
class ProdutosCompras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtoscompras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_compra', 'id_produto'], 'required'],
            [['id_compra', 'id_produto'], 'integer'],
            [['valor', 'quantidade'], 'number'],
            [['id_compra', 'id_produto'], 'unique', 'targetAttribute' => ['id_compra', 'id_produto']],
            [['id_compra'], 'exist', 'skipOnError' => true, 'targetClass' => Compras::class, 'targetAttribute' => ['id_compra' => 'id']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produtos::class, 'targetAttribute' => ['id_produto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_compra' => 'Compra',
            'id_produto' => 'Produto',
            'valor' => 'Valor',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[Compra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompra()
    {
        return $this->hasOne(Compras::class, ['id' => 'id_compra']);
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produtos::class, ['id' => 'id_produto']);
    }

    public function getVendasPorProdutos()
    {
        $query = (new Query())->select(['SUM(produtoscompras.valor) as valor', 'SUM(produtoscompras.quantidade) as quantidade', 'loja.nome as loja', 'produtos.nome as produto'])
            ->from('produtoscompras')
            ->join('LEFT JOIN', 'produtos', 'produtos.id = produtoscompras.id_produto')
            ->join('LEFT JOIN', 'loja', 'loja.id = produtos.loja_fk')
            ->groupBy(['produtos.id'])
            ->orderBy([
                'quantidade' => SORT_DESC,
             ]);
        ;

        return $query->all();
    }
}
