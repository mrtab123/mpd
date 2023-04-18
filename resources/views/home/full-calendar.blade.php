

    

    <x-layout>
<x-nav />

<div class="container">

<div class="row">
    <div class="col-md-11">
        <div class="panel panel-default " style="padding: 10px;  margin-top: 2px; margin-left: 120px;">
            <div class="panel-heading text-center bg-primary" style="color: white; margin-top:18px;">
                <h2>Manila Police District Conference Schedule</h2>
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
                calendar.fullCalendar('refetchEvents');
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
