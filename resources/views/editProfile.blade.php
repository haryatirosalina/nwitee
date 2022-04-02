<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/profile.css" />
    <title>Profile</title>
</head>

<body>

    <div class="nwitee">
        <!-- sidebar -->
        <div class="sidebar">
            <h2>nwitee</h2>
            <ul>
                <li>
                    <a href="home"><i class="fas fa-home"></i>Home</a>
                </li>
                <li>
                    <a class="active" href="profile"><i class="fas fa-user"></i>Profile</a>
                </li>
                <li>
                    <a href="forum"><i class="fas fa-users"></i>Forum</a>
                </li>
                <li>
                    <a href="connection"><i class="fas fa-address-book"></i>Connection</a>
                </li>
            </ul>
        </div>


        <div class="main">
            <!-- navbar -->
            <div class="navbar">
                <div class="dropdown">
                    @auth
                    <button class="dropbtn">
                        Hi, {{ auth()->user()->username}}
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#"><i class="fas fa-cog"></i>Settings</a>
                        @csrf
                        <a href="#"><i class="fas fa-sign-out-alt"></i>Log out</a>
                    </div>
                    @endauth
                </div>

                <div class="notif">
                    <a href="#notif"><i class="fas fa-bell"></i></a>
                </div>



                <div class="profile">
                    <div class="menu">
                        <div class="container">
                            <img src="/img/avatars/{{ old('avatar', Auth::user()->avatar) }}" style="width:150px; height:150px; border-radius:50%; display: block; margin-left: auto; margin-right: auto;">
                        </div>
                        <div class="update">
                            <form action="{{ route('profile.update') }}" method="post">
                                @method("put")
                                @csrf
                                <label for="name">Name</label>
                                <input value="{{ old('name', Auth::user()->name) }}" type="text" name="name">

                                <label for="email">Email</label>
                                <input value="{{ old('email', Auth::user()->email) }}" type="text" name="email">

                                <label for="username">Username</label>
                                <input value="{{ old('username', Auth::user()->username) }}" type="text" name="username">

                                <input type="submit" value="Submit">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
