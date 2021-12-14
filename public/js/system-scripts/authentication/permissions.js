$(document).ready(function () {
    document.getElementById('breadcrumb').innerHTML = '<li>Developer</li><li>Permission</li>';

    // Data Table
    var responsiveHelper_table1 = undefined;
    var breakpointDefinition = {
        tablet : 1024,
        phone : 480
    };
    var t = $('#table1').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [[ 1, 'desc' ]],
        ajax:{
            url: 'listpermissions',
        },
        columns:[
            { "data": "action", "name": "action" },
            { "data": "id", "name": "id" },
            { "data": "name", "name": "name" },
        ],
        columnDefs: [
            {
                'targets': [ 0 ],
                'width': '10%',
                'sortable': false,
            },
            {
                'targets': [ 1 ],
                'width': '5%',
            },
        ],
        lengthMenu: [[10, 50, 100, 500], [10, 50, 100, 500]],
        pageLength: 10,
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-xs-12 col-sm-6 hidden-xs'l>>"+
            "rt"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "oLanguage": {
            "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
        },
        "preDrawCallback" : function() {
            if (!responsiveHelper_table1) {
                responsiveHelper_table1 = new ResponsiveDatatablesHelper($('#table1'), breakpointDefinition);
            }
        },
        "rowCallback" : function(nRow) {
            responsiveHelper_table1.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
            responsiveHelper_table1.respond();
        },
        "initComplete": function(settings, json) {
            // search when hit enter
            var api = this.api();
            $('#table1_filter input')
            .off('.DT')
            .on('keyup.DT', function (e) {
                if (e.keyCode == 13) {
                    api.search(this.value).draw();
                }
            });
        }
    });
    t.on('draw.dt', function () {
        var info = t.page.info();
        t.column(1, {search:'applied', order:'applied', page:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i + 1 + info.start;
        });
    });

    // Edit Button
    $(document).on('click', '.edit', function(){
        var id = $(this).attr('id');
        $.ajax({
            url: 'permissions/edit/' + id,
            dataType: "json",
            success: function(response){
                $('#name').val(response.data.name);
                $('#hidden_id').val(response.data.id);
                $('#action_button').val("Update");
            }
        })
    });

    // Store and Update Form
    $('#form1').on('submit', function(event){
        event.preventDefault();
        var formData = new FormData(this);
        if($('#action_button').val() == 'Create'){
            Swal.fire({
                title: "Are you sure?",
                text: "Once saved, you will be able to edit the data.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it.'
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'permissions/create',
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
                                title:  'Saving Data ...',
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
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                }).then(() => {
                                    $('#form1')[0].reset();
                                    $('#table1').DataTable().ajax.reload();
                                });
                            }

                            if (response.error){
                                Swal.fire({
                                    title: 'Error',
                                    html: response.error,
                                    icon: 'error',
                                    timer:  2000,
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                }).then(() => {
                                    $('#form1')[0].reset();
                                    $('#table1').DataTable().ajax.reload();
                                });
                            }
                        },
                        error: function(jqXhr, json, errorThrown){
                            var errorsResponse = jqXhr.responseJSON.errors;
                            var errors = '';
            
                            $.each(errorsResponse, function(i, data){
                                errors += '<br>' + data;
                            });
            
                            Swal.fire({
                                title: 'Error',
                                html: jqXhr.responseJSON.message + "<br>" + errors,
                                icon: 'error'
                            })
                        }
                    })
                } else {
                    Swal.fire({
                        title: 'Data not saved.',
                        html: 'Your encoded data not saved.',
                        icon: 'info',
                        timer:  2000,
                        showConfirmButton: false,
                        allowOutsideClick: false
                    }).then(() => {
                        $('#form1')[0].reset();
                        $('#table1').DataTable().ajax.reload();
                    });
                }
            });
            
        }

        if($('#action_button').val() == "Update"){
            Swal.fire({
                title: "Are you sure?",
                text: "Once updated, you will be able to edit the data.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it.'
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'permissions/update',
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
                                title:  'Updating Data ...',
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
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                }).then(() => {
                                    $('#form1')[0].reset();
                                    $('#table1').DataTable().ajax.reload();
                                    $('#action_button').val("Create");
                                });
                            }

                            if (response.error){
                                Swal.fire({
                                    title: 'Error',
                                    html: response.error,
                                    icon: 'error',
                                    timer:  2000,
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                }).then(() => {
                                    $('#form1')[0].reset();
                                    $('#table1').DataTable().ajax.reload();
                                    $('#action_button').val("Create");
                                });
                            }
                        },
                        error: function(jqXhr, json, errorThrown){
                            var errorsResponse = jqXhr.responseJSON.errors;
                            var errors = '';
            
                            $.each(errorsResponse, function(i, data){
                                errors += '<br>' + data;
                            });
            
                            Swal.fire({
                                title: 'Error',
                                html: jqXhr.responseJSON.message + "<br>" + errors,
                                icon: 'error'
                            })
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Data not updated.',
                        html: 'Your selected data not updated.',
                        icon: 'info',
                        timer:  2000,
                        showConfirmButton: false,
                        allowOutsideClick: false
                    }).then(() => {
                        $('#form1')[0].reset();
                        $('#table1').DataTable().ajax.reload();
                        $('#action_button').val("Create");
                    });
                }
            });
        }
    });

    // Delete Button
    $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover the data.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it.'
        })
        .then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'permissions/destroy/' + id,
                    method: "GET",
                    dataType: "json",
                    beforeSend: function(){
                        Swal.fire({
                            title:  'Deleting data ...',
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
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).then(() => {
                                $('#form1')[0].reset();
                                $('#table1').DataTable().ajax.reload();
                                $('#action_button').val("Create");
                            });
                        }

                        if (response.error){
                            Swal.fire({
                                title: 'Error',
                                html: response.error,
                                icon: 'error',
                                timer:  2000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).then(() => {
                                $('#form1')[0].reset();
                                $('#table1').DataTable().ajax.reload();
                                $('#action_button').val("Create");
                            });
                        }
                    },
                    error: function(jqXhr, json, errorThrown){
                        var errorsResponse = jqXhr.responseJSON.errors;
                        var errors = '';
        
                        $.each(errorsResponse, function(i, data){
                            errors += '<br>' + data;
                        });
        
                        Swal.fire({
                            title: 'Error',
                            html: jqXhr.responseJSON.message + "<br>" + errors,
                            icon: 'error'
                        })
                    }
                })
            } else {
                Swal.fire({
                    title: 'Data not deleted.',
                    html: 'Your data is safe.',
                    icon: 'info',
                    timer:  2000,
                    showConfirmButton: false,
                    allowOutsideClick: false
                }).then(() => {
                    $('#form1')[0].reset();
                    $('#table1').DataTable().ajax.reload();
                    $('#action_button').val("Create");
                });
            }
        });

    });
});