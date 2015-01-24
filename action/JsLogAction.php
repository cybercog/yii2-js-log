<?php
namespace trntv\yii\jslog\action;
use yii\base\Action;
use yii\helpers\ArrayHelper;
use yii\log\Logger;

/**
 * Eugene Terentev <eugene@terentev.net>
 */


class JsLogAction extends Action{

    public $logger = 'logger';
    public $baseCategory = 'js';

    public function run()
    {
        $levels = [
            'error' => Logger::LEVEL_ERROR,
            'warning' => Logger::LEVEL_WARNING,
            'info'=>Logger::LEVEL_INFO,
        ];
        $level = ArrayHelper::getValue($levels, \Yii::$app->request->post('level'), 'info');
        /** @var \yii\log\Logger $logger */
        $logger = \Yii::$app->get($this->logger);
        $logger->log(
            \Yii::$app->request->post('message'),
            $level,
            $this->baseCategory . '\\' .\Yii::$app->request->post('category', 'application')
        );
    }
}