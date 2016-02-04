<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Pjax;

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
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Files', 'url' => ['/files']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?php Pjax::begin(['timeout' => '100000000']); ?>
        <?= $content ?>
        <?php Pjax::end(); ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>

<script type="text/javascript">

    $(document).on('pjax:beforeReplace', function(e, content, options){
//        $('[data-pjax-exclude]').each(function(index, el){
//            $(el).find("*").attr('data-pjax-exclude', '1');
//        });

        window.pjax_exclude = [];
        $('[data-pjax-exclude]').each(function(index, el){
            console.log(getDomPath(el));
            window.pjax_exclude[getDomPath(el)] = $.extend(true, {}, $('[data-pjax-exclude]').eq(index));
        });



        //console.log('-------');
        //console.log(window.pjax_exclude['body div.wrap div.container div form div.form-group div.col-lg-11']);

        // Replace jQuery objects HTML with old one
        // And save jQuery objects with [data-pjax-exclude] for restore after PJAX query

        content.filter('[data-pjax-exclude]').each(function(index, el){
            $(el).html($('[data-pjax-exclude]').eq(index).html());
        });





    });

    $(document).on('pjax:complete', function(){

        console.log($('[data-pjax-exclude]').size());
        // Restore saved jQuery objects
        $('[data-pjax-exclude]').each(function(index, el){
            if (window.pjax_exclude[getDomPath(el)])
                $(el).replaceWith(window.pjax_exclude[getDomPath(el)]);
        });
    });

    function getDomPath(el){
        var parents = [],
            elm,
            entry;

        for (elm = el; elm; elm = elm.parentNode) {
            entry = elm.tagName.toLowerCase();
            if (entry === "html") {
                break;
            }
            if (elm.className && elm.className.replace) {
                entry += "." + elm.className.replace(/ /g, '.');
            }
            if (elm.id && elm.id.replace)
                entry += "#" + elm.id.replace(/ /g, '#');
            parents.push(entry);
        }
        parents.reverse();
        return parents.join(" ");
    }

</script>

</body>
</html>
<?php $this->endPage() ?>
