<?php

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
    <div class="row"><div class="col-xs-3">
    <?= $form->field($post, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->OrderBy('name')->all(),'id', 'name')) ?>
    </div><div class="col-xs-3">
    <?= $form->field($post, 'status')->dropDownList(Post::getStatuses()) ?>
    </div></div>
    <?= $form->field($post, 'content')->textarea(['rows' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('blog', $post->post->isNewRecord ? 'Create' : 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton(Yii::t('blog', 'Предпросмотр'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- _form -->
