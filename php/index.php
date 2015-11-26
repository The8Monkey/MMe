<?php
// CRUD Requests Controller for table 'user'
error_reporting(E_ALL);
ini_set('display_errors', 1);
// add user ****************************************************************
if (isset($_GET['add']))
{
    $pageTitle = 'New User';
    $action = 'addform';
    $firstname = '';
    $secondname = '';
    $email = '';
    $password = '';
    $id = '';
    $passwordtype='text';
    $button = 'Add user';
    include 'form_inc.php';
    exit();
    }
    if (isset($_GET['addform']))
    {
        include 'connect_inc.php';
        try
        {
            $sql = 'INSERT INTO user SET
            firstname = :firstname,
            secondname = :secondname,
            email = :email,
            password = MD5(:password)';
            $s = $pdo->prepare($sql);
            $s->bindValue(':firstname', $_POST['firstname']);
            $s->bindValue(':secondname', $_POST['secondname']);
            $s->bindValue(':email', $_POST['email']);
            $s->bindValue(':password', $_POST['password']);
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
            'SELECT id, firstname, secondname, email, password FROM user WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
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
    $firstname = $row['firstname'];
    $secondname = $row['secondname'];
    $email = $row['email'];
    $password = $row['password'];
    $id = $row['id'];
    $passwordtype='hidden';
    $button = 'Update user';
    include 'form_inc.php';
    exit();
}
if (isset($_GET['editform']))
{
    include 'connect_inc.php';
    try
    {
        $sql = 'UPDATE user SET
         firstname = :firstname,
         secondname = :secondname,
         email = :email,
         password = :password
         WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':firstname', $_POST['firstname']);
        $s->bindValue(':secondname', $_POST['secondname']);
        $s->bindValue(':email', $_POST['email']);
        $s->bindValue(':password', $_POST['password']);
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
        $sql = 'DELETE FROM user WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error deleting user: '.$e->getMessage();
        include 'error.php';
        exit();
    }
    header('Location: .');
    exit();
}
// AND display user list ***************************************************
include 'connect_inc.php';
try {
    $result = $pdo->query('SELECT * FROM user');
} catch (PDOException $e) {
    $error = 'QUERY ERROR: SELECT * FROM user: '.$e->getMessage();
    include 'error.php';
    exit();
}
foreach ($result as $row) {
    $user[]=array( 'id' => $row['id'],
        'firstname' => $row['firstname'],
        'secondname' => $row['secondname'],
        'email' => $row['email'],
        'password' => $row['password']);
}
include 'list_inc.php';

