<?php error_reporting(E_ERROR | E_WARNING | E_PARSE);

/*
    Find-in-file codes:
      #     :   Prefix for find-in-file dev notes
      ###   :   Misc dev notes
      >>>   :   Extend/expand this codeblock
      <<<   :   Reduce/contract this codeblock
      !!!   :   Fix broken functionality
      @@@   :   View controlled by non-view module
      ???   :   Reconsider this codeblock in future
      +++   :   Add functionality
      ---   :   Remove functionality
*/

class App {

  public function __construct() {

  /*==============================================*==============================================*==============================================
  | Global defines - edit to your heart's content.
  |-----------------------------------------------
  |
  */
      /*-------------------------
        These config vars should probably always be changed for projects
      */
          // Project strings
          $this->PUBLISHER      = "<%= PUBLISHER %>";
          $this->PROJECTNAME    = "<%= PROJECTNAME %>";
          $this->DESCRIPTION    = "<%= DESCRIPTION %>"; // No longer than 155 characters.
          $this->DESCRIPTION_LONG = $this->DESCRIPTION; // 200 chars
          // URLS
          $this->BASEURL        = ""; // This should be set to an absolute value on deployment, for social media linking purposes.
          $this->SHARE_IMG      = "logo.png"; // For social media
          // Analytics
          $this->SCHEMAROOT     = "WebPage";
          $this->ANALYTICSCODE  = "xx"; // Replace this
          // Social Media
          $this->GOOGLE_PROFILE_AUTHOR = ""; // +XYZ
          $this->GOOGLE_PAGE_PROFILE = ""; // +XYZ
          $this->TWITTER_PUBLISHER = ""; // @XYZ
          $this->TWITTER_AUTHOR = ""; // @XYZ

      /*-------------------------
        These config vars can normally be left alone
      */
          // HTML
          $this->PAGETITLE      = $this->PROJECTNAME; // Page Title. Maximum length 60-70 characters, though pixel width is important
          $this->BODYINJECT     = "";
          $this->HTMLINJECT     = "";
          $this->COPYRIGHT      = $this->PUBLISHER." &copy; ".date("Y");
          // Filepaths
          $this->ASSETURL       = $this->BASEURL; // Where img/css/js/libraries are held on server
          $this->BOWER          = $this->ASSETURL."bower_components";
          $this->CSSURL         = $this->ASSETURL."public/styles";
          $this->JSURL          = $this->ASSETURL."public/scripts";
          $this->IMGURL         = $this->ASSETURL."public/images";
  }

  /*==============================================*==============================================*==============================================
  | Document head template, include through $app->document_head();
  */

  public function document_head() { echo <<<HTML

      <!DOCTYPE html>
      <!--[if lt IE 7]>      <html lang="en" {$this->HTMLINJECT} xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/{$this->SCHEMAROOT}" class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->
      <!--[if IE 7]>         <html lang="en" {$this->HTMLINJECT} xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/{$this->SCHEMAROOT}" class="no-js lt-ie9 lt-ie8" > <![endif]-->
      <!--[if IE 8]>         <html lang="en" {$this->HTMLINJECT} xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/{$this->SCHEMAROOT}" class="no-js lt-ie9" > <![endif]-->
      <!--[if gt IE 8]><!--> <html lang="en" {$this->HTMLINJECT} xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/{$this->SCHEMAROOT}" class="no-js" > <!--<![endif]-->
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

      <!-- Metadata
      Test these with:
        - https://cards-dev.twitter.com/validator
        - https://developers.facebook.com/tools/debug
        - http://www.google.com/webmasters/tools/richsnippets
        - https://developers.pinterest.com/rich_pins/validator/
      -->
          <title>{$this->PAGETITLE}</title>
          <meta itemprop="name" content="{$this->PROJECTNAME}" />
          <meta itemprop="description" content="{$this->DESCRIPTION}" name="description"/>
          <meta itemprop="image" content="{$this->SHARE_IMG}" />

          <!-- \\ Twitter Card -->
          <meta name="twitter:title" content="{$this->PAGETITLE}">
          <meta name="twitter:site" content="{$this->BASEURL}">
          <meta name="twitter:card" content="summary_large_image">
          <meta name="twitter:image:src" content="{$this->SHARE_IMG}"> <!-- at least 280x150px -->
          <meta name="twitter:description" content="{$this->DESCRIPTION_LONG}">
          <meta name="twitter:site" content="{$this->TWITTER_PUBLISHER}"> <!-- @publisher_handle -->
          <meta name="twitter:creator" content="{$this->TWITTER_AUTHOR}"> <!-- @author_handle -->

        <!-- \\ Opengraph/Facebook -->
          <meta property="og:title" content="{$this->PAGETITLE}" />
          <meta property="og:type" content="website" />
          <meta property="og:url" content="{$this->BASEURL}"/>
          <meta property="og:site_name" content="{$this->PAGETITLE}" />
          <meta property="og:description" content="{$this->DESCRIPTION_LONG}" />
          <meta property="og:image" content="{$this->SHARE_IMG}" />

      <!-- Font Icon set: font awesome from BootstrapCDN
          Example: https://fortawesome.github.io/Font-Awesome/examples/
          Library: https://fortawesome.github.io/Font-Awesome/icons/
       --><link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

      <!-- Assets -->
          <link rel="stylesheet" type="text/css" href="{$this->CSSURL}/app.min.css">
          <script src='{$this->JSURL}/libs.min.js'></script>
          <script src='{$this->JSURL}/app.min.js'></script>

      </head>
      <body {$this->BODYINJECT}>

      <header class="row" id="document-head">
        <h1 class="column small-12">{$this->PROJECTNAME}</h1>
        <nav class="row">

        </nav>
      </header>
      <!-- ===============
      BEGIN CONTENT VIEW
      ================ -->
HTML;
  }

  /*==============================================*==============================================*==============================================
  | Document Foot template, include through $app->document_head();
  */

  public function document_foot() { echo <<<HTML
      <!-- ===============
      END CONTENT VIEW
      ================ -->

      <div id="document-close"></div>

      <footer id="document-foot">
        <div class='inner row'>
          <div class="copyright column small-12">{$this->COPYRIGHT}</div>
        </div>
      </footer>

      <!-- Google Analytics -->
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '{$this->ANALYTICSCODE}', 'auto');
        ga('require', 'linkid', 'linkid.js');
        ga('send', 'pageview');
      </script>
    </body>
    </html>
HTML;
  }

}
