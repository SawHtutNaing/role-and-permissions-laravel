@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Role and Permission Management</h1>

    <form action="{{ route('role_permission.assign') }}" method="POST" class="mb-6">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Select Role:</label>
                <select name="role_id" id="role" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="permissions" class="block text-sm font-medium text-gray-700">Assign Permissions:</label>
                <select name="permission_ids[]" id="permissions" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" multiple>
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }} ({{ $permission->feature->name }})</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md">Assign</button>
    </form>

    <h2 class="text-xl font-semibold">Current Role Permissions:</h2>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permissions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr class="bg-white">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $role->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @foreach ($role->permissions as $permission)
                            {{ $permission->permission->name }} ({{ $permission->permission->feature->name }})<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
