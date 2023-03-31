<?php

use Illuminate\Support\Facades\Route;
use App\Models\Users;
use App\Models\Contact;
use App\Models\ContactDetails;
use App\Http\Controllers\Register_Login_Controller;
use App\Http\Controllers\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FindTutorController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\FindATutor;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BecomeTutor;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookSession;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [HomeController::class,'view'])->middleware('customAuth');
Route::get('/Home', [HomeController::class,'view'])->middleware('customAuth');

Route::get('/testimonials', [HomeController::class,'Testimonial'])->middleware('customAuth');

Route::get('/About', [AboutController::class,'view'])->middleware('customAuth');

Route::get('/Find Tutor', [FindTutorController::class,'view'])->middleware('customAuth');
Route::get('/FindCourse', [CoursesController::class,'view'])->middleware('customAuth');

Route::get('/faqs', [FaqController::class,'view'])->middleware('customAuth');

Route::get('/contact', [ContactController::class,'view'])->middleware('customAuth');
Route::post('/contact', [ContactController::class,'ContactInfo']);

Route::get('/contactThanks', function () {
    return view('contactThanks');
});



// Register and Login
Route::get('/login', function () {
    return view('login');
})->middleware('customAuth');

Route::get('/register', function () {
    $title = "";
    $data = compact('title');
    return view('register')->with($data);
})->middleware('customAuth');

Route::post('registerUser',[Register_Login_Controller::class,'registerUser']);
Route::post('loginUser',[Register_Login_Controller::class,'login']);


// Test
Route::get('/user',function(){
    $users = Users::all();
    echo "<pre>";
    print_r($users->toArray());
});



//protected -- user can't access it without login



Route::get('/no-access', function()
{
     echo "You are not allowed to access the page";
     echo "<br>";
     echo "<a href='\'> Go to Home Page </a>";
     die;
});



Route::get('/logout',function(){
    session()->forget('user');
    return redirect('/');
});

Route::get('DashSessions/logout',function(){
    session()->forget('user');
    return redirect('/');
});

Route::get('/DashTutors', [FindTutorController::class,'DashView'])->middleware('customAuth');
Route::get('/DashTutorsDetails/{name}', [FindTutorController::class,'TutorDetails'])->middleware('customAuth');
Route::get('/singleTutor/{name}', [FindTutorController::class,'singleTutor'])->middleware('customAuth');
// Route::get('/DashTutorsDetails/{name}',function($name){
//     return view('IndividualTutorD');
//     });

Route::get('/uploadCourse', [FindTutorController::class,'uploadCourse'])->middleware('customAuth');


Route::get('/DashCourses', [CoursesController::class,'DashView'])->middleware('customAuth');
Route::get('/DashCourseDetails/{id}', [CoursesController::class,'CourseDetails'])->middleware('customAuth');
Route::get('/singleCourse/{id}', [CoursesController::class,'singleCourse'])->middleware('customAuth');

Route::get('/DashSessions/{name}',function(){
    return view('UpSession');
    });

Route::get('/TutorDashboard',function(){
        return view('Tutor-Dash-Home');
        })->middleware('customAuth');
Route::get('/StudentDashboard',function(){
            return view('St-Dash-Home');
            })->middleware('customAuth');



//Live search
Route::get('/FindATutor', [FindATutor::class, 'index'])->middleware('customAuth');
// Route::get('/FindATutor/action', [FindATutor::class, 'action']);


Route::get('/AdminDashboard', [AdminController::class,'Mailview'])->middleware('customAuth');

Route::get('/AdminDashboard/user', [AdminController::class,'Userview'])->middleware('customAuth');
Route::get('/AdminDashboard/faqs', [AdminController::class,'faqview'])->middleware('customAuth');
Route::post('/AdminDashboard/faqs/insert', [AdminController::class,'faqInsert']);

Route::get('/AdminDashboard/faqs/delete/{id}', [AdminController::class,'faqDelete']);

Route::get('/AdminDashboard/about', [AdminController::class,'AboutView']);

Route::post('/AdminDashboard/about/update/{id}', [AdminController::class,'AboutUpdate']);


Route::get('/BecomeTutor', function () {
    $title = "You need to register first as a student";
    $data = compact('title');
    return view('register')->with($data);
});

Route::post('/BecomeTutor/{name}', [BecomeTutor::class,'update']);
Route::get('/BecomeTutor/{name}', function(){
    return view('BecomeATutor');
});

Route::get('/profile/{name}', function()
{
    return view('Profile-Dash');
});

Route::get('/course', function(){
    return view('pdf');
});

Route::post('/profile/update/{name}', [ProfileController::class,'ProfileUpdate']);

Route::post('/status/{name}/{st}', [AdminController::class,'store']);
Route::get('/status/{name}/{st}',[AdminController::class,'Cstatus']);

Route::post('/BookSession/{Tname}/{Sname}',[BookSession::class,'session']);
Route::post('/BookCourse/{Tname}/{Sname}/{price}/{Cid}',[BookSession::class,'Course']);