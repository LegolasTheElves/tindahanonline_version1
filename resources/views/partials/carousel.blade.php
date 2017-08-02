<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
</ol>

<div class="row">
    <div class="col-sm-8">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img id="imgcarousel" src="{{ URL::to('images/flat.jpg') }}" class="img-responsive" style="height: 540px;
     width: 100%;
     overflow: hidden;" alt="Chania">
                </div>

                <div class="item">
                    <img id="imgcarousel" src="{{ URL::to('images/window_tab.png') }}" class="img-responsive" style="height: 540px;
     width: 100%;
     overflow: hidden;" alt="Chania">
                </div>

                <div class="item">
                    <img id="imgcarousel" src="{{ URL::to('images/bb.jpg') }}" class="img-responsive" style="height: 540px;
     width: 100%;
     overflow: hidden;" alt="Flower">
                </div>

                <div class="item">
                    <img id="imgcarousel" src="{{ URL::to('images/slider1.jpg') }}" class="img-responsive" style="height: 540px;
     width: 100%;
     overflow: hidden;" alt="Flower">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-sm-4">
        <a href=""><img src="{{ URL::to('images/iphone_7.jpg') }}" style="height: 250px;
     width: 100%;
     overflow: hidden;" class="img-responsive"/></a>
       <hr>
        <a href=""><img src="{{ URL::to('images/lg4k.jpg') }}" style="height: 250px;
     width: 100%;
     overflow: hidden;" class="img-responsive"/></a>
    </div>

</div>