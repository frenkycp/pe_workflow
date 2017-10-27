<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\DocSection $model
*/

$this->title = 'Doc Section ' . $model->doc_section_id;
$this->params['breadcrumbs'][] = ['label' => 'Doc Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->doc_section_id, 'url' => ['view', 'doc_section_id' => $model->doc_section_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud doc-section-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'doc_section_id' => $model->doc_section_id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'List DocSections', ['index'], ['class'=>'btn btn-default']) ?>
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
                <?= $model->doc_section_id ?>            </h2>
        </div>

        <div class="panel-body">



    <?php $this->beginBlock('app\models\DocSection'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'doc_section_id',
        'section_name',
        //'flag',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'doc_section_id' => $model->doc_section_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('WiMasterlists'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Document Masterlists',
            ['wi-masterlist/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Document Masterlist',
            ['wi-masterlist/create', 'WiMasterlist' => ['doc_section' => $model->doc_section_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-WiMasterlists', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-WiMasterlists ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">' . \yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getWiMasterlists(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-wimasterlists']]),
    'pager'        => [
        'class'          => yii\widgets\LinkPager::className(),
        'firstPageLabel' => 'First',
        'lastPageLabel'  => 'Last'
    ],
    'columns' => [[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'contentOptions' => ['nowrap'=>'nowrap'],
    'urlCreator' => function ($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = 'wi-masterlist' . '/' . $action;
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'wi-masterlist'
],
        'masterlist_id',
        'doc_no',
        'doc_title',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
[
    'class' => yii\grid\DataColumn::className(),
    'attribute' => 'doc_class',
    'value' => function ($model) {
        if ($rel = $model->getDocClass()->one()) {
            return Html::a($rel->doc_class_id, ['doc-class/view', 'doc_class_id' => $rel->doc_class_id,], ['data-pjax' => 0]);
        } else {
            return '';
        }
    },
    'format' => 'raw',
],
        'speaker_model:ntext',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
[
    'class' => yii\grid\DataColumn::className(),
    'attribute' => 'doc_type',
    'value' => function ($model) {
        if ($rel = $model->getDocType()->one()) {
            return Html::a($rel->doc_type_id, ['doc-type/view', 'doc_type_id' => $rel->doc_type_id,], ['data-pjax' => 0]);
        } else {
            return '';
        }
    },
    'format' => 'raw',
],
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
[
    'class' => yii\grid\DataColumn::className(),
    'attribute' => 'pic_id',
    'value' => function ($model) {
        if ($rel = $model->getPic()->one()) {
            return Html::a($rel->name, ['user/view', 'id' => $rel->id,], ['data-pjax' => 0]);
        } else {
            return '';
        }
    },
    'format' => 'raw',
],
        'date_modified',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
[
    'class' => yii\grid\DataColumn::className(),
    'attribute' => 'user_id',
    'value' => function ($model) {
        if ($rel = $model->getUser()->one()) {
            return Html::a($rel->name, ['user/view', 'id' => $rel->id,], ['data-pjax' => 0]);
        } else {
            return '';
        }
    },
    'format' => 'raw',
],
]
]) . '</div>' ?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<b class=""># '.$model->doc_section_id.'</b>',
    'content' => $this->blocks['app\models\DocSection'],
    'active'  => true,
],[
    'content' => $this->blocks['WiMasterlists'],
    'label'   => '<small>Wi Masterlists <span class="badge badge-default">'.count($model->getWiMasterlists()->asArray()->all()).'</span></small>',
    'active'  => false,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
