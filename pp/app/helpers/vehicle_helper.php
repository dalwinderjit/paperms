<?php
/*Start Action info fetch one recored*/
    function vehicles_GetAllVehicles(){
        $cov = array('' => '--Select--','Ambulance' => 'Ambulance', 'BUS 52 Seater' => 'BUS 52 Seater', 'Truck' => 'Truck', 'Canter/Tata 407' => 'Canter/Tata 407','Canter/SML ISUZU'=>'Canter/SML ISUZU', 'M/Cycle (Royel Enfield)' => 'M/Cycle (Royel Enfield)', 'M/Cycle (Bajaj Pulsar)' => 'M/Cycle (Bajaj Pulsar)', 'Mini Bus' => 'Mini Bus','Toyota (Kirloskar Motor)' => 'Toyota (Kirloskar Motor)','Bolero (M & M)' => 'Bolero (M & M)', 'Xylo (M & M)' => 'Xylo (M & M)', 'Maruti Suzuki (Ertiga)' =>'Maruti Suzuki (Ertiga)', 'Scorpio (M & M)' => 'Scorpio (M & M)', 'Tata Sumo' => 'Tata Sumo','Gypsy' =>'Gypsy','Sumo Victa' => 'Sumo Victa','Jeep' => 'Jeep', 'Water Tank' => 'Water Tank','MAP Truck' => 'MAP Truck','Tractor' => 'Tractor','Ambassador Car' => 'Ambassador Car','M/Cycle (Suzuki)' => 'M/Cycle (Suzuki)','Van (Maruti Omni)' => 'Van (Maruti Omni)','Canter (Eicher)' => 'Canter (Eicher)','Bus 42 Seater' => 'Bus 42 Seater','Mahindra Invader' => 'Mahindra Invader', 'Bus 44 Seater' => 'Bus 44 Seater','Bus 45 Seater' => 'Bus 45 Seater','M/Cycle (Hero Karizma)' => 'M/Cycle (Hero Karizma)','Qualis' => 'Qualis','Tempo Trax Gama' => 'Tempo Trax Gama','Hero Honda' => 'Hero Honda','Bajaj Platina' => 'Bajaj Platina','Innova' => 'Innova','Maruti Suzuki SX-4' => 'Maruti Suzuki SX-4','Truck (Training)' => 'Truck (Training)','Gypsy (Training)' =>'Gypsy (Training)','Canter/Tata 407 (Training)' => 'Canter/Tata 407 (Training)','M/Cycle (Suzuki)(Training)' => 'M/Cycle (Suzuki) (Training)','Bolero (M & M) (Training)' => 'Bolero (M & M) (Training)','Mini Bus (Training)' => 'Mini Bus (Training)','Ambassador Car (Training)' => 'Ambassador Car (Training)','M/Cycle (Royel Enfield) (Training)' => 'M/Cycle (Royel Enfield) (Training)','Force Motors Ambulance' => 'Force Motors Ambulance','Mobile Kitchen and Food Van'=>'Mobile Kitchen and Food Van');
        return $cov;
    }
    /*function fetchoneinfopollistpost6($id,$m,$y){
        $CI= & get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->where('reg_no',$id);
        $CI->db->where('cmonthi<=',$m);
        $CI->db->where('cyear1<=',$y);
        $CI->db->where('bat_id', $CI->session->userdata('userid'));
        $CI->db->order_by('issue_vehicle_id','DESC');
        $query = $CI->db->get('issue_vehicle');
        //echo $CI->db->last_query();
        $info = $query->result();
        return $info;
    }*/