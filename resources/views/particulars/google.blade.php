
<!-- <HEAD> arasına -->
	<style>
		/* Translate */
		#goog-gt-tt {display:none !important;}
		.goog-te-banner-frame {display:none !important;}
		.goog-te-menu-value:hover {text-decoration:none !important;}
		body {top:0 !important;}
		#google_translate_element2 {display:none!important;}
	</style>
	<script type="text/javascript">
		jQuery('.switcher .selected').click(function() {if(!(jQuery('.switcher .option').is(':visible'))) {jQuery('.switcher .option').stop(true,true).delay(100).slideDown(500);jQuery('.switcher .selected a').toggleClass('open')}});
		jQuery('.switcher .option').bind('mousewheel', function(e) {var options = jQuery('.switcher .option');if(options.is(':visible'))options.scrollTop(options.scrollTop() - e.originalEvent.wheelDelta);return false;});
		jQuery('body').not('.switcher').mousedown(function(e) {if(jQuery('.switcher .option').is(':visible') && e.target != jQuery('.switcher .option').get(0)) {jQuery('.switcher .option').stop(true,true).delay(100).slideUp(500);jQuery('.switcher .selected a').toggleClass('open')}});
	</script>

	<li style="display:none" id="google_translate_element2"></li>
	<script type="text/javascript">
		function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'tr',autoDisplay: false}, 'google_translate_element2');}
	</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


	<script type="text/javascript">
		function GTranslateGetCurrentLang() {var keyValue = document.cookie.match('(^|;) ?googtrans=([^;]*)(;|$)');return keyValue ? keyValue[2].split('/')[2] : null;}
		function GTranslateFireEvent(element,event){try{if(document.createEventObject){var evt=document.createEventObject();element.fireEvent('on'+event,evt)}else{var evt=document.createEvent('HTMLEvents');evt.initEvent(event,true,true);element.dispatchEvent(evt)}}catch(e){}}
		function doGTranslate(lang_pair){if(lang_pair.value)lang_pair=lang_pair.value;if(lang_pair=='')return;var lang=lang_pair.split('|')[1];if(GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0])return;var teCombo;var sel=document.getElementsByTagName('select');for(var i=0;i<sel.length;i++)if(sel[i].className=='goog-te-combo')teCombo=sel[i];if(document.getElementById('google_translate_element2')==null||document.getElementById('google_translate_element2').innerHTML.length==0||teCombo.length==0||teCombo.innerHTML.length==0){setTimeout(function(){doGTranslate(lang_pair)},500)}else{teCombo.value=lang;GTranslateFireEvent(teCombo,'change');GTranslateFireEvent(teCombo,'change')}}
		if(GTranslateGetCurrentLang() != null)jQuery(document).ready(function() {jQuery('div.switcher div.selected a').html(jQuery('div.switcher div.option').find('img[alt="'+GTranslateGetCurrentLang()+'"]').parent().html());});
	</script>  










<a href="#" onclick="doGTranslate('tr|en');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;"title="İngilizce" class="nturl"><img src="https://kodpilot.com/assets/images/lang/english.svg" height="18" width="22" alt="english" /></a>


<a href="#" onclick="doGTranslate('tr|ru');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;"title="Rusça" class="nturl"><img src="https://kodpilot.com/assets/images/lang/russian.svg" height="18" width="22" alt="english" /></a>



<a href="#" onclick="doGTranslate('tr|de');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;"title="Almanca" class="nturl"><img src="https://kodpilot.com/assets/images/lang/german.svg" height="18" width="22" alt="german" /></a>



<a href="#" onclick="doGTranslate('tr|ar');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;"title="Arapça" class="nturl selected"><img src="https://kodpilot.com/assets/images/lang/arabic.svg" height="18" width="22" alt="arabic"/></a>



<a href="#" onclick="doGTranslate('tr|tr');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;"title="Türkçe" class="nturl selected"><img src="https://kodpilot.com/assets/images/lang/turkish.svg" height="18" width="22" alt="turkish" /></a>