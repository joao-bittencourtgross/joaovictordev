<?PHP 
$address=Router::url('', true);
$address=str_replace('www.','',$address);
$address=str_replace('http://','',$address);
$address=str_replace('/','',$address);

if(isset($id)): ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?PHP echo $id?>','<?PHP echo $address ?>');
  ga('send', 'pageview');

</script>
<?PHP endif; ?>