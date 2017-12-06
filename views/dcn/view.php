<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Dcn $model
*/

$this->title = 'DCN - ' . $model->dcn_no;
$this->params['breadcrumbs'][] = ['label' => 'Dcns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->dcn_no, 'url' => ['view', 'dcn_id' => $model->dcn_id]];
$this->params['breadcrumbs'][] = 'View';

Yii::$app->timeZone = 'UTC';
?>
<div class="giiant-crud dcn-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= ''; //Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'dcn_id' => $model->dcn_id],['class' => 'btn btn-info']) ?>
        <?= ''; //Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right">
        <?= ''; //Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'List Dcns', ['index'], ['class'=>'btn btn-default']) ?>
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
                <?= $model->dcn_type . ' - ' . $model->dcn_section ?>            </h2>
        </div>

        <div class="panel-body">



    <?php $this->beginBlock('app\models\Dcn'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            //'dcn_id',
        'dcn_stat',
        [
            'attribute' => 'dcn_dl',
            'format' => ['date', 'php:d-M-Y'],
        ],
        [
            'attribute' => 'dcn_issue',
            'format' => ['date', 'php:d-M-Y'],
        ],
        [
            'attribute' => 'dcn_effect',
        ],
        //'dcn_dl',
        'dcn_nowf',
        //'dcn_type',
        'dcn_partno',
        'dcn_partname',
        'dcn_model:ntext',
        'dcn_supplier',
        //'dcn_no',
        'dcn_title:ntext',
        'dcn_spec:ntext',
        //'dcn_effect',
        'dcn_rev',
        'dcn_model:ntext',
        'dcn_section',
        //'dcn_issue',
        'dcn_approvalstat',
        
        'wi_stat',
        'pur_stat',
        'iqa_stat',
        'pc_stat',
    ],
    ]); ?>

    <hr/>

    <?= ''; /* Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'dcn_id' => $model->dcn_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
    'data-method' => 'post',
    ]); */ ?>
    <?php $this->endBlock(); ?>

    <?php $this->beginBlock('Attachment'); ?> 
    <div class="row">
        <div class="box box-solid">
            <div class="box-header with-border">
                <!-- <i class="fa fa-file"></i>
                <h3 class="box-title">Attachment List</h3> -->
            </div>
            <div class="box-body">
                <ul class="list-unstyled">
                    <?php
                    $files = app\models\Files::find()->where(['file_docno' => $model->dcn_no])->all();
                    foreach ($files as $item) {
                        echo '<li><h5>' . \yii\helpers\Html::a('<i class="fa fa-file"></i> ' . $item->file_name, Yii::$app->request->hostInfo . '/workflow/' . $item->file_path) . '</h5></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php $this->endBlock() ?>
    
    <?php
    $tabItems = [
        [
            'label'   => '<b class="">'.'#DETAIL'.'</b>',
            'content' => $this->blocks['app\models\Dcn'],
            'active'  => true,
        ],
        [
            'label'   => '<b class="">'.'#ATTACHMENT'.'</b>',
            'content' => $this->blocks['Attachment'],
        ],
    ];
    ?>
    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => $tabItems,
                 ]
    );
    ?>
        </div>
    </div>
</div>
