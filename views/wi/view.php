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

$this->registerCss("table.detail-view th {width: 20%;} table.detail-view td {width: 80%;}");
Yii::$app->timeZone = 'UTC';

?>
<div class="giiant-crud wi-view">

    <!-- menu buttons -->
    <p class='pull-left' style="<?= in_array(Yii::$app->user->identity->role_id, [1, 8, Yii::$app->params['roleid_admin2']]) ? '' : 'display:none;' ?>">
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'wi_id' => $model->wi_id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-edit"></span> ' . 'Add Remark', ['wi-remark/create', 'wi_id' => $model->wi_id, 'remark_only' => 1], ['class' => 'btn btn-primary']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'WI List', ['index'], ['class' => 'btn btn-default']) ?>
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
                <?= $model->wi_docno ?> </h2>
        </div>

        <div class="panel-body">



            <?php $this->beginBlock('app\models\Wi'); ?>

            <?php
            if (!empty($wiHistory)) {
                $rejector = 'REJECTED BY ' . $wiHistory->rejector->name . ' ON ' . strtoupper(date('d-M-Y', strtotime($wiHistory->reject_date)));
            } else {
                $rejector = 'REJECTED';
                if ($model->wi_remark <> '') {
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
                        'attribute' => 'wi_file',
                        'format' => 'raw',
                        'visible' => strtolower(Yii::$app->user->identity->role->name) == 'prod. admin' ? false : true,
                        'value' => ($model->wi_file == null || $model->wi_file == '') ? $model->wi_filename : Html::a($model->wi_filename, Yii::$app->request->hostInfo . '/workflow/' . $model->wi_file),
                        //'value' => Html::a($model->wi_filename, 'http://pe12/workflow/' . $model->wi_file, ['style' => in_array($model->wi_status, ['OPEN', 'CLOSE']) ? '' : 'display: none;']),
                    ],
                    [
                        'attribute' => 'wi_file2',
                        'label' => 'DDC',
                        'format' => 'raw',
                        //'visible' => $model->wi_status == 13 || in_array(Yii::$app->user->identity->role_id, Yii::$app->params['roleid_superadmin']) ? true : false,
                        'value' => $model->wi_file2 == null || $model->wi_file2 == '' ? '-' : Html::a($model->wi_filename2, Yii::$app->request->hostInfo . '/workflow/' . $model->wi_file2),
                        //'value' => Html::a($model->wi_filename, 'http://pe12/workflow/' . $model->wi_file, ['style' => in_array($model->wi_status, ['OPEN', 'CLOSE']) ? '' : 'display: none;']),
                    ],
                    [
                        'attribute' => 'wi_file3',
                        'label' => 'WI (PDF) - Released',
                        'format' => 'raw',
                        'value' => $model->wi_file3 == null || $model->wi_file3 == '' ? '-' : Html::a($model->wi_filename3, Yii::$app->request->hostInfo . '/workflow/' . $model->wi_file3),
                        //'value' => Html::a($model->wi_filename, 'http://pe12/workflow/' . $model->wi_file, ['style' => in_array($model->wi_status, ['OPEN', 'CLOSE']) ? '' : 'display: none;']),
                    ],
                    [
                        'attribute' => 'file_4',
                        'label' => 'WI (PDF) - On Progress',
                        'format' => 'raw',
                        'value' => $model->file_4 == null || $model->file_4 == '' ? '-' : Html::a($model->filename_4, Yii::$app->request->hostInfo . '/workflow/' . $model->file_4),
                        //'value' => Html::a($model->wi_filename, 'http://pe12/workflow/' . $model->wi_file, ['style' => in_array($model->wi_status, ['OPEN', 'CLOSE']) ? '' : 'display: none;']),
                    ],
                    'wi_dcn:ntext',
                    //'linkToFile',
                ],
            ]); ?>

            <hr />

            <?= Yii::$app->user->identity->role_id == 1 ? Html::a(
                '<span class="glyphicon glyphicon-trash"></span> ' . 'Delete',
                ['delete', 'wi_id' => $model->wi_id],
                [
                    'class' => 'btn btn-danger',
                    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
                    'data-method' => 'post',
                ]
            ) : ''; ?>
            <?php $this->endBlock(); ?>

            <?php $this->beginBlock('WiRemarks'); ?>
            <?php Pjax::begin(['id' => 'pjax-WiRemarks', 'enableReplaceState' => false, 'linkSelector' => '#pjax-WiRemarks ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
            <?= '<div class="table-responsive">' . kartik\grid\GridView::widget([
                'layout' => '{summary}{pager}<br/>{items}{pager}',
                'dataProvider' => new \yii\data\ActiveDataProvider(['query' => !empty($wi_rmk) ? $wi_rmk : WiRemark::find(-1), 'pagination' => ['pageSize' => 20, 'pageParam' => 'page-wiremarks']]),
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
                        'contentOptions' => ['nowrap' => 'nowrap'],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            // using the column name as key, not mapping to 'id' like the standard generator
                            $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                            $params[0] = 'wi-remark' . '/' . $action;
                            return $params;
                        },
                        'buttons'    => [
                            'finish' => function ($url, $model, $key) {
                                return (Yii::$app->user->identity->role_id == Yii::$app->params['roleid_wimaker'] && $model->status == 0) ? Html::a(
                                    '<span class="glyphicon glyphicon-ok" style="padding-left: 5px;"></span>',
                                    ['/wi-remark/finish', 'id' => $model->id, 'history_id' => $model->getHistory()->one()->id],
                                    [
                                        'title' => 'Finish',
                                        'data-confirm' => Yii::t('yii', 'Have you finished this task ?'),
                                    ]
                                ) : "";
                            },
                        ],
                        'controller' => 'wi-remark'
                    ],
                    [
                        'attribute' => 'remarkRevision',
                        'label' => 'Rev.',
                        'hAlign' => 'center',
                        'vAlign' => 'middle',
                        'width' => '50px',
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
            <?php Pjax::begin(['id' => 'pjax-WiHistories', 'enableReplaceState' => false, 'linkSelector' => '#pjax-WiHistories ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
            <?= '<div class="table-responsive">' . kartik\grid\GridView::widget([
                'layout' => '{summary}{pager}<br/>{items}{pager}',
                'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getWiHistories()->where(['flag' => 1]), 'pagination' => ['pageSize' => 20, 'pageParam' => 'page-wihistories']]),
                'pager'       => [
                    'class'         => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last'
                ],
                'columns' => [
                    [
                        'class'     => 'yii\grid\ActionColumn',
                        'template'  => '{view} {update}',
                        'contentOptions' => ['nowrap' => 'nowrap'],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            // using the column name as key, not mapping to 'id' like the standard generator 
                            $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                            $params[0] = 'wi-history' . '/' . $action;
                            return $params;
                        },
                        'buttons'   => [],
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
                        //'format' => ['date', 'php:d-M-Y H:i:s'],
                        'label' => 'Revised',
                        'format' => 'raw',
                        'hAlign' => 'center',
                        'value' => function ($model) {
                            if ($model->revised_date != null) {
                                return date('d-M-Y H:i', strtotime($model->revised_date)) . '<br/>(' . $model->user->name . ')';
                            }
                        },
                    ],
                    //'check1_date', 
                    [
                        'attribute' => 'check1_date',
                        //'format' => ['date', 'php:d-M-Y H:i:s'],
                        'label' => 'Masterlist Check',
                        'format' => 'raw',
                        'hAlign' => 'center',
                        'value' => function ($model) {
                            if ($model->check1_date != null) {
                                $return_txt = date('d-M-Y H:i', strtotime($model->check1_date));
                                if ($model->check1_by_name != null) {
                                    $return_txt .= '<br/>(' . $model->check1_by_name . ')';
                                }
                                return  $return_txt;
                            }
                        },
                    ],
                    //'check2_date', 
                    [
                        'attribute' => 'check2_date',
                        //'format' => ['date', 'php:d-M-Y H:i:s'],
                        'label' => 'SMILE Check',
                        'format' => 'raw',
                        'hAlign' => 'center',
                        'value' => function ($model) {
                            if ($model->check2_date != null) {
                                $return_txt = date('d-M-Y H:i', strtotime($model->check2_date));
                                if ($model->check2_by_name != null) {
                                    $return_txt .= '<br/>(' . $model->check2_by_name . ')';
                                }
                                return  $return_txt;
                            }
                        },
                    ],
                    //'check3_date', 
                    [
                        'attribute' => 'check3_date',
                        //'format' => ['date', 'php:d-M-Y H:i:s'],
                        'label' => 'Final Check',
                        'format' => 'raw',
                        'hAlign' => 'center',
                        'value' => function ($model) {
                            if ($model->check3_date != null) {
                                $return_txt = date('d-M-Y H:i', strtotime($model->check3_date));
                                if ($model->check3_by_name != null) {
                                    $return_txt .= '<br/>(' . $model->check3_by_name . ')';
                                }
                                return  $return_txt;
                            }
                        },
                    ],
                    //'approved_date', 
                    [
                        'attribute' => 'approved_date',
                        //'format' => ['date', 'php:d-M-Y H:i:s'],
                        'label' => 'Approved',
                        'format' => 'raw',
                        'hAlign' => 'center',
                        'value' => function ($model) {
                            if ($model->approved_date != null) {
                                $return_txt = date('d-M-Y H:i', strtotime($model->approved_date));
                                if ($model->approved_by_name != null) {
                                    $return_txt .= '<br/>(' . $model->approved_by_name . ')';
                                }
                                return  $return_txt;
                            }
                        },
                    ],
                    //'release_date', 
                    [
                        'attribute' => 'release_date',
                        //'format' => ['date', 'php:d-M-Y H:i:s'],
                        'label' => 'Release',
                        'format' => 'raw',
                        'hAlign' => 'center',
                        'value' => function ($model) {
                            if ($model->release_date != null) {
                                $return_txt = date('d-M-Y H:i', strtotime($model->release_date));
                                if ($model->release_by_name != null) {
                                    $return_txt .= '<br/>(' . $model->release_by_name . ')';
                                }
                                return  $return_txt;
                            }
                        },
                    ],
                    [
                        'attribute' => 'reject_date',
                        //'format' => ['date', 'php:d-M-Y H:i:s'],
                        'label' => 'Reject',
                        'format' => 'raw',
                        'hAlign' => 'center',
                        'value' => function ($model) {
                            if ($model->reject_date != null) {
                                $return_txt = date('d-M-Y H:i', strtotime($model->reject_date));
                                if ($model->rejector->name != null) {
                                    $return_txt .= '<br/>(' . $model->rejector->name . ')';
                                }
                                return  $return_txt;
                            }
                        },
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
            <?php Pjax::begin(['id' => 'pjax-WiRequest', 'enableReplaceState' => false, 'linkSelector' => '#pjax-WiRequest ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
            <?= '<div class="table-responsive">' . kartik\grid\GridView::widget([
                'layout' => '{summary}{pager}<br/>{items}{pager}',
                'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getWiRequest()->where(['flag' => 1]), 'pagination' => ['pageSize' => 20, 'pageParam' => 'page-wihistories']]),
                'pager'       => [
                    'class'         => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last'
                ],
                'columns' => [
                    [
                        'class'     => 'kartik\grid\ActionColumn',
                        'template'  => '{view} {update}',
                        'width' => '100px',
                        'contentOptions' => ['nowrap' => 'nowrap'],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            // using the column name as key, not mapping to 'id' like the standard generator 
                            $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                            $params[0] = 'wi-request' . '/' . $action;
                            return $params;
                        },
                        'buttons'   => [],
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

            <?php $this->beginBlock('DcnWi'); ?>
            <?php Pjax::begin(['id' => 'pjax-DcnWi', 'enableReplaceState' => false, 'linkSelector' => '#pjax-DcnWi ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
            <?= '<div class="table-responsive">' . kartik\grid\GridView::widget([
                'layout' => '{summary}{pager}<br/>{items}{pager}',
                'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getDcnWi(), 'pagination' => ['pageSize' => 20, 'pageParam' => 'page-dcnwi']]),
                'pager'       => [
                    'class'         => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last'
                ],
                'columns' => [
                    /* [
            'class'=>'kartik\grid\SerialColumn',
            'contentOptions'=>['class'=>'kartik-sheet-style', 'style' => 'text-align: center;'],
            'width'=>'36px',
            'header'=>'No.',
            'headerOptions'=>['class'=>'kartik-sheet-style']
        ], */
                    [
                        'attribute' => 'dcnNo',
                        'hAlign' => 'center',
                        'width' => '100px',
                        'format' => 'raw',
                        'vAlign' => 'middle',
                    ],
                    [
                        'attribute' => 'dcnStatus',
                        'hAlign' => 'center',
                        'vAlign' => 'middle',
                        'width' => '100px',
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'dcnTitle',
                        'hAlign' => 'left',
                    ],

                ]
            ]) . '</div>' ?>
            <?php Pjax::end() ?>
            <?php $this->endBlock() ?>

            <?php
            $tabItems = [
                [
                    'label'  => '<b class="">Detail ' . '</b>',
                    //'label'  => '<b class=""># '.$model->wi_id.'</b>',
                    'content' => $this->blocks['app\models\Wi'],
                    'active' => true,
                ],
                [
                    'content' => $this->blocks['WiRemarks'],
                    'label'  => '<small>WI Remark <span class="badge badge-default">' . $wi_rmk->count() . '</span></small>',
                    'active' => false,
                ],
                [
                    'content' => $this->blocks['WiHistories'],
                    'label'  => '<small>WI Histories <span class="badge badge-default">' . count($model->getWiHistories()->where(['flag' => 1])->asArray()->all()) . '</span></small>',
                    'active' => false,
                ],
                [
                    'content' => $this->blocks['WiRequest'],
                    'label'  => '<small>WI Request <span class="badge badge-default">' . count($model->getWiRequest()->where(['flag' => 1])->asArray()->all()) . '</span></small>',
                    'active' => false,
                ],
                [
                    'content' => $this->blocks['DcnWi'],
                    'label'  => '<small>DCN <span class="badge badge-default">' . count($model->getDcnWi()->asArray()->all()) . '</span></small>',
                    'active' => false,
                ],
            ];
            ?>
            <?= Tabs::widget(
                [
                    'id' => 'relation-tabs',
                    'encodeLabels' => false,
                    'items' => $tabItems
                ]
            );
            ?>
        </div>
    </div>
</div>