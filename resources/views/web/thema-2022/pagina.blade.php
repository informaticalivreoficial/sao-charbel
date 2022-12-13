@extends("web.{$configuracoes->template}.master.master")

@section('content')
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{url('frontend/'.$configuracoes->template.'/assets/images/header.jpg')}})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-center">
                    <div class="breadcrumb-title">
                        <h2>{{$post->titulo}}</h2>    
                        <div class="breadcrumb-wrap">                  
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('web.home')}}">Início</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$post->titulo}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>

<section class="about-area about-p pt-120 pb-120 p-relative fix">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="about-content s-about-content  wow fadeInRight  animated pl-30" data-animation="fadeInRight" data-delay=".4s">
                    {!!$post->content!!}  
                    <br />
                    @if($post->images()->get()->count()) 
                        <div class="gallery-our wrap-gallery-restaurant gallery_1" style="padding-bottom:10px;">
                            <div class="container">
                                <div class="gallery gallery-restaurant">
                                    <div class="tab-content">
                                        <div id="all" class="tab-pane fade in active">
                                            <div class="product ">
                                                <div class="row">                         
                                                    @foreach($post->images()->get() as $key => $image)
                                                        <div class="gallery_product col-lg-3 col-md-4 col-sm-6 col-xs-6 ">
                                                            <div class="wrap-box-1">
                                                                <div class="box-img">
                                                                    <a class="lightbox " href="{{ $image->url_image }}" data-littlelightbox-group="gallery" title="{{$post->titulo}}">
                                                                    <img src="{{ $image->url_image }}" class="img img-responsive" alt="{{$post->titulo}}" title="{{$post->titulo}}"></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                                                  
                    @endif                                      
                </div>
            </div>         
        </div>
    </div>
</section>

@if (!empty($postsMais) && $postsMais->count() > 0)
    <section id="blog" class="blog-area p-relative fix pt-90 pb-90">
        <div class="container">
            <div class="row align-items-center"> 
                <div class="col-lg-12">
                    <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                        <h2>
                            Veja Também
                        </h2>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                @foreach ($postsMais as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="{{route('web.pagina', ['slug' => $post->slug])}}">
                                    <img width="241" src="{{$post->cover()}}" alt="{{$post->titulo}}">
                                </a>
                            </div>                    
                            <div class="blog-content2">    
                                <h4><a href="{{route('web.pagina', ['slug' => $post->slug])}}">{{$post->titulo}}</a></h4> 
                                {!!\App\Helpers\Renato::Words($post->content, 15)!!}
                                <div class="blog-btn"><a href="{{route('web.pagina', ['slug' => $post->slug])}}">Leia +</a></div>                         
                            </div>
                        </div>
                    </div> 
                @endforeach                           
            </div>
        </div>
    </section>
@endif

@endsection

@section('css')
    <style>
        .about-content img{
            padding: 10px !important;
        }
    </style>
@endsection

@section('js')
    
@endsection