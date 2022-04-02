<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{asset('css/editForum.css')}}" />
    <title>Nwitee | Forum</title>

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
                    <a class="active" href="forum"><i class="fas fa-users"></i>Forum</a>
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
                        <a href="profile"><i class="fas fa-cog"></i>Settings</a>
                        @csrf
                        <a href="/"><i class="fas fa-sign-out-alt"></i>Log out</a>
                    </div>
                </div>
                <div class="notif">
                    <a href="#notif"><i class="fas fa-bell"></i></a>
                </div>
                @endauth
            </div>

            <!-- main content -->

            <div class="forum1">
                <center>
                    <h1>EDIT FORUM</h1>
                    <form action="/update/{{$data->id}}" method="POST">
                        @method("put")
                        @csrf
                        <p>
                            <input type="forum" name="forum" placeholder="forum" size="40" autofocus required value="{{$data->forum}}" />
                        </p>
                        <p>
                            <input type="topics" name="topics" placeholder="topics" size="40" required value="{{$data->topics}}" />
                        </p>
                        <p>
                            <input type="post" name="post" placeholder="post" size="40" required value="{{$data->post}}" />
                        </p>
                        <button class="btn1">Tambah</a></button>
                        <button class="btn2"><a href="/forum">batal</a></button>
                    </form>

            </div>

        </div>
        </center>
</body>
</html>
