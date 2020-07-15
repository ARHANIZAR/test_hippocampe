<?php namespace App\Model;

use App\Lib\Config;
use App\Lib\Model;

class Company extends Model
{

    public function getCompanys(){
        $this->query('SELECT * FROM company');
        $rows = $this->resultSet();
        return $rows;
    }

    public function addCompany($company) {
        $this->query('INSERT INTO `company`(name, postal_code) VALUES (:name, :departement)');
        $this->bind('name', $company['name']);
        $this->bind('departement', $company['departement']);
        $this->execute();

    }

    public function getCompanyById($id) {

        $this->query('SELECT * FROM company WHERE id = :id');
        $this->bind('id', $id);
        $company = $this->resultSet();
        return $company[0];

    }

    public function editCompany($company, $id) {
        $this->query('UPDATE company SET name = :name, postal_code = :departement WHERE id = :id');
        $this->bind('name', $company['name']);
        $this->bind('id', $id);
        $this->bind('departement', $company['departement']);
        $this->execute();
    }

    public function deleteCompany($id) {
        $this->query('DELETE FROM company WHERE id = :id');
        $this->bind('id', $id);
        $this->execute();

    }


}