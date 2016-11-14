<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\WiSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="wi-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'wi_id') ?>

		<?= $form->field($model, 'wi_model') ?>

		<?= $form->field($model, 'wi_section') ?>

		<?= $form->field($model, 'wi_docno') ?>

		<?= $form->field($model, 'wi_title') ?>

		<?php // echo $form->field($model, 'wi_stagestat') ?>

		<?php // echo $form->field($model, 'wi_status') ?>

		<?php // echo $form->field($model, 'wi_issue') ?>

		<?php // echo $form->field($model, 'wi_rev') ?>

		<?php // echo $form->field($model, 'wi_maker') ?>

		<?php // echo $form->field($model, 'wi_filename') ?>

		<?php // echo $form->field($model, 'wi_file') ?>

		<?php // echo $form->field($model, 'wi_filename2') ?>

		<?php // echo $form->field($model, 'wi_file2') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
