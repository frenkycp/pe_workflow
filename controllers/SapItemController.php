<?php

namespace app\controllers;

use app\models\SapItem;
use app\models\search\SapItem as SapItemSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
 * SapItemController implements the CRUD actions for SapItem model.
 */
class SapItemController extends Controller
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;

	
	/**
	 * Lists all SapItem models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new SapItemSearch;
		$dataProvider = $searchModel->search($_GET);

		Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}
	
	public function actionInsertData()
	{
		$fileName = 'sap_item_03_jul17.xls';
		$columnNameArr = [
				'sap_partno', 'description', 'uom', 'analyst_group', 'analyst_desc', 'issue_type_desc', 'item_class', 'insert_type', 'flag'
		];
		
		set_time_limit(0);
		$basepath = \Yii::getAlias('@webroot') . '/uploads/';
		$fileInput = $basepath . $fileName;
		$inputFileType = \PHPExcel_IOFactory::identify($fileInput);
		$objReader = \PHPExcel_IOFactory::createReader($inputFileType);
		$objPhpExcel = $objReader->load($fileInput);
		
		$sheet = $objPhpExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();
		
		/* $rowData = $sheet->rangeToArray('A2:' . $highestColumn . $highestRow,
				NULL,
				TRUE,
				FALSE);
		
		for ($row = 2; $row <= $highestRow; $row++){
			$sapItem = SapItem::find()->where(['sap_partno' => $rowData[$row][0]])->one();
			if(count($sapItem) == 0)
			{
				$arrayData[] = [
						$rowData[$row][0], //sap_partno
						$rowData[$row][2], //description
						$rowData[$row][3], //uom
						$rowData[$row][4], //analyst_group
						$rowData[$row][6], //analyst_desc
						$rowData[$row][20], //issue_type_desc
						$rowData[$row][30], //item_class
						1, //insert_type
						1 //flag
				];
			}
			else 
			{
				
			}
		} */
		
		//$sapItem = SapItem::find()->where(['sap_partno' => $rowData[0][0]])->one();
		/* $sapItem = SapItem::find()->asArray()->all();
		$i = 0;
		foreach ($sapItem as $item)
		{
			$i++;
			if($i == 20)
			{
				exit();
			}
			//print_r($item) ;
			echo $item['sap_partno'] . '</br>';
		}
		return ; */
		
		//  Loop through each row of the worksheet in turn
		for ($row = 2; $row <= $highestRow; $row++){
			//  Read a row of data into an array
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
					NULL,
					TRUE,
					FALSE);
			
			$sapItem = SapItem::find()->where(['sap_partno' => $rowData[0][0]])->one();
			//  Insert row data array into your database of choice here
			//if($row > 1 && $row < 11)
			//{
			
			if(count($sapItem) == 0)
			{
				$arrayData[] = [
						$rowData[0][0], //sap_partno
						$rowData[0][2], //description
						$rowData[0][3], //uom
						$rowData[0][4], //analyst_group
						$rowData[0][6], //analyst_desc
						$rowData[0][20], //issue_type_desc
						$rowData[0][30], //item_class
						1, //insert_type
						1 //flag
				];
			}
			else 
			{
				//if($sapItem->insert_type == 2)
				//{
					$sapItem->description = $rowData[0][2];
					$sapItem->uom = $rowData[0][3];
					$sapItem->analyst_group = $rowData[0][4];
					$sapItem->analyst_desc = $rowData[0][6];
					$sapItem->issue_type_desc = $rowData[0][20];
					$sapItem->item_class = $rowData[0][30];
					$sapItem->insert_type = 1;
					if(!$sapItem->save())
					{
						return json_encode($sapItem->errors);
					}
				//}
			}
				
			//}
		}
		
		if(count($arrayData) > 0)
		{
			$insertCount = \Yii::$app->db->createCommand()->batchInsert('sap_item', $columnNameArr, $arrayData)->execute();
		}
		echo 'finished ...';
		//echo $insertCount . ' data has been inserted ...';
	}

	/**
	 * Displays a single SapItem model.
	 * @param integer $item_id
     *
	 * @return mixed
	 */
	public function actionView($item_id)
	{
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
			'model' => $this->findModel($item_id),
		]);
	}

	/**
	 * Creates a new SapItem model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new SapItem;
		$model->insert_type = 1;

		try {
            if ($model->load($_POST) && $model->save()) {
                return $this->redirect(Url::previous());
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
		}
        return $this->render('create', ['model' => $model]);
	}

	/**
	 * Updates an existing SapItem model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $item_id
	 * @return mixed
	 */
	public function actionUpdate($item_id)
	{
		$model = $this->findModel($item_id);

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing SapItem model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $item_id
	 * @return mixed
	 */
	public function actionDelete($item_id)
	{
        try {
        	$model = $this->findModel($item_id);
        	$model->flag = 0;
        	$model->save();
            //$this->findModel($item_id)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            \Yii::$app->getSession()->setFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$item_id',',');
        if ($isPivot == true) {
            return $this->redirect(Url::previous());
        } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
			Url::remember(null);
			$url = \Yii::$app->session['__crudReturnUrl'];
			\Yii::$app->session['__crudReturnUrl'] = null;

			return $this->redirect($url);
        } else {
            return $this->redirect(['index']);
        }
	}

	/**
	 * Finds the SapItem model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $item_id
	 * @return SapItem the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($item_id)
	{
		if (($model = SapItem::findOne($item_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
