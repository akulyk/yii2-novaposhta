<?php 
namespace kulyk\yii\modules\novaposhta\widgets\novaposhta;

use yii\web\AssetBundle;

class NovaposhtaAsset extends AssetBundle
{
	public $sourcePath = '@kulyk/yii/modules/novaposhta/widgets/novaposhta/assets';

	public $depends = [

		
	];

	public $js = [
			
             'js/novaposhta.js'
	];
        
        public $css = [
			'css/novaposhta.less'
            
	];
	
	public $jsOptions = ['position' => \yii\web\View::POS_END];
	
	public $publishOptions =['forceCopy'=>true];
}

?>