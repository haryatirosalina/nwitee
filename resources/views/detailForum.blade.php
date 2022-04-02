<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{asset('css/detailForum.css')}}" />
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
                @endauth
            </div>

            <!-- main content -->
            <div class="forum1">
                <h1>Add Your Idea About This Topics</h1>
                <button class="btn1"><a href="/addDiscuss">Add</a></button>
                </form>
            </div>
            @foreach($data as $post)
            <div class="post">
                <div class="post_header">
                    <i class="fas fa-user"></i>
                    <div class="post_info">
                        <h2>{{ auth()->user()->name}}</h2>
                        <p>@ {{ auth()->user()->username}}</p>
                    </div>
                    <div class="update" style="margin-left:60%;">
                        <div class="dropdown1">
                            <button class="dropbtn1">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-content1">
                                <a href="/edit-post"><i class="fas fa-edit"></i>Edit</a>
                                <a href="/delete-post"><i class="fas fa-trash"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post_body">
                    <p>
                        {{ $post->deskripsi }}
                    </p>
                    <div class="feed_inputOptions">
                        <div class="btn-group">
                            <button class="btn btn-default"><i class="fas fa-thumbs-up"></i>suka</button>
                            <button class="btn btn-default" id="btn-komentar-utama"><i class="fas fa-comments"></i>replay</button>
                        </div>
                        <textarea id="komentar-utama" name="komentar" id="komentar-utama" cols="100" rows="4"></textarea>
                        <h1>Komentar</h1>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
</body>
@section('footer')
<script>
    $(document).ready(function() {
        $('#btn-komentar-utama').click(function() {
            $('#komentar-utama').show();
        });
    });

</script>
@endsection
</html>
