@extends('/layout/layout')

@section('conteudo')
<div class="container-fluid">
    <h1>Postos de trabalho</h1>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#adicionarModal">Adicionar</button>
    <table class="table  table-hover">
        <thead class=" bg-light">
            <tr>
                <td>Nome</td>
                <td>Tipo</td>
                <td>Descrição</td>
            </tr>
        </thead>
        @if(!empty($postos))
        @foreach ($postos as $posto)
        <tbody>
            <tr>
                <td>{{ $posto->nome }} </td>
                <td>{{ $posto->tipo }} </td>
                <td>{{ $posto->descricao }} </td>
            </tr>
        </tbody>
        @endforeach
        @endif
    </table>
    @if(empty($postos))
    <div class="col-md-12" align="center">
            <span class="text-danger"><b>Nenhum registro encontrado.</b></span>
        </div>
        @endif
</div>

<div class="pull-right">
    {!! $postos->links() !!}
</div>
<!-- Modal -->
<div id="adicionarModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cadastrar posto de trabalho</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="/postos/" method="post" class="form-horizontal">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nome</span>
                        </div>
                        <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome do funcionario">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tipo</span>
                        </div>
                        <input type="text" class="form-control" id="tipo" name="tipo" required placeholder="Tipo">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Descrição</span>
                        </div>
                        <input type="text" class="form-control" id="descricao" name="descricao" required placeholder="Descrição">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-left" id="cadastrar">Cadastrar</button>
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
