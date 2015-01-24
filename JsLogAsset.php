<?php
namespace trntv\yii\jslog;
use yii\web\AssetBundle;

/**
 * Eugene Terentev <eugene@terentev.net>
 */

class JsLogAsset extends AssetBundle{
    public $sourcePath = '@vendor/trntv/yii2-js-log/assets';
    public $js = [
        'yii-js-log.js'
    ];
}