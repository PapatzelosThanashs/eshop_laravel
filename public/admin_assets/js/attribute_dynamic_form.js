

    counter=1;
	
    function add(){
      var temp=$('#prod_att_0').clone();
      temp.prop('id','prod_att_'+counter).appendTo('#repeat').find("#add_form").prop('class','btn btn-danger').html('- Remove').attr('onclick', 'remove("#prod_att_'+counter+'")');   
      temp=temp.find('#remove_attr').remove();
      counter++;
    }

    function remove(attr){
     $(attr).remove();
    }
