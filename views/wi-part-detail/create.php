<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\WiPartDetail $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Wi Part Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud wi-part-detail-create">

    <p class="pull-left">
        <?= Html::a('Cancel', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
