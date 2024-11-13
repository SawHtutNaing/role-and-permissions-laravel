<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role Edit') }}
        </h2>
    </x-slot>
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-4">Edit Role</h1>

        <form action="{{ route('roles.update', $role->id) }}" method="POST" class="mb-5 p-4 bg-white shadow-md rounded">
            @csrf
            @method('PUT')
        
            <h2 class="text-xl font-semibold mb-3">Edit Role</h2>
            <div class="mb-4">
                <label for="role-name" class="block text-sm font-medium text-gray-700">Role Name</label>
                <input type="text" name="name" id="role-name" value="{{ old('name', $role->name) }}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
        
            
            <h2 class="text-xl font-semibold mb-3">Assign Permissions</h2>
            <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                
                @foreach ($features as $feature)
               
                    <div>
                        <h1>{{$feature->name}}</h1>
                @foreach ($feature->permissions as $permission)
                    <label class="block mt-8">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                        {{ $permission->name }}
                    </label>
                @endforeach
            </div>
                @endforeach

            </div>
        
            <button type="submit" class="bg-blue-500   text-white px-4 py-2 rounded hover:bg-blue-700">Save Changes</button>
        </form>
        
        <a href="{{ route('roles.index') }}" class="text-blue-600 hover:text-blue-800">Back to Roles List</a>
    </div>

</x-app-layout>
