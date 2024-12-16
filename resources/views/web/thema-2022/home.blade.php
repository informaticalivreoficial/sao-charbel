@extends("web.{$configuracoes->template}.master.master")

@section('content')

    @if (!empty($slides) && $slides->count() > 0)
        <section id="home" class="slider-area fix p-relative">               
            <div class="slider-active" style="background: #101010;">            
                @foreach ($slides as $key => $slide)  
                    <div class="single-slider slider-bg d-flex align-items-center" style="background-image: url({{$slide->getimagem()}}); background-size: cover;">
                        <div class="container">
                            <div class="row justify-content-center align-items-center">                  
                                <div class="col-lg-7 col-md-7">
                                    <div class="slider-content s-slider-content mt-80 text-center">
                                        @if ($slide->link != null)     
                                            <div class="slider-btn mt-30 mb-105">                    
                                                <a href="{{$slide->link}}" class="btn ss-btn active mr-15" data-animation="fadeInLeft" data-delay=".4s" {{($slide->target == 1 ? 'target="_blank"' : '')}}>
                                                    {{$slide->titulo}}  
                                                </a> 
                                            </div> 
                                        @endif         
                                    </div>
                                </div>                    
                            </div>
                        </div>
                    </div>                
                @endforeach 
            </div>
        </section>
    @endif

    @if (!empty($apartamentos) && $apartamentos->count() > 0)
        <section id="services" class="services-area pt-113 pb-150">  
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12">    
                        <div class="section-title center-align mb-50 text-center">
                            <h2>Apartamentos</h2>
                        </div>
                    </div>
                </div>
                <div class="row services-active">
                    @foreach($apartamentos as $apartamento)
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
    @endif

    @if (!empty($artigos) && $artigos->count() > 0)
        <section id="blog" class="blog-area p-relative fix pt-90 pb-90">
            <div class="animations-02"><img src="img/bg/an-img-06.png" alt="contact-bg-an-05"></div>
            <div class="container">
                <div class="row align-items-center"> 
                    <div class="col-lg-12">
                        <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                            <h2>
                                Blog
                            </h2>
                        </div>               
                    </div>
                </div>
                <div class="row">
                    @foreach($artigos as $artigo)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <div class="blog-thumb2">
                                    <a href="{{route('web.blog.artigo', ['slug' => $artigo->slug])}}">
                                        <img width="241" src="{{$artigo->cover()}}" alt="{{$artigo->titulo}}">
                                    </a>
                                </div>                    
                                <div class="blog-content2">    
                                    <h4><a href="{{route('web.blog.artigo', ['slug' => $artigo->slug])}}">{{$artigo->titulo}}</a></h4> 
                                    {!!\App\Helpers\Renato::Words($artigo->content, 15)!!}
                                    <div class="blog-btn"><a href="{{route('web.blog.artigo', ['slug' => $artigo->slug])}}">Leia +</a></div>                         
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>        
    @endif

    <section id="video" class="video-area pt-150 pb-150 p-relative" style="background-image:url({{url('frontend/'.$configuracoes->template.'/assets/images/bg-gallery.jpg')}}); background-repeat: no-repeat; background-position: center bottom; background-size:cover;">
        <!-- Lines -->
                   <div class="content-lines-wrapper2">
                       <div class="content-lines-inner2">
                           <div class="content-lines2"></div>
                       </div>
                   </div>
                  <!-- Lines -->
       <div class="container">                   
            <div class="row">
               <div class="col-12">
                   <div class="s-video-wrap">
                       <div class="s-video-content">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1spt-BR!2sbr!4v1488893723237!6m8!1m7!1sF%3A-hNOO3QBnDs4%2FWJtai4KscMI%2FAAAAAAAAEJs%2FB_Qh4lC_tTAGJL50IBdEP-e3tWMjIMveQCLIB!2m2!1d-23.43332223874241!2d-45.07221445441246!3f150.19085246815183!4f-0.20905841325189556!5f0.7820865974627469" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border:0;width: 80%;" height="450" allowfullscreen></iframe>
                       </div>
                   </div>                   
               </div>
               
           </div>
       </div>
   </section>
@endsection

@section('js')
    <script async src='https://s3-sa-east-1.amazonaws.com/hbook-universal-js/js/634efbd423248fa77bd1381f.js'></script>
@endsection