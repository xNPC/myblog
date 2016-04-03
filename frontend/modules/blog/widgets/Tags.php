<?php

namespace frontend\modules\blog\widgets;

use Yii;
use yii\helpers\Html;
use yii\base\Widget;
use yii\base\InvalidParamException;

class Tags extends Widget
{
    /**
     * Имя класса
     * @var string $tagsClass
     */
    public $tagsClass;

    /**
     * Количество выводимых тегов
     * @var integer $limit
     */
    public $limit;

    public function init()
    {
        if (!$this->tagsClass) {
            throw new InvalidParamException('Не найдено "tagsClass"');
        }

        if (!$this->limit) {
            $this->limit = 1;
        }

        parent::init();
    }

    public function run()
    {
        /**
         * @var $model \yii\db\ActiveRecord
         */
        $model = $this->tagsClass;
        $tags = $model::find()
            ->OrderBy('name ASC')
            ->limit($this->limit)
            ->all();

        echo '<b>'.Yii::t('blog', 'Tags').':</b>';
        echo '<ul>';

        foreach ($tags as $tag) {
            echo '<li>'.Html::a(Html::encode($tag->name),['/blog/default/tags', 'tags' => $tag->name]).'</li>';
        }

        echo '</ul>';

    }
}