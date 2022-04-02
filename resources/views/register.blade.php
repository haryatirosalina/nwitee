<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css" />
    <title>Nwitee | Register</title>
</head>
<body>
    <center>
        <div class="login">    
            <img src="img/nwitee.png" alt="Nwitee" style="width:150px">
            <h2 class="login-header">NWITEE</h2>
        
                <form class="login-container" action="/create_accounts " method="POST">
                @csrf
                    <p>
                        <input type="Name" name="name" placeholder="Name" size="38"/>
                    </p>
                    <p>
                        <input type="Username" name="username" placeholder="Username" size="38"/>
                    </p>
                    <p>
                        <input type="password" name="password" placeholder="Password" size="38"/>
                    </p>
                        <input type="email" name="email" placeholder="Email" size="38"/>
                    </p>
                    <p>
                        <input type="submit" value="Daftar" size="30"/>
                    </p>
                </form>
                <p>Sudah punya akun, silahkan <a href="login">Login</a>
                </p>
        </div>        
        </center>
</body>
</html>