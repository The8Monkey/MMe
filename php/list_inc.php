<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>User List</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
<div id="container">
    <div class="row">
        <h4 class="span5 offset1">User List (DB: testdb, Table: user)</h4>
    </div>
    <br>
    <div class="row">
        <div class="span1 offset5">
            <form action=".." method="get">
                <button class=".btn-mini" type="submit" name="" value="home">Home</button>
            </form>
        </div>
    </div>
    <?php foreach ($user as $user): ?>
        <div class="row">
            <form class="form-inline" method="post">
                <div class="span2 offset1">
                    <label><?php echo(htmlspecialchars($user['firstname'],
                                ENT_QUOTES, 'UTF-8') . " " .
                            htmlspecialchars($user['secondname'], ENT_QUOTES, 'UTF-8')); ?></label>
                </div>
                <input type="hidden" class="input-small" name="id" value="<?php
                echo(htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'));?>">
                <div class="span1">
                    <button type="submit" name="action" value="Edit"
                            class=".btn-mini">Edit</button>
                </div>
                <div class="span1">
                    <button type="submit" name="action" value="Delete"
                            class=".btn-mini">Delete</button>
                </div>
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