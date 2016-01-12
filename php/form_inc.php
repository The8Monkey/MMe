<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
          charset="utf-8">
    <title>Sportfinder</title>
    <link rel="stylesheet" href="../css/addEdite.css"/>
    <script language="javascript" type="text/javascript" src="../javascript/formular.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<header>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #edffcf;">
        <a class="navbar-brand" href="index.php">Sportfinder</a>
        <ul class="nav navbar-nav">
        </ul>
    </nav>
</header>

<body>
<div id="container">
    <form class="form-horizontal" action="?<?php
    echo(htmlspecialchars($action, ENT_QUOTES, 'UTF-8')); ?>" method="post">
        <fieldset>
            <label class="span5 offset1"><?php echo(htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8')); ?></label>
            <div class="control-group">
                <label class="control-label" for="clubname">clubname</label>
                <div class="controls">
                    <input id="clubname" name="clubname" value="<?php
                    echo(htmlspecialchars($clubname, ENT_QUOTES, 'UTF-8')); ?>"
                           onchange="checkString('clubname', 'failName')" required>
                </div>
            </div>
            <p id="failName"></p>
            <div class="control-group">
                <label class="control-label" for="street">street</label>
                <div class="controls">
                    <input id="street" name="street" value="<?php
                    echo(htmlspecialchars($street, ENT_QUOTES, 'UTF-8')); ?>"
                           onchange="checkString('street','failStreet')"required>
                </div>
            </div>
            <p id="failStreet"></p>
            <div class="control-group">
                <label class="control-label" for="streetnumber">streetnumber</label>
                <div class="controls">
                    <input id="streetnumber" name="streetnumber" value="<?php
                    echo(htmlspecialchars($streetnumber, ENT_QUOTES, 'UTF-8')); ?>"
                           onchange="checkNumber('streetnumber','failstreetnumber')" required>
                </div>
            </div>
            <p id="failstreetnumber"></p>
            <div class="control-group">
                <label class="control-label" for="zip">zip</label>
                <div class="controls">
                    <input id="zip" name="zip" value="<?php
                    echo(htmlspecialchars($zip, ENT_QUOTES, 'UTF-8')); ?>"
                           onchange="checkPLZ('failzip')" required>
                </div>
            </div>
            <p id="failzip"></p>
            <div class="control-group">
                <label class="control-label" for="maill">mail</label>
                <div class="controls">
                    <input id="maill" name="maill" value="<?php
                    echo(htmlspecialchars($maill, ENT_QUOTES, 'UTF-8')); ?>"
                           onchange="checkEmail('failmail')" required>
                </div>
            </div>
            <p id="failmail"></p>
            <div class="control-group">
                <label class="control-label" for="phonenumber">phonenumber</label>
                <div class="controls">
                    <input id="phonenumber" name="phonenumber" value="<?php
                    echo(htmlspecialchars($streetnumber, ENT_QUOTES, 'UTF-8')); ?>"
                           onchange="checkNumber('phonenumber','failphone')">
                </div>
            </div>
            <p id="failphone"></p>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn"><?php
                        echo(htmlspecialchars($button, ENT_QUOTES, 'UTF-8')); ?>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>&copy; Christoph Stumpe, Sebastian Nieling </p>
</footer>
</body>
</html>