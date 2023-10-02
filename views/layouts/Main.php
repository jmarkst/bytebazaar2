<?php
namespace app\core;
use app\core\Application;
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, height=device-height">

  <!-- Site Properties -->
  <title>Welcome to ByteBazaar!</title>
    <!--
  <link rel="stylesheet" type="text/css" href="css/fomantic-ui/components/reset.css">
  <link rel="stylesheet" type="text/css" href="css/fomantic-ui/components/site.css">

  <link rel="stylesheet" type="text/css" href="css/fomantic-ui/components/container.css">
  <link rel="stylesheet" type="text/css" href="css/fomantic-ui/components/grid.css">
  <link rel="stylesheet" type="text/css" href="css/fomantic-ui/components/header.css">
  <link rel="stylesheet" type="text/css" href="css/fomantic-ui/components/image.css">
  <link rel="stylesheet" type="text/css" href="css/fomantic-ui/components/menu.css">

  <link rel="stylesheet" type="text/css" href="css/fomantic-ui/components/divider.css">
  <link rel="stylesheet" type="text/css" href="css/fomantic-ui/components/list.css">
  <link rel="stylesheet" type="text/css" href="css/fomantic-ui/components/segment.css">
  <link rel="stylesheet" type="text/css" href="css/fomantic-ui/components/dropdown.css">
  <link rel="stylesheet" type="text/css" href="css/fomantic-ui/components/icon.css">
-->
  <link rel="stylesheet" type="text/css" href="fomantic/semantic.css" />
  <style type="text/css">
  body {
    background-color: #fff;
  }
  .ui.menu .item img.logo {
    margin-right: 1.5em;
  }
  .main.container {
    margin-top: 7em;
  }
  .wireframe {
    margin-top: 2em;
  }
  .ui.footer.segment {
    margin: 5em 0em 0em;
    padding: 5em 0em;
  }
  </style>

</head>
<body>

  <div class="ui fixed inverted two item menu">
    <div class="ui container">
      <h1 href="#" class="header item">
        ByteBazaar
      </h1>
      <?php
      $login = $params['login'];
      if (!$login) {
          include_once Application::$ROOT.'/../views/components/loginregisterbutton.php';
      } else {
          include_once Application::$ROOT.'l../views/components/accountdropdown.php';
      }
      ?>
    </div>
  </div>

  <div class="ui main container">
      {{content}}
  </div>

  <div class="ui inverted vertical footer segment">
    <div class="ui center aligned container">
      <div class="ui stackable inverted divided grid">
        <div class="column">
          <h4 class="ui inverted header">ByteBazaar</h4>
          <p>Affordable items for your dream setup.</p>
          <div class="ui primary button">Buy today</div>
        </div>
      </div>
      <div class="ui inverted section divider"></div>
      <div class="ui vertical centered inverted small divided link list">
        <a class="item" href="#">Site Map</a>
        <a class="item" href="#">Contact Us</a>
        <a class="item" href="#">Terms and Conditions</a>
        <a class="item" href="#">Privacy Policy</a>
      </div>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="fomantic/semantic.js"></script>
</body>

</html>
