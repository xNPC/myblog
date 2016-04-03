<?php

namespace frontend\modules\blog\controllers;

//use yii\base\Response;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use common\models\blog\Post;
use common\models\blog\Category;

class DefaultController extends Controller
{
    /**
     * Список постов
     */
    public function actionIndex()
    {
        $query = Post::find()
            ->where(['status' => 10,]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => \Yii::$app->params['BLOG.PAGE_SIZE'],
                'pageSizeParam' => false,
            ],
        ]);

        return $this->render('index', [
            'posts' => $provider,
        ]);
    }

    /**
     * Список постов по категориям
     * @param $category
     * @return string
     */
    public function actionCategory($category)
    {
        /**
         * @var $categoryModel \common\models\blog\Category
         */
        $categoryModel = Category::find()
            ->where(['alias' => $category])
            ->one();

        $query = Post::find()
            ->where(['category_id' => $categoryModel->id]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => \Yii::$app->params['BLOG.PAGE_SIZE'],
                'pageSizeParam' => false,
            ],
        ]);

        return $this->render('index', [
            'posts' => $provider,
            'category' => $categoryModel->name
        ]);
    }
}