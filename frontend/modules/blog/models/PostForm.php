<?php
namespace frontend\modules\blog\models;

use Yii;
use common\models\blog\Post;
use common\models\blog\Category;
use yii\base\Model;
//use yii\helpers\ArrayHelper;

/**
 * Class PostForm
 * @package frontend\modules\blog\models
 * @property mixed post
 *
 */
class PostForm extends Model
{

    public $title;
    public $category_id;
    public $status;
    public $content;

    /* @var Post */
    private $postModel = null;

    public function __construct(Post $postModel, $config = [])
    {
        $this->postModel = $postModel;
        $this->setAttributes($this->postModel->getAttributes(['title', 'content', 'category_id', 'status']));

        parent::__construct($config);
    }

    public function rules()
    {
        return [
            ['title', 'filter', 'filter' => 'trim'],
            ['title', 'required'],
            ['title', 'string', 'min' => 3, 'max' => 255],

            ['content', 'filter', 'filter' => 'trim'],
            ['content', 'required'],
            ['content', 'string'],

            ['category_id', 'integer'],
            ['category_id', 'in', 'range' => array_keys(Category::find()->indexBy('id')->all())],

            ['status', 'integer'],
            ['status', 'default', 'value' => Post::STATUS_ACTIVE],
            ['status', 'in', 'range' => array_keys(Post::getStatuses())],

        ];
    }

    /*public function attributeLabels()
    {
        return Post::attributeLabels();
    }*/

    public function getAnons() {
        $anons = explode(Post::CUT_STR, $this->content);

        return $anons[0];
    }

    /**
     * @return bool|Post
     */
    public function save()
    {
        if ($this->validate()) {

            $this->post->title = $this->title;
            $this->post->category_id = $this->category_id;
            $this->post->status = $this->status;
            $this->post->content = $this->content ? str_replace(Post::CUT_STR, '', $this->content) : null;

            $this->post->anons = $this->getAnons();

            if ($this->post->save()) {
                return $this->post;
            }

        };

        return false;
    }

    /**
     * @return Post|null
     */
    public function getPost()
    {
        return $this->postModel;
    }
}