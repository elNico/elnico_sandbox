<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
<?php print $head ?>
<title><?php print $head_title ?></title>
<?php print $styles ?>
<?php print $scripts ?>
<!--[if lt IE 7]>
<?php print phptemplate_get_ie_styles(); ?>
<![endif]-->
</head>
<body class="<?php print $body_class; ?>" id="<?php print $body_id;?>">
<!-- Layout -->
  <div id="header-region" class="clear-block"><?php print $header; ?></div>
    <div id="wrapper">
    <div id="container" class="clear-block">
      <div id="header">
        <div id="logo-floater">
        <?php
          if ($logo) {
            print '<h1><a href="'. check_url($front_page) .'" title="'. $site_title .'">
              <img src="'. check_url($logo) .'" alt="'. $site_title .'" id="logo" />
            </a><span>Unleash your creativity.</span></h1>';
          }
        ?>
        </div>
      </div> <!-- /header -->
      <?php if ($left): ?>
        <div id="sidebar-left" class="sidebar">
          <?php if ($search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
          <?php print $left ?>
        </div>
      <?php endif; ?>
      <div id="center">
        <div class="left-content">
          <div class="main-nav">
            <?php if($site_nav): ?>
              <?php print $site_nav ?>  
            <?php endif; ?>
            <?php if (isset($primary_links)) : ?>
              <?php //print theme('links', $primary_links, array('class' => 'primary-links')) ?>
            <?php endif; ?>
          </div>
          <div class="main-content-wrapper">
            <div class="main-content">
              <?php if (isset($secondary_links)) : ?>
                <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')) ?>
              <?php endif; ?>
              <?php //print $breadcrumb; ?>
              <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
              <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
              <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
              <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
              <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
              <?php if ($show_messages && $messages): print $messages; endif; ?>
              <?php print $help; ?>
              <?php print $content ?>
            </div>
          </div>
        </div>
        <?php if ($right_content): ?>
        <div id="sidebar-right" class="sidebar right-content">
          <?php if (!$left_content && $search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
        <?php print $right_content ?>
        </div>
      <?php endif; ?>
      </div> <!-- /#center -->
      <div id="footer"><?php print $footer_message . $footer ?></div>
    </div> <!-- /container -->
  </div>
<!-- /layout -->

  <?php print $closure ?>
  </body>
</html>
