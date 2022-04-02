<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{asset('css/editPost.css')}}" />
    <title>Nwitee | Edit Post</title>

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
                {{-- <li>
                    <a href="chat"><i class="fas fa-comments"></i>Chat</a>
                </li> --}}
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
                    <h1>Edit Post</h1>

                    <a href="/home"> Cancel</a>
                    <div class="container">
                        <form enctype="multipart/form-data" action="/update/{{$post->id}}" method="POST">
                            @method("put")
                            @csrf
                            <input type="description" name="description" placeholder="description" size="40" autofocus required value="{{$post->description}}" /><br>
                            <input type="topics" name="topics" placeholder="topics" size="40" required value="{{$post->topics}}" /><br>
                            <input type="file" name="file" value="{{$post->file}}"><br>
                            <br><br>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="update post" style="background-color: #3596c0; color: #ffffff; padding: 8px; border-radius:6px;">
                        </form>
                    </div>
                </center>

            </div>

        </div>
</body>
</html>
