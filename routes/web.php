<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ListCoursesController;
use App\Http\Controllers\ModuleCoursesController;
use App\Http\Controllers\OdersController;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\ClassesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\roleeducationController;
use App\Http\Controllers\RolecourseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\OderdetailController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\filemanagerController;
// use App\Http\Controllers\ckeditorController;
###############################################



Route::middleware(['Authcheck','tokencheck','Admincheck'])->group(function () {
    Route::get('/createdroleuser', [UserController::class, 'addRole'])->name('addRole');
    Route::delete('/removeroleuser', [UserController::class, 'deleteRole'])->name('deleteRole');
    Route::put('/updateroleuser', [UserController::class, 'UpdateRole'])->name('UpdateRole');
    Route::get('/selectuser', [UserController::class, 'select_roles'])->name('select_roles');
    Route::put('/updateuser', [UserController::class, 'Updateusers'])->name('Updateusers');
    Route::delete('/deleteuser', [UserController::class, 'deleteuser'])->name('deleteuser');
    
});


Route::middleware(['Authcheck','cookiecheck','role'])->group(function () {
    Route::get('/usercontrol', [UserController::class, 'role_user'])->name('role_user');
    Route::get('/courseupload', [CourseController::class, 'CourseUpload'])->name('course_upload');
    Route::get('/createduser', [UserController::class, 'createduserview'])->name('user_created');
    Route::get('/roleeducation', [roleeducationController::class, 'role_education'])->name('role_education');
    Route::get('/rolecourse', [RolecourseController::class, 'role_course_view'])->name('role_course_view');
    Route::get('/billcourse', [BillController::class, 'bill_view'])->name('bill_view');
    Route::get('/oderscourse', [OderdetailController::class, 'oders_view'])->name('oders_view');
    Route::get('/class', [CourseController::class, 'class_course'])->name('class_course');

});
Route::get('/file', [filemanagerController::class, 'file_view'])->name('file_view');
Route::group([
    'prefix' => 'courses',
    'middleware' => ['Authcheck','cookiecheck']
], function () {
    Route::get('/', [CoursesController::class, 'index'])
         ->name('courses.courses.index');
    Route::get('/create', [CoursesController::class, 'create'])
         ->name('courses.courses.create');
    Route::get('/show/{courses}',[CoursesController::class, 'show'])
         ->name('courses.courses.show');
    Route::get('/{courses}/edit',[CoursesController::class, 'edit'])
         ->name('courses.courses.edit');
    Route::post('/', [CoursesController::class, 'store'])
         ->name('courses.courses.store');
    Route::put('courses/{courses}', [CoursesController::class, 'update'])
         ->name('courses.courses.update');
    Route::delete('/courses/{courses}',[CoursesController::class, 'destroy'])
         ->name('courses.courses.destroy');
});

Route::group([
    'prefix' => 'list_courses',
    'middleware' => ['Authcheck','cookiecheck']
], function () {
    Route::get('/', [ListCoursesController::class, 'index'])
         ->name('list_courses.list_courses.index');
    Route::get('/create', [ListCoursesController::class, 'create'])
         ->name('list_courses.list_courses.create');
    Route::get('/show/{listCourses}',[ListCoursesController::class, 'show'])
         ->name('list_courses.list_courses.show');
    Route::get('/{listCourses}/edit',[ListCoursesController::class, 'edit'])
         ->name('list_courses.list_courses.edit');
    Route::post('/', [ListCoursesController::class, 'store'])
         ->name('list_courses.list_courses.store');
    Route::put('list_courses/{listCourses}', [ListCoursesController::class, 'update'])
         ->name('list_courses.list_courses.update');
    Route::delete('/list_courses/{listCourses}',[ListCoursesController::class, 'destroy'])
         ->name('list_courses.list_courses.destroy');
});

