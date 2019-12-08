@extends('/layout/layout')

@section('conteudo')
<div class="container-fluid">
    <h1>Funcionários</h1>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#adicionarModal">Adicionar</button>
    <table class="table  table-hover">
        <thead class=" bg-light">
            <tr>
                <td>Nome</td>
                <td>Data de nascimento</td>
                <td>Cidade</td>
                <td>Pais</td>
                <td>Telefone</td>
            </tr>
        </thead>
        @if(!empty($funcionarios))
        @foreach ($funcionarios as $funcionario)
        <tbody>
            <tr>
                <td>{{ $funcionario->nome }} </td>
                <td>{{ $funcionario->data_de_nascimento }} </td>
                <td>{{ $funcionario->cidade }} </td>
                <td>{{ $funcionario->pais }} </td>
                <td>{{ $funcionario->telefone }} </td>
            </tr>
        </tbody>
        @endforeach
        @endif
    </table>
    @if(empty($funcionarios))
    <div class="col-md-12" align="center">
            <span class="text-danger"><b>Nenhum registro encontrado.</b></span>
        </div>
        @endif
</div>

<div class="pull-right">
    {!! $funcionarios->links() !!}
</div>
<!-- Modal -->
<div id="adicionarModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cadastrar funcionarios</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="/funcionarios/" method="post" class="form-horizontal">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nome</span>
                        </div>
                        <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome do posto de trabalho">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Data de nascimento</span>
                        </div>
                        <input type="date" class="form-control" id="data_de_nascimento" name="data_de_nascimento" required placeholder="Data de nascimento">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cidade</span>
                        </div>
                        <input type="text" class="form-control" id="cidade" name="cidade" required placeholder="Cidade">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">País</span>
                        </div>
                        <input type="text" class="form-control" id="pais" name="pais" required placeholder="País">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Telefone</span>
                        </div>
                        <input type="tel" class="form-control" id="telefone" name="telefone" required placeholder="Telefone">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Posto de trabalho</span>
                        </div>

                    <select class="form-control" required placeholder="Posto de trabalho" name="posto_id">
                    @if(!empty($postos))
                    <option selected disabled value="">Selecione</option>
                        @foreach ($postos as $posto)
                         <option value={{$posto->id}}>{{$posto->nome}}</option>
                         @endforeach
                         @endif
                        </select>
                    </div>


                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tempo máximo de habilitação</span>
                        </div>
                        <input type="date" class="form-control" id="data_expiracao" name="data_expiracao" required placeholder="Data de expiração para ficar no posto">
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
