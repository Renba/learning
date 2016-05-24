<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\debug\Toolbar;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use kartik\icons\Icon;

AppAsset::register($this);
// You can use the registerAssetBundle function if you'd like
//$this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title><?php echo Html::encode($this->title); ?></title>
<meta property='og:site_name' content='<?php echo Html::encode($this->title); ?>' />
<meta property='og:title' content='<?php echo Html::encode($this->title); ?>' />
<meta property='og:description' content='<?php echo Html::encode($this->title); ?>' />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<link rel='stylesheet' type='text/css' href='<?php echo $this->theme->baseUrl; ?>/files/main_style.css' title='wsite-theme-css' />
<?php $this->head(); ?>
</head>
<body class='wsite-theme-light tall-header-page wsite-page-index weeblypage-index'>
  <?php $this->beginBody(); ?>
<div id="wrapper">
  <div id="container">
    <table id="header">
      <tr>
        <td id="logo"><span class='wsite-logo'><a href='/'><span id="wsite-title">Universidad Autónoma de Yucatán</span></a></span></td>
        <td id="header-right">
          <table>
            <tr>
              <td class="phone-number"></td>
              <td class="social"></td>
              <td class="search"></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <div id="navigation">
            <?php echo Menu::widget(array(
        'options' => array('class' => 'nav'),
        'items' => array(
          array('label' => 'Home', 'url' => array('/site/index')),
          array('label' => 'About', 'url' => array('/site/about')),
          array('label' => 'Contact', 'url' => array('/site/contact')),
		     array('label' => 'Estudiantes', 'url' => array('/student/index')),
          array('label' => 'Materias', 'url' => array('/subject/index')),
        
          Yii::$app->user->isGuest ?
            array('label' => 'Login', 'url' => array('/site/login')) :
            array('label' => 'Logout (' . Yii::$app->user->identity->username .')' , 'url' => array('/site/index')),
        ),
      )); ?>
    </div>
    <div id="banner">
      <div class="wsite-header"></div>
    </div>
    <div id="content"><div id='wsite-content' class='wsite-not-footer'>
      <?php echo $content; ?>
</div>
</div>
    <div id="footer">
	<span>
	
	© Todos los Derechos Reservados, UADY 2016 Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica, de otro forma requiere permiso previo por escrito de la institución. </span>
</div>
  </div>
</div>


</body>
</html>
