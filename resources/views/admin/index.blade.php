{{--  Extend Admin Layout  --}}
@extends('layouts.admin.layout')

{{--  Page Title Set  --}}
@section('page-title')
    Admin || User
@endsection

{{--  Head Css Add  --}}
@section('head-css')

@endsection

{{--  Head Javascript add  --}}
@section('head-javascript')
    <script src="{{ url('/') }}/resources/assets/js/user.js"></script>
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

  <div id="headerMsg"></div>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
              <i class="fa fa-user"></i><h3 class="box-title">Users</h3>
            <div class="pull-right">
              <button type="button" class="btn btn-primary" onclick="window.location='{{ url("/user/create") }}'"><i class="fa fa-plus"></i> Add User</button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="data_table" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>User</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
              </thead>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

@endsection
