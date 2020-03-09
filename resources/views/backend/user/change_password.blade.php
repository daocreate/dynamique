<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Change Password @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Main content -->
    <section class="content-header">
        <h1>
            {{__('global.change_password')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> {{__('global.dashboard')}}</a></li>
            <li class="active">{{__('global.change_password')}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <!-- Change password -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('global.update')}} {{__('global.login_password')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form novalidate id="changePasswordForm" action="{{URL::Route('change_password')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" name="old_password" placeholder="Old Password" required minlength="6" maxlength="50">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required minlength="6" maxlength="50">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required minlength="6" maxlength="50">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            </div>

                            <br>
                            <a href="{{URL::route('user.dashboard')}}" class="btn btn-default btnCancel">{{__('global.cancel')}}</a>
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-refresh"></i> {{__('global.update')}}</button>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
                <div class="col-md-3"></div>

                <!-- /.box -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')
    <script type="text/javascript">
        $(document).ready(function () {
            Login.changePassword();
        });
    </script>
@endsection
<!-- END PAGE JS-->
