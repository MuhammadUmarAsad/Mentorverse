<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Tutors Details</title>

    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Playfair+Display+SC:wght@400;700;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="{{ asset('https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href='{{ asset('css/DashboardGlobal.css') }}' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/Global (Typography).css') }}" />
    <link rel="stylesheet" href='{{ asset('css/ContactsLoginSignup.css') }}' />
    <script src=" {{ asset('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('Js/sidebar.js') }}"></script>
    <script type='text/javascript' src="{{ asset('Js/package.js') }}"></script>
    <script type='text/javascript' src="{{ asset('Js/model.js') }}"></script>
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
                        <a class="active" href="{{ url('DashTutors') }}"><i
                                class="fas fa-male"></i><span>Find a Tutor</span></a>
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

                        <a href="{{ url('profile/' . Session::get('user')['username']) }}"><i
                                class="fas fa-gear"></i><span>Profile</span></a>
                    </div>
                </div>
            </div>
            <!--sidebar end-->
            @php
                use App\Models\Categories;
                use App\Models\TutorRatings;
                use App\Models\Packages;
                
                $user = $TutorDetails[0]->tutorusername;
                $img = Users::SELECT('userImage')
                    ->WHERE('username', $TutorDetails[0]->tutorusername)
                    ->get();
                $fullname = Users::SELECT('fullname')
                    ->WHERE('username', $TutorDetails[0]->tutorusername)
                    ->get();
                $maj = Categories::SELECT('cat_name')
                    ->WHERE('cat_ID', $TutorDetails[0]->major)
                    ->get();
                $rating = TutorRatings::SELECT('rating')
                    ->WHERE('tutor', $TutorDetails[0]->tutorusername)
                    ->get();
                $pkg = Packages::all();
            @endphp
            <div class="col">
                <div class="DashContainer">
                    @php
                        $title = '';
                    @endphp
                    <h2>{{ $title }}</h2>
                    <div class="row">
                        <div class="col-xl col-lg-12">
                            <a class="d-block" href="{{ url('DashTutors') }}"><img
                                    src="{{ asset('Images/Goback.svg') }}" /></a>

                            <h3 style="padding-top:2em">{{ $maj[0]->cat_name }}</h3>
                            <div style="float:left; margin:1em 0em;">
                                <h5>Rating</h5>
                                @if (!$rating->isEmpty())
                                    @php
                                        $FS = $rating[0]->rating;
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
                            <h5 class="py-3" style="color:#1b1c1e;">{{ $fullname[0]->fullname }} <span
                                    style="color:#F6A2BC;">||</span>
                                <p class="d-inline">{{ $TutorDetails[0]->institute }}</p>
                            </h5>

                            <div style="padding-top:2em">
                                <button class="btn btnPrimary btn-sm btnFont D" onClick="details()">
                                    <span>Detail </span>
                                </button>
                                <button class="btn btnSecond btn-sm btnFont R"
                                    onClick="getMessage('{{ $TutorDetails[0]->tutorusername }}')">

                                    <span>Reviews</span>
                                </button>
                            </div>
                            <div id="R" style="margin-bottom: 3em">

                            </div>
                            <div id="D">
                                <h4 style="padding-top:1em">Description</h4>
                                <p style="text-align: justify;">{{ $TutorDetails[0]->introduction }}</p>
                                {{-- <p id="msg2"></p> --}}
                                <h4 style="padding-top:1em">Expertise</h4>
                                <p style="text-align: justify;">{{ $TutorDetails[0]->expertise }}</p>
                            </div>
                        </div>

                        <div class="col-xl col-lg-12 py-4">
                            <img src="{{ asset('Images/users/' . $img[0]->userImage) }}"
                                class="Timg mx-auto d-block" />
                            <div class="card">
                                <h4 class="text-center">Rs <span id="price">-</span></h4>
                                <hr>
                                <div><b>Instructor</b>
                                    <span style="float: right;">{{ $fullname[0]->fullname }}</span>
                                </div>
                                <hr>
                                <div><b>Package</b>
                                    <div style="float:right">
                                        <select style="background-color:
                                        #F4F4F9; color:#095256" name="PK" id="package">
                                            <option onclick="pkg('1')">{{ $pkg[0]->duration }}
                                            </option>
                                            <option onclick="pkg('2')">{{ $pkg[1]->duration }}</option>
                                            <option onclick="pkg('3')">{{ $pkg[2]->duration }}</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div><b>Language</b>
                                    <span style="float: right;">English/Urdu</span>
                                </div>
                                <span class="text-center"><button type="button" class="btn btnPrimary btn-lg btnFont"
                                        style="margin-top:3em;" data-toggle="modal" data-target="#exampleModalCenter"
                                        onclick="mod()">Book a Session</button></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var res = "success";
    </script>
    @php
        $BS = '<script>
            document.writeln(res);
        </script>';
        echo $BS;
    @endphp
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
                <form class="contactright" style="padding-top:1rem; margin-top:1rem"
                    action="{{ asset('BookSession/' . $TutorDetails[0]->tutorusername . '/' . Session::get('user')['username']) }}"
                    method="post" return="false" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" class="input" id="SPusingForm" name="SPusingForm" value=""
                        style="padding-top:1rem; margin-bottom:1rem" />


                    <div class="modal-body">
                        <div><b>Instructor</b>
                            <span style="float: right;">{{ $fullname[0]->fullname }}</span>
                        </div>
                        <hr>
                        <div><b>Package</b>
                            <span style="float: right;" id="selectedPackage"></span>
                        </div>

                        <hr>
                        <div><b>Price</b>
                            <span style="float: right;" id="selectedPrice"></span>
                        </div>

                        <hr>
                        <div><b>Language</b>
                            <span style="float: right;">English/Urdu</span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnSecond" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btnPrimary">Book</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>

    
    <script>
        function toggleField(hideObj, showObj) {
            hideObj.disabled = true;
            hideObj.style.display = 'none';
            showObj.disabled = false;
            showObj.style.display = 'inline';
            showObj.focus();
        }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function getMessage(Tname) {
            $.ajax({

                type: 'POST',
                url: "/getmsg/" + Tname,
                data: '_token = <?php echo csrf_token(); ?>',
                success: function(data) {
                    var i = 0;
                    var d;
                    for (i = 0; i < data.count; i++) {
                        //console.log(data.msg);
                        $('#R').append(
                            '<img src="{{ asset('Images/Quote Left.svg') }}" class="quote Rv"/><div class="Rv" style="margin-bottom:1em;">' +
                            data.msg.findratings[i]
                            .content + '<div>');
                    }
                    $('#D').hide();
                    $('#R').show();
                    $('.R').toggleClass('btnSecond');
                    $('.R').toggleClass('btnPrimary');
                    $('.D').toggleClass('btnPrimary');
                    $('.D').toggleClass('btnSecond');
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        }

        function details() {
            $('.R').toggleClass('btnSecond');
            $('.R').toggleClass('btnPrimary');
            $('.D').toggleClass('btnPrimary');
            $('.D').toggleClass('btnSecond');
            $('#D').show();
            $('#R').hide();
            $('.Rv').hide();
        }
    </script>

</body>

</html>
