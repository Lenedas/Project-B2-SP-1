<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editer un puzzle') }}
        </h2>
    </x-slot>

    <x-puzzles-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('puzzles.update', $puzzle->id) }}" method="post">
            @csrf
            @method('put')

            <!-- Nom -->
            <div>
                <x-input-label for="name" :value="__('Nom')" />

                <x-text-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="old('name', $puzzle->name)"
                    required
                    autofocus
                />

                <x-input-error
                    :messages="$errors->get('name')"
                    class="mt-2"
                />
            </div>

            <!-- Catégorie -->
            <div class="mt-4">
                <x-input-label for="category" :value="__('Catégorie')" />

                <x-text-input
                    id="category"
                    class="block mt-1 w-full"
                    type="text"
                    name="category"
                    :value="old('category', $puzzle->category)"
                    required
                />

                <x-input-error
                    :messages="$errors->get('category')"
                    class="mt-2"
                />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <textarea
                    id="description"
                    name="description"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    rows="5"
                    required
                >{{ old('description', $puzzle->description) }}</textarea>

                <x-input-error
                    :messages="$errors->get('description')"
                    class="mt-2"
                />
            </div>

            <!-- Prix -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Prix')" />

                <x-text-input
                    id="price"
                    class="block mt-1 w-full"
                    type="number"
                    name="price"
                    step="0.01"
                    min="0"
                    max="99.99"
                    :value="old('price', $puzzle->price)"
                    required
                />

                <x-input-error
                    :messages="$errors->get('price')"
                    class="mt-2"
                />
            </div>

            <!-- Bouton -->
            <div class="flex items-center justify-end mt-6">
                <x-primary-button>
                    {{ __('Modifier le puzzle') }}
                </x-primary-button>
            </div>
        </form>
    </x-puzzles-card>
</x-app-layout>
