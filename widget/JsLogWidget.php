<?php
/**
 * Eugene Terentev <eugene@terentev.net>
 */

namespace trntv\yii\jslog\widget;

use trntv\yii\jslog\JsLogAsset;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;

class JsLogWidget extends Widget{

    public $url;
    public $clientOptions = [];

    public function run()
    {
        $clientOptions = ArrayHelper::merge([
            'handler'=>true,
            'url'=>Url::to($this->url)
        ], $this->clientOptions);
        JsLogAsset::register($this->view);
        $this->view->registerJs('new YiiLogger('.Json::encode($clientOptions).')');
    }
}