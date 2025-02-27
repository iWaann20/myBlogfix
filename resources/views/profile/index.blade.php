<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
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
                submitForm.click(); // Form dikirim otomatis setelah memilih gambar
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
      
    @if(session('success'))
    <div class="p-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded-lg">
        {{ session('success') }}
    </div>
    @endif
    <div class="font-std mb-10 w-full rounded-2xl bg-white p-10 font-normal leading-relaxed text-gray-900 shadow-xl">
        <div class="flex flex-col">
            
            <form class="space-y-4" action="/profile" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                <div class="flex flex-col md:flex-row justify-between mb-5 items-start">
                    <h2 class="mb-5 text-4xl font-bold text-blue-900">Update Profile</h2>
                        <div class="text-center">
                            <div>
                                <img id="profile_preview"
                                src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png' }}"
                                alt="Profile Picture"
                                     class="rounded-full w-32 h-32 mx-auto border-4 border-indigo-800 mb-4 ring ring-gray-300">
                    
                                <input type="file" name="profile_picture" id="upload_profile" hidden>
                            </div>
                            
                            <button type="button" id="change_profile_picture"
                                    class="bg-indigo-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors duration-300">
                                Change Profile Picture
                            </button>
                            <button type="submit" id="submit_form" hidden></button>
                        </div>                           
                </div>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ auth()->user()->name }}">
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ auth()->user()->username }}">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ auth()->user()->email }}">
                </div>
            
                <div class="flex justify-end space-x-4">
                    <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-indigo-800 text-white rounded-lg hover:bg-indigo-700">Save Changes</button>
                </div>
            </form>
            
        </div>
    </div>
</x-layout>