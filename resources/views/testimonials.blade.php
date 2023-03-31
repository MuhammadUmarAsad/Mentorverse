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
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/Global (Typography).css" />

    <!-- Link CSS here-->
    <link rel="stylesheet" href="css/Home.css" />
    <link rel="stylesheet" href="css/testimonial.css" />

    <title>Testimonials</title>
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
            <li><a href="Find Tutor" class="label">Find Tutor</a></li>
            <li><a href="FindCourse" class="label">Find Course</a></li>
            <li><a href="BecomeTutor" class="label">Become Tutor</a></li>
            <li>
                <div class="dropdown">
                    <a style="cursor: pointer;" class="active">Support
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <div class="dropdown-content">
                        <a href="faqs" class="dropDownA">FAQs</a>
                        <a href="testimonials" class="active dropDownA">Testimonials</a>
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

    <div class="OurContainer top" >
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item label">
                    <a href="Home" style="color: #f6a2bc">Home</a>
                </li>
                <li class="breadcrumb-item active label" aria-current="page" style="color: #f6a2bc">
                    User Testimonials
                </li>
            </ol>
        </nav>

        <h1>Testimonials</h1>
    </div>
    @php
        use App\Models\Users;
    @endphp
    <div class="whiteBg">
        <div class="OurContainer">
            <section class="OurContainer Testimonials-Section">
                <h2 class="TextCenter">Customer Know The Best</h2>
                <div class="row Testimonial-cards">
                    @for ($j = 0; $j < count($testimonial); $j++)
                        @php
                            $img = Users::SELECT('userImage')
                                ->WHERE('username', $testimonial[$j]->username)
                                ->get();
                            $fullName = Users::SELECT('fullname')
                                ->WHERE('username', $testimonial[$j]->username)
                                ->get();
                        @endphp
                        <div class="col-xxl-5 col-xl-5 col-md-5 col-12 reviewCard FirstRC mx-auto d-block">
                            <img class="dp" src="Images/users/{{ $img[0]->userImage }}" />
                            <h4 class="TextCenter">{{ $fullName[0]->fullname }}</h4>
                            <img class="quote" src="Images/Quote Left.svg" />
                            <p class="TextCenter">
                                {{ $testimonial[$j]->content }}
                            </p>
                            @php
                                $FS = $testimonial[$j]->ratings;
                                $NF = 5 - $FS;
                            @endphp
                            @for ($i = 0; $i < $NF; $i++)
                                <img class="star end" src="Images/outline star.svg" />
                            @endfor
                            @for ($i = 0; $i < $FS; $i++)
                                <img class="star end" src="Images/Full Star.svg" />
                            @endfor
                        </div>
                    @endfor

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
