<?php
define('PASS_METHOD', 1);
session_start();
$smartyPath = 'smarty';
require("$smartyPath/libs/Smarty.class.php");
$smarty = new Smarty();

$aAct = array(
    'reg' => 'reg',
    'user' => 'users',
    'prof' => 'prof',
    'file' => 'file',
    'logoff' => 'logoff',
    'deluser' => 'deluser',
    'delphoto' => 'delphoto',
);

$smarty->setTemplateDir("$smartyPath/templates");
$smarty->setCompileDir("$smartyPath/templates_c");
$smarty->setCacheDir("$smartyPath/cache");
$smarty->setConfigDir("$smartyPath/configs");
$smarty->assign(
    array(
        'title' => 'Homework3',
        'brand' => 'Homework3',
        'indexAction' => 'login',
        'menuAction' => '',
        'homepage' => 'http://homeworks/homework3.php',
        'linkAction' => $aAct,
        'warning' => '',
        'photos' => 'http://homeworks/photos',
    )
);

$action = '';
$uploaddir = 'photos/';


if (isset($_GET['act'])) {
    if (in_array($_GET['act'], $aAct)) {
        $action = $_GET['act'];
    }

    if ((!isset($_SESSION['loginUser'])) & (!in_array($_GET['act'], [$aAct['reg']]))) {
        $action = '';
    }

    $smarty->assign(
        array(
            'indexAction' => $action,
            'menuAction' => $action,
        )
    );
    if ($action == 'logoff') {
        session_destroy();
        session_start();
    }
    if ($action == 'deluser') {
        if (isset($_GET['id'])) {
            $userPhoto = getUserProf($_GET['id'])[0]['photo'];
            if (strlen($userPhoto) > 0) {
                unlink($uploaddir . $userPhoto);
            }
            delUsers($_GET['id']);
            $action = $aAct['user'];
            $smarty->assign(
                array(
                    'indexAction' => $action,
                    'menuAction' => $action,
                )
            );
        }
    }
    if ($action == 'users') {
        $smarty->assign('userTable', getUsers());
    }
    if ($action == 'prof') {
        getDataProfile();
    }
    if ($action == 'delphoto') {
        if ($_GET['id']!="") {
            unlink("$uploaddir{$_GET['id']}");
            clearPhoto($_GET['id']);
            $action = $aAct['file'];
            $smarty->assign(
                array(
                    'indexAction' => $action,
                    'menuAction' => $action,
                )
            );
        }
    }

    if ($action == 'file') {
        $files = array();
        foreach (glob("$uploaddir*.{jpg,png}", GLOB_BRACE) as $file) {
            $files[] = array('name'=> baseName($file));
        }
        $smarty->assign('fileTable', $files);
    }
}

setLogin();

$connection = false;

if (!empty($_POST)) {
    switch ($action) {
        case 'reg': // регистрация
            $login = $_POST['login'];
            if ((strlen($login) > 2) & (strlen($_POST['password1']) > 2)
                & ($_POST['password1'] == $_POST['password2'])
            ) {
                $res = regUser($_POST['login'], $_POST['password1']);
                if ($res . lenghts > 0) {
                    addMessage("<p> Логин $login успешно зарегистрирован! </p>");
                } else {
                    addMessage("<p> Логин $login уже существует! </p>");
                }
            } else {
                if (($_POST['password1'] != $_POST['password2'])) {
                    addMessage("<p> Пароли не совпадают! </p>");
                } else {
                    addMessage("<p> У логина и пароля должно быть больше 2 символов! </p>");
                }
            }
            break;
        case '': //логин
            $result = logUser($_POST['login'], $_POST['password']);
            if ($result) {
                addMessage("<p> Здравствуй, {$result['login']} ! </p>");
                $_SESSION['idUser'] = $result['id'];
                $_SESSION['loginUser'] = $result['login'];
                setLogin();
            } else {
                addMessage("<p> Нет такого пользователя или пароля! </p>");
            }
            break;
        case 'prof':
            $baseName = $_SESSION['idUser'].'-'. mb_strtolower(basename($_FILES['userFile']['name']));
            $uploadfile = $uploaddir . $baseName;
            $_POST['baseName']='';
            if (!empty($_FILES)) {
                if (($_FILES['userFile']["type"] == "image/gif")
                    || ($_FILES['userFile']["type"] == "image/jpeg")
                    || ($_FILES['userFile']["type"] == "image/png")
                ) {
                    if (move_uploaded_file($_FILES['userFile']['tmp_name'], $uploadfile)) {
                        $_POST['baseName']=$baseName;
                        $files = glob("$uploaddir{$_SESSION['idUser']}-*.{jpg,png}", GLOB_BRACE);
                        if (count($files) > 1) {
                            foreach ($files as $value) {
                                if (baseName($value) != $baseName) {
                                    unlink($value);
                                }
                            }
                        }
                    } else {
                        $baseName ='';
                    }
                }
            }
            updUser($_POST);
            getDataProfile();
            addMessage('Данные обновлены!');
            break;
    }
}


