<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>
<body class="<?php print $body_classes; ?>">
  <div id="page">
        <div id="header-wrapper">
          <?php print $header; ?>
    <div id="header">


      <?php if (!empty($search_box)): ?>
        <div id="search-box"><?php print $search_box; ?></div>
      <?php endif; ?>

      <a id="logo-link" href="/">
        <div id="logo-top"><div id="logo-top-inner"></div></div>
        <div id="logo-bot"><div id="logo-bot-inner"></div></div>
      </a>
      <div id="register-wrapper">
        <!--  
        <div id="register">
          <a href="/register"><img src="<?php //print base_path() . path_to_theme(); ?>/images/register-flag.png" /></a>
        </div>
        -->
        <?php if ($user->uid > 0): ?>
          <div id="user">
            Welcome <a href="/user"><?php print $user->name; ?></a>!  &nbsp; | &nbsp; <a href="/logout">Log out</a><br />
            <!--  <a href="/node/add/session">Submit your session</a> now! -->
          </div>
        <?php else: ?>
	      <div id="login">
            <a href="/user/login">Log in</a> <!-- or <a href="/user/register">Create an Account</a> to participate <br /> -->
	      </div>
        <?php endif; ?>
        <div id="social">
          <a href="http://www.twitter.com/DrupalCampOhio" target="_blank" class='social-twitter'><img src="<?php print base_path() . path_to_theme(); ?>/images/twitter.png" /></a>
          <a href="http://www.facebook.com/pages/DrupalCamp-Ohio/271079496254806" target="_blank" class='social-facebook'><img src="<?php print base_path() . path_to_theme(); ?>/images/facebook.png" /></a>
          <a href="/rss.xml" target="_blank" class='social-rss'><img src="<?php print base_path() . path_to_theme(); ?>/images/rss.png" /></a>
      </div>
      </div>
      
       <div id="navigation" class="menu <?php if (!empty($primary_links)) { print "withprimary"; } if (!empty($secondary_links)) { print " withsecondary"; } ?> ">
        <?php if (!empty($primary_links)): ?>
          <div id="primary" class="clear-block">
            <?php print theme('links', $primary_links, array('class' => 'links primary-links')); ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($secondary_links)): ?>
          <div id="secondary" class="clear-block">
            <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')); ?>
          </div>
        <?php endif; ?>
      </div> <!-- /navigation -->
      
    <!-- <div id="header-bottom"></div> -->
    </div> <!-- /header -->
    </div>
    <div id="container-wrapper">
    <div id="container" class="clear-block">
    
       <div id="registration-notice">
          <?php print $regnotice; ?>
       </div>
      
<div id="main" class="column">
       <div id="content-top">
          <?php print $top; ?>
       </div>
      <div id="main-squeeze">
        <?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
        <?php if (!empty($mission)): ?><div id="mission"><?php print $mission; ?></div><?php endif; ?>
  <?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
  <?php if (!empty($breadcrumb)): ?><div id="breadcrumb"><?php /* print $breadcrumb; */ ?></div><?php endif; ?>
   
        <div id="content">
       
          <?php if (!empty($messages)): print $messages; endif; ?>
          <?php if (!empty($help)): print $help; endif; ?>
       

 
          <div id="content-content" class="clear-block">
            <?php print $content; ?>
          </div> <!-- /content-content -->
          <?php print $feed_icons; ?>
        </div> <!-- /content -->

      </div></div> <!-- /main-squeeze /main -->
<div id="sidebar">
       
      <?php if (!empty($left)): ?>
        <div id="sidebar-left" class="column sidebar">
          <?php print $left; ?>
        </div> <!-- /sidebar-left -->
      <?php endif; ?>

      <?php if (!empty($right)): ?>
        <div id="sidebar-right" class="column sidebar">
          <?php print $right; ?>
        </div> <!-- /sidebar-right -->
      <?php endif; ?>
      </div>
    </div>
    </div> <!-- /container -->

    <div id="footer-wrapper">
      <div id="footer">
        <?php print $footer_message; ?> 
        <?php if (!empty($footer)): print $footer; endif; ?>
        <div id="footer-message">Thanks to our <a href='/volunteers'>Volunteers</a></div>
      </div> <!-- /footer -->
    </div> <!-- /footer-wrapper -->

    <?php print $closure; ?>

  </div> <!-- /page -->

</body>
</html>
