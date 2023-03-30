<?php

namespace app\src\application\Product\services;

use app\src\infrastructure\models\Product;
use app\src\infrastructure\repositories\ProductRepositoryInterface;


/**
 * Class ProductService represents the service that manages the business logic of the product
 */
class ProductService implements ProductServiceInterface
{
    /**
     * Product Repository
     *
     * @var ProductRepositoryInterface
     */
    private ProductRepositoryInterface $product;

    public function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function createProduct($name, $description, $price)
    {
        $product = new Product();

        $product->name = $name;
        $product->description = $description;
        $product->price = $price;

        return $this->product->create($product);
    }

    public function updateProduct($id, $name, $description, $price)
    {
        $product = $this->product->getById($id);
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        return $this->product->update($product);
    }

    public function deleteProduct($id)
    {
        return $this->product->delete($id);
    }

    public function getProductById($id)
    {
        return $this->product->getById($id);
    }

    public function getAllProducts()
    {
        return $this->product->getAll();
    }

}