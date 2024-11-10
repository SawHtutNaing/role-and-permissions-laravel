<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-4">Permissions Management</h1>

        <!-- Add Permission Form -->
        <form action="{{route('permissions.store')}}" method="POST" class="mb-5 p-4 bg-white shadow-md rounded">
            @csrf
            <h2 class="text-xl font-semibold mb-3">Add Permission</h2>
            <div class="mb-4">
                <label for="permission-name" class="block text-sm font-medium text-gray-700">Permission Name</label>
                <input type="text" name="name" id="permission-name"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>

            <div class="mb-4">
                <label for="feature" class="block text-sm font-medium text-gray-700">Assign to Feature</label>
                <select name="feature_id" id="feature"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <?php foreach ($features as $feature): ?>
                    <option value="<?= $feature->id ?>"><?= $feature->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add
                Permission</button>
        </form>

        <h2 class="text-xl font-semibold mb-3">Existing Permissions</h2>
        <table class="min-w-full bg-white shadow-md rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2">Permission Name</th>
                    <th class="px-4 py-2">Feature Name</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr class="bg-gray-50 hover:bg-gray-100">
                    <td class="px-4 py-2 text-center">{{ $permission->name }}</td>
                    <td class="px-4 py-2 text-center">{{ $permission->feature->name }}</td>
                    <td class="px-4 py-2 text-center flex justify-between items-center">
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a> |
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800"
                                onclick="return confirm('Are you sure you want to delete this permission?');">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</body>

</x-app-layout>
