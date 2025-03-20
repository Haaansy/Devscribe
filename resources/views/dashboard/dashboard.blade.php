<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>DevScribe - Dashboard</title>
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
            <h1 class="text-3xl font-bold text-white">Blogs</h1>
            <a href='{{ Route('show.createBlog') }}' class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                Create Blog
            </a>
        </div>

        @if(count($blogItems) === 0)
            <div class="text-center py-8">
                <p class="text-slate-400 text-lg">No blog posts found. Start creating!</p>
            </div>
        @else
            @php
                $categories = $blogItems->groupBy(function($item) {
                    return $item->category ? $item->category->name : 'Uncategorized';
                });
            @endphp

            @foreach($categories as $categoryName => $items)
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-white mb-4 border-b border-slate-700 pb-2">{{ $categoryName }}</h2>
                    @if($categoryName != 'Uncategorized' && $items->first()->category)
                        <p class="text-slate-400 mb-4">{{ $items->first()->category->description }}</p>
                    @endif
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($items as $item)
                            <div class="bg-slate-800 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <!-- Blog image -->
                                <div class="h-48 bg-slate-700 overflow-hidden">
                                    @if($item->image_path)
                                        <img src="{{ asset($item->image_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-slate-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6">
                                    <!-- Category tag -->
                                    <div class="mb-3">
                                        <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded-full">{{ $item->category ? $item->category->name : 'Uncategorized' }}</span>
                                    </div>
                                    <h2 class="text-xl font-bold text-white mb-2">{{ $item->title }}</h2>
                                    <div class="flex items-center text-slate-400 mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ $item->author->name ?? $item->author->username ?? 'Unknown' }}</span>
                                    </div>
                                    <div class="flex justify-between mt-4">
                                        <a href="{{ Route('show.blog', $item -> id) }}" class="text-blue-400 hover:text-blue-300">Read more</a>
                                        <span class="text-slate-400 text-sm">{{ $item->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>

</html>