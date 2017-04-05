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
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);
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

    public static function getCookie($login)
    {
        $cookie = $login . rand(0, 100);
        $cookie_hash = password_hash($cookie, self::PASS_METHOD);
        try {
            $statement = self::pdo()
                ->query("update users set cookie = '$cookie_hash' where login = '$login';");
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        if ($statement && ($statement->rowCount() == 1)) {
            return $cookie_hash;
        } else {
            return false;
        }
    }

    public static function checkCookie()
    {
        $data = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_MAGIC_QUOTES);
        try {
            $statement = self::pdo()
                ->query("select id,login from users 
                    where login = '{$data['login']}' and cookie = '{$data['hash']}';");
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        if ((!empty($users))) {
            return $users[0];
        } else {
            return false;
        }
    }

    public static function getUsers($fields = ' * ', $where = '1 = 1', $order = '')
    {
        $return = false;
        if ($order) {
            $order = " order by $order";
        }
        try {
            $statement = self::pdo()
                ->query("select $fields from users where $where $order;");
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

    public function updateUser($updateFields,$id,$where = '')
    {
        $id = (int)$id;
        $statement = false;
        if ((int)$id) {

            $sql = "update users 
                set
                 $updateFields
                where 
                id = $id 
                and $where";

            try {
                $statement = self::pdo()->query($sql);
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }
        if ($statement) {
            $statement = $statement->rowCount();
        }
        return $statement;
    }

    public static function updateUserByPost()
    {

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_MAGIC_QUOTES);
        $post['description'] = filter_var($post['description'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $post['age'] = date("Y-m-d", strtotime($_POST['age']));

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

        if ($post['age'] == date('1970-01-01')) {
            $post['age'] = 'null';
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