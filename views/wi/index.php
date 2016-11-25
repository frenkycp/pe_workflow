<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use kartik\grid\GridView;
use app\models\Wi;

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
                    	$wiStatusArr = [
                    			wi::$_STATUS_APPROVE, wi::$_STATUS_CHECK_FINAL, wi::$_STATUS_CHECK_MASTERLIST, wi::$_STATUS_CHECK_SMILE,
                    			wi::$_STATUS_CHECKIN, wi::$_STATUS_CHECKOUT, wi::$_STATUS_CLOSE, wi::$_STATUS_OPEN, wi::$_STATUS_REJECT,
                    			wi::$_STATUS_WAITING_APPR, Wi::$_STATUS_WAITING_DIST
                    	];
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
            'class' => 'yii\grid\ActionColumn',
			'header'=>'Actions',
			'template' => \Yii::$app->user->identity->role->id == 1 ? '{view} {update} {delete}' : Yii::$app->controller->id == 'wi' ? '{view}' : '{view} {checkout} {checkin} 
			{check_masterlist} {check_smile} {final_check} {waiting_app} {waiting_dist} {close_wi} {reject} {download}',
			'buttons'=>[
				'checkout' => function ($url, $model, $key) {
					return ($model->wi_status == "OPEN" || $model->wi_status == "REJECTED") && (Yii::$app->user->identity->role_id == Yii::$app->params['roleid_wimaker']) ? Html::a('<span class="glyphicon glyphicon-cloud-download" style="padding-left: 5px;"></span>', ['checkout', 'id'=>$model->wi_id], ['title'=>'Checkout']) : "";
				},
				'checkin' => function ($url, $model, $key) {
					return ($model->wi_status == Wi::$_STATUS_CHECKOUT && $model->wi_maker == Yii::$app->user->identity->name) ? Html::a('<span class="glyphicon glyphicon-cloud-upload" style="padding-left: 5px;"></span>', ['checkin', 'id'=>$model->wi_id], ['title'=>'Checkin']) : "";
				},
				'check_masterlist' => function ($url, $model, $key) {
					return $model->wi_status == Wi::$_STATUS_CHECKIN  && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin1'] ? Html::a('<span class="glyphicon glyphicon-list-alt" style="padding-left: 5px;"></span>', ['check-masterlist', 'id'=>$model->wi_id],['title'=>'Check Masterlist']) : "";
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
				},
				/* 'approval' => function ($url, $model, $key) {
					return $model->wi_status == Wi::$_STATUS_WAITING_APPR && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_approval'] && $_GET['index_type'] == 'my_job' ? Html::a('<span class="glyphicon glyphicon-thumbs-up" style="padding-left: 5px;"></span>', ['approval', 'id'=>$model->wi_id],['title'=>'Approve']) : "";
				}, */
				'reject' => function ($url, $model, $key) {
					 return in_array(Yii::$app->user->identity->role_id, Yii::$app->params['roleid_rejector']) && Yii::$app->controller->id == 'my-job' ? Html::a('<span class="glyphicon glyphicon-remove-sign" style="padding-left: 5px;"></span>', ['reject', 'id'=>$model->wi_id],['title'=>'Reject']) : "";
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
			'wi_model',
			'wi_section',
			'wi_docno',
			'wi_title',
			//'wi_stagestat',
			'wi_status',
			'wi_issue',
			'wi_rev',
			'wi_maker',
			'wi_dcn:ntext',
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
