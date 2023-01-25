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
class Deployment {
    //put your code here
    private $deployment_type = null;
    private $deployment_types = [];
    private $deployment_type2 = null;
    private $deployment_types2 = [];
    private $deployment_types2_for_battalion = [];
    private $rank_category = null;
    private $rank_categories = ['Executive Staff','Ministerial Staff','Medical Staff','Class-IV (P)','Class-IV (C)'];
    private $deployment_rank_category_relation= [
            'NGO_RANK_DEPLOYMENT'=>'Executive Staff',
            'NGO_RANK_DEPLOYMENT_BATTALION'=>'Executive Staff',
            'GO_RANK_DEPLOYMENT'=>'Executive Staff',
            'GO_RANK_DEPLOYMENT_BATTALION'=>'Executive Staff',
            'MEDICAL_DEPLOYMENT'=>'Medical Staff',
            'MINISTERIAL_DEPLOYMENT'=>'Ministerial Staff',
            'CLASS_IV_C'=>'Class-IV (C)',
            'CLASS_IV_P'=>'Class-IV (P)'
        ];
    const NGO_RANK_DEPLOYMENT = 1;
    const GO_RANK_DEPLOYMENT = 2;
    const GO_RANK_DEPLOYMENT_BATTALION = 3;
    const MEDICAL_DEPLOYMENT = 4;
    const MINISTERIAL_DEPLOYMENT = 5;
    const CLASS_IV_C = 6;
    const CLASS_IV_P = 7;
    
    
    private $CALCULATE_OTHER_RANK = FALSE;
    private $SHOW_OTHER_RANK = FALSE;
    private $INCLUDE_OTHER_RANK_IN_TOTAL = FALSE;
    
    private $permanent_ranks = [];
    private $permanent_ranks_fields = [];
    private $permanent_ranks_fields_rank_names_relation = [];
    private $selected_rank_field = '';
    private $selected_permanent_ranks_field ='';
    private $ranks = [];
    private $rankRelation =[];
    private $rank_relation2 = [];
    private $rank_group_ids = [];
    private $order_by_ranks = '';
    private $skipZero = false;
    
