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
class BPT_lib
{
    //put your code here
    private $deployment_type = null;

    //
    public function __construct($deployment_type = null, $deployment_type2 = null)
    {
    }

    public function getBPTListFromAPI()
    {
        $curl = curl_init();
        //echo API_URL."GetBPTList";
        curl_setopt_array($curl, array(
            CURLOPT_URL => API_URL . "GetBPTList",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            //CURLOPT_POSTFIELDS => http_build_query(["selected_employees" => explode(',', $selected_employees), 'bpt_id' => 1]),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        //var_dump($response);
        $err = curl_error($curl);
        curl_close($curl);
        $json_data = json_decode($response);
        //var_dump($json_data);
        return $json_data->data;
    }
    public function GetEmployeesByIds($ids)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => API_URL . "getCandidatesByIds",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query(['ids' => $ids]),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));
        $response1 = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        /*$a = new stdClass();
        $a->id = 24144;
        $a->text = "CT Dalwinderjti ISgh";
        $a1 = new stdClass();
        $a1->id = 3917;
        $a1->text = "CT Gurmit SIngh Singh";
        return [
            $a, $a1
        ];*/
        $data = json_decode($response1); 
        //var_dump($response1);
        return $data->results;
    }
    public function getBPTCandidates($bpt_id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => API_URL . "getBPTCandidates",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query(['bpt_id' => $bpt_id]),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));
        $response1 = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response1;
    }
    public function AddCandidateToBPT($selected_employees,$bpt_id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => API_URL . "addCandidatesToBPT",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query(["selected_employees" => explode(',', $selected_employees), 'bpt_id' => $bpt_id]),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        //var_dumP($response);die;
        $err = curl_error($curl);
        curl_close($curl);
        $json_data = json_decode($response);
        return $json_data;
    }
    public function GetCandidateInBPTById($id){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => API_URL."getCandidateInBPTById",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS=>http_build_query(['id'=>$id]),
            CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $data_ = json_decode($response);
        return $data_;
    }
    public function getBeltNumbers($term,$pageNo){
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => API_URL."getUserByBeltNo",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS=>http_build_query(["depttno"=>$term,"pageNo"=>$pageNo]),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            return $response;
    }
    public function EditEmployeeInBPT($data){
        $curl = curl_init();
        //data
        //echo '<HR>FILES<HR>';
        //var_dump($_FILES);
        if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error']==0){
            //echo 'hi 00202';
            $cfile = curl_file_create($_FILES['profile_pic']['tmp_name'],$_FILES['profile_pic']['type'],$_FILES['profile_pic']['name']);
            $data['profile_pic']= $cfile;
        }else{
            //$data['profile_pic'] = null;
        }
        //die;
        //var_dump($_FILES['profile_pic']);
        //var_dump($data);
        //echo '<HR>';
        curl_setopt_array($curl, array(
            CURLOPT_URL => API_URL."updateCandidateToBPT",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS=>$data,
            //CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));
        try{

            $response = curl_exec($curl);
        }catch(Exception $err){
            //echo 'Exception';
            //var_dump($err);
            //die;
        }
        //echo 'ERROR';
        $err = curl_error($curl);
        //var_dump($err);
        curl_close($curl);
        //echo 'response ';
        ////var_dumP($response);die;
        return json_decode($response);
    }

}
