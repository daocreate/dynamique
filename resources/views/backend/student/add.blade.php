<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Student @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Student
            <small>@if($regiInfo) {{__('global.update')}} @else {{__('global.add')}} @endif</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> {{__('global.dashboard')}}</a></li>
            <li><a href="{{URL::route('student.index')}}"><i class="fa icon-student"></i> {{__('global.student')}}</a></li>
            <li class="active">@if($regiInfo) {{__('global.update')}} @else {{__('global.add')}} @endif</li>
        </ol>
    </section>
    <!-- ./Section header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form novalidate id="entryForm" action="@if($regiInfo) {{URL::Route('student.update', $regiInfo->id)}} @else {{URL::Route('student.store')}} @endif" method="post" enctype="multipart/form-data">
                        <div class="box-header">
                            <div class="callout callout-danger">
                                <p><b>Note:</b> {{__('global.create_class_before_student')}}</p>
                            </div>
                        </div>
                        <div class="box-body">
                            @csrf
                            @if($regiInfo)  {{ method_field('PATCH') }} @endif
                            <p class="lead section-title">{{__('global.student')}} Info:</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="name">{{__('global.name')}}<span class="text-danger">*</span></label>
                                        <input autofocus type="text" class="form-control" name="name" placeholder="name" value="@if($student){{ $student->name }}@else{{old('name')}}@endif" required minlength="2" maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="dob">{{__('global.date_of_birth')}}<span class="text-danger">*</span></label>
                                        <input type='text' class="form-control date_picker2"  readonly name="dob" placeholder="date" value="@if($student){{ $student->dob }}@else{{old('dob')}}@endif" required minlength="10" maxlength="255" />
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="gender">{{__('global.gender')}}<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{__('global.select_gender_type')}}"></i>
                                        </label>
                                        {!! Form::select('gender', AppHelper::GENDER, $gender , ['class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="religion">Religion<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{__('global.select_religion_type')}}"></i>
                                        </label>
                                        {!! Form::select('religion', AppHelper::RELIGION, $religion , ['class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('religion') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="blood_group">{{__('global.blood_group')}}<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{__('global.select_blood_type')}}"></i>
                                        </label>
                                        {!! Form::select('blood_group', AppHelper::BLOOD_GROUP, $bloodGroup , ['class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('blood_group') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="nationality">Nationality<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select nationality"></i>
                                        </label>
                                        {!! Form::select('nationality', ['Cameroonian' => 'Cameroonian', 'Other' => 'Other'], $nationality , ['class' => 'form-control', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('nationality') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="nationality">{{__('global.nationality')}}</label>
                                        <input  type="text" class="form-control" name="nationality_other" @if(!$student || $student->nationality == "Cameroonian") readonly @endif placeholder="Nationality" value="@if($student && $student->nationality != "Cameroonian"){{$student->nationality}}@else{{old('nationality')}}@endif" maxlength="50" >
                                        <span class="fa fa-map-marker form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('nationality_other') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="photo">Photo<span class="text-danger">[min 150 X 150 size and max 200kb]</span></label>
                                        <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="photo" placeholder="Photo image">
                                        @if($student && isset($student->photo))
                                            <input type="hidden" name="oldPhoto" value="{{$student->photo}}">
                                        @endif
                                        <span class="glyphicon glyphicon-open-file form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="email">Email</label>
                                        <input  type="email" class="form-control" name="email"  placeholder="email address" value="@if($student){{$student->email}}@else{{old('email')}}@endif" maxlength="100" >
                                        <span class="fa fa-envelope form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="phone_no">Phone/Mobile No.</label>
                                        <input  type="text" class="form-control" name="phone_no" placeholder="phone or mobile number" value="@if($student){{$student->phone_no}}@else{{old('phone_no')}}@endif" maxlength="15">
                                        <span class="fa fa-phone form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="extra_activity">{{__('global.extra_curricular_activity')}}</label>
                                        <textarea name="extra_activity" class="form-control"  maxlength="255" >@if($student){{ $student->extra_activity }}@else{{ old('extra_activity') }} @endif</textarea>
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('extra_activity') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="note">Note</label>
                                        <textarea name="note" class="form-control"  maxlength="500">@if($student){{ $student->note }}@else{{ old('note') }} @endif</textarea>
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('note') }}</span>
                                    </div>
                                </div>
                            </div>
                            <p class="lead  section-title">{{__('global.guardian_info')}}</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="father_name">{{__('global.father_name')}}</label>
                                        <input type="text" class="form-control" name="father_name" placeholder="name" value="@if($student){{ $student->father_name }}@else{{old('father_name')}}@endif"  maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="father_phone_no"> {{__('global.father')}} Phone/Mobile No.</label>
                                        <input  type="text" class="form-control" name="father_phone_no" placeholder="phone or mobile number" value="@if($student){{$student->father_phone_no}}@else{{old('father_phone_no')}}@endif" maxlength="15">
                                        <span class="fa fa-phone form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('father_phone_no') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="mother_name">{{__('global.mother_name')}}</label>
                                        <input  type="text" class="form-control" name="mother_name" placeholder="name" value="@if($student){{ $student->mother_name }}@else{{old('mother_name')}}@endif" maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="mother_phone_no">{{__('global.mother')}} Phone/Mobile No.</label>
                                        <input  type="text" class="form-control" name="mother_phone_no"  placeholder="phone or mobile number" value="@if($student){{$student->mother_phone_no}}@else{{old('mother_phone_no')}}@endif"  maxlength="15">
                                        <span class="fa fa-phone form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('mother_phone_no') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="guardian">{{__('global.local_guardian')}}</label>
                                        <input  type="text" class="form-control" name="guardian" placeholder="name" value="@if($student){{ $student->guardian }}@else{{old('guardian')}}@endif" maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('guardian') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="guardian_phone_no">{{__('global.guardian')}} Phone/Mobile No.</label>
                                        <input  type="text" class="form-control" name="guardian_phone_no" placeholder="phone or mobile number" value="@if($student){{$student->guardian_phone_no}}@else{{old('guardian_phone_no')}}@endif"  maxlength="15">
                                        <span class="fa fa-phone form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('guardian_phone_no') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label for="present_address">{{__('global.present_address')}}</label>
                                        <textarea name="present_address" class="form-control"  maxlength="500" >@if($student){{ $student->present_address }}@else{{ old('present_address') }} @endif</textarea>
                                        <span class="fa fa-location-arrow form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('present_address') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label for="permanent_address">{{__('global.permanent_address')}}<span class="text-danger">*</span></label>
                                        <textarea name="permanent_address" class="form-control" required minlength="10" maxlength="500" >@if($student){{ $student->permanent_address }}@else{{ old('permanent_address') }} @endif</textarea>
                                        <span class="fa fa-location-arrow form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
                                    </div>
                                </div>
                            </div>
                            <p class="lead section-title">{{__('global.academic')}} Info :</p>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="regi_no">Registration No.
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="will auto generate after saving the form"></i>
                                        </label>
                                        <input  type="text" class="form-control" name="regi_no" readonly  placeholder="will auto generate after saving the form" value="@if($regiInfo){{$regiInfo->regi_no}}@endif">
                                        <span class="fa fa-id-card form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('regi_no') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="class_id"> {{__('global.class')}} {{__('global.name')}}
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{__('global.set_class_that_student_belongs_to')}}"></i>
                                            <span class="text-danger">*</span>
                                        </label>
                                        @if($regiInfo)
                                            <br><span class="text-danger">{{__('global.class_canot_be_change')}}</span>
                                            @else
                                        {!! Form::select('class_id', $classes, $iclass , ['id' => 'student_add_edit_class_change', 'placeholder' => 'Pick a class...','class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('class_id') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="section_id">Section
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{__('global.set_section_that_student_belongs_to')}}"></i>
                                            <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::select('section_id', $sections, $section , ['placeholder' => 'Pick a section...','class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('section_id') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="shift">{{__('global.shift')}}
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{__('global.set_class_shift')}}"></i>
                                        </label>
                                        {!! Form::select('shift', ['Morning' => 'Morning', 'Day' => 'Day', 'Evening' => 'Evening' ], $shift , ['placeholder' => 'Pick a shift...','class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('shift') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="card_no">ID Card No.</label>
                                        <input  type="text" class="form-control" name="card_no"  placeholder="id card number" value="@if($regiInfo){{$regiInfo->card_no}}@else{{old('card_no')}}@endif"  min="4" maxlength="50">
                                        <span class="fa fa-id-card form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('card_no') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="roll_no">Roll No.</label>
                                        <input  type="number" class="form-control" name="roll_no"  placeholder="roll number" value="@if($regiInfo){{$regiInfo->roll_no}}@else{{old('roll_no')}}@endif"  maxlength="20">
                                        <span class="fa fa-sort-numeric-asc form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('roll_no') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="board_regi_no">{{__('global.board_registration')}}</label>
                                        <input  type="number" class="form-control" name="board_regi_no"  placeholder="registration number" value="@if($regiInfo){{$regiInfo->board_regi_no}}@else{{old('board_regi_no')}}@endif"  maxlength="20">
                                        <span class="fa fa-sort-numeric-asc form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('board_regi_no') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="fourth_subject">{{__('global.elective_4th_subject')}}
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Select a subject if student have 4th/elective subject. like class 9,10,11,12 have that."></i>
                                        </label>
                                        {!! Form::select('fourth_subject', $electiveSubjects, $esubject , ['placeholder' => 'Pick a subject...','class' => 'form-control select2']) !!}
                                        <span class="fa form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('fourth_subject') }}</span>
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    @if(AppHelper::getInstituteCategory() == 'college')
                                    <div class="col-md-3">
                                        <div class="form-group has-feedback">
                                            <label for="academic_year">{{__('global.academic_year')}}
                                                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{__('global.select_academic_year')}}"></i>
                                            </label>
                                            @if($regiInfo)
                                                <br><span class="text-danger">{{__('global.year_canot_be_change')}}</span>
                                            @else
                                            {!! Form::select('academic_year', $academic_years, $acYear, ['id' => 'student_add_edit_ac_year','placeholder' => $pick_a_date,'class' => 'form-control select2', 'required' => 'true']) !!}
                                            <span class="form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('academic_year') }}</span>
                                                @endif
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group has-feedback">
                                            <label for="fourth_subject">{{__('global.alternative_elective_4th_subject')}}
                                                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{__('global.if_student_change_4th_subject')}}"></i>
                                            </label>
                                            {!! Form::select('alt_fourth_subject', $coreSubjects, $csubject , ['placeholder' => 'Pick a subject...','class' => 'form-control select2']) !!}
                                            <span class="fa form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('alt_fourth_subject') }}</span>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-3">
                                        <div class="form-group has-feedback">
                                            <label for="house">{{__('global.house_name')}}
                                                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{__('global.if_student_group_by_its_hostel_name')}}"></i>
                                            </label>
                                            <input  type="text" class="form-control" value="@if($regiInfo){{$regiInfo->house}}@else{{old('house')}}@endif" name="house" placeholder="{{__('global.Leave_blank_if_not_needed')}}"  maxlength="100">
                                            <span class="glyphicon glyphicon-info-sign form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('house') }}</span>
                                        </div>
                                    </div>

                                </div>

                                <p class="lead section-title">{{__('global.fee_info')}}</p>
                                <div class="row">
                                    @if(!$student)
                                   <div class="col-md-12">
                                       <div id="feesetup">
                                           
                                       </div>
                                   </div>
                                    @endif
                    
                            </div>

                                <p class="lead section-title"{{__('global.access_info')}}</p>
                                <div class="row">
                                    @if(!$student)
                                    <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="username">{{__('global.user_name1')}}</label>
                                        <input  type="text" class="form-control" value="" name="username" placeholder="{{__('global.leave_blank_if_not_need_create_user')}}"  minlength="5" maxlength="255">
                                        <span class="glyphicon glyphicon-info-sign form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="password">{{__('global.login_password')}}</label>
                                        <input type="password" class="form-control" name="password" placeholder="{{__('global.leave_blank_if_not_need_create_user')}}"  minlength="6" maxlength="50">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    </div>
                                </div>
                                    @endif
                                    @if($student && !$student->user_id)
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <label for="user_id">{{__('global.user')}}
                                                    <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{__('global.leave_as_it_is_if_not_need_user')}}"></i>
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
                            <a href="{{URL::route('student.index')}}" class="btn btn-default">{{__('global.cancel')}}</a>
                            <button type="submit" class="btn btn-info pull-right"><i class="fa @if($regiInfo) fa-refresh @else fa-plus-circle @endif"></i> @if($regiInfo) {{__('global.update')}} @else {{__('global.add')}} @endif</button>

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
            window.section_list_url = '{{URL::Route("academic.section")}}';
            window.subject_list_url = '{{URL::Route("academic.subject")}}';
            Academic.studentInit();

        });
    </script>
  @if(!$student)
    <script>
    
         $("#student_add_edit_ac_year").change(function(){
         var classes =$("#student_add_edit_class_change").val();
         var year =$("#student_add_edit_ac_year").val();
              $.ajax({

              type: 'GET',
              url: "{{URL::to('/get-studentfee')}}",
              data : {classes:classes,year:year},
              dateType: 'html',
              success: function(data){
                $("#feesetup").html(data);
               }
              
            });
          });

$(document).on('keyup','.fee',function(){
    var total =0;
    $(".fee").each(function(){
        var amt = parseInt($(this).val());
    if (isNaN(amt)) {
        amt = 0;
    }
    total =total + amt;

  })
    $(".total").val(total);
     
    
})
     
    </script>
    @endif
@endsection
<!-- END PAGE JS-->
