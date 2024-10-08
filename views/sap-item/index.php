<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use kartik\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\search\SapItem $searchModel
*/

$this->title = 'Sap Items';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="giiant-crud sap-item-index">

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
                        'items'        => [            [
                'url' => ['wi-part/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'Wi Part' . '</i>',
            ],]
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
                    <i><?= 'Sap Items' ?></i>
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
                		//'responsive' => 'true',
                'headerRowOptions' => ['class'=>'center-text'],
                		'rowOptions' => ['class' => 'center-text'],
                'columns' => [
                		
                        [
            'class' => 'yii\grid\ActionColumn',
            'urlCreator' => function($action, $model, $key, $index) {
                // using the column name as key, not mapping to 'id' like the standard generator
                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                return Url::toRoute($params);
            },
            'contentOptions' => ['nowrap'=>'nowrap']
        ],
			//'sap_partno',
			[
					'class' => '\kartik\grid\DataColumn',
					'attribute' => 'sap_partno',
					'hAlign' => 'center',
					'width' => '100px',
            ],
            [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'description',
            'hAlign' => 'center',
            ],
            [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'analyst_group',
            'hAlign' => 'center',
            		'width' => '100px',
            ],
            [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'analyst_desc',
            'hAlign' => 'center',
            ],
            [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'item_class',
            'hAlign' => 'center',
            'width' => '80px',
            ],
            [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'issue_type_desc',
            'hAlign' => 'center',
            ],
			//'insert_type',
			//'flag',
			//'description',
			//'uom',
			//'item_class',
			//'analyst_group',
			/*'issue_type_desc'*/
			/*'analyst_desc'*/
                ],
            ]); ?>
                </div>

            </div>

        </div>

        <?php \yii\widgets\Pjax::end() ?>

    
</div>
