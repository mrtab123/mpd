<x-layout>
<x-nav />


      <form  action="/full-calendar/action" method="POST" 
       id="add-user-form">

      

     
      @csrf
      <label for="exampleInputEmail1" class="form-label" >Conference Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" >


      <label for="exampleInputEmail1" class="form-label" >Start time:</label>
    <input type="datetime-local" class="form-control" name="start">
    
    <label for="exampleInputEmail1" class="form-label" >End time:</label>
    <input type="datetime-local" class="form-control" name="end" >



      </div>

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   
                           
        <button type="submit" class="btn btn-primary">Save changes</button>
      

      </form>




</x-layout>
