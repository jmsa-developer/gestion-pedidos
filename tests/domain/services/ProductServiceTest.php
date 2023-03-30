<?php

namespace app\tests\domain\services;

use app\src\application\Product\services\ProductService;
use app\src\infrastructure\models\Product;
use app\src\infrastructure\repositories\ProductRepository;
use app\src\infrastructure\repositories\ProductRepositoryInterface;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{
    /**
     * @var ProductRepositoryInterface
     */
    protected ProductRepositoryInterface $productRepository;

    /**
     * @var ProductService
     */
    protected ProductService $productService;

    protected function setUp(): void
    {
        $this->productRepository = $this->getMockBuilder(ProductRepository::class)
            ->onlyMethods(['create', 'update', 'delete', 'getById', 'getAll'])
            ->getMock();

        $this->productRepository->expects($this->any())
            ->method('create')
            ->willReturn(1);

        $this->productRepository->expects($this->any())
            ->method('update')
            ->willReturn(true);

        $this->productRepository->expects($this->any())
            ->method('delete')
            ->willReturn(1);

        $this->productRepository->expects($this->any())
            ->method('getById')
            ->willReturn(new Product(['id' => 1, 'name' => 'Test Product', 'description' => 'This is a test product', 'price' => 10.50]));

        $this->productRepository->expects($this->any())
            ->method('getAll')
            ->willReturn([new Product(['id' => 1, 'name' => 'Test Product', 'description' => 'This is a test product', 'price' => 10.50])]);
        $this->productService = new ProductService($this->productRepository);
    }

    public function testCreateProduct()
    {
        $name = 'Test Product';
        $description = 'This is a test product';
        $price = 10.50;

        $result = $this->productService->createProduct($name, $description, $price);

        $this->assertIsInt($result);
    }

    public function testUpdateProduct()
    {
        $id = 1;
        $name = 'Test Product';
        $description = 'This is a test product';
        $price = 10.50;

        $result = $this->productService->updateProduct($id, $name, $description, $price);

        $this->assertTrue($result);
    }

    public function testDeleteProduct()
    {
        $id = 1;

        $result = $this->productService->deleteProduct($id);

        $this->assertIsInt($result);
    }

    public function testGetProductById()
    {
        $id = 1;

        $result = $this->productService->getProductById($id);

        $this->assertInstanceOf(Product::class, $result);
    }

    public function testGetAllProducts()
    {
        $result = $this->productService->getAllProducts();

        $this->assertIsArray($result);
    }


}