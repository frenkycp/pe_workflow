<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use kartik\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\search\SapItem $searchModel
*/

$this->title = 'Setlist Tentative SMT';
$this->params['breadcrumbs'][] = $this->title;
?>
<span><em>This menu are used for Setlist SMT Tentative project</em></span>
<h3><u>MENU</u></h3>
<ol>
	<li><?= Html::a('Upload Setlist Tentative', 'http://172.17.144.217/setlist/PE', ['target' => '_blank']) ?></li>
</ol>