<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach($sliders as $slider)
    <div class="item active" >
      @if($slider->durum == 1)
      <img src="{{$slider->resim}}" class="slider-img" alt="slider resim" width="300">
      <div class="carousel-caption d-none d-md-block">
        <h5>{{$slider->baslik}}</h5>
      </div>
      @endif
    </div>
    @endforeach
    <a class="left carousel-control" href="#carousel-example" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>
  
</div>

