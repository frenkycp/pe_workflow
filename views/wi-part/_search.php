<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\WiPartSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="wi-part-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= ''; //$form->field($model, 'wi_part_id') ?>

		<?= ''; //$form->field($model, 'masterlist_id') ?>

		<?= $form->field($model, 'sap_partno') ?>

		<?= ''; //$form->field($model, 'flag') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
