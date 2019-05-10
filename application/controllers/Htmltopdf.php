<?php defined('BASEPATH') OR exit('No direct script access allowed');

class HtmltoPDF extends CI_Controller {

public function __construct()
{
parent::__construct();
$this->load->model('htmltopdf_model');
$this->load->library('pdf');
}

public function index()
{
$data['customer_data'] = $this->htmltopdf_model->fetch();
if($this->session->userdata('login') OR $this->session->userdata('clientid')){
$this->load->view('htmltopdf', $data);

}else{
redirect(base_url('login'));
}
}

public function details()
{
if($this->uri->segment(3))
{
$customer_id = $this->uri->segment(3);
$data['customer_details'] = $this->htmltopdf_model->fetch_single_details($customer_id);
if($this->session->userdata('login') OR $this->session->userdata('clientid')){
$this->load->view('htmltopdf', $data);

}else{
redirect(base_url('login'));
}
}
}

public function pdfdetails()
{
if($this->uri->segment(3))
{
$customer_id = $this->uri->segment(3);
$html_content = '<div class="container">
               <img src="'.base_url().'resoursefile/assets/dist/img/logo.png" width="40%">
               
               </div><br><hr>';
$html_content .= $this->htmltopdf_model->fetch_single_details($customer_id);
$this->pdf->loadHtml($html_content);
$this->pdf->render();
$this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
}
}

}

?>
