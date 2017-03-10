<!DOCTYPE html>
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

$this->title = 'Sign In';
$this->registerCss('.login-box{width: 360px; margin: auto; padding-top: 5%; height: 900px;} 
		.login-logo a{color: rgba(249, 249, 249, 0.5); font-size: 45px;} 
		.login-logo{margin-bottom: 10px;} 
		.login-box-body{opacity: 0.7} 
		.login-page{overflow-y: hidden;}');

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

?>
<div class="login-container" style="background-image: url(<?php echo Yii::$app->urlManager->baseUrl ?>/uploads/pict2.jpg); background-size: cover; background-position-y: 0px">
<div style="background-color: rgba(0,0,0,0.6)">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Workflow WI/WG</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= ''//$form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center" style="display: none;">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign
                in using Google+</a>
        </div>
        <!-- /.social-auth-links -->

        <a href="#" style="display: none;">I forgot my password</a><br>
        <?= ''//Html::a("Register a new membership", ["site/register"], ["class"=>"text-center"]) ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
</div>
</div><!-- login-container -->