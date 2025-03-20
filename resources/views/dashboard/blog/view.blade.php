<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>DevScribe - {{ $blog->title }}</title>
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
    <div>
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-3xl mx-auto text-center">
                <!-- Back button -->
                <div class="text-left mb-6">
                    <a href="{{ route('dashboard') }}" class="text-blue-400 hover:text-blue-300 inline-block">
                        &larr; Back to Dashboard
                    </a>
                </div>

                <!-- Blog header -->
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $blog->title }}</h1>

                <!-- Edit button for author -->
                @if(Auth::id() == $blog->author->id)
                    <div class="mb-4 flex justify-center space-x-4">
                        <a href="{{ Route('show.editBlog', $blog->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition">
                            Edit Post
                        </a>
                        <form action="{{ route('delete.blog', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition">
                                Delete Post
                            </button>
                        </form>
                    </div>
                @endif

                <div class="flex items-center justify-center text-white mb-4">
                    <span>{{ $blog->created_at->format('F j, Y') }}</span>
                    <span class="mx-2">•</span>
                    <span class="bg-slate-700 px-3 py-1 rounded-full">{{ $blog->category->name }}</span>
                    <span class="mx-2">•</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>{{ $blog->author->name ?? $blog->author->username ?? 'Unknown' }}</span>
                </div>

                <!-- Blog Image -->
                @if($blog->image_path)
                    <div class="mb-8">
                        <img src="{{ asset($blog->image_path) }}" alt="{{ $blog->title }}"
                            class="w-full h-full object-cover">
                    </div>
                @endif

                <!-- Blog content -->
                <div class="prose prose-lg prose-invert max-w-none text-left text-white mx-auto mt-8 whitespace-pre-wrap"
                    style="white-space: pre-wrap;">
                    {{ $blog->content }}
                </div>

                <!-- Tags -->
                @if($blog->tags)
                    <div class="mt-8 text-center">
                        @foreach(explode(',', $blog->tags) as $tag)
                            <span class="inline-block bg-slate-700 text-gray-300 px-3 py-1 text-sm rounded-full mr-2 mb-2">
                                #{{ trim($tag) }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>