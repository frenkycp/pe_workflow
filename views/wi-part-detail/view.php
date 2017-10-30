<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\WiPartDetail $model
*/

$this->title = 'Wi Part Detail ' . $model->wi_part_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Wi Part Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->wi_part_detail_id, 'url' => ['view', 'wi_part_detail_id' => $model->wi_part_detail_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud wi-part-detail-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'wi_part_detail_id' => $model->wi_part_detail_id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'List WiPartDetails', ['index'], ['class'=>'btn btn-default']) ?>
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
                <?= $model->wi_part_detail_id ?>            </h2>
        </div>

        <div class="panel-body">



    <?php $this->beginBlock('app\models\WiPartDetail'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'wi_part_detail_id',
        'masterlist_id',
        'update_date',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'wi_part_detail_id' => $model->wi_part_detail_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<b class=""># '.$model->wi_part_detail_id.'</b>',
    'content' => $this->blocks['app\models\WiPartDetail'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
