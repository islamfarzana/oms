@extends('layouts.admin')

@section('link')
<link rel="stylesheet" href="{{ asset('plugins/full-calendar/fullcalendar.css') }}">
<style>
    .fc-content {
        color: white !important;
        font-weight: bold;
    }
    .fc-content .fc-time {
        padding-right: 5px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Event Calendar') }}
                        <div class="btn-group float-right">
                            <a href="{{ route('admin.events.create') }}" class="btn btn-lg"><i
                                    class="far fa-plus-square"></i></a>
                        </div>
                    </div>
                </h5>

                <div class="card-body">
                    <div id='calendar'></div>

                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><span id="eventTitle"></span></h4>
                                </div>
                                <div class="modal-body">
                                    <p id="pDetails"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @can('manage-user')
                <div class="modal-body">
                    <form id="dayClick" class="form-prevent" action="{{ route('calendar.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="text-muted small text-uppercase">Event Title</label>
                            <input type="text" class="form-control" name="title" placeholder="event title" required>
                        </div>
                        <div class="form-group">
                            <label class="text-muted small text-uppercase">Start Date</label>
                            <input type="datetime-local" class="form-control" id="start" name="start"
                                placeholder="start date & time" required>
                        </div>
                        <div class="form-group">
                            <label class="text-muted small text-uppercase">End Date</label>
                            <input type="datetime-local" class="form-control" id="end" name="end"
                                placeholder="end date & time">
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-secondary w-100 small text-uppercase font-weight-bold button-prevent">Save</button>
                        </div>
                    </form>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('plugins/full-calendar/fullcalendar.js') }}"></script>
<script>
    // Code goes here
$(document).ready(function() {
// page is now ready, initialize the calendar...
function convert(str) {
    const d = new Date(str);
    let month = '' + (d.getMonth() + 1);
    let day = '' + d.getDate();
    let year = '' + d.getFullYear();
    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;
    let hour = '' + d.getUTCHours();
    let minutes = '' + d.getUTCMinutes();
    let seconds = '' + d.getUTCSeconds();
    if (hour.length < 2) hour = '0' + hour;
    if (minutes.length < 2) minutes = '0' + minutes;
    if (seconds.length < 2) seconds = '0' + seconds;
    return [year, month, day].join('-') + 'T' + [hour, minutes, seconds].join(':');
};

var calendar = $('#calendar').fullCalendar({
  // put your options and callbacks here
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'year,month,basicWeek,basicDay'

  },
  timezone: 'local',
  height: "650",
  selectable: true,
  dragabble: true,
  defaultView: 'month',
  yearColumns: 2,

  durationEditable: true,
  bootstrap: false,

  events: "{{ route('calendar') }}",

  dayClick: function (date, event, view) {
    $(start).val(convert(date));
    $('#eventModal').modal({
        title: 'Add Event'
    });
  },
//   select: function(start, end, allDay) {
//     var title = prompt('Event Title:');
//     if (title) {
//       var event = {
//         title: title,
//         start: start.clone(),
//         end: end.clone(),
//         allDay: true,
//         editable: true,
//         eventDurationEditable: true,
//         eventStartEditable: true,
//         color: 'red',
//       };

//       calendar.fullCalendar('renderEvent', event, true);
//     }
//   },
})
});
</script>
{{-- <script>
    $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "{{ route('calendar') }}",
displayEventTime: true,
editable: true,

eventRender: function (event, element, view) {
if (event.allDay === 'true') {
event.allDay = true;
} else {
event.allDay = false;
}
},
selectable: true,
selectHelper: true,

select: function (start, end, allDay) {
var title = prompt('Event Title:');

if (title) {
var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

$.ajax({
url: "{{ route('calendar.create') }}",
data: 'title=' + title + '&start=' + start + '&end=' + end,
type: "POST",
success: function (data) {
displayMessage("Added Successfully");
}
});

calendar.fullCalendar('renderEvent',
{
title: title,
start: start,
end: end,
allDay: allDay
},
true
);
}
calendar.fullCalendar('unselect');
},

eventDrop: function (event, delta) {
var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

$.ajax({
url: "{{ route('calendar.update') }}",
data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
type: "POST",
success: function (response) {
displayMessage("Updated Successfully");
}
});
},

eventClick: function (event) {
var deleteMsg = confirm("Do you really want to delete?");
if (deleteMsg) {

$.ajax({
type: "POST",
url: "{{ route('calendar.destroy') }}",
data: "&id=" + event.id,
success: function (response) {
if(parseInt(response) > 0) {
$('#calendar').fullCalendar('removeEvents', event.id);
displayMessage("Deleted Successfully");
}
}
});
}
}
});
// function displayMessage(message) {
// toastr.success(message)
// setInterval(function() { $(".response").fadeOut(); }, 5000);
// }
});
</script> --}}
@endsection