<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Blog php - Hoflack David</title>
    <meta name="description" content="Blog en php">
    <meta name="author" content="Hoflack David">
    <script src="assets/js/jquery.js"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="content">
        <div class="page-header well">
            <h1 style="float: left"><a href="index.php">Blog php - Hoflack David</a></h1>
            <form action="index.php" method="get" id="search">
                <input type="text" name="r" placeholder="informatique, ubuntu..." value="" 
                       class="span2">&nbsp;
                <input type="submit" value="Search" class="btn btn-info" id="btnsearch">                      
            </form>
        </div>
        <div class="row">
          <div class="span8" style="margin-left: 2%;">
              <?php require_once(INC . 'notification.php');
                
