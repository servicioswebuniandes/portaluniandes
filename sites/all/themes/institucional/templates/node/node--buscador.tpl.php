<?php
global $language ;
$lang_name = $language->language; 

if($lang_name=="es"){
?>

<script>
  (function() {
    var cx = '012938711384948367755:igfj6yretkk';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search queryParameterName="query"></gcse:search>

<?php
}else{
?>
	<script>
	  (function() {
		var cx = '012938711384948367755:igfj6yretkk';
		var gcse = document.createElement('script');
		gcse.type = 'text/javascript';
		gcse.async = true;
		gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(gcse, s);
	  })();
	</script>
	<gcse:search queryParameterName="query"></gcse:search>
<?php
}
?>