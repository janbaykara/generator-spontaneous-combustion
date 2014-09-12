<?
// ======================
// Global defines
// ======================

include('functions.php');

// Strings
$PUBLISHER      = "Boom Online Marketing Ltd.";
$PROJECTNAME    = "Youwot Shitsum?";
$PAGETITLE      = $PROJECTNAME;
$DESCRIPTION    = "The Rational Placeholder Text Generator.";
$COPYRIGHT      = $PUBLISHER." &copy; ".date("Y");

// URLs
$BASEURL        = "/playground/lorem-ipsum";
$ASSETURL       = $BASEURL;
$CSSURL         = $ASSETURL."/css";
$JSURL          = $ASSETURL."/js";
$IMGURL         = $ASSETURL."/img";

$LOGO           = $IMGURL."/logo.png";

// Miscellaneous
$SCHEMAROOT     = "WebPage";
$ANALYTICSCODE  = "xx";

// ======================
//  Scaffold HTML
// ======================

$SCAFFOLD_HEAD = <<<HTML
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" itemscope itemtype="http://schema.org/$SCHEMAROOT" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" itemscope itemtype="http://schema.org/$SCHEMAROOT" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" itemscope itemtype="http://schema.org/$SCHEMAROOT" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" itemscope itemtype="http://schema.org/$SCHEMAROOT" lang="en"> <!--<![endif]-->
<head>

    <!-- ********************************
    *
    *   Powered by cynicism and hayfever. 
    *
    ********************************* -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Mass of favicon data, courtesy of the http://faviconit.com/ generator -->
      <link rel="apple-touch-icon-precomposed" sizes="57x57" href="fav/apple-touch-icon-57x57.png" />
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="fav/apple-touch-icon-114x114.png" />
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="fav/apple-touch-icon-72x72.png" />
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="fav/apple-touch-icon-144x144.png" />
      <link rel="apple-touch-icon-precomposed" sizes="60x60" href="fav/apple-touch-icon-60x60.png" />
      <link rel="apple-touch-icon-precomposed" sizes="120x120" href="fav/apple-touch-icon-120x120.png" />
      <link rel="apple-touch-icon-precomposed" sizes="76x76" href="fav/apple-touch-icon-76x76.png" />
      <link rel="apple-touch-icon-precomposed" sizes="152x152" href="fav/apple-touch-icon-152x152.png" />
      <link rel="icon" type="image/png" href="fav/favicon-196x196.png" sizes="196x196" />
      <link rel="icon" type="image/png" href="fav/favicon-96x96.png" sizes="96x96" />
      <link rel="icon" type="image/png" href="fav/favicon-32x32.png" sizes="32x32" />
      <link rel="icon" type="image/png" href="fav/favicon-16x16.png" sizes="16x16" />
      <link rel="icon" type="image/png" href="fav/favicon-128.png" sizes="128x128" />
      <meta name="msapplication-TileColor" content="#FFFFFF" />
      <meta name="msapplication-TileImage" content="mstile-144x144.png" />
      <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
      <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
      <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
      <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />

<!-- Metadata -->
    <title>$PAGETITLE</title>
    <meta content="$PROJECTNAME" />
    <meta itemprop="description" content="$DESCRIPTION" name="description"/>
    <meta itemprop="image" content="$LOGO" />
<!-- \\ TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="$BASEURL">
    <meta name="twitter:title" content="$PAGETITLE">
    <meta name="twitter:description" content="$DESCRIPTION">
    <meta name="twitter:image:src" content="$LOGO">
<!-- \\ FACEBOOK -->
    <meta property="og:title" content="$PAGETITLE" />
    <meta property="og:url" content="$BASEURL"/>
    <meta property="og:site_name" content="$PAGETITLE" />
    <meta property="og:description" content="$DESCRIPTION" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="$LOGO" />

    <link  href='css/app.min.css' rel='stylesheet' type='text/css'>

</head>
    <!-- ===============
    header.php
    ================ -->
HTML;

$SCAFFOLD_FOOT = <<<HTML
<!-- ===============
  BEGIN VIEW FOOTER
  ================ -->

  <div id="document-close"></div>

  <footer id="document-foot">
    <div class='inner row'>
      <div class="copyright">$COPYRIGHT</div>
    </div>
  </footer>

  <!-- Footer JS -->
  <script src='bower_components/angular/angular.min.js'></script>
  <script {{ HTML::src('js/app.min.js') }}></script>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '$ANALYTICSCODE', 'auto');
    ga('require', 'linkid', 'linkid.js');
    ga('send', 'pageview');
  </script>
</body>
</html>
HTML;
?>