<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;
use kartik\grid\GridView;

/**
* @var yii\web\View $this
* @var app\models\WiHistory $model
*/

$this->title = 'Detail History';// . $model->getWi()->one()->wi_docno;
$this->params['breadcrumbs'][] = ['label' => 'Wi Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud wi-history-view">

    <!-- menu buttons -->
    <p class='pull-left' style="display: none;">
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'id' => $model->id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right" style="display: none;">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'List WiHistories', ['index'], ['class'=>'btn btn-default']) ?>
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
                <?= $model->getWi()->one()->wi_docno ?>            </h2>
        </div>

        <div class="panel-body">



    <?php $this->beginBlock('app\models\WiHistory'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            //'id',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
[
    'format' => 'html',
    'attribute' => 'wi_id',
		'label' => 'Document No.',
    'value' => ($model->getWi()->one() ? Html::a($model->getWi()->one()->wi_docno, ['wi/view', 'wi_id' => $model->getWi()->one()->wi_id,]) : '<span class="label label-warning">?</span>'),
],
    		'wi_rev',
    		[
    		'format' => 'html',
    		'attribute' => 'wi_maker_id',
    		'label' => 'WI Maker',
    		'value' => ($model->getUser()->one()->name),
    		],
    		'wi_stagestat',
    		
        'revised_date',
        'check1_date',
        'check2_date',
        'check3_date',
        'approved_date',
        'release_date',
        
        //'wi_maker_id',
    		
        //'wi_filename:ntext',
        //'wi_file:ntext',
    		[
    		'attribute' => 'wi_file',
    		'format' => 'raw',
    		'value' => $model->wi_file == null || $model->wi_file == '' ? $model->wi_filename : Html::a($model->wi_filename, Yii::$app->request->hostInfo . '/workflow/' . $model->wi_file),
    		],
    		//'purpose',
    		[
    				'attribute' => 'purpose',
    				'format' => 'raw',
    ],
        //'flag',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
    'data-method' => 'post',
    		'style' => 'display:none;'
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('WiRemarks'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;display:none;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Wi Remarks',
            ['wi-remark/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Wi Remark',
            ['wi-remark/create', 'WiRemark' => ['history_id' => $model->id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div>
<?php Pjax::begin(['id'=>'pjax-WiRemarks', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-WiRemarks ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">' . kartik\grid\GridView::widget([
		'layout' => '{summary}{pager}<br/>{items}{pager}',
		'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getWiRemarks(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-wiremarks']]),
		'pager'        => [
				'class' => yii\widgets\LinkPager::className(),
				'firstPageLabel' => 'First',
				'lastPageLabel'  => 'Last',
		],
		'columns' => [
				[
						'class'      => 'kartik\grid\ActionColumn',
						'template'   => '{finish}',
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
				],
				[
				'attribute' => 'statusStr',
				'format' => 'raw',
				'hAlign' => 'center',
				'vAlign' => 'middle',
				],
        'remark:ntext',
        //'statusStr',
        
        //'flag',
]
]) . '</div>' ?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<b class=""># ' . 'Info'/* $model->id */.'</b>',
    'content' => $this->blocks['app\models\WiHistory'],
    'active'  => true,
],[
    'content' => $this->blocks['WiRemarks'],
    'label'   => '<small>Wi Remarks <span class="badge badge-default">'.count($model->getWiRemarks()->asArray()->all()).'</span></small>',
    'active'  => false,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
