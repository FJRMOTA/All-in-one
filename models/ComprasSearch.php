<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Compras;

/**
 * ComprasSearch represents the model behind the search form of `app\models\Compras`.
 */
class ComprasSearch extends Compras
{
    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), [ 'pessoa.nome', 'loja.nome']);
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'pessoa_fk', 'loja_fk'], 'integer'],
            [['data', 'pessoa.nome', 'loja.nome'], 'safe'],
            [['valor_bruto', 'valor_liquido', 'desconto', 'frete'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Compras::find()->orderBy(['compras.data' => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith(['pessoa'])->orderBy('compras.data');
        $dataProvider->sort->attributes['pessoa.nome'] = [
            'asc' => ['pessoa.nome' => SORT_ASC],
            'desc' => ['pessoa.nome' => SORT_DESC],
        ];

        $query->joinWith(['loja'])->orderBy('compras.data');
        $dataProvider->sort->attributes['loja.nome'] = [
            'asc' => ['loja.nome' => SORT_ASC],
            'desc' => ['loja.nome' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'compras.id' => $this->id,
            'compras.data' => $this->data,
            'compras.valor_bruto' => $this->valor_bruto,
            'compras.valor_liquido' => $this->valor_liquido,
            'compras.desconto' => $this->desconto,
            'compras.frete' => $this->frete,
            'compras.status' => $this->status,
            'compras.pessoa_fk' => $this->pessoa_fk,
            'compras.loja_fk' => $this->loja_fk,
        ]);

        $query->andFilterWhere([
            'LIKE',
            'pessoa.nome',
            $this->getAttribute('pessoa.nome')
        ]);

        $query->andFilterWhere([
            'LIKE',
            'loja.nome',
            $this->getAttribute('loja.nome')
        ]);

        return $dataProvider;
    }
}
