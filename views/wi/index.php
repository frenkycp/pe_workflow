<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use app\models\Wi;
use yii\helpers\ArrayHelper;
use app\models\WiStatus;
use app\models\WiRequest;
use app\models\WiHistory;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\search\WiSearch $searchModel
*/

$this->title = 'Work Instruction Record';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="giiant-crud wi-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= \Yii::$app->user->identity->role->id == 1 ? Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) : '' ?>
        </p>

        <div class="pull-right">

                        
            <?= '';
            /*\yii\bootstrap\ButtonDropdown::widget(
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
            ); */
            ?>        </div>
    </div>

    
        <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

        <!-- <div class="panel panel-default"> -->
            <!-- <div class="panel-heading">
                <h2>
                    <i><?php 
                    	$wiStatusArr = ArrayHelper::map(WiStatus::find()->where(['flag' => 1])->orderBy('status_name ASC')->all(), 'status_id', 'status_name');
                    	/* $wiStatusArr = [
                    			wi::$_STATUS_APPROVE, wi::$_STATUS_CHECK_FINAL, wi::$_STATUS_CHECK_MASTERLIST, wi::$_STATUS_CHECK_SMILE,
                    			wi::$_STATUS_CHECKIN, wi::$_STATUS_CHECKOUT, wi::$_STATUS_CLOSE, wi::$_STATUS_OPEN, wi::$_STATUS_REJECT,
                    			wi::$_STATUS_WAITING_APPR, Wi::$_STATUS_WAITING_DIST
                    	]; */
                    	
                    	if(in_array(\Yii::$app->user->identity->role_id, [1, 2]))
                    	{
                    		$template = '{view} {update} {delete}';
                    	}else{
                    		if(Yii::$app->controller->id == 'wi')
                    		{
                    			$template = '{view} {request}';
                    			if(Yii::$app->user->identity->role_id == Yii::$app->params['roleid_wimaker'])
                    			{
                    				$template = '{take_job} {submit} {view}';
                    			}
                    		}else{
                    			//$template = '{submit} {reject} {authorize} {remark}&nbsp;&nbsp;&nbsp;{view}';
                    			$template = '{view} {submit} {reject} {authorize}';
                    		}
                    	}
					?></i>
                </h2>
            </div> -->

            <!-- <div class="panel-body">  -->
                <div class="table-responsive">
                <?= GridView::widget([
                'layout' => '{items} {summary} {pager}',
                'dataProvider' => $dataProvider,
                		'resizableColumns'=>false,
                'pager'        => [
                    'class'          => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel'  => 'Last'
                ],
                		'filterModel' => $searchModel,
                		'panel' => [
                				'type' => 'primary',
                				'heading' => 'WI Masterlists',
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
                						'filename' => 'Document Masterlists',
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
                										'title' => 'Document Masterlists',
                										'subject' => 'Document Masterlists',
                										'keywords' => 'pdf, preceptors, export, other, keywords, here'
                								],
                						]
                				],
                				GridView::EXCEL => [
                						'filename' => 'WI_List_' . date('Ymd'),
                				],
                		],
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'headerRowOptions' => ['class'=>'x'],
                'columns' => [

		[
            'class' => 'kartik\grid\ActionColumn',
			'width' => '150px',
			'header'=>'Actions',
			'vAlign' => 'middle',
			'template' => $template,
			'buttons'=>[
				'take_job' => function ($url, $model, $key) {
					return in_array($model->wi_status, [1, 3, 5, 7, 9, 11, 13, 14]) && Yii::$app->controller->id == 'available-jobs' ? Html::a('<span class="glyphicon glyphicon-edit" style="padding-left: 5px;"></span>',
							['take-job', 'id'=>$model->wi_id],
							[
									'title'=> Yii::$app->user->identity->role_id == Yii::$app->params['roleid_wimaker'] ? 'Revise' : 'Process',
									'data-confirm' => Yii::t('yii', 'Are you sure you want to process this item?'),
							]) : '';
				},
				'request' => function ($url, $model, $key) {
					return strtoupper(Yii::$app->user->identity->role->name) == 'PROD. ADMIN' ? Html::a('REQUEST',
							['/wi-request/create', 'wi_id' => $model->wi_id], 
							['class' => 'btn btn-primary btn-xs']) : '';
				},
				'submit' => function ($url, $model, $key) {
					return  Yii::$app->user->identity->role_id == Yii::$app->params['roleid_wimaker'] ? Html::a('REVISE',
							['/my-job/submit', 'id'=>$model->wi_id],
							[
									'title'=> in_array($model->wi_status, [1, 2, 3, 13, 14]) ? '' : 'WI still in Workflow...',
									'data-confirm' => in_array($model->wi_status, [1, 2, 13, 14]) ? Yii::t('yii', 'Are you sure you want to revise WI ' . $model->wi_docno . ' ?') : false,
									'class' => 'btn btn-primary btn-xs',
									'onclick' => in_array($model->wi_status, [1, 2, 13, 14]) ? '' : 'return false',
									'disabled' => in_array($model->wi_status, [1, 2, 13, 14]) ? false : true,
							]) : "";
				},
				'authorize' => function ($url, $model, $key) {
					return in_array(Yii::$app->user->identity->role_id, Yii::$app->params['roleid_rejector']) & Yii::$app->controller->id == 'my-job' ? 
					Html::a('OK', ['authorize', 'id'=>$model->wi_id], [
							//'title'=>'Authorize', 
							'class' => 'btn btn-success btn-xs',
							'style' => 'margin-left: 5px;',
							'data-confirm' => Yii::t('yii', 'Are you sure you want to authorize this item?'),
					]) : "";
				},
				'reject' => function ($url, $model, $key) {
					 return in_array(Yii::$app->user->identity->role_id, Yii::$app->params['roleid_rejector']) && Yii::$app->controller->id == 'my-job' ? 
					 Html::a('REJECT',
					 		['reject', 'id'=>$model->wi_id],
					 		[
					 				//'title'=>'Reject',
					 				'class' => 'btn btn-danger btn-xs',
					 				'data-confirm' => Yii::t('yii', 'Are you sure you want to reject this item?'),
					 				
					 		]) : "";
					 //return $model->wi_status == Wi::$_STATUS_WAITING_APPR && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_approval'] ? Html::a('<span class="glyphicon glyphicon-thumbs-down" style="padding-left: 5px;"></span>', ['reject', 'id'=>$model->wi_id],['title'=>'Reject']) : "";
				},
				'remark' => function ($url, $model, $key) {
				//return in_array(Yii::$app->user->identity->role_id, Yii::$app->params['roleid_rejector']) && Yii::$app->controller->id == 'my-job' ?
				return Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin2'] && Yii::$app->controller->id == 'my-job' ?
				Html::a('REMARK',
						['wi-remark/create', 'wi_id'=>$model->wi_id],
						[
							'class' => 'btn btn-primary btn-xs',
							//'style' => 'margin-top: 8px;'
							//'data-confirm' => Yii::t('yii', 'Are you sure you want to reject this item?'),
						]) : "";
				/* Html::a('<span class="glyphicon glyphicon-tags" style="padding-left: 5px;"></span>',
						['wi-remark/create', 'wi_id'=>$model->wi_id],
						[
								'title'=>'Add Remark',
								//'data-confirm' => Yii::t('yii', 'Are you sure you want to reject this item?'),
						]) : ""; */
						//return $model->wi_status == Wi::$_STATUS_WAITING_APPR && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_approval'] ? Html::a('<span class="glyphicon glyphicon-thumbs-down" style="padding-left: 5px;"></span>', ['reject', 'id'=>$model->wi_id],['title'=>'Reject']) : "";
				},
				'view' => function ($url, $model, $key) {
				//return in_array(Yii::$app->user->identity->role_id, Yii::$app->params['roleid_rejector']) && Yii::$app->controller->id == 'my-job' ?
				return Html::a('VIEW',
						['wi/view', 'wi_id'=>$model->wi_id],
						[
								'class' => 'btn btn-info btn-xs',
								'style' => 'margin-right: 5px;',
						]);
				},
				'download' => function ($url, $model, $key) {
					if(($model->wi_status == Wi::$_STATUS_CHECKOUT && $model->wi_maker == Yii::$app->user->identity->name)
							|| ($model->wi_status == Wi::$_STATUS_CHECK_MASTERLIST && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin1'])
							|| ($model->wi_status == Wi::$_STATUS_CHECK_SMILE && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin2'])
							|| ($model->wi_status == Wi::$_STATUS_CHECK_FINAL && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_checker'])
							|| ($model->wi_status == Wi::$_STATUS_WAITING_APPR && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_approval'])
							|| ($model->wi_status == Wi::$_STATUS_WAITING_DIST && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin1'])
							)
					{
						return Html::a('<span class="glyphicon glyphicon-download-alt" style="padding-left: 5px;"></span>', ['download', 'id'=>$model->wi_id],['title'=>'Download', 'target' => '_blank']);
					}
				}
			],     
            'urlCreator' => function($action, $model, $key, $index) {
                // using the column name as key, not mapping to 'id' like the standard generator
                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                return Url::toRoute($params);
            },
			
            'contentOptions' => ['nowrap'=>'nowrap', 'class' => 'center-text']
        ],
			//'wi_model',
            [
            'class' => '\kartik\grid\DataColumn',
            'format' => 'raw',
            'attribute' => 'wi_docno',
            'hAlign' => 'center',
            'vAlign' => 'middle',
            'width'=>'150px',
            'value' => function ($model)
            {
            	$wiDocno = $model->wi_docno;
            	/* if(strlen($wiDocno) > 13)
            	{
            		$wiDocno = substr($model->wi_docno, 0, 11) . '...';
            	} */
            	return $wiDocno;
            	//return Html::a($wiDocno, ['wi/view', 'wi_id' => $model->wi_id], ['title' => $model->wi_docno, 'style' => 'font-weight: bold;']);
            },
            'filter' => $sectionDropdown,
            ],
			[
			'class' => '\kartik\grid\DataColumn',
			'hAlign' => 'center',
			'vAlign' => 'middle',
			'format' => 'raw',
			'attribute' => 'wi_model',
			'value' => function ($model)
			{
            	$wiModel = $model->wi_model;
				if(strlen($wiModel) > 23)
				{
					$wiModel = substr($wiModel, 0, 20) . '...';
					return '<span title="' . $model->wi_model . '">' . $wiModel . '</span>';
				}
				return $wiModel;
            },
			//'hidden' => true,
			//'noWrap' => true,
			'width' => '180px',
			],
			//'wi_section',
			[
			'class' => '\kartik\grid\DataColumn',
			'hAlign' => 'center',
			'attribute' => 'wi_section',
			'value' => 'wi_section',
			'hidden' => true,
			'noWrap' => true,
			'width' => '80px',
			],
			//'wi_docno',
			//'wi_title',
			[
			'attribute' => 'wi_title',
					'format' => 'raw',
			'value' => function ($model)
			{
            	$wiTitle = $model->wi_title;
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
			//'wi_stagestat',
			//'wi_status',
			[
					'attribute' => 'wi_status',
					'format' => 'html',
					'value' => function ($model){
						if($model->wiStatus->status_id == 13)
						{
							$labelClass = 'bg-green';
						}
						else if($model->wiStatus->status_id == 14 || $model->wiStatus->status_id == 1)
						{
							$labelClass = 'bg-red';
						}
						else 
						{
							$labelClass = 'bg-yellow';
						}
						return '<span style="padding: 1px 15px;" class="' . $labelClass . '">' . $model->wiStatus->status_name . '</span>';
            		},
					'hAlign' => 'center',
					'vAlign' => 'middle',
					'filter' => $wiStatusArr,
					'noWrap' => true,
					'width' => '200px',
            ],
			[
			'class' => '\kartik\grid\DataColumn',
			'hAlign' => 'center',
			'vAlign' => 'middle',
			'attribute' => 'wi_rev',
			'value' => 'wi_rev',
			'hidden' => false,
			'noWrap' => true,
			'width' => '50px',
			],
			[
			'class' => '\kartik\grid\DataColumn',
			'hAlign' => 'center',
			'vAlign' => 'middle',
			'attribute' => 'wi_maker',
			'value' => 'wi_maker',
			'hidden' => false,
			'noWrap' => true,
			'width' => '100px',
			],
			[
			'attribute' => 'revised_date',
			'label' => 'WI Maker Issue',
			'value' => function ($model){
            	if($model->revised_date == NULL)
            	{
           			return '<span class="text-aqua"><b><i>no history</i></span></b>';
           		}
				return date('d-M-Y', strtotime($model->revised_date));
           		//return date('Y-m-d H:i:s', strtotime($model->revised_date));
           	},
            'hAlign' => 'center',
            'vAlign' => 'middle',
            'width' => '100px',
			'format' => 'raw',
            ],
            [
			'attribute' => 'release_date',
			'label' => 'Release Date',
			'value' => function ($model){
				if($model->release_date == NULL)
				{
					if($model->revised_date != null)
					{
						return '<span class="text-light-blue"><b><i>in progress</i></span></b>';
					}
	           		return '<span class="text-aqua"><b><i>no history</i></span></b>';
	           	}
			return date('d-M-Y', strtotime($model->release_date));
			//return date('Y-m-d H:i:s', strtotime($model->release_date));
           	},
           	'hAlign' => 'center',
           	'vAlign' => 'middle',
           	'hidden' => true,
           	'width' => '90px',
           	'format' => 'raw',
            ],
                ],
            ]); ?>
                </div>

            <!-- </div> -->

        <!-- </div>  -->

        <?php \yii\widgets\Pjax::end() ?>

    
</div>
