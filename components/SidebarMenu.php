<?php

namespace app\components;

use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Menu;
use app\models\Wi;

class SidebarMenu extends Widget
{
    public static function getMenu($roleId, $parentId=NULL){
        $output = [];
        foreach(Menu::find()->where(["parent_id"=>$parentId])->orderBy('order')->all() as $menu){
            $obj = [
                "label" => $menu->name,
                "icon" => $menu->icon,
                "url" => SidebarMenu::getUrl($menu),
                "visible" => SidebarMenu::roleHasAccess($roleId, $menu->id),
            	"controller" => \Yii::$app->controller->id,
            	"total-jobs" => SidebarMenu::getJobCount(\Yii::$app->user->identity->role_id),
            ];

            if(count($menu->menus) != 0){
                $obj["items"] = SidebarMenu::getMenu($roleId, $menu->id);
            }

            $output[] = $obj;
        }
        return $output;
    }
    
    private static function getJobCount($roleid)
    {
    	if($roleid == \Yii::$app->params['roleid_wimaker'])
    	{
    		return 0;
    	}else if($roleid == \Yii::$app->params['roleid_admin1'])
    	{
    		return Wi::find()->where(['wi_status' => wi::$_STATUS_CHECK_MASTERLIST])->count();
    	}
    }

    private static function roleHasAccess($roleId, $menuId){
        $roleMenu = \app\models\RoleMenu::find()->where(["menu_id"=>$menuId, "role_id"=>$roleId])->one();
        if($roleMenu){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    private static function getUrl($menu){
        if($menu->controller == NULL){
            return "#";
        }else{
            return [$menu->controller."/".$menu->action];
        }
    }
}