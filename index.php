<html>
    <?php
    include_once 'functions.php';
    session_start();
    if(isset($_SESSION['uname'])){
        header('Location: home.php');
    }else{
    ?>
    <head>
    <title>Welcome to PassGen</title>    
    </head>
    
    <body>
        <?php
            if(isset($_POST['submit'])){
                $uname = $_POST['uname'];
                $pass = $_POST['pass'];
                $theclass = new passgen();
                $theclass->login($uname,$pass);
            }
        ?>
    <form action = "index.php" method = "post">
    <input type = "text" name = "uname"><br>
    <input type = "password" name = "pass"><br>
    <input type = "submit" name = "submit" value = "login">
    </form>
    </body>
    <?php
    }
    ?>
</html>
