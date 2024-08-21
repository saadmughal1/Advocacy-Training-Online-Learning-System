<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\AuthenticateAdmin;
use App\Http\Middleware\AuthenticateAdvisor;
use App\Http\Middleware\AuthenticateStudent;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name("home");


Route::prefix('admin')->middleware(AuthenticateAdmin::class)->group(function () {

    Route::view('/', 'admin.index')->name('admin.home');

    Route::view('/login', 'admin.login')->name('admin.login');
    Route::post('/login', [AdminController::class, "login"])->name("admin.login");
    Route::get('/logout', [AdminController::class, "logout"])->name("admin.logout");

    Route::view('/create-advisor-account', 'admin.create-advisor-account')->name('admin.create-advisor-account');
    Route::post('/create-advisor-account', [AdminController::class, "createAdvisorAccount"])->name("admin.create-advisor-account");
    Route::get('/view-advisors', [AdminController::class, "viewAdvisorAccounts"])->name("admin.view-advisors");
    Route::delete('/delete-advisor/{id}', [AdminController::class, "deleteAdvisor"])->name("admin.delete-advisor");
    Route::get('/edit-advisor-account/{id}', [AdminController::class, "editAdvisorAccount"])->name("admin.edit-advisor-account");
    Route::put('/edit-advisor-account/{id}', [AdminController::class, "saveEditAdvisorAccount"])->name("admin.edit-advisor-account");

    Route::view('/create-student-account', 'admin.create-student-account')->name('admin.create-student-account');
    Route::post('/create-student-account', [AdminController::class, "createStudentAccount"])->name("admin.create-student-account");
    Route::get('/view-students', [AdminController::class, "viewStudentAccounts"])->name("admin.view-students");
    Route::delete('/delete-student/{id}', [AdminController::class, "deleteStudent"])->name("admin.delete-student");
    Route::get('/edit-student-account/{id}', [AdminController::class, "editStudentAccount"])->name("admin.edit-student-account");
    Route::put('/edit-student-account/{id}', [AdminController::class, "saveEditStudentAccount"])->name("admin.edit-student-account");


    Route::view('/initiate-case', 'admin.initiate-case')->name('admin.initiate-case');
    Route::get('/display-cases', [AdminController::class, 'displayCases'])->name('admin.display-cases');



    Route::post('/initiate-family-law-case', [AdminController::class, "initiateFamilyLawCase"])->name("admin.initiate-family-law-case");
    Route::post('/initiate-early-bird-moot', [AdminController::class, "initiateEarlyBirdMoot"])->name("admin.initiate-early-bird-moot");



    Route::post('/get-cases-by-type', [AdminController::class, 'getCasesByType'])->name('admin.get-cases-by-type');
    Route::view('/assign-case', 'admin.assign-case')->name("admin.assign-case");

    Route::post('/get-advisors-by-case', [AdminController::class, 'getAdvisorsByCase'])->name('admin.get-advisors-by-case');
    Route::post('/get-students', [AdminController::class, 'getStudents'])->name('admin.get-students');

    Route::post('/assign-case', [AdminController::class, 'assignCase'])->name('admin.assign-case');

    Route::get('/advisor-caseload', [AdminController::class, "advisorCaseLoad"])->name("admin.advisor-caseload");
});



Route::prefix('advisor')->middleware(AuthenticateAdvisor::class)->group(function () {

    Route::view('/', 'advisor.index')->name('advisor.home');

    Route::view('/login', 'advisor.login')->name('advisor.login');
    Route::post('/login', [AdvisorController::class, "login"])->name("advisor.login");
    Route::get('/logout', [AdvisorController::class, "logout"])->name("advisor.logout");

    Route::get('/advisor-caseload', [AdvisorController::class, "advisorCaseLoad"])->name("advisor.advisor-caseload");

    Route::get('/view-students', [AdvisorController::class, 'displayStudents'])->name('advisor.view-students');
    Route::post('/assign-case', [AdvisorController::class, 'assignStudents'])->name('advisor.assign-case');

    Route::get('/student-caseload', [AdvisorController::class, "studentCaseLoad"])->name("advisor.student-caseload");

    Route::get('/students-in-case', [AdvisorController::class, 'getAssignedStudentsByCaseId'])->name('advisor.students-in-case');


    
    
    Route::get('/student-feedback', [AdvisorController::class, 'getStudentCaseFeedback'])->name('advisor.student-feedback');

    Route::get('/add-feedback-marks-family-law-case', [AdvisorController::class, 'addFeedbackMarksFamilyLawCase'])->name('advisor.add-feedback-marks-family-law-case');
    Route::get('/next-step-family-law', [AdvisorController::class, 'nextStepFamilyLaw'])->name('advisor.next-step-family-law');

    
    
    // Route::get('/family-law-steps-list', [AdvisorController::class, "getStudentCurrentStep"])->name('advisor.family-law-steps-list');
    // Route::view('/early-bird-moot-steps-list', 'advisor.early-bird-moot-steps-list')->name('advisor.early-bird-moot-steps-list');
    // Route::get('/test', [AdvisorController::class, "getStudentCurrentStep"])->name('advisor.test');


});











Route::prefix('student')->middleware(AuthenticateStudent::class)->group(function () {

    Route::view('/', 'student.index')->name('student.home');

    Route::view('/login', 'student.login')->name('student.login');
    Route::post('/login', [StudentController::class, "login"])->name("student.login");
    Route::get('/logout', [StudentController::class, "logout"])->name("student.logout");

    Route::get('/my-caseload', [StudentController::class, 'displayMyCases'])->name('student.my-caseload');
    Route::get('/start-case', [StudentController::class, 'startCase'])->name('student.start-case');

    // Family Law
    Route::get('/family-law-step-1', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-1');
    Route::get('/family-law-step-2', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-2');
    Route::get('/family-law-step-3', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-3');
    Route::get('/family-law-step-4', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-4');
    Route::get('/family-law-step-5', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-5');
    Route::get('/family-law-step-6', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-6');
    Route::get('/family-law-step-7', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-7');
    Route::get('/family-law-step-8', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-8');
    Route::get('/family-law-step-9', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-9');
    Route::get('/family-law-step-10', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-10');
    Route::get('/family-law-step-11', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-11');
    Route::get('/family-law-step-12', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-12');
    Route::get('/family-law-step-13', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-13');
    Route::get('/family-law-step-14', [StudentController::class, 'familyLawStepsPreDetail'])->name('student.family-law-step-14');


    

    Route::post('/insert-family-law-step-1', [StudentController::class, 'insertOrUpdateFamilyLawStep1'])->name('student.insert-family-law-step-1');
    Route::post('/insert-family-law-step-2', [StudentController::class, 'insertOrUpdateFamilyLawStep2'])->name('student.insert-family-law-step-2');
    Route::post('/insert-family-law-step-3', [StudentController::class, 'insertOrUpdateFamilyLawStep3'])->name('student.insert-family-law-step-3');
    Route::post('/insert-family-law-step-4', [StudentController::class, 'insertOrUpdateFamilyLawStep4'])->name('student.insert-family-law-step-4');














    // Early Bird Moot
    Route::get('/early-bird-moot-step-1', function () {
        return view('student.early-bird-moot-step-1');
    })->name('student.early-bird-moot-step-1');

    Route::get('/early-bird-moot-step-2', function () {
        return view('student.early-bird-moot-step-2');
    })->name('student.early-bird-moot-step-2');
});
