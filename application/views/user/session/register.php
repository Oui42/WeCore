<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<h1><?= $this->lang->line('key_register') ?></h1>
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
						<span class="form-input"><i class="fa fa-fw fa-lock"></i></span>
						<input class="form-input" id="password_repeat" type="password" name="user_password_repeat" placeholder="<?= $this->lang->line('key_repeat_password') ?>">
					</div>
					<div class="form-group">
						<span class="form-input"><i class="fa fa-fw fa-globe"></i></span>
						<input class="form-input" id="email" type="email" name="user_email" placeholder="E-mail" value="<?= $this->input->post('user_email') ?>">
					</div>
					<div class="form-group">
						<input type="checkbox" id="rules" name="rules" value="1">
						<label class="form-input-checkbox" for="rules"><?= $this->lang->line('i_have_read') ?> <a href=""><?= $this->lang->line('the_rules') ?></a> <?= $this->lang->line('and_agree') ?>.</label>
					</div>
					<div class="form-group">
						<button class="btn btn-red"><?= $this->lang->line('key_sign_up') ?></button>
					</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</div>