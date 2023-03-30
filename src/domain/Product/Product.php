<?php

namespace app\src\domain\Product;

use yii\base\Model;

/**
 * Product is the model behind the product form.
 */
class Product extends Model
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $created_at;
    public $updated_at;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'price', 'description',], 'required'],
            [['name', 'description',], 'string'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


}
