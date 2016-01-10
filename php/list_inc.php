<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Sportclub List</title>
    <script language="javascript" type="text/javascript" src="../javascript/map.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/carousel.css">
</head>

<header>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #edffcf;">
        <a class="navbar-brand" href="#">Sportfinder</a>
        <ul class="nav navbar-nav">
        <li>
            <form action="" method="get">
                <button class="btn btn-default" type="submit" name="add" value="Add">Add</button>
            </form>
        </li>
        </ul>
    </nav>
</header>

<body>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <script>google.maps.event.addDomListener(window, 'load', initialize);</script>
            <div id="googleMap"></div>
        </div>
    </div>
</div>

<div id="container" class="table-responsive">
    <form class="form-inline" method="post">
        <br>
        <table class="table">
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
                    <td><button type="submit" name="action" value="Edit"
                                               class=".btn-mini">Edit</button>
                        <button type="submit" name="action" value="Delete"
                                class=".btn-mini">Delete</button></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <input type="hidden" class="input-small" name="clubname" value="<?php
        echo(htmlspecialchars($sportclub['clubname'], ENT_QUOTES, 'UTF-8'));?>">
        <br>
    </form>
</div>

<footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>&copy; Christoph Stumpe, Sebastian Nieling </p>
</footer>

</body>
</html>