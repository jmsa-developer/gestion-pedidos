<?php

namespace app\src\infrastructure\controllers;

use app\src\application\Product\services\ProductServiceInterface;
use app\src\domain\Product\Product;
use http\Client\Response;
use Yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    private ProductServiceInterface $productService;

    public function __construct($id, $module, ProductServiceInterface $productService, $config = [])
    {
        $this->productService = $productService;
        parent::__construct($id, $module, $config);
    }

    /**
     * Displays list of products and actions to Create, Update and Delete a Product.
     */
    public function actionIndex()
    {
        $products = $this->productService->getAllProducts();
        $dataProvider = new ArrayDataProvider();
        $dataProvider->allModels = $products;
        $dataProvider->key = 'id';


        return $this->render('index.twig', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $product = $this->productService->createProduct($model->name, $model->description, $model->price);
            if ($product) {
                Yii::$app->session->setFlash('success', 'Product created');
                return $this->redirect(['view', 'id' => $product->id]);
            }

            Yii::$app->session->setFlash('error', 'Product not created');
            return $this->redirect(['index']);
        }

        return $this->render('_form.twig', [
            'model' => $model,
        ]);
    }


    /**
     * Displays a single Product model.
     * @param int $id
     */
    public function actionView($id)
    {
        $model = $this->productService->getProductById($id);

        return $this->render('view.twig', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     */
    public function actionUpdate($id)
    {
        $model = $this->productService->getProductById($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $this->productService->updateProduct($model->id, $model->name, $model->description, $model->price);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('_form.twig', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     */
    public function actionDelete($id)
    {
        $this->productService->deleteProduct($id);
        return $this->redirect(['index']);
    }

}
