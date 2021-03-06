<?php
namespace api\controllers;

use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use common\models\Post;
use yii\db\Query;

class PostController extends ActiveController
{
    public $modelClass = 'common\models\Post';

    //重写数据集合的actionIndex这个方法,
    //重写前要把原有的Index动作方法unset掉
//    public function actions()
//    {
//        return parent::actions(); // TODO: Change the autogenerated stub
//        $action = parent::actions();
//        unset($action['index']);
//        return $action;
//    }
//
    public function actionSearch()
    {
        $modelClass = $this->modelClass;
//        return new ActiveDataProvider(
//            [
//                'query' => $modelClass::find()->orderBy('id','DESC')->asArray(),
////                'query' => $modelClass::find()->asArray(),
//
//                'pagination' => ['pageSize' => 15],//设置页面有五条post
//                'sort' => [
//                    'defaultOrder' => [
//                        'id' => SORT_DESC,
////                       'title' => SORT_ASC,
//                    ]
//                ]
//            ]);
//        return new ActiveDataProvider([
//           'query' => Post::find()->orderBy('id DESC')->asArray(),
//
        return $post = \Yii::$app->db->createCommand("SELECT * FROM post LEFT JOIN test_user ON post.appid = test_user.openid order by post.id desc limit 5")
            ->queryAll();

//        return $post = \Yii::$app->db->createCommand("SELECT *,test_user.id AS user_id,post.id AS post_id FROM post LEFT JOIN test_user ON post.appid = test_user.openid order by post.id desc");

        return $post = \Yii::$app->db->createCommand("SELECT * FROM post LEFT JOIN test_user ON post.appid = test_user.openid order by post.id desc limit 5")->queryAll();

    }
//
//    public function actionSearch()
//    {
//        return Post::find()->where(['like','title',$_POST['keyword']])->all();
//    }
}