<?php

namespace kulyk\yii\modules\novaposhta;

use Yii;
use yii\base\BootstrapInterface;
use yii\base\Module as BaseModule;

/**
 * novaposhta module definition class
 */
class Module extends BaseModule implements BootstrapInterface
{
    public $apiKey;
    public $cityRef;
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'kulyk\yii\modules\novaposhta\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
      //  $this->registerTranslations();
    //   var_dump(Yii::$app->i18n);die;
        if (Yii::$app instanceof \yii\console\Application) {
            $this->controllerNamespace = 'kulyk\yii\modules\novaposhta\console\controllers';
        }

        parent::init();
    }/**/

    public function bootstrap($app)
    {
        //   var_dump(Yii::$app->i18n);die;
        if ($app instanceof \yii\web\Application) {
            $moduleId = $this->id;
            $app->getUrlManager()->addRules([
                $moduleId . '/get-cargo-cost' =>    $moduleId .'/default/get-cargo-cost',
                //    'translations/<id:\d+>' => $moduleId . '/default/update',
                //    'translations/page/<page:\d+>' => $moduleId . '/default/index',
                //    'translations' => $moduleId . '/default/index',
            ], false);
        }
      //  var_dump(Yii::$app->getUrlManager());
    }/**/

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['kulyk/yii/modules/novaposhta/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@kulyk/yii/modules/novaposhta/messages',
            'fileMap' => [
                'novaposhta/np' => 'np.php',

            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('novaposhta/' . $category, $message, $params, $language);
    }



}/* end of Module */
