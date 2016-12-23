@extends('app')

@section('content')

<h2><i class="fa fa-instagram"></i> API Instagram com Laravel 5.3</h2>

<form method="GET" role="form">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Entre com o nome do usuário desejado" value="{{ old('username') }}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <button class="btn btn-primary"><i class="fa fa-search"></i> Pesquisar</button>
            </div>
        </div>
    </div>
</form>
<div class="panel panel-primary">
    <div class="panel-heading">Feeds</div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
                <th>ID</th>
                <th>Código</th>
                <th>Imagems</th>
                <th>Local</th>
                <th>Qtd Likes</th>
                <th>Qtd Comentários</th>
            </thead>
            <tbody>
                @if(!empty($items))
                    @foreach($items as $key => $item)
					   <tr>
					        <td>{{ $item['id'] }}</td>
					        <td>{{ $item['code'] }}</td>
					        <td><img src="{{ $item['images']['standard_resolution']['url'] }}" style="width:100px;"></td>
					        <td>{{ isset($item['location']['name']) ? $item['location']['name'] : '' }}</td>
					        <td>{{ $item['likes']['count'] }}</td>
					        <td>{{ $item['comments']['count'] }}</td>
					   </tr>
					  @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="6">Dados não encontrados ou não há feeds recentes do usuário</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop