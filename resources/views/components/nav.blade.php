
<script type="text/javascript">

	window.addEventListener("resize", function() {
		"use strict"; window.location.reload(); 
	});


	document.addEventListener("DOMContentLoaded", function(){

		// make it as accordion for smaller screens
		if (window.innerWidth > 992) {

			document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
				
				everyitem.addEventListener('mouseover', function(e){

					let el_link = this.querySelector('a[data-bs-toggle]');

					if(el_link != null){
						let nextEl = el_link.nextElementSibling;
						el_link.classList.add('show');
				 		nextEl.classList.add('show');
					}
					
				});
				everyitem.addEventListener('mouseleave', function(e){
				 	let el_link = this.querySelector('a[data-bs-toggle]');
					
					if(el_link != null){
						let nextEl = el_link.nextElementSibling;
						el_link.classList.remove('show');
				 		nextEl.classList.remove('show');
					}
					

				})
			});

		}
		// end if innerWidth
	}); 
	// DOMContentLoaded  end

</script>
<style>
/* .nav-item:hover  {
  background-color: lightblue;
  color: black;
} */

.dropdown-item:hover  {
  background-color: lightblue;
  color: black;
}

 .nav-link.nav-item:hover  {

  color: black;
}

.vr{
    background-color: yellow; width: 3px; height: 3em

}

.navbar-nav li a{
  
  position: relative;
  padding: 8px 0;
 

}

.navbar-nav li a:before{
  content: '';
  position: absolute;
  background: #34efdf;
  height: 4px;
  width: 0;
  bottom: 0;
  left: 0;
  transition: all 0.4s ease;
}


.navbar-nav li a:hover:before{

  width: 100%;
 
}

.navbar-nav li.center a:before{

left: 50%;
transform: translateX(-50%);

}

</style>



<nav class="navbar navbar-expand-lg navbar-expand-sm navbar-expand bg-primary" id="TableofContents">
  <div class="container-fluid">
  <img src="/images/mpdlogo.png" alt="" class="mx-auto " style="width: 80px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item center" >
          <a class="nav-link active text-white navbar-brand:hover" aria-current="page" href="/">Home</a>
        </li>

        <!-- <li class="vr" style=""></li> -->
        <li class="nav-item ms-auto center">
          <a class="nav-link text-white" href="/full-calendar">Conference Schedule</a>
        </li>
     
        <li class="nav-item ms-auto center">
          <a class="nav-link text-white" href="/full-calendar">Key Officers</a>
        </li>
        <!-- <li class="vr"></li> -->
        <!-- <li class="nav-item dropdown center" >
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Key Officers
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
       
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>


