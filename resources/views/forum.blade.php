<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/forum.css" />
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
                    <h1>FORUM</h1>
                </center>

                <a href="/createForum" style="color: black"><i class="fas fa-plus-circle"></i>add</a>




                <div class="table-responsive">
                    <table class="table">

                        <thead>
                            <tr>
                                <th>Forum</th>
                                <th>Topics</th>
                                <th>Post</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $frm)
                            <tr>
                                <td>{{ $frm->forum }}</td>
                                <td>{{ $frm->topics }}</td>
                                <td>{{ $frm->post }}</td>
                                <td>
                                    <a href="editForum/{{ $frm->id}}"> <i class="fas fa-edit" style="color: yellow"></i></a> |
                                    <a href="detailForum/{{ $frm->id}}"> <i class="fas fa-eye" style="color: blue"></i></a>|
                                    <a href="destroy/{{ $frm->id }}"> <i class="fas fa-trash" style="color: red"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>


                    </table>
                    <p> # Silahkan pilih forum untuk diikuti</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>

    </div>
</body>
</html>
