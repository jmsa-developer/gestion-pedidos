<?php

namespace app\src\infrastructure\models;

use yii\db\ActiveRecord;

/**
 *
 * @property double $price
 * @property string $name
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 *
 */

class Product extends ActiveRecord
{

    public function rules()
    {
        return [
            [['name', 'price', 'description',], 'required'],
            [['name', 'description',], 'string'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

}