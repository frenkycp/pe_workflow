<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Dcn $model
 */

$this->title = 'Dcn ' . $model->dcn_id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Dcns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->dcn_id, 'url' => ['view', 'dcn_id' => $model->dcn_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud dcn-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'dcn_id' => $model->dcn_id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
