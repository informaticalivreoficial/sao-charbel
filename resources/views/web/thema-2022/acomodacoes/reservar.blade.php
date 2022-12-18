@extends("web.{$configuracoes->template}.master.master")

@section('content')
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{url('frontend/'.$configuracoes->template.'/assets/images/header.jpg')}})">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-center">
                        <div class="breadcrumb-title">
                            <h2>Pré-Reserva</h2>    
                            <div class="breadcrumb-wrap">
                    
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('web.home')}}">Início</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pré-Reserva</li>
                            </ol>
                        </nav>
                    </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </section>

    <section id="contact" class="contact-area after-none contact-bg pt-30 pb-120 p-relative fix">
        <div class="container">     
            <div class="row justify-content-center align-items-center">                
                 <div class="col-lg-4 order-2">                     
                    <div class="contact-info">
                        <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                            {!! $paginareserva->content !!}
                        </div>
                    </div>							
                </div>
                <div class="col-lg-8 order-1">                                                                        
                    <form action="" method="post" class="contact-form j_formsubmit" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div id="js-contact-result"></div>
                                <!-- HONEYPOT -->
                                <input type="hidden" class="noclear" name="bairro" value="" />
                                <input type="text" class="noclear" style="display: none;" name="cidade1" value="" />
                            </div>
                        </div>
                        <div class="row form_hide">
                            <h3 class="mb-3">Tipo de Hospedagem</h3>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="radio" class="check_fisica" style="width:30px;" name="tipo_reserva" value="0" checked /><span style="color: #232323;" class="check_fisica">Pessoa Física</span>
                                </div>
                            </div>  
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="radio" class="check_empresa" style="width:30px;" name="tipo_reserva" value="1" /><span style="color: #232323;" class="check_empresa">Empresa</span>
                                </div>
                            </div>                                                  
                        </div>    

                        <div class="row div_empresa form_hide">
                            <h3 class="mt-3 mb-3">Dados da Empresa</h3>                            
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="contact-field mb-20 text-muted">
                                    <label>Nome da Empresa </span>*</label></label>
                                    <input type="text" name="empresa_nome"/>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <div class="contact-field mb-20">
                                    <label>CNPJ <span>*</span></label>
                                    <input type="text" name="cnpj" class="cnpjmask"/>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <div class="contact-field mb-20">
                                    <label>Telefone <span>*</span></label>
                                    <input type="text" name="telefone_empresa" class="celularmask"/>
                                </div>
                            </div> 
                        </div>
                            
                        <div class="row form_hide">
                            <h3 class="mt-3 mb-3">Dados Pessoais</h3>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="contact-field mb-20">
                                    <label>Nome <span>*</span></label>
                                    <input type="text" name="nome" class=""/>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <div class="contact-field mb-20">
                                    <label>CPF <span>*</span></label>
                                    <input type="text" name="cpf" class="cpfmask"/>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <div class="contact-field mb-20">
                                    <label>RG <span>*</span></label>
                                    <input type="text" name="rg" class="rgmask"/>
                                </div>
                            </div>
                        </div>

                        <div class="row form_hide">
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <div class="contact-field mb-20">
                                    <label>Data de Nasc.<span>*</span></label>
                                    <input type="text" name="nasc" id="nasc" class="nascmask"/>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <div class="contact-field mb-20">
                                    <label>Estado</label>
                                    <select name="uf" id="state-dd">
                                        @if(!empty($estados))
                                            <option value="">Selecione</option>
                                            @foreach($estados as $estado)
                                                <option value="{{$estado->estado_id}}">{{$estado->estado_nome}}</option>
                                            @endforeach                                                                        
                                        @endif                                
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-9 col-sm-4 col-md-4 col-lg-4">
                                <div class="contact-field mb-20">
                                    <label>Cidade</label>
                                    <select id="city-dd" class="selectReservas" name="cidade">
                                        <option value="">Selecione o Estado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
                                <div class="contact-field mb-20">
                                    <label>CEP </label>
                                    <input type="text" name="cep" id="cep" class="cepmask"/>
                                </div>
                            </div>
                        </div>

                        <div class="row form_hide">                        
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="contact-field mb-20">
                                    <label>Rua </label>
                                    <input type="text" name="rua"/>
                                </div>
                            </div>
                            <div class="col-xs-9 col-sm-4 col-md-4 col-lg-4">
                                <div class="contact-field mb-20">
                                    <label>Bairro </label>
                                    <input type="text" name="bairro"/>
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
                                <div class="contact-field mb-20">
                                    <label>Número</label>
                                    <input type="text" name="num"/>
                                </div>
                            </div>                            
                        </div>

                        <div class="row form_hide">
                            <h3 class="mt-3 mb-3">Regime de ocupação</h3>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="radio" style="width:30px;" name="ocupacao" value="1" checked />Com Café da manhã
                                </div>
                            </div>
                            
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="radio" style="width:30px;" name="ocupacao" value="0" />Sem Café da manhã
                                </div>
                            </div>                                                    
                        </div>
                        
                        <div class="row form_hide">
                            <h3 class="mt-3 mb-3">Informações de Contato</h3>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="contact-field mb-20">
                                    <label>E-mail <span>*</span></label>
                                    <input type="text" name="email"/>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                                <div class="contact-field mb-20">
                                    <label>Telefone Móvel<span>*</span></label>
                                    <input type="text" name="telefone_cliente" class="celularmask"/>
                                </div>
                            </div>                        
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                                <div class="contact-field mb-20">
                                    <label>WhatsApp </label>
                                    <input type="text" name="whatsapp" class="celularmask"/>
                                </div>
                            </div>                            
                        </div>

                        <div class="row form_hide">
                            <h3 class="mt-3 mb-3">Informações da Pré-reserva</h3>
                            <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                                <div class="contact-field mb-20">
                                    <label>Adultos<span>*</span></label>
                                    <select name="num_adultos" class="selectReservas">
                                        @for($i = 1; $i <= 5; $i++)
                                            <option value="{{$i}}" {{(!empty($dadosForm['adultos']) && $i == $dadosForm['adultos'] ? 'selected' : ($i == 1 ? 'selected' : ''))}}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                <div class="contact-field mb-20">
                                    <label>Crianças de 0 a 5 anos<span>*</span></label>
                                    <select name="num_cri_0_5" class="selectReservas">
                                        @for($i = 0; $i <= 5; $i++)
                                            <option value="{{$i}}" {{(!empty($dadosForm['cri_0_5']) && $i == $dadosForm['cri_0_5'] ? 'selected' : ($i == 0 ? 'selected' : ''))}}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="contact-field mb-20">
                                    <label>Apartamento<span>*</span></label>
                                    <select name="apart_id" class="selectReservas">
                                        @if(!empty($acomodacoes) && $acomodacoes->count() > 0)
                                            <option value="">Selecione</option>
                                            @foreach($acomodacoes as $apartamento)
                                                <option value="{{$apartamento->id}}" {{(!empty($dadosForm) && $dadosForm['apart_id'] == $apartamento->id ? 'selected' : '')}}>{{$apartamento->titulo}}</option>
                                            @endforeach                                                                        
                                        @endif                            
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form_hide">
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-4">
                                <div class="contact-field mb-20">
                                    <label>Check In <span>*</span></label>
                                    <input type="date" id="chackin" name="checkin" value="{{(!empty($dadosForm['checkini']) ? $dadosForm['checkini'] : '')}}" />
                                </div>
                            </div>
                            
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-4">
                                <div class="contact-field mb-20">
                                    <label>Check Out <span>*</span></label>
                                    <input type="date" id="chackout" name="checkout" value="{{(!empty($dadosForm['checkouti']) ? $dadosForm['checkouti'] : '')}}" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="contact-field mb-20">
                                    <label style="margin-bottom:3px;"><a href="javascript:;" onclick="jQuery('#modal-3').modal('show');">Política de Reservas e Hotel</a></label>
                                    <button type="submit" id="js-contact-btn" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">Enviar Agora</button>                                    
                                </div>
                            </div>                            
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade custom-width" id="modal-3" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{$politicareserva->titulo}}</h4>
                    </div> 
                    <div class="modal-body">
                        {!! $politicareserva->content !!}
                    </div>		
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .contact-field select {
            height: calc(3em + 0.75rem + 2px) !important;
        }
        .contact-field label {            
            margin-bottom: 5px !important;
        }
        .contact-field label {
            margin-bottom: 5px !important;
        }
    </style>
