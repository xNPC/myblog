<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use frontend\assets\ClassicAsset;
use frontend\modules\blog\widgets\Tags;
use frontend\modules\blog\widgets\Category;
use common\widgets\Alert;

ClassicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="stylesheet" href="/css/styles/vs.css">
    <script src="/css/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <header>
        <div class="logo">< Style Page ></div>
    </header>
    <div class="page">
    <nav>
    <?php

    $menuItems = [
        ['label' => 'MyBlog.ru', 'url' => ['/']],
        ['label' => 'Блог', 'url' => ['/blog']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Контакты', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Выйти ('.Yii::$app->user->identity->username .')', 'url'=>['/site/logout'], 'template' => '<a href="{url}" data-method="post">{label}</a>'];
    }
    echo Menu::widget([
        'options' => ['class' => 'top-menu'],
        'items' => $menuItems,
    ]);

    ?>
    </nav>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
    <div class="rightcolumn">
        <div>
            <p><?= Html::a(Yii::t('blog', 'Create post'), ['/blog/post/create'], ['class' => 'btn btn-primary']); ?></p>
        </div>
        <div class="category">
            <?= Category::widget([
                'tagsClass' => '\common\models\blog\Category',
            ]);
            ?>
        </div>
        <div class="tags">
            <?= Tags::widget([
                'tagsClass' => '\common\models\blog\Tags',
                'limit' => '2'
            ]);
            ?>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Blog <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
        <div class="logo-footer">
            < / Style Page >
        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
