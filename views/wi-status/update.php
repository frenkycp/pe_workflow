<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\WiStatus $model
 */

$this->title = 'Wi Status ' . $model->status_id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Wi Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->status_id, 'url' => ['view', 'status_id' => $model->status_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud wi-status-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'status_id' => $model->status_id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
