<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\search\WiRequestSearch $searchModel
*/

$this->title = 'Wi Requests';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="giiant-crud wi-request-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= '';//Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="pull-right">

                                                    
            <?= '';
            if(strtolower(Yii::$app->user->identity->role->name) == 'prod. admin')
            {
            	$template = '{view} {print}';
            }
            if(strtolower(Yii::$app->user->identity->role->name) == 'pe admin 1')
            {
            	$template = '{view} {print} {update} {closing}';
            }
            if(strtolower(Yii::$app->user->identity->role->name) == 'pe admin 2')
            {
            	$template = '{view} {update} {closing} {print}';
            }
            /*
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
            ); */
            ?>        </div>
    </div>

    
        <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

        <!-- <div class="panel panel-default"> -->
            <!-- <div class="panel-heading">
                <h2>
                    <i><?= ''; //Wi Requests' ?></i>
                </h2>
            </div> -->

            <!-- <div class="panel-body"> -->

                <div class="table-responsive">
                <?= GridView::widget([
                'layout' => '{summary}{pager}{items}{pager}',
                'dataProvider' => $dataProvider,
                		'resizableColumns'=>false,
                'pager'        => [
                    'class'          => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel'  => 'Last'                ],
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'headerRowOptions' => ['class'=>'x'],
                		'panel' => [
                				'type' => 'primary',
                				'heading' => 'WI Request List',
                				'before' => ' ',
                				'after' => false,
                		],
                		'toolbar' => [
                				'{export}',
                				'{toggleData}'
                		],
                		'export' => [
                				'target' => '_self',
                				'fontAwesome'=>true,
                		],
                		'exportConfig' => [
                				GridView::PDF => [
                						'filename' => 'WI Request List',
                						'config' => [
                								'methods' => [
                										'SetHeader' => [
                												['odd' => $pdfHeader, 'even' => $pdfHeader]
                										],
                										'SetFooter' => [
                												['odd' => $pdfFooter, 'even' => $pdfFooter]
                										],
                								],
                								'options' => [
                										'title' => 'WI Request List',
                										'subject' => 'WI Request List',
                										'keywords' => 'pdf, preceptors, export, other, keywords, here'
                								],
                						]
                				],
                				GridView::EXCEL => [
                						'filename' => 'WI_Request_Form_List_' . date('Ymd'),
                				],
                		],
                'columns' => [

                        [
            'class' => 'kartik\grid\ActionColumn',
			'width' => '100px',
			'header'=>'Actions',
			'template' => $template,
			'buttons' => [
				'print' => function ($url, $model, $key) {
					return Html::a('<span class="glyphicon glyphicon-print" style="padding-left: 5px;"></span>',
						['print', 'id' => $model->id],
						[
							'title' => 'Print Request Form',
							'target' => '_blank'
						]
					);
				},
				'closing' => function ($url, $model, $key) {
				return $model->status == 1 ? '<span class="glyphicon glyphicon-check" style="padding-left: 5px; color: rgba(60, 141, 188, 0.48);"></span>' : Html::a('<span class="glyphicon glyphicon-check" style="padding-left: 5px;"></span>',
						['closing', 'id' => $model->id],
						[
								'title' => 'Closing Request',
								'data-confirm' => Yii::t('yii', 'Are you sure you want to close this request?'),
						]
						);
				}
			],
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
			    'attribute' => 'wi_docno',
			    'value' => function ($model) {
			        if ($rel = $model->getWi()->one()) {
			            return $rel->wi_docno;//Html::a($rel->wi_docno, ['wi/view', 'wi_id' => $rel->wi_id,], ['data-pjax' => 0]);
			        } else {
			            return '';
			        }
			    },
			    'format' => 'raw',
			    'hAlign' => 'center',
			    'vAlign' => 'middle',
			    'width'=>'150px',
			],
			[
	    		'attribute' => 'wi_model',
	    		'value' => function ($model) {
		    		if($rel = $model->getWi()->one())
		    		{
		    			$wiModel = $rel->wi_model;
		    			/* if(strlen($wiModel) > 23)
		    			{
		    				$wiModel = substr($wiModel, 0, 20) . '...';
		    				return '<span title="' . $model->wi_model . '">' . $wiModel . '</span>';
		    			} */
		    			return $wiModel;
		    		}
		    		else {
		    			return '';
		    		}
	    		},
	    		'hAlign' => 'center',
	    		'vAlign' => 'middle',
	    		'noWrap' => false,
	    		'width' => '200px',
    		],
			[
					'attribute' => 'request_type',
					'value' => function ($model) {
						if($model->request_type == 1)
						{
							return 'CHANGE REQUEST';
						}
						else {
							return 'CONTROLLED COPY';
						}
    				},
    				'hAlign' => 'center',
    				'vAlign' => 'middle',
    				'noWrap' => true,
    				'width' => '100px',
    				'filter' => [1 => 'CHANGE REQUEST', 2 => 'CONTROLLED COPY'],
    		],
    		[
	    		'attribute' => 'request_date',
    			'format' => ['date', 'php:d-M-Y'],
	    		'hAlign' => 'center',
	    		'vAlign' => 'middle',
	    		'noWrap' => true,
	    		'width' => '100px',
    		],
    		[
	    		'attribute' => 'wi_title',
	    		'format' => 'raw',
	    		'value' => function ($model)
	    		{
	    			$wiTitle = $model->wi->wi_title;
	    			if(strlen($wiTitle) > 24)
	    			{
	    				$wiTitle = substr($wiTitle, 0, 21) . '...';
	    				return '<span title="' . $model->wi_title . '">' . $wiTitle . '</span>';
	    			}
	    			return $wiTitle;
	    		},
	    		'hAlign' => 'center',
	    		'vAlign' => 'middle',
	    		'noWrap' => true,
	    		'width' => '200px',
    		],
			//'requestor_id',
			[
				'attribute' => 'page_no',
				'hAlign' => 'center',
				'vAlign' => 'middle',
				'noWrap' => true,
				'width' => '100px',
				'hidden' => true,
			],
    		[
	    		'attribute' => 'requestor_id',
    			'label' => 'Requestor',
	    		'value' => 'requestor.name',
	    		'hAlign' => 'center',
	    		'vAlign' => 'middle',
	    		'noWrap' => true,
	    		'width' => '100px',
    		],
			/* [
				'attribute' => 'request_from',
				'hAlign' => 'center',
				'vAlign' => 'middle',
				'noWrap' => true,
				'width' => '100px',
			], */
			//'page_no',
			
    		[
	    		'attribute' => 'reason',
	    		'hAlign' => 'center',
	    		'vAlign' => 'middle',
	    		'noWrap' => true,
	    		'width' => '150px',
    		],
			[
				'attribute' => 'status',
				'format' => 'html',
				'value' => function ($model){
					if($model->status == 0)
					{
						$bg = 'bg-red';
						$reqStatus = 'OPEN';
						
					}
					elseif ($model->status == 1)
					{
						$bg = 'bg-green';
						$reqStatus = 'CLOSED';
					}
					return '<span style="padding: 1px 15px;" class="' . $bg . '">' . $reqStatus . '</span>';
				},
				'hAlign' => 'center',
				'vAlign' => 'middle',
				'noWrap' => true,
				'width' => '120px',
				'filter' => [0 => 'OPEN', 1 => 'CLOSE'],
			],
			/*'reason'*/
			/*'request_date'*/
			/*'required_date'*/
			/*'change_item'*/
                ],
            ]); ?>
                </div>

            <!-- </div> -->

        <!-- </div> -->

        <?php \yii\widgets\Pjax::end() ?>

    
</div>
