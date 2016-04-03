<?php

/* @var $post \common\models\blog\Post */
/* @var $tag \common\models\blog\Tags */

use yii\helpers\Html;

$this->title = Yii::t('blog', 'Update post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('blog', 'Blog'), 'url' => '/blog'];
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title).' '.Html::a('#'.$post->post->id, ['/blog/post/view', 'id' => $post->post->id]); ?></h1>

<?= $this->render('_form', ['post' => $post]) ?>