<?php 
require_once('config.php')
?>

<?php 

if($_SERVER(['REQUEST_METHOD'] === 'POST')){
            $fullName   = $_POST['fullName'];
            $email      = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO users(fullName, email, password) VALUES(?,?,?)";
            $stntinsert = $db->prepare($sql);
            $result = $stntinsert->execute([$fullName,$email,$password]); 
            if ($result){
                echo 'Registration Successful!';
            }else{
                echo 'Registration Failed.';
            }
        }
else{
    echo 'No data';
}            
           
