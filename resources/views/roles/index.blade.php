

<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Role') }}
    </h2>
</x-slot>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-4">Roles Management</h1>

        <!-- Add Role Form -->
        <form  action="{{route('roles.store')}}" method="POST" class="mb-5 p-4 bg-white shadow-md rounded">
            @csrf
            <h2 class="text-xl font-semibold mb-3">Add Role</h2>
            <div class="mb-4">
                <label for="role-name" class="block text-sm font-medium text-gray-700">Role Name</label>
                <input type="text" name="name" id="role-name"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add Role</button>
        </form>

        <!-- Roles List -->
        <h2 class="text-xl font-semibold mb-3">Existing Roles</h2>
        <ul class="bg-white shadow-md rounded p-4">
            @foreach ($roles as $role)
            <li class="flex justify-between items-center mb-2 p-2 bg-gray-50 rounded hover:bg-gray-100">
                <span>{{ $role->name }}</span>
                <div>
                    <a href="{{ route('roles.edit', $role->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a> |
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?');" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                    </form>                   
                </div>
            </li>
        @endforeach
        
        </ul>

    </div>

</body>
</x-app-layout>
