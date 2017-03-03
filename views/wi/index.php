<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use app\models\Wi;
use yii\helpers\ArrayHelper;
use app\models\WiStatus;

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
                    	$wiStatusArr = ArrayHelper::map(WiStatus::find()->orderBy('status_name ASC')->all(), 'status_id', 'status_name');
                    	/* $wiStatusArr = [
                    			wi::$_STATUS_APPROVE, wi::$_STATUS_CHECK_FINAL, wi::$_STATUS_CHECK_MASTERLIST, wi::$_STATUS_CHECK_SMILE,
                    			wi::$_STATUS_CHECKIN, wi::$_STATUS_CHECKOUT, wi::$_STATUS_CLOSE, wi::$_STATUS_OPEN, wi::$_STATUS_REJECT,
                    			wi::$_STATUS_WAITING_APPR, Wi::$_STATUS_WAITING_DIST
                    	]; */
                    	
                    	if(in_array(\Yii::$app->user->identity->role_id, [1, 2, 6]))
                    	{
                    		$template = '{view} {update} {delete}';
                    	}else{
                    		if(Yii::$app->controller->id == 'wi')
                    		{
                    			$template = '{view}';
                    			if(Yii::$app->user->identity->role_id == Yii::$app->params['roleid_wimaker'])
                    			{
                    				$template = '{view} {take_job}';
                    			}
                    		}else{
                    			$template = '{view} {take_job} {submit} {reject} {authorize} {download}';
                    		}
                    	}
                    /*
						if(isset($_GET['index_type']))
						{
							if($_GET['index_type'] == 'open')
							{
								echo 'WI OPEN';
							}
							else if($_GET['index_type'] == 'my_job'){
								echo 'MY JOB';
							}
						}
						else
						{
							echo 'ALL WI LIST';
						} */
					?></i>
                </h2>
            </div> -->

            <!-- <div class="panel-body">  -->
                <div class="table-responsive">
                <?= GridView::widget([
                'layout' => '{items} {summary} {pager}',
                'dataProvider' => $dataProvider,
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
                				GridView::EXCEL => [],
                		],
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'headerRowOptions' => ['class'=>'x'],
                'columns' => [

		[
            'class' => 'kartik\grid\ActionColumn',
				'width' => '80px',
			'header'=>'Actions',
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
				/* 'revise' => function ($url, $model, $key) {
					return in_array($model->wi_status, [1, 13, 14]) && (Yii::$app->user->identity->role_id == Yii::$app->params['roleid_wimaker']) ?
					Html::a('<span class="glyphicon glyphicon-edit" style="padding-left: 5px;"></span>', ['revise', 'id'=>$model->wi_id], ['title'=>'Revise']) : "";
				}, */
				'submit' => function ($url, $model, $key) {
					return ($model->wi_status == 2 && $model->wi_maker == Yii::$app->user->identity->name) ? Html::a('<span class="glyphicon glyphicon-cloud-upload" style="padding-left: 5px;"></span>',
							['submit', 'id'=>$model->wi_id],
							[
									'title'=>'Submit',
									'data-confirm' => Yii::t('yii', 'Are you sure you want to submit this item?'),
							]) : "";
				},
				'authorize' => function ($url, $model, $key) {
					return in_array(Yii::$app->user->identity->role_id, Yii::$app->params['roleid_rejector']) & Yii::$app->controller->id == 'my-job' ? 
					Html::a('<span class="glyphicon glyphicon-check" style="padding-left: 5px;"></span>', ['authorize', 'id'=>$model->wi_id], [
							'title'=>'Authorize', 
							'data-confirm' => Yii::t('yii', 'Are you sure you want to authorize this item?'),
					]) : "";
				},
				/* 'check_masterlist' => function ($url, $model, $key) {
					return $model->wi_status == 3  && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin1'] ?
					Html::a('<span class="glyphicon glyphicon-list-alt" style="padding-left: 5px;"></span>', ['check-masterlist', 'id'=>$model->wi_id],['title'=>'Check Masterlist']) : "";
					//return $model->wi_status == Wi::$_STATUS_CHECKIN  && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin1'] ? Html::a('<span class="glyphicon glyphicon-pushpin" style="padding-left: 5px;"></span>', ['check-masterlist', 'id'=>$model->wi_id],['title'=>'Check Masterlist']) : "";
				}, 
				'check_smile' => function ($url, $model, $key) {
					return $model->wi_status == Wi::$_STATUS_CHECK_MASTERLIST && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin2'] ? Html::a('<span class="glyphicon glyphicon-hdd" style="padding-left: 5px;"></span>', ['check-smile', 'id'=>$model->wi_id],['title'=>'Check SMILE']) : "";
					//return $model->wi_status == Wi::$_STATUS_CHECK_MASTERLIST && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin2'] ? Html::a('<span class="glyphicon glyphicon-pushpin" style="padding-left: 5px;"></span>', ['check-smile', 'id'=>$model->wi_id],['title'=>'Check SMILE']) : "";
				},
				'final_check' => function ($url, $model, $key) {
					return $model->wi_status == Wi::$_STATUS_CHECK_SMILE && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_checker'] ? Html::a('<span class="glyphicon glyphicon-scale" style="padding-left: 5px;"></span>', ['final-check', 'id'=>$model->wi_id],['title'=>'Final Check']) : "";
					//return $model->wi_status == Wi::$_STATUS_CHECK_SMILE && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_checker'] ? Html::a('<span class="glyphicon glyphicon-pushpin" style="padding-left: 5px;"></span>', ['final-check', 'id'=>$model->wi_id],['title'=>'Final Check']) : "";
				},
				'waiting_app' => function ($url, $model, $key) {
					return $model->wi_status == Wi::$_STATUS_CHECK_FINAL && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_approval'] ? Html::a('<span class="glyphicon glyphicon-hourglass" style="padding-left: 5px;"></span>', ['waiting-approval', 'id'=>$model->wi_id],['title'=>'Waiting Approval']) : "";
				},
				'waiting_dist' => function ($url, $model, $key) {
					return $model->wi_status == Wi::$_STATUS_WAITING_APPR && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin1'] ? Html::a('<span class="glyphicon glyphicon-hourglass" style="padding-left: 5px;"></span>', ['waiting-distribution', 'id'=>$model->wi_id],['title'=>'Waiting Distribution']) : "";
				},
				'close_wi' => function ($url, $model, $key) {
					return $model->wi_status == Wi::$_STATUS_WAITING_DIST && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin1'] ? Html::a('<span class="glyphicon glyphicon-ok" style="padding-left: 5px;"></span>', ['closing-wi', 'id'=>$model->wi_id],['title'=>'Close']) : "";
				}, */
				/* 'approval' => function ($url, $model, $key) {
					return $model->wi_status == Wi::$_STATUS_WAITING_APPR && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_approval'] && $_GET['index_type'] == 'my_job' ? Html::a('<span class="glyphicon glyphicon-thumbs-up" style="padding-left: 5px;"></span>', ['approval', 'id'=>$model->wi_id],['title'=>'Approve']) : "";
				}, */
				'reject' => function ($url, $model, $key) {
					 return in_array(Yii::$app->user->identity->role_id, Yii::$app->params['roleid_rejector']) && Yii::$app->controller->id == 'my-job' ? 
					 Html::a('<span class="glyphicon glyphicon-alert" style="padding-left: 5px;"></span>',
					 		['wi-remark/create', 'wi_id'=>$model->wi_id],
					 		[
					 				'title'=>'Reject',
					 				'data-confirm' => Yii::t('yii', 'Are you sure you want to reject this item?'),
					 		]) : "";
					 //return $model->wi_status == Wi::$_STATUS_WAITING_APPR && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_approval'] ? Html::a('<span class="glyphicon glyphicon-thumbs-down" style="padding-left: 5px;"></span>', ['reject', 'id'=>$model->wi_id],['title'=>'Reject']) : "";
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
            'width'=>'100px',
            'value' => function ($model) {
            return $model->wi_file == null || $model->wi_file == '' ? $model->wi_docno : Html::a($model->wi_docno, Yii::$app->request->hostInfo . '/workflow/' . $model->wi_file);
            },
            'filter' => $sectionDropdown,
            ],
			[
			'class' => '\kartik\grid\DataColumn',
			'hAlign' => 'center',
			'attribute' => 'wi_model',
			'value' => 'wi_model',
			//'hidden' => true,
			'noWrap' => true,
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
			'value' => 'wi_title',
			'hAlign' => 'center',
			'noWrap' => true,
			'width' => '200px',
			],
			//'wi_stagestat',
			//'wi_status',
			[
					'attribute' => 'wi_status',
					'value' => 'wiStatus.status_name',
					'hAlign' => 'center',
					'filter' => $wiStatusArr,
					'noWrap' => true,
					'width' => '250px',
            ],
            //'wi_issue',
			//'wi_rev',
			[
			'class' => '\kartik\grid\DataColumn',
			'hAlign' => 'center',
			'attribute' => 'wi_rev',
			'value' => 'wi_rev',
			'hidden' => false,
			'noWrap' => true,
			'width' => '50px',
			],
			//'wi_maker',
			[
			'class' => '\kartik\grid\DataColumn',
			'hAlign' => 'center',
			'attribute' => 'wi_maker',
			'value' => 'wi_maker',
			'hidden' => false,
			'noWrap' => true,
			'width' => '100px',
			],
			//'wi_dcn:ntext',
			[
			'class' => '\kartik\grid\DataColumn',
			'hAlign' => 'center',
			'attribute' => 'wi_dcn',
			'value' => 'wi_dcn',
			'hidden' => true,
			'noWrap' => true,
			'width' => '100px',
			],
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

            <!-- </div> -->

        <!-- </div>  -->

        <?php \yii\widgets\Pjax::end() ?>

    
</div>
