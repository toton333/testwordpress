jQuery(document).ready(function($){

     $('#ajax-form').submit(function(e){
           e.preventDefault();

           var postID = $('#post_id').val();

           

           $.ajax({
               type: 'post',
               url: '/testwordpress/wp-admin/admin-ajax.php',
               data:{
                    action: 'my_post',
                    postID: postID
               },
               success: function(data){
                  
                         var greycheck = $('#ajax-div').find('.grey').length; 

                          if(greycheck){

                                 $('.grey').html(data);
                          }else{

                             $('<div/>', {class:'grey', html: data}).insertAfter('#ajax-form');
                          }



               },
               error: function(XMLHttpRequest, textStatus, errorThrown){

                    alert(errorThrown);
               }



           });
     });
});