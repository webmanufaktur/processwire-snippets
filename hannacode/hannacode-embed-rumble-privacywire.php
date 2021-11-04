<?php namespace ProcessWire;

// Source: ProcessWire Community Forum
// Author: wbmnfktr
// URL: https://processwire.com/talk/topic/26302-embed-rumble-video/?do=findComment&comment=218530

// HannaCode Import Code
// !HannaCode:rumblePrivacyWire:eyJuYW1lIjoicnVtYmxlUHJpdmFjeVdpcmUiLCJ0eXBlIjoyLCJjb2RlIjoiXC8qaGNfYXR0clxudmlkZW9pZD1cInZscG9pNlwiXG5oY19hdHRyKlwvXG48P3BocCBuYW1lc3BhY2UgUHJvY2Vzc1dpcmU7ID8+XG5cbjxzY3JpcHQgdHlwZT1cInRleHRcL3BsYWluXCIgZGF0YS10eXBlPVwidGV4dFwvamF2YXNjcmlwdFwiIGRhdGEtY2F0ZWdvcnk9XCJleHRlcm5hbF9tZWRpYVwiIGNsYXNzPVwicmVxdWlyZS1jb25zZW50XCI+IWZ1bmN0aW9uKHIsdSxtLGIsbCxlKXtyLl9SdW1ibGU9YixyW2JdfHwocltiXT1mdW5jdGlvbigpeyhyW2JdLl89cltiXS5ffHxbXSkucHVzaChhcmd1bWVudHMpO2lmKHJbYl0uXy5sZW5ndGg9PTEpe2w9dS5jcmVhdGVFbGVtZW50KG0pLGU9dS5nZXRFbGVtZW50c0J5VGFnTmFtZShtKVswXSxsLmFzeW5jPTEsbC5zcmM9XCJodHRwczpcL1wvcnVtYmxlLmNvbVwvZW1iZWRKU1wvdTRcIisoYXJndW1lbnRzWzFdLnZpZGVvPycuJythcmd1bWVudHNbMV0udmlkZW86JycpK1wiXC8/dXJsPVwiK2VuY29kZVVSSUNvbXBvbmVudChsb2NhdGlvbi5ocmVmKStcIiZhcmdzPVwiK2VuY29kZVVSSUNvbXBvbmVudChKU09OLnN0cmluZ2lmeShbXS5zbGljZS5hcHBseShhcmd1bWVudHMpKSksZS5wYXJlbnROb2RlLmluc2VydEJlZm9yZShsLGUpfX0pfSh3aW5kb3csIGRvY3VtZW50LCBcInNjcmlwdFwiLCBcIlJ1bWJsZVwiKTs8XC9zY3JpcHQ+XG5cbjxkaXYgaWQ9XCJydW1ibGVfPD9waHAgZWNobyAkdmlkZW9pZDsgPz5cIj48XC9kaXY+XG48c2NyaXB0IHR5cGU9XCJ0ZXh0XC9wbGFpblwiIGRhdGEtdHlwZT1cInRleHRcL2phdmFzY3JpcHRcIiBkYXRhLWNhdGVnb3J5PVwiZXh0ZXJuYWxfbWVkaWFcIiBjbGFzcz1cInJlcXVpcmUtY29uc2VudFwiPlJ1bWJsZShcInBsYXlcIiwge1widmlkZW9cIjpcIjw/cGhwIGVjaG8gJHZpZGVvaWQ7ID8+XCIsXCJkaXZcIjpcInJ1bWJsZV88P3BocCBlY2hvICR2aWRlb2lkOyA/PlwifSk7PFwvc2NyaXB0PiJ9/!HannaCode

?>

<script type="text/plain" data-type="text/javascript" data-category="external_media" class="require-consent">!function(r,u,m,b,l,e){r._Rumble=b,r[b]||(r[b]=function(){(r[b]._=r[b]._||[]).push(arguments);if(r[b]._.length==1){l=u.createElement(m),e=u.getElementsByTagName(m)[0],l.async=1,l.src="https://rumble.com/embedJS/u4"+(arguments[1].video?'.'+arguments[1].video:'')+"/?url="+encodeURIComponent(location.href)+"&args="+encodeURIComponent(JSON.stringify([].slice.apply(arguments))),e.parentNode.insertBefore(l,e)}})}(window, document, "script", "Rumble");</script>

<div id="rumble_<?php echo $videoid; ?>"></div>
<script type="text/plain" data-type="text/javascript" data-category="external_media" class="require-consent">Rumble("play", {"video":"<?php echo $videoid; ?>","div":"rumble_<?php echo $videoid; ?>"});</script>
