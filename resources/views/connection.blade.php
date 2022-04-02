<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" href="css/connection.css" />


    <title>Nwitee | Connection</title>
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
                    <a href="profile"><i class="fas fa-user"></i>Profile</a>
                </li>
                <li>
                    <a href="forum"><i class="fas fa-users"></i>Forum</a>
                </li>
                <li>
                    <a class="active" href="#connection"><i class="fas fa-address-book"></i>Connection</a>
                </li>
            </ul>
        </div>



        <!-- navbar -->
        <div class="main">
            <div class="navbar">
                <div class="dropdown">
                    @auth
                    <button class="dropbtn">
                        Hi, {{ auth()->user()->username}}
                        <i class="fa fa-caret-down"></i>
                    </button>

                    <div class="dropdown-content">
                        <a href="profile"><i class="fas fa-cog"></i>Settings</a>
                        @csrf
                        <a href="/"><i class="fas fa-sign-out-alt"></i>Log out</a>
                    </div>
                    @endauth
                </div>

                <div class="notif">
                    <a href="#notif"><i class="fas fa-bell"></i></a>
                </div>

            </div>


            <!-- Add and connection filter-->
            <div class="connect">
                <div class="connect1">
                    <ul>
                        <li>
                            <a href="#haryati"><i class="fas fa-user"> Haryati</i>
                                <br></a>

                            <a href="#haryati">@haryati</a>
                        </li>
                        <li>
                            <br>
                            <a href="#ignatia"><i class="fas fa-user"> Ignatia</i>
                                <br>@ignatia</a>
                        </li>
                        <li>
                            <br>
                            <a href="#manuel"><i class="fas fa-user"> Manuel</i>
                                <br>@manuel</a>
                        </li>
                        <li>
                            <br>
                            <a href="#natanael"><i class="fas fa-user"> Natanael</i>
                                <br>@natanael</a>
                        </li>
                        <li>
                            <br>
                            <a href="#samuel"><i class="fas fa-user"> Samuel</i>
                                <br>@samuel</a>
                        </li>
                    </ul>


                </div>

                <div class="add">
                    <button> + Add Friends</button>
                    <br>
                    <br>
                    <button> + Add Friends</button>
                    <br>
                    <br>
                    <button> + Add Friends</button>
                    <br>
                    <br>
                    <button> + Add Friends</button>
                    <br>
                    <br>
                    <button> + Add Friends</button>
                    <br>
                    <br>

                </div>
            </div>

        </div>
    </div>
</body>

</html>
