

<html>
	<head>
		<title>Get724 Mpi 3D-Secure İşlem Sayfası</title>

<meta http-equiv="Content-Language" content="tr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
	
		<form name="downloadForm" action="<?php echo $result['ACSUrl']?>" method="POST">
<!--		<noscript>-->
{{-- 		<br>
		<br>
		<div id="image1" style="position:absolute; overflow:hidden; left:0px; top:0px; width:180px; height:180px; z-index:0"><img src="" alt="" title="" border=0 width=180 height=180></div>
		<center>
		<h1>3-D Secure İşleminiz yapılıyor</h1>
		<h3>
			3D-Secure işleminizin doğrulama aşamasına geçebilmek için Gönder butonuna basmanız gerekmektedir
		</h3>
		<input type="submit" value="Gönder">
		</center> --}}
<!--</noscript>-->
		<input type="hidden" name="PaReq" value="<?php echo $result['PaReq']?>">
		<input type="hidden" name="TermUrl" value="<?php echo $result['TermUrl']?>">
		<input type="hidden" name="MD" value="<?php echo $result['MerchantData']?>">
		</form>
	<SCRIPT LANGUAGE="Javascript" >
		document.downloadForm.submit();
	</SCRIPT>
	</body>
</html>				