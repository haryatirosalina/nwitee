<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/home.css" />
    <title>Nwitee | Create Post</title>
</head>

<body>
    <div class="nwitee">
        <!-- sidebar -->
        <div class="sidebar">
            <h2>nwitee</h2>
            <ul>
                <li>
                    <a class="active" href="home"><i class="fas fa-home"></i>Home</a>
                </li>
                <li>
                    <a href="profile"><i class="fas fa-user"></i>Profile</a>
                </li>
                <li>
                    <a href="forum"><i class="fas fa-users"></i>Forum</a>
                </li>
                <li>
                    <a href="chat"><i class="fas fa-comments"></i>Chat</a>
                </li>
                <li>
                    <a href="connection"><i class="fas fa-address-book"></i>Connection</a>
                </li>
            </ul>
        </div>


        <div class="main">
            <!-- navbar -->
            <div class="navbar">
                <div class="search">
                    <form action="#">
                        <input type="text" placeholder="    Search" name="search" />
                        <button>
                            <i class="fa fa-search" style="font-size: 20px"> </i>
                        </button>
                    </form>
                </div>

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

            <!-- new post -->
            <div class="col-lg-5">

                <form method="post" action="/home/post">
                 @csrf   
                <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" c lass="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>