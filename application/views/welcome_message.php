<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Vineeth N Krishnan">
    <meta name="description" content="Page description. No longer than 155 characters." />
    <!-- SEO Meta Start-->
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="The Name or Title Here">
    <meta itemprop="description" content="This is the page description">
    <meta itemprop="image" content="http://www.example.com/image.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@way2vineeth">
    <meta name="twitter:title" content="Page Title">
    <meta name="twitter:description" content="Page description less than 200 characters">
    <meta name="twitter:creator" content="@way2vineeth">
    <meta name="twitter:image" content="http://www.example.com/image.jpg">
    <meta name="twitter:data1" content="">
    <meta name="twitter:label1" content="Price">
    <meta name="twitter:data2" content="Black">
    <meta name="twitter:label2" content="Color">
    <!-- Open Graph data -->
    <meta property="og:title" content="Title Here" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.example.com/" />
    <meta property="og:image" content="http://example.com/image.jpg" />
    <meta property="og:description" content="Description Here" />
    <meta property="og:site_name" content="Site Name, i.e. Moz" />
    <meta property="og:price:amount" content="15.00" />
    <meta property="og:price:currency" content="USD" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Craft Something New</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Paginate</a>
        </div>
      </div>
    </nav>
    <?php
if ($paginate) {
    foreach ($paginate as $key => $value) {
        ?>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <div class="page-header">
        <h1><?=ucwords($key)?><small> pagination</small></h1>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-stripped">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Name</th>
              <th>Phone</th>
            </tr>
          </thead>
          <tbody>
            <?php
if ($value) {
            foreach ($value['items'] as $item) {
                ?>
            <tr>
              <td><?=$item->id?></td>
              <!-- If you are not running on PHP7 change null coalescing to conditional expression -->
              <td><?=$item->name ?? '<span class="text-danger">N/A</span>'?></td>
              <td><?=$item->phone ?? '<span class="text-danger">N/A</span>'?></td>
            </tr>
            <?php
}
        }
        ?>
          </tbody>
        </table>
      </div>
      <?=$value['pagination']?>
    </div>
    <?php
}
}
?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>