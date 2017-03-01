<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\WiStatus $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Wi Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud wi-status-create">

    <p class="pull-left">
        <?= Html::a('Cancel', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
