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