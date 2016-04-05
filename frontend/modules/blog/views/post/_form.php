<?php

use ijackua\lepture\Markdowneditor;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\blog\Post;
use common\models\blog\Category;

/* @var $this yii\web\View */
/* @var $post frontend\modules\blog\models\PostForm */
/* @var $form ActiveForm */
?>
<div class="form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($post, 'title') ?>

    <?= $form->field($post, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->OrderBy('name')->all(),'id', 'name')) ?>

    <?= $form->field($post, 'status')->dropDownList(Post::getStatuses()) ?>

    <?= $form->field($post, 'content', [
        'template' => "{label}\n{error}\n{input}\n{hint}"
    ])->widget(Markdowneditor::className()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('blog', $post->post->isNewRecord ? 'Create' : 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- _form -->
