<?php
// CRUD Requests Controller for table 'user'
error_reporting(E_ALL);
ini_set('display_errors', 1);
// add user ****************************************************************
if (isset($_GET['add']))
{
    $pageTitle = 'New sportclub';
    $action = 'addform';
    $name = '';
    $street = '';
    $streetnumber = '';
    $zip = '';
    $maill = '';
    $phonenumber = '';
    $button = 'Add sportclub';
    include 'form_inc.php';
    exit();
    }
    if (isset($_GET['addform']))
    {
        include 'connect_inc.php';
        try
        {
            $sql = 'INSERT INTO sportclub SET
            name = :name,
            street = :street,
            streetnumber = :streetnumber,
            zip = :zip,
            maill = :maill,
            phonenumber = :phonenumber';
            $s = $pdo->prepare($sql);
            $s->bindValue(':name', $_POST['name']);
            $s->bindValue(':street', $_POST['street']);
            $s->bindValue(':streetnumber', $_POST['streetnumber']);
            $s->bindValue(':zip', $_POST['zip']);
            $s->bindValue(':maill', $_POST['maill']);
            $s->bindValue(':phonenumber', $_POST['phonenumber']);
            $s->execute();
        }
        catch (PDOException $e)
        {
            $error = 'Error adding user: '.$e->getMessage();
            include 'error.php';
            exit();
        }
        header('Location: .');
        exit();
}
// edit user ***************************************************************
if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
    include 'connect_inc.php';
    try
    {
        $sql =
            'SELECT name, street, streetnumber, zip, maill, phonenumber FROM sportclub WHERE name = :name';
        $s = $pdo->prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error fetching details details: '.$e->getMessage();
        include 'error.php';
        exit();
    }
    $row = $s->fetch();
    $pageTitle = 'Edit User';
    $action = 'editform';
    $name = $row['name'];
    $street = $row['street'];
    $streetnumber = $row['streetnumber'];
    $zip = $row['zip'];
    $maill = $row['maill'];
    $phonenumber = $row['phonenumber'];
    $button = 'Update sportclub';
    include 'form_inc.php';
    exit();
}
if (isset($_GET['editform']))
{
    include 'connect_inc.php';
    try
    {
        $sql = 'UPDATE sportclub SET
          name = :name,
          street = :street,
          streetnumber = :streetnumber,
          zip = :zip,
          maill = :maill,
          phonenumber = :phonenumber';
        $s = $pdo->prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':street', $_POST['street']);
        $s->bindValue(':streetnumber', $_POST['streetnumber']);
        $s->bindValue(':zip', $_POST['zip']);
        $s->bindValue(':maill', $_POST['maill']);
        $s->bindValue(':phonenumber', $_POST['phonenumber']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error updating user: '.$e->getMessage();
        include 'error.php';
        exit();
    }
    header('Location: .');
    exit();
}
// delete user *************************************************************
if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
    include 'connect_inc.php';
    try
    {
        $sql = 'DELETE FROM sportclub WHERE name = :name';
        $s = $pdo->prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error deleting sportclub: '.$e->getMessage();
        include 'error.php';
        exit();
    }
    header('Location: .');
    exit();
}
// AND display user list ***************************************************
include 'connect_inc.php';
try {
    $result = $pdo->query('SELECT * FROM sportclub');
} catch (PDOException $e) {
    $error = 'QUERY ERROR: SELECT * FROM sportclub: '.$e->getMessage();
    include 'error.php';
    exit();
}
foreach ($result as $row) {
    $sportclub[]=array(
        'name' => $row['name'],
        'street' => $row['street'],
        'streetnumber' => $row['streetnumber'],
        'zip' => $row['zip'],
        'maill' => $row['maill'],
        'phonenumber' => $row['phonenumber']);
}
include 'list_inc.php';

