<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use kartik\select2\Select2;

/**
* @var yii\web\View $this
* @var app\models\WiPart $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
                <?= $model->wi_part_id ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="wi-part-form">

            <?php $form = ActiveForm::begin([
            'id' => 'WiPart',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= '';//$form->field($model, 'wi_part_id')->textInput() ?>
			
<?= 
$form->field($model, 'masterlist_id')->widget(Select2::classname(),[
		'data' => \yii\helpers\ArrayHelper::map(app\models\Wi::find()->where(['not', ['wi_docno' => '-']])->orderBy('wi_docno ASC')->all(), 'wi_id', 'wi_docno'),
		'options' => ['placeholder' => 'Select Document No...'],
		'pluginOptions' => [
				'allowClear' => true
		],
]);
?>
           <?php echo $form->field($model, 'sap_partno')->textInput(); ?>

                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'WiPart',
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
