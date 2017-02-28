<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
* @var yii\web\View $this
* @var app\models\WiRemark $model
*/

$this->title = isset($_GET['wi_id']) ? 'Reject WI' : 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Wi Remarks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud wi-remark-create">

    <p class="pull-left">
        <?= Html::a('Cancel', isset($_GET['wi_id']) ? Url::to(['/my-job']) : \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
