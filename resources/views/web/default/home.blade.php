@extends("web.{$configuracoes->template}.master.master")

@section('content')
<!-- SLIDER -->
<section class="section-slider height-v">

    <!-- Slider Section -->
    @if (!empty($slides) && $slides->count() > 0)
    <div id="index12" class="owl-carousel  owl-theme">        
            
        @foreach ($slides as $key => $slide)  
            <div class="item{{($key == 0 ? ' active' : '')}}">
                @if ($slide->link != null)                        
                    <a href="{{$slide->link}}" {{($slide->target == 1 ? 'target="_blank"' : '')}}>
                        <img src="{{$slide->getimagem()}}" alt="{{$slide->titulo}}" />  
                    </a> 
                @else
                    <img src="{{$slide->getimagem()}}" alt="{{$slide->titulo}}" />
                @endif                         
            </div>
        @endforeach             
           
    </div>
    @endif
    <!-- Slider Section /- -->
            
        
        <form action="" method="post">
        <div class="check-avail">
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        
                    </div>  
                </div>
            <div class="container">
                          
                <div class="arrival date-title ">
                    <label>Check In</label>
                    <div id="datepicker" class="input-group date" data-date-format="dd/mm/yyyy">
                        <input class="form-control" name="checkini" type="text" value=""/>
                        <span class="input-group-addon"><img src="{{url('frontend/assets/images/date-icon.png')}}" alt="Check in"/></span>
                    </div>
                </div>
                <div class="departure date-title ">
                    <label>Check Out</label>
                    <div id="datepickeri" class="input-group date" data-date-format="dd/mm/yyyy">
                        <input class="form-control" name="checkouti" type="text" value=""/>
                        <span class="input-group-addon"><img src="{{url('frontend/assets/images/date-icon.png')}}" alt="Check out"/></span>
                    </div>
                </div>
                <div class="adults date-title ">
                    <label>Adultos</label>                
                    <div class=" carousel-search">
                        <select name="adultos" class="selectindex">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    
                </div>
                <div class="children date-title ">
                    <label>Crianças 0 a 5</label>                
                    <div class=" carousel-search">
                        <select name="cri_0_5" class="selectindex">
                                <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>                    
                </div>
                <div class="find_btn date-title">
                    <button type="submit" name="SendReserva" class="text-find center btnindex">Reservar<br />Agora</button>                
                </div>
            </div>
        </div>
        </form>
    </section>
    <!-- END / SLIDER -->

@endsection

@section('css')

@endsection

@section('js')
  
@endsection
    
     
    
    