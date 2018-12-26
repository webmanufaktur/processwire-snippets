<script>
	var dnt = (
		navigator.doNotTrack === 'yes' ||
		navigator.doNotTrack === '1' ||
		navigator.msDoNotTrack === '1' ||
		window.doNotTrack === 'yes' ||
		window.doNotTrack === '1' ||
		window.msDoNotTrack === '1'
	);

  console.log(dnt);

	if (!dnt) {
    (function(d) {
    var config = {
      kitId: 'zjh4wnp',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
    console.log("dnt loaded");
	}
</script>