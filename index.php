<!DOCTYPE html>
<html>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
<title>SIR MVIT CHEMISTRY LAB | LOGIN</title>
    <link rel="stylesheet" type="text/css" href="static/login.css">
<body>
    <div class="loginbox">
    <img src="static/smvitlogo.png" class="avatar">
        <h1>SIR MVIT Chemistry Lab</h1>


        <form name="login">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter the Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter the Password">
            <input type="submit" onclick="check(this.form)" value="Login">
          </form>

          <script language="javascript">
            function check(form)
            {
 
                if(form.username.value == "admin" && form.password.value == "admin")
                {
                    window.open("home.html")
                }
                else
                {
                    alert("Invalid Password or Username")
                }
            }
        </script>

    </div>

</body>
</head>
</html>
