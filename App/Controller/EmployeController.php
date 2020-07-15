<?php


namespace App\Controller;


use App\Lib\Logger;
use App\Lib\Response;
use App\Model\Company;
use App\Model\Employe;

class EmployeController
{
    private $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $this->twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);
    }

    public function listEmploye() {
        $employeDAO = new Employe();
        $employes = $employeDAO->getEmployes();
        $template = $this->twig->load('list_employe.html.twig');
        echo $template->render(['employes' => $employes]);
    }

    public function newEmployeView() {
        $companyDao = new Company();
        $companys = $companyDao->getCompanys();
        $template = $this->twig->load('new_employe.html.twig');
        echo $template->render(['companys'=>$companys]);
    }

    public function addNewEmploye($employe) {
        $employeDAO = new Employe();
        $employeDAO->addEmploye($employe);
        Response::redirect('/employe');
    }

    public function editEmployeView($id) {
        $employeDAO = new Employe();
        $employe = $employeDAO->getEmployeById($id);
        $companyDao = new Company();
        $companys = $companyDao->getCompanys();
        $template = $this->twig->load('edit_employe.html.twig');
        echo $template->render(['employe' => $employe,'companys'=>$companys]);

    }

    public function editEmploye($employe, $id) {
        $employeDAO = new Employe();
        $employeDAO->editEmploye($employe, $id);
        Response::redirect('/employe');
    }

    public function deleteEmploye($id) {
        $employeDAO = new Employe();
        $employeDAO->deleteEmploye($id);
        Response::redirect('/employe');
    }



}