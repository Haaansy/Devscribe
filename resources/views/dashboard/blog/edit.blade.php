<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>DevScribe - Edit {{ $blog->title }}</title>
</head>

<body class="bg-slate-900">
    <nav class="bg-slate-800 w-full sticky top-0 z-50">
        <div class="container mx-auto">
            <div class="flex items-center justify-between py-4">
                <a href="/" class="text-white text-2xl font-mono">&lt;DevScribe /&gt;</a>
                <div class="text-white flex items-center">
                    <p> Welcome, {{ Auth::user()->username }}!</p>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="text-white ml-4 border-2 border-red-400 px-2 py-2 w-20 rounded-lg bg-red-400 inline-block">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mx-auto py-8 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-white">Edit Blog</h1>
            <a href="{{ route('dashboard') }}" class="bg-slate-700 text-white px-4 py-2 rounded-lg">Back to
                Dashboard</a>
        </div>

        <div class="bg-slate-800 p-6 rounded-lg shadow-lg">
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('update.blog', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="title" class="block text-gray-300 mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}"
                        class="w-full bg-slate-700 text-white border border-slate-600 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-300 mb-2">Category <span
                            class="text-red-500">*</span></label>
                    <div class="relative">
                        <select name="category_id" id="category" required
                            class="appearance-none w-full bg-slate-700 text-white border border-slate-600 rounded-lg p-2 pr-8 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-300 mb-2">Blog Image</label>
                    <div
                        class="relative border-2 border-dashed border-slate-600 rounded-lg p-4 hover:border-blue-500 transition-colors">
                        @if($blog->image_path)
                            <div class="mb-4">
                                <p class="text-gray-300 mb-2">Current Image:</p>
                                <img src="{{ asset($blog->image_path) }}" alt="{{ $blog->title }}" class="max-h-40">
                            </div>
                        @endif

                        <input type="file" name="image" id="image" accept="image/*"
                            class="w-full bg-slate-700 text-white p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            onchange="previewImage(this)">
                        <p class="text-gray-400 text-sm mt-2">Supported formats: JPG, PNG, GIF (Max 2MB)</p>

                        @error('image')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror

                        <div id="image-preview" class="hidden mt-3">
                            <p class="text-gray-300 mb-2">New Image Preview:</p>
                            <img id="preview" src="#" alt="Image Preview" class="max-h-40 rounded">
                            <button type="button" onclick="removeImage()"
                                class="bg-red-500 text-white px-2 py-1 rounded text-sm mt-2">
                                Remove
                            </button>
                        </div>

                        @if($blog->image)
                            <div class="mt-3">
                                <label class="inline-flex items-center text-gray-300">
                                    <input type="checkbox" name="remove_image" id="remove_image" value="1"
                                        class="form-checkbox bg-slate-700 border-slate-600">
                                    <span class="ml-2">Remove current image</span>
                                </label>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-gray-300 mb-2">Content</label>
                    <textarea name="content" id="content" rows="10"
                        class="w-full bg-slate-700 text-white border border-slate-600 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 whitespace-pre-wrap"
                        style="white-space: pre-wrap;" placeholder="Start writing your blog post here...

You can use line breaks for paragraphs.

- Use hyphens for bullet points
* Or asterisks work too

Format your content as you want it to appear on the blog.">{{ old('content', $blog->content) }}</textarea>
                    <p class="text-gray-400 text-sm mt-2">Formatting tip: Line breaks and spacing will be preserved
                        exactly as entered.</p>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                        Update Blog
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const previewDiv = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                previewDiv.classList.remove('hidden');

                // If checkbox exists, check it when a new image is selected
                const removeCheckbox = document.getElementById('remove_image');
                if (removeCheckbox) {
                    removeCheckbox.checked = false;
                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage() {
        document.getElementById('image').value = '';
        document.getElementById('image-preview').classList.add('hidden');

        // If checkbox exists, check it
        const removeCheckbox = document.getElementById('remove_image');
        if (removeCheckbox) {
            removeCheckbox.checked = true;
        }
    }
</script>

</html>