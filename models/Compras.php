<?php

namespace app\models;

use Yii;
use \yii\db\Query;

/**
 * This is the model class for table "Compras".
 *
 * @property int $id
 * @property string $data
 * @property float $valor_bruto
 * @property float|null $valor_liquido
 * @property float|null $desconto
 * @property float|null $frete
 * @property int $status
 * @property int|null $pessoa_fk
 * @property int|null $loja_fk
 *
 * @property Loja $lojaFk
 * @property Parcela[] $parcelas
 * @property Pessoa $pessoaFk
 * @property Produtos[] $produtos
 * @property ProdutosCompras[] $produtoscompras
 */
class Compras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'valor_bruto', 'status'], 'required', 'message' => 'Este campo não pode ficar em branco.'],
            [['data'], 'safe'],
            [['valor_bruto', 'valor_liquido', 'desconto', 'frete'], 'number'],
            [['status', 'pessoa_fk', 'loja_fk'], 'integer'],
            [['loja_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Loja::class, 'targetAttribute' => ['loja_fk' => 'id']],
            [['pessoa_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::class, 'targetAttribute' => ['pessoa_fk' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'valor_bruto' => 'Valor Bruto',
            'valor_liquido' => 'Valor Liquido',
            'desconto' => 'Desconto',
            'frete' => 'Frete',
            'status' => 'Status',
            'pessoa_fk' => 'Pessoa',
            'loja_fk' => 'Loja',
        ];
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
     * Gets query for [[Parcelas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParcelas()
    {
        return $this->hasMany(Parcela::class, ['compra_fk' => 'id']);
    }

    /**
     * Gets query for [[Pessoa]].
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
        return $this->hasMany(Produtos::class, ['id' => 'id_produto'])->viaTable('produtoscompras', ['id_compra' => 'id']);
    }

    /**
     * Gets query for [[ProdutosCompras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutosCompras()
    {
        return $this->hasMany(ProdutosCompras::class, ['id_compra' => 'id'])->joinWith('produto');
    }

    public function getComprasPorLoja()
    {
        $query = (new Query())->select(['SUM(compras.valor_bruto) as valor', 'COUNT(compras.id) as quantidade', 'loja.nome as loja'])
            ->from('compras')
            ->join('LEFT JOIN', 'loja', 'loja.id = compras.loja_fk')
            ->groupBy(['loja'])
            ->orderBy([
                'valor' => SORT_DESC,
             ]);
        ;

        return $query->all();
    }
}
