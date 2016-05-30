<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\DocClassSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="doc-class-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'doc_class_id') ?>

		<?= $form->field($model, 'class_code') ?>

		<?= $form->field($model, 'class_detail') ?>

		<?= $form->field($model, 'class_count') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
