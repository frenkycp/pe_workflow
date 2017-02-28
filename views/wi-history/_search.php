<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\WiHistorySearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="wi-history-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'wi_id') ?>

		<?= $form->field($model, 'wi_stagestat') ?>

		<?= $form->field($model, 'revised_date') ?>

		<?= $form->field($model, 'check1_date') ?>

		<?php // echo $form->field($model, 'check2_date') ?>

		<?php // echo $form->field($model, 'check3_date') ?>

		<?php // echo $form->field($model, 'approved_date') ?>

		<?php // echo $form->field($model, 'release_date') ?>

		<?php // echo $form->field($model, 'wi_rev') ?>

		<?php // echo $form->field($model, 'wi_maker_id') ?>

		<?php // echo $form->field($model, 'wi_filename') ?>

		<?php // echo $form->field($model, 'wi_file') ?>

		<?php // echo $form->field($model, 'flag') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
