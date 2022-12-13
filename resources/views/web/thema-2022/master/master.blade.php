<!DOCTYPE html>
<html lang="pt-br">
<head>	
    <meta charset="utf-8"/>    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="language" content="pt-br" /> 
    <meta name="author" content="{{env('DESENVOLVEDOR')}}"/>
    <meta name="designer" content="Renato Montanari">
    <meta name="publisher" content="Renato Montanari">
    <meta name="url" content="{{$configuracoes->dominio}}" />
    <meta name="keywords" content="{{$configuracoes->metatags}}">
    <meta name="distribution" content="web">
    <meta name="rating" content="general">
    <meta name="date" content="Dec 26">

    {!! $head ?? '' !!}

    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- CSS here -->
	<link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/animate.min.css')}}">
	<link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/dripicons.css')}}">
	<link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/slick.css')}}">
	<link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/meanmenu.css')}}">
	<link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/default.css')}}">
	<link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/style.css')}}">
	<link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/responsive.css')}}">
		
    <link rel="shortcut icon" type="image/x-icon" href="{{$configuracoes->getfaveicon()}}" sizes="32x32" />
    
    @hasSection('css')
        @yield('css')
    @endif
</head>
<body>
	<header class="header-area header-three">  
		<div class="header-top second-header d-none d-md-block">
			<div class="container">
				<div class="row align-items-center">      
					<div class="col-lg-10 col-md-10 d-none d-lg-block">
						<div class="header-cta">
							<ul>    
								@if($configuracoes->email)
									<li>
										<i class="far fa-envelope"></i>
										<span>{{$configuracoes->email}}</span>
									</li>
								@endif 
								@if ($configuracoes->whatsapp)
									<li>
										<i class="fab fa-whatsapp"></i>
										<strong><a href="{{\App\Helpers\WhatsApp::getNumZap($configuracoes->whatsapp, 'Atendimento')}}"> {{$configuracoes->whatsapp}}</a></strong>
									</li>
								@endif								
							</ul>
						</div>
					</div>
				
					<div class="col-lg-2 col-md-2 d-none d-lg-block text-right">
						<div class="header-social">
							<span>
								@if ($configuracoes->facebook)
									<a target="_blank" href="{{$configuracoes->facebook}}" title="Facebook"><i class="fab fa-facebook-f"></i></a>
								@endif
								@if ($configuracoes->instagram)
									<a target="_blank" href="{{$configuracoes->instagram}}" title="Instagram"><i class="fab fa-instagram"></i></a>
								@endif
								@if ($configuracoes->twitter)
									<a target="_blank" href="{{$configuracoes->twitter}}" title="Twitter"><i class="fab fa-twitter"></i></a>
								@endif
								@if ($configuracoes->youtube)
									<a target="_blank" href="{{$configuracoes->youtube}}" title="Youtube"><i class="fab fa-youtube"></i></a>
								@endif
							</span>                                 
						</div>
					</div>
				</div>
			</div>
		</div>		
		<div id="header-sticky" class="menu-area">
			<div class="container">
				<div class="second-menu">
					<div class="row align-items-center">
						<div class="col-xl-2 col-lg-2">
							<div class="logo">
								<a href="{{route('web.home')}}">
									<img src="{{$configuracoes->getLogomarca()}}" alt="{{$configuracoes->nomedosite}}">
								</a>
							</div>
						</div>
						<div class="col-xl-8 col-lg-8">
						
							<div class="main-menu text-center">
								<nav id="mobile-menu">
									<ul>
										@if (!empty($Links) && $Links->count())                            
											@foreach($Links as $menuItem)                            
											<li {{($menuItem->children && $menuItem->parent ? 'class=has-sub' : '')}}>
												<a {{($menuItem->target == 1 ? 'target=_blank' : '')}} href="{{($menuItem->tipo == 'Página' ? route('web.pagina', [ 'slug' => ($menuItem->post != null ? $menuItem->PostObject->slug : '#') ]) : $menuItem->url)}}" {{($menuItem->children && $menuItem->parent ? 'class=dropdown-toggle data-toggle=dropdown' : '')}}>{{ $menuItem->titulo }}{!!($menuItem->children && $menuItem->parent ? "<b class=\"caret\"></b>" : '')!!}</a>
												@if( $menuItem->children && $menuItem->parent)
												<ul>
													@foreach($menuItem->children as $subMenuItem)
													<li><a {{($subMenuItem->target == 1 ? 'target=_blank' : '')}} href="{{($subMenuItem->tipo == 'Página' ? route('web.pagina', [ 'slug' => ($subMenuItem->post != null ? $subMenuItem->PostObject->slug : '#') ]) : $subMenuItem->url)}}">{{ $subMenuItem->titulo }}</a></li>                                        
													@endforeach
												</ul>
												@endif
											</li>
											@endforeach
										@endif
										<li><a href="{{route('web.atendimento')}}" title="Atendimento">Atendimento</a></li>                                              
									</ul>
								</nav>
							</div>
						</div>   
						<div class="col-xl-2 col-lg-2 d-none d-lg-block">
							<a href="{{route('web.reservar')}}" class="top-btn mt-10 mb-10">Pré-Reserva </a>
						</div>
						
						<div class="col-12">
							<div class="mobile-menu"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- header-end -->

	<!-- main-area -->
	<main>
		@yield('content')
	</main>

	<footer class="footer-bg footer-p">
		<div class="footer-top  pt-90 pb-40" style="background-color: #644222; background-image: url(img/bg/footer-bg.png);">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-xl-4 col-lg-4 col-sm-6">
						<div class="footer-widget mb-30">
							<div class="f-widget-title mb-30">
								<img src="{{$configuracoes->getLogomarca()}}" alt="{{$configuracoes->nomedosite}}">
							</div>
							<div class="f-contact">
								<ul>
									@if($configuracoes->telefone1)
										<li>
											<i class="icon fal fa-phone"></i>
											<span>{{$configuracoes->telefone1}}
											@if ($configuracoes->telefone2)
												<br>{{$configuracoes->telefone2}}
											@endif
											@if ($configuracoes->telefone3)
												<br>{{$configuracoes->telefone3}}
											@endif
											</span>
										</li>
									@endif										
									@if($configuracoes->whatsapp)
										<li>
											<i class="icon fab fa-whatsapp"></i>
											<span>{{$configuracoes->whatsapp}}</span>
										</li>
									@endif										
									@if($configuracoes->email)
										<li><i class="icon fal fa-envelope"></i>
											<span>
												<a href="mailto:{{$configuracoes->email}}">{{$configuracoes->email}}</a>
												@if ($configuracoes->email1)
												<br>
												<a href="mailto:{{$configuracoes->email1}}">{{$configuracoes->email1}}</a>
												@endif												
											</span>
										</li>
									@endif 
									@if($configuracoes->rua)
										<li>
											<i class="icon fal fa-map-marker-check"></i>
											<span>{{$configuracoes->rua}}
												@if($configuracoes->num)
													, {{$configuracoes->num}}
												@endif	
												@if($configuracoes->bairro)
													<br>{{$configuracoes->bairro}}
												@endif
												@if($configuracoes->cidade)  
													- {{\App\Helpers\Cidade::getCidadeNome($configuracoes->cidade, 'cidades')}}
												@endif
											</span>
										</li>
									@endif
								</ul>								   
							</div>
						</div>
					</div>					   
					<div class="col-xl-4 col-lg-4 col-sm-6">
						<div class="footer-widget mb-30">
							<div class="f-widget-title">
								<h2>Links</h2>
							</div>
							<div class="footer-link">
								<ul>
									<li><a href="{{route('web.galerias')}}" title="Galerias">Galerias</a></li>
									<li><a href="{{route('web.reservar')}}" title="Pré-Reserva">Pré-Reserva</a></li>  
									<li><a href="{{route('web.atendimento')}}" title="Atendimento">Atendimento</a></li>                          
									<li><a href="{{route('web.politica')}}" title="Política de Privacidade">Política de Privacidade</a></li>
								</ul>
							</div>
						</div>
					</div>  
					<div class="col-xl-4 col-lg-4 col-sm-12">
						@if (!empty($newsletterForm))
							<div class="footer-widget mb-30">
								<div class="f-widget-title">
									<h2>Receba Promoções</h2>
								</div>
								<div class="footer-link">
									<div class="subricbe p-relative" data-animation="fadeInDown" data-delay=".4s" >
										<form action="" method="post" class="contact-form j_submitnewsletter">
											@csrf
											<div id="js-newsletter-result"></div>
												<div class="form_hide">
												<!-- HONEYPOT -->
												<input type="hidden" class="noclear" name="bairro" value="" />
												<input type="text" class="noclear" style="display: none;" name="cidade" value="" />
												<input type="hidden" class="noclear" name="status" value="1" />
												<input type="hidden" class="noclear" name="nome" value="#Cadastrado pelo Site" />
												<input type="text" id="email2" name="email"  class="header-input" placeholder="Cadastre seu E-mail">
												<button class="btn header-btn" id="js-subscribe-btn"> <i class="fas fa-location-arrow"></i> </button>
											</div>
										</form>
									</div>
								</div>							   
							</div>
						@endif
					</div>					  
				</div>
			</div>
		</div>
		<div class="copyright-wrap">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-8 col-md-8">                         
						&copy; {{date('Y')}} {{$configuracoes->nomedosite}} . Todos os direitos reservados. <span class="small text-silver-dark">Feito com <i style="color:red;" class="fa fa-heart"></i> por <a style="color:#fff;" target="_blank" href="{{env('DESENVOLVEDOR_URL')}}">{{env('DESENVOLVEDOR')}}</a></span>         
					</div>
					<div class="col-lg-4 col-md-4 text-right text-xl-right">                       
						<div class="footer-social">                                    
							@if ($configuracoes->facebook)
								<a target="_blank" href="{{$configuracoes->facebook}}" title="Facebook"><i class="fab fa-facebook-f"></i></a>
							@endif
							@if ($configuracoes->instagram)
								<a target="_blank" href="{{$configuracoes->instagram}}" title="Instagram"><i class="fab fa-instagram"></i></a>
							@endif
							@if ($configuracoes->twitter)
								<a target="_blank" href="{{$configuracoes->twitter}}" title="Twitter"><i class="fab fa-twitter"></i></a>
							@endif
							@if ($configuracoes->youtube)
								<a target="_blank" href="{{$configuracoes->youtube}}" title="Youtube"><i class="fab fa-youtube"></i></a>
							@endif
						</div>        
					</div>					   
				</div>
			</div>
		</div>
	</footer>

	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/popper.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/slick.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/ajax-form.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/paroller.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/wow.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/js_isotope.pkgd.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/imagesloaded.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/parallax.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/jquery.waypoints.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/jquery.counterup.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/jquery.meanmenu.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/parallax-scroll.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/element-in-view.js')}}"></script>
	<script src="{{url('frontend/'.$configuracoes->template.'/assets/js/main.js')}}"></script>

	<script>
        $(function () {
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.j_btnwhats').click(function (){         
                $('.balao').slideDown();
                return false;
            });

            // Seletor, Evento/efeitos, CallBack, Ação
            $('.j_submitnewsletter').submit(function (){
                var form = $(this);
                var dataString = $(form).serialize();
    
                $.ajax({
                    url: "{{ route('web.sendNewsletter') }}",
                    data: dataString,
                    type: 'GET',
                    dataType: 'JSON',
                    beforeSend: function(){
                        form.find("#js-subscribe-btn").attr("disabled", true);
                        form.find('#js-subscribe-btn').val("Carregando...");                
                        form.find('.alert').fadeOut(500, function(){
                            $(this).remove();
                        });
                    },
                    success: function(response){
                            $('html, body').animate({scrollTop:$('#js-newsletter-result').offset().top-70}, 'slow');
                        if(response.error){
                            form.find('#js-newsletter-result').html('<div class="alert alert-danger error-msg">'+ response.error +'</div>');
                            form.find('.error-msg').fadeIn();                    
                        }else{
                            form.find('#js-newsletter-result').html('<div class="alert alert-success error-msg">'+ response.sucess +'</div>');
                            form.find('.error-msg').fadeIn();                    
                            form.find('input[class!="noclear"]').val('');
                            form.find('.form_hide').fadeOut(500);
                        }
                    },
                    complete: function(response){
                        form.find("#js-subscribe-btn").attr("disabled", false);
                        form.find('#js-subscribe-btn').val("Cadastrar");                                
                    }
    
                });
    
                return false;
            });

            $('.j_formsubmitwhats').submit(function (){
                var form = $(this);
                var dataString = $(form).serialize();
    
                $.ajax({
                    url: "{{ route('web.sendWhatsapp') }}",
                    data: dataString,
                    type: 'GET',
                    dataType: 'JSON',
                    beforeSend: function(){
                        form.find("#js-subscribe-btn").attr("disabled", true);
                        form.find('#js-subscribe-btn').val("Carregando...");                
                        form.find('.alert').fadeOut(500, function(){
                            $(this).remove();
                        });
                    },
                    success: function(response){
                            $('html, body').animate({scrollTop:$('#js-whats-result').offset().top-70}, 'slow');
                        if(response.error){
                            form.find('#js-whats-result').html('<div class="alert alert-danger error-msg">'+ response.error +'</div>');
                            form.find('.error-msg').fadeIn();                    
                        }else{
                            form.find('#js-whats-result').html('<div class="alert alert-success error-msg">'+ response.sucess +'</div>');
                            form.find('.error-msg').fadeIn();                    
                            form.find('input[class!="noclear"]').val('');
                            form.find('.form_hide').fadeOut(500);
                        }
                    },
                    complete: function(response){
                        form.find("#js-subscribe-btn").attr("disabled", false);
                        form.find('#js-subscribe-btn').val("Cadastrar");                                
                    }
    
                });
    
                return false;
            });
    
        });
    </script>

    @hasSection('js')
        @yield('js')
    @endif    

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$configuracoes->tagmanager_id}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', '{{$configuracoes->tagmanager_id}}');
    </script>

    
    </body>
</html>