<?php

class Session
{
    private static function start()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    private static function set($key, $value)
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    private static function get($key)
    {
        self::start();
        if (isset($_SESSION[$key])) {
            return  $_SESSION[$key];
        }
        return null;
    }

    private static function has($key)
    {
        self::start();
        return (isset($_SESSION[$key]));
    }
    private static function remove($key)
    {
        self::start();
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    private static function remove_all(){
      self::start();
      session_unset();
      session_destroy();
    }

    private static function get_all() {
        self::start();
        return $_SESSION ;
    }
}













?>


<form action="" method="POST">
    <input type="text" name="name" placeholder="type your name">


    <input type="submit" value="send"><br>
    <input type="submit" value="logout">










</form>