    private $battalions = [];
    private $unit = [];
    //NGO RANK DEPLOYMENT
    //GO RANK DEPLOYEMENT
    //MINISTERIAL DEPLOYMENT (Class 
    //
    public function __construct($deployment_type=null,$deployment_type2=null){
        //$this->deployment_types = ['NGO_RANK_DEPLOYMENT'=>'NGO & ORs RANK DEPLOYMENT','GO_RANK_DEPLOYMENT'=>'GO RANK DEPLOYMENT','GO_RANK_DEPLOYMENT_BATTALION'=>'GO RANK DEPLOYMENT BATTALION','MINISTERIAL_DEPLOYMENT'=>'MINISTERIAL DEPLOYMENT','CLASS_IV_C'=>'CLASS-IV(C)','CLASS_IV_P'=>'CLASS-IV(P)'];
        $this->deployment_types = ['NGO_RANK_DEPLOYMENT'=>'NGO & ORs RANK DEPLOYMENT','GO_RANK_DEPLOYMENT'=>'GO RANK DEPLOYMENT','GO_RANK_DEPLOYMENT_BATTALION'=>'GO RANK DEPLOYMENT BATTALION','MINISTERIAL_DEPLOYMENT'=>'MINISTERIAL DEPLOYMENT','MEDICAL_DEPLOYMENT'=>'MEDICAL DEPLOYMENT','CLASS_IV_C'=>'CLASS-IV(C)','CLASS_IV_P'=>'CLASS-IV(P)'];
        $this->deployment_types2 = ['OVERALL'=>'OVERALL DEPLOYEMENT STATEMENT','1'=>'EMPLOYEE POSTING CONSOLIDATE IGP','3'=>'EMPLOYEE POSTING CONSOLIDATE BATTALION'];//these things should come from db
        $this->deployment_types2_for_battalion = ['OVERALL'=>'OVERALL DEPLOYEMENT STATEMENT','3'=>'EMPLOYEE POSTING CONSOLIDATE'];//these things should come from db
        if($deployment_type!=null){
            $this->setDeploymentType($deployment_type);
        }else{
            $this->deployment_type =        self::NGO_RANK_DEPLOYMENT;
        }
        if($deployment_type2!=null){
            $this->deployment_type2 = $deployment_type2;
        }else{
            $this->deployment_type2 = 'OVERALL';
        }
        //echo 'dalwinder';
        $this->setRanks();
        //echo 'die';
    }
    public function setDeploymentType($deployment_type){
        //echo $deployment_type;
        //echo $deployment_type;
        if(is_integer($deployment_type)){
            $this->deployment_type = $deployment_type;
        }else{
            $this->deployment_type = constant("Deployment::$deployment_type");
        }
    }
    public function setRanks(){
        //echo 'hi';
        //echo $this->deployment_type;
        switch($this->deployment_type){
            case self::NGO_RANK_DEPLOYMENT:
                
                $this->permanent_ranks_fields =['insp','si','asi','hc','ct'];
                $this->permanent_ranks_fields_rank_names_relation = ['insp'=>'INSP','si'=>'SI','asi'=>'ASI','hc'=>'HC','ct'=>'CT'];
                $this->permanent_ranks = ['INSP','SI','ASI','HC','CT'];
                $this->order_by_ranks = "FIELD(cexrank,'INSP','INSP/LR','INSP/CR','SI', 'SI/LR','SI/CR','ASI','ASI/LR','ASI/CR','ASI/ORP','HC','HC/LR', 'HC/PR', 'HC/CR','C-II','Sr. Const', 'Sr.Const','CT' )";
                $this->ranks = ['INSP','INSP/LR','INSP/CR','SI','SI/LR','SI/CR','ASI','ASI/LR','ASI/CR','ASI/ORP','HC','HC/LR','HC/PR','HC/CR','C-II','Sr. Const','Sr.Const','CT',];
                    $this->rankRelation = [
                        'insp'=>['INSP'],
                        'si'=>['SI','INSP/LR','INSP/CR'],
                        'asi'=>['ASI','SI/LR','SI/CR'],
                        'hc'=>['HC','ASI/LR','ASI/CR','ASI/ORP'],
                        'ct'=>['CT','Sr. Const','Sr.Const','C-II','HC/LR','HC/PR','HC/CR']
                    ];
                    $this->rank_relation2 = [
                        'INSP'=>'insp',
                        //'DSP/CR'=>'insp',
                        'SI'=>'si',
                        'INSP/LR'=>'si',
                        'INSP/CR'=>'si',
                        'ASI'=>'asi',
                        'SI/LR'=>'asi',
                        'SI/CR'=>'asi',
                        'HC'=>'hc',
                        'ASI/LR'=>'hc',
                        'ASI/CR'=>'hc',
                        'ASI/ORP'=>'hc',
                        'CT'=>'ct',
                        'Sr. Const'=>'ct',
                        'Sr.Const'=>'ct',
                        'C-II'=>'ct',
                        'HC/LR'=>'ct',
                        'HC/PR'=>'ct',
                        'HC/CR'=>'ct'
                    ];
                    $this->rank_category = 'Executive Staff';
                break;
            case self::GO_RANK_DEPLOYMENT:
                $this->permanent_ranks_fields =['comdt','asst_comdt','aig','sp','dsp'];//commandant, asst. Commandant, AIG , SP ,DSP
                $this->permanent_ranks_fields_rank_names_relation = ['comdt'=>'Commandant','asst_comdt'=>'Asst. Commandant','aig'=>'AIG','sp'=>'SP','dsp'=>'DSP'];
                $this->order_by_ranks = "FIELD(cexrank,'Commandant','Asst. Commandant','SP','SP/CR','AIG','DSP','DSP/CR','DSP/LR','DSP/PR')";
                $this->permanent_ranks = ['Commandant','Asst. Commandant','AIG','SP','DSP'];
                $this->ranks = ['Commandant','Asst. Commandant','SP','SP/CR','AIG','DSP','DSP/CR','DSP/LR','DSP/PR'];
                    $this->rankRelation = [
                        'comdt'=>['Commandant'],
                        'asst_comdt'=>['Asst. Commandant'],
                        'aig'=>['AIG'],
                        'sp'=>['SP','SP/CR'],
                        'dsp'=>['DSP','DSP/CR','DSP/LR','DSP/PR']
                    ];
                    $this->rank_relation2 = [
                        'Commandant'=>'comdt',
                        'Asst. Commandant'=>'asst_comdt',
                        'AIG'=>'aig',
                        'SP'=>'sp',
                        'SP/CR'=>'sp',
                        'DSP'=>'dsp',
                        'DSP/CR'=>'dsp',
                        'DSP/LR'=>'dsp',
                        'DSP/PR'=>'dsp'
                        
                    ];
                    $this->rank_category = 'Executive Staff';
                break;
            case self::GO_RANK_DEPLOYMENT_BATTALION:
                $this->permanent_ranks_fields =['comdt','asst_comdt','sp','dsp'];//commandant, asst. Commandant, AIG , SP ,DSP
                //$this->permanent_ranks_fields_rank_names_relation = ['comdt'=>'','asst_comdt','sp','dsp'];
                $this->permanent_ranks_fields_rank_names_relation = ['comdt'=>'Commandant','asst_comdt'=>'Asst. Commandant','sp'=>'SP','dsp'=>'DSP'];
                $this->order_by_ranks = "FIELD(cexrank,'Commandant','Asst. Commandant','SP','SP/CR','DSP','DSP/CR','DSP/LR','DSP/PR')";
                $this->permanent_ranks = ['COMDT','ASST_COMDT','SP','DSP'];
                $this->ranks = ['Commandant','Asst. Commandant','SP','SP/CR','DSP','DSP/CR','DSP/LR','DSP/PR'];
                $this->rank_group_ids = [];
                    $this->rankRelation = [
                        'comdt'=>['Commandant'],
                        'asst_comdt'=>['Asst. Commandant'],
                        'sp'=>['SP','SP/CR'],
                        'dsp'=>['DSP','DSP/CR','DSP/LR','DSP/PR'],
                    ];
                    $this->rank_relation2 = [
                        'Commandant'=>'comdt',
                        'Asst. Commandant'=>'asst_comdt',
                        'SP'=>'sp',
                        'SP/CR'=>'sp',
                        'DSP'=>'dsp',
                        'DSP/CR'=>'dsp',
                        'DSP/LR'=>'dsp',
                        'DSP/PR'=>'dsp',
                    ];
                    $this->rank_category = 'Executive Staff';
                break;
            case self::MINISTERIAL_DEPLOYMENT:
                 $this->permanent_ranks_fields =['senior_asstt','junior_asstt','clerk','peon','daftari','supdt_gradeI','supdt_gradeII'];//commandant, asst. Commandant, AIG , SP ,DSP
                $this->permanent_ranks_fields_rank_names_relation = ['senior_asstt'=>'Senior Asstt.','junior_asstt'=>'Junior Asstt.','clerk'=>'Clerk','peon'=>'Peon','daftari'=>'Daftari','supdt_gradeI'=>'Supdt Grade-I','supdt_gradeII'=>'Supdt Grade-II'/*'comdt'=>'Commandant','asst_comdt'=>'Asst. Commandant','sp'=>'SP','dsp'=>'DSP'*/];
                $this->permanent_ranks = ['Senior Asstt.','Junior Asstt.','Clerk','Peon','Daftari','Supdt Grade-I','Supdt Grade-II'];
                $this->order_by_ranks = "FIELD(rank_,'Senior Asstt.','Junior Asstt.','Clerk','Peon','Daftari','Supdt Grade-I','Supdt Grade-II')";
                $this->ranks = ['Senior Asstt.','Junior Asstt.','Clerk','Peon','Daftari','Supdt Grade-I','Supdt Grade-II'];
                    $this->rankRelation = [
                        'senior_asstt'=>['Senior Asstt.'],
                        'junior_asstt'=>['Junior Asstt.'],
                        'clerk'=>['Clerk'],
                        'peon'=>['Peon'],
                        'daftari'=>['Daftari'],
                        'supdt_gradeI' =>['Supdt Grade-I'],
                        'supdt_gradeII'=>['Supdt Grade-II'],
                    ];
                    $this->rank_relation2 = [
                        'Senior Asstt.'=>'senior_asstt',
                        'Junior Asstt.'=>'junior_asstt',
                        'Clerk'=>'clerk',
                        'Peon'=>'peon',
                        'Daftari'=>'daftari',
                        'Supdt Grade-I' =>'supdt_gradeI',
                        'Supdt Grade-II'=>'supdt_gradeII'
                    ];
                    $this->rank_category = 'Ministerial Staff';
                //break;
                break;
            case self::CLASS_IV_C:
                 $this->permanent_ranks_fields =['cook','water_crrier','sweeper','dhobi','mochi','barber','tailor','carpenter','mason','mali'];//commandant, asst. Commandant, AIG , SP ,DSP
                $this->permanent_ranks_fields_rank_names_relation = ['cook'=>'Cook','water_crrier'=>'Water Carrier','sweeper'=>'Sweeper','dhobi'=>'Dhobi','mochi'=>'Mochi','barber'=>'Barber','tailor'=>'Tailor','carpenter'=>'Carpenter','mason'=>'Mason','mali'=>'Mali'];
                $this->permanent_ranks = ['Cook','Water Carrier','Sweeper','Dhobi','Mochi','Barber','Tailor','Carpenter','Mason','Mali'];
                $this->order_by_ranks = "FIELD(rank_,'Cook','Water Carrier','Sweeper','Dhobi','Mochi','Barber','Tailor','Carpenter','Mason','Mali')";
                $this->ranks = ['Cook','Water Carrier','Sweeper','Dhobi','Mochi','Barber','Tailor','Carpenter','Mason','Mali'];
                    $this->rankRelation = [
                        'cook'=>['Cook'],
                        'water_carrier'=>['Water Carrier'],
                        'sweeper'=>['Sweeper'],
                        'dhobi'=>['Dhobi'],
                        'mochi'=>['Mochi'],
                        'barber' =>['Barber'],
                        'tailor'=>['Tailor'],
                        'carpenter'=>['Carpenter'],
                        'mason'=>['Mason'],
                        'mali'=>['Mali']
                    ];
                    $this->rank_relation2 = [
                        'Cook'=>'cook',
                        'Water Carrier'=>'water_carrier',
                        'Sweeper'=>'sweeper',
                        'Dhobi'=>'dhobi',
                        'Mochi'=>'mochi',
                        'Barber' =>'barber',
                        'Tailor'=>'tailor',
                        'Carpenter'=>'carpenter',
                        'Mason'=>'mason',
                        'Mali'=>'mali'
                    ];
                    $this->rank_category = 'Class-IV (C)';
                //break;
                break;
            case self::CLASS_IV_P:
                 $this->permanent_ranks_fields =['cook','water_crrier','sweeper','dhobi','mochi','barber','tailor','carpenter','mason','mali'];
                $this->permanent_ranks_fields_rank_names_relation = ['cook'=>'Cook','water_crrier'=>'Water Carrier','sweeper'=>'Sweeper','dhobi'=>'Dhobi','mochi'=>'Mochi','barber'=>'Barber','tailor'=>'Tailor','carpenter'=>'Carpenter','mason'=>'Mason','mali'=>'Mali'];
                $this->permanent_ranks = ['Cook','Water Carrier','Sweeper','Dhobi','Mochi','Barber','Tailor','Carpenter','Mason','Mali'];
                $this->order_by_ranks = "FIELD(rank_,'Cook','Water Carrier','Sweeper','Dhobi','Mochi','Barber','Tailor','Carpenter','Mason','Mali')";
                $this->ranks = ['Cook','Water Carrier','Sweeper','Dhobi','Mochi','Barber','Tailor','Carpenter','Mason','Mali'];
                    $this->rankRelation = [
                        'cook'=>['Cook'],
                        'water_carrier'=>['Water Carrier'],
                        'sweeper'=>['Sweeper'],
                        'dhobi'=>['Dhobi'],
                        'mochi'=>['Mochi'],
                        'barber' =>['Barber'],
                        'tailor'=>['Tailor'],
                        'carpenter'=>['Carpenter'],
                        'mason'=>['Mason'],
                        'mali'=>['Mali']
                    ];
                    $this->rank_relation2 = [
                        'Cook'=>'cook',
                        'Water Carrier'=>'water_carrier',
                        'Sweeper'=>'sweeper',
                        'Dhobi'=>'dhobi',
                        'Mochi'=>'mochi',
                        'Barber' =>'barber',
                        'Tailor'=>'tailor',
                        'Carpenter'=>'carpenter',
                        'Mason'=>'mason',
                        'Mali'=>'mali'
                    ];
                    $this->rank_category = 'Class-IV (P)';
                //break;
                break;
            case self::MEDICAL_DEPLOYMENT:
                 $this->permanent_ranks_fields =['doctor','pharmacist','physiotherapist','lab_technician','nursing_asstt'];
                $this->permanent_ranks_fields_rank_names_relation = ['doctor'=>'Doctor','pharmacist'=>'Pharmacist','physiotherapist'=>'Physiotherapist','lab_technician'=>'Lab Technician','nursing_asstt'=>'Nursing Asstt.'];
                $this->permanent_ranks = ['Doctor','Pharmacist','Physiotherapist','Lab Technician','Nursing Asstt.'];
                    $this->order_by_ranks = "FIELD(rank_,'Doctor','Pharmacist','Physiotherapist','Lab Technician','Nursing Asstt.')";
                $this->ranks = ['Doctor','Pharmacist','Physiotherapist','Lab Technician','Nursing Asstt.'];
                    $this->rankRelation = [
                        'doctor'=>['Doctor'],
                        'pharmacist'=>['Pharmacist'],
                        'physiotherapist'=>['Physiotherapist'],
                        'lab_technician'=>['Lab Technician'],
                        'nursing_asstt'=>['Nursing Asstt.']
                    ];
                    $this->rank_relation2 = [
                        'Doctor'=>'doctor',
                        'Pharmacist'=>'pharmacist',
                        'Physiotherapist'=>'physiotherapist',
                        'Lab Technician'=>'lab_technician',
                        'Nursing Asstt.'=>'nursing_asstt'
                    ];
                    $this->rank_category = 'Medical Staff';
                //break;
                break;
        }
        //echo 'dakelrjk';    
        //echo $this->rank_category;
    }
    public function getPermanentRankFields(){
        return $this->permanent_ranks_fields;
    }
    public function makeDeploymentCalculations2(&$posting_history,&$formalOrdersNotIssued,&$postedForPayPurpose,&$notReported,&$excessAttached,&$finalPostingWithIDasKey,&$total){
        if(true || $this->deployment_type==self::NGO_RANK_DEPLOYMENT){
            $i=0;
            $posting_data = $posting_history['posting_data'];
            $employees = $posting_history['employees'];
            foreach($posting_data as $k=>$val){
                $total++;
                if($val->posting_id==2306 && false){
					$i++;
					echo $i.',';
				}
                $employee_ids[] = $val->employee_id;

                //$finalPostingWithIDasKey[$val->posting_id]->total++;
                //var_dump($val->current_rank);
                $induction_mode ='';
                if(isset($employees[$val->employee_id])){
                    //var_dump($employees[$val->employee_id]);die;
                    $induction_mode = $employees[$val->employee_id]->inductionmode;
                }
                if($induction_mode=='Formal Order Not Issued'){
                        $formalOrdersNotIssued->total++;
                }elseif($induction_mode=='Transfer Pay Purpose'){
                        $postedForPayPurpose->total++;
                }elseif($induction_mode=='Not Reported'){
                        $notReported->total++;
                }elseif($induction_mode=='Attachment'){
                        $excessAttached->total++;
                }
                //echo $val->current_rank;
                $current_rank = '';
                if(isset($employees[$val->employee_id])){
                    $current_rank = $employees[$val->employee_id]->current_rank;
                }
                try{
                    if(isset($this->rank_relation2[trim($current_rank)])){
                        $rank = $this->rank_relation2[trim($current_rank)];
                    }else{
                        $rank = 'otherRank';
                    }
                }catch(Exception $e){
                    $rank = 'otherRank';
                }
                //echo $rank ;
                //die;
                if(in_array($rank,$this->permanent_ranks_fields)){
                    $finalPostingWithIDasKey[$val->posting_id]->total++;
                    $finalPostingWithIDasKey[$val->posting_id]->$rank++;
                    if($induction_mode=='Formal Order Not Issued'){
                            $formalOrdersNotIssued->$rank++;
                    }elseif($induction_mode=='Transfer Pay Purpose'){
                            $postedForPayPurpose->$rank++;
                    }elseif($induction_mode=='Not Reported'){
                            $notReported->$rank++;
                    }elseif($induction_mode=='Attachment'){
                            $excessAttached->$rank++;
                    }
                }else{
                    if($this->CALCULATE_OTHER_RANK){
                        if($this->INCLUDE_OTHER_RANK_IN_TOTAL){;
                            $finalPostingWithIDasKey[$val->posting_id]->total++;
                        }
                        $finalPostingWithIDasKey[$val->posting_id]->$rank++;
                        if($induction_mode=='Formal Order Not Issued'){
                                $formalOrdersNotIssued->$rank++;
                        }elseif($induction_mode=='Transfer Pay Purpose'){
                                $postedForPayPurpose->$rank++;
                        }elseif($induction_mode=='Not Reported'){
                                $notReported->$rank++;
                        }elseif($induction_mode=='Attachment'){
                                $excessAttached->$rank++;
                        }
                    }
                }
            }
        }
    }
    public function makeDeploymentCalculations(&$posting_history,&$formalOrdersNotIssued,&$postedForPayPurpose,&$notReported,&$excessAttached,&$finalPostingWithIDasKey,&$total){
        if(true || $this->deployment_type==self::NGO_RANK_DEPLOYMENT){
            $i=0;
            foreach($posting_history as $k=>$val){
                $total++;
                if($val->posting_id==2306 && true){
					$i++;
					echo $i.',';
				}
                $employee_ids[] = $val->employee_id;

                //$finalPostingWithIDasKey[$val->posting_id]->total++;
                //var_dump($val->current_rank);
                if($val->inductionmode=='Formal Order Not Issued'){
                        $formalOrdersNotIssued->total++;
                }elseif($val->inductionmode=='Transfer Pay Purpose'){
                        $postedForPayPurpose->total++;
                }elseif($val->inductionmode=='Not Reported'){
                        $notReported->total++;
                }elseif($val->inductionmode=='Attachment'){
                        $excessAttached->total++;
                }
                //echo $val->current_rank;
                try{
                    if(isset($this->rank_relation2[trim($val->current_rank)])){
                        $rank = $this->rank_relation2[trim($val->current_rank)];
                    }else{
                        $rank = 'otherRank';
                    }
                }catch(Exception $e){
                    $rank = 'otherRank';
                }
                //echo $rank ;
                //die;
                if(in_array($rank,$this->permanent_ranks_fields)){
                    $finalPostingWithIDasKey[$val->posting_id]->total++;
                    $finalPostingWithIDasKey[$val->posting_id]->$rank++;
                    if($val->inductionmode=='Formal Order Not Issued'){
                            $formalOrdersNotIssued->$rank++;
                    }elseif($val->inductionmode=='Transfer Pay Purpose'){
                            $postedForPayPurpose->$rank++;
                    }elseif($val->inductionmode=='Not Reported'){
                            $notReported->$rank++;
                    }elseif($val->inductionmode=='Attachment'){
                            $excessAttached->$rank++;
                    }
                }else{
                    if($this->CALCULATE_OTHER_RANK){
                        if($this->INCLUDE_OTHER_RANK_IN_TOTAL){;
                            $finalPostingWithIDasKey[$val->posting_id]->total++;
                        }
                        $finalPostingWithIDasKey[$val->posting_id]->$rank++;
                        if($val->inductionmode=='Formal Order Not Issued'){
                                $formalOrdersNotIssued->$rank++;
                        }elseif($val->inductionmode=='Transfer Pay Purpose'){
                                $postedForPayPurpose->$rank++;
                        }elseif($val->inductionmode=='Not Reported'){
                                $notReported->$rank++;
                        }elseif($val->inductionmode=='Attachment'){
                                $excessAttached->$rank++;
                        }
                    }
                }
            }
        }
    }
    public function getRankFromRelation2($rank){
        return $this->rank_relation2[$rank];
    }
    public function setIncludeOtherRankInTotal($bool){
        $this->INCLUDE_OTHER_RANK_IN_TOTAL = $bool;
    }
    public function setCalculateOtherRank($bool){
        $this->CALCULATE_OTHER_RANK = $bool;
    }
    public function setShowOtherRank($bool){
        $this->SHOW_OTHER_RANK = $bool;
    }
    public function getShowOtherRank(){
        return $this->SHOW_OTHER_RANK;
    }
    public function addHtmlRow($posting){
                    
        if($posting==null){
            return $this->generateEmptyTableRow();
        }else{
            return $this->generateTableRow($posting);
        }
    }
    public function htmlViewPosting(&$htmlData,$tree_posting,$finalPostings,&$sno,$level=0,$all_posting_copy,&$htmlgroup,&$level2,&$totals,&$previous_child_id,&$new_child_id,&$parent_id,&$old_posting){
        $this->api = & get_instance();
        $this->api->load->helper('common');
            //$this->load->helper('common');
        if($tree_posting->id==6){
            //var_dump($tree_posting);
        }
            if($tree_posting->haveChildren==true && ((in_array($this->deployment_type2,[1,3]))?$tree_posting->view=='EXPANDED':true)){
                if($tree_posting->name=='LAW AND ORDER DUTY'){
                    //var_dump($tree_posting);
                    //echo 'hi';
                    //echo 'NOT HERE';
                }
                    $parent_id = $tree_posting->id;
                            $level2++;
                    $sno[$level+2] = 0;
                    $level++;

                    $width = 0;
                    for($i=0;$i<$level;$i++){
                            $width +=20;
                    }
                    $old_posting = $posting = $all_posting_copy[$tree_posting->id];
                    if(($posting->total==0 && $this->skipZero==true)){
                       // echo 'Posting zeror';
                        if(!isset($sno[$level])){
                                //$sno[$level]=1;
                        }else{
                                //$sno[$level]++;
                        }
                    }else{
                        if(!isset($sno[$level])){
                                $sno[$level]=1;
                        }else{
                                $sno[$level]++;
                                //echo 'level increment';
                        }
                    }
                    array_push($totals,$posting);
                    $color = 'color'.$level;
                    $span = "<span style='width:{$width}px;height:20px;float:left;'></span>";

                    if($level2==2){
                            //$tree_posting_name = '<b><i><u>'.$tree_posting->name.'</u></i>';
                            $tree_posting_name = $tree_posting->name.'';
                    }else{
                            $tree_posting_name = $tree_posting->name;
                    }

                    if($posting->id!=1){
                            if($posting->total!=0){
                                    if($level==2){
                                            $class = 'total_row2';
                                    }else{
                                            $class = 'total_row';
                                    }

                            }else{
                                    if($this->skipZero==false){
                                            if($level==2){
                                                    $class = 'total_row2';
                                            }else{
                                                    $class = 'total_row';
                                            }
                                    }else{
                                            $class = '';
                                    }

                            }
                            
                            if(!($posting->total==0 && $this->skipZero==true) ){
                                //echo ''
                                    $span = $this->getSpan($level);


                                    if($level==3){
                                            //$zero = $this->getZero($sno,$level);
                                            $text = convertToAlphabet($sno[$level]);
                                    }elseif($level==4){
                                            //$zero = $this->getZero($sno,$level);
                                            $text = convertToRoman($sno[$level]);
                                    }elseif($level==5){
                                            //$zero = $this->getZero($sno,$level);
                                            $text = strtolower(convertToRoman($sno[$level]));
                                    }else{
                                            $zero = $this->getZero($sno,$level);
                                            $text = $zero.$sno[$level];
                                    }
                                     if($this->SHOW_OTHER_RANK){
                                    $htmlData.='<tr class="'.$class.'"><td>'.$span.$text.'</td><td class="posting_name">'/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                                     }else{
                                        $htmlData.='<tr class="'.$class.'"><td>'.$span.$text.'</td><td class="posting_name">'/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                                     }
                            }
                    }

                    $previous_child_id=$posting->parent_posting_id;
                    $a=0;
                    foreach($tree_posting->childrens as $k=>$child){
                            $this->htmlViewPosting($htmlData,$child,$finalPostings,$sno, $level,$all_posting_copy,$htmlgroup,$level2,$totals,$previous_child_id,$new_child_id,$parent_id,$old_posting);
                    }	
                    if($level2==2){  
                            //$htmlData.='<tr><td>&nbsp;</td><td></td><td> </td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                    }else{

                    }
                    $text_align = 'right';
                    if($level==1){
                            $total_row = /*$span.*/'Total of '.$tree_posting->name;
                            $class = 'total_row1';
                    }elseif($level==2){
                            //$total_row = '<i><u>'./*$span.*/'Total of '.$tree_posting->name.'</u></i>';
                            $total_row = ''./*$span.*/'Total of '.$tree_posting->name.'';
                            $class = 'total_row2';
                    }else if($level==3){
                            $total_row = /*$span.*/'Total of '.$tree_posting->name;
                            $class = 'total_row3';
                    }else if($level==4){
                            $total_row = 'Total of '.$tree_posting->name;
                            $class = 'total_row3';
                    } else if($level==5){
                             $total_row = 'Total of '.$tree_posting->name;
                            $class = 'posting_name';
                    } elseif($level>5){
                            $total_row = /*$span.*/'Total of ('.$tree_posting->name.')'.$level;
                            $class = 'total_row';
                            $text_align = 'left';
                    }else{
                            $total_row = /*$span.*/'Total of '.$tree_posting->name;
                            $class = 'total_row';
                    }
                    if($posting->total!=0){
                    
                        
                            $span_left = ' class="showCursor hoverRankFigure" onClick="showEmployees('.$posting->id.',\'';
                            $span_center = '\')">';
                            $span_right = '';
                                    $span = $this->getSpan($level);
                                    $zero = $this->getZero($sno,$level);
                            $htmlData.='<tr class="'.$class.'"><td>'.'</td><td style="text-align:right;">'.$total_row.'</td>';
                            foreach($this->getPermanentRankFields() as $k=>$field){
                                $htmlData.=$this->setConsolidatedTableCell($posting,$field);
                            }
                            if($this->SHOW_OTHER_RANK){
                                $htmlData.=$this->setConsolidatedTableCell($posting,'otherRank');
                            }
                            $htmlData.=$this->setConsolidatedTableCell($posting,'total');
                            $htmlData.='</tr>';
                    }else{
                        if($this->skipZero==false){
                            $htmlData.= $this->generateTableRow($posting,$total_row,$class);
                        }
                    }
                    $level2--;
            }else{
                $level++;
                
                $posting = $this->getPostingFromWhoseIdIs($finalPostings,$tree_posting);
                //var_dump($posting);
                if($posting==null){
                    
                }
                //die;
                if($posting!=null){
                    if(!($posting->total==0 && $this->skipZero==true)){
                        if(!isset($sno[$level])){
                            $sno[$level]=1;
                        }else{
                                $sno[$level]++;
                        }
                    }
                    if($posting->parent_posting_id== $old_posting->parent_posting_id){

                    }
                    if($posting->parent_posting_id!= $old_posting->parent_posting_id){
                            //$level2++;
                            $old_posting = $posting;
                    }
                    $width = 0;
                    for($i=0;$i<$level;$i++){
                            $width +=20;
                    }
                    $htmlData.=$this->generateTableRow2($posting,$level,$sno,$width,$tree_posting);
                }else{
                    $htmlData.='';
                }
                //echo $htmlData;
                //die;
            }
    }
    public function getSpan($level)
    {
        $unit_width = 10;
        $width = 0;
        for($space_counter=2;$space_counter<$level;$space_counter++){
                //$space.='&nbsp;&nbsp;';
                //$space.='--';
                $width= $width+$unit_width*2;
        }
        $span = '<span style="width:'.$width.'px;border:0px solid black;padding-left:'.$width.'px;">&nbsp;</span>';
        return $span;
    }
    public function getZero($sno,$level)
    {
            $zero='';
            if($sno[$level]>9){
                    $zero='';
            }else{
                    $zero='0';
            }
            return $zero;
    }
    public function getPostingFromWhoseIdIs($finalPostings,$tree_posting){
            foreach($finalPostings as $k=>$posting){
                    if($tree_posting->id==$posting->id){
                            return $posting;
                    }
            }
            return null;
    }
    public function setConsolidatedTableCell($posting,$rankTitle){
            if($posting->$rankTitle>0){
                    $hoverRankFigureClass = 'hoverRankFigure';
                    $showCursor = 'showCursor';
                    $onClick = 'showEmployees('.$posting->id.',\''.$rankTitle.'\')';
                    $rank = $rankTitle;
                    $td_left = ' class="'.$showCursor.' '.$hoverRankFigureClass.'" onClick="'.$onClick."\">";
            }else{
                    $hoverRankFigureClass = '';
                    $showCursor = '';
                    $td_left = '>';
            }
            $td = '<td'.$td_left.$posting->$rankTitle.'</td>';
            return $td;
    }
    public function getPermanentRanks(){
        return $this->permanent_ranks;
    }
    public function getRanks(){
        return $this->ranks;
    }
    public function getRankGroupIds(){
        return $this->rank_group_ids;
    }
    public function setRankGroupIds($rank_group_ids){
        $this->rank_group_ids = $rank_group_ids;
    }
    public function generateTableRow($posting,$total_row=null,$class__=null){
        foreach($this->getPermanentRankFields() as $k=>$field){
            if(((int)$posting->{$field})>0){
                if($posting->mode=='posted_strength'){
                    $function = 'onClick="showEmployees(1,\''.$field.'\')"';
                    $class_='class="showCursor hoverRankFigure"';
                }elseif(in_array($posting->mode,['sanction_strength','vaccancies','posted_strength'])){
                    $function = 'onClick="showInductionModeEmployeesStrength(\''.$field.'\',\''.$posting->mode.'\',\''.$posting->title.'\')"';
                    $class_='class="showCursor hoverRankFigure"';
                }else{
                    $function ='';
                    $class_ = '';
                }
                    $onclick[$field] = $function;
                    $class[$field] = $class_;
            }else{
                    $onclick[$field] = '';
                    $class[$field] = '';
            }
        }
        if(((int)$posting->otherRank)>0){
                $indOtherRankClass = 'class="showCursor hoverRankFigure"';
                $indOtherRank = 'onClick="showEmployees(1,\'otherRank\')"';
        }else{
                $indOtherRankClass = '';
                $indOtherRank = '';
        }
         if(((int)$posting->total)>0){
                $indTotalClass = 'class="showCursor hoverRankFigure"';
                $indTotal = 'onClick="showEmployees(1,\'total\')"';
        }else{
                $indTotalClass = '';
                $indTotal = '';
        }
        $sno = ''; $title = '';
        if(isset($posting->sno)){$sno = $posting->sno;}
        if(isset($posting->title)){$title = $posting->title;}else{$title = $total_row;}
        if($class__==null){
            $class__ = '';
        }
        $str =  '<tr class="'.$class__.'"><td>'.$sno.'</td><td style="text-align:left;">'.$title.'</td>';
        foreach($this->getPermanentRankFields() as $k=>$field){
            $str.="<td ".$class[$field].' '.$onclick[$field].'>'.$posting->{$field}.'</td>';
        }

        if($this->SHOW_OTHER_RANK){
            $str.= '<td '.$indOtherRankClass.' '.$indOtherRank.'>'.$posting->otherRank.'</td>';
        }
        $str.='<td '.$indTotalClass.' '.$indTotal.'>'.$posting->total.'</td></tr>';
        return $str;
    }
    public function generateEmptyTableRow(){
        if($this->SHOW_OTHER_RANK){
            return '<tr class="'.''.'"><td style="">-'.'</td><td style="text-align:left;">'.'</td>
            <td>'.'</td>
            <td>'.'</td>
            <td>'.'</td>
            <td>'.'</td>
            <td>'.'</td>
            <td>'.'</td>
            <td>'.'</td></tr>';
        }else{
            return '<tr class="'.''.'"><td style="">-'.'</td><td style="text-align:left;">'.'</td>
            <td>'.'</td>
            <td>'.'</td>
            <td>'.'</td>
            <td>'.'</td>
            <td>'.'</td>
            <td>'.'</td></tr>';
        }
    }
    public function generateTableRow2($posting,$level,$sno,$width,$tree_posting){
        $htmlData = '';
        $color = 'color'.$level;
        $span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
        if($posting->total>0){
            $span = $this->getSpan($level);
            //$zero = $this->getZero($sno,$level);
            if($level==3){
                    //$zero = $this->getZero($sno,$level);
                    $text = convertToAlphabet($sno[$level]);
            }elseif($level==4){
                    //$zero = $this->getZero($sno,$level);
                    $text = convertToRoman($sno[$level]);
            }elseif($level==5){
                    //$zero = $this->getZero($sno,$level);
                    $text = strtolower(convertToRoman($sno[$level]));
            }else{
                    $zero = $this->getZero($sno,$level);
                    $text = $zero.$sno[$level];
            }
            $htmlData.='<tr class="single_posting_total"><td>'.$span.$text.'</td><td class="posting_name">'/*.$level2*/./*$span.*/$tree_posting->name.'</td>';
            foreach($this->getPermanentRankFields() as $k=>$field){
                $htmlData.=$this->setConsolidatedTableCell($posting,$field);
            }
            //$htmlData.=$this->setConsolidatedTableCell($posting,'insp');
            //$htmlData.=$this->setConsolidatedTableCell($posting,'si');
            //$htmlData.=$this->setConsolidatedTableCell($posting,'asi');
            //$htmlData.=$this->setConsolidatedTableCell($posting,'hc');
            //$htmlData.=$this->setConsolidatedTableCell($posting,'ct');
            if($this->SHOW_OTHER_RANK){
                $htmlData.=$this->setConsolidatedTableCell($posting,'otherRank');
            }
            $htmlData.=$this->setConsolidatedTableCell($posting,'total');
            $htmlData.='</tr>';
        }else{
            if($this->skipZero==false){
                $span = $this->getSpan($level);
                $zero = $this->getZero($sno,$level);
                if($level==3){
                        //$zero = $this->getZero($sno,$level);
                        $text = convertToAlphabet($sno[$level]);
                }elseif($level==4){
                        //$zero = $this->getZero($sno,$level);
                        $text = convertToRoman($sno[$level]);
                }elseif($level==5){
                        //$zero = $this->getZero($sno,$level);
                        $text = strtolower(convertToRoman($sno[$level]));
                }else{
                        $zero = $this->getZero($sno,$level);
                        $text = $zero.$sno[$level];
                }
                $htmlData.='<tr class="single_posting_total"><td>'.$span.$text.'</td><td class="posting_name">'/*.$level2*/./*$span.*/$tree_posting->name.'</td>';
                foreach($this->getPermanentRankFields() as $k=>$field){
                    $htmlData.='<td>'.$posting->{$field}.'</td>';
                }

                if($this->SHOW_OTHER_RANK){
                    $htmlData.= '<td>'.$posting->otherRank.'</td>';
                }
                $htmlData.='<td>'.$posting->total.'</td></tr>';
            }
        }
        return $htmlData;
    }
    public function setSkipZero($skipZero){
        $this->skipZero = $skipZero;
    }
    public function getDeploymentTypes(){
        return $this->deployment_types;
    }
    public function getDeploymentTypesBattalion(){
        unset($this->deployment_types['GO_RANK_DEPLOYMENT']);
        return $this->deployment_types;
    }
    public function getDeploymentTypes2(){
        return $this->deployment_types2;
    }
    public function setDeploymentType2($type){
        $this->deployment_type2 = $type;
    }
    public function getDeploymentType2(){
        return $this->deployment_type2 ;
    }
    public function getDeploymentTypes2ForBattalion(){
        return $this->deployment_types2_for_battalion;
    }
        
