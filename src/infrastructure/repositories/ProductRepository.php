<?php

namespace app\src\infrastructure\repositories;

use app\src\infrastructure\models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(): array
    {
        return Product::find()->asArray()->all();
    }

    public function getById($id)
    {
        return Product::find()->where(['id' => $id])->one();
    }

    public function create(Product $product)
    {

        return $product->save() ? $product : null;
    }

    public function update(Product $product): bool
    {
        return $product->save();
    }

    public function delete($id): int
    {
        return Product::deleteAll(['id' => $id]);
    }
}