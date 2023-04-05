<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produtos;

/**
 * ProdutosSearch represents the model behind the search form of `app\models\Produtos`.
 */
class ProdutosSearch extends Produtos
{
    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), ['loja.nome']);
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'codigo_interno'], 'integer'],
            [['nome', 'descricao', 'unidade_medida', 'link_imagem', 'loja.nome'], 'safe'],
            [['preco'], 'number'],
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
        $query = Produtos::find()->orderBy(['produtos.nome' => SORT_ASC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith(['loja'])->orderBy('nome');
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
            'produtos.id' => $this->id,
            'produtos.codigo_interno' => $this->codigo_interno,
            'produtos.preco' => $this->preco,
            'loja_fk' => $this->loja_fk,
        ]);

        $query
            ->andFilterWhere(['like', 'produtos.nome', $this->nome])
            ->andFilterWhere(['like', 'produtos.descricao', $this->descricao])
            ->andFilterWhere(['like', 'produtos.unidade_medida', $this->unidade_medida])
            ->andFilterWhere(['like', 'produtos.link_imagem', $this->link_imagem])
        ;

        
        $query->andFilterWhere([
            'LIKE',
            'loja.nome',
            $this->getAttribute('loja.nome')
        ]);


        return $dataProvider;
    }
}
