<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /*Total function: 7*/
    /*Start Common_model class*/
    class Leave_model extends CI_Model{
            var $order_column = array(null, "posting_id", "type");
            private $table = 'leaves';
            private $table2 = 'l_employee_leaves';

            public function getLeaves(){
                $this->db->select('*');
                $this->db->from($this->table);
                $query = $this->db->get();
                $result = $query->result();
                return $result;
            }
            public function getLeaveIdByPosingId($posting_id){
                $this->db->select('id');
                $this->db->where('posting_id',$posting_id);
                $this->db->from($this->table);
                $query = $this->db->get();
                $result = $query->result();
                return $result[0]->id;  
            }
            public function mark_leave($data){
                var_dumP($data);
                $a = $this->db->insert($this->table2,$data);
                if($a){
                    return true;
                }else{
                    return false;
                }
            }
            public function mark_leave_bulk($data1_){
                    $no_of_records_inserted = $this->db->insert_batch($this->table2,$data1_);
                    return $no_of_records_inserted;
            }
            /**
             * 
             * @param type $posting_id
             * @param type $type
             * @return type
             */
            public function addLeave($posting_id,$type){
                    $data = ['posting_id'=>$posting_id,'created'=>date('Y-m-d H:i:s'),'enabled'=>'YES','deleted'=>'NO'];
                    $a = $this->db->insert($this->table,$data);
                    return $a ;
            }

    }