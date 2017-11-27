<div id="disqus_thread"></div>
<script type="text/javascript">
	/*<![CDATA[*/
	var disqus_url='<?php echo $_GET['disqus_url']; ?>';
	var disqus_identifier='<?php echo $_GET['disqus_id']; ?> http://toofestival.es/?post_type=event&#038;p=<?php echo $_GET['disqus_id']; ?>';
	var disqus_container_id='disqus_thread';
	var disqus_shortname='toofestival';
	var disqus_title="<?php echo $_GET['disqus_title']; ?>";
	var disqus_config_custom=window.disqus_config;
	var disqus_config=function(){
		this.language='';
		this.callbacks.onReady.push(function(){
			var script=document.createElement('script');
			script.async=true;
			script.src='?cf_action=sync_comments&post_id=<?php echo $_GET['disqus_id']; ?>';
			var firstScript=document.getElementsByTagName('script')[0];
			firstScript.parentNode.insertBefore(script,firstScript);});
			if(disqus_config_custom){
				disqus_config_custom.call(this);
			}
		};
	(function(){
		var dsq=document.createElement('script');
		dsq.type='text/javascript';
		dsq.async=true;
		dsq.src='//'+disqus_shortname+'.disqus.com/embed.js';
		(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(dsq);
	})();
	/*]]>*/
</script>