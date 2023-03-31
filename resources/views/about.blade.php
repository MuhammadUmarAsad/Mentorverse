<!--  STARTER  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

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

    <link rel="stylesheet" href="css/About.css" />
    <!-- Link CSS here-->

    <title>About</title>
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
            <li><a class="active" href="About" class="label">About</a></li>
            <li><a href="Find Tutor" class="label">Find Tutor</a></li>
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

    <!--start-->
    <div class="start" style="background-color: #095256">
        <div class="OurContainer">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item label">
                        <a href="Home" style="color: #f6a2bc">Home</a>
                    </li>
                    <li class="breadcrumb-item active label" aria-current="page" style="color: #f6a2bc">
                        About
                    </li>
                </ol>
            </nav>

            <h1>About Us</h1>
        </div>

        <div class="whiteBg">
            <!--  Top Video  -->
            <!-- <div class="OurContainer top"> -->
            <section class="OurContainer mx-auto d-block">
                <div class="row">
                    <div class="col-sm"></div>
                    <div class="col-sm vid">
                        <img src="Images/About vid.png" />
                    </div>
                </div>
            </section>
            <!-- </div> -->
            <!--  Welcome  -->
            <section class="OurContainer welcome">
                <div class="row">
                    <div class="col-md col-sm-12 order-2 order-md-1 my-auto">
                        <div id="QuoteImage" style="
                background-image: url('Images/{{ $about[0]->Image }}');
              ">
                            <h4>
                                Learning is the only thing the mind never exhausts, never fears,
                                and never regrets
                            </h4>
                        </div>
                    </div>
                    <div class="col-md col-sm-12 offset-md-1 order-1 order-md-2 my-auto">
                        <h5>#WELCOME</h5>
                        <h2>
                            {{ $about[0]->Heading }}
                        </h2>
                        <p>
                            {{ $about[0]->Paragraph }}
                        </p>
                        <a href="{{ url('Find Tutor') }}"><button type="button" class="btn btnPrimary btn-lg btnFont">
                                Start Exploring
                            </button></a>
                    </div>
                </div>
            </section>

            <!--  Our Story  -->
            <section class="OurContainer story">
                <div class="row">
                    <div class="col-lg col-sm-12 my-auto">
                        <h5>#HISTORY</h5>
                        <h2>{{ $about[1]->Heading }}</h2>
                        <p>
                            {{ $about[1]->Paragraph }}
                        </p>
                        <a href="{{ url('contact') }}"><button type="button" class="btn btnPrimary btn-lg btnFont">
                                Contact Us
                            </button></a>
                    </div>
                    <!--  Owners  -->
                    <div class="col-sm-10 col-lg col-md-8 my-md-auto offset-sm-2" id="owners">
                        <!--  1  -->
                        <div class="row">
                            <div class="col-lg col-sm col-xl offset-md order-lg-1 order-md-2">
                                <img src="Images/{{ $about[5]->Image }}" />
                            </div>
                            <div class="col-lg col-sm col-xxl col-xl my-auto order-lg-2 order-md-1`">
                                <h4 style="text-align: start">{{ $about[5]->Heading }}</h4>
                            </div>
                        </div>
                        <!--  2  -->
                        <div class="row">
                            <div class="col-lg col-sm col-xl offset-md my-auto order-lg-1 order-md-2">
                                <h4 style="text-align: end">{{ $about[6]->Heading }}</h4>
                            </div>
                            <div class="col-lg col-sm col-xl order-lg-2 order-md-1">
                                <img src="Images/{{ $about[6]->Image }}" />
                            </div>
                        </div>
                        <!--  3  -->
                        <div class="row">
                            <div class="col-lg col-sm col-xl offset-md order-lg-1 order-md-2">
                                <img src="Images/{{ $about[7]->Image }}" />
                            </div>
                            <div class="col-lg col-sm col-xl my-auto order-lg-2 order-md-1">
                                <h4 style="text-align: start">{{ $about[7]->Heading }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--  FeatuImages  -->
            <section class="OurContainer features">
                <div class="row">
                    <!-- 1  -->

                    <div class="col-xxl col-xl col-md reviewCard FirstRC f">
                        <img src="Images/{{ $about[2]->Image }}" class="mx-auto d-block" />
                        <h4 class="TextCenter">{{ $about[2]->Heading }}</h4>
                        <p>
                            {{ $about[2]->Paragraph }}
                        </p>
                    </div>
                    <!-- 2  -->
                    <div class="col-xxl col-xl col-md reviewCard FirstRC f">
                        <img src="Images/{{ $about[3]->Image }}" class="mx-auto d-block" />
                        <h4 class="TextCenter">{{ $about[3]->Heading }}</h4>
                        <p>
                            {{ $about[3]->Paragraph }}
                        </p>
                    </div>
                    <!-- 3  -->
                    <div class="col-xxl col-xl col-md reviewCard FirstRC f">
                        <img src="Images/{{ $about[4]->Image }}" class="mx-auto d-block" />
                        <h4 class="TextCenter">{{ $about[4]->Heading }}</h4>
                        <p>
                            {{ $about[4]->Paragraph }}
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <my-footer></my-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="Js/main.js"></script>
    <!-- Link JS Here-->
</body>

</html>
