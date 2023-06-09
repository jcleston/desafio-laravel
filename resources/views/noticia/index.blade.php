<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notícias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-sucess-status class="mb-4" :status="session('message')" />

            <form action="/noticias" method="GET">
                <x-input-label for="search" value="Pesquisar" />
                <x-text-input id="search" class="block mt-1 w-full" type="text" name="search" value="" autofocus />
                </br>
                <x-primary-button>Pesquisar</x-primary-button>
            </form>
            </br>

            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($noticias as $noticia)
                        <tr>
                            <td>{{ $noticia->id }}</td>
                            <td>{{ $noticia->titulo }}</td>
                            <td>{{ $noticia->descricao }}</td>
                            <td>
                                <a href="{{ url('/editar-noticia/'.$noticia->id) }}" class="btn btn-primary">Editar</a>
                            </td>
                            <td>
                                <form action="{{ url('deletar-noticia/'.$noticia->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <x-primary-button class="btn btn-danger">Deletar</x-primary-button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">Sem registros</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</x-app-layout>