<?php

/* @var $post \common\models\blog\Post */
/* @var $tag \common\models\blog\Tags */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;

$this->title = $post->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('blog', 'Blog'), 'url' => '/blog'];
$this->params['breadcrumbs'][] = ['label' => Html::encode($post->category->name), 'url' => ['/blog/default/category', 'category' => Html::encode($post->category->alias)]];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>
    <?= Html::encode($post->title); ?>
</h1>
<div class="post-info">
    <?= Yii::t('blog', 'Category:'); ?>
    <?= Html::a(Html::encode($post->category->name),
        ['/blog/default/category', 'category' => Html::encode($post->category->alias)]
    ); ?>,
    <time datetime="<?= Yii::$app->formatter->asDate($post->updated_at, 'yyyy-MM-dd'); ?>">
        <?= Yii::t('blog', 'Date:'); ?> <?= Yii::$app->formatter->asDate($post->updated_at, 'long'); ?>
    </time>
</div>
<div class="post-content">
    <?= HtmlPurifier::process(Markdown::process($post->content, 'gfm')); ?>
</div>
<?= Html::a(Yii::t('blog', 'Update post'), ['/blog/post/update', 'id' => $post->id], ['class' => '']); ?>
<div class="post-tags">
    <?= Yii::t('blog', 'Tags:'); ?>
    <?php foreach ($post->tags as $tag): ?>
        <?= Html::encode($tag->name); ?>
    <?php endforeach; ?>
</div>
<div class="post-info-panel">
    <?= Yii::t('blog', 'Author:'); ?> <?= Html::encode($post->author->username); ?>
</div>

