<?php

namespace app\models;

use Yii;
use \app\models\base\WiRemovalTbl as BaseWiRemovalTbl;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "wi_removal_tbl".
 */
class WiRemovalTbl extends BaseWiRemovalTbl
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
}
