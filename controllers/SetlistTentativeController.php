<?php
namespace app\controllers;

use yii\web\Controller;

class SetlistTentativeController extends Controller
{
 	public function actionIndex($value='')
 	{
 		return $this->render('index');
 	}
}