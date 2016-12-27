<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\WiPart $model
 */

$this->title = 'Wi Part ' . $model->wi_part_id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Wi Parts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->wi_part_id, 'url' => ['view', 'wi_part_id' => $model->wi_part_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud wi-part-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'wi_part_id' => $model->wi_part_id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
