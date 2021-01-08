<section class="clientes">
    <div class="container">
        <div class="row">
            <div class="col-6 align-self-center">
                <h1>Clientes</h1>
            </div>
            <div class="col-6 align-self-center text-right">
                <a href="{{ route('cadastrar_usuario') }}" class="btn btn-success">Adicionar</a>
            </div>
        </div>
        <div class="row">
            @if (request()->get('success'))
                <div class="col-lg-12">
                    <div class="alert alert-success text-center" role="alert">
                        Operação realizada com sucesso. 👍
                    </div>
                </div>
            @endif
            @forelse ($users as $user)
                <div class="col-lg-3">
                    <div class="card">
                        <img class="img-fluid" src="{{ asset('images/cap.png') }}" alt="Foto de perfil">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->nome }}</h5>
                            <p class="card-text">
                                @if ($user->sexo == 'M')
                                    <strong>Masculino</strong>
                                @else
                                    <strong>Feminino</strong>
                                @endif
                                <br />
                                Nasc.: {{ $user->nascimento }}
                            </p>
                            <a href="/users/edit/{{ $user->id }}" class="btn btn-primary">Editar</a>
                            <a href="/users/remove/{{ $user->id }}" class="btn btn-danger">Remover</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <div class="alert alert-primary text-center" role="alert">
                        Opa! Parece que não existe nenhum cliente cadastrado. 😥
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<script>
    setTimeout(function() {
        jQuery(".alert-success").hide('slow');
    }, 2000);
</script>
