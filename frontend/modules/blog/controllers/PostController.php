<?php

namespace frontend\modules\blog\controllers;

use Yii;
use yii\base\Response;
use yii\web\Controller;
use common\models\blog\Post;
use frontend\modules\blog\models\PostForm;
use yii\web\NotFoundHttpException;


class PostController extends Controller
{
    /**
     * @var string $defaultAction действие по умолчанию
     */
    public $defaultAction = 'view';

    /**
     * Просмотр поста
     *
     * @param int $id ПК поста
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionView($id = 0)
    {

        $post = Post::find()
            ->with(['author', 'tags', 'category'])
            ->where([
                Post::tableName().'.id' => $id,
                Post::tableName().'.status' => Post::STATUS_ACTIVE,
            ])
        ->one();

        if (!$post) {
            throw new NotFoundHttpException('Такая запись не существует');
        }

        return $this->render('view', [
            'post' => $post
        ]);
    }

    /**
     * Создание поста
     *
     * @return string
     */
    public function actionCreate()
    {
        $postModel = new Post();

        $postForm = new PostForm($postModel);

        if ($postForm->load(Yii::$app->request->post()) && $postForm->save()) {
            Yii::$app->session->setFlash('success', 'Пост успешно добавлен');
            return $this->redirect(['/blog/post/' . $postForm->post->id]);
        }

        return $this->render('create', [
            'post' => $postForm,
        ]);
    }

    /**
     * Обновление поста
     *
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        /** @var $postModel \common\models\blog\Post */
        $postModel = Post::find()
            ->where(['id' => $id])
            ->andFilterWhere(['NOT IN', 'status', Post::STATUS_DELETED])
            ->one();

        if (!$postModel) {
            throw new NotFoundHttpException('Такая запись не существует');
        }

        $postForm = new PostForm($postModel);

        if ($postForm->load(Yii::$app->request->post()) && $postForm->save()) {
            Yii::$app->session->setFlash('success', 'Пост успешно обновлен');
            return $this->redirect(['/blog/post/'.$postForm->post->id]);
        }

        return $this->render('update', [
            'post' => $postForm,
        ]);
    }
}
