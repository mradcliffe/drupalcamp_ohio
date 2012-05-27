<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
 global $base_url;
 global $user;

?>

  <div id="page-wrapper"><div id="page">

    <div id="header-wrapper">
      <?php print render($page['header']); ?>
      <div id="header"><div class="section clearfix">

      
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo-link">
          <div id="logo-top"><div id="logo-top-inner"></div></div>
          <div id="logo-bot"><div id="logo-bot-inner"></div></div>
        </a>

        <div id="register-wrapper">

          <?php if ($user->uid): ?>
          <div id="user">
            Welcome <?php print l(check_plain($user->name), 'user/' . $user->uid); ?>! &nbsp; | &nbsp; <?php print l(t('Log out'), 'user/logout'); ?><br />
          </div>
          <?php else: ?>
          <div id="login">
            <?php print l(t('Log in'), 'user/login'); ?> <!-- or <?php print l(t('Create an account'), 'user/register'); ?> to participate <br /> -->
          </div>
          <?php endif; ?>

          <div id="social">
            <a href="http://www.twitter.com/DrupalCampOhio" target="_blank" class='social-twitter'><img src="<?php print base_path() . path_to_theme(); ?>/images/twitter.png" /></a>
            <a href="http://www.facebook.com/pages/DrupalCamp-Ohio/271079496254806" target="_blank" class='social-facebook'><img src="<?php print base_path() . path_to_theme(); ?>/images/facebook.png" /></a>
            <a href="<?php print $base_url; ?>/rss.xml" target="_blank" class='social-rss'><img src="<?php print base_path() . path_to_theme(); ?>/images/rss.png" /></a>
          </div>
        </div>

      </div></div> <!-- /.section, /#header -->
    </div>

    <?php if ($main_menu || $secondary_menu): ?>
      <div id="navigation" class="<?php if ($main_menu) { print 'withprimary'; }?><?php if ($secondary_menu) { print ' withsecondary'; }?>"><div class="section">
        <div id="primary" class="clear-block">
          <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')))); ?>
        </div>
        <div id="secondary" class="clear-block">
          <?php //print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')))); ?>
        </div>
      </div></div> <!-- /.section, /#navigation -->
    <?php endif; ?>

    <div id="container-wrapper">
      <div id="container" class="clear-block clearfix">

        <?php if ($page['regnotice']): ?>
        <div id="registration-notice">
          <?php print render($page['regnotice']); ?>
        </div>
        <?php endif; ?>

        <div id="main" class="column">
          <?php if ($page['top']): ?>
          <div id="content-top">
            <?php print render($page['top']); ?>
          </div>
          <?php endif; ?>

          <div id="main-squeeze">
            <div id="content" class="column"><div class="section">
              <?php print $messages; ?>

              <a id="main-content"></a>
              <?php print render($title_prefix); ?>
              <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
              <?php print render($title_suffix); ?>
              <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
              <?php print render($page['help']); ?>
              <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
              <?php print render($page['content']); ?>
              <?php print $feed_icons; ?>
            </div></div> <!-- /.section, /#content -->
          </div>
        </div>

        <div id="sidebar">
          <?php if ($page['sidebar_first']): ?>
          <div id="sidebar-first" class="column sidebar"><div class="section">
            <?php print render($page['sidebar_first']); ?>
          </div></div> <!-- /.section, /#sidebar-first -->
          <?php endif; ?>

          <?php if ($page['sidebar_second']): ?>
          <div id="sidebar-second" class="column sidebar"><div class="section">
            <?php print render($page['sidebar_second']); ?>
          </div></div> <!-- /.section, /#sidebar-second -->
          <?php endif; ?>
        </div>
      </div>
    </div></div>


    <div id="footer"><div class="section">
      <?php print render($page['footer']); ?>
      <div id="footer-message">Thanks to our <a href='/about/staff'>Volunteers</a></div>
    </div></div> <!-- /.section, /#footer -->

  </div></div> <!-- /#page, /#page-wrapper -->
