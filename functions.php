<?php
class passgen
{
    var $con;
	public function __construct() {
		$this->con = mysqli_connect("localhost","root","123456","passgen");
		if (mysqli_connect_errno()) {
			die( "Failed to connect to MySQL: " . mysqli_connect_error() );
		}
	}
    
    function passgen(){
        $length = 10;
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }
    
    function login($uname,$pass){
        $sql = "SELECT * FROM users where uname = '$uname' and pass = '$pass'";
        $result = mysqli_query($this->con, $sql);
		if(mysqli_num_rows($result)>0){
            session_start();
            $_SESSION['uname'] = $uname;
            $_SESSION['pass'] = $pass;
            header('Location: home.php');
        }else{
            echo "Invalid Username Or password";
        }
    }
    
    function post($name,$genname,$genpass){
        $sql = "INSERT INTO pass (`name`,`genname`,`genpass`) VALUES ('".$name."','".$genname."','".$genpass."')";
        if(mysqli_query($this->con, $sql)){
            echo "Thank you. You password has been saved successfully. Click <a href='display.php'>here</a> to see.";
        }else{
            echo "Password Not Saved. Try again.";
        }
        
    }
    
    function get(){
        $sql = "SELECT * FROM pass";
        $result = mysqli_query($this->con, $sql);
            echo "<table width='100%' border='2'><tr><th>S no.</th><th>Website</th><th>Username</th><th>Password</th></tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr><td>".$row[id]."</td><td>".$row[name]."</td><td>".$row[genname]."</td><td>".'<input onClick="this.select();" value='.$row[genpass]."' style='width:100%' height:100%;></td></tr>";
            }
        echo "</table>";
    }
}
?>
