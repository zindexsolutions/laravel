$(document).ready(function(){

    $(document).on('click','.delete_record',function(){
        // alert($(this).attr('name'));


        if (confirm("Are you sure to Delete user ?")) {

                $.ajax({
                    url: ProjectUrl +"/api/delete-user",
                    type: "post",
                    data: {id: $(this).attr('name')},

                    success:function(response){
                        $('#headerMsg').show();
                        $('#headerMsg').html("<br><div class='zi-top-margin alert alert-success alert-dismissible fade in'>\n\<button class='close' type='button' data-dismiss='alert' aria-hidden='true'>×</button>\n\<h4><i class='icon fa fa-check'></i> Success </h4>User Delete Successfully !!!</div>");

                        setTimeout(function() {
                            $('#headerMsg').hide("slow");
                            window.location.href = ProjectUrl +"/user";

                        }, 5000);
                    },
                    error:function(response){

                        $('#headerMsg').show();

                        var alertmessage ;
                        if(response.responseJSON && response.responseJSON.error){
                            var count = 0;
                            $.each(response.responseJSON.error, function( index, value ) {
                                if(count === 0){
                                    alertmessage = value ;
                                }else{
                                    return false;
                                }
                                count = count +1;
                            });
                        }

                        $('#headerMsg').html("<br><div class='zi-top-margin alert alert-danger alert-dismissible fade in'>\n\<button class='close' type='button' data-dismiss='alert' aria-hidden='true'>×</button>\n\<h4><i class='icon fa fa-ban'></i> Error </h4>"+alertmessage+"</div>");

                        setTimeout(function() {

                            $('#headerMsg').hide("slow");

                        }, 5000);

                    }
                });
        } else {
            return false;
        }
    });

    page_load();

    /*this function is used to load table data on page load*/
    function page_load() {
        var table = $('#data_table').DataTable({
            "paging": true,
            "processing": true,
            "serverSide": true,
            "lengthMenu": [10],
            "defaultContent": "-",
            "bDestroy": true,
            "aaSorting": [
                [0, 'desc']
            ],
            "ajax": {
                url: ProjectUrl +"/api/users",
                type: "get",
                "dataType": "json",
                dataSrc: function (res) {
                return res['data'];
                }
            },
            "lengthChange": false,
            "searching": true,
            "info": true,
            "autoWidth": false,
            "language": {
                "emptyTable": "No data available"
            },
            "columns": [
                {
                    "width": "10%",
                    "data": "id",
                    "orderable": false
            },
            {
                "width": "20%",
                "data": "name",
                "orderable": false
            },
            {
                "width": "40%",
                "data": "email",
                "orderable": false
            },
            ],
            columnDefs: [

                {
                    targets: [3],
                    render: function (a, b, data, d) {
                        return '<a href="'+AdminUrl+'/user/'+data.id+'" class="edit_record" name="'+data.id+'"><i class="fa fa-edit"></i> Edit</a>'+ "  "+
                        ' | <a href="javascript:void(0)" name="'+data.id+'" class="delete_record" ><i class="fa fa-trash"></i> Delete</a>';
                    }
                },
            ],
            "order": [
                [0, 'desc']
            ],
            "fnCreatedRow": function (row, data, index) {
                $('td', row).eq(0).html(index + 1);
            }

        });
    }
    // End data Table



});


