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
                                </ul>
                            </div>
                            {!!$post->content!!}                            
                        </div>
                        <div class="posts_navigation pt-35 pb-35">
                            <div class="row align-items-center">
                                <div class="col-xl-4 col-md-5">
                                    <div class="prev-link">
                                        <span>Prev Post</span>
                                        <h4><a href="#">Tips Minimalist</a></h4>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-2 text-left text-md-center">
                                    <a href="blog.html" class="blog-filter"><img src="img/icon/c_d01.png" alt=""></a>
                                </div>
                                <div class="col-xl-4 col-md-5">
                                    <div class="next-link text-left text-md-right">
                                        <span>next Post</span>
                                        <h4><a href="#">Less Is More</a></h4>
                                    </div>
                                </div>
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