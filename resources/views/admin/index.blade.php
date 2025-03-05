<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">User Verification</h2>
        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
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
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Verify</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>