Route::group([
     'prefix' => 'module_courses',
     'middleware' => ['Authcheck','cookiecheck']
 ], function () {
     Route::get('/', [ModuleCoursesController::class, 'index'])
          ->name('module_courses.module_courses.index');
     Route::get('/create', [ModuleCoursesController::class, 'create'])
          ->name('module_courses.module_courses.create');
     Route::get('/show/{moduleCourses}',[ModuleCoursesController::class, 'show'])
          ->name('module_courses.module_courses.show');
     Route::get('/{moduleCourses}/edit',[ModuleCoursesController::class, 'edit'])
          ->name('module_courses.module_courses.edit');
     Route::post('/', [ModuleCoursesController::class, 'store'])
          ->name('module_courses.module_courses.store');
     Route::put('module_courses/{moduleCourses}', [ModuleCoursesController::class, 'update'])
          ->name('module_courses.module_courses.update');
     Route::delete('/module_courses/{moduleCourses}',[ModuleCoursesController::class, 'destroy'])
          ->name('module_courses.module_courses.destroy');
 });


 Route::group([
     'prefix' => 'classes',
     'middleware' => ['Authcheck','cookiecheck']
 ], function () {
     Route::get('/', [ClassesController::class, 'index'])
          ->name('classes.classes.index');
     Route::get('/create', [ClassesController::class, 'create'])
          ->name('classes.classes.create');
     Route::get('/show/{classes}',[ClassesController::class, 'show'])
          ->name('classes.classes.show');
     Route::get('/{classes}/edit',[ClassesController::class, 'edit'])
          ->name('classes.classes.edit');
     Route::post('/', [ClassesController::class, 'store'])
          ->name('classes.classes.store');
     Route::put('classes/{classes}', [ClassesController::class, 'update'])
          ->name('classes.classes.update');
     Route::delete('/classes/{classes}',[ClassesController::class, 'destroy'])
          ->name('classes.classes.destroy');
 });

 Route::group([
     'prefix' => 'oders',
     'middleware' => ['Authcheck','cookiecheck']
 ], function () {
     Route::get('/', [OdersController::class, 'index'])
          ->name('oders.oders.index');
     Route::get('/create', [OdersController::class, 'create'])
          ->name('oders.oders.create');
     Route::get('/show/{oders}',[OdersController::class, 'show'])
          ->name('oders.oders.show');
     Route::get('/{oders}/edit',[OdersController::class, 'edit'])
          ->name('oders.oders.edit');
     Route::post('/', [OdersController::class, 'store'])
          ->name('oders.oders.store');
     Route::put('oders/{oders}', [OdersController::class, 'update'])
          ->name('oders.oders.update');
     Route::delete('/oders/{oders}',[OdersController::class, 'destroy'])
          ->name('oders.oders.destroy');
 });
 

 Route::group([
     'prefix' => 'bills',
     'middleware' => ['Authcheck','cookiecheck']
 ], function () {
     Route::get('/', [BillsController::class, 'index'])
          ->name('bills.bills.index');
     Route::get('/create', [BillsController::class, 'create'])
          ->name('bills.bills.create');
     Route::get('/show/{bills}',[BillsController::class, 'show'])
          ->name('bills.bills.show');
     Route::get('/{bills}/edit',[BillsController::class, 'edit'])
          ->name('bills.bills.edit');
     Route::post('/', [BillsController::class, 'store'])
          ->name('bills.bills.store');
     Route::put('bills/{bills}', [BillsController::class, 'update'])
          ->name('bills.bills.update');
     Route::delete('/bills/{bills}',[BillsController::class, 'destroy'])
          ->name('bills.bills.destroy');
 });
 


Route::middleware(['Authcheck','tokencheck','Admincheck'])->group(function () {
    Route::post('/insertuser', [UserController::class, 'insert_users'])->name('insert_users');
});


Route::middleware(['Authcheck','tokencheck','Admincheck'])->group(function () {
    Route::get('/createdroleeducation', [roleeducationController::class, 'addRoleeducation'])->name('addRoleeducation');
    Route::put('/updateroleeducation', [roleeducationController::class, 'UpdateRoleeducation'])->name('UpdateRoleeducation');
    Route::delete('/deleteroleeducation', [roleeducationController::class, 'deleteRoleeducation'])->name('deleteRoleeducation');
    
});


