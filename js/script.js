jQuery(document).ready(function($){

	$.ajax({
          type: 'post',
          url:'/testwordpress/wp-admin/admin-ajax.php',
          data:{
          	action: 'babula'
          },
          success: function(data){
          	$('.ajax').html(data);
          },
          error: function(XMLHttpRequest, textStatus, errorThrown){
              alert(errorThrown);
          }


	});
});