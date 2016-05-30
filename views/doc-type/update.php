<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DocType $model
 */

$this->title = 'Doc Type ' . $model->doc_type_id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Doc Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->doc_type_id, 'url' => ['view', 'doc_type_id' => $model->doc_type_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud doc-type-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'doc_type_id' => $model->doc_type_id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
