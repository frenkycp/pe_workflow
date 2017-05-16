<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\WiRequestSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="wi-request-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'wi_id') ?>

		<?= $form->field($model, 'request_type') ?>

		<?= $form->field($model, 'request_from') ?>

		<?= $form->field($model, 'request_date') ?>

		<?php // echo $form->field($model, 'required_date') ?>

		<?php // echo $form->field($model, 'page_no') ?>

		<?php // echo $form->field($model, 'change_item') ?>

		<?php // echo $form->field($model, 'reason') ?>

		<?php // echo $form->field($model, 'requestor_id') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'flag') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
