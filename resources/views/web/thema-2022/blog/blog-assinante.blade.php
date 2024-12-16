@extends("web.{$configuracoes->template}.master.master")

@section('content')
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{url('frontend/'.$configuracoes->template.'/assets/images/header.jpg')}})">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-center">
                        <div class="breadcrumb-title">
                            <h2>{{(!empty($posts) && $posts[0]->tipo == 'noticia' ? 'Notícias' : 'Blog')}}</h2>    
                            <div class="breadcrumb-wrap">                  
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('web.home')}}">Início</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{(!empty($posts) && $posts[0]->tipo == 'noticia' ? 'Notícias' : 'Blog')}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </section>

    
   
        <section class="inner-blog pt-30 pb-30">
            <div class="container">
                <div class="row">
                    @if(!empty($posts) && $posts->count() > 0)
                        @foreach($posts as $post)
                            
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                
                                @if (env('HASH_CLIENTE') == 'E79uwjjkvvGTR7367JsfIV1vJZLFxYvcTpFI0n8' && $post->assinante == 1)
                                    <div class="bsingle__post mb-50">
                                        <div class="bsingle__post-thumb">
                                            <img src="{{$post->cover()}}" alt="{{$post->titulo}}">
                                        </div>
                                        <div class="bsingle__content">
                                        <div class="date-home">
                                            {{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}
                                            </div>
                                            <h2><a href="{{route(($post->tipo == 'noticia' ? 'web.noticia' : 'web.blog.artigo'), [ 'slug' => $post->slug ])}}?hash={{env('HASH_CLIENTE')}}">{{$post->titulo}}</a></h2>
                                            {!!\App\Helpers\Renato::Words($post->content, 25)!!}
                                            <div class="blog__btn">
                                                <a href="{{route(($post->tipo == 'noticia' ? 'web.noticia' : 'web.blog.artigo'), [ 'slug' => $post->slug ])}}?hash={{env('HASH_CLIENTE')}}">Ler +</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            
                            </div>
                        @endforeach
                    @endif
                    <div class="pagination-wrap">
                        <nav>
                            <ul class="pagination">
                                @if (isset($filters))
                                    {{ $posts->appends($filters)->links() }}
                                @else
                                    {{ $posts->links() }}
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
@endsection

@section('css')
    
@endsection

@section('js')
    
@endsection