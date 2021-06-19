

    counter_image=1;
	
    function addImage(){
      var temp_image=$('#prod_image_0').clone();
      temp_image.prop('id','prod_image_'+counter_image).appendTo('#repeat_image').find("#add_image").prop('class','btn btn-danger').html('- Remove').attr('onclick', 'removeImage("#prod_image_'+counter_image+'")');   
      temp_image=temp_image.find('#remove_image').remove();
      counter_image++;
    }

    function removeImage(attr){
     $(attr).remove();
    }
