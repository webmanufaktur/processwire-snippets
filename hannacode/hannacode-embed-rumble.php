<?php namespace ProcessWire;

// Source: ProcessWire Community Forum
// Author: wbmnfktr
// URL: https://processwire.com/talk/topic/26302-embed-rumble-video/?do=findComment&comment=218528

// HannaCode Import Code
// !HannaCode:rumble:eyJuYW1lIjoicnVtYmxlIiwidHlwZSI6MiwiY29kZSI6IlwvKmhjX2F0dHJcbnZpZGVvaWQ9XCJ2bHBvaTZcIlxuaGNfYXR0cipcL1xuPD9waHAgbmFtZXNwYWNlIFByb2Nlc3NXaXJlOyA/PlxuXG48c2NyaXB0PiFmdW5jdGlvbihyLHUsbSxiLGwsZSl7ci5fUnVtYmxlPWIscltiXXx8KHJbYl09ZnVuY3Rpb24oKXsocltiXS5fPXJbYl0uX3x8W10pLnB1c2goYXJndW1lbnRzKTtpZihyW2JdLl8ubGVuZ3RoPT0xKXtsPXUuY3JlYXRlRWxlbWVudChtKSxlPXUuZ2V0RWxlbWVudHNCeVRhZ05hbWUobSlbMF0sbC5hc3luYz0xLGwuc3JjPVwiaHR0cHM6XC9cL3J1bWJsZS5jb21cL2VtYmVkSlNcL3U0XCIrKGFyZ3VtZW50c1sxXS52aWRlbz8nLicrYXJndW1lbnRzWzFdLnZpZGVvOicnKStcIlwvP3VybD1cIitlbmNvZGVVUklDb21wb25lbnQobG9jYXRpb24uaHJlZikrXCImYXJncz1cIitlbmNvZGVVUklDb21wb25lbnQoSlNPTi5zdHJpbmdpZnkoW10uc2xpY2UuYXBwbHkoYXJndW1lbnRzKSkpLGUucGFyZW50Tm9kZS5pbnNlcnRCZWZvcmUobCxlKX19KX0od2luZG93LCBkb2N1bWVudCwgXCJzY3JpcHRcIiwgXCJSdW1ibGVcIik7PFwvc2NyaXB0PlxuXG48ZGl2IGlkPVwicnVtYmxlXzw/cGhwIGVjaG8gJHZpZGVvaWQ7ID8+XCI+PFwvZGl2PlxuPHNjcmlwdD5cblJ1bWJsZShcInBsYXlcIiwge1widmlkZW9cIjpcIjw/cGhwIGVjaG8gJHZpZGVvaWQ7ID8+XCIsXCJkaXZcIjpcInJ1bWJsZV88P3BocCBlY2hvICR2aWRlb2lkOyA/PlwifSk7PFwvc2NyaXB0PiJ9/!HannaCode

?>

<script>!function(r,u,m,b,l,e){r._Rumble=b,r[b]||(r[b]=function(){(r[b]._=r[b]._||[]).push(arguments);if(r[b]._.length==1){l=u.createElement(m),e=u.getElementsByTagName(m)[0],l.async=1,l.src="https://rumble.com/embedJS/u4"+(arguments[1].video?'.'+arguments[1].video:'')+"/?url="+encodeURIComponent(location.href)+"&args="+encodeURIComponent(JSON.stringify([].slice.apply(arguments))),e.parentNode.insertBefore(l,e)}})}(window, document, "script", "Rumble");</script>

<div id="rumble_<?php echo $videoid; ?>"></div>
<script>
Rumble("play", {"video":"<?php echo $videoid; ?>","div":"rumble_<?php echo $videoid; ?>"});
</script>
