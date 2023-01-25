<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class OSI extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_post($id = 0)
	{
        
        /*if(!empty($id)){
            $this->db->limit(10);
            $this->db->where('man_id',$id);
            $data = $this->db->get("newosi")->result();
            //$data = $this->db->get_where("new", ['id' => $id])->row_array();
        }else{
            $this->db->select("man_id,name");
            $this->db->limit(10);
            $data = $this->db->get("newosi")->result();
        }*/
        $employee_type = $this->input->post('employee_type');
        $data = [
            "data"=>[
            [
                'sno'=>1,
                'employee_id'=>112,
                'name'=>'Dalwinder',
                'rank'=>"CT",
                'battalion'=>'27 pap',
                'amount'=>'0'
            ],
            [
                'sno'=>2,
                'employee_id'=>113,
                'name'=>'Gurmit',
                'rank'=>"Sr CT",
                'battalion'=>'80 pap',
                'amount'=>'0'
            ],
            [
                'sno'=>3,
                'employee_id'=>114,
                'name'=>'Surinder',
                'rank'=>"ASI",
                'battalion'=>'27 pap',
                'amount'=>'0'
            ],
            [
                'sno'=>4,
                'name'=>'Viijauy',
                'employee_id'=>115,
                'rank'=>"COOK",
                'battalion'=>'27 pap',
                'amount'=>'0'
            ]
            ],
            'recordsTotal'=>1600,
            'recordsFiltered'=>4
        ];
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_get()
    {
        return $this->index_post();
        die;
        $input = $this->input->post();
        $this->db->insert('items',$input);
     
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('items', $input, array('id'=>$id));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('items', array('id'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}