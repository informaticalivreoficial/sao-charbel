@extends("web.{$configuracoes->template}.master.master")

@section('content')
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{url('frontend/'.$configuracoes->template.'/assets/images/header.jpg')}})">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-center">
                        <div class="breadcrumb-title">
                            <h2>Acomodações</h2>    
                            <div class="breadcrumb-wrap">                  
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('web.home')}}">Início</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Acomodações</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </section>

    <section id="services" class="services-area pt-120 pb-90">  
        <div class="container">        
            <div class="row">
                @foreach($acomodacoes as $apartamento)
                    <div class="col-xl-4 col-md-6">
                        <div class="single-services mb-30">
                            <div class="services-thumb">
                                <a href="{{route('web.acomodacao', ['slug' => $apartamento->slug])}}">
                                <img height="350" src="{{$apartamento->cover()}}" alt="{{$apartamento->titulo}}">
                                </a>
                            </div>
                            <div class="services-content"> 
                                <div class="day-book">
                                    <ul>
                                        @if ($apartamento->exibir_valores == 1)
                                            <li>R$ {{$apartamento->valor_cafe}}</li>
                                        @endif                                        
                                        <li><a href="{{route('web.acomodacao', ['slug' => $apartamento->slug])}}">Reservar</a></li>
                                    </ul>
                                </div>
                                <h4><a href="{{route('web.acomodacao', ['slug' => $apartamento->slug])}}">{{$apartamento->titulo}}</a></h4>    
                                {!!\App\Helpers\Renato::Words($apartamento->content, 15)!!}                               
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>   	
@endsection

@section('css')
    
@endsection

@section('js')
    
@endsection