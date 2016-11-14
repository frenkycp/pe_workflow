<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use kartik\grid\GridView;

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

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    <i><?php 
						if(isset($_GET['index_type']))
						{
							if($_GET['index_type'] == 'open')
							{
								echo 'WI OPEN';
							}
							else{
								
							}
						}
						else
						{
							echo 'ALL WI LIST';
						}
					?></i>
                </h2>
            </div>

            <div class="panel-body">

                <div class="table-responsive">
                <?= GridView::widget([
                'layout' => '{items}{summary}{pager}',
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
			'template' => \Yii::$app->user->identity->role->id == 1 ? '{view} {update} {delete}' : '{view} {checkout} {checkin} {check_masterlist} {check_smile}',
			'buttons'=>[
				'checkout' => function ($url, $model, $key) {
					return $model->wi_status == "OPEN" ? Html::a('<span class="glyphicon glyphicon-cloud-download" style="padding-left: 5px;"></span>', ['checkout', 'id'=>$model->wi_id],['title'=>'Checkout']) : "";
				},
				'checkin' => function ($url, $model, $key) {
					return $model->wi_status == "CHECKOUT BY " . Yii::$app->user->identity->name ? Html::a('<span class="glyphicon glyphicon-cloud-upload" style="padding-left: 5px;"></span>', ['checkin', 'id'=>$model->wi_id],['title'=>'Checkin']) : "";
				},
				'check_masterlist' => function ($url, $model, $key) {
					return $model->wi_status == "CHECKIN"  && Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin1'] ? Html::a('<span class="glyphicon glyphicon-list-alt" style="padding-left: 5px;"></span>', ['check_masterlist', 'id'=>$model->wi_id],['title'=>'Check Masterlist']) : "";
				},
				'check_smile' => function ($url, $model, $key) {
					return $model->wi_status == Yii::$app->params['STATUS_CHECK_MASTERLIST'] ? Html::a('<span class="glyphicon glyphicon-hdd" style="padding-left: 5px;"></span>', ['check_smile', 'id'=>$model->wi_id],['title'=>'Check SMILE']) : "";
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
