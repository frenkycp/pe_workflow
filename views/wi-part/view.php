<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\WiPart $model
*/

$this->title = 'Wi Part ' . $model->wi_part_id;
$this->params['breadcrumbs'][] = ['label' => 'Wi Parts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->wi_part_id, 'url' => ['view', 'wi_part_id' => $model->wi_part_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud wi-part-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'wi_part_id' => $model->wi_part_id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'List WiParts', ['index'], ['class'=>'btn btn-default']) ?>
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
                <?= $model->wi_part_id ?>            </h2>
        </div>

        <div class="panel-body">



    <?php $this->beginBlock('app\models\WiPart'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            //'wi_part_id',
		[
			'attribute' => 'masterlist_id',
			'value' => $model->wi->wi_docno,
		],
        'sap_partno',
        //'flag',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'wi_part_id' => $model->wi_part_id],
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
    'label'   => '<b class=""># '.$model->wi_part_id.'</b>',
    'content' => $this->blocks['app\models\WiPart'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
