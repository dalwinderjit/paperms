<?php if (!defined('BASEPATH')) exit('You have not permission to access');
class Ammunition extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->permission->is_logged_in();
        $this->permission->clear_cache();
        $this->load->model('Ammunition_model');
        //$this->load->library('pagination');
    }
    /**
	THIS FUNCTION WILL CONVERT SERVICE AMMUNITION TO PRACTICE
     */
    public function service_to_practice()
    {
        //INPUT
        //GET THE BAT_ID current user id
        $bat_id = $this->session->userdata['userid'];
        $save = $this->input->post('submit');
        $submitted = false;
        $from_id = null;
        $to_id = null;
        $conversion_type = null;
        $practice_ammunition_quantity = null;
        if (isset($save)) {
            $submitted = true;
            $this->load->library('form_validation');
            $practice_ammunition_quantity  = $this->input->post('practice_ammunition_quantity');
            if (empty($practice_ammunition_quantity)) {
                $practice_ammunition_quantity = null;
            }
            //$practice_ammunition_quantity = 1;
            $from_id = $this->input->post('ammunition');

            if ($from_id == null) {
                $from_id = 'null';
            }
            $to_id = $this->input->post('to_ammunition');
            if ($to_id == null) {
                $to_id = 'null';
            }

            $this->form_validation->set_rules('conversion_type', 'Conversion Type', 'required');
            $this->form_validation->set_rules('practice_ammunition_quantity', 'Practice Ammunition', 'required|callback_valid_practice_ammunition_quantity');
            $this->form_validation->set_rules('ammunition', 'Service Ammunition From', 'required');
            $this->form_validation->set_rules('order_number', 'Order Number', 'required');
            $this->form_validation->set_rules('order_date', 'Order Date', 'required|callback_valid_order_date');
            $service_ammunition_id = $this->input->post('ammunition');
            $conversion_type = $this->input->post('conversion_type');
            //validations
            switch ($conversion_type) {
                case 'SERVICE_TO_SERVICE':
                    $weapons = $this->Ammunition_model->getServiceAmmunition($bat_id);
                    $ammunition = array('' => '--Select Ammunition--');
                    foreach ($weapons as $k => $v) {
                        $ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                    }
                    $to_ammunition = $ammunition;
                    //$this->form_validation->set_rules('ammunition', 'Service Ammunition From', 'required');
                    $this->form_validation->set_rules('to_ammunition', 'Service Ammunition To', 'required|callback_valid_to_service_ammunition[' . $service_ammunition_id . ']');
                    $this->form_validation->set_rules('practice_ammunition_quantity', 'Ammunation Quantity', 'required|callback_valid_ammunition_quantity[sts@' . $service_ammunition_id . ']');
                    break;
                case 'SERVICE_TO_PRACTICE':
                    $weapons = $this->Ammunition_model->getServiceAmmunition($bat_id);
                    $ammunition = array('' => '--Select Ammunition--');
                    foreach ($weapons as $k => $v) {
                        $ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                    }
                    $weapons = null;
                    $weapons = $this->Ammunition_model->getPracticeAmmunition($bat_id);
                    $to_ammunition = array('' => '--Select Ammunition--');
                    foreach ($weapons as $k => $v) {
                        $to_ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                    }
                    $weapons = null;
                    //$this->form_validation->set_rules('ammunition', 'Service Ammunition From', 'required');
                    $this->form_validation->set_rules('to_ammunition', 'Practice Ammunition To', 'required');
                    $this->form_validation->set_rules('practice_ammunition_quantity', 'Ammunation Quantity', 'required|callback_valid_ammunition_quantity[stp@' . $service_ammunition_id . ']');
                    break;
                case 'PRACTICE_TO_PRACTICE':
                    $weapons = $this->Ammunition_model->getPracticeAmmunition($bat_id);
                    $ammunition = array('' => '--Select Ammunition--');
                    foreach ($weapons as $k => $v) {
                        $ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                    }
                    $weapons = null;
                    $to_ammunition = $ammunition;
                    //$this->form_validation->set_rules('ammunition', 'Practice Ammunition From', 'required');
                    $this->form_validation->set_rules('to_ammunition', 'Practice Ammunition To', 'required|callback_valid_to_practice_ammunition[' . $service_ammunition_id . ']');
                    $this->form_validation->set_rules('practice_ammunition_quantity', 'Ammunation Quantity', 'required|callback_valid_ammunition_quantity[ptp@' . $service_ammunition_id . ']');
                    break;
                case 'PRACTICE_TO_SERVICE':
                    $weapons = $this->Ammunition_model->getPracticeAmmunition($bat_id);
                    $ammunition = array('' => '--Select Ammunition--');
                    foreach ($weapons as $k => $v) {
                        $ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                    }
                    $weapons = null;
                    $weapons = $this->Ammunition_model->getServiceAmmunition($bat_id);
                    $to_ammunition = array('' => '--Select Ammunition--');
                    foreach ($weapons as $k => $v) {
                        $to_ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                    }
                    $weapons = null;
                    //$this->form_validation->set_rules('ammunition', 'Practice Ammunition From', 'required');
                    $this->form_validation->set_rules('to_ammunition', 'Service Ammunition To', 'required');
                    $this->form_validation->set_rules('practice_ammunition_quantity', 'Ammunation Quantity', 'required|callback_valid_ammunition_quantity[pts@' . $service_ammunition_id . ']');
                    break;
            }
            if ($this->form_validation->run() == TRUE) {    //if validation is ok
                $order_date = $this->input->post('order_date');
                $order_number = $this->input->post('order_number');
                //die;
                $order_date = date_format(date_create_from_format('d/m/Y', $order_date), 'Y-m-d H:i:s');
                switch ($conversion_type) {
                    case 'SERVICE_TO_SERVICE':
                        $practice_ammunition_quantity  = $this->input->post('practice_ammunition_quantity');
                        $this->db->trans_begin();
                        $ammu01 = $this->Ammunition_model->getServiceDetail($service_ammunition_id);
                        $arm = $ammu01->arm;
                        $bore = $ammu01->bore;
                        $bat_id = $ammu01->bat_id;
                        $quantity = $ammu01->qty;
                        $history_from = $ammu01->nwep_id;
                        $service_ammunition_id_to = $this->input->post('to_ammunition');
                        if ($quantity >= $practice_ammunition_quantity && $practice_ammunition_quantity > 0) {
                            //update
                            $new_quantity_service = $quantity - $practice_ammunition_quantity;
                            $this->Ammunition_model->decreaseServiceQuantity($service_ammunition_id, $bat_id, $new_quantity_service);

                            if (!$this->Ammunition_model->checkServiceExistsOrNot($arm, $bore, $bat_id)) {
                                $this->Ammunition_model->createPractice($arm, $bore, $bat_id);
                            }
                            $this->Ammunition_model->increaseServiceQuantity($to_id, $practice_ammunition_quantity);
                            $history_to = $to_id; //$this->Ammunition_model->getHistoryTo($arm,$bore,$bat_id,$to_id,'SERVICE');
                            $history_quantity = $practice_ammunition_quantity;
                            $by_id = $bat_id;        //user who is logged in
                            $this->Ammunition_model->addServiceToPracticeHistory($history_from, $history_to, $history_quantity, $by_id, 'SERVICE_TO_SERVICE', $order_number, $order_date);
                            $this->db->trans_commit();
                            $this->session->set_flashdata('success_msg', 'Service ammunition has been converted to another Service Weapon ammunition adfasdf!!');
                            unset($_POST);
                            redirect('ammunition/service-to-practice');
                        } else {
                            $this->db->trans_rollback();
                            $this->session->set_flashdata('error_msg', 'Service Ammunition quantity is either less or zero');
                        }
                        break;
                    case 'SERVICE_TO_PRACTICE':
                        $service_ammunition_id = $this->input->post('ammunition');
                        $practice_ammunition_quantity  = $this->input->post('practice_ammunition_quantity');
                        $this->db->trans_begin();
                        $ammu01 = $this->Ammunition_model->getServiceDetail($service_ammunition_id);
                        $arm = $ammu01->arm;
                        $bore = $ammu01->bore;
                        $bat_id = $ammu01->bat_id;
                        $quantity = $ammu01->qty;
                        $history_from = $ammu01->nwep_id;
                        if ($quantity >= $practice_ammunition_quantity && $practice_ammunition_quantity > 0) {
                            //update
                            $new_quantity_service = $quantity - $practice_ammunition_quantity;
                            $this->Ammunition_model->decreaseServiceQuantity($service_ammunition_id, $bat_id, $new_quantity_service);

                            if (!$this->Ammunition_model->checkPracticeExistsOrNot($arm, $bore, $bat_id)) {
                                $this->Ammunition_model->createPractice($arm, $bore, $bat_id);
                            }
                            $this->Ammunition_model->increasePracticeQuantity($arm, $bore, $bat_id, $practice_ammunition_quantity, $to_id);
                            $history_to = $to_id; //$this->Ammunition_model->getHistoryTo($arm,$bore,$bat_id);
                            $history_quantity = $practice_ammunition_quantity;
                            $by_id = $bat_id;        //user who is logged in
                            $this->Ammunition_model->addServiceToPracticeHistory($history_from, $history_to, $history_quantity, $by_id, 'SERVICE_TO_PRACTICE', $order_number, $order_date);
                            $this->db->trans_commit();
                            $this->session->set_flashdata('success_msg', 'Service ammunition has been converted to Practice Weapon ammunition!!');
                            unset($_POST);
                            redirect('ammunition/service-to-practice');
                        } else {
                            $this->db->trans_rollback();
                            $this->session->set_flashdata('error_msg', 'Pactice Ammunition quantity is either less or zero');
                        }
                        break;
                    case 'PRACTICE_TO_PRACTICE':
                        $service_ammunition_id = $this->input->post('ammunition');
                        $practice_ammunition_quantity  = $this->input->post('practice_ammunition_quantity');
                        $this->db->trans_begin();
                        $ammu01 = $this->Ammunition_model->getPracticeDetail($service_ammunition_id);
                        $arm = $ammu01->arm;
                        $bore = $ammu01->bore;
                        $bat_id = $ammu01->bat_id;
                        $quantity = $ammu01->qty;
                        $history_from = $ammu01->nwep_id;
                        if ($quantity >= $practice_ammunition_quantity && $practice_ammunition_quantity > 0) {
                            //update
                            $new_quantity_service = $quantity - $practice_ammunition_quantity;
                            $this->Ammunition_model->decreasePracticeQuantity($service_ammunition_id, $bat_id, $new_quantity_service);

                            if (!$this->Ammunition_model->checkPracticeExistsOrNot($arm, $bore, $bat_id)) {
                                $this->Ammunition_model->createPractice($arm, $bore, $bat_id);
                            }
                            $this->Ammunition_model->increasePracticeQuantity($arm, $bore, $bat_id, $practice_ammunition_quantity, $to_id);
                            $history_to = $to_id;
                            $this->Ammunition_model->getHistoryTo($arm, $bore, $bat_id);
                            $history_quantity = $practice_ammunition_quantity;
                            $by_id = $bat_id;        //user who is logged in
                            $this->Ammunition_model->addServiceToPracticeHistory($history_from, $history_to, $history_quantity, $by_id, 'PRACTICE_TO_PRACTICE', $order_number, $order_date);
                            $this->db->trans_commit();
                            $this->session->set_flashdata('success_msg', 'Practice ammunition has been converted to another Practice Weapon ammunition!!');
                            unset($_POST);
                            redirect('ammunition/service-to-practice');
                        } else {
                            $this->db->trans_rollback();
                            $this->session->set_flashdata('error_msg', 'Pactice Ammunition quantity is either less or zero');
                        }
                        break;
                    case 'PRACTICE_TO_SERVICE':
                        $service_ammunition_id = $this->input->post('ammunition');
                        $practice_ammunition_quantity  = $this->input->post('practice_ammunition_quantity');
                        $this->db->trans_begin();
                        $ammu01 = $this->Ammunition_model->getPracticeDetail($service_ammunition_id);
                        $arm = $ammu01->arm;
                        $bore = $ammu01->bore;
                        $bat_id = $ammu01->bat_id;
                        $quantity = $ammu01->qty;
                        $history_from = $ammu01->nwep_id;
                        if ($quantity >= $practice_ammunition_quantity && $practice_ammunition_quantity > 0) {
                            //update
                            $new_quantity_service = $quantity - $practice_ammunition_quantity;
                            $this->Ammunition_model->decreasePracticeQuantity($service_ammunition_id, $bat_id, $new_quantity_service);

                            if (!$this->Ammunition_model->checkServiceExistsOrNot($arm, $bore, $bat_id)) {
                                $this->Ammunition_model->createPractice($arm, $bore, $bat_id);
                            }
                            $this->Ammunition_model->increaseServiceQuantity($to_id, $practice_ammunition_quantity);
                            $history_to = $to_id; //$this->Ammunition_model->getHistoryTo($arm,$bore,$bat_id);
                            $history_quantity = $practice_ammunition_quantity;
                            $by_id = $bat_id;        //user who is logged in
                            $this->Ammunition_model->addServiceToPracticeHistory($history_from, $history_to, $history_quantity, $by_id, 'PRACTICE_TO_SERVICE', $order_number, $order_date);
                            $this->db->trans_commit();
                            $this->session->set_flashdata('success_msg', 'Practice ammunition has been converted to Service Weapon ammunition!!');
                            unset($_POST);
                            redirect('ammunition/service-to-practice');
                        } else {
                            $this->db->trans_rollback();
                            $this->session->set_flashdata('error_msg', 'Pactice Ammunition quantity is either less or zero');
                        }
                        break;
                }
            } else {
                $this->session->set_flashdata('error_msg', 'Validation Failed');
            }
        } else {
            $weapons = $this->Ammunition_model->getServiceAmmunition($bat_id);
            $ammunition = array('' => '--Select Ammunition--');
            foreach ($weapons as $k => $v) {
                $ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
            }
            $to_ammunition = $ammunition;
            if ($from_id == null) {
                $from_id = 'null';
            }
            if ($to_id == null) {
                $to_id = 'null';
            }
        }

        $conversions = [
            '' => 'Choose One',
            'SERVICE_TO_SERVICE' => 'Service to Service',
            'SERVICE_TO_PRACTICE' => 'Service to Practice',
            'PRACTICE_TO_PRACTICE' => 'Practice to Practice',
            'PRACTICE_TO_SERVICE' => 'Practice to Service'
        ];
        $data['conversions'] = $conversions;
        $data['conversion_type'] = ($conversion_type == null) ? 'null' : $conversion_type;
        $data['ammunition'] = $ammunition;
        $data['to_ammunition'] = $to_ammunition;
        $data['submitted'] = $submitted;
        $data['changing_quantity'] = ($practice_ammunition_quantity == null) ? 'null' : $practice_ammunition_quantity;
        $data['to_id'] = isset($to_id) ? $to_id : false;
        $data['from_id'] = isset($from_id) ? $from_id : false;
        
        //GET THE AMMUNITION ID
        $this->load->view('Ammunition/service_to_practice', $data);
    }
    public function conversion_report()
    {
        $this->load->model('Khc_model');
        $bat_id = $this->session->userdata['userid'];
        $user_log = $this->session->userdata['user_log'];
        $save = $this->input->post('submit');
        $submitted = false;
        $from_id = null;
        $to_id = null;
        $conversion_type = null;
        $practice_ammunition_quantity = null;
        if ($user_log == 100) {
            $weapons = $this->Ammunition_model->getServiceAmmunition();
        } else {
            $weapons = $this->Ammunition_model->getServiceAmmunition($bat_id);
        }
        $ammunition = array('' => '--Select Ammunition--');
        foreach ($weapons as $k => $v) {
            $ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
        }
        $to_ammunition = $ammunition;
        if ($from_id == null) {
            $from_id = 'null';
        }
        if ($to_id == null) {
            $to_id = 'null';
        }
        $conversions = [
            '' => 'Choose One',
            'SERVICE_TO_SERVICE' => 'Service to Service',
            'SERVICE_TO_PRACTICE' => 'Service to Practice',
            'PRACTICE_TO_PRACTICE' => 'Practice to Practice',
            'PRACTICE_TO_SERVICE' => 'Practice to Service'
        ];
        $battalion_objs = $this->Khc_model->getALLKHCBattalions();
        $battalions = [];
        foreach ($battalion_objs as $k => $val) {
            $battalions[$val->users_id] = $val->nick;
        }
        $battalion_objs = $this->Khc_model->getALLKHCBattalions($this->session->userdata('userid'));
        $battalions2 = [];
        foreach ($battalion_objs as $k => $val) {
            $battalions2[$val->users_id] = $val->nick;
        }
        $data['battalions'] = $battalions2;
        $data['conversions'] = $conversions;
        $data['conversion_type'] = ($conversion_type == null) ? 'null' : $conversion_type;
        $data['ammunition'] = $ammunition;
        $data['to_ammunition'] = $to_ammunition;
        $data['submitted'] = $submitted;
        $data['changing_quantity'] = ($practice_ammunition_quantity == null) ? 'null' : $practice_ammunition_quantity;
        $data['to_id'] = isset($to_id) ? $to_id : false;
        $data['from_id'] = isset($from_id) ? $from_id : false;
        if ($user_log == 100) {
            $this->load->view('Ammunition/officer_conversion_report', $data);
        } else {
            $this->load->view('Ammunition/conversion_report', $data);
        }
    }

    public function ajax_ammunition_conversion_report()
    {
        $this->load->model('Khc_model');
        $this->load->model('Ammunition_model');
        $this->load->helper('common');

        $user_log = $this->session->user_log;
        $battalion_objs = $this->Khc_model->getALLKHCBattalions();
        $khc_battalions = [];
        foreach ($battalion_objs as $k => $val) {
            $khc_battalions[$val->users_id] = $val->nick;
        }

        $battalion_objs = $this->Khc_model->getALLKHCBattalions($this->session->userdata('userid'));
        $khc_battalions2 = [];
        foreach ($battalion_objs as $k => $val) {
            $khc_battalions2[$val->users_id] = $val->nick;
        }

        $length = 10;
        $start = 0;
        if (null != $this->input->post('length') && $this->input->post("length") != -1) {
            $length = $this->input->post('length');
            $start = $this->input->post('start');
        }

        $filters = [];
        $conversions = [
            '' => 'Choose One',
            'SERVICE_TO_SERVICE' => 'Service to Service',
            'SERVICE_TO_PRACTICE' => 'Service to Practice',
            'PRACTICE_TO_PRACTICE' => 'Practice to Practice',
            'PRACTICE_TO_SERVICE' => 'Practice to Service'
        ];
        if ($this->session->user_log == 100) {
            $battalions = $this->input->post('battalions');
            if ($battalions == null) {
                $battalion_objs = $this->Khc_model->getALLKHCBattalions($this->session->userdata('userid'));
                $battalions = [];
                foreach ($battalion_objs as $k => $val) {
                    $battalions[] = $val->users_id;
                }
            }
        } else {
            if ($this->session->userdata('user_log') != 5) {
                $battalion_objs = $this->Khc_model->getALLKHCBattalions($this->session->userdata('userid'));
                $battalions = [];
                foreach ($battalion_objs as $k => $val) {
                    $battalions[] = $val->users_id;
                }
            } else {
                $battalions = [$this->session->userdata['userid']];
            }
        }

        $filters['battalions'] = $battalions;
        //var_dump($battalions);
        $transaction_type = $this->input->post('conversion_type');
        if ($transaction_type != null && in_array($transaction_type, array_keys($conversions))) {
            $filters['transaction_type'] = $transaction_type;
        }
        $order_number = $this->input->post('order_number');
        if ($order_number != null) {
            $filters['order_number'] = $order_number;
        }
        $date_from = $this->input->post('date_from');

        if (is_valid_date($date_from)) {
            $date_from = convertDate($date_from) . ' 00:00:00';
            $filters['date_from'] = $date_from;
        } else {
            $date_from = null;
        }


        $date_to = $this->input->post('date_to');
        if (is_valid_date($date_to)) {
            $date_to = convertDate($date_to) . ' 23:59:59';
            $filters['date_to'] = $date_to;
        } else {
            $date_to = null;
        }

        $bores = $this->getAmmunitionBoresBattalion($battalions);
        $service_bores = $bores['service_ammunitions'];
        $practice_bores = $bores['practice_ammunitions'];
        $data_obj = $this->Ammunition_model->getConversionData($filters, $length, $start);
        $rows = [];
        $sno = 1 + $start;

        foreach ($data_obj as $k => $obj) {
            $row = [];
            $row['sno'] = $sno;
            switch ($obj->transaction_type) {
                case 'SERVICE_TO_SERVICE':
                    $row['bore_from'] = isset($service_bores[$obj->from_]) ? $service_bores[$obj->from_] : 'Bore Not Found' . $obj->from_;
                    $row['bore_to'] = isset($service_bores[$obj->to_]) ? $service_bores[$obj->to_] : 'Bore Not Found' . $obj->to_;
                    break;
                case 'SERVICE_TO_PRACTICE':
                    $row['bore_from'] = isset($service_bores[$obj->from_]) ? $service_bores[$obj->from_] : 'Bore Not Found' . $obj->from_; //$service_bores[$obj->from_];
                    $row['bore_to'] = isset($practice_bores[$obj->to_]) ? $practice_bores[$obj->to_] : 'Bore Not Found' . $obj->to_;
                    break;
                case 'PRACTICE_TO_PRACTICE':
                    $row['bore_from'] = isset($practice_bores[$obj->from_]) ? $practice_bores[$obj->from_] : 'Bore Not Found' . $obj->from_;
                    $row['bore_to'] = isset($practice_bores[$obj->to_]) ? $practice_bores[$obj->to_] : 'Bore Not Found' . $obj->to_;
                    break;
                case 'PRACTICE_TO_SERVICE':
                    $row['bore_from'] = isset($practice_bores[$obj->from_]) ? $practice_bores[$obj->from_] : 'Bore Not Found' . $obj->from_;
                    $row['bore_to'] = isset($service_bores[$obj->to_]) ? $service_bores[$obj->to_] : 'Bore Not Found' . $obj->to_;
                    break;
                default:
                    $row['bore_from'] = '--';
                    $row['bore_to'] = '--';
                    break;
            }

            $row['quantity'] = $obj->quantity;
            $row['conversion_type'] = $conversions[$obj->transaction_type];
            $row['order_number'] = $obj->order_no;
            $row['order_date'] = $obj->order_date;
            $row['transaction_date'] = $obj->datetime_;

            $row['transaction_by'] = $khc_battalions[$obj->by_id];
            $sno++;
            $rows[] = $row;
        }
        $data = [
            'data' => $rows,
            'recordsTotal' => $this->Ammunition_model->getTotalCourseHistory($filters, null, array_keys($khc_battalions2)),
            "recordsFiltered" => $this->Ammunition_model->getTotalFilteredCourseHistory($filters)
        ];
        echo json_encode($data);
        die;
    }

    public function valid_order_date($order_date)
    {
        if (preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/', $order_date)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_order_date', 'Invalid Order Date Entered(dd/mm/yyyy)!');
            return false;
        }
    }
    public function valid_to_service_ammunition($to_id, $from_id = null)
    { //to_ammunition,
        if ($to_id == null) {
            $this->form_validaiton->set_message('valid_to_service_ammunition', 'Please Select Service Ammunition To');
            return false;
        }
        if ($from_id == null) {
            $this->form_validaiton->set_message('valid_to_service_ammunition', 'Please Select Service Ammunition From');
            return false;
        }
        if ($to_id == $from_id) {
            $this->form_validaiton->set_message('valid_to_service_ammunition', 'Not nedd of such Deduction(you do not need to move ammunition from same weapon)!');
            return false;
        }
        return true;
    }
    public function valid_to_practice_ammunition($to_id, $from_id = null)
    { //to_ammunition,
        if ($to_id == null) {
            $this->form_validaiton->set_message('valid_to_practice_ammunition', 'Please Select Practice Ammunition To');
            return false;
        }
        if ($from_id == null) {
            $this->form_validaiton->set_message('valid_to_practice_ammunition', 'Please Select Practice Ammunition From');
            return false;
        }
        if ($to_id == $from_id) {
            $this->form_validaiton->set_message('valid_to_practice_ammunition', 'Not nedd of such Deduction(you do not need to move ammunition from same weapon)!');
            return false;
        }
        return true;
    }
    public function valid_ammunition_quantity($quantity, $data)
    {
        $d_ar = explode('@', $data);
        $type = $d_ar[0];
        $id = $d_ar[1];
        $status = true;
        if (!preg_match("/^[\d]+$/", $id)) {
            $this->form_validation->set_message('valid_ammunition_quantity', 'Please select the Ammunition From field.');
            return false;
        }
        if ($quantity <= 0) {
            $this->form_validation->set_message('valid_ammunition_quantity', 'Ammunition Quantity should be greator than Zero.');
            return false;
        }
        switch ($type) {
            case 'sts':
            case 'stp':
                $status = $this->Ammunition_model->isValidServiceAmmunitionQuantity($id, $quantity);
                if (!$status) {
                    $this->form_validation->set_message('valid_ammunition_quantity', 'Quantity you have entered is exceeding the Selected Service Ammunition');
                }
                break;
            case 'ptp':
            case 'pts':
                $status = $this->Ammunition_model->isValidPracticeAmmunitionQuantity($id, $quantity);
                if (!$status) {
                    $this->form_validation->set_message('valid_ammunition_quantity', 'Quantity you have entered is exceeding the Selected Practice Ammunition');
                }
                break;
            default:
                $status = false;
                if (!$status) {
                    $this->form_validation->set_message('valid_ammunition_quantity', 'Invalid Conversion Type!');
                }
        }
        return $status;
    }
    public function ajaxGetAmmunitionBores()
    {
        $type = $this->input->post('ammunition_type');
        $bat_id = $this->session->userdata['userid'];
        switch ($type) {
            case 'SERVICE':
            case 'SERVICE_TO_SERVICE':
                $service_weapons = $this->Ammunition_model->getServiceAmmunition($bat_id);
                $service_ammunition = [];
                foreach ($service_weapons as $k => $v) {
                    $service_ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                }
                $data = ['service_ammunitions' => $service_ammunition, 'status' => true];
                break;
            case 'SERVICE_TO_PRACTICE':
            case 'PRACTICE_TO_SERVICE':
                $service_weapons = $this->Ammunition_model->getServiceAmmunition($bat_id);
                $service_ammunition = [];
                foreach ($service_weapons as $k => $v) {
                    $service_ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                }
                $practice_weapons = $this->Ammunition_model->getPracticeAmmunition($bat_id);
                $practice_ammunition = [];
                foreach ($practice_weapons as $k => $v) {
                    $practice_ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                }
                $data = ['service_ammunitions' => $service_ammunition, 'practice_ammunitions' => $practice_ammunition, 'status' => true];
                break;
            case 'PRACTICE':
            case 'PRACTICE_TO_PRACTICE':
                $practice_weapons = $this->Ammunition_model->getPracticeAmmunition($bat_id);
                $practice_ammunition = array('' => '--Select Ammunition--');
                foreach ($practice_weapons as $k => $v) {
                    $practice_ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                }
                $data = ['practice_ammunitions' => $practice_ammunition, 'status' => true];
                break;
            default:
                $data = ['ammunition' => [], 'status' => false];
                break;
        }
        echo json_encode($data);
    }
    public function getAmmunitionBoresBattalion($battalions)
    {
        $service_weapons = $this->Ammunition_model->getServiceAmmunition($battalions);
        $service_ammunition = [];
        foreach ($service_weapons as $k => $v) {
            $service_ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
        }
        $practice_weapons = $this->Ammunition_model->getPracticeAmmunition($battalions);
        $practice_ammunition = [];
        foreach ($practice_weapons as $k => $v) {
            $practice_ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
        }
        $data = ['service_ammunitions' => $service_ammunition, 'practice_ammunitions' => $practice_ammunition, 'status' => true];
        return $data;
    }
    public function test()
    {
    }
    public function valid_practice_ammunition_quantity()
    {
        $this->form_validation->set_message('valid_practice_ammunition_quantity', 'The practice Ammunition is greator than service ammunition');
        $service_ammunition_id = $this->input->post('ammunition');
        $bat_id = $this->session->userdata('userid');
        $service_quantity = $this->Ammunition_model->get_service_ammu_qty($service_ammunition_id, $bat_id);
        $practice_quantity = $this->input->post('practice_ammunition_quantity');
        if ($practice_quantity <= $service_quantity) {
            return true;
        } else {
            return FALSE;
        }
    }
    public function get_service_ammu_qty()
    {
        $service_ammunition_id = $this->input->post('ammunition');
        $type = $this->input->post('type');
        $bat_id = $this->session->userdata('userid');
        echo $this->Ammunition_model->get_service_ammu_qty($service_ammunition_id, $bat_id, $type);
    }
    public function destroy_ammunition()
    {
        if ($this->session->user_log == 3) {
            $bat_id = $this->session->userdata['userid'];
            $save = $this->input->post('submit');
            $submitted = false;
            $from_id = null;
            $to_id = null;
            $conversion_type = null;
            $practice_ammunition_quantity = null;
            $ammunition_type_ = null;
            if (isset($save)) {
                $submitted = true;
                $this->load->library('form_validation');
                $dispose_quantity  = $this->input->post('dispose_quantity');
                if (empty($dispose_quantity)) {
                    $dispose_quantity = null;
                }
                //$practice_ammunition_quantity = 1;
                $from_id = $this->input->post('ammunition');

                if ($from_id == null) {
                    $from_id = 'null';
                }


                $this->form_validation->set_rules('ammunition_type', 'Ammunition Type', 'required');
                //$this->form_validation->set_rules('dispose_quantity', 'Dispose Ammunition Quantity', 'required|callback_valid_practice_ammunition_quantity');
                $this->form_validation->set_rules('ammunition', 'Service Ammunition From', 'required');
                $this->form_validation->set_rules('order_by', 'Order By', 'required');  //validate order by
                $this->form_validation->set_rules('order_number', 'Order Number', 'required');
                $this->form_validation->set_rules('order_date', 'Order Date', 'required|callback_valid_order_date');
                $service_ammunition_id = $this->input->post('ammunition');
                $ammunition_type_ = $this->input->post('ammunition_type');
                //validations
                switch ($ammunition_type_) {
                    case 'SERVICE':
                        $weapons = $this->Ammunition_model->getServiceAmmunition($bat_id);
                        $ammunition = array('' => '--Select Ammunition--');
                        foreach ($weapons as $k => $v) {
                            $ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                        }
                        $to_ammunition = $ammunition;
                        $weapons = null;
                        //$this->form_validation->set_rules('ammunition', 'Service Ammunition From', 'required');
                        // $this->form_validation->set_rules('to_ammunition', 'Service Ammunition To', 'required|callback_valid_to_service_ammunition['.$service_ammunition_id.']');
                        $this->form_validation->set_rules('dispose_quantity', 'Dispose Ammunation Quantity', 'required|callback_valid_ammunition_quantity[sts@' . $service_ammunition_id . ']');
                        break;
                    case 'PRACTICE':
                        $weapons = null;
                        $weapons = $this->Ammunition_model->getPracticeAmmunition($bat_id);
                        $to_ammunition = array('' => '--Select Ammunition--');
                        foreach ($weapons as $k => $v) {
                            $to_ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                        }
                        $ammunition = $to_ammunition;
                        $weapons = null;
                        //$this->form_validation->set_rules('ammunition', 'Service Ammunition From', 'required');
                        //$this->form_validation->set_rules('to_ammunition', 'Practice Ammunition To', 'required');
                        $this->form_validation->set_rules('dispose_quantity', 'Dispose Ammunation Quantity', 'required|callback_valid_ammunition_quantity[ptp@' . $service_ammunition_id . ']');
                        break;
                }
                if ($this->form_validation->run() == TRUE) {    //if validation is ok
                    $order_date = $this->input->post('order_date');
                    $order_number = $this->input->post('order_number');
                    $order_by = $this->input->post('order_by');
                    //die;
                    //$ammunition_type_
                    //$from_id
                    //$dispose_quantity = 
                    $order_date = date_format(date_create_from_format('d/m/Y', $order_date), 'Y-m-d') . ' 00:00:00';
                    $data = [
                        'ammunition_type' => $ammunition_type_,
                        'ammunition_bore_id' => $from_id,
                        'disposed_quantity' => $dispose_quantity,
                        'order_by' => $order_by,
                        'order_number' => $order_number,
                        'order_date' => $order_date,
                        'bat_id' => $this->session->userid
                    ];
                    $data2 = [
                        'ammunition_type' => $ammunition_type_,
                        'ammunition_bore_id' => $from_id,
                        'disposed_quantity' => $dispose_quantity
                    ];
                    $this->db->trans_begin();
                    $this->Ammunition_model->updateAmmunition($data2);
                    $this->Ammunition_model->insertDestroyedAmmunitionHistory($data);
                    $this->db->trans_complete();
                    $this->session->set_flashdata('success_msg', 'Ammunition has been Disposed/Destroyed!!');
                    redirect('ammunition/destroyed-ammunition-report');
                } else {
                }
            } else {
                $weapons = $this->Ammunition_model->getServiceAmmunition($bat_id);
                $ammunition = array('' => '--Select Ammunition--');
                foreach ($weapons as $k => $v) {
                    $ammunition[$v->nwep_id] = $v->arm . ' ' . $v->bore;
                }
                $to_ammunition = $ammunition;
                if ($from_id == null) {
                    $from_id = 'null';
                }
                if ($to_id == null) {
                    $to_id = 'null';
                }
            }

            $ammunition_type = [
                '' => 'Choose One',
                'SERVICE' => 'Service',
                'PRACTICE' => 'Practice'
            ];
            $order_by = [
                '' => 'Choose One',
                1 => 'DGP Punjab',
                'SPL. DGP SAP',
                'IGP',
                'DIG',
                'COMMANDANT'
            ];
            $data['order_by'] = $order_by;
            $data['ammunition_type'] = $ammunition_type;
            $data['conversion_type'] = ($ammunition_type_ == null) ? 'null' : $ammunition_type_;
            $data['ammunition'] = $ammunition;
            $data['to_ammunition'] = $to_ammunition;
            $data['submitted'] = $submitted;
            $data['changing_quantity'] = ($practice_ammunition_quantity == null) ? 'null' : $practice_ammunition_quantity;
            $data['to_id'] = isset($to_id) ? $to_id : false;
            $data['from_id'] = isset($from_id) ? $from_id : false;
            //GET THE AMMUNITION ID
            $this->load->view('Ammunition/destroy_ammunition', $data);
        }
    }
    public function destroyed_ammunition_report()
    {
        if ($this->session->user_log == 3) {
            $data = [];
            $ammunition_type = [
                '' => 'Choose One',
                'SERVICE' => 'Service',
                'PRACTICE' => 'Practice'
            ];
            $data['ammunition_type'] = $ammunition_type;
            $this->load->view('Ammunition/destroy_ammunition_report', $data);
        }
    }
    public function ajax_destroyed_ammunition_report()
    {
        if ($this->session->user_log == 3 || $this->session->user_log = 100) {
            $order_by = [
                '' => 'Choose One',
                1 => 'DGP Punjab',
                'SPL. DGP SAP',
                'IGP',
                'DIG',
                'COMMANDANT'
            ];
            $this->load->model('Khc_model');
            $this->load->model('Ammunition_model');
            $this->load->helper('common');

            $user_log = $this->session->user_log;
            $battalion_objs = $this->Khc_model->getALLKHCBattalions();
            $khc_battalions = [];
            foreach ($battalion_objs as $k => $val) {
                $khc_battalions[$val->users_id] = $val->nick;
            }


            $length = 10;
            $start = 0;
            if (null != $this->input->post('length') && $this->input->post("length") != -1) {
                $length = $this->input->post('length');
                $start = $this->input->post('start');
            }

            $filters = [];
            $ammunition_types = [
                'SERVICE' => 'Service',
                'PRACTICE' => 'Practice'
            ];
            if ($this->session->user_log == 100) {
                $battalions = $this->input->post('battalions');
            } else {
                $battalions = [$this->session->userdata['userid']];
            }

            $filters['battalions'] = $battalions;
            $ammunition_type = $this->input->post('ammunition_type');
            if ($ammunition_type != null && in_array($ammunition_type, array_keys($ammunition_types))) {
                $filters['ammunition_type'] = $ammunition_type;
                $ammunition_ids = $this->input->post('ammunition_id');
                if ($ammunition_ids != null) {
                    $filters['ammunition_ids'] = $ammunition_ids;
                }
            }
            $order_number = $this->input->post('order_number');
            if ($order_number != null) {
                $filters['order_number'] = $order_number;
            }
            $date_from = $this->input->post('date_from');

            if (is_valid_date($date_from)) {
                $date_from = convertDate($date_from) . ' 00:00:00';
                $filters['date_from'] = $date_from;
            } else {
                $date_from = null;
            }


            $date_to = $this->input->post('date_to');
            if (is_valid_date($date_to)) {
                $date_to = convertDate($date_to) . ' 23:59:59';
                $filters['date_to'] = $date_to;
            } else {
                $date_to = null;
            }

            $bores = $this->getAmmunitionBoresBattalion($battalions);
            $service_bores = $bores['service_ammunitions'];
            $practice_bores = $bores['practice_ammunitions'];
            $data_obj = $this->Ammunition_model->getDestroyedAmmunitionData($filters, $length, $start);
            $rows = [];
            $sno = 1 + $start;

            foreach ($data_obj as $k => $obj) {
                $row = [];
                $row['sno'] = $sno;
                $row['ammunition_type'] = $ammunition_types[$obj->ammunition_type];
                //                    switch($obj->transaction_type){
                //                        case 'SERVICE_TO_SERVICE':
                //                            $row['bore_from'] = isset($service_bores[$obj->from_])?$service_bores[$obj->from_]:'Bore Not Found'.$obj->from_;
                //                            $row['bore_to'] = isset($service_bores[$obj->to_])?$service_bores[$obj->to_]:'Bore Not Found'.$obj->to_;
                //                            break;
                //                        case 'SERVICE_TO_PRACTICE':
                //                            $row['bore_from'] = isset($service_bores[$obj->from_])?$service_bores[$obj->from_]:'Bore Not Found'.$obj->from_;//$service_bores[$obj->from_];
                //                            $row['bore_to'] = isset($practice_bores[$obj->to_])?$practice_bores[$obj->to_]:'Bore Not Found'.$obj->to_;
                //                            break;
                //                        case 'PRACTICE_TO_PRACTICE':
                //                            $row['bore_from'] = isset($practice_bores[$obj->from_])?$practice_bores[$obj->from_]:'Bore Not Found'.$obj->from_;
                //                            $row['bore_to'] = isset($practice_bores[$obj->to_])?$practice_bores[$obj->to_]:'Bore Not Found'.$obj->to_;
                //                            break;
                //                        case 'PRACTICE_TO_SERVICE':
                //                            $row['bore_from'] = isset($practice_bores[$obj->from_])?$practice_bores[$obj->from_]:'Bore Not Found'.$obj->from_;
                //                            $row['bore_to'] = isset($service_bores[$obj->to_])?$service_bores[$obj->to_]:'Bore Not Found'.$obj->to_;
                //                            break;
                //                        default:
                //                            $row['bore_from'] = '--';
                //                            $row['bore_to'] = '--';
                //                            break;
                //                    }

                $row['ammunition_bore_id'] = $obj->ammunition_bore_id;
                $row['ammunition_bore'] = $obj->ammunition_bore;
                $row['dispose_quantity'] = $obj->disposed_quantity;
                $row['order_by'] = $order_by[$obj->order_by];
                $row['order_number'] = $obj->order_number;
                $row['order_date'] = convertDate2($obj->order_date);
                $row['deleted'] = $obj->deleted;
                if ($obj->deleted == 'NO') {
                    $row['action'] = '<i class="fa fa-undo" onClick="restoreRecord(' . $obj->id . ')" title="Restore Destroyed Ammunition" style="color:green;"></i>';
                } else {
                    $row['action'] = ''; //'<i class="fa fa-trash-o" onClick="deleteRecord('.$obj->id.')" title="Delete Permanently"></i>';
                }
                $row['created'] = $obj->created;

                $row['transaction_by'] = $khc_battalions[$obj->bat_id_];
                $sno++;
                $rows[] = $row;
            }
            $data = [
                'data' => $rows,
                'recordsTotal' => $this->Ammunition_model->getTotalDestroyedAmmunition($filters, $user_log),
                "recordsFiltered" => $this->Ammunition_model->getTotalFilteredDestroyedAmmunition($filters)
            ];
            echo json_encode($data);
            die;
        }
    }
    public function ajax_destroyed_ammunition_restore()
    {
        if ($this->session->user_log == 3 || $this->session->user_log = 100) {
            $this->load->model("Ammunition_model");
            $id = $this->input->post('id');
            if ($id != null) {
                $record = $this->Ammunition_model->getDestroyedAmmunitionRecordById($id);
                //var_dump($record);
                if (is_array($record) && count($record) == 1 && $record[0]->deleted == 'NO' && (($this->session->user_log == 3 && $record[0]->bat_id == $this->session->userid) || ($this->session->user_log == 100))) {
                    $ammuntion_type = $record[0]->ammunition_type;
                    if ($record[0]->ammunition_type == 'SERVICE') {
                        $this->Ammunition_model->increaseServiceQuantity($record[0]->ammunition_bore_id, $record[0]->disposed_quantity);
                        $this->Ammunition_model->restoreDestroyedAmmunition($id);
                        echo json_encode(['status' => true]);
                    } elseif ($record[0]->ammunition_type == 'PRACTICE') {
                        $this->Ammunition_model->increasePracticeQuantity(null, null, null, $record[0]->disposed_quantity, $record[0]->ammunition_bore_id);
                        $this->Ammunition_model->restoreDestroyedAmmunition($id);
                        echo json_encode(['status' => true]);
                    } else {
                        echo json_encode(['status' => false, 'message' => '003']);
                    }
                } else {
                    echo json_encode(['status' => false, 'message' => '002']);
                }
            } else {
                echo json_encode(['status' => false, 'message' => '001']);
            }
        }
        die;
    }
}
