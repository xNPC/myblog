<?php

namespace common\models\blog;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%blog_category}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $description
 *
 * @property Post[] $Posts
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%blog_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'alias'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
            [['alias'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('blog', 'ID'),
            'name' => Yii::t('blog', 'Name'),
            'alias' => Yii::t('blog', 'Alias'),
            'description' => Yii::t('blog', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogPosts()
    {
        return $this->hasMany(Post::className(), ['category_id' => 'id']);
    }
}
