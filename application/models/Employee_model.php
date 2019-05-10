<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {
private $lastQuery='';
private $lastQ='';
private $attendance='';
private $incident='';
private $lones='';
private $ins='';
private $admin='';
private $get_qrreport='';
private $created_code='';

function __construct(){
parent::__construct();
$this->load->database();
$this->load->library('email');
$this->load->model('Employee_model');
// $this->load->library('session');
}
public function insert_data($data=array())
{
$count=$this->db->insert("register",$data);
if($count>0){
return true;

}
else{
return false;
}
}

public function addclient($data=array())
{
$count=$this->db->insert("addclient",$data);
if($count>0){
return true;

}
else{
return false;
}
}
public function check_password($email){
$query = $this->db->where(['email'=>$email])
->get('admin_account');
if($query->num_rows()){
 return TRUE;
}else {
 return FALSE;
}
}

public function check_client($email){
$query = $this->db->where(['email'=>$email])
->get('addclient');
if($query->num_rows()){
 return TRUE;
}else {
 return FALSE;
}
}

public function client_login($clientid,$password){
$query = $this->db->where(['clientid'=>$clientid, 'password'=>$password])
->get('addclient');

if($query->num_rows()){
 return TRUE;

}else {
 return FALSE;
}
}

public function notification($token){
$query = $this->db->where(['token'=>$token])
->get('ct_login');
if($query->num_rows()){
 return TRUE;
}else {
 return FALSE;
}
}

public function update_password($mail,$data){

$this->db->where('email', $mail);
$this->db->update('admin_account', $data);
$this->session->unset_userdata('valid');
return true;  
}

public function update_client($mail,$data){

$this->db->where('email', $mail);
$this->db->update('addclient', $data);
$this->session->unset_userdata('for_client');
return true;  
}
public function insert_admin($data=array())
{
$count=$this->db->insert("admin_account",$data);
if($count>0){
return true;

}
else{
return false;
}
}

public function floarqr($data=array())
{
$count=$this->db->insert("floarqrcode",$data);
if($count>0){
return true;

}
else{
return false;
}
}


public function fetch_data($limit=0, $start=1){
$this->db->limit($limit, $start);
$this->db->select('*');
$this->db->from('register');
$clientid = $this->session->userdata('clientid');
if($this->session->userdata('clientid')){
$this->db->where('clientid', $clientid);
}
$this->db->order_by("id","desc");
if($this->input->post('search',true)){
$this->db->like('userid', $this->input->post('search'));
}
if($this->input->post('search',true)){
$this->db->or_where('username', $this->input->post('search'));
}
if($this->input->post('search',true)){
$this->db->or_where('clientid', $this->input->post('search'));
}
if($this->input->post('search',true)){
$this->db->or_like('email', $this->input->post('search'));
}
if($this->input->post('search',true)){
$this->db->or_like('mobile', $this->input->post('search'));
}
if($this->input->post('search',true)){
$this->db->or_like('joining', $this->input->post('search'));
}
$query = $this->db->get();
$this->lastQuery = $this->db->last_query();

return $query;
}

public function admin_list($limit=0, $start=1){
$this->db->limit($limit, $start);
$this->db->select('*');
$this->db->from('admin_account');
$this->db->where('type', 'Sub Admin');
$this->db->order_by("id","desc");

if($this->input->post('search',true)){
$this->db->or_where('username', $this->input->post('search'));
}

if($this->input->post('search',true)){
$this->db->or_like('email', $this->input->post('search'));
}
if($this->input->post('search',true)){
$this->db->or_like('mobile', $this->input->post('search'));
}

$query = $this->db->get();
$this->admin = $this->db->last_query();

return $query;
}
function filename_exists(){
$this->db->select('*');
$this->db->from('addclient');
$clientid = $this->input->post('clientid');
$email = $this->input->post('email');
$mobile = $this->input->post('mobile');
$this->db->where('clientid', $clientid);
$this->db->or_where('email', $email);
$this->db->or_where('mobile', $mobile);

$query = $this->db->get();
if($query->num_rows()){
 return TRUE;
}else {
 return FALSE;
}
}

function filename_security(){
$this->db->select('*');
$this->db->from('register');

$email = $this->input->post('email');
$mobile = $this->input->post('mobile');

$this->db->where('email', $email);
$this->db->or_where('mobile', $mobile);

$query = $this->db->get();
if($query->num_rows()){
 return TRUE;
}else {
 return FALSE;
}
}

function Check_already(){
$this->db->select('*');
$this->db->from('addclient');
$clientid = $this->input->post('clientid');
$this->db->where('clientid', $clientid);
$query = $this->db->get();
if($query->num_rows()){
 return TRUE;
}else {
 return FALSE;
}
}

public function clientlist($limit=0, $start=1){
$this->db->limit($limit, $start);
$this->db->select('*');
$this->db->from('addclient');
$this->db->order_by("id","desc");
if($this->input->post('search',true)){
$this->db->like('clientid', $this->input->post('search'));
}
if($this->input->post('search',true)){
$this->db->or_where('username', $this->input->post('search'));
}
if($this->input->post('search',true)){
$this->db->or_like('email', $this->input->post('search'));
}
$query = $this->db->get();
$this->lastQ = $this->db->last_query();

return $query;

}
public function showclientid(){
$this->db->select('*');
$this->db->from('addclient');
$query = $this->db->get();
return $query;

}

public function qrreport($limit=0, $start=1){
$this->db->limit($limit, $start);
$this->db->select('*');
$this->db->from('ct_scan');
$this->db->order_by("id","desc");
if($this->input->post('search',true)){
$this->db->like('userid', $this->input->post('search'));
}
if($this->input->post('search',true)){
$this->db->or_like('clientid', $this->input->post('search'));
}

$query = $this->db->get();
$this->get_qrreport = $this->db->last_query();

return $query;

}

public function createdcode($limit=0, $start=1){
$this->db->limit($limit, $start);
$this->db->select('*');
$this->db->from('floarqrcode');
$this->db->order_by("id","desc");
if($this->input->post('search',true)){
$this->db->like('userid', $this->input->post('search'));
}
if($this->input->post('search',true)){
$this->db->or_like('clientid', $this->input->post('search'));
}

$query = $this->db->get();

$this->created_code = $this->db->last_query();

return $query;

}

public function attendancelist($limit=0, $start=1){
$clientid = $this->session->userdata('clientid');

$this->db->limit($limit, $start);
$this->db->select('max(ct_attendance.userid),ct_attendance.clientid, ct_attendance.username,ct_attendance.latitude,ct_attendance.longitude,ct_attendance.type,ct_attendance.intime,ct_patrolend.userid,ct_patrolend.outtime,ct_patrolend.total_hours');
$this->db->from('ct_attendance');
$this->db->join('ct_patrolend','ct_attendance.clientid = ct_patrolend.clientid');
$this->db->where ("(ct_attendance.intime >= now()) = (ct_patrolend.outtime >= now())");
if($this->session->userdata('clientid')){
$this->db->or_where('ct_attendance.clientid', $clientid);
}

$this->db->group_by("userid");
if($this->input->post('search',true)){
$this->db->like('ct_attendance.userid', $this->input->post('search'));
}
if($this->input->post('search',true)){
$this->db->or_like('ct_attendance.clientid', $this->input->post('search'));
}

$query = $this->db->get();
$this->db->order_by("id","desc");
$this->attendance = $this->db->last_query();
return $query;
}

public function incident_report($limit=0, $start=1){
$this->db->limit($limit, $start);
$clientid= $this->session->userdata('clientid');
$this->db->select('ct_incident.id, ct_incident.clientid, ct_incident.userid, ct_incident.username, ct_incident.type, ct_incident.imageurl,ct_incident.incident, ct_incident.description, ct_incident.address, ct_login.token');
$this->db->from('ct_incident');

$this->db->join('ct_login', 'ct_incident.userid = ct_login.userid');
if($this->session->userdata('clientid')){
	$this->db->where('ct_incident.clientid', $clientid);
}
$this->db->order_by("ct_incident.id","desc");
$this->db->group_by("ct_incident.id");
if($this->input->post('search',true)){
$this->db->like('ct_incident.userid', $this->input->post('search'));

}

$query = $this->db->get();
$this->incident = $this->db->last_query();
return $query;

}

public function loneman_report($limit=0,$start=1){
$clientid = $this->session->userdata('clientid');
$this->db->limit($limit,$start);
$this->db->select('*');
$this->db->from('ct_panicalarm');
if($this->session->userdata('clientid')){
	$this->db->where('clientid', $clientid);
}

$this->db->order_by("id","desc");
if($this->input->post('search', true)){
$this->db->like('userid',$this->input->post('search'));
}
$query = $this->db->get();

$this->lones = $this->db->last_query();

return $query;
}

//  public function loneman_image(){
//     $clientid = $this->session->userdata('clientid');
//     $this->db->select('*');
//     $this->db->from('ct_panicimages');
//     $this->db->where('clientid', $clientid);
//     $query = $this->db->get();
//     return $query;
// }


public function login($email,$password){
$query = $this->db->where(['email'=>$email, 'password'=>$password])
->get('admin_account');
if($query->num_rows()){
 return TRUE;
}else {
 return FALSE;
}
}

public function atreport($personid, $limit = 0, $start =1){
$this->db->limit($limit, $start);
$this->db->select('ct_attendance.userid,ct_attendance.username,ct_attendance.type,ct_attendance.intime,ct_patrolend.outtime,ct_patrolend.userid,ct_patrolend.total_hours');
$this->db->from('ct_attendance');   
$this->db->join('ct_patrolend', 'ct_attendance.userid = ct_patrolend.userid');
$this->db->where('ct_attendance.userid', $personid);

if($this->input->post('search',true)){
$this->db->or_like('ct_attendance.intime', $this->input->post('search'));
}
$query = $this->db->get();
$this->attendance = $this->db->last_query();
// print_r($this->db->last_query());exit;
$result = $query->result();
return $result;
}

public function ins_image($personid, $limit = 10, $start =0){
$this->db->limit($limit, $start);
$this->db->select('*');
$this->db->from('ct_panicimages');   
$this->db->where('userid', $personid);
$query = $this->db->get();
$this->ins = $this->db->last_query();

$result = $query->result();
return $result;
}

public function edit($data){
$this->db->select('*');
$this->db->from('register');
$this->db->where('id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}


public function admin_profile($admin){
$this->db->select('*');
$this->db->from('admin_account');
$this->db->where('email', $admin);
$query = $this->db->get();
$result = $query->result();
foreach ($result as $type) {
	$types = $type->type;
}
$this->session->set_userdata('type', $types);
return $result;
}

public function client_profile($client){
$this->db->select('*');
$this->db->from('addclient');
$this->db->where('clientid', $client);
$query = $this->db->get();
$result = $query->result();

return $result;
}


// Update Query For Selected Student
public function update_student_id1($id1,$data){
$this->db->where('id', $id1);
$this->db->update('register', $data);
return true;        
}

public function clientedit($data){
$this->db->select('*');
$this->db->from('addclient');
$this->db->where('id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
public function admin_edit($data){
$this->db->select('*');
$this->db->from('admin_account');
$this->db->where('id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
// Update Query For Selected Student
public function update_client_id1($id,$data){
$this->db->where('id', $id);
$this->db->update('addclient', $data);
return true;        
}
public function update_admin_data($id,$data){
$this->db->where('id', $id);
$this->db->update('admin_account', $data);
return true;        
}



public function delete_user($id){
$this->db->where("id",$id);
$this->db->delete("register");
return true;
}
public function delete_admin($id){
$this->db->where("id",$id);
$this->db->delete("admin_account");
return true;
}

public function clientdelete($id){
$this->db->where("id",$id);
$this->db->delete("addclient");
return true;
}

public function insdelete($id){
$this->db->where("id",$id);
$this->db->delete("ct_incident");
return true;
}

public function get_total_row(){
$sql=explode('LIMIT', $this->lastQuery);
$query =$this->db->query($sql[0]);
$result= $query->result();
return count($result);
}
public function get_total_admin(){
$sql=explode('LIMIT', $this->admin);
$query =$this->db->query($sql[0]);
$result= $query->result();
return count($result);
}

public function get_total_clients(){
$sql=explode('LIMIT', $this->lastQ);
$query =$this->db->query($sql[0]);
$result= $query->result();
return count($result);
}
public function get_qrreport(){
$sql=explode('LIMIT', $this->get_qrreport);
$query =$this->db->query($sql[0]);
$result= $query->result();
return count($result);
}
public function createdqr(){
$sql=explode('LIMIT', $this->created_code);
$query =$this->db->query($sql[0]);
$result= $query->result();
return count($result);
}

public function attendencelistlim(){
$sql=explode('LIMIT', $this->attendance);
$query =$this->db->query($sql[0]);
$result= $query->result();
return count($result);
}

public function insidimg(){
$sql=explode('LIMIT', $this->ins);
$query =$this->db->query($sql[0]);
$result= $query->result();
return count($result);
}

public function lones(){
$sql=explode('LIMIT', $this->lones);
$query =$this->db->query($sql[0]);
$result= $query->result();
return count($result);
}

public function ins_report(){
$sql=explode('LIMIT', $this->incident);
$query =$this->db->query($sql[0]);
$result= $query->result();
return count($result);
}


public function start_point($id){
$this->db->select('*');
$clientid = $this->session->userdata('clientid');
$this->db->from('ct_marker_livelocation');

if($this->session->userdata('clientid')){
$this->db->where("clientid", $clientid);
}

if($this->session->userdata('login')){
$this->db->where("clientid", $id);
}


$this->db->group_by("userid");
$query = $this->db->get();
return $query;
}
public function end_point($id){

$this->db->select('*');
$clientid = $this->session->userdata('clientid');
$this->db->from('ct_livelocation');

if($this->session->userdata('clientid')){
$this->db->where("clientid", $clientid);
}

if($this->session->userdata('login')){
$this->db->where("clientid", $id);
}
$this->db->order_by("id","desc");
$this->db->group_by("userid");
$query = $this->db->get();
return $query;
}

public function show_last(){
$this->db->select('*');
$this->db->from('ct_livelocation');
$query = $this->db->get();
print_r($query);
}

public function show_security(){
$this->db->select('*');
$this->db->from('ct_livelocation');
$query = $this->db->get();
return $query;
}


public function licence($clientorg){
$this->db->select('count(id) as rows');
$this->db->from('register');
$this->db->where('clientid', $clientorg);
$query = $this->db->get();
foreach($query->result() as $r)
{
   return $r->rows;
}

}
public function product($clientorg){

$clientid= $this->session->userdata('clientid');
$this->db->limit(1);
$this->db->select('*');
$this->db->from('products');
$this->db->where('clientid', $clientorg);
$this->db->order_by("id","desc");
$query = $this->db->get();
$result= $query->result();
return $result;
}

}

?>