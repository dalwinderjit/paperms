<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdditionalPosting_lib{
    var $id = null;
    var $title = null;
    var $type_id = null;
    private $operation = null;
    public $title_error = null;
    public $type_id_error = null;
    public function __construct($data=null){
        
        if($data!=null){
            if(isset($data['id'])){
                $this->id = $data['id'];
            }
            if(isset($data['title'])){
                $this->title = $data['title'];
            }
            if(isset($data['type_id'])){
                $this->type_id = $data['type_id'];
            }
            if(isset($data['operation'])){
                $this->operation = $data['operation'];
            }
        }
    }
    public function getTitle(){
        return $this->title;
    }
    public function getTypeId(){
        return $this->type_id;
    }
    public function getAddedDataArray($posting_id){
        return ['title'=>$this->title,'type'=>$this->type_id,'posting_id'=>$posting_id];
    }
    public function getOperation(){
        return $this->operation;
    }
    public function getDeletedData(){
      return ['id'=>$this->id,'deleted'=>'true'];  
    }
    public function getRecoverData(){
        return ['id'=>$this->id,'deleted'=>'false'];  
    }
    public function getUpdatedData(){
        return ['id'=>$this->id,'title'=>$this->title,'type'=>$this->type_id];  
    }
    public function is_valid(){
        
    }
    public function setError($field,$error){
        $field .='_error';
        $this->{$field} = $error;
    }
    public function setTitleError($error){
        $this->title_error = $error;
    }
    public function setTypeError($error){
        $this->type_id_error = $error;
    }
    public function foundAnyError(){
        if($this->title_error!=null || $this->type_id_error!=null){
            //echo 'hi';
            return true;
        }else{
            //echo 'bi';
            return false;
        }
    }
}