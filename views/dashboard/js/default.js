

  $(function() {

    $( "[data-default]" ).sortable({

    	stop: function(event,ui) {

    		var stringDiv = "";

            $("[data-default]").children().each(function(i) {

            	 var li = $(this);

            	 stringDiv += ""+li.attr("data-id") + '=' + i + '&';

            });	

             $.ajax({
                type: "POST",
                url: "/dashboard/updateOrder",
                data: stringDiv

            }); 

        }

    });

    $( "[data-default]" ).disableSelection(); 
            
  });

function delete_photo(delete_id){

	$.get( "/dashboard/delete/"+delete_id,function(data) {
	 
	  div_id = '#photo_'+delete_id;

	  $(div_id).hide();

	  alert( "Deleted" );

	});

}