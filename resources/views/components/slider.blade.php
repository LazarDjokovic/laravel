<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div id="mySlider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @isset($slider)
                        <?php $i = 1; ?>
                        @foreach($slider as $s)

                            @if($s->active=='first')
                                <li data-target="#mySlider" data-slide-to="0" class="active"></li>
                            @else
                                <li data-target="#mySlider" data-slide-to="{{$i++}}"></li>
                            @endif
                        @endforeach
                    @endisset


                    <!--<li data-target="#mySlider" data-slide-to="2"></li>-->
                </ol>
                <!-- wrapper for slider -->
                <!-- IMAGES HAVE TO BE THE SAME SIZE, in this case 1920x740-->
                <div class="carousel-inner" role="listbox">
                    @isset($slider)
                        @foreach($slider as $s)
                            @if($s->active=='first')
                                <div class="item active">
                                    <img src="{{asset('/images/slider/'.$s->picture)}}" alt="{{$s->alt}}" class="img-rounded"/>
                                </div>
                            @else
                                <div class="item">
                                    <img src="{{asset('/images/slider/'.$s->picture)}}" alt="{{$s->alt}}" class="img-rounded"/>
                                </div>
                            @endif
                        @endforeach
                    @endisset
                    <!--<div class="item active">
                        <a href="index.php?page=1"><img src="images/slider/worldOfWarcraftLegion.jpg" alt="World of Warcraft"/></a>
                    </div>
                    <div class="item">
                        <a href="index.php?page=1"><img src="images/slider/overwatch.jpg" alt="Overwatch" class="img-rounded"/></a>
                    </div>
                    <div class="item">
                        <a href="index.php?page=1"><img src="images/slider/callOfDuty.jpg" alt="Call of Duty"/></a>
                    </div>-->
                </div>
                <!-- controls or next and previous button-->
                <a class="left carousel-control" href="#mySlider" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#mySlider" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
