<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employees
 *
 * @author OMR-PAP
 */
class Employee {
    public $search_parameters = [];
    public $osi_model = null;
    public $employee_ids_to_be_included =  null;
    public $searchFilter = [];
    public $limit = 10;
    public $start = 0;
    public $skipZero = false;
    //employee properties
    private $id = null;
    private $age = null;
    private $dateofbirth = null;
    
    private $currentPosting = null;
    //put your code here
    
    public function __construct(){
        $this->limit = 10;
        $this->start = 0;
    }
    public function initializeFromDatabase($db_object){
        if(isset($db_object->man_id)){
            $this->id = $db_object->man_id;
        }else{
            $this->id = $db_object->new_man_id;
        }
        $this->dateofbirth = $db_object->dateofbith;
        $this->calculateAge();
    }
    public function getEmployeesLIst($employee_id_sql=null,$where_for_course=null,$order_no=null, $order_date=null,$sorted_battallion_order=null){
        return $this->osi_model->getEmployees($this->searchFilter,$this->limit,$this->start,$employee_id_sql,$where_for_course,$order_no, $order_date,$sorted_battallion_order,$this->skipZero);
    }
    public function getEmployeeListOfSelectedCourse($course_detail=[]){
        if($course_detail==[] && count($course_detail)>0){
            //get the employee id sql
        }
        
    }
    public function getTotalEmployees(){
        return $this->osi_model->getTotalEmployees();
    }
    public function getTotalEmployeesForCourses(){
        return $this->osi_model->getTotalEmployees();
    }
    public function getFilteredEmployeesForCourses($employee_id_sql=null,$sorted_battallion_order=null){
        return $this->osi_model->getFilteredEmployees($this->searchFilter,$employee_id_sql,$sorted_battallion_order);
        
    }
    public function setOsiModel($osi_model){
        $this->osi_model = $osi_model;
    }
    public function setSearchFilter($filter_name, $filter_value){
        $this->searchFilter[$filter_name] = $filter_value;
    }
    public function setLimit($limit){
        $this->limit = $limit;
    }
    public function setStart($start){
        $this->start = $start;
    }
    public function setSkipZero($skipZero){
        $this->skipZero = $skipZero;
                
    }
    public function calculateAge(){
        //echo $this->dateofbirth;
        if(!empty($this->dateofbirth) && $this->isDateOfBirthValid()){
            $birthdate = new DateTime($this->dateofbirth);
            $today   = new DateTime('today');
            if($birthdate>$today){
                $this->age['years'] = '0';
                $this->age['months'] = '0';
                $this->age['days'] = '0';
            }else{
                $this->age['years'] = $birthdate->diff($today)->y;
                $this->age['months'] = $birthdate->diff($today)->m;
                $this->age['days'] = $birthdate->diff($today)->d;
            }
            
        }else{
            $this->age['years'] = '0';
            $this->age['months'] = '0';
            $this->age['days'] = '0';
            
        }
        //return $this->age;
    }
    public function getAgeYear(){
        return $this->age['years'].'-Years';;
    }
    public function getAge(){
        return $this->age['years'].'-Years, '.$this->age['months'].'-Months, '.$this->age['days'].'-Days';
    }
    public function getAgeYears(){
        return $this->age['years'];
    }
    public function isDateOfBirthValid(){
        if(preg_match('/^([0-9]{4})-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/',$this->dateofbirth)){
                return true;
        }else{
                return false;
        }
    }
    public function getPostingHistory(){
        // ....
    }
    public function getCurrentPosting(){
        return $this->currentPosting;
    }
    public function getId(){
        return $this->id;
    }
    public function getDateOfBirth(){
        return $this->dateofbirth;
    }
    public function setCurrentPosting($posting){
        if($posting!=null && is_array($posting) && count($posting)>0){
            $this->currentPosting =  $posting[0]->name;
        }else{
            $this->currentPosting = 'Not Set!';
        }
    }
}
