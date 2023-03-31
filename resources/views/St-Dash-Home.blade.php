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

    <link rel="stylesheet" href="css/Global (Typography).css" />
    <link href='css/DashboardGlobal.css' rel='stylesheet'>
    <link href='css/calender.css' rel='stylesheet'>
</head>

<body class='snippet-body'>
    @php
        use App\Models\Users;
        use App\Models\St_Enrolled_Courses;
        use App\Models\Courses;
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
        $courseID = St_Enrolled_Courses::SELECT('course_id')
            ->WHERE('st_username', Session::get('user')['username'])
            ->get();
        $enrolled = count($courseID);
        
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
                    <img src=" Images/logo.png" id="logo" />
                </div>
                <div class="col my-auto text-end">
                    <a href="logout" id="logout"><button type="button" class="btn btnPrimary btn-lg btnFont">
                            Logout
                        </button></a>
                </div>
            </div>
            <!--  Balance Amount  -->
            <p class="text-end"><b>Balance</b>: Rs <span>{{ $amount[0]->wallet }}</span></p>
        </header>




        <div class="row">
            <div class="col-xl-2 col-md-3">
                <div class="sideBar">
                    <div class="profile_info text-center">
                        <img src="Images/users/{{ $img[0]->userImage }}" class="profile_image" alt="">
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
                        <a class="active" href="{{ url('StudentDashboard') }}"><i
                                class="fas fa-desktop"></i><span>Dashboard</span></a>
                        <a href="{{ url('DashSessions/' . Session::get('user')['username']) }}"><i
                                class="fas fa-calendar"></i><span>Sessions</span></a>
                        <a href="{{ url('DashTutors') }}"><i class="fas fa-male"></i><span>Find a Tutor</span></a>
                        <a href="{{ url('DashCourses') }}"><i class="fas fa-th"></i><span>Find
                                Courses</span></a>

                        <a href="{{ url('BecomeTutor/' . Session::get('user')['username']) }}"><i
                                class="fas fa-chalkboard-teacher"></i><span>Become
                                Tutor</span></a>

                        <a href="{{ url('profile/' . Session::get('user')['username']) }}"><i
                                class="fas fa-gear"></i><span>Profile</span></a>
                    </div>
                </div>
            </div>
            <!--sidebar end-->
            <div class="col">
                <div class="DashContainer">
                    <div class="row">
                        <div class="col">
                            <div class="row my-3">
                                <div class="col align-self-end">
                                    <h1>Hello</h1>
                                    <p>It's Good to See You</p>
                                </div>
                                <div class="col">
                                    <img src="Images/Hi.svg" />
                                </div>
                            </div>
                            <div class="row my-5">
                                <div class="col">
                                    <img src="Images/users/{{ $img[0]->userImage }}" class="profile_image" alt="">
                                </div>
                                <div class="col">
                                    <h5>{{ $fullname[0]->fullname }}</h5>
                                </div>
                            </div>
                            @for ($i = 0; $i < $enrolled; $i++)
                                @php
                                    $Cimg = Courses::SELECT('coverpic')
                                        ->WHERE('course_ID', $courseID[$i]->course_id)
                                        ->get();
                                    
                                    $Cname = Courses::SELECT('coursename')
                                        ->WHERE('course_ID', $courseID[$i]->course_id)
                                        ->get();
                                @endphp
                                <!-- Session -->
                                <div style="margin: 2em 0em"></div>

                                <div class="row">
                                    <div class="col">
                                        <img src="Images/{{ $Cimg[0]->coverpic }}" width="50%" />
                                    </div>
                                    <div class="col">
                                        <p>{{ $Cname[0]->coursename }}</p>
                                        <button class="btn btnSecond btn-sm btnFont">continue</button>
                                    </div>
                                    
                                </div>
                            @endfor
                        </div>
                        <div class="col my-auto">
    
                            <div class="card" style="margin:0em 5em; padding-bottom:1em;">
                                <h3 class="text-center">{{ $enrolled }}</h3>
                                <p class="text-center">Total Courses Enrolled</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script type='text/javascript' src="{{ asset('Js/sidebar.js') }}"></script>
    <script type='text/javascript' src="{{ asset('Js/calender.js') }}"></script>
</body>

</html>
