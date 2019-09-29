$(document).ready(function(){
    $('#add_button').click(function(){
        $('#user_form')[0].reset();
        $('.modal-title').text("Add User");
        $('#action').val("Add");
        $('#operation').val("Add");
    });
    
    var dataTable = $('#user_data').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
        url:"php/fetch.php",
        type:"POST"
        },
        "columnDefs":[
        {
        "targets":[0, 3, 4],
        "orderable":false,
        },
        ],
    });
   
    $(document).on('submit', '#user_form', function(event){
        event.preventDefault();
     
        if($('#first_name').val() == "" || $('#second_name').val() == "" || $('#email').val() == "")
        {
            alert("Fill in all the fields!");
        }
        else
        {
            $.ajax({
                url:"php/insert.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    alert(data);
                    $('#user_form')[0].reset();
                    $('#userModal').modal('hide');
                    dataTable.ajax.reload();
                }
            });
        }
    });
    
    $(document).on('click', '.update', function(){
        var user_id = $(this).attr("id");
        $.ajax({
            url:"php/fetch_single.php",
            method:"POST",
            data:{user_id:user_id},
            dataType:"json",
            success:function(data)
            {
                $('#userModal').modal('show');
                $('#first_name').val(data.first_name);
                $('#second_name').val(data.second_name);
                $('#email').val(data.email);
                $('.modal-title').text("Edit User");
                $('#user_id').val(user_id);
                $('#action').val("Edit");
                $('#operation').val("Edit");
                }
            })
        });
    
    $(document).on('click', '.delete', function(){
        var user_id = $(this).attr("id");
            if(confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                url:"php/delete.php",
                method:"POST",
                data:{user_id:user_id},
                success:function(data)
                {
                    alert(data);
                    dataTable.ajax.reload();
                }
                });
            }
            else
            {
                return false; 
            }
    });   
});