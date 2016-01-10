<?php
// CRUD Requests Controller for table 'user'
error_reporting(E_ALL);
//error_reporting(E_ALL ^E_NOTICE); // get rid of notices like 'undefined index'
ini_set('display_errors', 1);
// prepare console-master for debug output
//define('__ROOT__', dirname(dirname(__FILE__)));
//require_once(__ROOT__ . '/php-console-master/src/PhpConsole/__autoload.php');
//$connector = PhpConsole\Connector::getInstance();
//$handler = PhpConsole\Handler::getInstance();
//test for PhpConsole:
//(activate chrome plugin php console and open developer tools)
//$myvar = xyz; // use it like this
//$handler->debug($myvar); // use it like this
// establish database connection and create PDO-Object:
include 'connect_inc.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* case to determine which post request is being used */
    switch ($_POST['action']) {
        case 'insert': // INSERT ***************************************************************
            $valid = true;
            $response = null;
            $clubnameError = '';
            $streetError = '';
            $streetnumberError = '';
            $zipError = '';
            $emailError = '';
            $phonenumber = '';
            // validate form input:
            if (empty($_POST['clubname'])) {
                $clubenameError = 'Please enter club name';
                $valid = false;
            }
            if (empty($_POST['street'])) {
                $streetError = 'Please enter a street';
                $valid = false;
            }
            if (empty($_POST['streetnumber'])) {
                $streetnumberError = 'Please enter a streetnumber';
                $valid = false;
            }
            if (empty($_POST['zip'])) {
                $streetError = 'Please enter zip';
                $valid = false;
            }
            if (empty($_POST['mail'])) {
                $emailError = 'Please enter email';
                $valid = false;
            } elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                $emailError = 'Please enter valid email';
                $valid = false;
            }
            if ($valid) {
                // insert in database using a prepared statement:
                try {
                    $sql = 'INSERT INTO sportclub SET
                            clubname = :clubname,
                            street = :street,
                            streetnumber = :streetnumber,
                            zip = :zip,
                            mail = :mail,
                            phonenumber = :phonenumber';
                    $s = $pdo->prepare($sql);
                    $s->bindParam(':clubname', $_POST['clubname']);
                    $s->bindParam(':street', $_POST['street']);
                    $s->bindParam(':streetnumber', $_POST['streetnumber']);
                    $s->bindParam(':zip', $_POST['zip']);
                    $s->bindParam(':mail', $_POST['mail']);
                    $s->bindParam(':phonenumber', $_POST['phonenumber']);
                    $s->execute();
                    $response = array('message' => 'insert done');
                } catch (PDOException $e) {
                    $error = 'Error adding sportclub: ' . $e->getMessage();
                    $response = array('databaseError' => $error);
                    $json = json_encode($response); // return json
                    echo $json;
                }
                $message = 'insert done';
                $response = array('message' => $message);
            } else { // input error:
                $response = array('clubnameError' => $clubnameError,
                'streetError' => $streetError,
                'streetnumberError' => $streetnumberError,
                'zipError' => $zipError,
                'emailError' => $emailError);
            }
            $json = json_encode($response);
            echo $json;
            break;
        case 'update': // UPDATE ***************************************************************
            $response = null;
            $password = '';
            if (empty($_POST['clubname'])) {
                $response = array('message' => 'No item selected - update impossible!');
            } else {
                try {
                    $sql = 'UPDATE sportclub SET
                           clubname = :clubname,
                           street = :street,
                           streetnumber = :streetnumber,
                           zip = :zip,
                           mail = :mail,
                           phonenumber = :phonenumber
                           WHERE clubname = :clubname';
                    $s = $pdo->prepare($sql);
                    $s->bindValue(':clubname', $_POST['clubname']);
                    $s->bindValue(':street', $_POST['street']);
                    $s->bindValue(':streetnumber', $_POST['streetnumber']);
                    $s->bindValue(':zip', $_POST['zip']);
                    $s->bindValue(':mail', $_POST['maill']);
                    $s->bindValue(':phonenumber', $_POST['phonenumber']);
                    $s->execute();
                } catch (PDOException $e) {
                    $error = 'Error updating sportclub: ' . $e->getMessage();
                    $response = array('databaseError' => $error);
                    $json = json_encode($response); // return json
                    echo $json;
                    exit();
                }
                $response = array('message' => 'update done');
            }
            $json = json_encode($response); // return json
            echo $json;
            break;
        case 'delete': // DELETE *************************************************************
            $response = null;
            try {
                $sql = 'DELETE FROM sportclub WHERE clubname = :clubname';
                $s = $pdo->prepare($sql);
                $s->bindValue(':clubname', $_POST['clubname']);
                $s->execute();
                $response = array('message' => 'delete done');
            } catch (PDOException $e) {
                $error = 'Error deleting clubname: ' . $e->getMessage();
                $response = array('databaseError' => $error);
                $json = json_encode($response); // return json
                echo $json;
                exit();
            }
            $message = 'record deleted';
            $response = array('message' => $message);
            $json = json_encode($response); // return json
            echo $json;
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch ($_GET['action']) {
        case 'getall': // GETALL ***************************************************************
            try {
                $result = $pdo->query('SELECT * FROM sportclub');
            } catch (PDOException $e) {
                $error = 'QUERY ERROR: SELECT * FROM sportclub: ' . $e->getMessage();
                $response = array('databaseError' => $error);
                $json = json_encode($response);
                echo $json;
                exit();
            }
            if (empty($result)) {
                $error = 'no records found';
                $response = array('databaseError' => $error);
            }
            $sportclub = array();
            foreach ($result as $row) {
                $sportclub[] = array('clubname' => $row['clubname'],
                            'street' => $row['street'],
                            'streetnumber' => $row['streetnumber'],
                            'zip' => $row['zip'],
                            'mail' => $row['mail'],
                            'phonenumber' => $row['phonenumber']);
            }
            $json = json_encode($sportclub);
            echo $json;
            break;
        case 'find': // FIND (GET) *********************************************************
            $response = null;
            try {
                // prevent sql injection by using a prepared statement:
                $s = $pdo->prepare('SELECT clubname, street, streetnumber, zip, mail, phonenumber FROM clubname WHERE
                clubname = :clubname');
                $s->bindValue(':clubname', $_GET['clubname']);
                $s->execute();
            } catch (PDOException $e) {
                $error = 'QUERY ERROR: Select with clubname ' . $e->getMessage();
                $response = array('databaseError' => $error);
                $json = json_encode($response);
                echo $json;
                exit();
            }
            $row = $s->fetch(); // clubname is unique!
            if (!$row) {
                $error = 'no record found for this club name: ' . $_GET['clubname'];
                $response = array('databaseError' => $error);
            } else {
                $response = array('clubname' => $row['clubname'],
                    'street' => $row['street'],
                    'streetnumber' => $row['streetnumber'],
                    'zip' => $row['zip'],
                    'mail' => $row['mail'],
                    'phonenumber' => $row['phonenumber'],
                    'message' => 'record found');
            }
            $json = json_encode($response);
            echo $json;
            break;
    }
}
