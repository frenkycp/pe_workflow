<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\SapItem $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
                <?= $model->item_id ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="sap-item-form">

            <?php $form = ActiveForm::begin([
            'id' => 'SapItem',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= '';//$form->field($model, 'item_id')->textInput() ?>
			<?= $form->field($model, 'sap_partno')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'uom')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'analyst_group')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'analyst_desc')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'issue_type_desc')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'item_class')->textInput(['maxlength' => true]) ?>
			<?= '';//$form->field($model, 'insert_type')->textInput() ?>
			<?= '';//$form->field($model, 'flag')->textInput() ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Part Detail',
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
