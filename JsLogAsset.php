<?php
namespace trntv\yii\jslog;
use yii\web\AssetBundle;

/**
 * Eugene Terentev <eugene@terentev.net>
 */

class JsLogAsset extends AssetBundle{
    public $sourcePath = '@trntv\yii\jslog\assets';
    public $js = [
        'yii-js-log.js'
    ];
}