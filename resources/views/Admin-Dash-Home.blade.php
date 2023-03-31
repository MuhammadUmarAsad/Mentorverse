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
    <link href='{{ asset('css/DashboardGlobal.css') }}' rel='stylesheet'>
    <link rel="stylesheet" href='{{ asset('css/ContactsLoginSignup.css') }}' />
</head>

@php
    use App\Models\Users;
    $fullname = Users::SELECT('fullname')
        ->WHERE('username', Session::get('user')['username'])
        ->get();
    $status = Users::SELECT('status')
        ->WHERE('username', Session::get('user')['username'])
        ->get();
    $img = Users::SELECT('userImage')
        ->WHERE('username', Session::get('user')['username'])
        ->get();
    $balance = Users::SELECT('wallet')
        ->WHERE('username', Session::get('user')['username'])
        ->get();
@endphp

<body class='snippet-body'>
    {{-- <input type="checkbox" id="check"> --}}
    <!--header area start-->
    <div class="main">
        <header>
            <div class="row">
                <div class="col my-auto">
                    {{-- <label for="check">
                    <i class="fas fa-bars" id="sidebar_btn"></i>
                </label> --}}
                    <img src=" Images/logo.png" id="logo" />
                </div>
                <div class="col my-auto text-end">
                    <a href="logout" id="logout"><button type="button" class="btn btnPrimary btn-lg btnFont">
                            Logout
                        </button></a>
                </div>
            </div>
            <!--  Balance Amount  -->
            <h5 class="text-center" style="color:#095256"><b>Earnings</b>: Rs <span>{{$balance[0]->wallet}}</span></h5>
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
                        <a class="active" href="/AdminDashboard"><i
                                class="fas fa-envelope"></i><span>Mails</span></a>
                        <a href="AdminDashboard/faqs"><i class="fas fa-question"></i><span>Add FAQs</span></a>
                        <a href="AdminDashboard/about"><i class="fas fa-info"></i><span>Edit About</span></a>
                        <a href="AdminDashboard/user"><i class="fas fa-user"></i><span>Edit Users</span></a>
                    </div>
                </div>
            </div>
            <!--sidebar end-->
            <div class="col">
                <div class="DashContainer">

                    <h3 style="color: #15d4d4; margin: 1em 0em;">Messages</h3>

                    <div class="row">
                        <div class="col">
                            <h5>Name</h5>
                        </div>
                        <div class="col">
                            <h5>Email</h5>
                        </div>
                        <div class="col">
                            <h5>Subject</h5>
                        </div>
                        <div class="col">
                            <h5>Message</h5>
                        </div>
                    </div>

                    <!-- Session -->
                    <div style="margin: 2em 0em"></div>
                    @for ($i = 0; $i < count($contact); $i++)
                        <div class="row">

                            <div class="col">
                                <p>{{ $contact[$i]->name }}</p>
                            </div>
                            <div class="col">
                                <p>{{ $contact[$i]->email }}</p>
                            </div>
                            <div class="col">
                                <p>{{ $contact[$i]->subject }}</p>
                            </div>
                            <div class="col">
                                <p>{{ $contact[$i]->message }}</p>
                            </div>

                        </div>
                    @endfor

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script type='text/javascript' src="{{ asset('Js/sidebar.js') }}"></script>
</body>

</html>
