<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\WiMasterlistSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="wi-masterlist-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'masterlist_id') ?>

		<?= $form->field($model, 'doc_no') ?>

		<?= $form->field($model, 'doc_title') ?>

		<?= $form->field($model, 'doc_class') ?>

		<?= $form->field($model, 'speaker_model') ?>

		<?php // echo $form->field($model, 'doc_section') ?>

		<?php // echo $form->field($model, 'doc_type') ?>

		<?php // echo $form->field($model, 'pic_id') ?>

		<?php // echo $form->field($model, 'remark') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'date_modified') ?>

		<?php // echo $form->field($model, 'user_id') ?>

		<?php // echo $form->field($model, 'flag') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
