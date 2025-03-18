<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">  
                <div class="container mx-auto p-4">
                    <h1 class="fw-bold mb-4 text-primary" style="color: #023669 !important;">Update Profile</h1>
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show max-w-md" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card shadow-sm p-4">
                        <form action="/profile" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-4">
                                <h3 class="text-primary" style="color: #023669 !important;">Profile Information</h3>
                                <div class="text-center">
                                        <img id="profile_preview" 
                                            src="{{ filter_var(auth()->user()->profile_picture, FILTER_VALIDATE_URL) 
                                                ? auth()->user()->profile_picture 
                                                : asset('storage/' . auth()->user()->profile_picture) }}" 
                                            alt="Profile Picture"
                                            class="rounded-circle border border-primary mb-3" 
                                            width="100" height="100">
                                    <div>
                                    <input type="file" name="profile_picture" id="upload_profile" hidden>
                                    <button type="button" id="change_profile_picture" class="btn btn-primary" style="background-color: #023669 !important; border-color: #023669 !important;">Change Profile Picture</button>
                                    <button type="submit" id="submit_form" hidden></button>
                                    </div>
                                </div>                            
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control" value="{{ auth()->user()->username }}">
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-secondary">Cancel</button>
                                <button type="submit" class="btn btn-primary" style="background-color: #023669 !important; border-color: #023669 !important;">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const uploadButton = document.getElementById("change_profile_picture");
            const fileInput = document.getElementById("upload_profile");
            const profilePreview = document.getElementById("profile_preview");
            const submitForm = document.getElementById("submit_form");
    
            if (uploadButton && fileInput && profilePreview) {
                uploadButton.addEventListener("click", function () {
                    fileInput.click(); 
                });
                fileInput.addEventListener("change", function () {
                    submitForm.click(); 
                });
                fileInput.addEventListener("change", function (event) {
                    const file = event.target.files[0];
    
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            profilePreview.src = e.target.result; 
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
</x-layout>