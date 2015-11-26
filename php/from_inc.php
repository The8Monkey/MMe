<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
          charset="utf-8">
    <title><?php echo(htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8')); ?></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div id="container">
    <div class="row">
        <h4 class="span5 offset1"><?php
            echo(htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8')); ?></h4>
        <br>
    </div>
    <form class="form-horizontal" action="?<?php
    echo(htmlspecialchars($action, ENT_QUOTES, 'UTF-8')); ?>" method="post">
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="firstname">firstname</label>
                <div class="controls">
                    <input type="text" id="firstname" name="firstname" value="<?php
                    echo(htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8')); ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="secondname">secondname</label>
                <div class="controls">
                    <input type="text" id="secondname" name="secondname" value="<?php
                    echo(htmlspecialchars($secondname, ENT_QUOTES, 'UTF-8')); ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="email">email</label>
                <div class="controls">
                    <input type="text" id="email" name="email" value="<?php
                    echo(htmlspecialchars($email, ENT_QUOTES, 'UTF-8')); ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password">password</label>
                <div class="controls">
                    <input type="<?php echo($passwordtype);?>"
                           id="password" name="password"
                           value="<?php
                           echo(htmlspecialchars($password, ENT_QUOTES, 'UTF-8')); ?>">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="hidden" name="id" value="<?php
                    echo(htmlspecialchars($id, ENT_QUOTES, 'UTF-8')); ?>">
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