@endsection

@section('js')
<script src="{{url(asset('backend/assets/js/jquery.mask.js'))}}"></script>
<script>
    $(document).ready(function () { 
        var $cepmask = $(".cepmask");
        $cepmask.mask('99999-999', {reverse: false});
        var $rgmask = $(".rgmask");
        $rgmask.mask('99.999.999-9', {reverse: false});
        var $cpfmask = $(".cpfmask");
        $cpfmask.mask('999.999.999-99', {reverse: false});
        var $cnpjmask = $(".cnpjmask");
        $cnpjmask.mask('99.999.999/9999-99', {reverse: false});
        var $nascmask = $(".nascmask");
        $nascmask.mask('99/99/9999', {reverse: false});
        var $celularmask = $(".celularmask");
        $celularmask.mask('(99) 99999-9999', {reverse: false});
    });

    $(function(){

        // $('.datepicker-here').datepicker({
        //     autoClose: true,         
        //     minDate: new Date()
        // });

        $('.div_empresa').css("display", "none");

        $('.check_empresa').click(function() {                       
            $('.div_empresa').css("display", "flex");         
            $( ".check_empresa" ).prop( "checked", true );         
            $( ".check_fisica" ).prop( "checked", false );         
        });

        $('.check_fisica').click(function() {                       
            $('.div_empresa').css("display", "none");
            $( ".check_empresa" ).prop( "checked", false );         
            $( ".check_fisica" ).prop( "checked", true );        
        });


        $("#city-dd").attr("disabled", true);
        $('#state-dd').on('change', function () {
            var idState = this.value;
            $("#city-dd").html('');
            $.ajax({
                url: "{{route('web.fetchCity')}}",
                type: "POST",
                data: {
                    estado_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $("#city-dd").attr("disabled", false);
                    $('#city-dd').html('<option value="">Selecione a cidade</option>');
                    $.each(res.cidades, function (key, value) {
                        $("#city-dd").append('<option value="' + value
                            .cidade_id + '">' + value.cidade_nome + '</option>');
                    });
                }
            });            
        });
             
    });

    $(function(){

        $('.j_formsubmit').submit(function (){
            var form = $(this);
            var dataString = $(form).serialize();

            $.ajax({
                url: "{{ route('web.acomodacaoSend') }}",
                data: dataString,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function(){
                    form.find("#js-contact-btn").attr("disabled", true);
                    form.find('#js-contact-btn').html("Carregando...");                
                    form.find('.alert').fadeOut(500, function(){
                        $(this).remove();
                    });
                },
                success: function(resposta){
                    $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-130}, 'slow');
                    if(resposta.error){
                        form.find('#js-contact-result').html('<div class="alert alert-danger error-msg">'+ resposta.error +'</div>');
                        form.find('.error-msg').fadeIn();                    
                    }else{
                        form.find('#js-contact-result').html('<div class="alert alert-success error-msg">'+ resposta.sucess +'</div>');
                        form.find('.error-msg').fadeIn(); 
                        form.find('input[class!="noclear"]').val('');
                        form.find('textarea[class!="noclear"]').val('');
                        form.find('.form_hide').fadeOut(500); 
                        $('.contact-info').fadeOut(500);
                    }
                },
                complete: function(resposta){
                    form.find("#js-contact-btn").attr("disabled", false);
                    form.find('#js-contact-btn').html('Enviar Agora');                                
                }

            });

            return false;
        });
        
    });
    
</script>     
@endsection