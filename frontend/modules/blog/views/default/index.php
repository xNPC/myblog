<?php

/**
 * @var $posts \yii\data\ActiveDataProvider
 * @var string $category Название категории, для контроллера category
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\LinkPager;

//$category = $posts;

$this->title = $category ? Html::encode($category) : Yii::t('blog', 'Blog');
$this->params['breadcrumbs'][] = $category ? ['label' => Yii::t('blog', 'Blog'), 'url' => '/blog'] : $this->title;
$category ? $this->params['breadcrumbs'][] = $category : false ;

?>
<div>
    <?php foreach($posts->getModels() as $post): ?>
    <h2>
        <?= Html::a(
            Html::encode($post->title),
            ['post/view', 'id'=>Html::encode($post->id)]
        ); ?>
    </h2>
    <div><?= HtmlPurifier::process($post->anons); ?></div>
    <dev>
         <?= Html::a(
             Yii::t('blog', 'Read more...'),
             ['post/view', 'id'=>Html::encode($post->id)]
         ); ?>
    </dev>
    <?php endforeach; ?>
    <div>
    <?php
        echo LinkPager::widget([
            'pagination' => $posts->getPagination(),
    ]);?>
    </div>
</div>
