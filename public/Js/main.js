class MyFooter extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <div class="container-fluid myT">
          <footer
            class="text-center text-lg-start text-white"
            style="background-color: #095256">
            <div class="container-fluid p-4 pb-0">
              <section class="">
                <div class="row">
                  <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">
                      Mentorverse
                    </h5>
                    <p style="color: white">
                    Mentorverse is a platform for online coaching, where students come together not only to find someone who can tutor them and help with the concepts they're stuck on but also to sign up as a tutor themselves! 
                    </p>
                  </div>
  
                  <hr class="w-100 clearfix d-md-none" />

                  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Courses</h6>
                    <p>
                      <a class="text-white">Computer Science</a>
                    </p>
                    <p>
                      <a class="text-white">Electrical Engineering</a>
                    </p>
                    <p>
                      <a class="text-white">Mechanical Engineering</a>
                    </p>
                    <p>
                      <a class="text-white">Software Engineering</a>
                    </p>
                  </div>
  
                  <hr class="w-100 clearfix d-md-none" />
  
                  <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">
                      Useful links
                    </h6>
                    <p>
                      <a class="text-white">Your Account</a>
                    </p>
                    <p>
                      <a class="text-white">Build a Resume</a>
                    </p>
                    <p>
                      <a class="text-white">FAQs</a>
                    </p>
                    <p>
                      <a class="text-white">Help</a>
                    </p>
                  </div>

                  <hr class="w-100 clearfix d-md-none" />

                  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                    <p><i class="fa fa-home mr-3"></i> Pakistan</p>
                    <p><i class="fa fa-envelope mr-3"></i> Mentorverse@gmail.com</p>
                    <p><i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p><i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
                  </div>

                </div>

              </section>
              <!-- Section: Links -->
  
              <hr class="my-3" />
  
              <!-- Section: Copyright -->
              <section class="p-3 pt-0">
                <div class="row d-flex align-items-center">
                  <!-- Grid column -->
                  <div class="col-md-7 col-lg-8 text-center text-md-start">
                    <!-- Copyright -->
                    <div class="p-3">
                      © 2022 Copyright:
                      <a class="text-white" href="https://mdbootstrap.com/"
                        >Mentorverse.com</a
                      >
                    </div>
                    <!-- Copyright -->
                  </div>
                  <!-- Grid column -->
  
                  <!-- Grid column -->
                  <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                    <!-- Facebook -->
                    <a
                      class="btn btn-outline-light btn-floating m-1"
                      class="text-white"
                      role="button"
                      ><i class="fa fa-facebook-f"></i
                    ></a>
  
                    <!-- Twitter -->
                    <a
                      class="btn btn-outline-light btn-floating m-1"
                      class="text-white"
                      role="button"
                      ><i class="fa fa-twitter"></i
                    ></a>
  
                    <!-- Google -->
                    <a
                      class="btn btn-outline-light btn-floating m-1"
                      class="text-white"
                      role="button"
                      ><i class="fa fa-google"></i
                    ></a>
  
                    <!-- Instagram -->
                    <a
                      class="btn btn-outline-light btn-floating m-1"
                      class="text-white"
                      role="button"
                      ><i class="fa fa-instagram"></i
                    ></a>
                  </div>
                  <!-- Grid column -->
                </div>
              </section>
              <!-- Section: Copyright -->
            </div>
            <!-- Grid container -->
          </footer>
          <!-- Footer -->
        </div>
        <!-- End of .container -->
        `
    }
}

customElements.define('my-footer', MyFooter)