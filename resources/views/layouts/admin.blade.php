<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OMS') }} | Dashboard</title>

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

    <!-- Page Link -->
    @yield('link')

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        .card-header {
            background: rgb(4 60 100 / 75%) !important;
            color: white !important;
        }

        /* .card-footer {
            background: rgb(184 218 255 / 1) !important;
        } */

        .card {
            border: 1px solid rgb(4 60 100 / 75%) !important;
            border-radius: 5.5px;
            border-bottom-width: 6px !important;
        }

        .card .card-header .btn {
            color: white !important;
        }

        .card .card-header label  {
            color: white !important;
        }

        .card .btn-group-lg>.btn,
        .card .btn-lg {
            padding: 0rem 1rem !important;
        }

        .card-body .btn-secondary,
        .card-footer .btn-secondary {
            background: rgb(4 60 100 / 75%) !important;
        }

        .card-body .btn-secondary:hover,
        .card-footer .btn-secondary:hover {
            background: rgb(4 60 100 / 80%) !important;
        }

        .main-footer {
            background: rgb(4 60 100 / 65%);
        }

        .main-footer p {
            color: white !important;
        }

        /* a.nav-link.arrow-right {
            display: none !important;
        }

        .sidebar-collapse a.nav-link.arrow-right {
            display: block !important;
        }

        .sidebar-collapse a.nav-link.arrow-left {
            display: none !important;
        } */
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-closed sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-dark"
            style="background: rgb(4 60 100 / 83%) !important">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                        class="fas fa-bars"></i></a>
                    {{-- <a class="nav-link arrow-left" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-arrow-circle-left"></i></a>
                    <a class="nav-link arrow-right" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-arrow-circle-right"></i></a> --}}
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ implode(', ', Auth::user()->employee()->get()->pluck('name')->toArray()) }} <span
                            class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="navbarDropdown">
                        <div class="card-group">
                            <div class="card">
                                <div class="card-header py-4" style="background: #4b545c">
                                    <div class="image m-auto" style="max-width: 80px">
                                        <img src="{{ asset('storage/user/image/'.implode(', ', Auth::user()->employee()->get()->pluck('image')->toArray())) }}"
                                            width="80px" class="img-circle elevation-2" alt="User Image">
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <h6 class="text-center">
                                        {{ implode(', ', Auth::user()->employee()->get()->pluck('name')->toArray()) }}
                                        <small class="text-info"> (Online)</small></h6>
                                </div>
                                <div class="card-footer">
                                    <a class="dropdown-item"
                                        href="{{ route('employee.employees.show', Auth::user()->employee_id) }}">
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ asset('dist/img/logo.png') }}" alt="logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Brother's Dream-IT </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>

                        </li>

                        <!-- Admin and Sub-admin Module Menu -->
                        @can('admin')
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        @endcan

                        @can('manage-user')
                        <li class="nav-item">
                            <a href="{{ route('admin.employees.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Employee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.attendances.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-clock"></i>
                                <p>Attendence</p>
                            </a>
                        </li>
                        @endcan

                        @can('admin')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-money-bill-alt"></i>
                                <p>
                                    Salary
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.basic_salaries.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Basic Salary</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.monthly_salaries.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Monthly Salary</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-project-diagram"></i>
                                <p>
                                    Task Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.projects.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.teams.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Team Member</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.tasks.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Task</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.ratings.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rating</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>
                                    Reports
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.reports.attendanceReport') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Attendance Report</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.reports.salaryReport') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Salary Report</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan

                        @can('manage-user')
                        <li class="nav-item">
                            <a href="{{ route('admin.events.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar-day"></i>
                                <p>Event</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('calendar') }}" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>Calendar</p>
                            </a>
                        </li>
                        @endcan

                        @can('admin')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Configuration
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Role</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.departments.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Department</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.designations.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Designation</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        <!-- End of Admin and Sub-admin Module Menu-->

                        <!-- Employee Module Menu -->
                        @can('employee')
                        @cannot('manage-user')
                        <li class="nav-item">
                            <a href="{{ route('employee.employees.index') }}" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>Employee</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-project-diagram"></i>
                                <p>
                                    Task Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('employee.projects.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('employee.tasks.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Task</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employee.attendances.show', Auth::user()->employee_id) }}"
                                class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employee.events.index') }}" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>Event</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('calendar') }}" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>Calendar</p>
                            </a>
                        </li>
                        @endcannot
                        @endcan
                        <!-- End Employee Module Menu -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <p class="m-0 text-dark">Control Panel</p>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="content">
                @yield('content')
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <p class='text-muted small text-center'>Brother's Dream-IT Ltd.</p>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    <!-- page script -->
    @yield('script')
    <script>
        $(document).ready(function() {

        // Setup - add a text input to each footer cell
        $('.dataTable thead tr').clone(true).appendTo( '.dataTable thead' );
        $('.dataTable thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" class="form-control form-control-sm" style="height:27px" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            });
        });

        var table = $('.dataTable').DataTable( {
            "paging": true,
            "lengthChange": false,
            "ordering": true,
            "autoWidth": false,
            "responsive": true,
            "orderCellsTop": true,
            "fixedHeader": true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    footer: true,
                    text: 'Copy all rows',
                },
                'pageLength',
                {
                extend: 'collection',
                    text: 'Export',
                    buttons: [
                    { extend: 'excel', footer: true },
                    { extend: 'csv', footer: true },
                    {
                    extend: 'pdf',
                    footer: true,
                    customize: function (doc) {
                    doc.content[1].table.widths = 
                        Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        }
                    },
                    'print',
                ]
                },
            ],
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;
    
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };
    
                // Total over all pages
                total = api
                    .column( 4 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
    
                // Total over this page
                pageTotal = api
                    .column( 4, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
    
                // Update footer
                $( api.column( 4 ).footer() ).html(
                    pageTotal+''
                );
                $( api.column( 5 ).footer() ).html(
                    '(total '+ total +')'
                );
            },
        }); 

        var table_all = $('.dTable').DataTable( {
            "paging": true,
            "responsive": true,
            "orderCellsTop": true,
            "fixedHeader": true,
        });
           
        // Date range picker
        $('.rangepicker').daterangepicker({
            "showDropdowns": true,
            "showWeekNumbers": true,
            "showISOWeekNumbers": true,
            "autoApply": true,
            ranges: {
                'All': [01/01/1970, moment()],
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "linkedCalendars": false,
            "startDate": moment().subtract(29, 'days'),
            "endDate": moment()
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });

        // Hide the success alert on successful create, update and delete of records
        // setInterval(function() { $(".successMessage").fadeOut(); }, 5000);

        $(".form-prevent").on('submit', function() {
            $(".button-prevent").attr('disabled', 'true');
        });
    });
    </script>

    @if(Session::has('success_message'))
    <script>
        toastr.success("{{ Session::get('success_message') }}")
    </script>
    @endif
</body>

</html>