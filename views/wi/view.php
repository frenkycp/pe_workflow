<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;
use kartik\grid\GridView;
use app\models\WiRemark;

/**
* @var yii\web\View $this
* @var app\models\Wi $model
*/

//$this->title = 'Wi ' . $model->wi_docno;
$this->title = 'Work Instruction';
$this->params['breadcrumbs'][] = ['label' => 'Wis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->wi_id, 'url' => ['view', 'wi_id' => $model->wi_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud wi-view">

    <!-- menu buttons -->
    <p class='pull-left' style="<?= in_array(Yii::$app->user->identity->role_id, [1, Yii::$app->params['roleid_admin2']]) ? '' : 'display:none;'?>">
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'wi_id' => $model->wi_id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-edit"></span> ' . 'Add Remark', ['wi-remark/create', 'wi_id' => $model->wi_id, 'remark_only' => 1],['class' => 'btn btn-primary']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'WI List', ['index'], ['class'=>'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                <?= $model->wi_docno ?>            </h2>
        </div>

        <div class="panel-body">



    <?php $this->beginBlock('app\models\Wi'); ?>
    
    <?php 
    if(!empty($wiHistory))
    {
    	$rejector = 'REJECTED BY ' . $wiHistory->rejector->name . ' ON ' . strtoupper(date('d-M-Y', strtotime($wiHistory->reject_date)));
    }else{
    	$rejector = 'REJECTED';
    	if($model->wi_remark <> '')
    	{
    		$rejector = 'REJECTED BY ' . $model->wi_remark;
    	}
    	
    }
    ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            //'wi_id',
    		'wi_docno',
        'wi_model',
    		'wi_title',
    		'wi_rev',
    		'wi_maker',
        'wi_section',
        
        
        'wi_stagestat',
        //'wiStatus.status_name',
    		[
    				'attribute' => 'wi_status',
    				'value' => $model->wi_status == 14 ? $rejector : $model->wiStatus->status_name,
    ],
        'wi_issue',
		[
			'attribute'=>'wi_file',
            'format'=>'raw',
			//'visible' => $model->wi_status == 13 || in_array(Yii::$app->user->identity->role_id, Yii::$app->params['roleid_superadmin']) ? true : false,
			'value' => $model->wi_file == null || $model->wi_file == '' ? $model->wi_filename : Html::a($model->wi_filename, Yii::$app->request->hostInfo . '/workflow/' . $model->wi_file),
			//'value' => Html::a($model->wi_filename, 'http://pe12/workflow/' . $model->wi_file, ['style' => in_array($model->wi_status, ['OPEN', 'CLOSE']) ? '' : 'display: none;']),
		],
    		[
    		'attribute'=>'wi_file2',
    		'label' => 'DDC',
    		'format'=>'raw',
    		//'visible' => $model->wi_status == 13 || in_array(Yii::$app->user->identity->role_id, Yii::$app->params['roleid_superadmin']) ? true : false,
    		'value' => $model->wi_file2 == null || $model->wi_file2 == '' ? '-' : Html::a($model->wi_filename2, Yii::$app->request->hostInfo . '/workflow/' . $model->wi_file2),
    		//'value' => Html::a($model->wi_filename, 'http://pe12/workflow/' . $model->wi_file, ['style' => in_array($model->wi_status, ['OPEN', 'CLOSE']) ? '' : 'display: none;']),
    		],
    		'wi_dcn:ntext',
        //'linkToFile',
    ],
    ]); ?>

    <hr/>

    <?= Yii::$app->user->identity->role_id == 1 ? Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'wi_id' => $model->wi_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
    'data-method' => 'post',
    ]) : '' ;?>
    <?php $this->endBlock(); ?>

	<?php $this->beginBlock('WiRemarks'); ?>
	<?php Pjax::begin(['id'=>'pjax-WiRemarks', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-WiRemarks ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">' . kartik\grid\GridView::widget([
		'layout' => '{summary}{pager}<br/>{items}{pager}',
		'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getWiHistories()->where(['wi_id' => $model->wi_id, 'wi_rev' => $model->wi_rev])->one() != NULL ? $model->getWiHistories()->where(['wi_id' => $model->wi_id, 'wi_rev' => $model->wi_rev])->one()->getWiRemarks() : WiRemark::find(-1), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-wiremarks']]),
		'pager'        => [
				'class' => yii\widgets\LinkPager::className(),
				'firstPageLabel' => 'First',
				'lastPageLabel'  => 'Last',
		],
		'columns' => [
				[
						'class'      => 'kartik\grid\ActionColumn',
						'template'   => '{view} {update}',
						'hAlign' => 'center',
						'contentOptions' => ['nowrap'=>'nowrap'],
						'urlCreator' => function ($action, $model, $key, $index) {
							// using the column name as key, not mapping to 'id' like the standard generator
							$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
							$params[0] = 'wi-remark' . '/' . $action;
							return $params;
						},
						'buttons'    => [
								'finish' => function ($url, $model, $key) {
								return (Yii::$app->user->identity->role_id == Yii::$app->params['roleid_wimaker'] && $model->status == 0) ? Html::a('<span class="glyphicon glyphicon-ok" style="padding-left: 5px;"></span>',
										['/wi-remark/finish', 'id' => $model->id, 'history_id' => $model->getHistory()->one()->id],
										[
												'title'=>'Finish',
												'data-confirm' => Yii::t('yii', 'Have you finished this task ?'),
												]) : "";
								},
						],
						'controller' => 'wi-remark'
            	],
            	[
            			'attribute' => 'username',
            			'label' => 'Author',
            			'format' => 'raw',
            			'hAlign' => 'center',
            			'vAlign' => 'middle',
            			'width' => '100px',
				],
				[
				'attribute' => 'statusStr',
				'format' => 'raw',
				'hAlign' => 'center',
				'vAlign' => 'middle',
						'width' => '100px',
						'hidden' => true,
				],
				//'remark_date',
				[
				'attribute' => 'remark_date',
				'format' => ['date', 'php:d-M-Y'],
				//'format' => 'datetime',
				'hAlign' => 'center',
				'vAlign' => 'middle',
				'width' => '150px',
				],
        'remark:ntext',
        
        //'feedback:ntext',
        [
        'attribute' => 'statusStr',
        'format' => 'raw',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '100px',
        'hidden' => true,
        ],
        //'statusStr',
        //'flag',
]
]) . '</div>' ?>
<?php Pjax::end() ?>
	<?php $this->endBlock(); ?>

	<?php $this->beginBlock('WiHistories'); ?> 
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'> 
 <?= ''; /* Html::a( 
           '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Wi Histories', 
           ['wi-history/index'], 
           ['class'=>'btn text-muted btn-xs'] 
       ) */ ?> 
 <?= '';/* Html::a( 
           '<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Wi History', 
           ['wi-history/create', 'WiHistory' => ['wi_id' => $model->wi_id]], 
           ['class'=>'btn btn-success btn-xs'] 
       ); */ ?> 
