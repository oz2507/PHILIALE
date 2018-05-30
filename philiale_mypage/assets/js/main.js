
<script type="text/javascript">
$(document).ready(function(){
  $('.fuwat').css('visibility','hidden');
  $(window).scroll(function(){
   var windowHeight = $(window).height(),
       topWindow = $(window).scrollTop();
   $('.fuwat').each(function(){
    var objectPosition = $(this).offset().top;
    if(topWindow > objectPosition - windowHeight + 200){
     $(this).addClass("fuwatAnime");
    }
   });
  });
});

</script>

