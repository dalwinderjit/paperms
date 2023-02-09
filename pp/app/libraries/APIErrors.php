<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Deployment
 *
 * @author OMR-PAP
 */
class APIErrors extends CI_Form_validation
{
    //put your code here
    private $errors = null;

    //
    public function __construct($deployment_type = null, $deployment_type2 = null)
    {
        $this->errors = [];
    }
    public function setErrors($errors){
        $this->errors = $errors;
    }
    
    public function showError($field,$prefix='',$suffix=''){
        $field = strtolower($field);
        $error = '';
        if(isset($this->errors->$field)){
            if(is_array($this->errors->$field)){
                foreach($this->errors->$field as $k=>$val){
                    $error .= $val;
                }
                //return $error;
            }else{
                $error = $this->errors->$field;
                
            }
        }
        if ($prefix === '')
		{
			$prefix = $this->_error_prefix;
		}

		if ($suffix === '')
		{
			$suffix = $this->_error_suffix;
		}

		return $prefix.$error.$suffix;
        //return $this->$error;
    }
    
}
