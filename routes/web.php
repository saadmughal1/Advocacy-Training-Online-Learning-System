<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});



Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name("admin.home");

    Route::get('/login', function () {
        return view('admin.login');
    })->name("admin.login");

    Route::get('/create-advisor-account', function () {
        return view('admin.create-advisor-account');
    })->name("admin.create-advisor-account");

    Route::get('/view-advisors', function () {
        return view('admin.view-advisors');
    })->name("admin.view-advisors");

    Route::get('/create-student-account', function () {
        return view('admin.create-student-account');
    })->name("admin.create-student-account");

    Route::get('/view-students', function () {
        return view('admin.view-students');
    })->name("admin.view-students");

    Route::get('/initiate-case', function () {
        return view('admin.initiate-case');
    })->name("admin.initiate-case");

    Route::get('/assign-case', function () {
        return view('admin.assign-case');
    })->name("admin.assign-case");
});

Route::prefix('advisor')->group(function () {

    Route::get('/', function () {
        return view('advisor.index');
    })->name("advisor.home");

    Route::get('/view-students', function () {
        return view('advisor.view-students');
    })->name("advisor.view-students");

    Route::get('/student-caseload', function () {
        return view('advisor.student-caseload');
    })->name("advisor.student-caseload");

    Route::get('/students-in-case', function () {
        return view('advisor.students-in-case');
    })->name("advisor.students-in-case");

    Route::get('/student-feedback', function () {
        return view('advisor.student-feedback');
    })->name("advisor.student-feedback");
});

Route::prefix('student')->group(function () {

    Route::get('/', function () {
        return view('student.index');
    })->name("student.home");


    Route::get('/family-law-step-1', function () {
        return view('student.family-law-step-1');
    })->name('student.family-law-step-1');

    Route::get('/family-law-step-2', function () {
        return view('student.family-law-step-2');
    })->name('student.family-law-step-2');

    Route::get('/family-law-step-3', function () {
        return view('student.family-law-step-3');
    })->name('student.family-law-step-3');

    Route::get('/family-law-step-4', function () {
        return view('student.family-law-step-4');
    })->name('student.family-law-step-4');

    Route::get('/family-law-step-5', function () {
        return view('student.family-law-step-5');
    })->name('student.family-law-step-5');

    Route::get('/family-law-step-6', function () {
        return view('student.family-law-step-6');
    })->name('student.family-law-step-6');

    Route::get('/family-law-step-7', function () {
        return view('student.family-law-step-7');
    })->name('student.family-law-step-7');

    Route::get('/family-law-step-8', function () {
        return view('student.family-law-step-8');
    })->name('student.family-law-step-8');

    Route::get('/family-law-step-9', function () {
        return view('student.family-law-step-9');
    })->name('student.family-law-step-9');

    Route::get('/family-law-step-10', function () {
        return view('student.family-law-step-10');
    })->name('student.family-law-step-10');

    Route::get('/family-law-step-11', function () {
        return view('student.family-law-step-11');
    })->name('student.family-law-step-11');

    Route::get('/family-law-step-12', function () {
        return view('student.family-law-step-12');
    })->name('student.family-law-step-12');

    Route::get('/family-law-step-13', function () {
        return view('student.family-law-step-13');
    })->name('student.family-law-step-13');

    Route::get('/family-law-step-14', function () {
        return view('student.family-law-step-14');
    })->name('student.family-law-step-14');
});
