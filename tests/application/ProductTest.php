<?php

namespace app\tests\application;

use app\src\domain\Product\Product;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\db\Connection;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\test\ActiveFixture;
use yii\test\FixtureTrait;

class ProductTest extends \PHPUnit\Framework\TestCase
{
    use FixtureTrait;

    public function testRules()
    {
        $model = new Product();

        // Test required fields
        $model->name = null;
        $model->price = null;
        $model->description = null;
        $this->assertFalse($model->validate());
        $this->assertArrayHasKey('name', $model->getErrors());
        $this->assertArrayHasKey('price', $model->getErrors());
        $this->assertArrayHasKey('description', $model->getErrors());

        // Test valid data
        $model->name = 'Test Product';
        $model->price = 10.50;
        $model->description = 'This is a test product';
        $this->assertTrue($model->validate());
    }

    public function testAttributeLabels()
    {
        $model = new Product();

        // Test attribute labels
        $attributeLabels = $model->attributeLabels();
        $this->assertArrayHasKey('name', $attributeLabels);
        $this->assertArrayHasKey('price', $attributeLabels);
        $this->assertArrayHasKey('description', $attributeLabels);
        $this->assertArrayHasKey('created_at', $attributeLabels);
        $this->assertArrayHasKey('updated_at', $attributeLabels);
    }
}
