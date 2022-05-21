<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Category
    Route::apiResource('categories', 'CategoryApiController');

    // Product
    Route::apiResource('products', 'ProductApiController');

    // Employe
    Route::post('employes/media', 'EmployeApiController@storeMedia')->name('employes.storeMedia');
    Route::apiResource('employes', 'EmployeApiController');

    // Jobs
    Route::apiResource('jobs', 'JobsApiController');

    // Contact Company
    Route::apiResource('contact-companies', 'ContactCompanyApiController');

    // Contact Contacts
    Route::apiResource('contact-contacts', 'ContactContactsApiController');

    // Project
    Route::apiResource('projects', 'ProjectApiController');

    // Site
    Route::apiResource('sites', 'SiteApiController');

    // Stock
    Route::apiResource('stocks', 'StockApiController');

    // Slip
    Route::apiResource('slips', 'SlipApiController');
});
