<div class="CaptchaDa" id="cd<?=md5(rand(0,999999)."".rand(0,999999))?>" data-id="1" data-width="" data-height="" data-length="" data-lang="fr" style="width: 260px;"></div>
<script type="text/javascript">
	// if(typeof CaptchaDa_var == 'undefined'){
	// 	var CaptchaDa_var = true;
		var xh;
		if (window.XMLHttpRequest)
			xh = new XMLHttpRequest();
		else if (window.ActiveXObject)
			xh = new ActiveXObject('Microsoft.XMLHTTP');
		else 
			alert('JavaScript : Ce navigateur ne supporte pas les objets XMLHttpRequest...');

		xh.open('GET','CaptchaDa.php?getbox=true',true);
		xh.onreadystatechange = function()
		{
			if(xh.readyState == 4){
				alert(xh.responseText);
				document.getElementsByClassName('CaptchaDa')[0].innerHTML = xh.responseText;
			}
		}
		xh.send(null);
	//}

</script>
