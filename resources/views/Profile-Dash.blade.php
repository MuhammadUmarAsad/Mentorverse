<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Student Dashboard</title>

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

<body class='snippet-body'>
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
        $amount = Users::SELECT('wallet')
            ->WHERE('username', Session::get('user')['username'])
            ->get();
        
    @endphp
    {{-- <input type="checkbox" id="check"> --}}
    <!--header area start-->
    <div class="main">
        <header>
            <div class="row">
                <div class="col my-auto">
                    {{-- <label for="check">
                    <i class="fas fa-bars" id="sidebar_btn"></i>
                </label> --}}
                    <img src=" {{ asset('Images/logo.png') }}" id="logo" />
                </div>
                <div class="col my-auto text-end">
                    <a href="{{ url('/logout') }}" id="logout"><button type="button"
                            class="btn btnPrimary btn-lg btnFont">
                            Logout
                        </button></a>
                </div>
            </div>
            <!--  Balance Amount  -->
            <p class="text-end"><b>Balance</b>: Rs <span>{{ $amount[0]->wallet }}</span></p>
        </header>


        @php
            
            $fullname = Users::SELECT('fullname')
                ->WHERE('username', Session::get('user')['username'])
                ->get();
            $status = Users::SELECT('status')
                ->WHERE('username', Session::get('user')['username'])
                ->get();
            
            $email = Users::SELECT('email')
                ->WHERE('username', Session::get('user')['username'])
                ->get();
            
            $wallet = Users::SELECT('wallet')
                ->WHERE('username', Session::get('user')['username'])
                ->get();
            
            $image = Users::SELECT('userImage')
                ->WHERE('username', Session::get('user')['username'])
                ->get();
            
        @endphp

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

                        <a href="javascript:void(0);" class="icon hide" onclick="geeksforgeeks()">

                            <i onclick="myFunction(this)" class="fa fa-plus-circle" id="hide"> Menu
                            </i>
                        </a>
                    </div>
                    <div id="menus">
                        @if ($status[0]->status == 'student')
                            <a href="{{ url('StudentDashboard') }}"><i
                                    class="fas fa-desktop"></i><span>Dashboard</span></a>
                        @endif

                        @if ($status[0]->status == 'tutor')
                            <a href="{{ url('TutorDashboard') }}"><i
                                    class="fas fa-desktop"></i><span>Dashboard</span></a>
                        @endif
                        <a href="{{ url('DashSessions/' . Session::get('user')['username']) }}"><i
                                class="fas fa-calendar"></i><span>Sessions</span></a>
                        <a href="{{ url('DashTutors') }}"><i class="fas fa-male"></i><span>Find a Tutor</span></a>
                        <a href="{{ url('DashCourses') }}"><i class="fas fa-th"></i><span>Find
                                Courses</span></a>

                        @if ($status[0]->status == 'student')
                            <a href="{{ url('BecomeTutor/' . Session::get('user')['username']) }}"><i
                                    class="fas fa-chalkboard-teacher"></i><span>Become
                                    Tutor</span></a>
                        @endif

                        @if ($status[0]->status == 'tutor')
                        <a href="{{ url('uploadCourse')}}">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Upload Course</span>
                        </a>
                        @endif

                        <a class="active" href="{{ url('profile/' . Session::get('user')['username']) }}"><i
                                class="fas fa-gear"></i><span>Profile</span></a>
                    </div>
                </div>
            </div>
            <!--sidebar end-->
            <div class="col">
                <div class="DashContainer">
                    <form class="contactright" style="padding-top:1rem; margin-top:1rem"
                        action="update/{{ Session::get('user')['username'] }}" method="post" return="false"
                        enctype="multipart/form-data">

                        <div class="mb-0 mt-0">
                            <h5 style="text-align:center; color:#1b1c1e; padding-top:1rem;"> Full Name </h5>
                            <div class="input-group input-grp">
                                <input type="text" class="input" id="name" required="" autocomplete="off"
                                    name="name" value="{{ $fullname[0]->fullname }}" />
                                <label class="user-label">FullName</label>
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @csrf
                        </div>

                        <div class="mb-0 mt-0">
                            <h5 style="text-align:center; color:#1b1c1e; padding-top:1rem;"> Email </h5>
                            <div class="input-group input-grp">
                                <input type="email" class="input" id="email" required="" autocomplete="off"
                                    name="email" value="{{ $email[0]->email }}" />
                                <label class="user-label">Email</label>
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @csrf
                        </div>

                        <div class="mb-0 mt-0">
                            <h5 style="text-align:center; color:#1b1c1e;padding-top:1rem;"> Wallet </h5>
                            <div class="input-group input-grp">
                                <input type="text" class="input" id="wallet" required="" autocomplete="off"
                                    name="wallet" value="{{ $wallet[0]->wallet }}" />
                                <label class="user-label">Wallet</label>
                            </div>
                            @error('wallet')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @csrf
                        </div>
                        <div classs="row">
                            <div class="mb-0 mt-0">
                                <h5 style="text-align:center; color:#1b1c1e; padding-top:1rem;"> Profile Picture </h5>
                                <div class="col my-auto">
                                    <img src="{{ asset('Images/users/' . $image[0]->userImage) }}"
                                        class="mx-auto d-block" style=" padding-bottom:1rem">
                                    <input type="file" class="input" autocomplete="off" id="image"
                                        name="image" />
                                </div>

                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @csrf
                            </div>
                        </div>

                        <button type="submit" class="btnPrimary btn btnFont btn-lg mx-auto d-block">Update</button>
                    </form>
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
