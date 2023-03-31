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

    <link rel="stylesheet" href="css/Global (Typography).css" />
    <link rel="stylesheet" href="css/ContactsLoginSignup.css" />
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Contact Us</title>
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



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
                        Support
                    </li>
                    <li class="breadcrumb-item active label" aria-current="page" style="color: #f6a2bc">
                        Contact Us
                    </li>
                </ol>
            </nav>

            <h1>Contact Us</h1>
        </div>

        <div class="whiteBg">
            <div class="OurContainer">
                <!-- Contact Us -->
                <div class="row">
                    <div class="col-lg-6 col-md-12 TopPartHide">
                        <div class="contactleft ContactLeftpadding">
                            <div class="Contactdetails rowpadding">

                                <div class="row">
                                    <div class=" col-md-5 offset-md-1 col-xl-3 col-lg-4 ">
                                        <img src="Images/ContactPhone.png" />
                                    </div>
                                    <div class=" col-md col-xl col-lg ">
                                        <h4>Phone No.</h4>
                                        {{ $contactDet[0]->phone_no }}
                                    </div>
                                </div>

                                <hr />

                                <div class="row">
                                    <div class="col-md-5 offset-md-1 col-xl-3 col-lg-4">
                                        <img src="Images/ContactEmail.png" />
                                    </div>
                                    <div class="col-md col-xl col-lg">
                                        <h4>Email</h4>
                                        {{ $contactDet[0]->email }}
                                    </div>
                                </div>

                                <hr />

                                <div class="row">
                                    <div class=" col-md-5 offset-md-1 col-xl-3 col-lg-4">
                                        <img src="Images/ContactAddr.png" />
                                    </div>
                                    <div class="col-md col-xl col-lg">
                                        <h4>Address</h4>
                                        {{ $contactDet[0]->address }}
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-lg-6">
                        <form class="contactright" action="contact" method="post">
                            @csrf
                            <h3>Get in Touch With Us</h3>
                            <div class="mb-4 mt-4">

                                <div class="input-group input-grp">
                                    <input type="text" class="input" id="name" required="" autocomplete="off"
                                        name="name" />
                                    <label class="user-label">Name</label>
                                </div>
                            </div>

                            <div class="mb-4">

                                <div class="input-group input-grp">
                                    <input type="email" class="input" id="email" required="" autocomplete="off"
                                        name="email" />
                                    <label class="user-label">Email </label>
                                </div>
                            </div>

                            <div class="mb-4">

                                <div class="input-group input-grp">
                                    <input type="text" class="input" id="subject" required=""
                                        autocomplete="off" name="subject" />
                                    <label class="user-label">Subject</label>
                                </div>
                            </div>

                            <div class="mb-4">

                                <div class="input-group input-grp">
                                    <input id="comment" name="comment" class="input" required=""
                                        autocomplete="off" style="padding-bottom:5em"></input>
                                    <label class="user-label">Message</label>
                                </div>
                            </div>

                            <!-- <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              value=""
              id="flexCheckChecked"
            />
            <label class="form-check-label" for="flexCheckChecked">
              I agree with
              <a href="">Term of Use</a>
              <br />and
              <a href=""> Privacy Policy.</a>
            </label>
          </div> -->

                            <br />
                            <button name="ContactSubmit" type="submit"
                                class="btn btnPrimary btn-lg btnFont buttonLoginSignup">Send Message </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <my-footer></my-footer>
    <script src="Js/main.js"></script>
</body>

</html>
