<?php

namespace app\src\application\Product\services;

/**
 * Interface ProductServiceInterface that defines the methods that the ProductService class must implement
 */
interface ProductServiceInterface
{
    public function createProduct($name, $description, $price);
    public function updateProduct($id, $name, $description, $price);
    public function deleteProduct($id);
    public function getProductById($id);
    public function getAllProducts();

}