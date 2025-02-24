<?php

class Session {
    
    // Start the session if not already started
    private static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Set a session key with a value
    public static function set($key, $value) {
        self::start();
        $_SESSION[$key] = $value;
    }

    // Get a session key value if exists
    public static function get($key) {
        self::start();
        return $_SESSION[$key] ?? null;
    }

    // Check if a session key exists
    public static function has($key) {
        self::start();
        return isset($_SESSION[$key]);
    }

    // Remove a specific key from the session
    public static function remove($key) {
        self::start();
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    // Remove all session data
    public static function removeAll() {
        self::start();
        session_unset();
        session_destroy();
    }

    // Get all session data
    public static function getAll() {
        self::start();
        return $_SESSION;
    }

    // Flash message: store a message for one request only
    public static function flash($key, $message = null) {
        self::start();
        if ($message !== null) {
            $_SESSION['flash'][$key] = $message;
        } elseif (isset($_SESSION['flash'][$key])) {
            $msg = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $msg;
        }
        return null;
    }
}






if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    
    // التحقق من صحة الإدخال
    if (empty($name)) {
        Session::set('errors', 'الاسم مطلوب!');
    } else {
        Session::set('success', 'تم التسجيل بنجاح!');
        Session::set('name', $name);
    }
    
}

// جلب الإشعارات من الـ Session
$success = Session::flash('success');
$error = Session::flash('errors');
?>


   

    <form method="POST">
        <input type="text" name="name" placeholder=" type your name">
        <button type="submit">send</button>
    </form>

    <br>
    <button type="submit"> logout</a>
</body>
</html>



