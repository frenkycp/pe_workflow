<?php

namespace app\models;

use yii\helpers\Html;
use \app\models\base\DcnWi as BaseDcnWi;

/**
 * This is the model class for table "dbworkflow.dcn_wi".
 */
class DcnWi extends BaseDcnWi
{
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dcnno' => 'DCN No',
            'widocno' => 'Doc. No.',
            'stat' => 'Status',
        ];
    }
    
    public function getWidocno()
    {
        return $this->hasOne(\app\models\Wi::className(), ['wi_docno' => 'widocno']);
    }
    
    public function getDcn()
    {
        return $this->hasOne(\app\models\Dcn::className(), ['dcn_no' => 'dcnno']);
    }
    
    public function getWiStatus()
    {
        return $this->hasOne(\app\models\WiStatus::className(), ['status_id' => 'stat']);
    }
    
    public function getDcnTitle()
    {
        return $this->getDcn()->one()->dcn_title;
    }
    
    public function getDcnNo()
    {
        $dcn = $this->getDcn()->one();
        //return Html::a($this->dcnno, \yii\helpers\Url::to(['/dcn/view', 'dcn_id' => $dcn->dcn_id]));
        return Html::a($this->dcnno, \Yii::$app->request->hostInfo . '/workflow/index.php?page=detail_dcn&id=' . $dcn->dcn_id, ['target' => '_blank']);
    }
    
    public function getDcnStatus()
    {
        $labelClass = '';
        $dcn = $this->getDcn()->one();
        if($dcn->dcn_stat == 'CLOSE')
        {
            $labelClass = 'bg-green';
        }
        else if($dcn->dcn_stat == 'OPEN')
        {
            $labelClass = 'bg-red';
        }
        return '<span style="padding: 1px 15px;" class="' . $labelClass . '">' . $dcn->dcn_stat . '</span>';
    }
}
