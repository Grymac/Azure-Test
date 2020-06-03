<!doctype html>
<?php
    $users = array(
        'admin' => 'CENSORED',
        'test' => 'test'
    );
    $username = '';
    $password = '';
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $loggedin = false;
    }
    elseif(isset($_COOKIE['auth'])) {
        $cookie = base64_decode($_COOKIE['auth']);
        $cookie = unserialize($cookie);
        $username = $cookie['username'];
        $password = $cookie['password'];
        $loggedin = false;
    }
    if(!empty($users[$username]) && $users[$username] == $password) {
        $cookie = array(
            'username' => $username,
            'password' => $password
        );
        $cookie = base64_encode(serialize($cookie));
        setcookie('auth', $cookie);
        $loggedin = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>I love PHP!</title>
    <link rel="shortcut icon" href="/static/favicon.ico" />
    <link rel="stylesheet" href="/static/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/static/styles/styles.css">
    <script src="/static/libs/jquery.min.js"></script>
    <script src="/static/libs/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <img src="/static/images/logo.jpg" class="logo">
            <a class="navbar-brand" href="/ilovephp">I love PHP!</a>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <p>I am really kind, here you have partial <a href="source.php">source code</a>.</p>
        <p>You know what to do.</p>
        <?php
            if($loggedin) {
                print('<h1>Hi ' . htmlspecialchars($username) . '</h1>');
                if($username === 'admin') {
                    print('<p>Great job! Here is your flag: CENSORED">link</a>.</p>');
                }
            }
            elseif(isset($loggedin)) die('Bad login');
        ?>
        <!-- <p>Example credentials: test/test</p> -->
        <form action="" method="post">
        <table>
        <tr>
             <td>Username:</td>
             <td><input type="text" name="username" value=""/></td>
        </tr>
        <tr>
             <td>Password:</td>
             <td><input type="text" name="password" value=""/></td>
        </tr>
        <tr>
             <td></td>
             <td><input type="submit" name="login" value="submit"/></td>
        </tr>
        <table>
        </form>
    </div>
</div>
</body>
</html>
