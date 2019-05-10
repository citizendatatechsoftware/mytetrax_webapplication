<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
    
    public function  __construct(){
        parent::__construct();
        
        // Load paypal library & product model
        $this->load->library('paypal_lib');
        $this->load->model('product');
    }
    public function insert(){
        $clientid = $this->input->post('clientid');
        $already = $this->product->getclient($clientid);
        if(!empty($already)){
            $this->index();
         }else{  

         if($this->session->userdata('clientid')){
          $this->session->set_flashdata('wrong', '<b style="color:red;">Client ID Not Availabe</b>');

  redirect(base_url('client_profile#slick-popup'));
}else{
         $this->session->set_flashdata('wrong', '<b style="color:red;">Client ID Not Availabe</b>');

  redirect(base_url('admin_profile#slick-popup'));
}
       
      }
 
    }
    
   public function index(){
        
        $clientid = $this->input->post('clientid');

        $limit = $this->input->post('sec_limit');
        $price = 500 * $limit;
        
        $data = array(
        'clientid' => $this->input->post('clientid'),
        'price' => $price,
        'limit' => $this->input->post('sec_limit')
        );

        $insert_data = $this->product->licence($data);

        if($clientid){
            $data['products'] = $this->product->getRows($clientid);
        }else{ if($this->session->userdata('clientid')){
          $this->session->set_flashdata('wrong', '<b style="color:red;">Client ID Not Availabe</b>');

  redirect(base_url('client_profile#slick-popup'));
}else{
         $this->session->set_flashdata('wrong', '<b style="color:red;">Client ID Not Availabe</b>');

  redirect(base_url('admin_profile#slick-popup'));
}
        }
    
        $this->load->view('products/index', $data);
        }
    
     public function buy($id){
        // Set variables for paypal form
        $returnURL = base_url().'paypal/success';
        $cancelURL = base_url().'paypal/cancel';
        $notifyURL = base_url().'paypal/ipn';
        
        // Get product data from the database
        $product = $this->product->getRows($id);
        
        // Get current user ID from the session
        $userID = $_SESSION['userID'];
        
        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $product['name']);
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number',  $product['id']);
        $this->paypal_lib->add_field('amount',  $product['price']);
        
        // Render paypal form
        $this->paypal_lib->paypal_auto_form();
    }
}