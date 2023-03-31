<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Admin Dashboard</title>

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

    <link rel="stylesheet" href="{{ asset('css/Global (Typography).css') }}" />
    <link href='{{ asset('css/DashboardGlobal.css') }}' rel='stylesheet'>
    <link rel="stylesheet" href='{{ asset('css/ContactsLoginSignup.css') }}' />
</head>

<body class='snippet-body'>
    {{-- <input type="checkbox" id="check"> --}}
    <!--header area start-->
    <div class="main">
        <header>
            <div class="row">
                <div class="col my-auto">
                    {{-- <label for="check">
                    <i class="fas fa-bars" id="sidebar_btn"></i>
                </label> --}}
                    <img src=" {{ asset('Images/logo.png') }}" id="logo" />
                </div>
                <div class="col my-auto text-end">
                    <a href=" {{ url('/logout') }}" id="logout"><button type="button"
                            class="btn btnPrimary btn-lg btnFont">
                            Logout
                        </button></a>
                </div>
            </div>
        </header>


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
        @endphp

        <div class="row">
            <div class="col-xl-2 col-md-3">
                <div class="sideBar">
                    <div class="profile_info text-center">
                        <img src="{{ asset('Images/users/' . $img[0]->userImage) }}" class="profile_image" alt="">
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
                        <a href=".."><i class="fas fa-envelope"></i><span>Mails</span></a>
                        <a href="faqs"><i class="fas fa-question"></i><span>Add FAQs</span></a>
                        <a class="active" href="about"><i class="fas fa-info"></i><span>Edit
                                About</span></a>
                        <a href="user"><i class="fas fa-user"></i><span>Edit Users</span></a>
                    </div>
                </div>
            </div>
            <!--sidebar end-->
            <div class="col">
                <div class="DashContainer">

                    <h3 style="color: #095256; text-align:center;margin: 1em 0em;">Edit About Us</h3>
                    <form class="contactright" style="padding-top:1rem; margin-top:1rem"
                        action="about/update/{{ $about[0]->ID }}" method="post" return="false"
                        enctype="multipart/form-data">
                        <div class="mb-0 mt-0">
                            <h5 style="text-align:center; color:#1b1c1e"> {{ $about[0]->Heading }} </h5>
                            <div class="input-group input-grp">
                                <input type="text" class="input" id="p1" required="" autocomplete="off"
                                    name="p1" value="{{ $about[0]->Paragraph }}" />
                                <label class="user-label">Paragraph</label>
                            </div>
                            @error('heading1')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @csrf
                        </div>
                        <button type="submit" class="btnPrimary btn btnFont btn-lg mx-auto d-block">Update</button>
                    </form>

                    <form class="contactright" style="padding-top:1rem; margin-top:1rem"
                        action="about/update/{{ $about[1]->ID }}" method="post" return="false"
                        enctype="multipart/form-data">
                        <div class="mb-0 mt-0">
                            <h5 style="text-align:center; color:#1b1c1e"> {{ $about[1]->Heading }} </h5>
                            <div class="input-group input-grp">
                                <input type="text" class="input" id="p2" required="" autocomplete="off"
                                    name="p2" value="{{ $about[1]->Paragraph }}" />
                                <label class="user-label">Paragraph</label>
                            </div>
                            @error('heading2')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @csrf
                        </div>
                        <button type="submit" class="btnPrimary btn btnFont btn-lg mx-auto d-block">Update</button>
                    </form>

                    <form class="contactright" style="padding-top:1rem; margin-top:1rem"
                        action="about/update/{{ $about[5]->ID }}" method="post" return="false"
                        enctype="multipart/form-data">
                        <div class="mb-0 mt-0">

                            <div class="row" style="display: flex; flex-direction: column;">
                                <div class="col-3 my-auto">
                                    <img src="{{ asset('Images/' . $about[5]->Image) }}">
                                </div>

                                <div class="col my-auto">
                                    <div class="input-group input-grp">
                                        <input type="text" class="input" id="p3" required="" autocomplete="off"
                                            name="p3" value="{{ $about[5]->Heading }}"
                                            style="padding-top:1rem; margin-bottom:1rem" />
                                        <label class="user-label">Name</label>
                                        <input type="file" class="input" autocomplete="off" id="image1"
                                            name="image1" />
                                    </div>
                                </div>
                                @error('p3')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @csrf
                                <div class="col-2 my-auto">
                                    <button type="submit"
                                        class="btnPrimary btn btnFont btn-lg mx-auto d-block">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form class="contactright" style="padding-top:1rem; margin-top:1rem"
                        action="about/update/{{ $about[6]->ID }}" method="post" return="false"
                        enctype="multipart/form-data">
                        <div class="mb-0 mt-0">

                            <div class="row" style="display: flex; flex-direction: column;">
                                <div class="col-3 my-auto">
                                    <img src="{{ asset('Images/' . $about[6]->Image) }}">
                                </div>

                                <div class="col my-auto">
                                    <div class="input-group input-grp">
                                        <input type="text" class="input" id="p4" required="" autocomplete="off"
                                            name="p4" value="{{ $about[6]->Heading }}"
                                            style="padding-top:1rem; margin-bottom:1rem" />
                                        <label class="user-label">Name</label>
                                        <input type="file" class="input" autocomplete="off" id="image2"
                                            name="image2" />
                                    </div>
                                </div>
                                @error('p4')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @csrf
                                <div class="col-2 my-auto">
                                    <button type="submit"
                                        class="btnPrimary btn btnFont btn-lg mx-auto d-block">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form class="contactright" style="padding-top:1rem; margin-top:1rem"
                        action="about/update/{{ $about[7]->ID }}" method="post" return="false"
                        enctype="multipart/form-data">
                        <div class="mb-0 mt-0">

                            <div class="row" style="display: flex; flex-direction: column;">
                                <div class="col-3 my-auto">
                                    <img src="{{ asset('Images/' . $about[7]->Image) }}">
                                </div>

                                <div class="col my-auto">
                                    <div class="input-group input-grp">
                                        <input type="text" class="input" id="p5" required="" autocomplete="off"
                                            name="p5" value="{{ $about[7]->Heading }}"
                                            style="padding-top:1rem; margin-bottom:1rem" />
                                        <label class="user-label">Name</label>
                                        <input type="file" class="input" autocomplete="off" id="image3"
                                            name="image3" />
                                    </div>
                                </div>
                                @error('p5')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @csrf
                                <div class="col-2 my-auto">
                                    <button type="submit"
                                        class="btnPrimary btn btnFont btn-lg mx-auto d-block">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <script type='text/javascript' src="{{ asset('Js/sidebar.js') }}"></script>
</body>

</html>
