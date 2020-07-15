<?php

namespace App\Controller;
use App\Model\Company;
use App\Model\Employe;

class HomeController
{
    private $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $this->twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);
    }

    public function dashboard()
    {
        $companyDAO = new Company();
        $companys = $companyDAO->getCompanys();
        $employeDAO = new Employe();
        $employes = $employeDAO->getEmployes();
        $employesByCompany = $employeDAO->getCountEmployesByCompany();
        $employesByRange = $employeDAO->getCountEmployesGroupedByRange();
        $template = $this->twig->load('index.html.twig');
        echo $template->render(['companys' => $companys,'employes'=>$employes,'employesByCompany' => $employesByCompany,
            'employesByRange' => $employesByRange]);

    }




}