<?php 
session_start();
//If no user is logged in, redirect to main page
if(!isset($_SESSION['username']))
{
header("../index.html");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link href="/css/bootstrap.css" rel="stylesheet" />
    <script src="/js/jquery-1.11.2.js" type="text/javascript" ></script>
    <script src="/js/fileuploader.js" type="text/javascript" ></script>
  </head>
  <body>
    <div class="container">
      <form id="testForm" method="post" enctype="multipart/form-data" name="testform" class="form-inline">
        <div class="form-group">
          <input id="fileinput" class="form-control" type="file" name="file"/>
          <button type="button" id="filesubmitbutton" class="btn btn-default form-control">Submit</button>
        </div>
      </form>
      <table id="report" class="table"></table>
    </div>
  </body>
</html>