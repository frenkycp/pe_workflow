<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\WiMasterlist $model
 */

$this->title = 'Wi Masterlist ' . $model->masterlist_id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Wi Masterlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->masterlist_id, 'url' => ['view', 'masterlist_id' => $model->masterlist_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud wi-masterlist-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'masterlist_id' => $model->masterlist_id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
