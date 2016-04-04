<?php

/* @var $this \yii\web\View */
/* @var $post \common\models\blog\Post */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>
<h2>
    <?= Html::a(Html::encode($post->title),
        ['post/view', 'id'=>Html::encode($post->id)]);
    ?>
</h2>
<div>
    <?= Yii::t('blog', 'Category:');?>
    <?= Html::a(Html::encode($post->category->name),
        ['/blog/default/category', 'category'=>Html::encode($post->category->alias)]);
    ?>
    ,
    <?=Yii::t('blog', 'Date'); ?>: <?=Yii::$app->formatter->asDate($post->updated_at, 'long');?>
</div>
<div class="post-anons">
    <?= HtmlPurifier::process($post->anons); ?>
</div>
<div class="read-more">
    <?= Html::a(Yii::t('blog', 'Read more...'),
        ['post/view', 'id'=>Html::encode($post->id)]);
    ?>
</div>
<div class="post-info">
    <?= Yii::t('blog','Author:');?> <?=Html::encode($post->author->username);?>
</div>