<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Sportclub List</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div id="container">
    <div class="row">
        <h4 class="span5 offset1">Sportclub List (DB: sportfinder, Table: sportclub)</h4>
    </div>
    <br>
    <div class="row">
        <div class="span1 offset5">
            <form action=".." method="get">
                <button class=".btn-mini" type="submit" name="" value="home">Home</button>
            </form>
        </div>
    </div>
    <?php foreach ($sportclub as $sportclub): ?>
        <div class="row">
            <form class="form-inline" method="post">
                <div class="span2 offset1">
                    <label><?php echo(htmlspecialchars($sportclub['clubname'],
                                ENT_QUOTES, 'UTF-8') . " " .
                            htmlspecialchars($sportclub['street'], ENT_QUOTES, 'UTF-8')
                            . " " .
                            htmlspecialchars($sportclub['streetnumber'], ENT_QUOTES, 'UTF-8')
                            . " " .
                            htmlspecialchars($sportclub['zip'], ENT_QUOTES, 'UTF-8')
                            . " " .
                            htmlspecialchars($sportclub['maill'], ENT_QUOTES, 'UTF-8')
                            . " " .
                            htmlspecialchars($sportclub['phonenumber'], ENT_QUOTES, 'UTF-8')
                        ); ?>
                        <button type="submit" name="action" value="Edit"
                                    class=".btn-mini">Edit</button>
                        <button type="submit" name="action" value="Delete"
                                    class=".btn-mini">Delete</button>
                    </label>
                </div>
                    <input type="hidden" class="input-small" name="clubname" value="<?php
                    echo(htmlspecialchars($sportclub['clubname'], ENT_QUOTES, 'UTF-8'));?>">
            </form>
        </div>
    <?php endforeach; ?>
    <br>
    <div class="row">
        <div class="span2 offset3">
            <form action="" method="get">
                <button class=".btn-mini" type="submit" name="add" value="Add">Add</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>