    public function downloadViewPostingAsExcel($htmlData,$posting,$finalPostings,$sno,$level,$all_posting_copy,$htmlgroup,$level2,$totals,$previous_child_id,$new_child_id,$parent_id,$old_posting,$skipZero,$battalions,$before_date1,$variousInductionStrengths){
        $this->api = & get_instance();
        $this->api->load->helper('common');
        $this->api->load->library('excel');
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("ERMS-PAP")
                                                                 ->setLastModifiedBy("ERMS-PAP")
                                                                 ->setTitle("Office 2007 XLSX Test Document")
                                                                 ->setSubject("Office 2007 XLSX Test Document")
                                                                 ->setDescription("Posting Consolidate figure of battalion ERMS-PAP.")
                                                                 ->setKeywords("Posting consolidate, Deployment Statement")
                                                                 ->setCategory("Posting Consolidate");
        $counti= 0;
        $objPHPExcel->createSheet($counti);
        $objPHPExcel->setActiveSheetIndex($counti);
        //echo 'Deployment Statement ('.$this->session->userdata('nick').')';
        $objPHPExcel->getActiveSheet()->setTitle('Deployment Statement'); 

        $counter = 0;
        $row=1;

        $titleStyle = array(
                'font'  => array(
                        'size'  => 13,
                        'name'  => 'Verdana',
                        'fill' => array(
                                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                                'color' => array('rgb' => 'FF00a0')
                        )
                        /*'alignment' => array(
                                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        )*/
                ));
        //$unit__ = $this->input->post('unit');
        if(isset($_POST['unit'])){
            $unit__ = $_POST['unit'];
        }
        $deployment_type2 = $this->getDeploymentTypes2()[$this->getDeploymentType2()];
        if($this->api->session->userdata('user_log')==100){
            if(!empty($battalions)){
                    $message = $deployment_type2.' of ';
                    $bats = [];
                    foreach($battalions as $k=>$battalion){
                            $bats[] = $this->battalions[$battalion];
                            //$message .= $this->battalions[$battalion].',';
                    }
                    $message .= implode(' ; ',$bats);
            }else{
                if(in_array($this->api->session->userdata('userid'),[209,210])){
                    $message = $deployment_type2.' on '.$before_date1.' of IRB Battalions!';
                }elseif(in_array($this->api->session->userdata('userid'),[211,212])){
                    $message = $deployment_type2.' on '.$before_date1.' of CDO Battalions!';
                }else{
                    $message = $deployment_type2.' on '.$before_date1.' of All Battalions!';
                }
            }
        }else{
            $message = $deployment_type2.' on '.$before_date1.' of '.$this->battalions[$this->api->session->userdata('userid')].'!';
        }
        $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', $message);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:I1");

        $row++;
        $equipmentNameStyle = array(
                'font'  => array(
                        'size'  => 12,
                        'name'  => 'Verdana',
                        'alignment' => array(
                                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        )
                ));
        $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'S. No.');
        $styleArray = array(
                'font' => array(
                        'bold' => true
                )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A'.$row)->applyFromArray($styleArray);
        $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Duty Name');
        $objPHPExcel->getActiveSheet()->getStyle('B'.$row)->applyFromArray($styleArray);
        
        $cols = array('C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R');
        $k=0;
        foreach($this->getPermanentRanks() as $k=>$val){
            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row, $val.'s');
            $objPHPExcel->getActiveSheet()->getStyle($cols[$k].$row)->applyFromArray($styleArray);
        }
        /*$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, 'INSPs');
        $objPHPExcel->getActiveSheet()->getStyle('C'.$row)->applyFromArray($styleArray);
        $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, 'SIs');
        $objPHPExcel->getActiveSheet()->getStyle('D'.$row)->applyFromArray($styleArray);
        $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, 'ASIs');
        $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->applyFromArray($styleArray);
        $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, 'HC');
        $objPHPExcel->getActiveSheet()->getStyle('F'.$row)->applyFromArray($styleArray);
        $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, 'CTs');
        $objPHPExcel->getActiveSheet()->getStyle('G'.$row)->applyFromArray($styleArray);*/
        $k++;
        if($this->SHOW_OTHER_RANK==true){
            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row, 'Other Ranks');
            $objPHPExcel->getActiveSheet()->getStyle($cols[$k].$row)->applyFromArray($styleArray);
            $k++;
        }
        $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row, 'Total');
        $objPHPExcel->getActiveSheet()->getStyle($cols[$k].$row)->applyFromArray($styleArray);
        $row++;
        $i=0;
        $grand_total = array();
        $skipZero = false;
        if(isset($_POST['downloadExcel'])){
                if(isset($_POST['skipZero'])){
                        $skipZero = true;
                }
        }
        $this->excelViewPosting($htmlData,$posting,$finalPostings,$sno,$level,$all_posting_copy,$htmlgroup,$level2,$totals,$previous_child_id,$new_child_id,$parent_id,$old_posting,$skipZero,$objPHPExcel,$counti,$cols,$i,$row,$variousInductionStrengths);

        //die;
