<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Dashboard - Course Details</title>

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

    <link href='{{ asset('css/DashboardGlobal.css') }}' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/Global (Typography).css') }}" />
    <link rel="stylesheet" href="{{ asset('css/FindCourse.css') }}" />
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
                    <img src="{{ asset('Images/logo.png') }}" id="logo" />
                </div>
                <div class="col my-auto text-end">
                    <a href="logout" id="logout"><button type="button" class="btn btnPrimary btn-lg btnFont">
                            Logout
                        </button></a>
                </div>
            </div>
            <!--  Balance Amount  -->
            <p class="text-end"><b>Balance</b>: Rs <span>{{ $amount[0]->wallet }}</span></p>
            {{-- @php
                $title = 'new';
            @endphp --}}
            <h4></h4>
            <h5 class="text-center" style="color: #1b1c1e;">{!! Session::has('title') ? Session::get('title') : '' !!}</h5>
        </header>
        <div class="row">
            <div class="col-xl-2 col-md-3">
                <div class="sideBar">
                    <div class="profile_info text-center">
                        <img src="{{ asset('Images/users/' . $img[0]->userImage) }}" class="profile_image" alt="">
                        <h4>{{ $fullname[0]->fullname }}</h4>
                        <p> {{ Str::upper($status[0]->status) }}
                        <p>
                            <a href="javascript:void(0);" class="icon hide" onclick="side()">

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
                        <a class="active" href="{{ url('DashCourses') }}"><i
                                class="fas fa-th"></i><span>Find
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

                        <a href="{{ url('profile/' . Session::get('user')['username']) }}"><i
                                class="fas fa-gear"></i><span>Profile</span></a>
                    </div>
                </div>
            </div>
            <!--sidebar end-->
            @php
                // use App\Models\Users;
                use App\Models\St_Enrolled_Courses;
                use App\Models\CourseRatings;
                
                $fullname = Users::SELECT('fullname')
                    ->WHERE('username', $CourseDetails[0]->tutorname)
                    ->get();
                
                $St_enroll = St_Enrolled_Courses::SELECT('st_username')
                    ->WHERE('course_id', $CourseDetails[0]->course_ID)
                    ->get();
                $enrolled = count($St_enroll);
                
                $rating = CourseRatings::SELECT('ratings')
                    ->WHERE('course_id', $CourseDetails[0]->course_ID)
                    ->get();
            @endphp
            <div class="col">
                <div class="DashContainer">
                    <div class="row">
                        <div class="col-xl col-lg-12">
                            <a class="d-block" href="{{ url('DashCourses') }}"><img
                                    src="{{ asset('Images/Goback.svg') }}" /></a>
                            <h3 style="padding-top:2em">{{ $CourseDetails[0]->coursename }}</h3>
                            <div style="flaot:left; margin:1em 0em;">
                                <h5>Rating</h5>
                                @if (!$rating->isEmpty())
                                    @php
                                        $FS = $rating[0]->ratings;
                                        $NF = 5 - $FS;
                                    @endphp
                                    @for ($i = 0; $i < $FS; $i++)
                                        <img class="star" src="{{ asset('Images/Full Star.svg') }}" />
                                    @endfor
                                    @for ($i = 0; $i < $NF; $i++)
                                        <img class="star" src="{{ asset('Images/outline star.svg') }}" />
                                    @endfor
                                @else
                                    <h5>N/A</h5>
                                @endif

                            </div>
                            <h5 class="py-3" style="color:#1b1c1e;">{{ $fullname[0]->fullname }}
                                <span style="color:#F6A2BC;">||</span>
                                <p class="d-inline">{{ $enrolled }} Student(s) Enrolled</p>
                            </h5>
                            <h4 style="padding-top:1em">Description</h4>
                            <p style="text-align: justify;">{{ $CourseDetails[0]->desc }}</p>
                        </div>

                        <div class="col-xl col-lg-12 py-4">
                            <img src="{{ asset('Images/' . $CourseDetails[0]->coverpic) }}"
                                class="Cimg mx-auto d-block" />
                            <div class="card">
                                <h4 class="text-center">Rs <span id="price">{{ $CourseDetails[0]->price }}</span>
                                </h4>
                                <hr>
                                <div><b>Instructor</b>
                                    <span style="float: right;">{{ $fullname[0]->fullname }}</span>
                                </div>
                                <hr>
                                <div><b>Duration</b>
                                    <span style="float: right;"
                                        id="duration">{{ $CourseDetails[0]->duration }}</span>
                                </div>
                                <hr>
                                <div><b>Lectures</b>
                                    <span style="float: right;">{{ $CourseDetails[0]->lectures }}</span>
                                </div>
                                <hr>
                                <div><b>Language</b>
                                    <span style="float: right;">English</span>
                                </div>
                                <span class="text-center"><button type="button" class="btn btnPrimary btn-lg btnFont"
                                        style="margin-top:3em;" data-toggle="modal" data-target="#exampleModalCenter"
                                        onclick="course()">Enroll Course</button></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Model  -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle" style="color:#095256;">
                        Confirm Order
                    </h4>
                </div>
                <div class="modal-body">
                    <div><b>Instructor</b>
                        <span style="float: right;">{{ $CourseDetails[0]->coursename }}</span>
                    </div>
                    <hr>
                    <div><b>Duration</b>
                        <span style="float: right;" id="selectedDuration"></span>
                    </div>
                    <hr>
                    <div><b>Price</b>
                        <span style="float: right;" id="selectedPrice"></span>
                    </div>
                    <hr>
                    <div><b>Language</b>
                        <span style="float: right;">English</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnSecond" data-dismiss="modal">Close</button>
                    <form
                        action="{{ asset('BookCourse/' . $CourseDetails[0]->tutorname . '/' . Session::get('user')['username']) . '/' . $CourseDetails[0]->price . '/' . $CourseDetails[0]->course_ID }}"
                        method="post">
                        @CSRF
                        <button type="submit" class="btn btnPrimary">Enroll</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script type='text/javascript' src="{{ asset('Js/sidebar.js') }}"></script>
    <script type='text/javascript' src="{{ asset('Js/model.js') }}"></script>
</body>

</html>
