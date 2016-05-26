@include('head',array('titulo'=>$titulo,'subtitulo'=>$subtitulo))
<div id="carrusel" class="carousel slide animated fadeInRight" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#carrusel" data-slide-to="0" class="active"></li>
                <li data-target="#carrusel" data-slide-to="0" class=""></li>
                <li data-target="#carrusel" data-slide-to="0" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{asset('fondo.jpg')}}" alt="First Slide" />
                        <div class="carousel-caption">First Slide</div>
                    </div>
                    <div class="item ">
                        <img src="{{asset('fondo.jpg')}}" alt="Second Slide" />
                        <div class="carousel-caption">Second Slide</div>
                    </div>
                    <div class="item ">
                        <img src="{{asset('fondo.jpg')}}" alt="Tercer Slide" />
                        <div class="carousel-caption">Tercer Slide</div>
                    </div>
                </div>
                <a class="left carousel-control" href="#carrusel" data-slide="prev"><span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carrusel" data-slide="next"><span class="fa fa-angle-right"></span>
                </a>
                </div>
@include('footer')
