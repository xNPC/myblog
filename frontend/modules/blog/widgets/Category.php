<?php

namespace frontend\modules\blog\widgets;

use Yii;
use yii\helpers\Html;
use yii\base\Widget;
use yii\base\InvalidParamException;

class Category extends Widget
{
    /**
     * Имя класса
     * @var string $tagsClass
     */
    public $tagsClass;

    public function init()
    {
        if (!$this->tagsClass) {
            throw new InvalidParamException('Не найдено "tagsClass"');
        }

        parent::init();
    }

    public function run()
    {
        /**
         * @var $model \yii\db\ActiveRecord
         */
        $model = $this->tagsClass;
        $Categories = $model::find()
            ->OrderBy('name ASC')
            ->all();

        echo '<b>'.Yii::t('blog', 'Categories').':</b>';
        echo '<ul>';

        foreach ($Categories as $category) {
            echo '<li>'.Html::a(Html::encode($category->name),['/blog/default/category', 'category' => $category->alias]).'</li>';
        }

        echo '</ul>';

    }
}