<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SapItem $model
 */

$this->title = 'Sap Item ' . $model->item_id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Sap Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->item_id, 'url' => ['view', 'item_id' => $model->item_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud sap-item-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'item_id' => $model->item_id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
