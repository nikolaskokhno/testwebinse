$(document).ready(function(){  
    $('#add').click(function(){  
         $('#insert').val("Insert");  
         $('#insert_form')[0].reset();  
    });

    $('#insert_form').on("submit", function(event){  
        event.preventDefault();  
        if($('#first_name').val() == "" || $('#second_name').val() == "" || $('#email').val() == "")  
        {  
            alert("One of the fields is empty!");  
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

    
    $(document).on('click', '.delete_data', function(){
        var user_id = $(this).attr("id"); 

        if(confirm("Are you sure do you want delete user data?")){
            $.ajax({
                url: 'php/delete.php',
                method: "POST",
                data: {user_id:user_id},
                dataType: "text",
                success: function(data){
                    $('#insert_form')[0].reset(); 
                    $('#webinse_table').html(data);  
                }
            });
        }   
    });
});  