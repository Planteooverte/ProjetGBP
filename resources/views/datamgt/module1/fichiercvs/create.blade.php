<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vos fichiers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="">Dépôt</div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <section>
                        <header>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Dépôt d\'opération bancaire') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __("Ajouter un fichier") }}
                                </p>
                            </header>
                        </header>
                        <form action="{{route('FichierCsvs.upload')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div>
                                <x-text-input id="file" name="file" type="file" class="mt-1 block w-full"/>
                                <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" value="{{ $userid }}"/>
                            </div>
                            <x-primary-button class="mt-1 block">{{ __('Déposer') }}</x-primary-button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
