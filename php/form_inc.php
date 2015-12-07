<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
          charset="utf-8">
    <title>Sportfinder</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div id="container">
    <div class="row">
        <h4 class="span5 offset1">
            <?php echo(htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8')); ?></h4>
        <br>
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
                    <button type="submit" class="btn"><?php
                        echo(htmlspecialchars($button, ENT_QUOTES, 'UTF-8')); ?>
                </div>
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>