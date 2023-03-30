<?php

namespace app\src\infrastructure\repositories;

use app\src\infrastructure\models\Product;

interface ProductRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create(Product $product);
    public function update(Product $product);
    public function delete($id);

}