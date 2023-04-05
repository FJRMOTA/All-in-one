<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Parcela".
 *
 * @property int $id
 * @property int $compra_fk
 * @property float|null $valor
 * @property int|null $tipo
 * @property string $data_vencimento
 * @property string|null $data_pagamento
 *
 * @property Compras $compraFk
 */
class Parcela extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parcela';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'compra_fk', 'data_vencimento'], 'required', 'message' => 'Este campo não pode ficar em branco.'],
            [['id', 'compra_fk', 'tipo'], 'integer'],
            [['valor'], 'number'],
            [['data_vencimento', 'data_pagamento'], 'safe'],
            [['id', 'compra_fk'], 'unique', 'targetAttribute' => ['id', 'compra_fk']],
            [['compra_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Compras::class, 'targetAttribute' => ['compra_fk' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Cod. identificador',
            'compra_fk' => 'Compra',
            'valor' => 'Valor',
            'tipo' => 'Tipo',
            'data_vencimento' => 'Data Vencimento',
            'data_pagamento' => 'Data Pagamento',
        ];
    }

    /**
     * Gets query for [[Compra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompra()
    {
        return $this->hasOne(Compras::class, ['id' => 'compra_fk']);
    }
}
