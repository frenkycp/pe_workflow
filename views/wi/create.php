<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Wi $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Wis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud wi-create">

    <p class="pull-left">
        <?= Html::a('Cancel', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?= $this->render('_form', [
    'model' => $model,
    'model_required' => $model_required,
    ]); ?>

</div>
