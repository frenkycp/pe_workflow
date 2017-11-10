<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;

/**
* @var yii\web\View $this
* @var app\models\WiPartDetail $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
                <?= $model->wi_part_detail_id ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="wi-part-detail-form">

            <?php $form = ActiveForm::begin([
            'id' => 'WiPartDetail',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= ''; //$form->field($model, 'wi_part_detail_id')->textInput() ?>
                    <?php
                    $detailArr = \app\models\WiPartDetail::find()->select('masterlist_id')->asArray();
                    ?>
			<?= $form->field($model, 'masterlist_id')->widget(Select2::className(), [
                            'data' => yii\helpers\ArrayHelper::map(
                                app\models\Wi::find()->where(['<>', 'wi_docno', '-'])
                                    //->andWhere(['not in', 'wi_id', $detailArr])
                                    ->orderBy('wi_docno ASC')->all(), 
                                'wi_id', 
                                'wi_docno'
                            ),
                            'options' => ['placeholder' => 'Select a document ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                            'theme' => 'bootstrap',
                        ]) ?>
                        <?= $form->field($model, 'update_date')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => 'Enter update date ...'],
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-M-yyyy',
                                ]
                            ]);
                        ?>
			<?= ''; //$form->field($model, 'update_date')->textInput() ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'WiPartDetail',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
                <hr/>
                <?php echo $form->errorSummary($model); ?>
                <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' .
                ($model->isNewRecord ? 'Create' : 'Save'),
                [
                    'id' => 'save-' . $model->formName(),
                    'class' => 'btn btn-success'
                ]
                );
                ?>

                <?php ActiveForm::end(); ?>

            </div>

        </div>

    </div>

</div>
