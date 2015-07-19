<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>TH Captcha</title>
	<style type="text/css">
		body {
			background: #ccc;
		}
		.captcha-box {
			display: block;
			width: 200px;
			border: 1px solid #eee;
			overflow: hidden;
			background: #fff;
			margin: 0 auto;
		}
		.captcha-box > .captcha-group {
			display: table;
		}
		.captcha-box > .captcha-group > input {
			display: table-cell;
			width: 150px;
			padding: 10px;
			border: 0;
			font-size: 16px;
			outline: none;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
		}
		.captcha-box > .captcha-group > button {
			display: table-cell;
			width: 50px;
			padding: 10px;
			border: 0;
			cursor: pointer;
			outline: none;
		}
	</style>
</head>
<body>
	<form onsubmit="send(this);return false;">
		<div class="captcha-box">
			<img src="captcha.php" />
			<div class="captcha-group">
				<input type="text" id="captcha" name="captcha" placeholder="Insert captcha code."/>
				<button type="submit">OK</button>	
			</div>
		</div>
	</form>
	<script type="text/javascript">
	window.onload = function(){
		var text_input = document.getElementById ('captcha');
		text_input.focus ();
		text_input.select ();
	}
	function send(data) {
		var formData = new FormData(data);
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.open("POST", 'check.php');
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4) {
					console.log(xmlhttp.responseText);
					if (xmlhttp.responseText === 'PASS') {
						alert('pass');
						location.reload();
					} else {
						alert('wrong');
						location.reload();
					}
				}
			}
		xmlhttp.send(formData);
	}
	</script>
</body>
</html>