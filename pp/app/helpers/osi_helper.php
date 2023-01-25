<?php
/*Start Action info fetch one recored*/
    function osi_getAllRanks2(){
        return ["GO"=>["DIG","Commandant","Asst. Commandant","SP","DSP"],
            "NGO"=>["INSP","SI","ASI","HC","CT"],
            "CLASS_IV(C)"=>["Cook","Water Carrier","Dhobi","Sweeper","Barber","Mochi","Tailor","Carpenter","Mali","Electrician","Peon","Mason","Syce"],
            "MINISTERIAL_STAFF"=>["Senior Asstt.","Clerk","Supdt Grade-I","Steno"],
            "MEDICAL_STAFF"=>["Lab Technician","Nursing Asstt.","Junior Asstt.","Pharmacist","Doctor"],
            "ORPHAN",[""]];
    }
    function osi_getAllRanks(){
        return [
            "GO"=>osi_getGORanks(),
            "NGO"=>osi_getNGORanks(),
            "OR"=>osi_getORRanks(),
            "CLASS_IV_C"=>osi_getCLASS_IV_C_Ranks(),
            "CLASS_IV_P"=>osi_getCLASS_IV_P_Ranks(),
            "MINISTERIAL_STAFF"=>osi_getMinisterialRanks(),
            "MEDICAL_STAFF"=>osi_getMedicalRanks(),
            "ORPHAN",[""]
        ];
    }
    function osi_getGORanks(){
        return array_reverse(['DSP/CR' =>'DSP/CR','DSP' =>'DSP','AIG' => 'AIG','SP/CR' => 'SP/CR', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant','DIG'=>'DIG', 'IG'=>'IG',  'ADGP'=>"ADGP",'DGP'=>'DGP']);
    }
    function osi_getNGORanks(){
        return array_reverse(['ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR',  'ASI' => 'ASI', 'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP']);
    }
    function osi_getORRanks(){
        return array_reverse(['CT' => 'CT', 'Sr.Const' => 'Sr.Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'HC/LR' => 'HC/LR','HC/CR' => 'HC/CR']);
    }
    function osi_getCLASS_IV_C_Ranks(){
        return ['Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali','Mechanic' => 'Mechanic', 'Electrician' => 'Electrician', 'Painter' => 'Painter','Syce' => 'Syce','Plumber'=>'Plumber'];
    }
    function osi_getCLASS_IV_P_Ranks(){
        return ['Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali','Mechanic' => 'Mechanic', 'Electrician' => 'Electrician', 'Painter' => 'Painter','Syce' => 'Syce','Plumber'=>'Plumber'];
    }
    function osi_getMinisterialRanks(){
        return ['Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.','Stenographer'=>'Stenographer' , 'Junior Scale Stenographer' => 'Junior Scale Stenographer', 'Senior Scale Stenographer' => 'Senior Scale Stenographer', 'Clerk' => 'Clerk', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Supdt Grade-I' => 'Supdt Grade-I','Supdt Grade-II' => 'Supdt Grade-II'];
        //return ['Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.', 'Clerk' => 'Clerk','Steno' => 'Steno', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Supdt Grade-I' => 'Supdt Grade-I','SubSupdt Grade-II' => 'Supdt Grade-II','Steno'=>'Stenographer'];
    }
    function osi_getMedicalRanks(){
        return ['Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.'];
    }
    function osi_getStaffTypes2(){
        return [
            "Executive Staff"=>['GO'=>'GO','NGO'=>'NGO','OR'=>'OR'],
            "Ministerial Staff"=>'MINISTERIAL_STAFF',
            "Medical Staff"=>'MEDICAL_STAFF',
            "Class-IV (P)"=>'CLASS_IV_P',
            "Class-IV (C)"=>'CLASS_IV_C'
        ];
    }
    function osi_getStaffTypes(){
        return [
            "GO"=>"Executive Staff",
            "NGO"=>"Executive Staff",
            "OR"=>"Executive Staff",
            "CLASS_IV_P"=>"Class-IV (P)",
            "CLASS_IV_C"=>"Class-IV (C)",
            "MINISTERIAL_STAFF"=>"Ministerial Staff",
            "MEDICAL_STAFF"=>"Medical Staff"
        ];
    }
    function osi_EmployeeTypeAbbrevations(){
        return [
            "GO"=>"Gadgeted Officers",
            "NGO"=>"Non Gadgeted Officers",
            "OR"=>"Other Ranks",
            "CLASS_IV_P"=>"Class-IV (P)",
            "CLASS_IV_C"=>"Class-IV (C)",
            "MINISTERIAL_STAFF"=>"Ministerial Staff",
            "MEDICAL_STAFF"=>"Medical Staff"
        ];
    }
    function osi_getRank($employee){
        $rank = '';
        if($employee->permanent_rank!=null){
            $rank = $employee->permanent_rank;
        }else if($employee->cminirank!=null){
            $rank = $employee->cminirank;
        }else if($employee->cmedirank!=null){
            $rank = $employee->cmedirank;
        }else if($employee->ccprank!=null){
            $rank = $employee->ccprank;
        }else if($employee->cccrank!=null){
            $rank = $employee->cccrank;
        }
        return $rank;
    }
    function get_EmployeeType($staffType,$rank=null,$a=false){
        $orphan = 'ORPHAN';
        if($staffType!=''){
            $type = osi_getStaffTypes2()[$staffType];
            /*if($a==true){
                echo '<hr>';
                var_dump($staffType);
                var_dump($type);
                var_dump($type);
            }*/
            if(is_array($type)){
                if($rank!=null){
                    if(in_array($rank,osi_getGORanks())){
                        return $type['GO'];
                    }else if(in_array($rank,osi_getNGORanks())){
                        return $type['NGO'];
                    }else if(in_array($rank,osi_getORRanks())){
                        return $type['OR'];
                    }else{
                        return $orphan;
                    }
                }
                return $orphan;
            }
            return $type;
        }else{
            return $orphan;
        }
    }
    function osi_getRanksByEmployeeType($employee_type,$allRanks){
        if($employee_type==''){
            return '';
        }else{
            if(isset($allRanks[$employee_type]))
                return $allRanks[$employee_type];
            else
                return '';
        }
    }
    function osi_initialize_rank_counter(){ 
        $keys =  array_keys(osi_getStaffTypes());
        $arr = [];
        foreach($keys as $k=>$val){
            $arr[$val] = [];
        }
        return $arr;
    }
	 function get_present_ranks()
	 {
		return ['CT' => 'CT', 'Sr.Const' => 'Sr.Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC/LR' => 'HC/LR','HC/CR' => 'HC/CR','HC' => 'HC', 'ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR', 'ASI/ORP' => 'ASI/ORP', 'ASI' => 'ASI',  'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' =>'DSP/CR','DSP' =>'DSP','AIG' => 'AIG', 'SP/CR' => 'SP/CR', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant','DIG'=>'DIG', 'IG'=>'IG',  'ADGP'=>"ADGP",'DGP'=>'DGP']; 
	 }		 
	/*Close Action info fetch one recored*/
	function get_permanent_ranks()
	 {
		return ['CT' => 'CT','HC'=>'HC','ASI' => 'ASI','SI' => 'SI','INSP' => 'INSP', 'DSP' =>'DSP', 'SP' => 'SP','AIG' => 'AIG','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant']; 
	 }
         function osi_getAllBattalions(){
            $battalionOrder = array(
							227=>'ADGP ADMIN - SAP',
                            32=>'7 - PAP',
                            105=>'9 - PAP',
                            134=>'13 - PAP',
                            46=>'27 - PAP',
                            186=>'36 - PAP',
                            7=>'75 - PAP',
                            53=>'80 - PAP',
                            139=>'82 - PAP',
                            74=>'RTC - PAP',
							
                            128=>'ISTC',
                            //93=>'CSO PAP',
                            60=>'CR PAP',
                            //87=>'ADGP Control Room',
                            192=>'1 - IRB',
                            167=>'2 - IRB',
                            156=>'3 - IRB',
                            115=>'4 - IRB',
                            110=>'5 - IRB',
                            162=>'6 - IRB',
                            123=>'7 - IRB',
                           // 217=>'IGP-IRB-OSI',
                    //214=>'IGP - IRB',
                            //204=>'RTC LADDA KOTHI - IRB',
                            100=>'1 - CDO',
                            174=>'2 - CDO',
                            144=>'3 - CDO',
                            150=>'4 - CDO',
                            180=>'5 - CDO',
                            213=>'CCR BHG',
                    //215=>'IGP - CDO',
                            198=>'CTC - BG',
                            //92=>'ARP - PAP',
                            //91=>'SSG - PAP',
            );
            return $battalionOrder	;
        }
         function osi_getOverallBattalions(){
            $battalionOrder = array(
							227=>'ADGP ADMIN - SAP',
                            32=>'7 - PAP',
                            105=>'9 - PAP',
                            134=>'13 - PAP',
                            46=>'27 - PAP',
                            186=>'36 - PAP',
                            7=>'75 - PAP',
                            53=>'80 - PAP',
                            139=>'82 - PAP',
                            74=>'RTC - PAP',
                            128=>'ISTC',
                            93=>'CSO PAP',
                            60=>'ADGP PAP',
                            87=>'ADGP Control Room',
                            192=>'1 - IRB',
                            167=>'2 - IRB',
                            156=>'3 - IRB',
                            115=>'4 - IRB',
                            110=>'5 - IRB',
                            162=>'6 - IRB',
                            123=>'7 - IRB',
                            217=>'IGP-IRB-OSI',
                            214=>'IGP - IRB',
                            204=>'RTC LADDA KOTHI - IRB',
                            100=>'1 - CDO',
                            174=>'2 - CDO',
                            144=>'3 - CDO',
                            150=>'4 - CDO',
                            180=>'5 - CDO',
                            213=>'CCR BHG',
                            215=>'IGP - CDO',
                            198=>'CTC - BG',
                            92=>'ARP - PAP',
                            91=>'SSG - PAP',
            );
            return $battalionOrder	;
        }
        function osi_getIRBBattalions(){
            $battalionOrder = array(
                            /*32=>'7 - PAP',
                            105=>'9 - PAP',
                            134=>'13 - PAP',
                            46=>'27 - PAP',
                            186=>'36 - PAP',
                            7=>'75 - PAP',
                            53=>'80 - PAP',
                            139=>'82 - PAP',
                            74=>'RTC - PAP',
                            128=>'ISTC',
                            93=>'CSO PAP',
                            60=>'ADGP PAP',*/
                            //87=>'ADGP Control Room',
							
                            192=>'1 - IRB',
                            167=>'2 - IRB',
                            156=>'3 - IRB',
                            115=>'4 - IRB',
                            110=>'5 - IRB',
                            162=>'6 - IRB',
                            123=>'7 - IRB',
                            //217=>'IGP-IRB-OSI',
                    //214=>'IGP - IRB',
                            //204=>'RTC LADDA KOTHI - IRB',
                            /*100=>'1 - CDO',
                            174=>'2 - CDO',
                            144=>'3 - CDO',
                            150=>'4 - CDO',
                            180=>'5 - CDO',
                            213=>'CCR BHG',
                    //215=>'IGP - CDO',
                            198=>'CTC - BG',
                            //92=>'ARP - PAP',
                            //91=>'SSG - PAP',*/
            );
            return $battalionOrder	;
        }
        function osi_getCDOBattalions(){
            $battalionOrder = array(
                            /*32=>'7 - PAP',
                            105=>'9 - PAP',
                            134=>'13 - PAP',
                            46=>'27 - PAP',
                            186=>'36 - PAP',
                            7=>'75 - PAP',
                            53=>'80 - PAP',
                            139=>'82 - PAP',
                            74=>'RTC - PAP',
                            128=>'ISTC',
                            93=>'CSO PAP',
                            60=>'ADGP PAP',*/
                            //87=>'ADGP Control Room',
                            /*192=>'1 - IRB',
                            167=>'2 - IRB',
                            156=>'3 - IRB',
                            115=>'4 - IRB',
                            110=>'5 - IRB',
                            162=>'6 - IRB',
                            123=>'7 - IRB',*/
                            //217=>'IGP-IRB-OSI',
                    //214=>'IGP - IRB',
                            //204=>'RTC LADDA KOTHI - IRB',
                            100=>'1 - CDO',
                            174=>'2 - CDO',
                            144=>'3 - CDO',
                            150=>'4 - CDO',
                            180=>'5 - CDO',
                            213=>'CCR BHG',
                    //215=>'IGP - CDO',
                            198=>'CTC - BG',
                            //92=>'ARP - PAP',
                            //91=>'SSG - PAP',*/
            );
            return $battalionOrder	;
        }
        
        function osi_create_date_from_age($age){
                $date = date('Y-m-d H:i:s');
                $lastHundredyear = strtotime("-$age year", strtotime($date));
                return date("Y-m-d", $lastHundredyear);
        }
        function osi_get_age_filter_type($age_filter){
            if(preg_match('/^[\d]+-[\d]+$/', $age_filter)){
                return 'RANGE_FILTER';
            }elseif(preg_match('/^>[\d]+$/', $age_filter)){
                return 'GREATOR_THAN_FILTER';
            }elseif(preg_match('/^>=[\d]+$/', $age_filter)){
                return 'GREATOR_THAN_EQUAL_TO_FILTER';
            }elseif(preg_match('/^<[\d]+$/', $age_filter)){
                return 'LESS_THAN_FILTER';
            }elseif(preg_match('/^<=[\d]+$/', $age_filter)){
                return 'LESS_THAN_EQUAL_TO_FILTER';
            }elseif(preg_match('/^[\d]+$/', $age_filter)){
                return 'EXACT_FILTER';
            }else{
                return 'INVALID';
            }
        }
?>