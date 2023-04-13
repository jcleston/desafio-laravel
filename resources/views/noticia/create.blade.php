<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Notícia') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <x-sucess-status class="mb-4" :status="session('message')" />
        <x-validation-errors class="mb-4" :errors="$errors" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
            <form action="{{url('cadastrar-noticia')}}" method="POST">
                @csrf

                <div>
                    <x-input-label for="titulo" :value="__('Título')" />
                    <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" required autofocus />
                </div>

                <div>
                    <x-input-label for="descricao" :value="__('Descrição')" />
                    <x-text-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" :value="old('descricao')" required autofocus />
                </div>

                <x-primary-button class="ml-3">{{ __('Cadastrar') }}</x-primary-button>

            </form>

            </div>
        </div>
    </div>
</x-app-layout>