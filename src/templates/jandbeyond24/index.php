<?php
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx', '');

$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Generator tag
$this->setGenerator(null);

// Add Stylesheets
unset($this->_scripts[$this->baseurl . '/media/system/js/caption.js']);

if (isset($this->_script['text/javascript']))
{
    $this->_script['text/javascript'] = preg_replace('%jQuery\(window\).on\(\'load\',\s*function\(\)\s*\{\s*new\s*JCaption\(\'img.caption\'\)\;\s*\}\)\;\s*%', '', $this->_script['text/javascript']);

    if (empty($this->_script['text/javascript']))
    {
        unset($this->_script['text/javascript']);
    }
};

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=3">
    <link rel="preload" href="templates/jandbeyond20/font/saira-regular-webfont.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="templates/jandbeyond20/font/saira-extralight-webfont.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="templates/jandbeyond20/font/saira-semibold-webfont.woff2" as="font" type="font/woff2" crossorigin>

    <jdoc:include type="head" />
    <style>
        <?php echo file_get_contents(dirname(__FILE__) . "/css/critical.css"); ?>
    </style>
</head>
<body class="<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>">
    <header>
        <div class="header__headerbar">
            <a class="headerbar__logolink" href="<?php echo $this->baseurl ?>"><img loading="lazy" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/logomark.svg" alt="To Landingpage"></a>
            <button title="Open Menu" class="headerbar__navtoggler">Menu</button>
            <?php if ($this->countModules( 'headerbar__mainnavigation' )) : ?>
                <nav class="headerbar__mainnavigation">
                    <jdoc:include type="modules" name="headerbar__mainnavigation" />
                </nav>
            <?php endif; ?>

        </div>
    </header>
    <?php if ($this->countModules( 'header__introareacontainer' )) : ?>
        <jdoc:include type="modules" name="header__introareacontainer" />
    <?php endif; ?>
    <?php if ($pageclass === ' landingpage') : ?>
        <div class="wavedecoration">

        </div>
    <?php endif; ?>
    <main>
        <div class="main__content">
            <?php if ($this->countModules( 'content__top' )) : ?>
                <section class="content__top">
                    <jdoc:include type="modules" name="content__top" />
                </section>
            <?php endif; ?>
            <jdoc:include type="message" />
            <?php if( strpos( $pageclass, 'nocontent' ) === false) : ?>
                <jdoc:include type="component" />
            <?php endif; ?>
            <?php if ($this->countModules( 'content__bottom' )) : ?>
                <section class="content__bottom">
                    <jdoc:include type="modules" name="content__bottom" />
                </section>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <div class="footer__top">
            <?php if ($this->countModules( 'footer__latestnews' )) : ?>
                <nav class="footer__latestnews">
                    <jdoc:include type="modules" name="footer__latestnews" />
                </nav>
            <?php endif; ?>
            <?php if ($this->countModules( 'footer__newsletter' )) : ?>
                <nav class="footer__newsletter">
                    <jdoc:include type="modules" name="footer__newsletter" />
                </nav>
            <?php endif; ?>
            <?php if ($this->countModules( 'footer__twitter' )) : ?>
                <nav class="footer__twitter">
                    <jdoc:include type="modules" name="footer__twitter" />
                </nav>
            <?php endif; ?>
        </div>
        <div class="wavedecoration">

        </div>
        <div class="footer__bar">
            <?php if ($this->countModules( 'footerbar__navigation' )) : ?>
                <nav class="footer__navigation">
                    <jdoc:include type="modules" name="footerbar__navigation" />
                </nav>
            <?php endif; ?>
            <span class="footer__copyrightnote">
                Designed by Until Sunday.<br/> Developed by djumla GmbH
<br/>
                2015-2020 © JandBeyond. All rights reserved.
            </span>
        </div>
    </footer>
    <jdoc:include type="modules" name="debug" />
    <link href="<?php echo 'templates/' . $this->template . '/css/template.css?v=' . md5(file_get_contents(dirname(__FILE__) . "/css/template.css")); ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/template.min.js?v=<?php echo md5(file_get_contents(dirname(__FILE__) . "/js/template.min.js")); ?>"></script>

</body>
</html>
