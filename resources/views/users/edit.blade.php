<section class="cadastro">
    <div class="container">
        <div class="row">
            <div class="col-6 align-self-center">
                <h1>Editar {{ $user->nome }}</h1>
            </div>
            <div class="col-6 align-self-center text-right">
                <a href="{{ route('listar_usuario') }}" class="btn btn-success">Listar Usuários</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('editar_usuario', ['id' => $user->id]) }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><strong>Dados Pessoais</strong></p>
                                    <div class="input-group mb-3">
                                        <input id="nome" type="text" class="form-control" name="nome"
                                            placeholder="Nome Completo" aria-label="Nome" value="{{ $user->nome }}"
                                            required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nascimento">Data de Nascimento</label>
                                        <input type="date" class="form-control" id="nascimento" name="nascimento"
                                            aria-label="Nascimento" value="{{ $user->nascimento }}" required>
                                    </div>
                                    <select name="sexo" class="form-control mb-3" required>
                                        <option selected disabled value="">Sexo</option>
                                        <option value="M" @if ($user->sexo == 'M')
                                            selected
                                            @endif>Masculino</option>
                                        <option value="F" @if ($user->sexo == 'F')
                                            selected
                                            @endif>Feminino</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <p><strong>Endereço </strong></p>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="CEP" aria-label="CEP"
                                            aria-describedby="basic-addon2" name="cep" onchange="buscarCep(this)"
                                            onkeypress="if(event.which < 48 || event.which > 57 ) if(event.which != 8) return false;"
                                            maxlength="8" value="{{ $user->cep }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                onclick="buscarCep(cep.value)">Buscar <img src="/images/Spinner-1s-200px.svg" alt="Carregando..." width="30" class="loading" style="display:none"/></button>
                                        </div>
                                    </div>
                                    <div class="endereco">
                                        
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="endereco"
                                                placeholder="Endereço" aria-label="Endereço"
                                                value="{{ $user->endereco }}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="numero" placeholder="Número"
                                                aria-label="Número" value="{{ $user->numero }}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="complemento"
                                                placeholder="Complemento" aria-label="Complemento"
                                                value="{{ $user->complemento }}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="bairro" placeholder="Bairro"
                                                aria-label="Bairro" value="{{ $user->bairro }}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="estado" placeholder="Estado"
                                                aria-label="Estado" value="{{ $user->estado }}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="cidade" placeholder="Cidade"
                                                aria-label="Cidade" value="{{ $user->cidade }}">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function buscarCep(cep) {
        jQuery(".loading").show();
        $.ajax({
            cache: false,
            url: "https://viacep.com.br/ws/" + cep.value + "/json/",
            dataType: "json",
            success: function(data) {
                console.log(data);
                jQuery("input[name='endereco']").val(data.logradouro);
                jQuery("input[name='numero']").focus();
                jQuery("input[name='complemento']").val(data.complemento);
                jQuery("input[name='bairro']").val(data.bairro);
                jQuery("input[name='estado']").val(data.uf);
                jQuery("input[name='cidade']").val(data.localidade);
                jQuery(".loading").hide();
            }
        });
    }

</script>
