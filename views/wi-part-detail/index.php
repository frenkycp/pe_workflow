<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use kartik\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\search\WiPartDetailSearch $searchModel
*/

$this->title = 'Library Update Date';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="giiant-crud wi-part-detail-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="pull-right">

                        
            <?= '';
            \yii\bootstrap\ButtonDropdown::widget(
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
            );
            ?>        </div>
    </div>

    
        <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    <i><?= ''; //Wi Part Details' ?></i>
                </h2>
            </div>

            <div class="panel-body">

                <div class="table-responsive">
                <?= GridView::widget([
                'layout' => '{summary}{pager}{items}{pager}',
                'dataProvider' => $dataProvider,
                'pager'        => [
                    'class'          => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel'  => 'Last'                ],
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
                                    /* GridView::PDF => [
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
                                    ], */
                                    GridView::EXCEL => [
                                                    'filename' => 'Library_Update_List_' . date('Ymd'),
                                    ],
                    ],
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'headerRowOptions' => ['class'=>'x'],
                'columns' => [

                        [
            'class' => 'yii\grid\ActionColumn',
            'urlCreator' => function($action, $model, $key, $index) {
                // using the column name as key, not mapping to 'id' like the standard generator
                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                return Url::toRoute($params);
            },
            'contentOptions' => ['nowrap'=>'nowrap']
        ],
                    [
                        'attribute' => masterlist_id,
                        'label' => 'Doc. No.',
                        'value' => function ($model)
                        {
                            $masterlist = \app\models\Wi::find()->where([
                                'wi_id' => $model->masterlist_id
                            ])->one();
                            if(count($masterlist) != 0)
                            {
                                return $masterlist->doc_no;
                            }
                        }
                        ],
			'update_date',
                ],
            ]); ?>
                </div>

            </div>

        </div>

        <?php \yii\widgets\Pjax::end() ?>

    
</div>
