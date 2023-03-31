<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Admin Dashboard</title>

    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Playfair+Display+SC:wght@400;700;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="{{ asset('css/Global (Typography).css') }}" />
    <link href="{{ asset('css/DashboardGlobal.css') }}" rel='stylesheet'>


    <style>
        .Image {
            border-radius: 50%;
            height: auto;
            width: 60px;
        }

    </style>
</head>

<body class='snippet-body'>
    {{-- <input type="checkbox" id="check"> --}}
    <!--header area start-->
    <div class="main">
        @php
            use App\Models\Users;
            $fullname = Users::SELECT('fullname')
                ->WHERE('username', Session::get('user')['username'])
                ->get();
            $status = Users::SELECT('status')
                ->WHERE('username', Session::get('user')['username'])
                ->get();
            $users = Users::all();
            $img = Users::SELECT('userImage')
                ->WHERE('username', Session::get('user')['username'])
                ->get();
        @endphp

        <header>
            <div class="row">
                <div class="col my-auto">
                    {{-- <label for="check">
                    <i class="fas fa-bars" id="sidebar_btn"></i>
                </label> --}}
                    <img src=" {{ asset('Images/logo.png') }}" id="logo" />
                </div>
                <div class="col my-auto text-end">
                    <a href="{{ asset('logout') }}" id="logout"><button type="button"
                            class="btn btnPrimary btn-lg btnFont">
                            Logout
                        </button></a>
                </div>
            </div>
        </header>

        <div class="row">
            <div class="col-xl-2 col-md-3">
                <div class="sideBar">
                    <div class="profile_info text-center">
                        <img src="{{ asset('Images/users/' . $img[0]->userImage) }}" class="profile_image" alt="">
                        <h4>
                            {{ $fullname[0]->fullname }}

                        </h4>

                        <p>
                            {{ Str::upper($status[0]->status) }}
                        </p>
                        <a href="javascript:void(0);" class="icon hide" onclick="side()">

                            <i onclick="myFunction(this)" class="fa fa-plus-circle" id="hide"> Menu
                            </i>
                        </a>
                    </div>
                    <div id="menus">
                        <a href=".."><i class="fas fa-envelope"></i><span>Mails</span></a>
                        <a href="faqs"><i class="fas fa-question"></i><span>Add FAQs</span></a>
                        {{-- <a href="/status"><i class="fas fa-eject"></i><span>Change Status</span></a> --}}
                        <a href="about"><i class="fas fa-info"></i><span>Edit About</span></a>
                        <a class="active" href="user"><i class="fas fa-user"></i><span>Edit
                                Users</span></a>
                    </div>
                </div>
            </div>
            @php
                $len = count($users);
            @endphp
            <!--sidebar end-->
            <div class="col">
                <div class="DashContainer">
                    <div class="input-group">
                        <input type="text" name="searchForm" class="form-control label" id="searchForm"
                            placeholder="Search " aria-label="Search Tutor" aria-describedby="search_category"
                            onkeyup="search('{{ $len }}')" />
                        <button class="btn" type="button" id="search_category">
                            <img src="{{ asset('Images/search.svg') }}" alt="search" id="SearchImgSmall" />
                        </button>
                    </div>
                    <h3 style="color: #095256; text-align:center;margin: 1em 0em;">User Data</h3>

                    <div class="row">
                        <div class="col">
                            <h5>Profile Picture</h5>
                        </div>
                        <div class="col">
                            <h5>Username</h5>
                        </div>
                        <div class="col">
                            <h5>Full Name</h5>
                        </div>
                        <div class="col">
                            <h5>Email</h5>
                        </div>
                        <div class="col">
                            <h5>Status</h5>
                        </div>
                        <div class="col">
                            <h5>Balance</h5>
                        </div>
                        <div class="col">

                        </div>

                    </div>

                    <!-- Session -->
                    <div style="margin: 2em 0em" id="myUL">
                        @for ($i = 0; $i < count($user); $i++)
                            @if ($user[$i]->status != 'admin')
                                <span class="li">
                                    <div class="row" style="margin:2em 0em;" id="{{ $i }}">
                                        <div class=" col my-auto">
                                            <img src="{{ asset('Images/Users/' . $user[$i]->userImage) }} "
                                                class="Image">
                                        </div>
                                        <div class="col">
                                            <p>{{ $user[$i]->username }}</p>
                                        </div>
                                        <div class="col">
                                            <p class="SingleCard">{{ $user[$i]->fullname }}</p>
                                        </div>
                                        <div class="col">
                                            <p>{{ $user[$i]->email }}</p>
                                        </div>
                                        <div class="col">
                                            <p>{{ $user[$i]->status }}</p>
                                        </div>
                                        <div class="col">
                                            <p>{{ $user[$i]->wallet }}</p>
                                        </div>
                                        <div class="col">

                                            <div>
                                                <a
                                                    href="{{ url('status/') }}/{{ $user[$i]->username }}/{{ $user[$i]->status }}"><button
                                                        class="btn btnSecond btnFont btn-sm">Change Status</button></a>
                                            </div>

                                        </div>
                                    </div>
                                </span>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
            </script>
            <script type='text/javascript' src="{{ asset('Js/sidebar.js') }}"></script>
            <script>
                function search(len) {
                    var input, filter, ul, li, a, i, txtValue, x;
                    input = document.getElementById("searchForm");
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("myUL");
                    li = ul.getElementsByClassName("li");
                    for (i = 0; i < len; i++) {
                        a = li[i].getElementsByClassName("SingleCard")[0];
                        txtValue = a.textContent || a.innerText;
                        console.log(txtValue);
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            li[i].style.display = "";
                        } else {
                            li[i].style.display = "none";
                        }
                    }
                }
            </script>
</body>

</html>
