<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <section class="sidebar">
    <!-- sidebar menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li>
        <a href="{{ URL::route('user.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>{{__('global.dashboard')}}</span>
        </a>
      </li>
      @can('student.index')
      <li>
        <a href="{{ URL::route('student.index') }}">
          <i class="fa icon-student"></i> <span>{{__('global.student')}}s</span>
        </a>
      </li>
      @endcan
      @can('promotion')
       <li>
        <a href="{{ URL::route('promotion') }}">
          <i class="fa icon-student"></i> <span>Promotion</span>
        </a>
      </li>
      @endcan
      @can('teacher.index')
      <li>
        <a href="{{ URL::route('teacher.index') }}">
          <i class="fa icon-teacher"></i> <span>{{__('global.teacher')}}</span>
        </a>
      </li>
      @endcan
      @canany(['student_attendance.index', 'employee_attendance.index'])
      <li class="treeview">
        <a href="#">
          <i class="fa icon-attendance"></i>
          <span>{{__('global.attendance')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @can('student_attendance.index')
          <li>
            <a href="{{ URL::route('student_attendance.index') }}">
              <i class="fa icon-student"></i> <span>{{__('global.student')}} {{__('global.attendance')}}</span>
            </a>
          </li>
          @endcan
          @can('employee_attendance.index')
          <li>
            <a href="{{ URL::route('employee_attendance.index') }}">
              <i class="fa icon-member"></i> <span>Employee {{__('global.attendance')}}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcanany
      <li class="treeview">
        <a href="#">
          <i class="fa icon-academicmain"></i>
          <span>{{__('global.academic')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @notrole('Student')
          @can('academic.class')
          <li>
            <a href="{{ URL::route('academic.class') }}">
              <i class="fa fa-sitemap"></i> <span>{{__('global.class')}}</span>
            </a>
          </li>
          @endcan
          @can('academic.section')
          <li>
            <a href="{{ URL::route('academic.section') }}">
              <i class="fa fa-cubes"></i> <span>Section</span>
            </a>
          </li>
          @endcan
          @endnotrole
          @can('academic.subject')
          <li>
            <a href="{{ URL::route('academic.subject') }}">
              <i class="fa icon-subject"></i> <span>{{__('global.subject')}}</span>
            </a>
          </li>
          @endcan
          {{-- Without Permission --}}
         {{--  @can('academic.subject')
         <li>
           <a href="{{ URL::route('holidays.index') }}">
             <i class="fa icon-subject"></i> <span>Holidays</span>
           </a>
         </li>
         @endcan
         @can('academic.subject')
         <li>
           <a href="{{ URL::route('class-off.index') }}">
             <i class="fa icon-subject"></i> <span>Class Off</span>
           </a>
         </li>
         @endcan
          {{-- ================================ --}}
          {{--<li>--}}
            {{--<a href="#">--}}
              {{--<i class="fa fa-clock-o"></i><span>Routine</span>--}}
            {{--</a>--}}
          {{--</li>--}}
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-user-secret"></i>
          <span>{{__('global.library')}}</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          @can('library.search')
           <li>
            <a href="{{URL::route('library.search')}}">
              <i class="fa fa-calendar-plus-o"></i> <span>{{__('global.book_search')}}</span>
            </a>
          </li>
          @endcan
          @can('library.issuebook')
          <li>
            <a href="{{URL::route('library.issuebook')}}">
              <i class="fa fa-calendar-plus-o"></i> <span>{{__('global.borrow_book')}}</span>
            </a>
          </li>
          @endcan
          @can('library.issuebookview')
          <li>
            <a href="{{ route('library.issuebookview') }}">
              <i class="fa icon-mailandsms"></i> <span>{{__('global.borrow_book_list')}}</span>
            </a>
          </li>
          @endcan
          @can('library.getview-show')
          <li>
            <a href="{{ route('library.getview-show') }}">
              <i class="fa fa-id-card"></i> <span>{{__('global.borrow_book_list')}}</span>
            </a>
          </li>
          @endcan
          @can('library.getaddbook')
          <li>
            <a href="{{ route('library.getaddbook') }}">
              <i class="fa fa-user-md"></i> <span> {{__('global.book_entry')}}</span>
            </a>
          </li>
          @endcan
          @can('library.reports')
          <li>
            <a href="{{ route('library.reports') }}">
              <i class="fa fa-eye-slash"></i> <span>{{__('global.report')}}</span>
            </a>
          </li>
          @endcan
          @can('library.reports.fine')
          <li>
            <a href="{{ route('library.reports.fine') }}">
              <i class="fa fa-users"></i> <span>{{__('global.monthly_fine_report')}}</span>
            </a>
          </li>
          @endcan
          {{--<li>--}}
          {{--<a href="#">--}}
          {{--<i class="fa fa-download"></i> <span>Backup</span>--}}
          {{--</a>--}}
          {{--</li>--}}

          {{--<li>--}}
          {{--<a href="#">--}}
          {{--<i class="fa fa-upload"></i> <span>Restore</span>--}}
          {{--</a>--}}
          {{--</li>--}}

        </ul>
      </li>
      @notrole('Student')
      <li class="treeview">
        <a href="#">
          <i class="fa icon-exam"></i>
          <span>Exam</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @can('exam.index')
          <li>
            <a href="{{ URL::route('exam.index') }}">
              <i class="fa icon-exam"></i> <span>{{__('global.exam')}}</span>
            </a>
          </li>
          @endcan
          @can('exam.grade.index')
          <li>
            <a href="{{ URL::route('exam.grade.index') }}">
              <i class="fa fa-bar-chart"></i> <span>{{__('global.grade')}}</span>
            </a>
          </li>
          @endcan
          @can('exam.rule.index')
          <li>
            <a href="{{ URL::route('exam.rule.index') }}">
              <i class="fa fa-cog"></i> <span>{{__('global.rule')}}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa icon-markmain"></i>
          <span>Marks & Result</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @can('marks.index')
          <li>
            <a href="{{ URL::route('marks.index') }}">
              <i class="fa icon-markmain"></i> <span>Marks</span>
            </a>
          </li>
          @endcan
          @can('result.index')
          <li>
            <a href="{{ URL::route('result.index') }}">
              <i class="fa icon-markpercentage"></i> <span>{{__('site.menu_result')}}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endnotrole
      @notrole('Student')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>HRM</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @can('hrm.employee.index')
          <li>
            <a href="{{ URL::route('hrm.employee.index') }}">
              <i class="fa icon-member"></i> <span>{{__('global.employee')}}</span>
            </a>
          </li>
          @endcan
          @can('hrm.leave.index')
          <li>
            <a href="{{ URL::route('hrm.leave.index') }}">
              <i class="fa fa-bed"></i> <span>{{__('global.leave')}}</span>
            </a>
          </li>
          @endcan
          @can('hrm.work_outside.index')
          <li>
            <a href="{{ URL::route('hrm.work_outside.index') }}">
              <i class="glyphicon glyphicon-log-out"></i> <span>Work Outside</span>
            </a>
          </li>
          @endcan
          @can('hrm.policy')
          <li>
            <a href="{{ URL::route('hrm.policy') }}">
              <i class="fa fa-cogs"></i> <span>Policy</span>
            </a>
          </li>
          @endcan

           <li>
            <a href="{{ URL::route('sallary.setuplist') }}">
              <i class="fa icon-mailandsms"></i> <span>Sallary Setup</span>
            </a>
          </li>

            <li>
            <a href="{{ URL::route('sallary.payment') }}">
              <i class="fa fa-circle-o"></i> <span>Sallary Payment</span>
            </a>
          </li>

            <li>
            <a href="{{ URL::route('sallary.report') }}">
              <i class="fa fa-circle-o"></i> <span>Sallary Report</span>
            </a>
          </li>
        </ul>
      </li>
      @endnotrole
      @role('Admin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user-secret"></i>
          <span>{{__('global.administrator')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ URL::route('administrator.academic_year') }}">
              <i class="fa fa-calendar-plus-o"></i> <span>{{__('global.academic_year')}}</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::route('administrator.template.mailsms.index') }}">
              <i class="fa icon-mailandsms"></i> <span>Mail/SMS {{__('global.template')}}</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::route('administrator.template.idcard.index') }}">
              <i class="fa fa-id-card"></i> <span>ID Card {{__('global.template')}}</span>
            </a>
          </li>
          <li>
            <a href="{{URL::route('administrator.user_index')}}">
              <i class="fa fa-user-md"></i> <span>{{__('global.system')}} Admin</span>
            </a>
          </li>
          <li>
            <a href="{{route('administrator.user_password_reset')}}">
              <i class="fa fa-eye-slash"></i> <span>{{__('global.reset_user_password')}}</span>
            </a>
          </li>
          <li>
            <a href="{{URL::route('user.role_index')}}">
              <i class="fa fa-users"></i> <span>{{__('global.role')}}</span>
            </a>
          </li>
          {{--<li>--}}
            {{--<a href="#">--}}
              {{--<i class="fa fa-download"></i> <span>Backup</span>--}}
            {{--</a>--}}
          {{--</li>--}}
          {{--<li>--}}
            {{--<a href="#">--}}
              {{--<i class="fa fa-upload"></i> <span>Restore</span>--}}
            {{--</a>--}}
          {{--</li>--}}
        </ul>
      </li>
      @endrole
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user-secret"></i>
          <span>{{__('global.fee')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
          <ul class="treeview-menu">
            @can('student.fee.views')
            <li><a href="{{ route('student.fee.views') }}"><i class="fa fa-circle-o"></i>{{__('global.student_fee')}}</a></li>
            @endcan
            @can('student.fee.collection')
            <li ><a href="{{ route('student.fee.collection') }}"><i class="fa fa-circle-o"></i> {{__('global.fee_collection')}}</a></li>
            @endcan
            @can('student.fee.setuplist')
            <li class="{{Request::is('fees/setup*') ?'active':''}}" ><a href="{{ route('student.fee.setuplist') }}"><i class="fa fa-circle-o"></i>{{__('global.fee_setup')}}</a></li>
            <li ><a href="{{ route('student.fee.report') }}"><i class="fa fa-circle-o"></i> {{__('global.fee_collection_report')}}</a></li>
            @endcan
          </ul>
    </li>


    <li class="treeview">
        <a href="#">
          <i class="fa fa-user-secret"></i>
          <span>Dormitory</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
          <ul class="treeview-menu">
            @can('dormitory')
            <li><a href="{{ route('dormitory') }}"><i class="fa fa-circle-o"></i>Dormitory</a></li>
            @endcan
            @can('dormitory.assignstd')
            <li ><a href="{{ route('dormitory.assignstd') }}"><i class="fa fa-circle-o"></i> Assign Student</a></li>
            @endcan
            @can('dormitory.assignstd.list')
            <li  ><a href="{{ route('dormitory.assignstd.list') }}"><i class="fa fa-circle-o"></i> Student List</a></li>
            @endcan
            @can('dormitory.fee')
            <li ><a href="{{ route('dormitory.fee') }}"><i class="fa fa-circle-o"></i> Fee Collection</a></li>
            @endcan
            @can('dormitory.report.std')
            <li ><a href="{{ route('dormitory.report.std') }}"><i class="fa fa-circle-o"></i> Dormitory Report</a></li>
            @endcan
            @can('dormitory.report.fee')
             <li ><a href="{{ route('dormitory.report.fee') }}"><i class="fa fa-circle-o"></i> Fee Reports</a></li>
            @endcan
          </ul>
    </li>
      @can('user.index')
      <li>
        <a href="{{ URL::route('user.index') }}">
          <i class="fa fa-users"></i> <span>{{__('global.user')}}</span>
        </a>
      </li>
      @endcan

          <li class="treeview">
        <a href="#">
          <i class="fa fa-user-secret"></i>
          <span>{{__('global.accounting')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
          <ul class="treeview-menu">
            @can('sectors')
            <li><a href="{{ route('sectors') }}"><i class="fa fa-circle-o"></i>{{__('global.sector')}}</a></li>
            @endcan
            @can('accounting.incomelist')
            <li ><a href="{{ route('accounting.income') }}"><i class="fa fa-circle-o"></i> {{__('global.add_income')}}</a></li>
            @endcan
            @can('accounting.incomelist')
            <li  ><a href="{{ route('accounting.incomelist') }}"><i class="fa fa-circle-o"></i> {{__('global.view_income')}}</a></li>
            @endcan
            @can('accounting.expence')
            <li ><a href="{{ route('accounting.expence') }}"><i class="fa fa-circle-o"></i> {{__('global.add_expense')}}</a></li>
            @endcan
            @can('accounting.expencelist')
            <li ><a href="{{ route('accounting.expencelist') }}"><i class="fa fa-circle-o"></i> {{__('global.view_expense')}}</a></li>
            @endcan
          </ul>
    </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-pdf-o"></i>
          <span>{{__('global.report')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#">
              <i class="fa icon-studentreport"></i>
              <span>{{__('global.student')}}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @can('report.student_monthly_attendance')
              <li>
                <a href="{{ URL::route('report.student_monthly_attendance') }}">
                  <i class="fa icon-attendancereport"></i> <span>{{__('global.monthly_attendance')}}</span>
                </a>
              </li>
              @endcan
              @can('report.student_monthly_attendance_details')
              <li>
                <a href="{{ route('report.student_monthly_attendance_details') }}">
                  <i class="fa icon-attendance"></i> <span>{{__('global.monthly_details_attendance')}}</span>
                </a>
              </li>
              @endcan
             {{--  <li>
                <a href="#">
                  <i class="fa icon-attendance"></i> <span>Monthly Individual Attendance</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa icon-attendance"></i> <span>Monthly Individual Details Attendance</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa icon-attendance"></i> <span>Weekly Attendance</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa icon-attendance"></i> <span>Weekly Details Attendance</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa icon-attendance"></i> <span>Weekly Individual Attendance</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa icon-attendance"></i> <span>Weekly Individual Details Attendance</span>
                </a>
              </li> --}}
              {{-- <li>
                <a href="#">
                  <i class="fa icon-payment"></i> <span>Payment History</span>
                </a> --}}
              </li>
              @can('report.student_list')
              <li>
                <a href="{{route('report.student_list')}}">
                  <i class="fa icon-student"></i> <span>{{__('global.student_list')}}</span>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>HRM</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!-- <li>
                <a href="#">
                  <i class="fa icon-attendance"></i> <span>Absenteeism Attendance</span>
                </a>
              </li> -->
              @can('report.employee_monthly_attendance')
              <li>
                <a href="{{ route('report.employee_monthly_attendance') }}"><i class="fa icon-attendance"></i> <span>{{__('global.monthly_attendance')}}</span></a>
              </li>
              @endcan
              @can('report.employee_monthly_attendance_details')
              <li>
                <a href="{{ route('report.employee_monthly_attendance_details') }}"><i class="fa icon-attendance"></i> <span>{{__('global.monthly_details_attendance')}}</span></a>
              </li>
              @endcan
              @can('report.employee_list')
              <li>
                <a href="{{ route('report.employee_list') }}"><i class="fa icon-attendance"></i> <span>{{__('global.employee_list')}}</span></a>
              </li>
              @endcan
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa icon-exam"></i>
              <span>Exam</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              @can('admission_name')
              <li>
                <a href="{{ route('admission_name') }}"><i class="fa fa-id-card"></i> <span>Admision</span></a>
              </li>
              @endcan
{{--
              <li>
                <a href="#"><i class="fa fa-id-card"></i> <span>Applicant List</span></a>
              </li> --}}
              {{-- <li>
                <a href="#"><i class="fa fa-id-card"></i> <span>Admit Card</span></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-sort-numeric-asc"></i> <span>Seat Plan</span></a>
              </li> --}}
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa icon-mark2"></i>
              <span>Marks & Result</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @can('passing_summary')
              <li>
                <a href="{{ route('passing_summary') }}"><i class="fa fa-list-alt"></i><span>{{__('global.passing_summary')}}</span></a>
              </li>
              @endcan
              @can('subjectpass_summary')
              <li>
                <a href="{{ route('subjectpass_summary') }}"><i class="fa fa-list-alt"></i><span>{{__('global.subject_pass_summary')}}</span></a>
              </li>
              @endcan
              {{--
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Pass-Fail Percentage</span></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Pass-Fail Summery</span></a>
              </li>
 --}}
              @can('gradesheet')
              <li>
                <a href="{{ route('gradesheet') }}"><i class="fa fa-list-alt"></i><span>Marksheet</span></a>
              </li>
              @endcan
              @can('tabulation')
              <li>
                <a href="{{ route('tabulation') }}"><i class="fa fa-list-alt"></i><span>Tabulationsheet</span></a>
              </li>
              @endcan
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa icon-hostel"></i>
              <span>{{__('global.account')}}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @can('accounting.report')
              <li>
                <a href="{{ route('accounting.report') }}"><i class="fa fa-list-alt"></i><span>{{__('global.account_by_type')}}</span></a>
              </li>
              @endcan
              @can('accounting.reportsum')
              <li>
                <a href="{{ route('accounting.reportsum') }}"><i class="fa fa-list-alt"></i><span>{{__('global.account_balance')}}</span></a>
              </li>
              @endcan
            </ul>
          </li>
          {{-- <li class="treeview">
            <a href="#">
              <i class="fa icon-hostel"></i>
              <span>Hostel</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Member List</span></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Fee collection</span></a>
              </li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa icon-library"></i>
              <span>Library</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Books Summary</span></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Fine Collection</span></a>
              </li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa icon-account"></i>
              <span>Account</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Monthly Collection</span></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Monthly Expenditure</span></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Total Collection</span></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Total Expenditure</span></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Balance Sheet</span></a>
              </li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa icon-payment"></i>
              <span>Payroll</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Salary Sheet(M.P.O)</span></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Salary Sheet Bangla(M.P.O)</span></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Salary Sheet</span></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Salary Sheet Bangla</span></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-list-alt"></i><span>Employee Payment History</span></a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa icon-attendance"></i> <span>Academic Calendar</span>
            </a>
          </li> --}}
        </ul>
      </li>
      @role('Admin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i>
          <span>{{__('global.setting')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ URL::route('settings.institute') }}">
              <i class="fa fa-building"></i> <span>{{__('global.institute')}}</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::route('settings.academic_calendar.index') }}">
              <i class="fa fa-calendar"></i> <span>{{__('global.academic_calendar')}}</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::route('settings.sms_gateway.index') }}">
              <i class="fa fa-external-link"></i> <span>{{__('global.sms_gateway')}}</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::route('settings.report') }}">
              <i class="fa fa-file-pdf-o"></i> <span>{{__('global.report')}}</span>
            </a>
          </li>
        </ul>
      </li>
      @endrole
      <!-- Frontend Website links and settings -->
      @if($frontend_website)
      <li class="treeview">
        <a href="#">
          <i class="fa fa-globe"></i>
          <span>Site</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @can('site.dashboard')
          <li>
            <a href="{{ URL::route('site.dashboard') }}">
              <i class="fa fa-dashboard"></i> <span>{{__('global.dashboard')}}</span>
            </a>
          </li>
          @endcan
          <li class="treeview">
            <a href="#">
              <i class="fa fa-home"></i>
              <span>{{__('global.home')}}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @can('slider.index') {{-- site.index--}}
              <li><a href="{{URL::route('slider.index')}}"><i class="fa fa-picture-o text-aqua"></i> {{__('global.slider')}}</a></li>
              @endcan
              @can('site.about_content')
              <li><a href="{{URL::route('site.about_content')}}"><i class="fa fa-info text-aqua"></i> {{__('site.about_us')}}</a></li>
              @endcan
              @can('site.service')
              <li><a href="{{ URL::route('site.service') }}"><i class="fa fa-file-text text-aqua"></i> {{__('site.service')}}</a></li>
              @endcan
              @can('site.statistic')
              <li><a href="{{ URL::route('site.statistic') }}"><i class="fa fa-bars"></i> {{__('global.statistic')}}</a></li>
              @endcan
              @can('site.testimonial')
              <li><a href="{{ URL::route('site.testimonial') }}"><i class="fa fa-comments"></i> {{__('site.testimonials')}}</a></li>
              @endcan
              @can('site.subscribe')
              <li><a href="{{ URL::route('site.subscribe') }}"><i class="fa fa-users"></i> {{__('site.subscribe')}}</a></li>
              @endcan
            </ul>
          </li>
          @can('class_profile.index')
          <li>
            <a href="{{ URL::route('class_profile.index') }}">
              <i class="fa fa-building"></i>
              <span>{{__('global.class')}}</span>
            </a>
          </li>
          @endcan
          @can('teacher_profile.index')
          <li>
            <a href="{{ URL::route('teacher_profile.index') }}">
              <i class="fa icon-teacher"></i>
              <span>{{__('global.teacher')}}</span>
            </a>
          </li>
          @endcan
          @can('event.index')
          <li>
            <a href="{{ URL::route('event.index') }}">
              <i class="fa fa-bullhorn"></i>
              <span>{{__('global.event')}}</span>
            </a>
          </li>
          @endcan
          @can('site.gallery')
          <li>
            <a href="{{ URL::route('site.gallery') }}">
              <i class="fa fa-camera"></i>
              <span>{{__('site.menu_gallery')}}</span>
            </a>
          </li>
          @endcan
          @can('site.contact_us')
          <li>
            <a href="{{ URL::route('site.contact_us') }}">
              <i class="fa fa-map-marker"></i>
              <span>{{__('site.menu_contact_us')}}</span>
            </a>
          </li>
          @endcan
          @can('site.faq')
          <li>
            <a href="{{ URL::route('site.faq') }}">
              <i class="fa fa-question-circle"></i>
              <span>FAQ</span>
            </a>
          </li>
          @endcan
          @can('site.timeline')
          <li>
            <a href="{{ URL::route('site.timeline') }}"><i class="fa fa-clock-o"></i>
              <span>{{__('site.menu_timeline')}}</span>
            </a>
          </li>
          @endcan
          @can('site.settings')
          <li>
            <a href="{{ URL::route('site.settings') }}"><i class="fa fa-cogs"></i>
              <span>{{__('global.setting')}}</span>
            </a>
          </li>
          @endcan
          @can('site.analytics')
          <li>
            <a href="{{ URL::route('site.analytics') }}"><i class="fa fa-line-chart"></i>
              <span>{{__('global.analytic')}}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>