</div></div><?php Pjax::begin(['id'=>'pjax-WiHistories', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-WiHistories ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?> 
<?= '<div class="table-responsive">' . kartik\grid\GridView::widget([ 
   'layout' => '{summary}{pager}<br/>{items}{pager}', 
   'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getWiHistories()->where(['flag' => 1]), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-wihistories']]), 
   'pager'       => [ 
       'class'         => yii\widgets\LinkPager::className(), 
       'firstPageLabel' => 'First', 
       'lastPageLabel' => 'Last' 
   ], 
   'columns' => [[ 
   'class'     => 'yii\grid\ActionColumn', 
   'template'  => '{view} {update}', 
   'contentOptions' => ['nowrap'=>'nowrap'], 
   'urlCreator' => function ($action, $model, $key, $index) { 
       // using the column name as key, not mapping to 'id' like the standard generator 
       $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key]; 
       $params[0] = 'wi-history' . '/' . $action; 
       return $params; 
   }, 
   'buttons'   => [ 
        
   ], 
   'controller' => 'wi-history' 
], 
       //'id', 
		//'wi_rev',
   		//'linkedRev',
   		[
   				'attribute' => 'linkedRev',
   				'format' => 'raw',
   ],
		
		//'wi_stagestat', 
   [
   'attribute' => 'wi_maker_id',
   		'value' => 'user.name',
   'hAlign' => 'center',
   'label' => 'WI Maker',
   //'hidden' => true,
   ],
		//'revised_date',
		[
		'attribute' => 'revised_date',
		'format' => ['date', 'php:d-M-Y'],
		'label' => 'Revised',
   		],
		//'check1_date', 
		[
		'attribute' => 'check1_date',
		'format' => ['date', 'php:d-M-Y'],
		'label' => 'Masterlist Check',
		],
		//'check2_date', 
		[
		'attribute' => 'check2_date',
		'format' => ['date', 'php:d-M-Y'],
		'label' => 'SMILE Check',
		],
		//'check3_date', 
		[
		'attribute' => 'check3_date',
		'format' => ['date', 'php:d-M-Y'],
		'label' => 'Final Check',
		],
		//'approved_date', 
		[
		'attribute' => 'approved_date',
		'format' => ['date', 'php:d-M-Y'],
		'label' => 'Approved',
		],
		//'release_date', 
		[
		'attribute' => 'release_date',
		'format' => ['date', 'php:d-M-Y'],
		'label' => 'Release',
		],
		[
		'attribute' => 'reject_date',
		'format' => ['date', 'php:d-M-Y'],
		'label' => 'Reject',
		],
		[
		'attribute' => 'rejector_id',
		'value' => 'rejector.name',
		'label' => 'Reject By',
		],
       [
       		'attribute' => 'linkedRemark',
       		'format' => 'raw',
       		'hAlign' => 'center',
       		'label' => 'Uncompleted Task',
       		'hidden' => true,
       		],
] 
]) . '</div>' ?> 
<?php Pjax::end() ?> 
<?php $this->endBlock() ?>

