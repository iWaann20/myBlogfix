<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">User Verification</h2>
        @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-full max-w-md" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-500 hover:text-green-700" onclick="this.parentElement.remove();">
                &times;
            </button>
        </div>
        @endif
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">Name</th>
                    <th class="border border-gray-300 p-2">Username</th>
                    <th class="border border-gray-300 p-2">Telegram Username</th>
                    <th class="border border-gray-300 p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $user->name }}</td>
                    <td class="border border-gray-300 p-2">{{ $user->username }}</td>
                    <td class="border border-gray-300 p-2">{{ $user->telegram_username }}</td>
                    <td class="border border-gray-300 p-2 text-center">
                        <form action="/admin/{{ $user['id'] }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white hover:bg-blue-600 px-4 py-2 rounded">Verify</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>