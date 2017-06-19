<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use \dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\WiRequest $model
 */

$this->title = 'WI Request Closing';
$this->params['breadcrumbs'][] = ['label' => 'Wi Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Closing';
?>
<div class="giiant-crud wi-request-update">

    <div class="panel panel-default">
    	<div class="panel-heading">
    	</div>
    	<div class="panel-body">
    		<div class="request-closing-form">
    			<?php $form = ActiveForm::begin([
		            'id' => 'RequestClosing',
		            'layout' => 'horizontal',
		            'enableClientValidation' => true,
		            'errorSummaryCssClass' => 'error-summary alert alert-error',
	    			'options' => ['enctype' => 'multipart/form-data'],
	            ]
	            );
	            ?>
	            <div class="">
		            <?php $this->beginBlock('main'); ?>
		            <p>
		            
		            <div class='form-group'>
		            	<?php echo Html::label('Attachment', 'uploadFile', ['class' => 'control-label col-sm-1'])?>
		            	<div class='col-sm-6'>
		            		<?php echo HTML::input('file', 'uploadFile');?>
		            	</div>
		            </div>
		            
		            <?= '';/* $form->field($model, 'uploadFile', ['horizontalCssClasses' => [
		        		'wrapper' => 'col-md-1',
		    		]])->fileInput()*/ ?>
		    		
		            </p>
		            <?php $this->endBlock(); ?>
		            <?=
				    Tabs::widget([
						'encodeLabels' => false,
						'items' => [[
						    'label'   => 'Wi',
						    'content' => $this->blocks['main'],
						    'active'  => true,
						],]
				    ]);
				    ?>
		            <hr/>
		            <div class="pull-left">
		            	<?= Html::submitButton(
			                '<span class="glyphicon glyphicon-check"></span> Close',
			                [
			                    'id' => 'save-' . $model->formName(),
			                    'class' => 'btn btn-success',
			                		//'data-confirm' => Yii::t('yii', 'Are you sure you want to continue?'),
			                ]
			                );
		                ?>
		                <?php echo Html::a('Cancel', Url::previous(), ['class' => 'btn btn-danger']) ?>
		                
		                <?php ActiveForm::end(); ?>
		            </div>
	            </div>
    		</div>
    	</div>
    </div>

</div>
