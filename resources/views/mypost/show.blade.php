<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-5xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <div class="flex space-x-2">
                        <form action="/mypost" method="get">
                        <button type="submit" class="flex items-center bg-green-600 text-white text-sm font-medium px-3 py-1.5 rounded-md hover:bg-green-700 transition duration-300">
                            <span data-feather="arrow-left" class="w-4 h-4 mr-1"></span> Back to My Post
                        </button>
                        </form>
                        <form action="/mypost/{{ $post['slug'] }}/edit" method="get">
                        <button type="submit" class="flex items-center bg-yellow-500 text-white text-sm font-medium px-3 py-1.5 rounded-md hover:bg-yellow-600 transition duration-300">
                            <span data-feather="edit" class="w-4 h-4 mr-1"></span> Edit
                        </button>
                        </form>
                        <form action="/mypost/{{ $post['slug'] }}" method="post">
                            @method('delete')
                            @csrf
                        <button type="submit" class="flex items-center bg-red-600 text-white text-sm font-medium px-3 py-1.5 rounded-md hover:bg-red-700 transition duration-300" onclick="return confirm('Confirm delete this post?')">
                            <span data-feather="trash-2" class="w-4 h-4 mr-1"></span> Delete
                        </button>
                        </form>
                    </div>                    
                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"  src="{{ $post->author->profile_picture 
                                ? (filter_var($post->author->profile_picture, FILTER_VALIDATE_URL) 
                                   ? $post->author->profile_picture 
                                   : asset('storage/' . $post->author->profile_picture)) 
                                : asset('default-profile.png') }}" 
                         alt="{{ $post->author->name }}">
                            <div>
                                <a rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">{{ $post->created_at->format('d F Y')}}</p>
                                <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                    <a>{{ $post->category->name }}</a>
                                </span>
                            </div>
                        </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post ['title'] }}</h1>
            </header>
            <p>{{ $post['body']}}</p>
            </article>
        </div>
    </main>
</x-layout>