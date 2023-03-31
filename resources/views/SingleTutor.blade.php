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
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href='{{ asset('css/DashboardGlobal.css') }}' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/Global (Typography).css') }}" />
    <script src=" {{ asset('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}"></script>
</head>

<body class='snippet-body'>
    <div style="background-color: #095256 ; margin:2em;" class="my-4 main">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item label">
                    <a href="{{ asset('Home') }}" style="color: #F6A2BC">Home</a>
                </li>
                <li class="breadcrumb-item active label">
                    <a href="{{ url('Find Tutor') }}" style="color: #F6A2BC">Find Tutor</a>
                </li>
                <li class="breadcrumb-item active label" aria-current="page" style="color:white">
                    Tutor Detail
                </li>
            </ol>
        </nav>
    </div>
    <div class="main" style="margin:2em;">

        @php
            use App\Models\Users;
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
        {{-- <div class="col"> --}}
        <div class="DashContainer">

            <div class="row">
                <div class="col-xl col-lg-12">
                    <a class="d-block my-5" href="{{ url('Find Tutor') }}"><img
                            src="{{ asset('Images/Goback.svg') }}" /> <span
                            style="text-decoraion:none; color:#095256;">Go Back</span></a>

                    <h3 style="padding-top:1em">{{ $maj[0]->cat_name }}</h3>
                    <div style="flaot:left; margin:1em 0em;">
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
                            <span id="RSmall">Detail </span>
                        </button>
                        <button class="btn btnSecond btn-sm btnFont R"
                            onClick="getMessage('{{ $TutorDetails[0]->tutorusername }}')">

                            <span id="RSmall">Reviews</span>
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
                    <img src="{{ asset('Images/users/' . $img[0]->userImage) }}" class="Timg mx-auto d-block" />
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
                        <a href="{{ asset('login') }}" class="mx-auto d-block"><button
                                class="btn btnPrimary btn-lg btnFont" style="margin-top:3em;">Book a
                                Session</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script type='text/javascript' src="{{ asset('Js/sidebar.js') }}"></script>
    <script type='text/javascript' src="{{ asset('Js/package.js') }}"></script>

</body>

</html>
