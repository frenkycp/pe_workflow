<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\SapItem $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sap-item-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'item_id') ?>

		<?= $form->field($model, 'sap_partno') ?>

		<?= $form->field($model, 'description') ?>

		<?= $form->field($model, 'uom') ?>

		<?= $form->field($model, 'analyst_group') ?>

		<?php // echo $form->field($model, 'analyst_desc') ?>

		<?php // echo $form->field($model, 'issue_type_desc') ?>

		<?php // echo $form->field($model, 'item_class') ?>

		<?php // echo $form->field($model, 'insert_type') ?>

		<?php // echo $form->field($model, 'flag') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
