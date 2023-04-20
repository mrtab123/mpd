
<meta name="csrf-token" content="{{ csrf_token() }}" />
  

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
 
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    

    <x-layout>


<div class="container">

<div class="row">
    <div class="col-md-11">
        <div class="panel panel-default " style="padding: 10px;  margin-top: 2px; margin-left: 120px;">
            <div class="panel-heading text-center bg-primary" style="color: white; margin-top:18px; padding: 10px;">
                <h1>Manila Police District Conference Schedule</h1>
            </div>

            <div class="panel-body">
             <div id="calendar"></div>
            </div>
        </div>

        
    </div>
</div>
  
</div>
   
<x-modal />
<x-flash-message />
<script>

$(document).ready(function () {

    var events = @json($events);



$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});


var calendar = $('#calendar').fullCalendar({
   
    editable:true,
    header:{
        left:'prev,next today',
        center:'title',
        right:'month,agendaWeek,agendaDay'
    },

    events:events,
    selectable:true,
    selectHelper: true,
    select:function(start, end, allDay)
    {
        $('#exampleModal').modal('show');

        
      
    },
    editable:true,
    eventResize: function(event, delta)
    {
        var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
        var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
        var title = event.title;        
        var id = event.id;
        $.ajax({
            url:"{{ route('action') }}",
            type:"POST",
            data:{
                title: title,               
                start: start,
                end: end,
                id: id,
                type: 'update'
            },
            success:function(response)
            {
                calendar.fullCalendar('refetchEvents');
                alert("Event Updated Successfully");
            }
        })
    },
    eventDrop: function(event, delta)
    {
        var start = moment(event.start).format('Y-MM-DD HH:mm:ss');
        var end = moment(event.end).format('Y-MM-DD HH:mm:ss');
        var title = event.title;    
        var id = event.id;
        $.ajax({
            url:"{{ route('action')}}",
            type:"POST",
            data:{
                title: title,
                start: start,
                end: end,
                id: id,
                type: 'update'
            },
            success:function(response)
            {
                calendar.fullCalendar('renderErefetchEventsvent');
                alert("Event Updated Successfully");
            }
        })
    },

    eventClick:function(event)
    {
        if(confirm("Are you sure you want to remove it?"))
        {
            var id = event.id;
            $.ajax({
                url:"{{ route('action')}}",
                type:"POST",
                data:{
                    id:id,
                    type:"delete"
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Deleted Successfully");
                }
            })
        }
    }
});

});
</script>






</x-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
   