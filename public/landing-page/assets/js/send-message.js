$(document).on('submit', '#form1', function(e){
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: 'sendhtmlemail',
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        beforeSend: function(){
            Swal.fire({
                title:  'Sending Message ...',
                showConfirmButton: false,
                allowOutsideClick: false
            });
        },
        success: function(response){
            if (response.success){
                Swal.fire({
                    title: 'Success',
                    html: response.success,
                    icon: 'success',
                    timer:  2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.reload();
                });
            }

            if (response.error_captcha){
                Swal.fire({
                    title: 'Error',
                    html: response.error_captcha,
                    icon: 'error',
                    // timer:  1500,
                    showConfirmButton: true
                });
            }
        },
        error: function(jqXhr, json, errorThrown){
            var errorsResponse = jqXhr.responseJSON.errors;
            var errors = '';

            $.each(errorsResponse, function(i, data){
                errors += '<br>' + data;
            });

            $('#form1').find('.response').html(errors);
            Swal.fire({
                title: 'Error',
                html: errors,
                icon: 'error',
                showConfirmButton: true
            });
        }
    });
});