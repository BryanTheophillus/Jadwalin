

<?php

include("../auth.php");
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Jadwalin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href ="../assets/css/dash.css">
  <script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    windowResize: function(arg) {
        alert('The calendar has adjusted to a window resize. Current view: ' + arg.view.type);
    },
    editable:true,
    eventResize:function(event)
    {
     var start = prompt("Enter New Start Time Year-Month-Day Hour:Minute:Second");
     var end = prompt("Enter New End Time Year-Month-Day Hour:Minute:Second");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = prompt("Enter New Start Time Year-Month-Day Hour:Minute:Second");
     var end = prompt("Enter New End Time Year-Month-Day Hour:Minute:Second");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script>
 </head>
 <body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Jadwalin</a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
            </div>
            <button class="btn btn-primary float-end" ><a href="../logout.php" id="btn1">Log Out</a></button>
        </div>
    </nav>
  <br />
  <div class="container-fluid">
    <div class="row mb-4" id="row_awal">
      <div class="col-12 mb-4" id="col_1">
        <div class="float-left" id="logos" style="margin-left:5%;">
          Jadwalin - Calendar
        </div>
        <div class="float-right" style="margin-right:5%;">
          <button type="button" class="btn btn-primary" id="but1">
            <a href="" class="btn btn-default btn-rounded " data-toggle="modal"
              data-target="#modaladd">Add</a>
          </button>
        </div>
      </div>
      <div class="col-12" id="col_2">
        <center>
            <div id="calendar" style="width:80%; height :80%;"></div>
        </center>
      </div>
    </div>
  </div>
  <div class=container-fluid>
    <center>
        <h5 style="font-size:10pt;">Copyright by Jadwalin</h5>
    </center>
  </div>
  <form action="insert.php" method="POST">
    <div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Add Event</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-3">
              <label data-error="wrong" data-success="right" for="form34">Event Name</label><br>
              <i class="fas fa-user prefix grey-text"></i>
              <input type="text" name="title" id="title" placeholder="Event">
              
            </div>

            <div class="md-form mb-3">
              <label data-error="wrong" data-success="right" for="form29">Start Date</label>
              <i class="fas fa-clock prefix grey-text"></i>
              <input type="datetime-local" class="form-control" name="start" id="start" placeholder="start">
            </div>

            <div class="md-form mb-3">
              <label data-error="wrong" data-success="right" for="form32">End Date</label>
              <i class="fas fa-clock prefix grey-text"></i>
              <input type="datetime-local" class="form-control" name="end" id="end" placeholder="end">
              
            </div>

            <div class="md-form">
              <label data-error="wrong" data-success="right" for="form8">Color</label>
              <i class="fas fa-paint-brush prefix grey-text"></i>
              <input name="color" class="form-control" id="color" placeholder="color">
              
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </form>
 </body>
</html>

