<?php

Route::get('/', 'DepartmentsController@departments');
Route::get('departments', 'DepartmentsController@departments');
Route::get('departments/{deptNo}', 'DepartmentsController@departmentSummary');
Route::get('departments/employees/{deptNo}', 'DepartmentsController@departmentEmployees');

