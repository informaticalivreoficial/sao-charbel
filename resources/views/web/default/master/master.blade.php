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

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="{{$configuracoes->getfaveicon()}}" />
    <link rel="shortcut icon" href="{{$configuracoes->getfaveicon()}}" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="{{$configuracoes->getfaveicon()}}"/>
    <link rel="apple-touch-icon" sizes="72x72" href="{{$configuracoes->getfaveicon()}}"/>
    <link rel="apple-touch-icon" sizes="114x114" href="{{$configuracoes->getfaveicon()}}"/>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet"/>
    
    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="{{url('frontend/assets/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('frontend/assets/css/ionicons.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('frontend/assets/css/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('frontend/assets/css/gallery.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('frontend/assets/css/vit-gallery.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('frontend/assets/css/bootstrap-select.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('frontend/assets/css/bootstrap-datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('frontend/assets/css/renato.css')}}" />
    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="{{url('frontend/assets/css/styles.css')}}"/> 
    
    @hasSection('css')
        @yield('css')
    @endif
 </head>
 <body>

    <!-- HEADER -->
    <header class="header-sky">
        <div class="container">
            <!--HEADER-TOP-->
            <div class="header-top">
                <div class="header-top-left"> 
                    @if ($configuracoes->email)
                        <span><i class="fa fa-envelope-o"></i> {{$configuracoes->email}}</span>
                    @endif               
                    @if ($configuracoes->whatsapp)
                        <span><img src="{{url('frontend/assets/images/zapzap.png')}}" alt="WhatsApp" width="16" height="16" /> {{$configuracoes->whatsapp}}</span>
                    @endif 
                </div>
                <div class="header-top-right">
                    <ul>
                        <li class="dropdown"><a href="" title="Efetuar Pré-Reserva" class="dropdown-toggle">Efetuar Pré-Reserva</a></li>                    
                    </ul>
                </div>
            </div>
            <!-- END/HEADER-TOP -->
        </div>
        <!-- MENU-HEADER -->
        <div class="menu-header">
            <nav class="navbar navbar-fixed-top">
                <div class="container container-topo">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar "></span>
                            <span class="icon-bar "></span>
                            <span class="icon-bar "></span>
                        </button>
                        
                        <a class="navbar-brand" href="{{route('web.home')}}" title="{{$configuracoes->nomedosite}}">
                            <img src="{{$configuracoes->getLogomarca()}}" alt="{{$configuracoes->nomedosite}}"/>
                        </a>
                    
                        
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            {{--
                                $readPaginasMenu = read('menu_topo',"WHERE status = '1' AND id_pai IS NULL ORDER BY nome ASC");
                                foreach($readPaginasMenu as $paginaMenu1);
                                if(!$paginaMenu1){
                                    echo '';
                                }else{
                                    foreach($readPaginasMenu as $paginaMenu): 
                                        //Verifica se abre na mesma janela ou não
                                        if($paginaMenu['target'] == '1'){
                                            $target = '_blank';
                                        }else{
                                            $target = '_self';
                                        }
                                        // Verifica se é link externo ou interno
                                        if($paginaMenu['link'] == ''){
                                            $link = $paginaMenu['url'];
                                        }elseif($paginaMenu['link'] != ''){
                                            $link = ''.BASE.'/'.$paginaMenu['link'].'';
                                        }
                                    // Consulta se é submenu //     
                                    $readPaginasSubMenu1 = read('menu_topo',"WHERE status = '1' AND id_pai = '$paginaMenu[id]'");
                                    foreach($readPaginasSubMenu1 as $submenu1);
                                    if($submenu1['id_pai'] == $paginaMenu['id']){
                                    echo '<li class="dropdown "><a target="'.$target.'" href="'.$link.'" class="dropdown-toggle" data-toggle="dropdown">'.$paginaMenu['nome'].'<b class="caret"></b></a>';
                                    echo '<ul class="dropdown-menu icon-fa-caret-up submenu-hover">';
                                    foreach($readPaginasSubMenu1 as $submenu):
                                            //Verifica se abre na mesma janela ou não
                                            if($submenu['target'] == '1'){
                                                $target1 = '_blank';
                                            }else{
                                                $target1 = '_self';
                                            }
                                        // Verifica se é link externo ou interno
                                            if($submenu['link'] == ''){
                                                $link1 = $submenu['url'];
                                            }elseif($submenu['link'] != ''){
                                                $link1 = ''.BASE.'/'.$submenu['link'].'';
                                            }
                                            echo '<li><a target="'.$target1.'" href="'.$link1.'">'.$submenu['nome'].'</a></li>';
                                    endforeach;
                                    echo '</ul>';
                                    echo '</li>'; 
                                    }else{
                                    echo '<li><a target="'.$target.'" href="'.$link.'">'.$paginaMenu['nome'].'</a></li>'; 
                                    }                                                                
                                    endforeach;
                                }                
                            --}}
                            
                            <li><a href="{{route('web.atendimento')}}" title="Atendimento">Atendimento</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- END / MENU-HEADER -->
    </header>
    <!-- END-HEADER -->

    <!-- INÍCIO DO CONTEÚDO DO SITE -->
    @yield('content')
    <!-- FIM DO CONTEÚDO DO SITE --> 
     
    <!-- LOAD JQUERY -->
    <script src="{{url('frontend/assets/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/vit-gallery.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.countTo.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.appear.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/bootstrap-select.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.littlelightbox.js')}}"></script>
    <script src="{{url('frontend/assets/js/bootstrap-datepicker.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDyCxHyc8z9gMA5IlipXpt0c33Ajzqix4"></script>
    <!-- Custom jQuery -->

    <script src="{{url('frontend/assets/js/sky.js')}}"></script>

    <script>
        $(function () {
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
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