//			// Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="deployment_statement_of'.$this->api->session->userdata('nick').'.'.EXCEL_EXTENSION.'"');
        header('Cache-Control: max-age=0');
//die('daslkfj'   );
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
    public function excelViewPosting(&$htmlData,$tree_posting,$finalPostings,&$sno,$level=0,$all_posting_copy,&$htmlgroup,&$level2,&$totals,&$previous_child_id,&$new_child_id,&$parent_id,&$old_posting,$skipZero,$objPHPExcel,&$counti,&$cols,&$i,&$row,$variousInductionStrengths=null){
        //$this->api = & get_instance();
        //$this->api->load->helper('common');
        //$this->api->load->library('excel');
			//$this->load->helper('common');
        $cols = array('C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R');
			$styleArray = array(
				'font' => array(
					'bold' => true
				)
			);
			if(null!=$variousInductionStrengths){
				foreach($variousInductionStrengths as $key=>$val){
					if($val==null){
						$row++;
					}else{
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$val->sno);
						$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->applyFromArray($styleArray);					
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$val->title);
						$objPHPExcel->getActiveSheet()->getStyle('B'.$row)->applyFromArray($styleArray);
                                                $k=0;
                                                foreach($this->permanent_ranks_fields as $k=>$field){
                                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$val->{$field});
                                                    $objPHPExcel->getActiveSheet()->getStyle($cols[$k].$row)->applyFromArray($styleArray);
                                                }
/*						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row,$val->insp);
						$objPHPExcel->getActiveSheet()->getStyle('C'.$row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row,$val->si);
						$objPHPExcel->getActiveSheet()->getStyle('D'.$row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row,$val->asi);
						$objPHPExcel->getActiveSheet()->getStyle('E'.$row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row,$val->hc);
						$objPHPExcel->getActiveSheet()->getStyle('F'.$row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row,$val->ct);
						$objPHPExcel->getActiveSheet()->getStyle('G'.$row)->applyFromArray($styleArray);*/
                                                $k++;
                                                if($this->SHOW_OTHER_RANK==true){
                                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$val->otherRank);
                                                    $objPHPExcel->getActiveSheet()->getStyle($cols[$k].$row)->applyFromArray($styleArray);
                                                    $k++;
                                                }
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$val->total);
						$objPHPExcel->getActiveSheet()->getStyle($cols[$k].$row)->applyFromArray($styleArray);
						$row++;
					}
				}
			}
			if($tree_posting->haveChildren==true && ((in_array($this->deployment_type2,[1,3]))?$tree_posting->view=='EXPANDED':true)){
				$parent_id = $tree_posting->id;
				$level2++;
				$sno[$level+2] = 0;
				$level++;
				
				
				$width = 0;
				for($i=0;$i<$level;$i++){
					$width +=20;
				}
				$old_posting=$posting = $all_posting_copy[$tree_posting->id];
				if(!($posting->total==0 && $skipZero==true)){
                                   if(!isset($sno[$level])){
					$sno[$level]=1;
                                    }else{
                                            $sno[$level]++;
                                    }
                                }
				
				if($level2==2){
					
					$tree_posting_name = ''.$tree_posting->name.'';
				}else{
					$tree_posting_name = $tree_posting->name;
				}
				if($posting->id!=1){
					if($posting->total!=0){
						$row++;
						if($level==3){
							//$zero = $this->getZero($sno,$level);
							$text = convertToAlphabet($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,'');
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$text.'. '.$tree_posting_name);
						}elseif($level==4){
							//$zero = $this->getZero($sno,$level);
							$text = convertToRoman($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting_name);
						}elseif($level==5){
							//$zero = $this->getZero($sno,$level);
							$text = strtolower(convertToRoman($sno[$level]));
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting->name);
						}else{
							$zero = '';//$this->getZero($sno,$level);
							$text = $zero.$sno[$level];
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,'');
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$text.'. '.$tree_posting_name);
						}
						
						$styleArray = array(
							'font' => array(
								'bold' => true
							)
						);
						$objPHPExcel->getActiveSheet()->getStyle('B'.$row)->applyFromArray($styleArray);
						//$htmlData.='<tr class="total_row"><td></td><td>'/*.$level2*/.' '/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
					}else{
						if($skipZero==false){
							$row++;
							if($level==3){
								//$zero = $this->getZero($sno,$level);
								$text = convertToAlphabet($sno[$level]);
								$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,'');
								$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$text.'. '.$tree_posting_name);
							}elseif($level==4){
								//$zero = $this->getZero($sno,$level);
								$text = convertToRoman($sno[$level]);
								$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$text);
								$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting_name);
							}elseif($level==5){
								//$zero = $this->getZero($sno,$level);
								$text = strtolower(convertToRoman($sno[$level]));
								$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$text);
								$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting->name);
							}else{
								$zero = '';//$this->getZero($sno,$level);
								$text = $zero.$sno[$level];
								$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,'');
								$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$text.'. '.$tree_posting_name);
							}
							/* $text = convertToRoman($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting_name); */
							$styleArray = array(
								'font' => array(
									'bold' => true
								)
							);
							$objPHPExcel->getActiveSheet()->getStyle('B'.$row)->applyFromArray($styleArray);
							//$htmlData.='<tr class="total_row"><td></td><td>'/*.$level2*/.' '/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
						}
					}
				}else{
					$row--;
				}
				
				$previous_child_id=$posting->parent_posting_id;
				$a=0;
				foreach($tree_posting->childrens as $k=>$child){
					//$row++;
					$this->excelViewPosting($htmlData,$child,$finalPostings,$sno, $level,$all_posting_copy,$htmlgroup,$level2,$totals,$previous_child_id,$new_child_id,$parent_id,$old_posting,$skipZero, $objPHPExcel,$counti,$cols,$i,$row);
					
				}
				//$row++;
				if($level2==2){
					//$htmlData.='<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
				}else{
					
				}
				if($level==1){
					$total_row = /*$span.*/'Total of '.$tree_posting->name;
					$class = 'total_row1';
				}elseif($level==2){
					//$total_row = '<i><u>'./*$span.*/'Total of '.$tree_posting->name.'</u></i>';
					$total_row = ''./*$span.*/'Total of '.$tree_posting->name.'';
					$class = 'total_row2';
				}else if($level==3){
					$total_row = /*$span.*/'Total of '.$tree_posting->name;
					$class = 'total_row3';
				}else{
					$total_row = /*$span.*/'Total of '.$tree_posting->name;
					$class = 'total_row';
				}
				if($posting->total!=0){
					$row++;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$total_row);
					//make bold
					$styleArray = array(
						'font' => array(
							'bold' => true
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle('B'.$row)->applyFromArray($styleArray);
					//align fright
					$objPHPExcel->getActiveSheet()->getStyle('B'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                                        $k=0;
                                        foreach($this->permanent_ranks_fields as $k=>$field){
                                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$posting->{$field});
                                            $objPHPExcel->getActiveSheet()->getStyle($cols[$k].$row)->applyFromArray($styleArray);
                                        }
                                        $k++;
					/*$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row,$posting->insp);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row,$posting->si);
					$objPHPExcel->getActiveSheet()->getStyle('D'.$row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row,$posting->asi);
					$objPHPExcel->getActiveSheet()->getStyle('E'.$row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row,$posting->hc);
					$objPHPExcel->getActiveSheet()->getStyle('F'.$row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row,$posting->ct);
					$objPHPExcel->getActiveSheet()->getStyle('G'.$row)->applyFromArray($styleArray);
                                         * */
                                         if($this->SHOW_OTHER_RANK==true){
                                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$posting->otherRank);
                                            $objPHPExcel->getActiveSheet()->getStyle($cols[$k].$row)->applyFromArray($styleArray);
                                            $k++;
                                         }
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$posting->total);
					$objPHPExcel->getActiveSheet()->getStyle($cols[$k].$row)->applyFromArray($styleArray);
					//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:right;">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
				}else{
					if($skipZero==false){
						$row++;
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$total_row);
						$styleArray = array(
						'font' => array(
							'bold' => true
						)
						);
						$objPHPExcel->getActiveSheet()->getStyle('B'.$row)->applyFromArray($styleArray);
						$objPHPExcel->getActiveSheet()->getStyle('B'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                                                foreach($this->permanent_ranks_fields as $k=>$field){
                                                $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$posting->{$field});
						$objPHPExcel->getActiveSheet()->getStyle($cols[$k].$row)->applyFromArray($styleArray);
                                                }
						/*$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row,$posting->insp);
						$objPHPExcel->getActiveSheet()->getStyle('C'.$row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row,$posting->si);
						$objPHPExcel->getActiveSheet()->getStyle('D'.$row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row,$posting->asi);
						$objPHPExcel->getActiveSheet()->getStyle('E'.$row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row,$posting->hc);
						$objPHPExcel->getActiveSheet()->getStyle('F'.$row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row,$posting->ct);
						$objPHPExcel->getActiveSheet()->getStyle('G'.$row)->applyFromArray($styleArray);*/
                                                $k++;
                                                if($this->SHOW_OTHER_RANK==true){
                                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$posting->otherRank);
                                                    $objPHPExcel->getActiveSheet()->getStyle($cols[$k].$row)->applyFromArray($styleArray);
                                                    $k++;
                                                }
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$posting->total);
						$objPHPExcel->getActiveSheet()->getStyle($cols[$k].$row)->applyFromArray($styleArray);
						//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:right;">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
					}
				}
				$level2--;
			}else{
				$level++;
                                /*if(!($posting->total==0 && $skipZero==true)){
                                    if(!isset($sno[$level])){
                                            $sno[$level]=1;
                                    }else{
                                            $sno[$level]++;
                                    }
                                }*/
				$posting = $this->getPostingFromWhoseIdIs($finalPostings,$tree_posting);
                                if(!($posting->total==0 && $skipZero==true)){
                                    if(!isset($sno[$level])){
                                            $sno[$level]=1;
                                    }else{
                                            $sno[$level]++;
                                    }
                                }
				if($posting->parent_posting_id== $old_posting->parent_posting_id){
				
				}
				if($posting->parent_posting_id!= $old_posting->parent_posting_id){
					
					//$level2++;
					$old_posting = $posting;
				}
				$width = 0;
				for($i=0;$i<$level;$i++){
					$width +=20;
				}
				
				$color = 'color'.$level;
				$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
				if($posting->total>0){
					$row++;
					if($level==3){
						//$zero = $this->getZero($sno,$level);
						$text = convertToAlphabet($sno[$level]);
						
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$text.'. '.$tree_posting->name);
					}elseif($level==4){
						//$zero = $this->getZero($sno,$level);
						$text = convertToRoman($sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$text);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting->name);
					}elseif($level==5){
							//$zero = $this->getZero($sno,$level);
						$text = strtolower(convertToRoman($sno[$level]));
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$text);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting->name);
					}else{
						$zero = $this->getZero($sno,$level);
						$text = $zero.$sno[$level];
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting->name);
					}
					$k=0;
					foreach($this->permanent_ranks_fields as $k=>$field){
                                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$posting->{$field});
                                        }
					/*$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row,$posting->insp);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row,$posting->si);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row,$posting->asi);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row,$posting->hc);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row,$posting->ct);*/
                                        $k++;
                                        if($this->SHOW_OTHER_RANK==true){
                                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$posting->otherRank);
                                            $k++;
                                        }
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$posting->total);
					//$htmlData.='<tr class="single_posting_total"><td>'.$sno[$level].'</td><td>'/*.$level2*/./*$span.*/$tree_posting->name.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td></tr>';
				}else{
					if($skipZero==false){
						$row++;
						if($level==3){
							//$zero = $this->getZero($sno,$level);
							$text = convertToAlphabet($sno[$level]);
							
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$text.'. '.$tree_posting->name);
						}elseif($level==4){
							//$zero = $this->getZero($sno,$level);
							$text = convertToRoman($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting->name);
						}elseif($level==5){
							//$zero = $this->getZero($sno,$level);
							$text = strtolower(convertToRoman($sno[$level]));
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting->name);
						}else{
							$zero = $this->getZero($sno,$level);
							$text = $zero.$sno[$level];
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting->name);
						}
						$k=0;
                                                foreach($this->permanent_ranks_fields as $k=>$field){
                                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$posting->{$field});
                                                }
						/*$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row,$posting->insp);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row,$posting->si);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row,$posting->asi);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row,$posting->hc);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row,$posting->ct);*/
                                                $k++;
                                                if($this->SHOW_OTHER_RANK==true){
                                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$posting->otherRank);
                                                    $k++;
                                                }
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$k].$row,$posting->total);
						//$htmlData.='<tr class="single_posting_total"><td>'.$sno[$level].'</td><td>'/*.$level2*/./*$span.*/$tree_posting->name.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td></tr>';
					}
				}
			}
			//echo $htmlData;
		}
                public function setBattalions($battalions){
                    $this->battalions = $battalions;
                }
                public function getRankCategories(){
                    return $this->rank_categories;
                }
                public function getRankCategory(){
                    return $this->rank_category;
                }
                public function setSelectedRankField($field){
                    if($field!=null){
                        $this->selected_rank_field = $field;
                    }
                }
                public function getSelectedRankField(){
                    return $this->selected_rank_field;
                }
                public function getSelectedRanksAccordingToField(){
                    //echo $this->selected_rank_field;
                    if($this->selected_rank_field!=null && $this->selected_rank_field!='total'){
                        //var_dump($this->rankRelation);
                        return $this->rankRelation[$this->selected_rank_field];
                    }else{
                        return $this->ranks;
                    }
                }
                public function getSelectedRankFromSelectedField(){
                    if($this->selected_rank_field!=null && $this->selected_rank_field!='total'){
                        return $this->permanent_ranks_fields_rank_names_relation[$this->selected_rank_field];
                    }else{
                        return null;
                    }
                }
                public function getOrderByRanks($order=null){
                    if($order=='desc'){
                        $order_by_ranks = 'FIELD(cexrank';
                        foreach(array_reverse($this->ranks) as $k=>$val){
                            $order_by_ranks.=',\''.$val.'\'';
                        }
                        $order_by_ranks.=')';
                        return $order_by_ranks;
                    }else{
                        return $this->order_by_ranks;
                    }
                }
                //$this->order_by_ranks = "FIELD(cexrank,'INSP','INSP/LR','INSP/CR','SI', 'SI/LR','SI/CR','ASI','ASI/LR','ASI/CR','ASI/ORP','HC','HC/LR', 'HC/PR', 'HC/CR','C-II','Sr. Const', 'Sr.Const','CT' )";
                //$this->ranks = ['INSP','SI','INSP/LR','INSP/CR','ASI','SI/LR','SI/CR','HC','ASI/LR','ASI/CR','ASI/ORP','CT','Sr. Const','Sr.Const','C-II','HC/LR','HC/PR','HC/CR'];
}

