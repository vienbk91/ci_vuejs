<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ja" xml:lang="ja" xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,user-scalable=no,maximum-scale=1" />
<meta name="Keywords" content="Codeigniter And BackboneJs" />
<meta name="Description" content="Codeigniter And BackboneJs" />

<title><?= $this->lang->line("title_label"); ?></title>
<script src="<?= base_url(); ?>js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>css/login.css" />
<script type="text/javascript">
//言語切換える
function changeLanguage(lan){
	//Ajax
	$.ajax({
		type: 'post', // HTTPメソッド（CodeIgniterだとgetは捨てられる）
		url: '<?= base_url();?>common/changeLanguage', //リクエストの送り先URL（適宜変える）
		data: {
			"language":lan
		},	//サーバに送るデータ。JSのオブジェクトで書ける
		dataType: 'text', //サーバからくるデータの形式を指定
		//リクエストが成功したらこの関数を実行！！
		success: function(data) {
			setTimeout(function(){
				parent.window.location.reload();
			}, 200);
			//location.reload();
		},
		error: function() {
			alert(sys_err);
		}
	});
}
</script>
</head>

<body class="main">
	<div class="header">
		<div class="title">
			<h3 style="color: green; font: italic; font-weight: bold; font-size: x-large;"><?= $this->lang->line('title'); ?></h3>
		</div>
		<div class="language">
			<ul class="languagepicker roundborders large">
				<?php 
				switch ($language) {
					case 'japanese':
						$imgPath = "01japanese.png";
						$languageText = $this->lang->line('japanese');
						break;
					case 'vietnamese':
						$imgPath = "02vietnamese.png";
						$languageText = $this->lang->line('vietnamese');
						break;
					case 'english':
						$imgPath = "03english.png";
						$languageText = $this->lang->line('english');
						break;
					default:
						$imgPath = "01japanese.png";
						$languageText = $this->lang->line('japanese');
						break;
				}
				?>
				<a href="javascript:void(0);"><li><img src="<?= base_url();?>img/<?= $imgPath; ?>" width="50" height="30" /><?= $languageText; ?></li></a>
				<a href="javascript:void(0);" onclick="changeLanguage('japanese');"><li><img src="<?= base_url();?>img/01japanese.png" width="50" height="30" /><?= $this->lang->line('japanese'); ?></li></a>
				<a href="javascript:void(0);" onclick="changeLanguage('vietnamese');"><li><img src="<?= base_url();?>img/02vietnamese.png" width="50" height="30" /><?= $this->lang->line('vietnamese'); ?></li></a>
				<a href="javascript:void(0);" onclick="changeLanguage('english');"><li><img src="<?= base_url();?>img/03english.png" width="50" height="30" /><?= $this->lang->line('english'); ?></li></a>
			</ul>
		</div>
	</div>
	
	<div class="content">
		<form action="<?= base_url();?>login/" method="post" name="login_form" id="login_form">
			<div class="container">
				<label><b><?= $this->lang->line('user_name'); ?></b></label>
				<input type="text" name="user_name" id="user_name" value="<?= set_value("user_name"); ?>" placeholder="<?= $this->lang->line('placeholder_user_name'); ?>" /> 
				<span class="error"><?= form_error('user_name'); ?></span>
				<label><b><?= $this->lang->line('password'); ?></b></label>
				<input type="password" name="password" id="password" value="<?= set_value("password"); ?>" placeholder="<?= $this->lang->line('placeholder_password'); ?>" />
				<span class="error"><?= form_error('password'); ?></span>
				<button type="submit"><?= $this->lang->line('login_btn'); ?></button>
			</div> 
		</form>
		<div class="fb_login">
			<a href="<?= base_url(); ?>fb_login" style="float: right;"><?= $this->lang->line('login_with_fb'); ?></a>
			<a href="<?= base_url(); ?>register" style="float: left;"><?= $this->lang->line('register'); ?></a>
		</div>
	</div>
</body>
</html>