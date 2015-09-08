<html>
    <?php session_start(); 
    include_once 'functions.php';
    if(isset($_SESSION['uname'])){
    ?>
    <head>
        <title>
            Welcome <?php echo $_SESSION['uname']; ?>
        </title>
        <script src = "jquery.min.js"></script>
        <script src = "script.js"></script>
    </head>
    
    <body>
        <a href = "logout.php" style = "position:absolute; top: 10px; right:10px;">Logout</a>
        <table>
        <form action = "home.php" method = "post">
            <tr><td>Website Name:</td><td><input type = "text" name = "website"></td></tr>
            <tr><td>UserName:</td><td><input type = "text" name = "genname"></td></tr>
            <tr><td>Genrate Password:</td><td><input type = "text" name = "genpass" id='genpass'>
            <button type="button" id='genrate'>Generate</button></td></tr>
            <tr><td></td><td><input type = "submit" name = "submit" value = "Save The Password."></td></tr>
         </form>
         </table>
        <?php
        if($_POST['submit']){
            $name = $_POST['website'];
            $genname = $_POST['genname'];
            $genpass = $_POST['genpass'];
            $passgen = new passgen();
            $passgen->post($name,$genname,$genpass);
        }
        ?>
    </body>
    <?php
    }else{
        header('Location: index.php');
    }
    ?>
</html>
