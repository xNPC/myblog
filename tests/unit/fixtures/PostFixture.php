<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 22.03.2016
 * Time: 21:49
 */
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class PostFixture extends ActiveFixture
{
    public $modelClass = 'common\models\blog\Post';
    public $depends = ['tests\unit\fixtures\CategoryFixture'];
}