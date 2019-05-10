<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{

function __construct()
{
parent::__construct();
$this->load->library('form_validation');
$this->load->library('pagination');
$this->load->library('phpqrcode/qrlib');
$this->load->model('Employee_model');
$this->load->library('email');
// $this->load->helper('url', 'form', 'file');


}
public function reset_admin(){
$this->load->library('form_validation');
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
if ($this->form_validation->run()) {


$email= $this->input->post('email');

$check_data = $this->Employee_model->check_password($email);
if($check_data){
$this->session->set_flashdata('correct', '<b style="color:green;">Valid User</b>');
$this->session->set_userdata('valid', $email);
redirect(base_url('forget_password'));

} else {
$this->session->set_flashdata('wrong', '<b style="color:red;">Enter Your Correct Mail ID</b>');
redirect(base_url('forget_password'));
}
}else{

$this->load->view('forget_password');

}
}

public function testmail(){
  $this->load->view('testmail');
}

public function reset_client(){
$this->load->library('form_validation');
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
if ($this->form_validation->run()) {


$email= $this->input->post('email');

$check_data = $this->Employee_model->check_client($email);
if($check_data){
$this->session->set_flashdata('correct', '<b style="color:green;">Valid User</b>');
$this->session->set_userdata('for_client', $email);
redirect(base_url('forgot_client'));

} else {
$this->session->set_flashdata('wrong', '<b style="color:red;">Enter Your Correct Mail ID</b>');
redirect(base_url('forgot_client'));
}
}else{

$this->load->view('forgot_client');

}
}
public function update_password(){

$this->load->library('form_validation');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('confirmpassword', 'Confirmpassword', 'required');
$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
if ($this->form_validation->run()) {

$mail= $this->session->userdata('valid');
$data = array(
'password' => md5($this->input->post('password', TRUE)),
);

$check_data = $this->Employee_model->update_password($mail,$data);
$e_mail = "<br> Password : ". $this->input->post('password');
$this->load->library('email');
  $this->email->from('asanaliyar@gmail.com', 'Asanaliyar');
  $this->email->to($mail);
  $this->email->subject('Greetings From Citizen Datatech Software');
  $this->email->message('<html><head></head><body><b>Hi '.$this->input->post('username').', <br>Here below we attached your Updated Password</b><br><br></html>'.$e_mail);
  $this->email->send();
if($check_data){
$this->session->set_flashdata('updatee', '<b style="color:green;">Your Password updated Please Login</b>');
redirect(base_url('login'));

} else {
$this->session->set_flashdata('wrg', '<b style="color:red;">Not  Update</b>');
redirect(base_url('forget_password'));
}
}else{

$this->load->view('forget_password');

}
}

public function update_client(){

$this->load->library('form_validation');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('confirmpassword', 'Confirmpassword', 'required');
$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
if ($this->form_validation->run()) {

$mail= $this->session->userdata('for_client');
$data = array(
'password' => md5($this->input->post('password', TRUE))
);
$check_data = $this->Employee_model->update_client($mail,$data);
$e_mail = "<br> Password : ". $this->input->post('password');
$this->load->library('email');
  $this->email->from('asanaliyar@gmail.com', 'Asanaliyar');
  $this->email->to($mail);
  $this->email->subject('Greetings From Citizen Datatech Software');
  $this->email->message('<html><head></head><body><b>Hi '.$this->input->post('username').', <br>Here below we attached your Updated Password</b><br><br></html>'.$e_mail);
  $this->email->send();
if($check_data){
$this->session->set_flashdata('updatee', '<b style="color:green;">Your Password updated Please Login</b>');
redirect(base_url('client_login'));

} else {
$this->session->set_flashdata('wrg', '<b style="color:red;">Not  Update</b>');
redirect(base_url('forgot_client'));
}
}else{

$this->load->view('forgot_client');

}
}

public function index()
{  
  $id = $this->input->get('clientid');
  $this->session->set_userdata('id', $id);
$data["fetch_id"] = $this->Employee_model->showclientid();

if($this->session->userdata('login') OR $this->session->userdata('clientid')){
$this->session->set_flashdata('index', 'Dashboard | Mytetrax');


$this->load->view('index',$data);
}else{
redirect(base_url('login'));
}

}

public function floarqr(){
  $qrtext = $this->input->post('qrcode');

if(isset($qrtext))
{

$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/resoursefile/qrcode/';

$text = $qrtext;
$text1= substr($text, 0,9);

$folder = $SERVERFILEPATH;
$file_name1 = $text1."-Qrcode" . rand(2,200) . ".png";
$file_name = $folder.$file_name1;
QRcode::png($text,$file_name);

$image ="<center><img src=". base_url().'resoursefile/qrcode/'.$file_name1."></center";

}
$clientid = $this->session->userdata('clientid');
date_default_timezone_set('Asia/Kolkata'); 
$now = date('Y-m-d H:i:s');
$this->load->helper('string');
$data = array(
'clientid' => $clientid,
'qrname' => $this->input->post('qrcode'),
'qrcodeimg' => $file_name1,
'qrdate' => $now
);
$insertqr = $this->Employee_model->floarqr($data);

if ($insertqr) {
$this->session->set_flashdata('qrsuccess', '<b style="color:green;">Qrcode Genarated</b>');
redirect(base_url('client_profile#slick-popup2'));
} else {
$this->session->set_flashdata('qrerror', '<b style="color:green;">Invalid</b>');
redirect(base_url('client_profile#slick-popup2'));
}

}


public function addclient()
{
$qrtext = $this->input->post('clientid');

if(isset($qrtext))
{

$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/resoursefile/qrcode/';

$text = $qrtext;
$text1= substr($text, 0,9);

$folder = $SERVERFILEPATH;
$file_name1 = $text1."-Qrcode" . rand(2,200) . ".png";
$file_name = $folder.$file_name1;
QRcode::png($text,$file_name);

$image ="<center><img src=". base_url().'resoursefile/qrcode/'.$file_name1."></center";

}
$this->form_validation->set_rules('clientid', 'Clientid', 'required');
$this->form_validation->set_rules('username', 'Username', 'required');
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
$this->form_validation->set_rules('age', 'Age', 'required');
$this->form_validation->set_rules('mobile', 'Mobile', 'required');
$this->form_validation->set_rules('address', 'Address', 'required');
$this->form_validation->set_rules('bank', 'Bank', 'required');
$this->form_validation->set_rules('licence', 'Licence', 'required');
$this->form_validation->set_rules('gender', 'Gender', 'required');
$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");

if ($this->form_validation->run()) {

if (!empty($_FILES['image']['name'])) {
$config['file_name']     = $_FILES['image']['name'];
$config['upload_path']   = 'resoursefile/person_prof/';
$config['allowed_types'] = 'jpg|jpeg|gif|png';
$this->load->library('upload', $config);

$this->upload->initialize($config);
if ($this->upload->do_upload('image')) {
$uploadData = $this->upload->data();
$image      = $uploadData['file_name'];
} else {
$image = '';
}
}
date_default_timezone_set('Asia/Kolkata'); 
$now = date('Y-m-d H:i:s');
$this->load->helper('string');
$data = array(
'clientid' => $this->input->post('clientid'),
'username' => $this->input->post('username'),
'email' => $this->input->post('email'),
'password' => md5($this->input->post('password', TRUE)),
'mobile' => $this->input->post('mobile'),
'age' => $this->input->post('age'),
'gender' => $this->input->post('gender'),
'status' => $this->input->post('status'),
'image' => $image,
'bank' => $this->input->post('bank'),
'security_limit' => $this->input->post('licence'),
'joining' => $now,
'company_name' => $this->input->post('companyname'),
'address' => $this->input->post('address'),
'qrcode' => $file_name1
);
$insert_data = $this->Employee_model->addclient($data);
$e_mail = "Username : ". $this->input->post('username')."<br> Password : ". $this->input->post('password');
$this->load->library('email');
  $this->email->from('asanaliyar@gmail.com', 'Asanaliyar');
  $this->email->to($this->input->post('email'));
  $this->email->subject('Greetings From Citizen Datatech Software');
  $this->email->message('<html><head></head><body><b>Hi '.$this->input->post('username').', <br>Here below we attached your credential Details</b><br><br></html>'.$e_mail);
  $this->email->send();
if ($insert_data) {
$this->session->set_flashdata('success', '<div class="alert alert-success col-md-3">User Form Submited Success Fully</div>');
redirect(base_url('clientlist'));
} else {
$this->session->set_flashdata('error', 'Invalid Form Data');
redirect(base_url('addclient'));
}
}else{
//$this->session->set_flashdata('error', '<h4 style="color:red;">Please Enter The Form details</h4>');
if($this->session->userdata('login') OR $this->session->userdata('clientid')){
$this->load->view("addclient");
}else{
redirect(base_url('login'));
}

}

}
public function clientlist()
{

$config['base_url']= base_url()."clientlist";
$config['per_page'] = 10;
$config["uri_segment"] = 2;

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['prev_tag_open'] = '<li>';
$config['pre_tag_close'] = '</li>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$page =$this->uri->segment(2);

$data["fetch_client"] = $this->Employee_model->clientlist($config['per_page'], $page);
$config['total_rows']=$this->Employee_model->get_total_clients();
$this->pagination->initialize($config);
$data['pagination']=$this->pagination->create_links();
if($this->session->userdata('login') OR $this->session->userdata('clientid')){

$this->load->view("clientlist", $data);
}else{
redirect(base_url('login'));
}

}

public function securitylist()
{

$config['base_url']= base_url()."securitylist";
$config['per_page'] = 10;
$config["uri_segment"] = 2;

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['prev_tag_open'] = '<li>';
$config['pre_tag_close'] = '</li>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$page =$this->uri->segment(2);


$data["fetch_data"] = $this->Employee_model->fetch_data($config['per_page'], $page);
$config['total_rows']=$this->Employee_model->get_total_row();
$this->pagination->initialize($config);
$data['pagination']=$this->pagination->create_links();
if($this->session->userdata('login') OR $this->session->userdata('clientid')){

$this->load->view("securitylist", $data);
}else{
redirect(base_url('login'));
}

}


public function add_admin()
{
if($this->session->userdata('login') OR $this->session->userdata('clientid')){

$this->load->view("add_admin");
}else{
redirect(base_url('login'));
}

}

public function admin_register()
{

$this->load->library('form_validation');
$this->form_validation->set_rules('username', 'Username', 'required');
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_rules('mobile', 'Mobile', 'required');
$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

$this->form_validation->set_rules('confirm', 'Confirm', 'required|matches[password]');
$this->form_validation->set_rules('designation', 'Designation', 'required');

$this->form_validation->set_rules('gender', 'Gender', 'required');
$this->form_validation->set_rules('company', 'Company', 'required');
$this->form_validation->set_rules('address', 'Address', 'required');
$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");

if ($this->form_validation->run()) {
date_default_timezone_set('Asia/Kolkata'); 
$now = date('Y-m-d H:i:s');
$data = array(
'username' => $this->input->post('username'),
'email' => $this->input->post('email'),
'mobile' => $this->input->post('mobile'),
'password' => md5($this->input->post('password', TRUE)),
'designation' => $this->input->post('designation'),
'gender' => $this->input->post('gender'),
'company' => $this->input->post('company'),
'type' => $this->input->post('type'),
'address' => $this->input->post('address'),
'date' => $now
);
$e_mail = "Username : ". $this->input->post('username')."<br> Password : ". $this->input->post('password');

$this->load->library('email');
  $this->email->from('asanaliyar@gmail.com', 'Asanaliyar');
  $this->email->to($this->input->post('email'));
  $this->email->subject('Greetings From Citizen Datatech Software');
  $this->email->message('<html><head></head><body><b>Hi '.$this->input->post('username').', <br>Here below we attached your credential Details</b><br><br></html>'.$e_mail);
  $this->email->send();
$insert_data = $this->Employee_model->insert_admin($data);

if ($insert_data) {
$this->session->set_flashdata('success', '<b style="color:green;">Success Fully Added The Admin Details</b>');
redirect(base_url('admin_profile'));
} else {
$this->session->set_flashdata('errors', 'Invalid Form Data');
redirect(base_url('add_admin'));
}
} else {

$this->add_admin();
}
}



public function login()
{
$this->load->library('form_validation');
$this->form_validation->set_rules('email', 'Email', 'required');

$this->form_validation->set_rules(  'password', 'Password', 'trim|required|min_length[6]');
$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");

if ($this->form_validation->run()) {
$email    = $this->input->post('email');
$password = md5($this->input->post('password', TRUE));
$this->session->set_userdata('username', $email);

if ($this->Employee_model->login($email, $password)) {
$this->session->set_flashdata('success', '<b style="color:green;">User Form Submited Success Fully</b>');
$this->session->set_userdata('login', $email);
redirect(base_url('index'));
} else {
$this->session->set_flashdata('error', '<h4 style="color:red;">Invalid Username Or Password</h4>');
redirect(base_url('login'));
}
} elseif(!$this->session->userdata('login') OR !$this->session->userdata('clientid')) {
$this->session->unset_userdata('clientid');
$this->load->view("login");
}else{
redirect(base_url('index'));
}
}

public function addsecurity()
{

$this->load->library('form_validation');
$this->form_validation->set_rules('clientid', 'Clientid', 'trim|required');
$this->form_validation->set_rules('username', 'Username', 'required');
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

$this->form_validation->set_rules('mobile', 'Mobile', 'required');
$this->form_validation->set_rules('age', 'Age', 'required');
$this->form_validation->set_rules('address', 'Address', 'required');
$this->form_validation->set_rules('salary', 'Salary', 'required');
$this->form_validation->set_rules('bank', 'Bank', 'required');
$this->form_validation->set_rules('gender', 'Gender', 'required');
$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");

if ($this->form_validation->run()) {

if (!empty($_FILES['image']['name'])) {
$config['file_name']     = $_FILES['image']['name'];
$config['upload_path']   = 'resoursefile/person_prof/';
$config['allowed_types'] = 'jpg|jpeg|gif|png';
$this->load->library('upload', $config);

$this->upload->initialize($config);
if ($this->upload->do_upload('image')) {
$uploadData = $this->upload->data();
$image      = $uploadData['file_name'];
} else {
$image = '';
}
}
date_default_timezone_set('Asia/Kolkata'); 
$now = date('Y-m-d H:i:s');
$this->load->helper('string');
$clientid = $this->session->userdata('clientid');
$clientorg = $this->input->post('clientid');
$mobile= $this->input->post('mobile');

if($this->session->userdata('clientid')){
$clid = substr($clientid, 0,3);
}
if($this->session->userdata('login')){
$clid = substr($clientorg, 0,3);
}
$id = $clid.substr($mobile, -4);

// $auto= random_string('alnum',5);

// str_pad(2,3,"0",STR_PAD_LEFT)
$data = array(
'userid' => $id,
'clientid' => $clientorg,
'username' => $this->input->post('username'),
'email' => $this->input->post('email'),
'password' => md5($this->input->post('password', TRUE)),
'mobile' => $this->input->post('mobile'),
'age' => $this->input->post('age'),
'gender' => $this->input->post('gender'),
'status' => $this->input->post('status'),
'type' => $this->input->post('type'),
'image' => $image,
'bank' => $this->input->post('bank'),
'joining' => $now,
'date' => $this->input->post('date'),
'address' => $this->input->post('address'),
'salary' => $this->input->post('salary')
);


$e_mail = "Username : ". $this->input->post('username')." Password : ". $this->input->post('password');
$this->load->library('email');
  $this->email->from('asanaliyar@gmail.com', 'Asanaliyar');
  $this->email->to($this->input->post('email'));
  $this->email->subject('Greetings From Citizen Datatech Software');
    $this->email->message('Hi '.$this->input->post('username').',Here below we attached your credential Details'.$e_mail);
  // $this->email->message('<html><head></head><body><b>Hi '.$this->input->post('username').', <br>Here below we attached your credential Details</b><br><br></html>'.$e_mail);
  $this->email->send();


$licence = $this->Employee_model->licence($clientorg);    //countlist (register)

$product = $this->Employee_model->product($clientorg);
foreach ($product  as $sec):
$success = $sec->limit;   //product
  endforeach;


if($licence == $success){
   if($this->session->userdata('clientid')){
  $this->session->set_flashdata('wrong', '<h4 style="color:red;">Please Pay and add your Employee (expired)</h4>');
  redirect(base_url('client_profile#slick-popup'));
}else{
   $this->session->set_flashdata('wrong', '<h4 style="color:red;">Please Pay and add your Employee (expired)</h4>');
  redirect(base_url('admin_profile#slick-popup'));
}
  

}else{
$insert_data = $this->Employee_model->insert_data($data);
 
}



if ($insert_data) {
$this->session->set_flashdata('success', '<h4 style="color:green;">User Form Submited Success Fully</h4>');
redirect(base_url('securitylist'));
} else {
$this->session->set_flashdata('error', 'Invalid Form Data');
redirect(base_url('addsecurity'));
}
}else{
//$this->session->set_flashdata('error', '<h4 style="color:red;">Please Enter The Form details</h4>');
if($this->session->userdata('login') OR $this->session->userdata('clientid')){

$this->load->view("addsecurity");
}else{
redirect(base_url('login'));
}

}

}
public function delete()
{
$id = $this->input->get('id');
if ($this->Employee_model->delete_user($id)) {
$data["fetch_data"] = $this->Employee_model->fetch_data();
$this->session->set_flashdata('msg', '<h4 style="color:green; float: right;">Deleted Successfully</h4>');
$this->load->view("securitylist", $data);
redirect(base_url('securitylist'));
}
}

public function clientdelete()
{
$id = $this->input->get('id');
if ($this->Employee_model->clientdelete($id)) {
$data["fetch_client"] = $this->Employee_model->clientlist();
$this->session->set_flashdata('msg', '<h4 style="color:green; float: right;">Deleted Successfully</h4>');
$this->load->view("clientlist", $data);
redirect(base_url('clientlist'));

}
}

public function insdelete()
{
$id= $this->uri->segment(2);
if ($this->Employee_model->insdelete($id)) {
$data["incident_report"] = $this->Employee_model->incident_report();
$this->session->set_flashdata('msg', '<b style="color:green;">Incident Report Deleted</b>');
$this->load->view("incident_report", $data);
redirect(base_url('incident_report'));

}
}

public function admin_delete()
{
$id= $this->uri->segment(2);
if ($this->Employee_model->delete_admin($id)) {
$data["admin_list"] = $this->Employee_model->admin_list();
$this->session->set_flashdata('msg', '<h5 style="color:green; float: right;">Successfully Removed</h5>');
$this->load->view("admin_profile", $data);
redirect(base_url('admin_profile'));
}
}
public function logout()
{
if($this->session->userdata('login')){
$this->session->unset_userdata('login');
session_destroy();
redirect(base_url('login'));
}
$this->session->unset_userdata('username');
if($this->session->userdata('valid')){
$this->session->unset_userdata('valid');
}
if($this->session->userdata('for_client')){
$this->session->unset_userdata('for_client');
redirect(base_url('client_login'));
}
if($this->session->userdata('clientid')){
$this->session->unset_userdata('clientid');
redirect(base_url('client_login'));
}
session_destroy(); 
redirect(base_url('login'));
$this->session->unset_userdata('type');

}

public function edit()
{
  $id= $this->uri->segment(2);
$this->session->set_userdata('id', $id);

$data["fetch_data"] = $this->Employee_model->fetch_data();
$data["edit"] = $this->Employee_model->edit($id);

$this->load->view('addsecurity', $data);
}

public function update_student_id1() {
$id1 = $this->session->userdata('id');
$this->load->library('form_validation');

$this->form_validation->set_rules('username', 'Username', 'required');

// $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');


 $this->form_validation->set_rules('email', 'Email', 'required');

$this->form_validation->set_rules('age', 'Age', 'required');
$this->form_validation->set_rules('mobile', 'Mobile', 'required');

$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");

if ($this->form_validation->run()) {

if (!empty($_FILES['image']['name'])) {
$config['file_name']     = $_FILES['image']['name'];
$config['upload_path']   = 'resoursefile/person_prof/';
$config['allowed_types'] = 'jpg|jpeg|gif|png';
$this->load->library('upload', $config);

$this->upload->initialize($config);
if ($this->upload->do_upload('image')) {
$uploadData = $this->upload->data();
$image      = $uploadData['file_name'];
} else {
$image = '';
}
}
date_default_timezone_set('Asia/Kolkata'); 
$now = date('Y-m-d H:i:s');

$this->load->helper('string');
$clientid = $this->session->userdata('clientid');
$clientorg = $this->input->post('clientid');
$mobile= $this->input->post('mobile');

if($this->session->userdata('clientid')){
$clid = substr($clientid, 0,3);
}
if($this->session->userdata('login')){
$clid = substr($clientorg, 0,3);
}
$id = $clid.substr($mobile, -4);

$data = array(
'userid' => $id,
'clientid' => $this->input->post('clientid'),
'username' => $this->input->post('username'),
'email' => $this->input->post('email'),
// 'password' => md5($this->input->post('password', TRUE)),
'mobile' => $this->input->post('mobile'),
'age' => $this->input->post('age'),
'gender' => $this->input->post('gender'),
'status' => $this->input->post('status'),
'type' => $this->input->post('type'),
'image' => $image,
'bank' => $this->input->post('bank'),
'joining' => $now,
'date' => $this->input->post('date'),
'address' => $this->input->post('address'),
'salary' => $this->input->post('salary')
);

$update= $this->Employee_model->update_student_id1($id1,$data);
$e_mail = "Username : ". $this->input->post('username')."<br> Password : ". $this->input->post('password');
$this->load->library('email');
  $this->email->from('asanaliyar@gmail.com', 'Asanaliyar');
  $this->email->to($this->input->post('email'));
  $this->email->subject('Greetings From Citizen Datatech Software');
  $this->email->message('<html><head></head><body><b>Hi '.$this->input->post('username').', <br>Here below we attached your credential Details</b><br><br></html>'.$e_mail);
  $this->email->send();
if($update){
$this->session->set_flashdata('success', '<div style="color:green;"><b>DATA SUCCESSFULLY UPDATED</b></div>');
redirect(base_url('securitylist'));  
}
}else{
$this->session->set_flashdata('error', '<h4 style="color:red;">Please Enter The Correct details</h4>');
$this->load->view("addsecurity");
redirect(base_url('edit'."/".$id1));
}
}



public function clientedit($id='')
{
$id= $this->uri->segment(2);
$this->session->set_userdata('id', $id);
//$id= $this->input->get('id');
$data["clientlist"] = $this->Employee_model->clientlist();
$data["clientedit"] = $this->Employee_model->clientedit($id);

$this->load->view('addclient', $data);
}

public function admin_edit($id='')
{
$id= $this->uri->segment(2);
$this->session->set_userdata('id', $id);
//$id= $this->input->get('id');
$data["admin_list"] = $this->Employee_model->admin_list();
$data["admin_edit"] = $this->Employee_model->admin_edit($id);

$this->load->view('add_admin', $data);
}

public function update_admin_id() {

  $this->load->library('form_validation');
$this->form_validation->set_rules('username', 'Username', 'required');
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_rules('mobile', 'Mobile', 'required');
// $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

// $this->form_validation->set_rules('confirm', 'Confirm', 'required|matches[password]');
$this->form_validation->set_rules('designation', 'Designation', 'required');

$this->form_validation->set_rules('gender', 'Gender', 'required');
$this->form_validation->set_rules('company', 'Company', 'required');
$this->form_validation->set_rules('address', 'Address', 'required');
$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
$id= $this->input->post('id');
if ($this->form_validation->run()) {

$data = array(
'username' => $this->input->post('username'),
'email' => $this->input->post('email'),
'mobile' => $this->input->post('mobile'),
'designation' => $this->input->post('designation'),
'gender' => $this->input->post('gender'),
'company' => $this->input->post('company'),
'type' => $this->input->post('type'),
'address' => $this->input->post('address')
);
$updatedata = $this->Employee_model->update_admin_data($id, $data);

if ($updatedata) {
$this->session->set_flashdata('success', '<b style="color:green;">Success Fully Updated The Admin Details</b>');
redirect(base_url('admin_profile'));
} else {
$this->session->set_flashdata('errors', 'Invalid Form Data');
redirect(base_url('add_admin'));
}
} else {

$this->add_admin();
redirect(base_url('add_admin'."/".$id));
}
}




public function update_client_id1() {

  $qrtext = $this->input->post('clientid');

if(isset($qrtext))
{

$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/resoursefile/qrcode/';

$text = $qrtext;
$text1= substr($text, 0,9);

$folder = $SERVERFILEPATH;
$file_name1 = $text1."-Qrcode" . rand(2,200) . ".png";
$file_name = $folder.$file_name1;
QRcode::png($text,$file_name);

$image ="<center><img src=". base_url().'resoursefile/qrcode/'.$file_name1."></center";

}

$this->load->library('form_validation');
$this->form_validation->set_rules('username', 'Username', 'required');
$this->form_validation->set_rules('email', 'Email', 'required');

$this->form_validation->set_rules('mobile', 'Mobile', 'required');
$this->form_validation->set_rules('age', 'Age', 'required');
$this->form_validation->set_rules('address', 'Address', 'required');
$this->form_validation->set_rules('bank', 'Bank', 'required');
$this->form_validation->set_rules('gender', 'Gender', 'required');
$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
$id= $this->input->post('id');

if ($this->form_validation->run()) {

if (!empty($_FILES['image']['name'])) {
$config['file_name']     = $_FILES['image']['name'];
$config['upload_path']   = 'resoursefile/person_prof/';
$config['allowed_types'] = 'jpg|jpeg|gif|png';
$this->load->library('upload', $config);

$this->upload->initialize($config);
if ($this->upload->do_upload('image')) {
$uploadData = $this->upload->data();
$image      = $uploadData['file_name'];
} else {
$image = '';
}
}
date_default_timezone_set('Asia/Kolkata'); 
$now = date('Y-m-d H:i:s');
$this->load->helper('string');

$data = array(
'clientid' => $this->input->post('clientid'),
'username' => $this->input->post('username'),
'email' => $this->input->post('email'),
'mobile' => $this->input->post('mobile'),
'age' => $this->input->post('age'),
'gender' => $this->input->post('gender'),
'status' => $this->input->post('status'),
'image' => $image,
'bank' => $this->input->post('bank'),
'security_limit' => $this->input->post('licence'),
'joining' => $now,
'company_name' => $this->input->post('companyname'),
'address' => $this->input->post('address'),
'qrcode' => $file_name1

);
$update= $this->Employee_model->update_client_id1($id,$data);
if($update){
$this->session->set_flashdata('success', '<div style="color:green;"><b>DATA SUCCESSFULLY UPDATED</b></div>');
if($this->session->userdata('clientid')){
  redirect(base_url('client_profile')); 
}
redirect(base_url('clientlist'));  
}
}else{
$this->session->set_flashdata('error', '<h4 style="color:red;">Please Enter The Form details</h4>');
if($this->session->userdata('login') OR $this->session->userdata('clientid')){

$this->load->view("addclient");
}else{
redirect(base_url('login'));
}

redirect(base_url('clientedit'."/".$id));
}
}

function filename_exists()
{

$exists = $this->Employee_model->filename_exists();

if (!empty($exists)) {
$this->session->set_flashdata('already', '<b><div class="text-danger" style="color:red;">THE Clientid, EmailID OR MOBILE NO ALREADY EXISTS. PLEASE USE A DIFFERENT </div></b>');
redirect(base_url('addclient'));
} else {
$this->addclient();
}
}

function filename_security()
{
$already = $this->Employee_model->Check_already();
$exists = $this->Employee_model->filename_security();

if (!empty($already)) {
if (!empty($exists)) {
$this->session->set_flashdata('already', '<b><div class="text-danger" style="color:red;">THE EmailID OR MOBILE NO ALREADY EXISTS. PLEASE USE A DIFFERENT </div></b>');
redirect(base_url('addsecurity'));
} else {
$this->addsecurity();
}
}
else{
$this->session->set_flashdata('not', '<b><div class="text-danger" style="color:red;">This Client ID Not Valid Please Enter Correct ID</div></b>');
redirect(base_url('addsecurity'));
} 


}

public function profile()
{
$this->load->view('profile');
}
public function incident_report()
{

$config['base_url']= base_url()."incident_report";
$config['per_page'] = 10;
$config["uri_segment"] = 2;

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['prev_tag_open'] = '<li>';
$config['pre_tag_close'] = '</li>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$page =$this->uri->segment(2);

$data["incident_report"] = $this->Employee_model->incident_report($config['per_page'], $page);
$config['total_rows']=$this->Employee_model->ins_report();
$this->pagination->initialize($config);
$data['pagination']=$this->pagination->create_links();
if($this->session->userdata('login') OR $this->session->userdata('clientid')){

$this->load->view("incident_report", $data);
}else{
redirect(base_url('login'));
}


}
public function forget_password()
{
$this->load->view('forget_password');
}
public function forgot_client()
{
$this->load->view('forgot_client');
}
public function lockscreen()
{
$this->load->view('lockscreen');
}

public function client_login()
{

$this->load->library('form_validation');
$this->form_validation->set_rules('clientid', 'Clientid', 'required');

$this->form_validation->set_rules(  'password', 'Password', 'trim|required|min_length[6]');
$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");

if ($this->form_validation->run()) {
$clientid    = $this->input->post('clientid');
$password = md5($this->input->post('password', TRUE));

if ($this->Employee_model->client_login($clientid, $password)) {
$this->session->set_flashdata('client', '<b style="color:green;">User Form Submited Success Fully</b>');

$this->session->set_userdata('clientid', $clientid);
redirect(base_url('index'));
} else {
$this->session->set_flashdata('cerror', '<b style="color:red;">Invalid Username Or Password</b>');
redirect(base_url('client_login'));
}
} else {

if(!$this->session->userdata('login') OR !$this->session->userdata('clientid')){

$this->session->unset_userdata('login');
$this->load->view("client_login");
}else{
redirect(base_url('index'));
}
}

}
public function attendance()
{
$config['base_url'] = base_url()."attendance";
$config['per_page'] = 10;
$config["uri_segment"] = 2;

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['prev_tag_open'] = '<li>';
$config['pre_tag_close'] = '</li>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';

$page =$this->uri->segment(2);

$data["attendancelist"] = $this->Employee_model->attendancelist($config['per_page'], $page);
$config['total_rows']=$this->Employee_model->attendencelistlim();
$this->pagination->initialize($config);
$data['pagination']=$this->pagination->create_links();
if($this->session->userdata('login') OR $this->session->userdata('clientid')){

$this->load->view("attendance", $data);
}else{
redirect(base_url('login'));
}
}

public function timechange()
{
$this->load->view('timechange');
}


public function atreport()
{
$personid =$this->uri->segment(2);
$config['base_url']= base_url()."atreport/".$personid;
$config['per_page'] = 10;
$config["uri_segment"] = 3;

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['prev_tag_open'] = '<li>';
$config['pre_tag_close'] = '</li>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$page =$this->uri->segment(3);



$data["attendancelist"] = $this->Employee_model->atreport($personid, $config['per_page'], $page);      
$config['total_rows']=$this->Employee_model->attendencelistlim();

$this->pagination->initialize($config);
$data['pagination']=$this->pagination->create_links();

if($this->session->userdata('login') OR $this->session->userdata('clientid')){
$this->load->view('atreport',$data);
}else{
redirect(base_url('login'));
}

}

public function notification()
{
/* $token= $this->uri->segment(2);*/
$token=$this->input->get('token');
$this->session->set_userdata('token', $token);
$data["notification"] = $this->Employee_model->notification($token);

if($this->session->userdata('login') OR $this->session->userdata('clientid')){

$this->load->view('notification');
}else{
redirect(base_url('login'));
}

}


public function qrcodetext()
{
$this->load->view('qrcodetext');
}


public function ajaxGetRecetLatLng(){

 $id = $this->session->userdata('id');

$arrSList = $this->Employee_model->start_point($id);
$arrEList = $this->Employee_model->end_point($id);

$i = 0;
foreach($arrSList->result() as $listRow){
$arrLATLng[$i]['startpoint'] = array('lat'=>($listRow->latitude),'lng'=>($listRow->longitude));


$i++;
}
$i = 0;
foreach($arrEList->result() as $listERow){

$arrLATLng[$i]['endpoint'] = array('lat' => ($listERow->latitude),'lng' => ($listERow->longitude));

$i++;
}
$json= json_encode($arrLATLng);
echo $json;
}

public function loneman_report()
{
$config['base_url']= base_url()."loneman_report";
$config['per_page'] = 10;
$config["uri_segment"] = 2;

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['prev_tag_open'] = '<li>';
$config['pre_tag_close'] = '</li>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$page =$this->uri->segment(2);


$data["loneman"] = $this->Employee_model->loneman_report($config['per_page'], $page);
// $data["loneimage"] = $this->Employee_model->loneman_image();
$config['total_rows']=$this->Employee_model->lones();

$this->pagination->initialize($config);
$data['pagination']=$this->pagination->create_links();

if($this->session->userdata('login') OR $this->session->userdata('clientid')){
$this->load->view('loneman_report',$data);
}else{
redirect(base_url('login'));
}
}

public function incident_image()
{
$personid =$this->uri->segment(2);
$config['base_url']= base_url()."incident_image/".$personid;
$config['per_page'] = 10;
$config["uri_segment"] = 3;

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['prev_tag_open'] = '<li>';
$config['pre_tag_close'] = '</li>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$page =$this->uri->segment(3);



$data["insident_image"] = $this->Employee_model->ins_image($personid, $config['per_page'], $page);      
$config['total_rows']=$this->Employee_model->insidimg();

$this->pagination->initialize($config);
$data['pagination']=$this->pagination->create_links();

if($this->session->userdata('login') OR $this->session->userdata('clientid')){
$this->load->view('incident_image',$data);
}else{
redirect(base_url('login'));
}


} 
public function livestream(){
$this->load->view('livestream');
}

public function admin_profile(){

$config['base_url']= base_url()."admin_profile";
$config['per_page'] = 10;
$config["uri_segment"] = 2;

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['prev_tag_open'] = '<li>';
$config['pre_tag_close'] = '</li>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$page =$this->uri->segment(2);
$admin = $this->session->userdata('login');
$data['profile']= $this->Employee_model->admin_profile($admin);

$data["admin_list"] = $this->Employee_model->admin_list($config['per_page'], $page);
$config['total_rows']=$this->Employee_model->get_total_admin();
$this->pagination->initialize($config);
$data['pagination']=$this->pagination->create_links();
if($this->session->userdata('login')){

$this->load->view("admin_profile", $data);
}else{
redirect(base_url('login'));
}
}

public function client_profile(){

$config['base_url']= base_url()."client_profile";
$config['per_page'] = 10;
$config["uri_segment"] = 2;

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['prev_tag_open'] = '<li>';
$config['pre_tag_close'] = '</li>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$page =$this->uri->segment(2);

$data["createdcode"] = $this->Employee_model->createdcode($config['per_page'], $page);
$config['total_rows']=$this->Employee_model->createdqr();
$this->pagination->initialize($config);
$data['pagination']=$this->pagination->create_links();


$client = $this->session->userdata('clientid');
$data['client']= $this->Employee_model->client_profile($client);

$data["fetch_client"] = $this->Employee_model->clientlist();

if($this->session->userdata('login') OR $this->session->userdata('clientid')){

$this->load->view("client_profile", $data);
}else{
redirect(base_url('login'));
}
}

public function security_scan(){

$config['base_url']= base_url()."security_scan";
$config['per_page'] = 10;
$config["uri_segment"] = 2;

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['prev_tag_open'] = '<li>';
$config['pre_tag_close'] = '</li>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$page =$this->uri->segment(2);

$data["qr_report"] = $this->Employee_model->qrreport($config['per_page'], $page);
$config['total_rows']=$this->Employee_model->get_qrreport();
$this->pagination->initialize($config);
$data['pagination']=$this->pagination->create_links();
if($this->session->userdata('login') OR $this->session->userdata('clientid')){

$this->load->view("security_scan", $data);
}else{
redirect(base_url('login'));
}

}

}
