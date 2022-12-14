@extends('adminlte::page')

@section('title', 'Editar Lista')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><i class="fas fa-search mr-2"></i>Editar Lista</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel de Controle</a></li>
            <li class="breadcrumb-item"><a href="{{route('listas.whatsapp')}}">Listas de Números</a></li>
            <li class="breadcrumb-item active">Editar Lista</li>
        </ol>
    </div>
</div> 
@stop

@section('content')
<div class="row">
    <div class="col-12">
       @if($errors->all())
            @foreach($errors->all() as $error)
                @message(['color' => 'danger'])
                {{ $error }}
                @endmessage
            @endforeach
        @endif 
        
        @if(session()->exists('message'))
             @message(['color' => session()->get('color')])
             {{ session()->get('message') }}
             @endmessage
         @endif
    </div>            
</div>   
                    
            
<form action="{{ route('lista.whatsapp.update', [ 'id' => $lista->id ]) }}" method="post" autocomplete="off">
@csrf    
@method('PUT')       
<div class="row">            
    <div class="col-12">
        <div class="card card-teal card-outline"> 
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                       <div class="row">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-6">   
                                <div class="form-group">
                                    <label class="labelforms text-muted"><b>*Título</b></label>
                                    <input type="text" class="form-control" name="titulo" value="{{ old('titulo') ?? $lista->titulo }}">
                                </div>                                                    
                            </div>
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label class="labelforms text-muted"><b>Status:</b></label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ (old('status') == '1' ? 'selected' : ($lista->status == 1 ? 'selected' : '')) }}>Ativa</option>
                                        <option value="0" {{ (old('status') == '0' ? 'selected' : ($lista->status == 0 ? 'selected' : '')) }}>Inativa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3"> 
                                <div class="form-group">
                                    <label class="labelforms" style="color:#fff;"><b>Atualizar Lista</b></label>
                                    <button type="submit" class="btn btn-block btn-lg btn-success" title="Atualizar Lista"><i class="nav-icon fas fa-check mr-2"></i> Atualizar Lista</button>
                                </div>
                            </div>
                       </div>
                       
                        <div class="row">                 
                            <div class="col-12">   
                                <label class="labelforms text-muted"><b>Descrição da Lista:</b></label>
                                <textarea id="inputDescription" class="form-control" rows="5" name="content">{{ old('content') ?? $lista->content }}</textarea>                                                       
                            </div>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>                   
</form> 
@stop

@section('footer')
    <strong>Copyright &copy; {{env('DESENVOLVEDOR_INICIO')}} <a href="{{env('DESENVOLVEDOR_URL')}}">{{env('DESENVOLVEDOR')}}</a>.</strong> Desenvolvido por <a href="https://informaticalivre.com.br">Informática Livre</a>.
@endsection

@section('js')
    <script>
        $(function () {         
            
            // Visualizar senha no input
            var senha = $('#senha');
            var olho= $("#olho");
            olho.mousedown(function() {
                senha.attr("type", "text");
            });
            olho.mouseup(function() {
                senha.attr("type", "password");
            });         
        
        });
    </script>
@stop