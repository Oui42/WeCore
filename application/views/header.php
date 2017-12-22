<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?= $name ?></title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
		<link rel="icon" type="image/png" href="<?= base_url() ?>images/favicon.png">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="header">
			<div class="container">
				<div class="header-brand">
					<a href="<?= base_url() ?>"><img src="<?= base_url() ?>images/logo.svg" alt="logo" class="logo"></a>
				</div>
				<div class="header-user">
					<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
						<div class="header-user-avatar">
							<a href=""><img src="images/avatar.png" alt="avatar" class="header-avatar"></a>
						</div>
						<div class="header-user-menu">
							<ul class="header-user-menu">
								<li><a href=""><i class="fa fa-fw fa-user"></i> Profil - <?= $_SESSION['user_login'] ?></a></li>
								<li><a href=""><i class="fa fa-fw fa-envelope-o"></i> Wiadomości</a></li>
								<li><a href=""><i class="fa fa-fw fa-cog"></i> Ustawienia</a></li>
								<li><a href=""><i class="fa fa-fw fa-sign-out"></i> Wyloguj</a></li>
							</ul>
						</div>
					<?php } else { ?>
						<div class="header-user-guest">
							<a href="<?= base_url() ?>user/login" class="btn btn-blue"><?= $this->lang->line('key_login') ?></a>
							<a href="<?= base_url() ?>user/register" class="btn btn-red"><?= $this->lang->line('key_register') ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="header-menu">
				<ul class="header-menu">
					<li class="header-menu-button"><a href="<?= base_url() ?>">Forum</a></li>
					<li class="header-menu-button"><a href=""><?= $this->lang->line('key_rules') ?></a></li>
					<li class="header-menu-button"><a href=""><?= $this->lang->line('key_duels') ?></a></li>
				</ul>
			</div>
			<div class="header-menu-right">
				<ul class="header-menu-right">
					<li class="header-menu-button-right"><a href="">Admin</a></li>
				</ul>
			</div>
			<div class="header-menu-search">
				<input type="text" name="search" placeholder="<?= $this->lang->line('key_search') ?>...">
				<button class="btn"><i class="fa fa-search"></i></button>
			</div>
			<div class="clear"></div>
		</div>