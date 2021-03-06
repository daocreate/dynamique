<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Dashboard @endsection
<!-- End block -->
@section('extraStyle')
    <style>
        .notification li {
            font-size: 16px;
        }
        .notification li.info span.badge {
            background: #00c0ef;
        }
        .notification li.warning span.badge {
            background: #f39c12;
        }
        .notification li.success span.badge {
            background: #00a65a;
        }
        .notification li.error span.badge {
            background: #dd4b39;
        }
        .total_bal {
            margin-top: 5px;
            margin-right: 5%;
        }
    </style>
@endsection
<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Main content -->
    <section class="content">
        @if (Session::has('success') || Session::has('error') || Session::has('warning'))
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="alert @if (Session::has('success')) alert-success @elseif(Session::has('error')) alert-danger @else alert-warning @endif alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        @if (Session::has('success'))
                            <h5><i class="icon fa fa-check"></i>{{ Session::get('success') }}</h5>
                        @elseif(Session::has('error'))
                            <h5><i class="icon fa fa-ban"></i>{{ Session::get('error') }}</h5>
                        @else
                            <h5><i class="icon fa fa-warning"></i>{{ Session::get('warning') }}</h5>
                            @endif
                            </h5>
                    </div>
                </div>
            </div>
        @endif
        @if($userRoleId == AppHelper::USER_ADMIN)
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box ">
                        <a class="small-box-footer bg-orange-dark" href="#">
                            <div class="icon bg-orange-dark" style="padding: 9.5px 18px 8px 18px;">
                                <i class="fa icon-student"></i>
                            </div>
                            <div class="inner ">
                                <h3 class="text-white">{{$students}} </h3>
                                <p class="text-white">
                                    {{__('global.student')}} </p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box ">
                        <a class="small-box-footer bg-pink-light" href="#">
                            <div class="icon bg-pink-light" style="padding: 9.5px 18px 8px 18px;">
                                <i class="fa icon-teacher"></i>
                            </div>
                            <div class="inner ">
                                <h3 class="text-white">
                                    {{$teachers}} </h3>
                                <p class="text-white">
                                    {{__('global.teacher')}} </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box ">
                        <a class="small-box-footer bg-purple-light" href="#">
                            <div class="icon bg-purple-light" style="padding: 9.5px 18px 8px 18px;">
                                <i class="fa icon-member"></i>
                            </div>
                            <div class="inner ">
                                <h3 class="text-white">
                                    {{$employee}} </h3>
                                <p class="text-white">
                                    {{__('global.employee')}} </p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box ">
                        <a class="small-box-footer bg-teal-light" href="#">
                            <div class="icon bg-teal-light" style="padding: 9.5px 18px 8px 18px;">
                                <i class="fa icon-subject"></i>
                            </div>
                            <div class="inner ">
                                <h3 class="text-white">
                                    {{$subjects}} </h3>
                                <p class="text-white">
                                    {{__('global.subject')}} </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        @if($userRoleId != AppHelper::USER_STUDENT)
        <div class="row">
            {{--<div class="col-md-6">--}}
            {{--<div class="box box-primary">--}}
            {{--<div class="box-body">--}}
            {{--<!-- THE CALENDAR -->--}}
            {{--<div id="calendar"></div>--}}
            {{--</div>--}}
            {{--<!-- /.box-body -->--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border x_title">
                        <h3>{{__('global.student_today_attendance')}} </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body" style="max-height: 342px;">
                        <canvas id="attendanceChart" style="width: 821px; height: 150px;"></canvas>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        @endif
            
        @if($userRoleId == AppHelper::USER_ADMIN)
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-warning">
                        <div class="box-header with-border x_title">
                            <h3>{{__('global.sending_sms_report')}}</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <canvas id="smsChart" style="width: 821px; height: 136px;"></canvas>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        @endif

        @if($userRoleId != AppHelper::USER_STUDENT)
            <div class="row">
                    <div class="col-md-6">
                        <div class="box box-success">
                            <div class="box-header with-border x_title">
                                <h3>{{__('global.class_wise_student')}}</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <ul class="nav nav-stacked">
                                    @php $color = 0; @endphp
                                    @foreach($studentsCount as $iclass)
                                        @php
                                            ++$color;
                                            if($color>7) {
                                                $color = 1;
                                            }
                                        @endphp
                                        <li><a href="#">{{$iclass->name}} <span class="pull-right badge bg-{{$color}}">@if(count($iclass->student)) {{$iclass->student->first()->total}} @else {{0}} @endif</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box box-danger">
                            <div class="box-header with-border x_title">
                                <h3>{{__('global.section_wise_student')}}</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <ul class="nav nav-stacked">
                                    @php $color = 0; @endphp
                                    @foreach($sectionStudentCount as $section)
                                        @php
                                            ++$color;
                                            if($color>7) {
                                                $color = 1;
                                            }
                                        @endphp
                                        <li><a href="#">{{$section->class->name}}[{{$section->name}}]<span class="pull-right badge bg-{{$color}}">@if(count($section->student)) {{$section->student->first()->total}} @else {{0}} @endif</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
        @endif


    </section>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')
    <script src="{{asset(mix('js/dashboard.js'))}}"></script>
    <script type="text/javascript">
        @if($userRoleId == AppHelper::USER_ADMIN)
            window.smsLabel = @php echo json_encode(array_keys($monthWiseSms)) @endphp;
            window.smsValue = @php echo json_encode(array_values($monthWiseSms)) @endphp;
        @endif
        @if($userRoleId != AppHelper::USER_STUDENT)
            window.attendanceLabel = @php echo json_encode(array_keys($attendanceChartPresentData)) @endphp;
            window.presentData = @php echo json_encode(array_values($attendanceChartPresentData)) @endphp;
            window.absentData = @php echo json_encode(array_values($attendanceChartAbsentData)) @endphp;
        @endif
        $(document).ready(function () {
            Dashboard.init();
        });

    </script>
@endsection
<!-- END PAGE JS-->
