<?php

namespace HW52\Models;

use \HW52\Core\Model;
use \PDO;
use \HW52\Config;

class ModelUsers extends Model
{

    const PASS_METHOD = 1;

    public static function addUser()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (($post['login'] == $_POST['login']) && ($post['password'] == $_POST['password'])) {
            try {
                $pw_hash = password_hash($post['password'], self::PASS_METHOD);
                $statement = self::pdo()
                    ->query("insert into `users` (`login`,`password`) values ('{$post['login']}','$pw_hash');");
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        } else {
            return ['error' => 'Некорректны имя или пароль'];
        }
        if ($statement) {
            return $statement->rowCount();
        }
        return $statement;
    }

    public static function deleteUsers($id)
    {
        try {
            $statement = self::pdo()
                ->query("delete from users where id = $id;");
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        if ($statement) {
            return $statement->rowCount();
        } else {
            return false;
        }
    }

    public static function loginCheck()
    {
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_MAGIC_QUOTES);
        $password = $_POST['password'];

        if ($login) {
            try {
                $statement = self::pdo()
                    ->query("select id, login, password from users where login = '$login';");
                $user = $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }

            if ((!empty($user))) {
                $pw_hash = $user[0]['password'];
                if (password_verify($password, $pw_hash)) {
                    return $user[0];
                }
            }
        }
        return false;
    }

    public static function getUsers($fields = ' * ', $where = '1 = 1')
    {
        $return = false;
        try {
            $statement = self::pdo()
                ->query("select $fields from users where $where;");
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        if ((!empty($users))) {
            $return = $users;
        }

        return $return;
    }

    public static function getUserByLogin()
    {
        $return = false;
        if (!empty($_SESSION['user'])) {
            $login = $_SESSION['user'];
            try {
                $statement = self::pdo()
                    ->query("select * from users where login = '$login';");
                $user = $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
            if ((!empty($user))) {
                $return = $user[0];
            }
        }
        return $return;
    }


    public static function updateUser()
    {

        $args = array(
            'name' => FILTER_SANITIZE_STRING,
            'description' => FILTER_SANITIZE_STRING,
        );

        $post = filter_input_array(INPUT_POST, $args);
        $post['age'] = date("Y-m-d", strtotime($post['age']));

        if (!empty($_FILES)) {
            $baseFileName = basename(filter_var($_FILES['userFile']['name'], FILTER_SANITIZE_STRING));
            $baseName = $_SESSION['idUser'] . '-' . mb_strtolower($baseFileName);
            $uploadFile = Config::$photoDir . $baseName;
            $_POST['fileName'] = '';
            if ($_FILES['userFile']["type"] == "image/jpeg") {
                if (move_uploaded_file($_FILES['userFile']['tmp_name'], $uploadFile)) {
                    self::imageResize($uploadFile);
                    $post['fileName'] = $baseName;
                    $uploadDir = Config::$photoDir;
                    $files = glob("$uploadDir{$_SESSION['idUser']}-*.{jpg}", GLOB_BRACE);
                    if (count($files) > 1) {
                        foreach ($files as $value) {
                            if (baseName($value) != $baseName) {
                                unlink($value);
                            }
                        }
                    }
                } else {
                    $post['fileName'] = '';
                }
            }
        }



        if ($post['fileName'] == 0) {
            $fileName ='';
        } else {
            $fileName = ", photo = '{$post['fileName']}' ";
        }
        $sql = "update users 
                set 
                  name = '{$post['name']}', 
                  description = '{$post['description']}', 
                  age = '{$post['age']}'
                  $fileName
                where id = '{$_SESSION['idUser']}'";


        try {
            $statement = self::pdo()->query($sql);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $statement;
    }

}