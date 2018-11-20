{{--  Extend Admin Layout  --}}
@extends('layouts.admin.layout')

{{--  Page Title Set  --}}
@section('page-title')
    Admin || User Create
@endsection

{{--  Head Css Add  --}}
@section('head-css')

@endsection

{{--  Head Javascript add  --}}
@section('head-javascript')
    <script>
        $(document).ready(function(){

            $('.save-user').click(function(event){
                event.preventDefault();

                var ProjectUrl = "{{ url('/')}}";

                $.ajax({
                    url: ProjectUrl +"/api/register",
                    type: "post",
                    data: $('#saveUser').serialize(),
                    success:function(response){
                        $('#headerMsg').show();
                        $('#headerMsg').html("<br><div class='zi-top-margin alert alert-success alert-dismissible fade in'>\n\<button class='close' type='button' data-dismiss='alert' aria-hidden='true'>×</button>\n\<h4><i class='icon fa fa-check'></i> Success </h4>Data Save</div>");

                        setTimeout(function() {
                            $('#headerMsg').hide("slow");
                            window.location.href = ProjectUrl +"/user";

                        }, 2000);
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
            });
        });

    </script>

@endsection


{{--  Content Section  --}}
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-user"></i>
      Users
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ url('/user') }}">Users</a></li>
    </ol>
  </section>

  <div id="headerMsg">

  </div>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
              <i class="fa fa-user"></i><h3 class="box-title">Users</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
                <div class="container-fluid">
                    {{-- User Detail --}}
                    <form class="all_form" id="saveUser">


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong>Name</strong>
                                    <p>
                                        <input type="text" class="form-control" name="name">
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong>Email</strong>
                                    <p>
                                        <input type="email" class="form-control" name="email">
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong>Password</strong>
                                    <p>
                                        <input type="password" class="form-control" name="password">
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong>Corfirm Password</strong>
                                    <p>
                                        <input type="password" class="form-control" name="c_password">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-success save-user" type="button">Save</button>
                        <button class="btn btn-warning" type="button" onclick="window.location='{{ url("/user") }}'">Cancle</button>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
