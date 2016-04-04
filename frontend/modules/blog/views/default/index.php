<?php

/**
 * @var $posts \yii\data\ActiveDataProvider
 * @var string $category Название категории, для контроллера category
 */

use yii\helpers\Html;
use yii\widgets\LinkPager;

//$category = $posts;

$this->title = $category ? Html::encode($category) : Yii::t('blog', 'Blog');
$this->params['breadcrumbs'][] = $category ? ['label' => Yii::t('blog', 'Blog'), 'url' => '/blog'] : $this->title;
$category ? $this->params['breadcrumbs'][] = $category : false ;

?>
<div>
    <?php foreach($posts->getModels() as $post): ?>
        <?= $this->render('_post', ['post' => $post]); ?>
    <?php endforeach; ?>

    <?php
        echo LinkPager::widget([
            'pagination' => $posts->getPagination(),
    ]);?>
</div>
