<!--  STARTER  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
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

    <link rel="stylesheet" href="css/FindATutor.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <title>Find Tutor</title>


</head>



<body class="bg">
    <!-- Navigation -->
    <nav class="navigation">
        <div class="logo"><a href="Home"><img src="Images/logo.png" /></a></div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
            <i class="fa fa-bars" aria-hidden="true"></i>

        </label>
        <ul class="my-auto">
            <li><a class="label" href="Home">Home</a></li>
            <li><a href="About" class="label">About</a></li>
            <li><a class="active" href="Find Tutor" class="label">Find Tutor</a></li>
            <li><a href="FindCourse" class="label">Find Course</a></li>
            <li><a href="BecomeTutor" class="label">Become Tutor</a></li>
            <li>
                <div class="dropdown">
                    <a style="cursor: pointer;">Support
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <div class="dropdown-content">
                        {{-- <a href="#" class="dropDownA">Blog</a> --}}
                        <a href="faqs" class="dropDownA">FAQs</a>
                        <a href="testimonials" class="dropDownA">Testimonials</a>
                        <hr>
                        <a href="contact" class="dropDownA">Contact Us</a>
                    </div>
                </div>
            </li>
            <div class="verticalLine"></div>
            <li><img class="img1" src="Images/Signup.svg" /><a href="register"
                    class="btnFont">Signup</a>
            <li><img src="Images/Login.svg" /><a href="login" class="btnFont">Login</a>
        </ul>
    </nav>

    <!-- Start -->
    <div class="start" style="background-color: #095256">
        <div class="OurContainer">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item label">
                        <a href="Home" style="color: #f6a2bc">Home</a>
                    </li>
                    <li class="breadcrumb-item active label" aria-current="page" style="color: #f6a2bc">
                        Find Tutor
                    </li>
                </ol>
            </nav>

            <h1>Find A Tutor</h1>
        </div>

        <div class="whiteBg">
            <div class="OurContainer">
                <div class="row" style=" padding-top:4em">
                    <div class="col-8">
                        <a href="Find Tutor"><button class="btn btnPrimary btn-sm btnFont">
                                <span>
                                    <img src="Images/FT_Btn2.svg" />
                                </span>
                                <span id="RSmall">Tutors</span>
                            </button></a>
                        <a href="FindCourse"><button class="btn btnSecond btn-sm btnFont">
                                <span>
                                    <img src="Images/FT_Btn1.svg" />
                                </span>
                                <span id="RSmall">Courses</span>
                            </button></a>
                    </div>
                    @php
                        $len = count($findTutor);
                    @endphp
                    <div class="col-4">
                        <div class="input-group">
                            <input type="text" name="searchForm" class="form-control label" id="searchForm"
                                placeholder="Search Category" aria-label="Search Tutor"
                                aria-describedby="search_category" onkeyup="myFunction('{{ $len }}')" />
                            <button class="btn" type="button" id="search_category">
                                <img src="Images/search.svg" alt="search" id="SearchImgSmall" />
                            </button>
                        </div>

                    </div>
                </div>

                <h3 style="text-align: center; color:#095256; padding-top:2em" id="RHeadSmall">Online Tutors for
                    private
                    lessons</h3>
                @php
                    use App\Models\Users;
                    use App\Models\Categories;
                @endphp
                <div class="row" id="myUL">
                    <!-- First Row -->
                    @for ($i = 0; $i < count($findTutor); $i++)
                        @php
                            // Select Full name from user
                            $img = Users::SELECT('userImage')
                                ->WHERE('username', $findTutor[$i]->tutorusername)
                                ->get();
                            $fullName = Users::SELECT('fullname')
                                ->WHERE('username', $findTutor[$i]->tutorusername)
                                ->get();
                            
                            // Select Categories
                            $major = Categories::SELECT('cat_name')
                                ->WHERE('cat_ID', $findTutor[$i]->major)
                                ->get();
                            
                        @endphp
                        <div class="col-xl-6 col-md-12 col-sm-12" id="{{ $i }}">
                            <span class="li">
                                <div class="row TutorBorder">
                                    <!--here-->

                                    <div class="col-12 col-sm-5 my-auto text-center">
                                        <img src="Images/users/{{ $img[0]->userImage }}" class="TutorImage" />
                                    </div>
                                    <div class="col-12 col-sm-7 cen">
                                        <br />
                                        <a href="singleTutor/{{ $findTutor[$i]->tutorusername }}"
                                            class="click">
                                            <h4>{{ $fullName[0]->fullname }}</h4>
                                        </a>
                                        <h5 class="SingleCard">{{ $major[0]->cat_name }}</h5>
                                        <p>{{ $findTutor[$i]->institute }}</p>
                                        <span class="label" style="color: #f6a2bc">Rating: 5 stars</span>
                                    </div>
                                </div>
                            </span>
                        </div>
                    @endfor

                    <!-- Row End -->
                </div>


            </div>
        </div>
        <my-footer></my-footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <script src="Js/main.js"></script>
        <script src="Js/search.js"></script>
        <!-- Link JS Here-->
</body>

</html>
