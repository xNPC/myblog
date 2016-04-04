<?php

namespace frontend\modules\blog\controllers;

//use yii\base\Response;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use common\models\blog\Post;
use common\models\blog\Category;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    /**
     * Список постов
     */
    public function actionIndex()
    {
        $query = Post::find()
            ->with('author', 'category')
            ->andWhere([Post::tableName().'.status' => POST::STATUS_ACTIVE])
            ->orderBy('created_at DESC');

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
     * @throws NotFoundHttpException
     */
    public function actionCategory($category)
    {
        /**
         * @var $categoryModel \common\models\blog\Category
         */
        $categoryModel = Category::find()
            ->andWhere(['alias' => $category])
            ->one();

        if (!$categoryModel) {
            throw new NotFoundHttpException('Такого раздела не существует!');
        }

        $query = $categoryModel->getPosts()
            ->with('author', 'category')
            ->andWhere([Post::tableName().'.status' => Post::STATUS_ACTIVE])
            ->orderBy('created_at DESC');

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