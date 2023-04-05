<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Loja;

/**
 * LojaSearch represents the model behind the search form of `app\models\Loja`.
 */
class LojaSearch extends Loja
{

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), ['pessoa.nome']);
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'numero'], 'integer'],
            [['nome', 'pessoa.nome', 'cnpj', 'email', 'telefone', 'data_abertura', 'data_fechamento', 'rua', 'cidade', 'estado', 'bairro', 'pais', 'complemento', 'link_imagem'], 'safe'],
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
        $query = Loja::find()->orderBy(['nome' => SORT_ASC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith(['pessoa'])->orderBy('nome');
        $dataProvider->sort->attributes['pessoa.nome'] = [
            'asc' => ['pessoa.nome' => SORT_ASC],
            'desc' => ['pessoa.nome' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'loja.id' => $this->id,
            'loja.data_abertura' => $this->data_abertura,
            'loja.data_fechamento' => $this->data_fechamento,
            'loja.numero' => $this->numero,
            'pessoa_fk' => $this->pessoa_fk,
        ]);

        $query
            ->andFilterWhere(['like', 'loja.nome', $this->nome])
            ->andFilterWhere(['like', 'loja.cnpj', $this->cnpj])
            ->andFilterWhere(['like', 'loja.email', $this->email])
            ->andFilterWhere(['like', 'loja.telefone', $this->telefone])
            ->andFilterWhere(['like', 'loja.rua', $this->rua])
            ->andFilterWhere(['like', 'loja.cidade', $this->cidade])
            ->andFilterWhere(['like', 'loja.estado', $this->estado])
            ->andFilterWhere(['like', 'loja.bairro', $this->bairro])
            ->andFilterWhere(['like', 'loja.pais', $this->pais])
            ->andFilterWhere(['like', 'loja.complemento', $this->complemento])
            ->andFilterWhere(['like', 'loja.link_imagem', $this->link_imagem])
        ;

        $query->andFilterWhere([
            'LIKE',
            'pessoa.nome',
            $this->getAttribute('pessoa.nome')
        ]);


        return $dataProvider;
    }
}
