<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\DocSection $model
 */

$this->title = 'Doc Section ' . $model->doc_section_id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Doc Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->doc_section_id, 'url' => ['view', 'doc_section_id' => $model->doc_section_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud doc-section-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'doc_section_id' => $model->doc_section_id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
