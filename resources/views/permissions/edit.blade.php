<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <body class="bg-gray-100">
        <div class="container mx-auto mt-10">
            <h1 class="text-3xl font-bold mb-4">Edit Permission</h1>

            <!-- Edit Permission Form -->
            <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="mb-5 p-4 bg-white shadow-md rounded">
                @csrf
                @method('PUT') <!-- Using PUT method for updating -->

                <h2 class="text-xl font-semibold mb-3">Edit Permission</h2>

                <!-- Permission Name Input -->
                <div class="mb-4">
                    <label for="permission-name" class="block text-sm font-medium text-gray-700">Permission Name</label>
                    <input type="text" name="name" id="permission-name" value="{{ $permission->name }}" 
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <!-- Assign to Feature Dropdown -->
                <div class="mb-4">
                    <label for="feature" class="block text-sm font-medium text-gray-700">Assign to Feature</label>
                    <select name="feature_id" id="feature" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach ($features as $feature)
                            <option value="{{ $feature->id }}" {{ $permission->feature_id == $feature->id ? 'selected' : '' }}>
                                {{ $feature->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Save Changes Button -->
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Save Changes</button>
            </form>

            <!-- Back to Permissions List -->
            <a href="{{ route('permissions.index') }}" class="text-blue-600 hover:text-blue-800">Back to Permissions List</a>

        </div>
    </body>
</x-app-layout>
