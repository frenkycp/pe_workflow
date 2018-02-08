<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\WiMasterlist $model
*/

$this->title = 'Wi Masterlist ' . $model->doc_no;
$this->params['breadcrumbs'][] = ['label' => 'Wi Masterlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->doc_no, 'url' => ['view', 'masterlist_id' => $model->masterlist_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud wi-masterlist-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'masterlist_id' => $model->masterlist_id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'List WiMasterlists', ['index'], ['class'=>'btn btn-default']) ?>
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
                <?= $model->doc_title ?>            </h2>
        </div>

        <div class="panel-body">



    <?php $this->beginBlock('app\models\WiMasterlist'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
           //'masterlist_id',
        'doc_no',
        'doc_title',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
[
    'format' => 'raw',
    'attribute' => 'doc_class',
		'label' => 'Class',
    	'value' => $model->getDocClass()->one()->class_detail,
],
        'speaker_model:ntext',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
[
    'format' => 'html',
    'attribute' => 'doc_section',
    'value' => $model->getDocSection()->one()->section_name,
],
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
[
    'format' => 'html',
    'attribute' => 'doc_type',
    'value' => $model->getDocType()->one()->type_name,
],
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
[
    'format' => 'html',
    'attribute' => 'pic_id',
    'value' => $model->getPic()->one()->name,
],
        'remark:ntext',
        'created_at',
        'date_modified',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
[
    'format' => 'html',
    'attribute' => 'user_id',
    'value' => $model->getUser()->one()->name,
],
        //'flag',
    ],
    ]); ?>

    <hr/>

    <?= ''; Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'masterlist_id' => $model->masterlist_id],
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
    'label'   => '<b class=""># Detail</b>',
    'content' => $this->blocks['app\models\WiMasterlist'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
