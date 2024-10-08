<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "WI Distribution";
?>
<section class="content-header">
	<h1>
		Dashboard
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>
<section class="content">

	<div class="row">
		<div class="clearfix visible-xs"></div>
		<div class="col-lg-4 col-lg-offset-2">
			<div class="small-box bg-red">
				<div class="inner" style="text-align: center;">
					<h3><?= $wi_open; ?></h3>
					<p>WI OPEN</p>
				</div>
				<?= Html::a('More Info ', Url::to(['wi/index', 'index_type' => 'open']), ['target' => '_blank', 'class' => 'small-box-footer']); ?>
			</div>
		</div>

		<div class="col-lg-4" style="text-align: center;">
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?= $wi_close; ?></h3>
					<p>WI CLOSE</p>
				</div>
				<?= Html::a('More Info ', Url::to(['wi/index', 'index_type' => 'close']), ['target' => '_blank', 'class' => 'small-box-footer']); ?>
			</div>
		</div>
	</div>
	<div class="row">

		<div class="col-lg-2 col-xs-6">
			<div class="small-box bg-yellow">
				<div class="inner center-text">
					<h3><?= $wi_wimaker; ?></h3>
					<p>WI MAKER</p>
				</div>
				<?= Html::a('More Info ', Yii::$app->user->identity->role_id == Yii::$app->params['roleid_wimaker'] ? Url::to(['my-job/index']) : Url::to(['wi/index', 'index_type' => 'wi_maker']), ['target' => '_blank', 'class' => 'small-box-footer']); ?>
			</div>
		</div>

		<div class="col-lg-2 col-xs-6">
			<div class="small-box bg-yellow">
				<div class="inner center-text">
					<h3><?= $wi_rejected; ?></h3>
					<p>REJECTED</p>
				</div>
				<?= Html::a('More Info ', Yii::$app->user->identity->role_id == Yii::$app->params['roleid_wimaker'] ? Url::to(['my-job/index', 'status' => 14]) : Url::to(['wi/index', 'index_type' => 'rejected']), ['target' => '_blank', 'class' => 'small-box-footer']); ?>
			</div>
		</div>

		<div class="col-lg-2 col-xs-6">
			<div class="small-box bg-yellow">
				<div class="inner center-text">
					<h3><?= $wi_smile_check; ?></h3>
					<p>SMILE CHECK</p>
				</div>
				<?= Html::a('More Info ', Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin2'] ? Url::to(['my-job/index']) : Url::to(['wi/index', 'index_type' => 'check_smile']), ['target' => '_blank', 'class' => 'small-box-footer']); ?>
			</div>
		</div>

		<div class="col-lg-2 col-xs-6">
			<div class="small-box bg-yellow">
				<div class="inner center-text">
					<h3><?= $wi_detail_check; ?></h3>
					<p>FINAL CHECK</p>
				</div>
				<?= Html::a('More Info ', Yii::$app->user->identity->role_id == Yii::$app->params['roleid_checker'] ? Url::to(['my-job/index']) : Url::to(['wi/index', 'index_type' => 'check1']), ['target' => '_blank', 'class' => 'small-box-footer']); ?>
			</div>
		</div>

		<div class="col-lg-2 col-xs-6">
			<div class="small-box bg-yellow">
				<div class="inner center-text">
					<h3><?= $wi_waiting_app; ?></h3>
					<p>APPROVAL</p>
				</div>
				<?= Html::a('More Info ', Yii::$app->user->identity->role_id == Yii::$app->params['roleid_approval'] ? Url::to(['my-job/index']) : Url::to(['wi/index', 'index_type' => 'waiting_approval']), ['target' => '_blank', 'class' => 'small-box-footer']); ?>
			</div>
		</div>

		<div class="col-lg-2 col-xs-6">
			<div class="small-box bg-yellow">
				<div class="inner center-text">
					<h3><?= $wi_waiting_dist; ?></h3>
					<p>DISTRIBUTION</p>
				</div>
				<?= Html::a('More Info ', Yii::$app->user->identity->role_id == Yii::$app->params['roleid_admin1'] ? Url::to(['my-job/index', 'status' => 12]) : Url::to(['wi/index', 'index_type' => 'waiting_dist']), ['target' => '_blank', 'class' => 'small-box-footer']); ?>
			</div>
		</div>

	</div>

</section>