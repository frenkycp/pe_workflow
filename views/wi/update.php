<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Wi $model
 */

$this->title = 'Wi ' . $model->wi_id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Wis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->wi_id, 'url' => ['view', 'wi_id' => $model->wi_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud wi-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'wi_id' => $model->wi_id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
