<?php
require __DIR__ . '/vendor/autoload.php';
require('configDB.php');

use App\Controller\HomeController;
use \App\Controller\CompanyController;
use \App\Controller\EmployeController;
use App\Lib\App;
use App\Lib\Router;
use App\Lib\Request;
use App\Lib\Response;

Router::get('/', function () {
    (new HomeController())->dashboard();
});

// Company routes

Router::get('/company', function () {
    (new CompanyController())->listCompany();
});

Router::get('/company/add', function () {
    (new CompanyController())->newCompanyView();
});

Router::post('/company/add_submit', function (Request $request) {
    (new CompanyController())->addNewCompany($request->getBody());
});

Router::get('/company/edit/([0-9]*)', function (Request $request) {
    (new CompanyController())->editCompanyView($request->params[0]);
});

Router::post('/company/edit_submit/([0-9]*)', function (Request $request) {
    (new CompanyController())->editCompany($request->getBody(),$request->params[0]);
});

Router::get('/company/delete/([0-9]*)', function (Request $request) {
    (new CompanyController())->deleteCompany($request->params[0]);
});






// Employe routes

Router::get('/employe', function () {
    (new EmployeController())->listEmploye();
});

Router::get('/employe/add', function () {
    (new EmployeController())->newEmployeView();
});

Router::post('/employe/add_submit', function (Request $request) {
    (new EmployeController())->addNewEmploye($request->getBody());
});

Router::get('/employe/edit/([0-9]*)', function (Request $request) {
    (new EmployeController())->editEmployeView($request->params[0]);
});

Router::post('/employe/edit_submit/([0-9]*)', function (Request $request) {
    (new EmployeController())->editEmploye($request->getBody(),$request->params[0]);
});

Router::get('/employe/delete/([0-9]*)', function (Request $request) {
    (new EmployeController())->deleteEmploye($request->params[0]);
});




App::run();