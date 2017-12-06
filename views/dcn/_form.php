<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Dcn $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
                <?= $model->dcn_id ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="dcn-form">

            <?php $form = ActiveForm::begin([
            'id' => 'Dcn',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= $form->field($model, 'dcn_id')->textInput() ?>
			<?= $form->field($model, 'dcn_dl')->textInput() ?>
			<?= $form->field($model, 'dcn_nowf')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'dcn_type')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'dcn_partno')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'dcn_partname')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'dcn_supplier')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'dcn_no')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'dcn_title')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'dcn_spec')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'dcn_effect')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'dcn_rev')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'dcn_model')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'dcn_section')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'dcn_issue')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'dcn_approvalstat')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'dcn_stat')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'wi_stat')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'pur_stat')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'iqa_stat')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'pc_stat')->textInput(['maxlength' => true]) ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Dcn',
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
