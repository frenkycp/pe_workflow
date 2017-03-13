<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\search\WiHistorySearch $searchModel
*/

$this->title = 'Wi Histories';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="giiant-crud wi-history-index">

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
                'url' => ['wi/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'Wi' . '</i>',
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
                    <i><?= 'Wi Histories' ?></i>
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
            'urlCreator' => function($action, $model, $key, $index) {
                // using the column name as key, not mapping to 'id' like the standard generator
                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                return Url::toRoute($params);
            },
            'contentOptions' => ['nowrap'=>'nowrap']
        ],
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
[
    'class' => kartik\grid\DataColumn::className(),
    'attribute' => 'wiDocno',
		'width' => '20%',
		'hAlign' => 'center',
    'value' => function ($model) {
        if ($rel = $model->getWi()->one()) {
            return Html::a($rel->wi_docno, ['wi/view', 'wi_id' => $rel->wi_id,], ['data-pjax' => 0]);
        } else {
            return '';
        }
    },
    'format' => 'raw',
],
			//'wi_rev',
			[
			'attribute' => 'wi_rev',
			'hAlign' => 'center',
					'width' => '5%',
			],
			//'wi_maker_id',
			[
					'attribute' => 'wi_maker_id',
					'value' => 'user.name',
					'hAlign' => 'center',
					'width' => '15%',
    ],
			//'flag',
			//'revised_date',
			//'check1_date',
			//'check2_date',
			//'check3_date',
			//'approved_date',
			//'release_date',
			[
					'attribute' => 'release_date',
					'format' => 'datetime',
					'hAlign' => 'center',
					'width' => '20%',
    ],
			//'purpose',
			[
			'attribute' => 'purpose',
					'format' => 'raw',
			'value' => function ($model){
				if(strpos($model->purpose, '<br/>') !== false)
				{
					$pos = strpos($model->purpose, '<br/>');
					return substr($model->purpose, 0, $pos) . '... ' . Html::a('Read More', ['/wi-history/view', 'id' => $model->id]);
				}
				if(strlen($model->purpose) > 40)
				{
					return substr($model->purpose, 0, 40) . '... ' . Html::a('Read More', ['/wi-history/view', 'id' => $model->id]);
				}
				return $model->purpose;
    		},
			'width' => '40%',
			],
			/*'wi_filename:ntext'*/
			/*'wi_file:ntext'*/
			/*'wi_stagestat'*/
                ],
            ]); ?>
                </div>

            </div>

        </div>

        <?php \yii\widgets\Pjax::end() ?>

    
</div>
