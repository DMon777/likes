$(document).ready(function(){

   $(".like_img").bind('click',function(){

      var article_id = $(".article_id").val();

      $.ajax({
         url:'/ajax/method/add_like',
         type:'post',
         data:{article_id:article_id},
         success:function(result){
            $(".count_likes").html(result);
          }

      });



   });


});