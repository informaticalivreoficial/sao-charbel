@extends("web.{$configuracoes->template}.master.master")

@section('content')
 
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{url('frontend/'.$configuracoes->template.'/assets/images/header.jpg')}})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-center">
                    <div class="breadcrumb-title">
                        <h2>{{$acomodacao->titulo}}</h2>    
                        <div class="breadcrumb-wrap">                  
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('web.home')}}">Início</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$acomodacao->titulo}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>

<div class="about-area5 about-p p-relative">
    <div class="container pt-120 pb-40">
        <div class="row">         
            <div class="col-sm-12 col-md-12 col-lg-4 order-2">
                <aside class="sidebar services-sidebar">            
                    <!-- Category Widget -->
                    <div class="sidebar-widget categories">
                        <div class="widget-content">
                            <h2 class="widget-title"> Reservar  </h2>
                            <!-- Services Category -->
                            <!-- booking-area -->
                            <div class="booking">
                                <div class="contact-bg"> 
                                    <form action="{{route('web.reservar')}}" method="post" class="contact-form mt-30" autocomplete="off">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="contact-field p-relative c-name mb-20">                                    
                                                    <label><i class="fal fa-badge-check"></i> Check In</label>
                                                    <input type="date" id="chackin" name="checkini">
                                                </div>                               
                                            </div>

                                            <div class="col-lg-12">                               
                                                <div class="contact-field p-relative c-subject mb-20">                                   
                                                    <label><i class="fal fa-times-octagon"></i> Check Out</label>
                                                    <input type="date" id="chackout" name="checkouti">
                                                </div>
                                            </div>		
                                            <div class="col-lg-12">                               
                                                <div class="contact-field p-relative c-subject mb-20">                                   
                                                    <label><i class="fal fa-users"></i> Adultos</label>
                                                    <select name="adultos" id="adu">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>	
                                            <div class="col-lg-12">                               
                                                <div class="contact-field p-relative c-subject mb-20">                                   
                                                    <label><i class="fal fa-users"></i> Crianças 0 a 5</label>
                                                    <select name="cri_0_5" id="adu">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="slider-btn mt-15">    
                                                    <input class="noclear" type="hidden" name="apart_id" value="{{$acomodacao->id}}" />                                      
                                                    <button class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s"><span>Fazer Pré-Reserva</span></button>				
                                                </div>                             
                                            </div>
                                        </div>
                                    </form>                            
                                </div>  
                            </div>
                            <!-- booking-area-end -->	
                        </div>
                    </div>                    
                </aside>
            </div>
           
            
            <div class="col-lg-8 col-md-12 col-sm-12 order-1">
                <div class="service-detail">
                
                    <div class="two-column">
                        <div class="row">
                            <div class="image-column col-xl-12 col-lg-12 col-md-12">
                                <figure class="image"><img src="{{$acomodacao->cover()}}" alt="{{$acomodacao->titulo}}"></figure>
                            </div>
                        </div>
                    </div>

                    <div class="content-box">
                        <div class="row align-items-center mb-50">
                            <div class="col-lg-6 col-md-6">
                                <div class="price">
                                    <h2>{{$acomodacao->titulo}}</h2>
                                    @if ($acomodacao->exibir_valores == 1)
                                        <span>R$ {{$acomodacao->valor_cafe}}</span>
                                    @endif
                                </div>
                            </div>                        
                        </div>
                        
                        {!!$acomodacao->descricao!!} 
                        <ul class="room-features d-flex align-items-center">
                            @if (!empty($acomodacao->ar_condicionado))
                                <li>Ar Condicionado</li>
                            @endif
                            @if (!empty($acomodacao->cafe_manha))
                                <li>Café da manhã</li>
                            @endif
                            @if (!empty($acomodacao->telefone))
                                <li>Telefone</li>
                            @endif
                            @if (!empty($acomodacao->estacionamento))
                                <li>Estacionamento</li>
                            @endif
                            @if (!empty($acomodacao->servico_quarto))
                                <li>Serviço de Quarto</li>
                            @endif
                            @if (!empty($acomodacao->frigobar))
                                <li>Frigobar</li>
                            @endif
                            @if (!empty($acomodacao->elevador))
                                <li>Elevador</li>
                            @endif
                            @if (!empty($acomodacao->vista_para_mar))
                                <li>Vista para o Mar</li>
                            @endif
                            @if (!empty($acomodacao->ventilador_teto))
                                <li>Ventilador de Teto</li>
                            @endif
                            @if (!empty($acomodacao->cofre_individual))
                                <li>Cofre Individual</li>
                            @endif
                            @if (!empty($acomodacao->espaco_fitness))
                                <li>Espaço Fitness</li>
                            @endif
                            @if (!empty($acomodacao->wifi))
                                <li>Wifi</li>
                            @endif
                            @if (!empty($acomodacao->lareira))
                                <li>Lareira</li>
                            @endif
                        </ul>
                        @if ($acomodacao->notasadicionais)
                            <p>{{$acomodacao->notasadicionais}}</p>
                        @endif                    
                    </div>
                </div>
            </div>
         
        </div>
    </div>
</div>

@endsection

@section('css')

@endsection

@section('js')

@endsection