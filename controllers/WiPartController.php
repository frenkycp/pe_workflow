<?php

namespace app\controllers;

use app\models\WiPart;
use app\models\search\WiPartSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use app\models\SapItem;

/**
 * WiPartController implements the CRUD actions for WiPart model.
 */
class WiPartController extends Controller
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;
    
    public function behaviors()
    {
    	//apply role_action table for privilege (doesn't apply to super admin)
    	return \app\models\Action::getAccess($this->id);
    }

	
	/**
	 * Lists all WiPart models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new WiPartSearch;
		$dataProvider = $searchModel->search($_GET);

		Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single WiPart model.
	 * @param integer $wi_part_id
     *
	 * @return mixed
	 */
	public function actionView($wi_part_id)
	{
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
			'model' => $this->findModel($wi_part_id),
		]);
	}

	/**
	 * Creates a new WiPart model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new WiPart;
		if ($model->load($_POST))
		{
			$column_arr = ['masterlist_id', 'sap_partno'];
			$masterlistId = $model->masterlist_id;
			$tmp_arr_partno = trim(preg_replace('/\t+/', '', $model->part_arr));
			$arr_partno = preg_split("/\r\n|\n|\r/", $tmp_arr_partno);
			foreach ($arr_partno as $partno)
			{
				$partno = str_replace(' ', '', $partno);
				$isNewWiPart = false;
				$sap_partno = 0;
				$tmp_part = SapItem::find()->where(['sap_partno' => $partno])->one();
				if(empty($tmp_part))
				{
					$isNewWiPart = true;
					$sap_item = new SapItem();
					$sap_item->sap_partno = $partno;
					$sap_item->insert_type = 2;
					if($sap_item->save())
					{
						$tmp_part = $sap_item;
					}
					else
					{
						return $tmp_part->errors;
					}
				}
				else
				{
					$tmpWiPart = WiPart::find()->where(['masterlist_id' => $masterlistId, 'sap_partno' => $tmp_part->sap_partno])->one();
					if(empty($tmpWiPart))
					{
						$isNewWiPart = true;
					}
					else
					{
						$isNewWiPart = false;
					}
				}
				$sap_partno = $tmp_part->sap_partno;
				if($isNewWiPart == true)
				{
					$wipart_arr[] = [$masterlistId, $sap_partno];
				}
	
			}
			//return print_r($wipart_arr);
			if(count($wipart_arr) > 0)
			{
				$insertCount = \Yii::$app->db->createCommand()->batchInsert('dbworkflow.wi_part', $column_arr, $wipart_arr)->execute();
				
				//return $this->redirect(Url::previous());
			}
                        date_default_timezone_set('Asia/Jakarta');
                        $partDetail = \app\models\WiPartDetail::find()->where(
                                ['masterlist_id' => $masterlistId]
                        )->one();
                        if(count($partDetail) == 0)
                        {
                            $partDetail = new \app\models\WiPartDetail;
                            $partDetail->masterlist_id = $masterlistId;
                            $partDetail->update_date = date('Y-m-d');
                            if(!$partDetail->save())
                            {
                                return json_encode($partDetail->errors);
                            }
                        }
			return $this->redirect(['index']);
		}
	
		return $this->render('create', ['model' => $model]);
	}

	/**
	 * Updates an existing WiPart model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $wi_part_id
	 * @return mixed
	 */
	public function actionUpdate($wi_part_id)
	{
		$model = $this->findModel($wi_part_id);

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing WiPart model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $wi_part_id
	 * @return mixed
	 */
	public function actionDelete($wi_part_id)
	{
        try {
            $deletedModel = $this->findModel($wi_part_id);
            $deletedModel->flag = 0;
            $deletedModel->save();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            \Yii::$app->getSession()->setFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$wi_part_id',',');
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
	 * Finds the WiPart model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $wi_part_id
	 * @return WiPart the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($wi_part_id)
	{
		if (($model = WiPart::findOne($wi_part_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
