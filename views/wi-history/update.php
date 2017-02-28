<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\WiHistory $model
 */

$this->title = 'Wi History ' . $model->id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Wi Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud wi-history-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
