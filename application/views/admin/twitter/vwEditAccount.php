<?php
$this->load->view('admin/vwHeader');
?>

<link href="<?php echo HTTP_CSS_PATH; ?>starter-template.css" rel="stylesheet">
 
<div class="page-header container">
  <h1><small>Edit Twitter Account</small></h1>
</div>
    <div class="container">
        
<form name="addlink" id="ajax_form" method="post" action="<?php echo base_url('admin/twitter/doedit/'.$acct_id); ?>">
<table>
<tr>
<td>Email:</td><td><?php echo form_input(array('name' => 'email','id' => 'email','value' => $email,'size' => '50','style' => '')); ?></td></tr>
<td>Password:</td><td><?php echo form_dropdown('password', array('JustLivly666' => 'JustLivly666','ThatsLivly999' => 'ThatsLivly999','OhHowLivly777' => 'OhHowLivly777'),$password); ?></td></tr>
<td>Username:</td><td><?php echo form_input(array('name' => 'username','id' => 'username','value' => $username,'size' => '50','style' => '')); ?></td></tr>
<td>Real Name:</td><td><?php echo form_input(array('name' => 'name','id' => 'name','value' => $name,'size' => '50','style' => '')); ?></td></tr>
<td>Gender:</td><td><?php echo form_dropdown('sex', array('M' => 'Male','F' => 'Female','O' => 'Other'),$sex); ?></td></tr>
<td>Ethnicity:</td><td><?php echo form_dropdown('race', array('W' => 'White','B' => 'Black','H' => 'Hispanic','O' => 'Other'),$race); ?></td></tr>
<td>Niche:</td><td><?php echo form_dropdown('niche', array('porn' => 'Porn','Weight Loss' => 'Weight Loss','Other' => 'Other'),$niche); ?></td></tr>
<td></td><td><input type="submit" /></td></tr>
</table>
</div><!-- /.container -->
<?php 
echo form_close(); 
?> 

<hr />
<?php
$this->load->view('admin/vwFooter');
?>