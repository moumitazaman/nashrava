 <!-- Start Slider Wrap -->
    <section id="slider-wrap">
        <!-- Start Slider Area -->
        <div class="slider-area">
            <div class="bend niceties preview-1">
                <?php $t=0; ?>
                <div id="nivoslider-lucian" class="slides">	
                @foreach($slider_uppers as $slider) 
                <?php $t++;?>
                  <a href="{{$slider->shopnow_url}}" _tartget="blank">  <img src="{{asset('public/upload/slider_image/'.$slider->image)}}" alt="" title="#slider-direction-{{$t}}"  /></a>
               @endforeach 
                   
                </div>
                <!-- direction 1 -->
                 @foreach($slider_uppers as $slider)  
                 
                <div id="slider-direction-{{$t}}" class="slider-direction">
                    <div class="row">
                        <div class="container"> 
                            <div class="slider-content-wrap">
                                <div class="slider-content t-lft s-tb">
                                    <div class="s-tb-c">
                                        <h2 class="title1">{{$slider->highlight}}</h2>
                                        <h3 class="title3 hidden-xs">{{$slider->short_text}}</h3>
                                       <!-- <div class="slider-btns"> 
                                            <a href="{{$slider->shopnow_url}}" _tartget="blank" class="slider-btn">Shop Now</a>
                                            <a href="{{$slider->explore_url}}" class="slider-btn2">Explore</a>
                                        </div>	-->						
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                      
            	    	
            </div>
        </div>
        <!-- End Slider Area-->
    </section>
    <!-- End Slider Wrap -->