<?php $this->beginBlock('WiRequest'); ?> 
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'> 
 <?= ''; /* Html::a( 
           '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Wi Histories', 
           ['wi-history/index'], 
           ['class'=>'btn text-muted btn-xs'] 
       ) */ ?> 
 <?= '';/* Html::a( 
           '<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Wi History', 
           ['wi-history/create', 'WiHistory' => ['wi_id' => $model->wi_id]], 
           ['class'=>'btn btn-success btn-xs'] 
       ); */ ?> 
</div></div><?php Pjax::begin(['id'=>'pjax-WiRequest', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-WiRequest ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?> 
<?= '<div class="table-responsive">' . kartik\grid\GridView::widget([ 
   'layout' => '{summary}{pager}<br/>{items}{pager}', 
   'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getWiRequest()->where(['flag' => 1]), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-wihistories']]), 
   'pager'       => [ 
       'class'         => yii\widgets\LinkPager::className(), 
       'firstPageLabel' => 'First', 
       'lastPageLabel' => 'Last' 
   ], 
   'columns' => [[ 
   'class'     => 'kartik\grid\ActionColumn', 
   'template'  => '{view} {update}', 
   		'width' => '100px',
   'contentOptions' => ['nowrap'=>'nowrap'], 
   'urlCreator' => function ($action, $model, $key, $index) { 
       // using the column name as key, not mapping to 'id' like the standard generator 
       $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key]; 
       $params[0] = 'wi-history' . '/' . $action; 
       return $params; 
   }, 
   'buttons'   => [ 
        
   ], 
   'controller' => 'wi-request' 
], 
       //'id', 
		//'wi_rev',
   		//'linkedRev',
   		[
   				'attribute' => 'requestType',
   				'hAlign' => 'center',
   				'width' => '150px',
   		],
   		[
		   		'attribute' => 'request_date',
   				'format' => ['date', 'php:d-M-Y'],
		   		'hAlign' => 'center',
		   		'width' => '100px',
   		],
   		[
   				'attribute' => 'requestor_id',
   				'value' => 'requestor.name',
   				'label' => 'Requestor',
   				'hAlign' => 'center',
   				'width' => '100px',
   		],
   		[
		   		'attribute' => 'request_from',
		   		'hAlign' => 'center',
		   		'width' => '100px',
   		],
   		[
		   		'attribute' => 'page_no',
		   		'hAlign' => 'center',
		   		'width' => '100px',
   		],
   		[
		   		'attribute' => 'statusStr',
   				'label' => 'Status',
		   		'hAlign' => 'center',
		   		'width' => '100px',
   		],
   		
   
] 
]) . '</div>' ?> 
<?php Pjax::end() ?> 
<?php $this->endBlock() ?>
    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [
                     		[
							   'label'  => '<b class="">Detail '.'</b>',
							   //'label'  => '<b class=""># '.$model->wi_id.'</b>',
							   'content' => $this->blocks['app\models\Wi'],
							   'active' => true,
							],
                     		[
                     		'content' => $this->blocks['WiRemarks'],
                     		'label'  => '<small>WI Remark <span class="badge badge-default">'.count($model->getWiHistories()->where(['wi_id' => $model->wi_id, 'wi_rev' => $model->wi_rev])->one() != null ? $model->getWiHistories()->where(['wi_id' => $model->wi_id, 'wi_rev' => $model->wi_rev])->one()->getWiRemarks()->all() : []).'</span></small>',
                     		'active' => false,
                     		],
                     		[ 
							   'content' => $this->blocks['WiHistories'], 
							   'label'  => '<small>WI Histories <span class="badge badge-default">'.count($model->getWiHistories()->where(['flag' => 1])->asArray()->all()).'</span></small>', 
							   'active' => false, 
							],
                     		[
                     		'content' => $this->blocks['WiRequest'],
                     		'label'  => '<small>WI Request <span class="badge badge-default">'.count($model->getWiRequest()->where(['flag' => 1])->asArray()->all()).'</span></small>',
                     		'active' => false,
                     		],
                     ]
                ]
    );
    ?>
        </div>
    </div>
</div>
