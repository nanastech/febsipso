<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Halaman Edit Akun</title>
</head>
<body>
	<h1>Halaman Edit Akun</h1>
	<?php $this->load->view('sadmin/menu');?>
	<hr>
	<br>
	<table>
	<form action="<?php echo base_url('superadmin/update_akun/'); ?>" method="POST">
		<tr>
			<td>
				Username
			</td>
			<td>
				:
			</td>
			<td><input type="text" name="username" readonly="" value="<?= $akun->username;?>"><br><?php echo form_error('username');?></td>
		</tr>
		<tr>
			<td>
				Password
			</td>
			<td>
				:
			</td>
			<td><input type="password" name="password"><?php echo form_error('password');?></td>
		</tr>
		<tr>
			<td>
				Name
			</td>
			<td>
				:
			</td>
			<td><input type="text" name="name" value="<?= $akun->name;?>"><?php echo form_error('name');?></td>
		</tr>
		<tr>
			<td>
				Role
			</td>
			<td>
				:
			</td>
			<td>
			<select name="role">
				<option value="0">0 - Superadmin</option>	
				<option value="1" selected="">1 - Admin</option>
				<option value="3" >3 - Mahasiswa</option>	
			</select>
			</td>
		</tr>
		<tr>
			<td>
				Status
			</td>
			<td>
				:
			</td>
			<td>
			<select name="status">
				<option value="0">0 - Tidak Aktif</option>	
				<option value="1" selected="">1 - Aktif</option>	
			</select>
			</td>
		</tr>
		<tr>
			<td>
				
			</td>
			<td colspan="2">
				<input type="submit" value="Submit">
				<input type="reset" value="Reset">
			</td>
		</tr>
	</form>
	</table>
	<br>
	<hr>
	<br>
	<table border="1" width="50%">
		<thead>
			<tr bgcolor="khaki">
				<td>
					No.
				</td>
				<td>
					Username
				</td>
				<td>
					Password
				</td>
				<td>
					Name
				</td>
				<td>
					Role
				</td>
				<td>
					Status
				</td>
			</tr>
		</thead>
		<tbody>
		<?php 
		$no=1;
		$users=$this->Sadmin_model->read('users');
		foreach ($users as $row): 
			if ($row['role']!=2) {?>
			<tr>
				<td>
					<?= $no;?>
				</td>
				<td>
					<?= $row['username']?>
				</td>
				<td>
					******
				</td>
				<td>
					<?= $row['name']?>
				</td>
				<td>
					<?php 
					if ($row['role']==0) {
						echo 'superadmin';
					}elseif ($row['role']==1) {
						echo 'admin';
					}elseif ($row['role']==2) {
						echo 'dosen';
					}
					?>
				</td>
				<td>
					<?php 
					if ($row['status_active']==0) {
						echo 'tidak aktif';
					}elseif ($row['status_active']==1) {
						echo 'aktif';
					}
					?>
				</td>
			</tr>
			<?php $no=$no+1;
			}else{ ?>
			
			<?php 
			}?>
			<?php 
			endforeach ?>
		</tbody>
	</table>

</body>
</html>