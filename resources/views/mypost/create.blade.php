<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
      <div class="relative py-2 sm:max-w-2xl sm:mx-auto"> 
          <div class="relative px-8 py-6 bg-white mx-4 md:mx-0 shadow rounded-2xl sm:p-6">
            <div class="max-w-lg mx-auto"> 
              <div class="flex items-center space-x-3">
                <div class="block font-semibold text-lg text-gray-700">
                  <h2 class="leading-snug">New Post</h2>
                  <p class="text-sm text-gray-500 font-normal leading-snug">Create a new post then press the create button</p>
                </div>
              </div>
              <form action="/mypost" method="POST">
                @csrf
              <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                  <div class="flex flex-col">
                    <label for="title" class="leading-loose">Post Title</label>
                    <input type="text" name="title" id="title" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm placeholder-gray-400 border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Title" required autofocus>
                  </div>
                  <div class="flex flex-col">
                    <label for="slug" class="leading-loose">Slug</label>
                    <input type="text" name="slug" id="slug" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm placeholder-gray-400 border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Slug" required>
                  </div>
                  <div class="flex flex-col">
                    <label for="category" class="leading-loose">Category</label>
                    <select name="category_id" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="flex flex-col">
                    <label for="body" class="leading-loose">Post Content</label>
                    <textarea name="body" id="body" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm placeholder-gray-400 border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Content" rows="5" required></textarea>
                  </div>
                </div>
                <div class="pt-4 flex items-center space-x-4">
                    <a href="/mypost" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none hover:bg-gray-100 transition duration-300">
                    <span data-feather="x" class="w-6 h-6 mr-3"></span> Cancel
                    </a>
                    <button type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md hover:bg-blue-700 focus:outline-none">Create Post</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script>
          const title = document.querySelector('#title'); 
          const slug = document.querySelector('#slug');

          title.addEventListener('change', function(){
            fetch('/mypost/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
          });
        </script>
</x-layout>