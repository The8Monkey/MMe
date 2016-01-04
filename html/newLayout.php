<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sportfinder</title>

    <!-- My JS for googleMaps -->
    <script language="javascript" type="text/javascript" src="../javascript/map.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../javascript/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../javascript/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../css/carousel.css" rel="stylesheet">

</head>
<!-- NAVBAR
================================================== -->

<header>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #edffcf;">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Sportfinder</a></li>
            <li><a data-toggle="tab" href="#menu1" ><button type="submit" name="add" value="Add">Add Club</button></a></li>
            <li><a data-toggle="tab" href="#menu2">noch was</a></li>
        </ul>
    </nav>
</header>



<body>

<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <script>google.maps.event.addDomListener(window, 'load', initialize);</script>
            <div id="googleMap"></div>
        </div>
    </div>
</div>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="tab-content">
    <!-- START THE FEATURETTES -->
    <div id="home" class="tab-pane fade in active">
        <table >
            <tr>
                <th>clubname</th>
                <th>street</th>
                <th>streetnumber</th>
                <th>zip</th>
                <th>maill</th>
                <th>phonenumber</th>
                <th>edite</th>
            </tr>
            <?php foreach ($sportclub as $sportclub): ?>
            <tr>
                <td><?=$sportclub['clubname']?></td>
                <td><?=$sportclub['street']?></td>
                <td><?=$sportclub['streetnumber']?></td>
                <td><?=$sportclub['zip']?></td>
                <td><?=$sportclub['maill']?></td>
                <td><?=$sportclub['phonenumber']?></td>
                <td align="center"><button type="submit" name="action" value="Edit"
                        class=".btn-mini">Edit</button>
                <button type="submit" name="action" value="Delete"
                        class=".btn-mini">Delete</button></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div id="menu1" class="tab-pane fade">
        <div id="container">
            <div class="row">
                <h4 class="span5 offset1">
                    Add Sportclub
                </h4>
            </div>
            <form class="form-horizontal" action="?<?php
                echo(htmlspecialchars($action, ENT_QUOTES, 'UTF-8')); ?>" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="clubname">clubname</label>
                        <div class="controls">
                            <input type="text" id="clubname" name="clubname" value="<?php
                    echo(htmlspecialchars($clubname, ENT_QUOTES, 'UTF-8')); ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="street">street</label>
                        <div class="controls">
                            <input type="text" id="street" name="street" value="<?php
                    echo(htmlspecialchars($street, ENT_QUOTES, 'UTF-8')); ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="streetnumber">streetnumber</label>
                        <div class="controls">
                            <input type="number" id="streetnumber" name="streetnumber" value="<?php
                    echo(htmlspecialchars($streetnumber, ENT_QUOTES, 'UTF-8')); ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="zip">zip</label>
                        <div class="controls">
                            <input type="number" id="zip" name="zip" value="<?php
                    echo(htmlspecialchars($zip, ENT_QUOTES, 'UTF-8')); ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="maill">mail</label>
                        <div class="controls">
                            <input type="text" id="maill" name="maill" value="<?php
                    echo(htmlspecialchars($maill, ENT_QUOTES, 'UTF-8')); ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="phonenumber">phonenumber</label>
                        <div class="controls">
                            <input type="tel" id="phonenumber" name="phonenumber" value="<?php
                    echo(htmlspecialchars($streetnumber, ENT_QUOTES, 'UTF-8')); ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn">
                                Add Club
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div id="menu2" class="tab-pane fade">
        <h3>Menu 2</h3>
        <p>Some content in menu 2.</p>
    </div>
</div>
    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
    <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; Christoph Stumpe, Sebastian Nieling </p>
    </footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../javascript/jquery.min.js"><\/script>')</script>
<script src="../javascript/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../javascript/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../javascript/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
