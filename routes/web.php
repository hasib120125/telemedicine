<?php

Route::get('/', 'FrontendController@index');
Route::get('/doctor', 'FrontendController@doctor');

Route::get('/show_doctor', 'FrontendController@show_doctor');

Route::get('/about', 'FrontendController@about');
Route::get('/contact', 'FrontendController@contact');
Route::get('/gellary', 'FrontendController@gellary');
Route::get('/search-patient/{id}', 'FrontendController@searchPatient');
Route::get('/patient-search-result', 'FrontendController@patientSearchResult');
Route::post('/patient-information-save/{id}', 'FrontendController@patientInformationSave');


Auth::routes();
Route::get('/user-registration', 'AdminController@registration')->name('user-registration');
Route::post('/user-registration-save', 'AdminController@registrationSave')->name('user-registration-save');
Route::get('/registration-complete', 'AdminController@registrationComplete');
Route::match(['get', 'post'], '/user-login','AdminController@login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard');

    //user route for admin
    Route::get('user-list','UserController@view')->name('user-list');
    Route::get('/admin-user-edit/{id}','UserController@edit')->name('admin-user-edit');
    Route::put('admin-users-update/{id}','UserController@update')->name('admin-users-update');
    Route::delete('/admin/users/{user}','UserController@destroy')->name('admin.users.destroy');
    Route::get('admin-users-manage','UserController@manage')->name('admin-users-manage');
    Route::post('user-active-status/{id}','UserController@activeStatus')->name('user-active-status');
    Route::post('user-pending-status/{id}','UserController@pendingStatus')->name('user-pending-status');
    Route::delete('delete-user/{id}','UserController@destroy')->name('delete-user');
    Route::get('user-balance', 'UserController@userBalance')->name('user-balance');
    Route::get('prescription-list', 'TreatmentController@allPrescription')->name('prescription-list');

    //Admin Create
    Route::get('admin-create','AdminController@create')->name('admin-create');
    Route::post('admin-save','AdminController@store')->name('admin-save');
    Route::get('admin-list','AdminController@adminList')->name('admin-list');
    Route::get('/admin/{admin}/edit','AdminController@edit')->name('admin.edit');
    Route::put('/admin/{admin}','AdminController@update')->name('admin.update');
    Route::delete('/admin/{admin}','AdminController@destroy')->name('admin.destroy');


    //Doctor route for admin
    Route::get('doctor-list','DoctorController@view')->name('doctor-list');
    Route::post('doctor-active-status/{id}','DoctorController@activeStatus')->name('doctor-active-status');
    Route::post('doctor-pending-status/{id}','DoctorController@pendingStatus')->name('doctor-pending-status');
    Route::delete('delete-doctor/{id}','DoctorController@destroy')->name('delete-doctor');
    Route::get('/doctor/{doctor}/edit','DoctorController@edit')->name('admin.doctor.edit');
    Route::put('/doctor/{doctor}','DoctorController@update')->name('doctor.update');
    Route::delete('/doctor/{doctor}','DoctorController@destroy')->name('admin.doctor.destroy');

    //Doctor Route
    Route::get('doctor-acount','DoctorController@doctorAccount')->name('doctor-acount');
    Route::get('doctor-bill', 'DoctorController@doctorBill')->name('doctor-bill');

    //Account Recharge Route
    Route::get('recharge', 'RechargeController@index')->name('recharge');
    Route::post('recharge-save', 'RechargeController@store')->name('recharge-save');
    Route::get('recharge-edit/{id}', 'RechargeController@edit')->name('recharge-edit');
    Route::patch('recharge-update/{id}', 'RechargeController@update')->name('recharge-update');
    Route::get('manage-recharge', 'RechargeController@view')->name('manage-recharge');
    
    //User Controller
    Route::get('/admin/users','UserController@index')->name('admin.users.index');
    Route::get('user-account','UserController@userAccount')->name('user-account');
    Route::get('user-transaction-list','UserController@transaction')->name('user-transaction-list');
    Route::get('/admin-password-edit/{id}','UserController@changepassword')->name('admin-password-edit');
    Route::put('admin-password-update/{id}','UserController@update_password')->name('admin-password-update');

    //Patient Route
    Route::get('view-patient','PatientController@index')->name('view-patient');
    Route::get('patient-list', 'PatientController@view')->name('patient-list');
    Route::get('patients','PatientController@index')->name('patients');
    Route::get('patients/manage', 'PatientController@manage')->name('patients.manage');
    Route::post('patients','PatientController@store')->name('patients.store');
    Route::get('patients/create','PatientController@create')->name('patients.create');
    Route::get('patients/{patient}','PatientController@show')->name('patients.show');
    Route::get('patients/{patient}/edit','PatientController@edit')->name('patients.edit');
    Route::put('/admin/patients/{patient}','PatientController@update')->name('admin.patients.update');
    Route::delete('patients/{patient}','PatientController@destroy')->name('patients.destroy');

    //Account Recharge Route
    Route::get('recharge', 'RechargeController@index')->name('recharge');
    Route::post('recharge-save', 'RechargeController@store')->name('recharge-save');
    Route::post('recharge-edit', 'RechargeController@edit')->name('recharge-edit');
    Route::post('recharge-update', 'RechargeController@update')->name('recharge-update');
    Route::get('manage-recharge', 'RechargeController@view')->name('manage-recharge');
    Route::get('user-recharge', 'RechargeController@userRecharge')->name('user-recharge');
    Route::post('user-recharge-save', 'RechargeController@userRechargeSave')->name('user-recharge-save');
    Route::post('user-recharge-approve/{id}', 'RechargeController@userRechargeApprove')->name('user-recharge-approve');

    //Treatment
    Route::get('treatment-create/{id}','TreatmentController@create')->name('treatment-create');
    Route::post('treatment-save/{id}','TreatmentController@store')->name('treatment-save');
    Route::get('treatment-view','TreatmentController@view')->name('treatment-view');
    Route::get('prescription-view/{id}','TreatmentController@prescriptionView')->name('prescription-view');
    Route::get('prescription-download/{id}','TreatmentController@downloadPDF')->name('prescription-download');
    Route::post('treatment-cancel/{id}','TreatmentController@treatmentCancel')->name('treatment-cancel');
    Route::get('treatment-patient-list','FrontendController@patientList')->name('treatment-patient-list');

});

Route::get('/logout', 'AdminController@logout')->name('logout');