<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{asset('css/home.css')}}" />
    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Nwitee | Home</title>
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

        <!-- online user -->
        {{-- <div class="connection">
            <h4>Online users</h4>
            <ul>
                <li>
                    <a href="#haryati"><i class="fas fa-user"></i>Haryati</a>
                </li>
                <li>
                    <a href="#ignatia"><i class="fas fa-user"></i>Ignatia</a>
                </li>
                <li>
                    <a href="#manuel"><i class="fas fa-user"></i>Manuel</a>
                </li>
                <li>
                    <a href="#natanael"><i class="fas fa-user"></i>Natanael</a>
                </li>
                <li>
                    <a href="#samuel"><i class="fas fa-user"></i>Samuel</a>
                </li>
            </ul>
        </div> --}}


        <div class="main">
            <div class="navbar">
                {{-- <div class="search">
                    <form action="#">
                        <input type="text" placeholder=" Search" name="search" />
                        <button>
                            <i class="fa fa-search" style="font-size: 20px"> </i>
                        </button>
                    </form>
                </div> --}}

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
                                <a href="editPost/{{ $post->id}}"><i class="fas fa-edit"></i>Edit</a>
                                <a href="delete/{{ $post->id }}"><i class="fas fa-trash"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post_body">
                    <center>
                        <img src="/img/file/{{ $post->file }}" style="width:150px; height:150px; border-radius:8px;">
                    </center>
                    <p>
                        {{ $post->description }}
                    </p>
                </div>
                <small class="float-right">
                    <span title="Likes" id="saveLikeDislike" data-type="like" data-post="{{ $post->id }}" class="test">
                        <i class="fas fa-thumbs-up"> Like</i>
                        {{-- Like --}}
                        <span class="like-count">{{ $post->likes() }}</span>
                    </span>
                    <span title="Dislikes" id="saveLikeDislike" data-type="dislike" data-post="{{ $post->id }}" class="test1">
                        <i class="fas fa-thumbs-down"> Dislike</i>
                        {{-- Dislike --}}
                        <span class="like-count">{{ $post->dislikes() }}</span>
                    </span>
                </small>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="margin-top:4px;">
                        <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} Comments</h3>
                        @foreach($post->comments as $comment)
                        <div class="comment">
                            <div class="author-info">
                                <div class="dropdown1">
                                    <button class="dropbtn1">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-content1">
                                        <a href="comment/{{ $comment->id}}"><i class="fas fa-edit"></i>Edit</a>
                                        <a href="delete_comment/{{ $comment->id }}"><i class="fas fa-trash"></i>Delete</a>
                                    </div>
                                </div>

                                <div class="author-name">
                                    <h4>{{ $comment->name }}</h4>
                                    <p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
                                </div>

                            </div>

                            <div class="comment-content">
                                {{ $comment->comment }}
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="row">

                    <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
                        {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::label('comment', "Comment:") }}
                                </br>
                                {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '4']) }}
                                {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'background-color: #3596c0; color: #ffffff; padding: 8px; border-radius:6px; float:right;']) }}
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>



            </div>
            @endforeach
            @endauth
        </div>
    </div>
</body>
<script>
    $(document).on('click', '#saveLikeDislike', function() {
        var _post = $(this).data('post');
        var _type = $(this).data('type');
        var vm = $(this);

        //run ajax
        $.ajax({
            url: "{{url('save-likedislike')}}"
            , type: "post"
            , dataType: 'json'
            , data: {
                post: _post
                , type: _type
                , _token: "{{csrf_token()}}"
            }
            , beforeSend: function() {
                vm.addClass('disabled');
            }
            , success: function(res) {
                if (res.bool == true) {
                    vm.removeClass('disabled').addClass('active');
                    vm.removeAttr('id');
                    var _prevCount = $("." + _type + "-count").text();
                    _prevCount++;
                    $("." + _type + "-count").text(_prevCount);
                }
            }
        });
    });

</script>
</html>
