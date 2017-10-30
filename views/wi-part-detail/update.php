<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\WiPartDetail $model
 */

$this->title = 'Wi Part Detail ' . $model->wi_part_detail_id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Wi Part Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->wi_part_detail_id, 'url' => ['view', 'wi_part_detail_id' => $model->wi_part_detail_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud wi-part-detail-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'wi_part_detail_id' => $model->wi_part_detail_id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
