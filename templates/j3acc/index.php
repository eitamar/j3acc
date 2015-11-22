<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.j3acc
 *
 * @copyright   Copyright (C) 2015 J-Guru.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

include_once JPATH_THEMES . '/' . $this->template . '/logic.php';
?><!doctype html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

    <head>
        <jdoc:include type="head" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/images/apple-touch-icon-57x57-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/images/apple-touch-icon-72x72-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/images/apple-touch-icon-114x114-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $tpath; ?>/images/apple-touch-icon-144x144-precomposed.png" />

        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script type="text/javascript" src="<?php echo $tpath; ?>/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="<?php echo (($this->default_is_active_menu) ? ('front') : ('site')) . ' ' . $active_menu->alias . ' menuid' . $active_menu->id . ' ' . $pageclass; ?>" role="document">

        <?php //require_once 'html/bootstrap.example.php'; // test only - delete this line  ?>

        <?php if ($this->countModules('navbar')): ?> 
            <!-- NAVBAR -->
            <nav class="navbar navbar-default navbar-fixed-top navbar-shrink" role="navigation">
                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-modules">
                            <span class="sr-only">Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <?php if ($templateparams->get('showbranding', 1) == 1): ?>  
                            <a class="navbar-brand" href="<?php echo $this->baseurl; ?>/"><?php echo $app->getCfg('sitename'); ?></a>
                        <?php endif; ?>

                    </div>

                    <div class="collapse navbar-collapse" id="navbar-modules">
                        <jdoc:include type="modules" name="navbar" />
                    </div>



                </div>
            </nav>
        <?php endif; ?>

        <?php if ($this->countModules('showcase')): ?> 
            <!-- showcase -->
            <div id="showcase" class="row-fluid">
                <div class="container">
                    <jdoc:include type="modules" name="showcase" />
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->countModules('breadcrumbs')): ?> 
            <!-- BREADCRUMBS -->
            <div class="container">
                <jdoc:include type="modules" name="breadcrumbs" />
            </div>
        <?php endif; ?>

        <!-- CONTENT -->
        <div id="main-container" class="container">
            <div class="row">
                <!-- content -->
                <div id="main" class="col-md-9">

                    <?php if ($this->countModules('content-top')): ?> 
                        <div class="row">
                            <jdoc:include type="modules" name="content-top" />
                        </div>
                    <?php endif; ?>

                    <?php if ($this->countModules('main-content') && $this->default_is_active_menu): ?> 
                        <jdoc:include type="modules" name="main-content" />
                    <?php else: ?>
                        <jdoc:include type="message" />
                        <jdoc:include type="component" />
                    <?php endif; ?>

                    <?php if ($this->countModules('content-bottom')): ?> 
                        <div class="row">
                            <jdoc:include type="modules" name="content-bottom" />
                        </div>
                    <?php endif; ?>

                </div> 

                <!-- sidebar -->
                <div class="col-md-3" id="sidebar">
                    <div id="insidebar">
                        <jdoc:include type="modules" name="sidebar" style="well" />
                    </div>
                </div>

            </div>
        </div>

        <?php if ($this->countModules('bottom')): ?> 
            <div id="bottom" class="row-fluid">
                <div class="container">
                    <jdoc:include type="modules" name="bottom" style="" />
                </div>
            </div>
        <?php endif; ?>


        <div id="footer" class="container footer">
            <p><br />Copyright &copy; <?php echo date('Y'); ?> - <?php echo $app->getCfg('sitename'); ?></p>
        </div>


        <jdoc:include type="modules" name="debug" />
        <?php empty($analytics_id) ? : require_once 'html/googleanalytics.php'; ?>

    </body>

</html>
