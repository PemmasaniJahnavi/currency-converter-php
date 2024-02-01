<?php 
    include("connection.php");
    include("signup1.php")
    ?>
    
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        
        <div id="form">
            <center><h1>CURRENCY<br>CONVERTER</h1></center>
            <h3>Signup Form</h3>
            <form name="form" action="signup1.php" onsubmit="return isvalid()" method="POST">
                <label>Enter Full Name: </label>
                <input type="text" id="name" name="name"></br></br>
                <label>Create Username: </label>
                <input type="text" id="user" name="user"></br></br>
                <label>Create Password: </label>
                <input type="password" id="pass" name="pass"></br></br>
                <center><input type="submit" id="btn" value="Signup" name = "submit"/></center><br>
                <center><b>NOTE: </b>Password should consist only digits upto 6 characters</center>
            </form>
        </div>
        <script>
            function isvalid(){
                var name=document.form.name.value;
                var user = document.form.user.value;
                var pass = document.form.pass.value;
               
                if(user.length=="" && pass.length=="" && name.length=="")
                {
                    alert(" Name, Username and Password fields are empty!!!");
                    return false;
                }
                else if(user.length=="" && pass.length=="")
                {
                    alert(" Username and password fields are empty!!!");
                    return false;
                }
                else if(user.length=="" && name.length=="")
                {
                    alert(" Name and Username fields are empty!!!");
                    return false;
                }
                else if(pass.length=="" && name.length=="")
                {
                    alert(" Name and Password fields are empty!!!");
                    return false;
                }
                else if(user.length=="")
                {
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(name.length=="")
                {
                    alert(" Name field is empty!!!");
                    return false;
                }
                
                else if(pass.length=="")
                {
                    alert(" Password field is empty!!!");
                    return false;
                }
                else if(pass.length>6)
                {
                    alert(" Password has more than 6 characters.Please give new one!!!");
                    return false;
                }
                else if((!/^\d+$/.test(pass)))
                {
                    alert(" Password should contain only digits!!!");
                    return false;
                
  
            }
        }
        </script>
    </body>
</html>