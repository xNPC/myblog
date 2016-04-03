<?php

namespace common\models\blog;

use Yii;
use \yii\db\ActiveRecord;
use common\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%blog_post}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $anons
 * @property string $content
 * @property integer $author_id
 * @property integer $category_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $author
 * @property Category $category
 * @property PostTags[] $tags
 * @property mixed post
 */
class Post extends ActiveRecord
{

    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;
    const STATUS_DELETED = 20;

    const CUT_STR = '<разделитель>';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%blog_post}}';
    }

    public function behaviors()
    {
        return [

            TimestampBehavior::className(),
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'author_id',
                'updatedByAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'alias', 'anons', 'content'], 'required'],
            [['anons', 'content'], 'string'],
            [['author_id', 'category_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('blog', 'ID'),
            'title' => Yii::t('blog', 'Title'),
            'alias' => Yii::t('blog', 'Alias'),
            'anons' => Yii::t('blog', 'Anons'),
            'content' => Yii::t('blog', 'Content'),
            'author_id' => Yii::t('blog', 'Author ID'),
            'category_id' => Yii::t('blog', 'Category ID'),
            'status' => Yii::t('blog', 'Status'),
            'created_at' => Yii::t('blog', 'Created At'),
            'updated_at' => Yii::t('blog', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTags::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tags::className(), ['id' => 'tag_id'])
            ->via('postTags');
    }

    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [
            self::STATUS_INACTIVE => Yii::t('blog', 'Inactive'),
            self::STATUS_ACTIVE => Yii::t('blog', 'Active'),
            self::STATUS_DELETED => Yii::t('blog', 'Deleted'),
        ];
    }
}
