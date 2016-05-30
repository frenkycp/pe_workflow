<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DocClass $model
 */

$this->title = 'Doc Class ' . $model->doc_class_id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Doc Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->doc_class_id, 'url' => ['view', 'doc_class_id' => $model->doc_class_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud doc-class-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'doc_class_id' => $model->doc_class_id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
