<h2 style="margin-top:0px">User <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
<div class="form-group">
    <label for="varchar">Nama <?php echo form_error('nama') ?></label>
    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Username <?php echo form_error('username') ?></label>
    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Password <?php echo form_error('password') ?></label>
    <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
</div>
<div class="form-group">
    <label for="tinyint">Status <?php echo form_error('status') ?></label>
    <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
<a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
</form>