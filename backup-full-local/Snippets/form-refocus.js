// scroll to form submitted message
jQuery(document).ready(function($) {
  var f = $('#FormBuilderSubmitted');
  if(!f.length) return; 
  var y = f.offset().top;
  $('body').animate( { scrollTop: y }, 'slow'); 
});