<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>

    <body class="bg-gray-100">
        <div class="container mx-auto mt-10">
            <h1 class="text-3xl font-bold mb-4">Blogs</h1>
            @if(auth()->user()->hasPermissionTo('blog_create'))

            <a href="{{ route('blogs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Create New Blog
            </a>
            @endif

            <div class="mt-5 bg-white shadow-md rounded p-4">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Author</th>
                            <th class="px-4 py-2">Created At</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td class="border px-4 py-2">{{ $blog->title }}</td>
                                <td class="border px-4 py-2">{{ $blog->user->name }}</td>
                                <td class="border px-4 py-2">{{ $blog->created_at->format('M d, Y') }}</td>
                                <td class="border px-4 py-2">
                                   
            @if(auth()->user()->hasPermissionTo('blog_update'))
                                   
                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                    @endif 
                                    @if(auth()->user()->hasPermissionTo('blog_delete'))

                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                    </form>
                                    @endif 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</x-app-layout>
