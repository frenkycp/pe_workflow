<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\search\WiSearch $searchModel
*/

$this->title = 'Wis';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="giiant-crud wi-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="pull-right">

                        
            <?= 
            \yii\bootstrap\ButtonDropdown::widget(
                [
                    'id'       => 'giiant-relations',
                    'encodeLabel' => false,
                    'label'    => '<span class="glyphicon glyphicon-paperclip"></span> ' . 'Relations',
                    'dropdown' => [
                        'options'      => [
                            'class' => 'dropdown-menu-right'
                        ],
                        'encodeLabels' => false,
                        'items'        => []
                    ],
                    'options' => [
                        'class' => 'btn-default'
                    ]
                ]
            );
            ?>        </div>
    </div>

    
        <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    <i><?= 'Wis' ?></i>
                </h2>
            </div>

            <div class="panel-body">

                <div class="table-responsive">
                <?= GridView::widget([
                'layout' => '{summary}{pager}{items}{pager}',
                'dataProvider' => $dataProvider,
                'pager'        => [
                    'class'          => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel'  => 'Last'                ],
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'headerRowOptions' => ['class'=>'x'],
                'columns' => [

		[
            'class' => 'yii\grid\ActionColumn',
			'header'=>'Actions',
			'template' => '{view} {update} {delete} {checkout}',
			'buttons'=>[
				'checkout' => function ($url, $model, $key) {
					return $model->wi_status == "OPEN" ? Html::a('<span class="glyphicon glyphicon-circle-arrow-right"></span>', ['checkout', 'id'=>$model->wi_id],['title'=>'Checkout']) : "";
				},
			],     
            'urlCreator' => function($action, $model, $key, $index) {
                // using the column name as key, not mapping to 'id' like the standard generator
                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                return Url::toRoute($params);
            },
			
            'contentOptions' => ['nowrap'=>'nowrap']
        ],
			'wi_model',
			'wi_section',
			'wi_docno',
			'wi_title',
			'wi_stagestat',
			'wi_status',
			'wi_issue',
			'wi_rev',
			'wi_maker',
			/*'wi_filename:ntext',
			'wi_file:ntext',
			'wi_filename2:ntext',
			'wi_file2:ntext',*/
			
			/*'wi_stagestat'*/
			/*'wi_status'*/
			/*'wi_issue'*/
			/*'wi_title'*/
			/*'wi_maker'*/
			/*'wi_rev'*/
                ],
            ]); ?>
                </div>

            </div>

        </div>

        <?php \yii\widgets\Pjax::end() ?>

    
</div>
