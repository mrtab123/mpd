@if(session()->has('success'))


<div class="modal fade" id="flash"  >
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary text-center" style="color:white;">
        <h5 class="modal-title" id="staticBackdropLabel">Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h1 class="modal-title fs-4" id="exampleModalLabel">
      
      Your Conference Schedule has been created.
    
    </h1>
       
      </div>
      
    </div>
  </div>
</div>

 @endif 
                

                

          
