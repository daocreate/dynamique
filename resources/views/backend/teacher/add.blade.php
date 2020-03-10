<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Teacher @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Teacher
            <small>@if($teacher) {{__('global.update')}} @else {{__('global.add_new')}} @endif</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> {{__('global.dashboard')}}</a></li>
            <li><a href="{{URL::route('teacher.index')}}"><i class="fa icon-teacher"></i> {{__('global.teacher')}}</a></li>
            <li class="active">@if($teacher) {{__('global.update')}} @else {{__('global.add_new')}} @endif</li>
        </ol>
    </section>
    <!-- ./Section header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form novalidate id="entryForm" action="@if($teacher) {{URL::Route('teacher.update', $teacher->id)}} @else {{URL::Route('teacher.store')}} @endif" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            @csrf
                            @if($teacher)  {{ method_field('PATCH') }} @endif
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="name">{{__('global.name')}}<span class="text-danger">*</span></label>
                                        <input autofocus type="text" class="form-control" name="name" placeholder="{{__('global.name')}}" value="@if($teacher){{ $teacher->name }}@else{{old('name')}}@endif" required minlength="2" maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="designation">Designation</label>
                                        <input type="text" class="form-control" name="designation" placeholder="Head Master, Sr. Teacher" value="@if($teacher){{ $teacher->designation }}@else{{old('designation')}}@endif"  maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('designation') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="qualification">Qualification</label>
                                        <input type="text" class="form-control" name="qualification" placeholder="MA,BA,B. Sc" value="@if($teacher){{ $teacher->qualification }}@else{{old('qualification')}}@endif"  maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('qualification') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="dob">Date of birth<span class="text-danger">*</span></label>
                                        <input type='text' class="form-control date_picker2"  readonly name="dob" placeholder="date" value="@if($teacher){{ $teacher->dob }}@else{{old('dob')}}@endif" required minlength="10" maxlength="255" />
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="gender">Gender<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{__('global.select_gender_type')}}"></i>
                                        </label>
                                        {!! Form::select('gender', AppHelper::GENDER, $gender , ['class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="religion">Religion<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{__('global.select religion type')}}"></i>
                                        </label>
                                        {!! Form::select('religion', AppHelper::RELIGION, $religion , ['class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('religion') }}</span>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="email">Email<span class="text-danger">*</span></label>
                                        <input  type="email" class="form-control" name="email"  placeholder="email address" value="@if($teacher){{$teacher->email}}@else{{old('email')}}@endif" maxlength="100" required>
                                        <span class="fa fa-envelope form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="phone_no">Phone/Mobile No.<span class="text-danger">*</span></label>
                                        <input  type="text" class="form-control" name="phone_no" required placeholder="phone or mobile number" value="@if($teacher){{$teacher->phone_no}}@else{{old('phone_no')}}@endif" min="8" maxlength="15">
                                        <span class="fa fa-phone form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="id_card">ID Card No. / Employee ID<span class="text-danger">*</span></label>
                                        <input  type="text" class="form-control" name="id_card"  placeholder="id card number" value="@if($teacher){{$teacher->id_card}}@else{{old('id_card')}}@endif" required minlength="4" maxlength="50">
                                        <span class="fa fa-id-card form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('id_card') }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="joining_date">Joining Date<span class="text-danger">*</span></label>
                                        <input type='text' class="form-control date_picker2"  readonly name="joining_date" placeholder="date" value="@if($teacher){{$teacher->joining_date}}@else{{ old('joining_date') }}@endif" required minlength="10" maxlength="255" />
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('joining_date') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="address">Address</label>
                                        <textarea name="address" class="form-control"  maxlength="500" >@if($teacher){{ $teacher->address }}@else{{ old('address') }} @endif</textarea>
                                        <span class="fa fa-location-arrow form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="photo">Photo<br><span class="text-danger">[min 150 X 150 size and max 200kb]</span></label>
                                        <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="photo" placeholder="Photo image">
                                        @if($teacher && isset($teacher->photo))
                                            <input type="hidden" name="oldPhoto" value="{{$teacher->photo}}">
                                        @endif
                                        <span class="glyphicon glyphicon-open-file form-control-feedback" style="top:45px;"></span>
                                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="photo">Signature<br><span class="text-danger">[max 160 X 80 size and max 200kb]</span></label>
                                        <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="signature" placeholder="Signature image">
                                        @if($teacher && isset($teacher->signature))
                                            <input type="hidden" name="oldSignature" value="{{$teacher->signature}}">
                                        @endif
                                        <span class="glyphicon glyphicon-open-file form-control-feedback" style="top:45px;"></span>
                                        <span class="text-danger">{{ $errors->first('signature') }}</span>
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <div class="row">
                                @if(!$teacher)
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="username">Username<span class="text-danger">*</span></label>
                                        <input  type="text" class="form-control" value="" name="username" required minlength="5" maxlength="255">
                                        <span class="glyphicon glyphicon-info-sign form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="password">{{__('global.login_password')}}<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" placeholder="Password" required minlength="6" maxlength="50">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    </div>
                                </div>
                                @endif
                                @if($teacher && !$teacher->user_id)
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <label for="user_id">User
                                                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Leave as it is, if not need user"></i>
                                            </label>
                                            {!! Form::select('user_id', $users, null , ['placeholder' => 'Pick if needed','class' => 'form-control select2']) !!}
                                            <span class="form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                        </div>
                                    </div>

                                @endif
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{URL::route('teacher.index')}}" class="btn btn-default">{{__('global.cancel')}}</a>
                            <button type="submit" class="btn btn-info pull-right"><i class="fa @if($teacher) fa-refresh @else fa-plus-circle @endif"></i> @if($teacher) {{__('global.update')}} @else {{__('global.add')}} @endif</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')
    <script type="text/javascript">
        $(document).ready(function () {
            Generic.initCommonPageJS();
        });
    </script>
@endsection
<!-- END PAGE JS-->
