<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

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
    <p class='pull-left' style="<?= Yii::$app->user->identity->role_id == 1 ? '' : 'display:none;'?>">
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'wi_id' => $model->wi_id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
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

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            //'wi_id',
        'wi_model',
        'wi_section',
        'wi_docno',
        'wi_title',
        'wi_stagestat',
        'wi_status',
        'wi_issue',
        'wi_rev',
        'wi_maker',
		[
			'attribute'=>'wi_file',
            'format'=>'raw',
			'value' => Html::a($model->wi_filename, Yii::$app->request->hostInfo . '/workflow/' . $model->wi_file, ['style' => in_array($model->wi_status, ['OPEN', 'CLOSE']) ? '' : 'display: none;']),
			//'value' => Html::a($model->wi_filename, 'http://pe12/workflow/' . $model->wi_file, ['style' => in_array($model->wi_status, ['OPEN', 'CLOSE']) ? '' : 'display: none;']),
		],
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


    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<b class=""># '.'</b>',
    'content' => $this->blocks['app\models\Wi'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
