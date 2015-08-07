<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head> 
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('reset.css'); ?>
    <?php use_stylesheet('header.css'); ?>
    <?php use_stylesheet('mainstyles.css'); ?>
    <?php use_javascript('header.js'); ?>
    <?php use_javascript('cufon.js'); ?>
    <?php use_javascript('myriad_pro.js'); ?>
    <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <script type="text/javascript">
        Cufon.replace('h1');
        Cufon.replace('h2');
        Cufon.replace('h3');
        Cufon.replace('h4');
        //Cufon.replace('p');
        //Cufon.replace('address');
        //Cufon.replace('font');
        //Cufon.replace('li');
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
</head>
<body>
    <?php include_partial("public/header"); ?>
    <?php include_slot('page_title'); ?>
    <div class="page_content">
    	<?php echo $sf_content ?>
    </div>
    <?php include_partial("public/footer"); ?>
    <script type="text/javascript" language="javascript">
        var hs_portalid=108225;
        var hs_salog_version = "2.00";
        var hs_ppa = "globalclassroom.app10.hubspot.com";
        document.write(unescape("%3Cscript src='" + document.location.protocol + "//" + hs_ppa + "/salog.js.aspx' type='text/javascript'%3E%3C/script%3E"));
    </script>
</body>
</html>