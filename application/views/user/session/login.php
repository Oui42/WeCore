<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<h1><?= $this->lang->line('key_login') ?></h1>
	<div class="panel">
		<?php if(validation_errors()) : ?>
			<div class="panel-alert">
				<?= validation_errors() ?>
			</div>
		<?php endif; ?>
		<div class="panel-body">
			<div class="text-center">
				<?= form_open() ?>
					<div class="form-group">
						<span class="form-input"><i class="fa fa-fw fa-user"></i></span>
						<input class="form-input" id="login" type="text" name="user_login" placeholder="Login" value="<?= $this->input->post('user_login') ?>">
					</div>
					<div class="form-group">
						<span class="form-input"><i class="fa fa-fw fa-lock"></i></span>
						<input class="form-input" id="password" type="password" name="user_password" placeholder="<?= $this->lang->line('key_password') ?>">
					</div>
					<div class="form-group">
						<button class="btn btn-blue"><?= $this->lang->line('key_sign_in') ?></button>
					</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</div>