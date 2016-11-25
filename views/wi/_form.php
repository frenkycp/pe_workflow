<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use yii\base\Widget;
use yii\helpers\Url;
//use yii\jui\DatePicker;

/**
* @var yii\web\View $this
* @var app\models\Wi $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
                <?= $model->wi_docno ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="wi-form">

            <?php $form = ActiveForm::begin([
		            'id' => 'Wi',
		            'layout' => 'horizontal',
		            'enableClientValidation' => true,
		            'errorSummaryCssClass' => 'error-summary alert alert-error',
            		'options' => ['enctype' => 'multipart/form-data'],
            ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= ''//$form->field($model, 'wi_id')->hiddenInput()->label(false) ?>
			<?= $form->field($model, 'wi_model')->textInput(['maxlength' => true, 'readonly' => Yii::$app->controller->action->id == 'checkin' ? true : false]) ?>
			<?= $form->field($model, 'wi_section')->textInput(['maxlength' => true, 'readonly' => Yii::$app->controller->action->id == 'checkin' ? true : false]) ?>
			<?= $form->field($model, 'wi_docno')->textInput(['maxlength' => true, 'readonly' => Yii::$app->controller->action->id == 'checkin' ? true : false]) ?>
			<?= $form->field($model, 'wi_title')->textInput(['maxlength' => true, 'readonly' => Yii::$app->controller->action->id == 'checkin' ? true : false]) ?>
			<?= $form->field($model, 'wi_stagestat')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'wi_status')->textInput(['maxlength' => true, 'readonly' => Yii::$app->controller->action->id == 'checkin' ? true : false]) ?>
			<div class="form-group field-wi-wi_issue" style="display:<?php echo Yii::$app->controller->action->id == 'checkin' ? 'none' : ''; ?>">
				<label class="control-label col-sm-3" for="wi-wi_issue">Issue Date</label>
				<div class="col-sm-6">
					<?= DatePicker::widget([
							'name' => 'Wi[wi_issue]',
							'type' => DatePicker::TYPE_COMPONENT_APPEND,
							//'value' => $model->wi_issue != '' ? $model->wi_issue : date('Y-m-d'),
							'value' => $model->wi_issue,
							'pluginOptions' => [
									'autoclose'=>true,
									'format' => 'yyyy-mm-dd'
							],
							'options' => ['class' => 'form-control'],
					])
					?>
				</div>
			</div>
			
			<?= $form->field($model, 'wi_rev')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'wi_dcn')->textarea(['rows' => 2]) ?>
			<?= $form->field($model, 'wi_maker')->widget(Select2::className(), [
					'data' => \yii\helpers\ArrayHelper::map(app\models\User::find()->where(['role_id' => [4,7,8]])->orderBy('name')->all(), 'name', 'name'),
					'options' => [
							'placeholder' => 'Select a wi maker...',
							'class' => 'form-control',
					],
					'pluginOptions' => [
							'allowClear' => true
					],
					'disabled' => Yii::$app->controller->action->id == 'checkin' ? true : false,
			]) ?>
			<?= ''//$form->field($model, 'wi_filename')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'uploadFile')->fileInput() ?>
			<?= ''//$form->field($model, 'wi_filename2')->textarea(['rows' => 6]) ?>
			<?= ''//$form->field($model, 'wi_file2')->textarea(['rows' => 6]) ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Wi',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
                <hr/>
                <div>
                <?php 
                echo $form->errorSummary($model);
                if($model->isNewRecord){
                	$btnName = 'Create';
                }else{
                	if(Yii::$app->controller->action->id == 'checkin')
                	{
                		$btnName = 'Checkin';
                	}else{
                		$btnName = 'Save';
                	}
                }
                ?>
                <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' .
                $btnName,
                [
                    'id' => 'save-' . $model->formName(),
                    'class' => 'btn btn-success'
                ]
                );
                ?>&nbsp;&nbsp;&nbsp;
                <?php echo Html::a('Cancel', Url::previous(), ['class' => 'btn btn-danger']) ?>

                <?php ActiveForm::end(); ?>
				</div>
            </div>

        </div>

    </div>

</div>
