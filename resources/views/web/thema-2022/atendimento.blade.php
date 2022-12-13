@extends("web.{$configuracoes->template}.master.master")

@section('content')

 <section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{url('frontend/'.$configuracoes->template.'/assets/images/header.jpg')}})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-center">
                    <div class="breadcrumb-title">
                        <h2>Atendimento</h2>    
                        <div class="breadcrumb-wrap">
                  
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.home')}}">Início</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Atendimento</li>
                        </ol>
                    </nav>
                </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>

<section id="contact" class="contact-area after-none contact-bg pt-120 pb-120 p-relative fix">
    <div class="container"> 
        <div class="row justify-content-center align-items-center">            
            <div class="col-lg-4 order-1">                 
                <div class="contact-info">
                    <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                        <div class="f-cta-icon">
                            <i class="far fa-map"></i>
                        </div>
                        <h5>Endereço</h5>
                        @if($configuracoes->rua)	
                            <p>{{$configuracoes->rua}} 
                            @if($configuracoes->num)
                                , {{$configuracoes->num}}
                            @endif
                            @if($configuracoes->bairro)
                                <br> {{$configuracoes->bairro}}
                            @endif
                            @if($configuracoes->cidade)  
                                - {{\App\Helpers\Cidade::getCidadeNome($configuracoes->cidade, 'cidades')}}
                            @endif
                            </p>
                        @endif
                        
                    </div> 
                    @if ($configuracoes->email)                                
                        <div class="single-cta wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                            <div class="f-cta-icon">
                                <i class="far fa-envelope-open"></i>
                            </div>
                            <h5>Atendimento</h5>
                            <p> <a href="mailto:{{$configuracoes->email}}">{{$configuracoes->email}}</a>
                                @if ($configuracoes->email1)
                                <br><a href="mailto:{{$configuracoes->email1}}">{{$configuracoes->email1}}</a>
                                @endif
                            </p>
                        </div>                                                
                    @endif  
                </div>							
            </div>
            <div class="col-lg-8 order-2">
                <div class="contact-bg02">
                    <form action="" method="post" class="contact-form j_formsubmit" autocomplete="off">
                        @csrf 
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="js-contact-result"></div>
                            </div>
                            <div class="col-lg-6 col-md-6 form_hide">
                                <div class="contact-field p-relative c-name mb-20">      
                                    <!-- HONEYPOT -->
                                    <input type="hidden" class="noclear" name="bairro" value="" />
                                    <input type="text" class="noclear" style="display: none;" name="cidade" value="" />                              
                                    <input type="text" id="firstn" name="nome" placeholder="Nome">
                                </div>                               
                            </div>

                            <div class="col-lg-6 col-md-6 form_hide">                               
                                <div class="contact-field p-relative c-subject mb-20">                                   
                                    <input type="text" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                        
                            <div class="col-lg-12 form_hide">
                                <div class="contact-field p-relative c-message mb-30">                                  
                                    <textarea name="message" id="mensagem" cols="30" rows="10" placeholder="Mensagem"></textarea>
                                </div>
                                <div class="slider-btn">                                          
                                    <button class="btn ss-btn btncheckout" data-animation="fadeInRight" data-delay=".8s"><span>Enviar Agora</span></button>				
                                </div>                             
                            </div>
                        </div>
                    </form>                            
                </div> 
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->

@endsection

@section('js')
<script>
    $(function () {

        // Seletor, Evento/efeitos, CallBack, Ação
        $('.j_formsubmit').submit(function (){
            var form = $(this);
            var dataString = $(form).serialize();

            $.ajax({
                url: "{{ route('web.sendEmail') }}",
                data: dataString,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function(){
                    form.find(".btncheckout").attr("disabled", true);
                    form.find('.btncheckout').html("Carregando...");                
                    form.find('.alert').fadeOut(500, function(){
                        $(this).remove();
                    });
                },
                success: function(resposta){
                    $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-100}, 'slow');
                    if(resposta.error){
                        form.find('#js-contact-result').html('<div class="alert alert-danger error-msg">'+ resposta.error +'</div>');
                        form.find('.error-msg').fadeIn();                    
                    }else{
                        form.find('#js-contact-result').html('<div class="alert alert-success error-msg">'+ resposta.sucess +'</div>');
                        form.find('.error-msg').fadeIn();                    
                        form.find('input[class!="noclear"]').val('');
                        form.find('textarea[class!="noclear"]').val('');
                        form.find('.form_hide').fadeOut(500);
                    }
                },
                complete: function(resposta){
                    form.find(".btncheckout").attr("disabled", false);
                    form.find('.btncheckout').html("Enviar Agora");                                
                }
            });

            return false;
        });

    });
</script>   
@endsection