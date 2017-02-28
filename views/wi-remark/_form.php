<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use app\models\Wi;
use app\models\WiHistory;

/**
* @var yii\web\View $this
* @var app\models\WiRemark $model
* @var yii\widgets\ActiveForm $form
*/

?>

<?php 
if(isset($_GET['wi_id']))
{
	$wiId = $_GET['wi_id'];
}
$auditor = Yii::$app->user->identity->name;
if(isset($_GET['id']))
{
	$tmpHistory = $model->getHistory()->one();
	$wiId = $tmpHistory->wi_id;
	$auditor = $model->getUsername();
}

$wi = Wi::find()->where(['wi_id' => $wiId])->one();
$wi_history = WiHistory::find()->where(['wi_id' => $wi->wi_id])->orderBy('id DESC')->one();

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
                <?= $model->id ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="wi-remark-form">

            <?php $form = ActiveForm::begin([
            'id' => 'WiRemark',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>

                <p>
                <div class='form-group'>
                <?php echo Html::label('Document No.', 'doc_no', ['class' => 'control-label col-sm-3'])?>
	                <div class='col-sm-6'>
	                <?php echo Html::textInput('doc_no', $wi->wi_docno, ['class' => 'form-control', 'readonly' => true]);?>
	                </div>
                </div>
                <div class='form-group'>
                <?php echo Html::label('Rev.', 'wi_rev', ['class' => 'control-label col-sm-3'])?>
	                <div class='col-sm-6'>
	                <?php 
	                //$wiHistory = WiHistory::find()->where(['wi_id' => $wi->wi_id])->one();
	                echo Html::textInput('wi_rev', $wi_history->wi_rev, ['class' => 'form-control', 'readonly' => true]);?>
	                </div>
                </div>
                <div class='form-group'>
                <?php echo Html::label('WI Maker', 'wi_maker', ['class' => 'control-label col-sm-3'])?>
	                <div class='col-sm-6'>
	                <?php 
	                //$wiHistory = WiHistory::find()->where(['wi_id' => $wi->wi_id])->one();
	                echo Html::textInput('wi_maker', $wi->wi_maker, ['class' => 'form-control', 'readonly' => true]);?>
	                </div>
                </div>
                <div class='form-group'>
                <?php echo Html::label('Checker', 'auditor', ['class' => 'control-label col-sm-3'])?>
	                <div class='col-sm-6'>
	                <?php echo Html::textInput('auditor', $auditor, ['class' => 'form-control', 'readonly' => true]);?>
	                </div>
                </div>
			
			<?= '';//$form->field($model, 'id')->textInput() ?>
			<?= '';//$form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->getId()])->label(false) ?>
			<?= '';//$form->field($model, 'history_id')->hiddenInput(['value' => $wi_history->id])->label(false) ?>
			<?= '';// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
/* $form->field($model, 'history_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\models\WiHistory::find()->all(), 'id', 'id'),
    ['prompt' => 'Select']
); */ ?>
			<?= $form->field($model, 'remark')->textarea(['rows' => 6, 'style' => 'resize: vertical;', 'readonly' => $model->isNewRecord ? false : true]) ?>
			<?= $form->field($model, 'feedback')->textarea(['rows' => 6, 'style' => 'resize: vertical;', 'readonly' => Yii::$app->user->identity->role_id == Yii::$app->params['roleid_wimaker'] ? false : true]) ?>
			<?= '';//$form->field($model, 'status')->textInput() ?>
			<?= '';//$form->field($model, 'flag')->textInput() ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'WiRemark',
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
                ($model->isNewRecord ? isset($_GET['wi_id']) ? Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin2'] ? 'Authorize' : 'Reject' : 'Create' : 'Save'),
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
