$(document).ready(function(){  
    $('#add').click(function(){  
         $('#insert').val("Insert");  
         $('#insert_form')[0].reset();  
    });

    $(document).on('click', '.edit_data', function(){  
        var user_id = $(this).attr("id");  
        $.ajax({  
             url:"php/fetch.php",  
             method:"POST",  
             data:{user_id:user_id},  
             dataType:"json",  
             success:function(data){  
                  $('#first_name').val(data.first_name);  
                  $('#second_name').val(data.second_name);
                  $('#email').val(data.email);
                  $('#user_id').val(data.id);  
                  $('#insert').val("Update");  
                  $('#add_data_Modal').modal('show');  
             }  
        });  
   }); 

    $('#insert_form').on("submit", function(event){  
         event.preventDefault();  
         if($('#name').val() == "")  
         {  
              alert("Name is required");  
         }  
         else if($('#address').val() == '')  
         {  
              alert("Address is required");  
         }  
         else if($('#designation').val() == '')  
         {  
              alert("Designation is required");  
         }  
         else if($('#age').val() == '')  
         {  
              alert("Age is required");  
         }  
         else  
         {  
              $.ajax({  
                   url:"php/insert.php",  
                   method:"POST",  
                   data:$('#insert_form').serialize(),  
                   beforeSend:function(){  
                        $('#insert').val("Inserting");  
                   },  
                   success:function(data){  
                        $('#insert_form')[0].reset();  
                        $('#add_data_Modal').modal('hide');  
                        $('#webinse_table').html(data);  
                   }  
              });  
         }  
    });    
});  