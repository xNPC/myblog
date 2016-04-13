<?php

/* @var $this \yii\web\View */
/* @var $post \common\models\blog\Post */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;

?>
<h2>
    <?= Html::a(Html::encode($post->title),
        ['post/view', 'id' => Html::encode($post->id)]
    ); ?>
</h2>
<div class="post-info">
    <?= Yii::t('blog', 'Category:'); ?>
    <?= Html::a(Html::encode($post->category->name),
        ['/blog/default/category', 'category' => Html::encode($post->category->alias)]
    ); ?>,
    <time datetime="<?= Yii::$app->formatter->asDate($post->updated_at, 'yyyy-MM-dd'); ?>">
        <?= Yii::t('blog', 'Date:'); ?> <?= Yii::$app->formatter->asDate($post->updated_at, 'long'); ?>
    </time>
</div>
<div class="post-anons">
    <?= HtmlPurifier::process(Markdown::process($post->anons, 'gfm')); ?>
</div>
<?php if ($post->anons !== $post->content) {?>
<div class="read-more">
    <?= Html::a(Yii::t('blog', 'Read more...'),
        ['post/view', 'id' => Html::encode($post->id)]
    ); ?>
</div>
<?php } ?>
<div class="post-info-panel">
    <?= Yii::t('blog','Author:'); ?> <?= Html::encode($post->author->username); ?>
</div>