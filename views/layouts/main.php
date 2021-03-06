<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\icons\Icon;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Icon::show('home').'Tutor App',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    Icon::map($this, Icon::FA);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => Icon::show('users'). 'Estudiantes', 
                'url' => ['/student/'],
                'visible' => Yii::$app->user->id == 1,
            ],
            ['label' => Icon::show('book'). 'Materias',
                'url' => ['/subject/'],
                'visible' => !Yii::$app->user->isGuest,
            ],
            ['label' => Icon::show('pencil'). 'Grades',
                'url' => ['/grade/'],
                'visible' => Yii::$app->user->id == 1,
            ],
            ['label' => Icon::show('file-text'). 'Reportes',
                'url' => ['/report/'],
                'visible' => Yii::$app->user->id == 1,
            ],
            ['label' => Icon::show('book'). 'Calificar Materias',
                'url' => ['/student/view?id='.Yii::$app->user->id],
                'visible' => Yii::$app->user->id == 1 || !Yii::$app->user->isGuest,
            ],
            Yii::$app->user->isGuest ? (
                ['label' => Icon::show('sign-in').'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
        'encodeLabels' => false
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Universidad Autonoma de la Yucatán <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
