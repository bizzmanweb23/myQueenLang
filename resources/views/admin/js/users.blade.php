 <script>
 $('body').on('click','#edit_user_details',function()
	{
		//alert('hello');
		//$('#viewBrokerModal').modal('show');
	var id=$(this).attr('rel');
	//alert(id);
    $.ajax({
    url: "{{ route('edit_users') }}",
    type: "get",
    data: 
	{
        "_token": "{{ csrf_token() }}",
         id: id
    },
    dataType: "html",
    beforeSend: function() 
	{
        $('#user_loder').show()
    },
    success: function(data) 
	{
        $('#user_loder').hide();
		//alert("pass")
        $('#user_details').html(data);
		$('#show_edit_details').hide();
        $('#edit_user_modal').modal('show');		
		//alert("Pass")	
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
	$('body').on('click','#edit_user_btn',function() 
		{
	            //alert ('hello');
        	    var id = $('#user_edit_id').val();
                var form = $('#user_edit_form')[0];
                var data = new FormData(form);
				data.append('id',id)
				var url= "{{ route('save_users_details') }}";
                toastr.options = 
				{
                    "closeButton": true,
                    "newestOnTop": true,
                    "positionClass": "toast-top-right"
                };
            $.ajax
			({
                url: url,
			    headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                type: 'post',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                $('#user_loder').show()
            },
            success: function(data) {
                if (data.status == 'success') {
                    toastr.success(data.message);
                }
				else{
					toastr.error();
				}
				
                $('#user_loder').hide();
				document. location. reload();
            },
            error: function(error) 
			{
                $('#user_loder').hide()
				var err = error.responseJSON.errors;
				if (error.status == 422) {
                    toastr.error("Error");
                    $('#first_name_error').html(err.first_name)
                    $('#name_error').html(err.name)                                     
                    $('#address_error').html(err.address)                   
                    $('#gender_error').html(err.gender)                   
                    $('#email_id_error').html(err.email_id)                   
                    $('#ranking_error').html(err.ranking)                   
                    $('#points_error').html(err.points)                   
                    $('#matching_bonus_error').html(err.matching_bonus)                   
                    $('#direct_bonus_error').html(err.direct_bonus)                   
                    $('#leadership_bonus_error').html(err.leadership_bonus)                   
                    $('#wallet_error').html(err.wallet)                                    
                    if (err.first_name) {
                        toastr.error(err.first_name);
                    }
					if (err.name) {
                        toastr.error(err.name);
                    }
                    if (err.address) {
                        toastr.error(err.address);
                    }
                    if (err.gender) {
                        toastr.error(err.gender);
                    }
                    if (err.email_id) {
                        toastr.error(err.email_id);
                    }
                    if (err.ranking) {
                        toastr.error(err.ranking);
                    }
                    if (err.points) {
                        toastr.error(err.points);
                    }
                    if (err.matching_bonus) {
                        toastr.error(err.matching_bonus);
                    }
                    if (err.direct_bonus) {
                        toastr.error(err.direct_bonus);
                    }
                    if (err.leadership_bonus) {
                        toastr.error(err.leadership_bonus);
                    }
                    if (err.wallet) {
                        toastr.error(err.wallet);
                    }				
                }
                console.log(error)
            }
        })
    });
	
	$('#user_edit_form :input').click(function() {
        $('#first_name_error').html('')
        $('#name_error').html('')
        $('#address_error').html('')
        $('#gender_error').html('')
        $('#email_id_error').html('')
        $('#ranking_error').html('')
        $('#points_error').html('')
        $('#matching_bonus_error').html('')
        $('#direct_bonus_error').html('')
        $('#leadership_bonus_error').html('')
        $('#wallet_error').html('')
    })
</script>