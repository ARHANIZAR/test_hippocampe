<?php namespace App\Model;

use App\Lib\Config;
use App\Lib\Model;

class Employe extends Model
{

    public function getEmployes(){
        $this->query('SELECT employe.id, employe.first_name, employe.last_name ,YEAR(CURDATE()) - YEAR(employe.birthday) AS age, 
company.name AS company_name FROM employe INNER JOIN company ON employe.id_company=company.id');
        $rows = $this->resultSet();
        return $rows;
    }

    public function addEmploye($employe) {
        $this->query('INSERT INTO `employe`(first_name, last_name, birthday, id_company) VALUES (:firstName, :lastName, :birthday, :companyId)');
        $this->bind('firstName', $employe['firstName']);
        $this->bind('lastName', $employe['lastName']);
        $this->bind('birthday', $employe['birthday']);
        $this->bind('companyId', $employe['companyId']);
        $this->execute();

    }

    public function getEmployeById($id) {

        $this->query('SELECT * FROM employe WHERE id = :id');
        $this->bind('id', $id);
        $employe = $this->resultSet();
        return $employe[0];

    }

    public function editEmploye($employe, $id) {
        $this->query('UPDATE employe SET first_name = :firstName, last_name = :lastName, birthday = :birthday,
 id_company = :companyId WHERE id = :id');
        $this->bind('id', $id);
        $this->bind('firstName', $employe['firstName']);
        $this->bind('lastName', $employe['lastName']);
        $this->bind('birthday', $employe['birthday']);
        $this->bind('companyId', $employe['companyId']);
        $this->execute();
    }

    public function deleteEmploye($id) {
        $this->query('DELETE FROM employe WHERE id = :id');
        $this->bind('id', $id);
        $this->execute();

    }

    public function getCountEmployesByCompany() {
        $this->query('SELECT count(employe.id) as countEmployes, company.name AS name FROM employe
 INNER JOIN company ON employe.id_company=company.id GROUP BY id_company');
        $rows = $this->resultSet();
        return $rows;
    }

    public function getCountEmployesGroupedByRange() {
        $this->query('SELECT concat(20*floor((YEAR(CURDATE()) - YEAR(employe.birthday))/20), \'-\', 20*floor((YEAR(CURDATE()) - YEAR(employe.birthday))/20) + 20)
    as `range`,count(employe.id) as countEmployes FROM Employe GROUP BY `range` ');
        $rows = $this->resultSet();
        return $rows;
    }
}