<?php

namespace MyApp\Models;

use Illuminate\Database\Eloquent\Model;
use \PDO;
use MyApp\Config;

class User extends Model
{


    const PASS_METHOD = 1;

    protected $guarded = [ 'id' ];

    protected $primaryKey = "id";

    public $timestamps = true;

    public static function loginCheck()
    {

        $user = User::where('login', '=', $_POST['login'])->get()->toArray();
        if ($user) {
            if (password_verify($_POST['password'], $user[0]['password'])) {
                return $user[0];
            }
        }
        return false;
    }

    public static function checkCookie()
    {
        return User::where('id', '=', $_COOKIE['id'])
            ->where('cookie', '=', $_COOKIE['hash'])
            ->get()->toArray()[0];
    }

    public static function getUserById($id)
    {
        return User::find($id);
    }

    public static function getCookie($user)
    {
        $cookie = $user['login'] . rand(0, 100);
        $cookie_hash = password_hash($cookie, self::PASS_METHOD);
        $edit = User::find($user['id']);
        $edit->cookie = $cookie_hash;
        if ($edit->save()) {
            return $cookie_hash;
        } else {
            return false;
        }
    }

    public static function updateUser($user)
    {
        $edit = User::find($user['id']);
        foreach ($user as $key => $value) {
            if (in_array($key, ['name','description','age','photo','ip','password'])) {
                if ($key == 'ip') {
                    $value = ip2long($value);
                } elseif ($key == 'password') {
                    $value = password_hash($value, self::PASS_METHOD);
                }
                $edit->$key = $value;
            }
        }
        return $edit->save();
    }

    public static function getUsers($fields = null)
    {
        return   User::get($fields)->toArray();
    }

    public static function deleteUsers($id)
    {
        User::destroy($id);
    }

    public static function addUser($fields)
    {
        if (isset($fields['password'])) {
            $fields['password'] = password_hash($fields['password'], self::PASS_METHOD);
        }

        if (isset($fields['ip'])) {
            $fields['ip'] = ip2long($fields['ip']);
        }

        return User::create($fields);
    }

}