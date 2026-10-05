<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a puzzle') }}
        </h2>
    </x-slot>

    <x-puzzles-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('puzzles.store') }}" method="post">
            @csrf

            <!-- Nom -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Category -->
            <div class="mt-4">
                <x-input-label for="category" :value="__('Category')" />

                <x-text-input
                    id="category"
                    class="block mt-1 w-full"
                    type="text"
                    name="category"
                    :value="old('category')"
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
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    name="description"
                    required
                >{{ old('description') }}</textarea>

                <x-input-error
                    :messages="$errors->get('description')"
                    class="mt-2"
                />
            </div>

            <!-- Image -->
            <div class="mt-4">
                <x-input-label for="image" :value="__('Image')" />

                <x-text-input
                    id="image"
                    class="block mt-1 w-full"
                    type="text"
                    name="image"
                    :value="old('image')"
                    required
                />

                <x-input-error
                    :messages="$errors->get('image')"
                    class="mt-2"
                />
            </div>

            <!-- Price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Price')" />

                <x-text-input
                    id="price"
                    class="block mt-1 w-full"
                    type="number"
                    name="price"
                    :value="old('price')"
                    step="0.01"
                    required
                />

                <x-input-error
                    :messages="$errors->get('price')"
                    class="mt-2"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Send') }}
                </x-primary-button>
            </div>
        </form>
</x-puzzles-card>

</x-app-layout>