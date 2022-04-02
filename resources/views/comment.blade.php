<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{asset('css/home.css')}}" />
    <title>Nwitee | Comment</title>
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
                    <a href="connection"><i class="fas fa-address-book"></i>Connection</a>
                </li>
            </ul>
        </div>


        <div class="main">
            <div class="navbar">
                <div class="search">
                    <form action="#">
                        <input type="text" placeholder=" Search" name="search" />
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
            </div>

            <div class="new_post">
                <div class="input_Container">
                    <div class="feed_content">
                        <a href="/createPost">
                            <i class="fas fa-pen"></i>
                        </a>
                        <form>
                            <input type="text" placeholder="How's your day?" />
                        </form>
                    </div>
                </div>
            </div>

            <div class="post">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1>Edit Comment</h1>

                        {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}

                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}
                        </br>

                        {{ Form::label('email', 'Email:') }}
                        {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) }}
                        </br>

                        {{ Form::label('comment', 'Comment:') }}
                        </br>
                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '4']) }}

                        {{ Form::submit('Update Comment', ['class' => 'btn btn-block btn-success', 'style' => 'background-color: #3596c0; color: #ffffff; padding: 8px; border-radius:6px; float:right;']) }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            @endauth
        </div>
    </div>
</body>
</html>
