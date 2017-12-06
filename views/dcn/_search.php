<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\DcnSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="dcn-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'dcn_id') ?>

		<?= $form->field($model, 'dcn_dl') ?>

		<?= $form->field($model, 'dcn_nowf') ?>

		<?= $form->field($model, 'dcn_type') ?>

		<?= $form->field($model, 'dcn_partno') ?>

		<?php // echo $form->field($model, 'dcn_partname') ?>

		<?php // echo $form->field($model, 'dcn_supplier') ?>

		<?php // echo $form->field($model, 'dcn_no') ?>

		<?php // echo $form->field($model, 'dcn_title') ?>

		<?php // echo $form->field($model, 'dcn_spec') ?>

		<?php // echo $form->field($model, 'dcn_effect') ?>

		<?php // echo $form->field($model, 'dcn_rev') ?>

		<?php // echo $form->field($model, 'dcn_model') ?>

		<?php // echo $form->field($model, 'dcn_section') ?>

		<?php // echo $form->field($model, 'dcn_issue') ?>

		<?php // echo $form->field($model, 'dcn_approvalstat') ?>

		<?php // echo $form->field($model, 'dcn_stat') ?>

		<?php // echo $form->field($model, 'wi_stat') ?>

		<?php // echo $form->field($model, 'pur_stat') ?>

		<?php // echo $form->field($model, 'iqa_stat') ?>

		<?php // echo $form->field($model, 'pc_stat') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
