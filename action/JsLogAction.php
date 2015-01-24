<?php
namespace trntv\yii\jslog\action;
use Yii;
use yii\base\Action;
use yii\helpers\ArrayHelper;
use yii\log\Logger;

/**
 * Eugene Terentev <eugene@terentev.net>
 */


class JsLogAction extends Action{

    public $baseCategory = 'js';

    public function run()
    {
        $levels = [
            'error' => Logger::LEVEL_ERROR,
            'warning' => Logger::LEVEL_WARNING,
            'info'=>Logger::LEVEL_INFO,
        ];
        $level = ArrayHelper::getValue($levels, \Yii::$app->request->post('level'), 'info');
        Yii::getLogger()->log(
            \Yii::$app->request->post('message'),
            $level,
            $this->baseCategory . '\\' .\Yii::$app->request->post('category', 'application')
        );
    }
}