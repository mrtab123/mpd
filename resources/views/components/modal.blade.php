

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-center">
        <h1 class="modal-title fs-4 text-center" id="exampleModalLabel" style="color: white; ">CONFERENCE SCHEDULE</h1>
        
      </div>
      <form role="form" action="/full-calendar/store" method="post"   >

      <div class="modal-body">
             

     
      @csrf
      <label for="exampleInputEmail1" class="form-label bold" >Conference Title</label>
    <input type="text" class="form-control" id="title" name="title">
    <span id="titleError" class="text-danger"></span>
  <br />

  <label for="exampleInputEmail1" class="form-label bold" >Location</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="location">
  <br />

      <label for="exampleInputEmail1" class="form-label" >Start time:</label>
    <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="start">
    
    <br />
    <label for="exampleInputEmail1" class="form-label" >End time:</label>
    <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="end">



      </div>
      <br />
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        
                    
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      </form>

    </div>
  </div>
</div>