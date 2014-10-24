<?php

class BrowserController extends Controller
{
    public function actionIndex($theme)
    {
      Yii::app()->session['theme'] = $theme;
      $referrer = Yii::app()->request->urlReferrer ? Yii::app()->request->urlReferrer : "/mob"; //or whatever your website root is
        Yii::app()->request->redirect($referrer);
    }
}

?>