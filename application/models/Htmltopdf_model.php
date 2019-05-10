<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Htmltopdf_model extends CI_Model
{
function fetch()
{
$this->db->order_by('id', 'DESC');
return $this->db->get('ct_incident');
}
function fetch_single_details($customer_id)
{
$this->db->where('id', $customer_id);
$data = $this->db->get('ct_incident');
$output = '<table width="100%" cellspacing="5" cellpadding="5" style="line-height: 2;">';
foreach($data->result() as $row)
{
	$allowed =  array('gif','png' ,'jpg');
$filename1 = $row->imageurl;
$filename= substr($filename1, -3);

if($filename == 'mp4') {
$output .= '<tr>
  <video controls="" width="300" height="300">
<source src="'.base_url().'mytetrax/'.$row->imageurl.'"  type="video/mp4">
<source src="mov_bbb.ogg" type="video/ogg">
</video>

';
}
if(in_array($filename,$allowed)) {
$output .= '<tr>
  
<td width="40%"><img src="'.base_url().'mytetrax/'.$row->imageurl.'" width="300" height="300" style="border-radius: 20px;"><br>
</td>

';
}

$output .= '

<td width="60%">
<p><b>Client ID : </b>'.$row->clientid.'</p>
<p><b>User ID : </b>'.$row->userid.'</p>
<p><b>Username : </b>'.$row->username.'</p>
<p><b>Address : </b>'.$row->address.'</p>
<p><b>type : </b>'.$row->type.'</p>
<p><b>Incident : </b>'.$row->incident.'</p>
<p><b>Description : </b> '.$row->description.' </p>
</td>
</tr>
';
$output .= '<tr>

<td><br><br><br><b>User SignURL :</b><br><img
src="'.base_url().'mytetrax/'.$row->signurl.'" style="width: 80px;"><br> </td><br> </td>

';

}
$output .= '';
$output .= '</table>';
return $output;
}
}

?>