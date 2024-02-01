<?php
    include('connection.php');
    if (isset($_POST['submit'])) 
    {
        $name=$_POST['name'];
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $s = "select * from login where username = '$username'";  
        $result = mysqli_query($conn, $s);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1)
        {  
            echo'<script>
            window.location.href = "signup.php";
            alert("Username already exists.Signup with new username!!")
            </script>'; 
            
        }  
        else
        {
        $sql = "insert into login values('$name','$username','$password')"; 
        if(($conn->query($sql))===True)
        {  
            echo'<script>
            window.location.href = "index.php";
            alert("Signup success. Now you can login!!")
            </script>';
        }  
        else{  
            echo'<script>
                    window.location.href = "signup.php";
                    alert("Signup failed. Please try again!!")
                    </script>';
        } 
    }    
    }
    ?>