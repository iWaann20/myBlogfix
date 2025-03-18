<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="main-content d-flex flex-column min-vh-100">
        <div class="page-content flex-grow-1 p-0 m-0">   
            <div class="py-4 px-4 mx-auto max-w-xxl">
                <div class="mx-auto text-center">
                    <form class="mb-4">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if (request('author'))
                            <input type="hidden" name="author" value="{{ request('author') }}">
                        @endif
                        <div class="input-group">
                            <input type="search" class="form-control" id="search" name="search" placeholder="Search article" autocomplete="off">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            {{ $posts->links() }}
            <div class="py-4 px-4 mx-auto max-w-xxl">
                <div class="row g-4">
                    @forelse ($posts as $post)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between text-muted small mb-2">
                                    <span class="badge bg-primary">
                                        <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a>
                                    </span>
                                    <span>{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                <h5 class="card-title">
                                    <a href="/posts/{{ $post['slug'] }}" class="text-dark text-decoration-none">{{ $post['title'] }}</a>
                                </h5>
                                <p class="card-text text-muted">{{ Str::limit($post['body'], 150) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-2" src="{{ $post->author->profile_picture ? (filter_var($post->author->profile_picture, FILTER_VALIDATE_URL) ? $post->author->profile_picture : asset('storage/' . $post->author->profile_picture)) : asset('default-profile.png') }}" alt="{{ $post->author->name }}" width="30" height="30">
                                        <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                                    </div>
                                    <a href="/posts/{{ $post['slug'] }}" class="btn btn-outline-primary btn-sm">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center">
                        <a href="/posts" class="text-primary text-decoration-none">&laquo; Back to posts</a>
                        <p class="text-xl fw-bold mt-3">Article not found.</p>
                    </div>
                    @endforelse
                </div>  
            </div>
        </div>
        {{ $posts->links() }}
    </div>    
</x-layout>