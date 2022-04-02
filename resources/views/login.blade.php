<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css" />
    <title>Nwitee | Login</title>
</head>

<body>
    <center>
        <div class="login">    
            <img src="img/nwitee.png" alt="Nwitee" style="width:150px">
            <h2 class="login-header">NWITEE</h2>
        
                <form class="login-container" action="/login" method="POST">
                    @csrf
                    <p>
                        <input type="Username" name ="username"placeholder="Username" size="40" autofocus required />
                    </p>
                    <p>
                        <input type="password" name ="password"placeholder="Password" size="40" required/>
                    </p>
                    <p>
                        <input type="submit" value="Log in" size="120px"/>
                    </p>
                </form>
                <p>Belum punya akun, silahkan daftar <a href="register">disini</a>
                </p>

                <!-- username:haryatirosalina
                pass:qwerty -->
                
        </div>        
    </center>
</body>
</html>