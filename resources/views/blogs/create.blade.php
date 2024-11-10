<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Blog') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-4">Create New Blog</h1>

        <form action="{{ route('blogs.store') }}" method="POST" class="mb-5 p-4 bg-white shadow-md rounded">
            @csrf <!-- CSRF protection token -->

            <!-- Title Field -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" 
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md" required>
            </div>

            <!-- Content Field -->
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" 
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md" rows="5" required>{{ old('content') }}</textarea>
            </div>

            <!-- Author Field -->
            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                <input type="hidden" name="user_id" id="author" value="{{auth()->id()}}" 
                
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save Blog
            </button>
        </form>

        <a href="{{ route('blogs.index') }}" class="text-blue-600 hover:text-blue-800">Back to Blogs</a>
    </div>
</x-app-layout>
