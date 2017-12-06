<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DcnWi $model
 */

$this->title = 'Dcn Wi ' . $model->id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Dcn Wis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud dcn-wi-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
