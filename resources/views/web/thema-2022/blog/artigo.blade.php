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

    <!-- inner-blog -->
    <section class="inner-blog b-details-p pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-details-wrap">
                        <div class="details__content pb-30">
                            <h2>{{$post->titulo}}</h2>
                            <div class="meta-info">
                                <ul>
                                    <li><i class="fal fa-eye"></i> {{$post->views}} Visualizações  </li>
                                    <li><i class="fal fa-calendar-alt"></i> {{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</li>
                                </ul>
                            </div>
                            {!!$post->content!!}   
                            
                            @if($post->images()->get()->count())                                                
                                @foreach($post->images()->get() as $image)  
                                    <figure class="d-inline-flex">
                                        <a class="popup-image" href="{{ $image->url_image }}">
                                            <img height="161" src="{{ $image->url_cropped }}"  alt="{{ $post->titulo }}"/>
                                        </a>
                                    </figure>                                             
                                @endforeach                                                             
                            @endif
                        </div>
                        
                        <div class="posts_navigation pt-35 pb-35">
                            <div class="row align-items-center">
                                @if(!empty($postprev) && $postprev->count() > 0)
                                    <div class="col-xl-4 col-md-5">
                                        <div class="prev-link">
                                            <span>Anterior</span>
                                            <h4><a href="{{route(($postprev->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'), ['slug' => $postprev->slug] )}}">{{$postprev->titulo}}</a></h4>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-xl-4 col-md-2 text-left text-md-center">
                                    <a href="{{route('web.blog.artigos')}}" class="blog-filter">
                                        <img src="{{url('frontend/'.$configuracoes->template.'/assets/images/c_d01.png')}}" alt="Artigos">
                                    </a>
                                </div>
                                @if(!empty($postnext) && $postnext->count() > 0)
                                    <div class="col-xl-4 col-md-5">
                                        <div class="next-link text-left text-md-right">
                                            <span>Próximo</span>
                                            <h4><a href="{{route(($postnext->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'), ['slug' => $postnext->slug] )}}">{{$postnext->titulo}}</a></h4>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if (!empty($postsMais) && $postsMais->count() > 0)
                            <div class="related__post mt-45 mb-85">
                                <div class="post-title">
                                    <h4>Veja Também</h4>
                                </div>
                                <div class="row">
                                    @foreach ($postsMais as $postmais)
                                        <div class="col-md-6">
                                            <div class="related-post-wrap mb-30">
                                                <div class="post-thumb">
                                                    <img src="{{$postmais->cover()}}" alt="{{$postmais->titulo}}">
                                                </div>
                                                <div class="rp__content">
                                                    <h3><a href="{{route(($postmais->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'), ['slug' => $postmais->slug] )}}">{{$postmais->titulo}}</a></h3>
                                                    {!!\App\Helpers\Renato::Words($postmais->content, 15)!!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach                                    
                                </div>
                            </div>
                        @endif
                    </div>
                </div>                
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        .details__content figure {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .details__content figure img {
            margin-right: 10px;
        }
    </style>
@endsection