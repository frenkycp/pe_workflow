<?php 
namespace app\controllers;

use yii\rest\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\httpclient\Client;

use app\models\SapItem;
use app\models\MitaSapItem;
use app\models\WiPart;

class RestApiController extends Controller
{
	public function actionUpdateSapItem($value='')
	{
		/*\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        date_default_timezone_set('Asia/Jakarta');

        $get_null_desc = WiPart::find()->select(['sap_partno'])->where('sap_partname IS NULL')->groupBy('sap_partno')->all();
        $get_sap_item = MitaSapItem::find()->all();

        $partno_arr = [];
        //foreach ($get_null_desc as $null_desc_row) {
        	foreach ($get_sap_item as $key => $sap_row) {
        		//if ($sap_row->material == $null_desc_row->sap_partno) {
        			WiPart::updateAll([
		        		'sap_partname' => $sap_row->material_description
		        	], [
		        		'sap_partno' => $sap_row->material
		        	]);
        		//}
	        	
	        }
        //}
        
        return count($get_null_desc);
	}*/
}