<?php
use yii\helpers\Html;
use common\models\Post;
use yii\widgets\ListView;
use frontend\components\TagsCloudWidget;
/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Posts');

?>


<div class="container">

    <div class="row">


        <div class="col-md-9">
            <h2>最新文章动态</h2>
            <?= ListView::widget([
                'id'=>'postList',
                'dataProvider'=>$dataProvider,
                'itemView'=>'../post/_listitem',//子视图,显示一篇文章的标题等内容.
                'layout'=>'{items} {pager}',
                'pager'=>[
                    'maxButtonCount'=>10,
                    'nextPageLabel'=>Yii::t('app','下一页'),
                    'prevPageLabel'=>Yii::t('app','上一页'),
                ],
            ])?>

        </div>


        <div class="col-md-3">
            <div class="searchbox">
                <ul class="list-group">

                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>查找文章(<?= Post::find()->count();?>)
                    </li>
                    <li class="list-group-item">
                        <form class="form-inline" action="<?= Yii::$app->urlManager->createUrl(['post/index']);?>" id="w0" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control" name="PostSearch[title]" id="w0input" placeholder="按标题">

                            </div>
                            <button type="submit" class="btn btn-default">搜索</button>
                        </form>
                    </li>
                </ul>
            </div>

            <div class="tagcloudbox">
                <ul class="list-group">

                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>标签云
                    </li>
                    <li class="list-group-item">
                        <?= TagsCloudWidget::widget(['tags'=>$tags])?>
                    </li>
                </ul>
            </div>


            <div class="commmentbox">
                <ul class="list-group">

                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                    </li>
                    <li class="list-group-item">最新回复
                            <?= \frontend\components\RctReplyWidget::widget(['recentComments'=>$recentComments])?>
                    </li>
                </ul>
            </div>

        </div>

    </div>



    <div class="body-content">




    </div>
</div>