<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\widgets\Select2;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\search\WiMasterlistSearch $searchModel
*/

$this->title = 'Wi Masterlists';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="giiant-crud wi-masterlist-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="pull-right">

                                                                                                                                                                    
            <?= ''
            /* \yii\bootstrap\ButtonDropdown::widget(
                [
                    'id'       => 'giiant-relations',
                    'encodeLabel' => false,
                    'label'    => '<span class="glyphicon glyphicon-paperclip"></span> ' . 'Relations',
                    'dropdown' => [
                        'options'      => [
                            'class' => 'dropdown-menu-right'
                        ],
                        'encodeLabels' => false,
                        'items'        => [            [
                'url' => ['user/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'User' . '</i>',
            ],            [
                'url' => ['user/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'User' . '</i>',
            ],            [
                'url' => ['doc-section/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'Doc Section' . '</i>',
            ],            [
                'url' => ['doc-class/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'Doc Class' . '</i>',
            ],            [
                'url' => ['doc-type/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'Doc Type' . '</i>',
            ],]
                    ],
                    'options' => [
                        'class' => 'btn-default'
                    ]
                ]
            ); */
            ?>        </div>
    </div>

    
        <?php // \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

        <!-- <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    <i><?= 'Wi Masterlists Table' ?></i>
                </h2>
            </div>

            <div class="panel-body"> -->

                <!-- <div class="table-responsive"> -->
                <?php
                $pdfHeader = [
				  'L' => [
				    'content' => '',
				  ],
				  'C' => [
				    'content' => 'DOCUMENT MASTERLIST',
				    'font-size' => 20,
				    'font-style' => 'B',
				    'font-family' => 'arial',
				    'color' => '#333333'
				  ],
				  'R' => [
				    'content' => date('l, d-M-Y'),
				  ],
				  'line' => true,
				];

				$pdfFooter = [
				  'L' => [
				    'content' => '',
				    'font-size' => 10,
				    'color' => '#333333',
				    'font-family' => 'arial',
				  ],
				  'C' => [
				    'content' => '',
				  ],
				  'R' => [
				    'content' => '{PAGENO}',
				    'font-size' => 10,
				    'color' => '#333333',
				    'font-family' => 'arial',
				  ],
				  'line' => true,
				];
                ?>
                <?= GridView::widget([
                //'layout' => '{summary}{pager}{items}{pager}',
                'dataProvider' => $dataProvider,
				'pjax'=>true,
				'pjaxSettings'=>[
					'neverTimeout'=>true,
				],
				'filterRowOptions'=>['class'=>'kartik-sheet-style'],
				'responsive' => true,
				'autoXlFormat'=>true,
				'hover' => true,
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
					 GridView::PDF => [
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
					],
					GridView::EXCEL => [],
				],
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                //'headerRowOptions' => ['class'=>'x'],
                'columns' => [
					[
						'class'=>'kartik\grid\SerialColumn',
						'contentOptions'=>['class'=>'kartik-sheet-style', 'style' => 'text-align: center;'],
						'width'=>'36px',
						'header'=>'No.',
						'headerOptions'=>['class'=>'kartik-sheet-style']
					],
					[
						'attribute' => 'doc_no',
						'headerOptions' => ['style'=>'text-align:center'],
						'contentOptions'=>['class'=>'kartik-sheet-style', 'style' => 'text-align: center;'],
						'width'=>'35px',
					],
					//'doc_no',
					//'doc_title',
					[
						'attribute' => 'doc_title',
						'headerOptions' => ['style'=>'text-align:center'],
						'contentOptions'=>['class'=>'kartik-sheet-style', 'style' => 'text-align: left;'],
						'width'=>'230px',
					],
					//'speaker_model:ntext',
					[
						'attribute' => 'speaker_model',
						'headerOptions' => ['style'=>'text-align:center'],
						'contentOptions'=>['class'=>'kartik-sheet-style', 'style' => 'text-align: left;'],
						'width'=>'200px',
					],
					[
						'class' => '\kartik\grid\DataColumn',
						'attribute' => 'doc_section',
						'headerOptions' => ['style'=>'text-align:center'],
						'contentOptions'=>['class'=>'kartik-sheet-style', 'style' => 'text-align: center;'],
						'width'=>'100px',
						'value' => function ($model) {
							return $model->getDocSection()->one()->section_name;
						},
						'filter' => $sectionDropdown,
					],
				// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
					[
						'class' => '\kartik\grid\DataColumn',
						'attribute' => 'doc_type',
						'headerOptions' => ['style'=>'text-align:center'],
						'contentOptions'=>['class'=>'kartik-sheet-style', 'style' => 'text-align: center;'],
						'width'=>'50px',
						'value' => function ($model) {
							return $model->getDocType()->one()->type_name;
						},
						'filter' => $docTypeDropdown,
					],
				// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
					[
						'class' => '\kartik\grid\DataColumn',
						'attribute' => 'pic_id',
						'width'=>'100px',
						'headerOptions' => ['style'=>'text-align:center'],
						'contentOptions'=>['class'=>'kartik-sheet-style', 'style' => 'text-align: center;'],
						'value' => function ($model) {
							return $model->getPic()->one()->name;
						},
						'filter' => $wiMakerDropdown,
						'filterType'=>GridView::FILTER_SELECT2,
						'filterWidgetOptions'=>[
							'pluginOptions'=>['allowClear'=>true],
						],
						'filterInputOptions'=>['placeholder'=>'Any PIC'],
					],
					//'created_at',
					[
						'attribute' => 'created_at',
						'headerOptions' => ['style'=>'text-align:center'],
						'contentOptions'=>['class'=>'kartik-sheet-style', 'style' => 'text-align: center;'],
						'width'=>'100px',
					],
					[
						'class' => '\kartik\grid\ActionColumn',
						'urlCreator' => function($action, $model, $key, $index) {
							// using the column name as key, not mapping to 'id' like the standard generator
							$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
							$params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
							return Url::toRoute($params);
						},
					],
                ],
            ]); ?>
                <!-- </div> -->

            <!-- </div>

        </div> -->

        <?php //\yii\widgets\Pjax::end() ?>

</div>
