<?php
$this->load->view('admin/vwHeader');
?>

<link href="<?php echo HTTP_CSS_PATH; ?>starter-template.css" rel="stylesheet">

<?php
if ($page == 'add') {
?> 
<div class="page-header container">
  <h1><small>Add Twitter Account</small></h1>
</div>
    <div class="container">
        
<form name="addlink" id="ajax_form" method="post" action="<?php echo base_url('admin/twitter/doadd'); ?>">
<table>
<tr>
<td>Email:</td><td><?php echo form_input(array('name' => 'email','id' => 'email','value' => '','size' => '50','style' => '')); ?></td></tr>
<td>Password:</td><td><?php echo form_dropdown('password', array('JustLivly666' => 'JustLivly666','ThatsLivly999' => 'ThatsLivly999','OhHowLivly777' => 'OhHowLivly777')); ?></td></tr>
<td>Username:</td><td><?php echo form_input(array('name' => 'username','id' => 'username','value' => '','size' => '50','style' => '')); ?></td></tr>
<td>Real Name:</td><td><?php echo form_input(array('name' => 'name','id' => 'name','value' => '','size' => '50','style' => '')); ?></td></tr>
<td>Gender:</td><td><?php echo form_dropdown('sex', array('M' => 'Male','F' => 'Female','O' => 'Other')); ?></td></tr>
<td>Ethnicity:</td><td><?php echo form_dropdown('race', array('W' => 'White','B' => 'Black','H' => 'Hispanic','O' => 'Other')); ?></td></tr>
<td>Niche:</td><td><?php echo form_dropdown('niche', array('porn' => 'Porn','Weight Loss' => 'Weight Loss','Other' => 'Other')); ?></td></tr>

<td></td><td><input type="submit" /></td></tr>
</table>
</div><!-- /.container -->
<?php 
echo form_close(); 
} else {
?> 
<div class="page-header container">
  <h1><small>Add Account Results</small></h1>
</div>
    <div class="container">
        
<table>
<tr><td>Account ID:</td><td><?php echo $acct_id; ?></td></tr>
<tr><td>Email:</td><td><?php echo $email; ?></td></tr>
<tr><td>Password:</td><td><?php echo $password; ?></td></tr>
<tr><td>Username:</td><td><?php echo $username; ?></td></tr>
<tr><td>Real Name:</td><td><?php echo $name; ?></td></tr>
<tr><td>Gender:</td><td><?php echo $sex; ?></td></tr>
<tr><td>Ethnicity:</td><td><?php echo $race; ?></td></tr>
<tr><td>Niche:</td><td><?php echo $niche; ?></td></tr>
</tr>
</table>
</div><!-- /.container -->
<?php } ?>


<hr />
<?php
$this->load->view('admin/vwFooter');
?>