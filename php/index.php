<?php
// CRUD Requests Controller for table 'user'
error_reporting(E_ALL);
ini_set('display_errors', 1);
// add user ****************************************************************
if (isset($_GET['add']))
{
    $pageTitle = 'New sportclub';
    $action = 'addform';
    $clubname = '';
    $street = '';
    $streetnumber = '';
    $zip = '';
    $maill = '';
    $phonenumber = '';
    $lng = '';
    $lat = '';
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
            clubname = :clubname,
            street = :street,
            streetnumber = :streetnumber,
            zip = :zip,
            maill = :maill,
            phonenumber = :phonenumber,
            lng = :lng;
            lat = :lat';
            $s = $pdo->prepare($sql);
            $s->bindParam(':clubname', $_POST['clubname']);
            $s->bindParam(':street', $_POST['street']);
            $s->bindParam(':streetnumber', $_POST['streetnumber']);
            $s->bindParam(':zip', $_POST['zip']);
            $s->bindParam(':maill', $_POST['maill']);
            $s->bindParam(':phonenumber', $_POST['phonenumber']);
            $s->bindParam(':lng',$lng=123);
            $s->bindParam(':lat',$lat=123);
            $s->execute();
        }
        catch (PDOException $e)
        {
            $error = 'Error adding sportclub: '.$e->getMessage();
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
            'SELECT clubname, street, streetnumber,zip, maill, phonenumber
              FROM sportclub WHERE clubname = :clubname';
        $s = $pdo->prepare($sql);
        $s->bindParam(':clubname' , $_POST['clubname']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error fetching details details: '.$e->getMessage();
        include 'error.php';
        exit();
    }
    $row = $s->fetch();
    $pageTitle = 'Edit Sportclub';
    $action = 'editform';
    $clubname = $row["clubname"];
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
          clubname = :clubname,
          street = :street,
          streetnumber = :streetnumber,
          zip = :zip,
          maill = :maill,
          phonenumber = :phonenumber
          WHERE clubname = :clubname';
        $s = $pdo->prepare($sql);
        $s->bindValue(':clubname', $_POST['clubname']);
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
        $sql = 'DELETE FROM sportclub WHERE clubname = :clubname';
        $s = $pdo->prepare($sql);
        $s->bindValue(':clubname', $_POST['clubname']);
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
// AND display sportclub list ***************************************************
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
        'clubname' => $row['clubname'],
        'street' => $row['street'],
        'streetnumber' => $row['streetnumber'],
        'zip' => $row['zip'],
        'maill' => $row['maill'],
        'phonenumber' => $row['phonenumber']);
}
//include '../html/newLayout.html';
include 'list_inc.php';