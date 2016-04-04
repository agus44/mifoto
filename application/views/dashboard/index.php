<div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      
        <div class="item active">
          <img src="<?php echo base_url();?>images/2.jpg" width="820px" height="350px">
           <div class="carousel-caption">
            <h4><a href="#">Bienvenido al Nuevo Sistema RR.HH Mi foto</a></h4>
            <p>Nuevo sistema desarrollado para las áreas operativas de RR.HH orientado a soluciones informáticas integrada con softland.<a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
          </div>
        </div><!-- End Item -->
 
         <div class="item">
          <img src="<?php echo base_url();?>images/1.jpg" width="820px" height="350px">
           <div class="carousel-caption">
            <h4><a href="#">Nuevas Tecnologías Desarrolladas</a></h4>
            <p>Éste sistema ha sido desarrollado con tecnologías especializadas para operar de forma más rápida y que se adapta en cualquier dispositivo móvil. Gracias a las herramientas de Boostrap y Codeigniter.<a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
          </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="<?php echo base_url();?>images/3.jpg" width="820px" height="350px">
           <div class="carousel-caption">
            <h4><a href="#">Dualidad</a></h4>
            <p>Sistema encargado de integrar softland con bases de datos propias<a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
          </div>
        </div><!-- End Item -->
                 
      </div><!-- End Carousel Inner -->


    <ul class="list-group col-sm-4">
      <li data-target="#myCarousel" data-slide-to="0" class="list-group-item active"><h4>Bienvenido al Nuevo Mi Foto</h4></li>
      <li data-target="#myCarousel" data-slide-to="1" class="list-group-item"><h4>Nuevas Tecnologías Desarrolladas</h4></li>
      <li data-target="#myCarousel" data-slide-to="2" class="list-group-item"><h4>Almacenamiento y Sistema Switch de Base de Datos</h4></li>
    </ul>

      <!-- Controls -->
      <div class="carousel-controls">
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div>

    </div><!-- End Carousel -->

<script>
$(document).ready(function(){

	/***slider***/
	var clickEvent = false;
	$('#myCarousel').carousel({
		interval:   4000	
	}).on('click', '.list-group li', function() {
			clickEvent = true;
			$('.list-group li').removeClass('active');
			$(this).addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.list-group').children().length -1;
			var current = $('.list-group li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.list-group li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
})

$(window).load(function() {
    var boxheight = $('#myCarousel .carousel-inner').innerHeight();
    var itemlength = $('#myCarousel .item').length;
    var triggerheight = Math.round(boxheight/itemlength+1);
	$('#myCarousel .list-group-item').outerHeight(triggerheight);
});

/*****SLIDER********/
</script>