$smarty->display('index.tpl');

function setLogin()
{
    global $smarty;
    if (isset($_SESSION['loginUser'])) {
        $smarty->assign('brand', "HW3/{$_SESSION['loginUser']}");
        $smarty->assign('login', $_SESSION['loginUser']);
    }
}


function getDataProfile() {
    global $smarty;
    $userProf = getUserProf($_SESSION['idUser']);
    $smarty->assign('userProf', $userProf[0]);
}

function addMessage($mes)
{
    global $smarty;
    $smarty->assign('warning', $mes);
}

// <editor-fold desc="SQL function">

function connect()
{
    global $connection;
    if (!$connection) {
        $connection = @new mysqli('localhost', 'root', '', 'hw3');
        if (mysqli_connect_errno()) {
            die(mysqli_connect_errno());
        }
        $connection->query('set names "UTF-8"');
    }
}

function regUser($login, $password)
{
    global $connection;
    connect();
    //$connection = @new mysqli('localhost', 'root', '', 'hw3');
    $pw_hash = password_hash($password, PASS_METHOD);
    $stml = $connection->prepare("insert into `users` (`login`,`password`) values (?,?);");
    $stml->bind_param('ss', $login, $pw_hash);
    $stml->execute();
    if (mysqli_connect_errno()) {
        die(mysqli_connect_errno());
    }
    return $connection->affected_rows;
}

function logUser($login, $password)
{
    global $connection;
    connect();
    //$connection = @new mysqli('localhost', 'root', '', 'hw3');
    $pw_hash = password_hash($password, PASS_METHOD);
    $stmt = $connection->prepare("select id,password from users where login = ?;");
    $stmt->bind_param('s', $login);
    $stmt->execute();
    if (mysqli_connect_errno()) {
        die(mysqli_connect_errno());
    }
    $stmt->bind_result($id, $hash);
    if ($stmt->fetch()) {
        if (password_verify($password, $hash)) {
            return ['id' => $id, 'login' => $login];
        }
    }
    return false;
}

function getUsers()
{
    global $connection;
    connect();
    $res = $connection->query("select * from users");
    return $res->fetch_all(MYSQLI_ASSOC);
}

function delUsers($id)
{
    global $connection;
    connect();
    $id = $connection->real_escape_string($id);
    $connection->query("delete from users where id = '$id'");
}

function getUserProf($id)
{
    global $connection;
    connect();
    $id = $connection->real_escape_string($id);
    $res = $connection->query("select * from users where id = '$id'");
    return $res->fetch_all(MYSQLI_ASSOC);
}

function updUser($date)
{
    global $connection;
    connect();
    $id = $connection->real_escape_string($_SESSION['idUser']);
    $name = $connection->real_escape_string($date['userName']);
    $age = $connection->real_escape_string($date['age']);
    $baseName = $date['baseName'];
    $description = $connection->real_escape_string(strip_tags($date['description']));
    if ($baseName == '') {
        $connection->query("UPDATE users set name = '$name', description = '$description', age = '$age' where id = '$id'");
    } else {
        $connection->query("UPDATE users set name = '$name', description = '$description', age = '$age',photo = '$baseName' where id = '$id'");
    }
}


function clearPhoto($photo)
{
    global $connection;
    connect();
    $photo = $connection->real_escape_string($photo);
    $connection->query("UPDATE users set photo = '' where photo = '$photo'");
}


// </editor-fold>