// Route::middleware(['Authcheck','tokencheck','Admincheck'])->group(function () {
//     Route::get('/createdcourse', [CourseController::class, 'insert_course'])->name('insert_course');
//     Route::put('/updatecourse', [CourseController::class, 'updatecourse'])->name('updatecourse');
//     Route::get('/selectcourse', [CourseController::class, 'Selectcourse'])->name('Selectcourse');
//     Route::delete('/deletecourse', [CourseController::class, 'deletecourse'])->name('deletecourse');
// });

Route::middleware(['Authcheck','tokencheck','Admincheck'])->group(function () {
    Route::post('/createdrolecourse', [RolecourseController::class, 'insert_role_course'])->name('insert_role_course');
    Route::put('/updaterolecourse', [RolecourseController::class, 'Update_role_course'])->name('Update_role_course');
    Route::delete('/deleterolecourse', [RolecourseController::class, 'delete_role_course'])->name('delete_role_course');
    Route::get('/createdmodulecourse', [CourseController::class, 'insert_module_course'])->name('insert_module_course');
    Route::get('/selectedmodulecourse', [CourseController::class, 'Select_module_course_course'])->name('Select_module_course_course');
    Route::delete('/deletemodulecourse', [CourseController::class, 'delete_module_course'])->name('delete_module_course');
    Route::get('/createdclasscourse', [CourseController::class, 'insert_class_course'])->name('insert_class_course');
    Route::put('/updateclasscourse', [CourseController::class, 'update_class_course'])->name('update_class_course');
    Route::delete('/deleteclasscourse', [CourseController::class, 'delete_class_course'])->name('delete_class_course');
    Route::get('/selectclasscourse', [CourseController::class, 'select_class_course'])->name('select_class_course');
    Route::get('/selectsingleclasscourse', [CourseController::class, 'select_single_class_course'])->name('select_single_class_course');
    Route::get('/selectsinglecourse', [CourseController::class, 'selectsinglecourse'])->name('selectsinglecourse');
});

// Route::middleware(['Authcheck','tokencheck','Admincheck'])->group(function () {
//     Route::post('/createdbills', [BillController::class, 'created_bill'])->name('created_bill');
//     Route::put('/updatedbills', [BillController::class, 'updated_bill'])->name('updated_bill');
//     Route::delete('/deletedbill', [BillController::class, 'delete_bill'])->name('delete_bill');
//     Route::get('/seletectbill', [BillController::class, 'seletect_bill'])->name('seletect_bill');
//     Route::get('/seletectbillsingle', [BillController::class, 'seletect_bill_single'])->name('seletect_bill_single');
// });

// Route::middleware(['Authcheck','tokencheck','Admincheck'])->group(function () {
//     Route::post('/createdoders', [OderdetailController::class, 'insert_oders'])->name('insert_oders');
//     Route::put('/updatedoders', [OderdetailController::class, 'updates_oders'])->name('updates_oders');
//     Route::delete('/deletedoders', [OderdetailController::class, 'delete_oders'])->name('delete_oders');
//     Route::get('/selectsdoders', [OderdetailController::class, 'select_oders'])->name('select_oders');
//     Route::get('/selectsingledoders', [OderdetailController::class, 'select_single_oders'])->name('select_single_oders');
// });

Route::get('/', [UserController::class, 'view_login_user'])->name('login');
Route::post('/loginadmin', [UserController::class, 'login_user']);
Route::post('/logoutadmin', [UserController::class, 'logout_user']);
Route::get('/selectroleeducation', [roleeducationController::class, 'select_role_education']);
Route::get('/selectrolecourse', [RolecourseController::class, 'select_role_course']);


###############################################
#              CILENT ROUTER                  #
#                                             #
###############################################
Route::get('/login', [UserController::class, 'login_client']);
Route::get('/refresh_token', [UserController::class, 'refresh_token']);
Route::get('/logout', [UserController::class, 'logout_client']);

