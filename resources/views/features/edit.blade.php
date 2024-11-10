<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Features Edit') }}
        </h2>
    </x-slot>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-4">Edit Feature</h1>

        <form action="{{ route('features.update', $feature->id) }}" method="POST" class="mb-5 p-4 bg-white shadow-md rounded">
            @csrf
            @method('PUT')
            <h2 class="text-xl font-semibold mb-3">Edit Feature</h2>

            <div class="mb-4">
                <label for="feature-name" class="block text-sm font-medium text-gray-700">Feature Name</label>
                <input type="text" name="name" id="feature-name" value="<?= $feature->name ?>" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

       
       

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Save Changes</button>
        </form>

        <a href="/features" class="text-blue-600 hover:text-blue-800">Back to Features List</a>
    </div>
</body>

</x-app-layout>

