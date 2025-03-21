<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">      
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">User Verification</h4>
                        <form action="/admin" method="get" class="d-flex">
                            @if (request('user'))
                            <input type="hidden" name="username" value="{{ request('username') }}">
                            <input type="hidden" name="telegram_username" value="{{ request('telegram_username') }}">
                            <input type="hidden" name="name" value="{{ request('name') }}">
                            @endif
                            <div class="input-group">
                                <input type="search" class="form-control" id="search" name="search" placeholder="Search User" autocomplete="off">
                                <button class="btn btn-primary" type="submit" style="background-color: #023669 !important; border-color: #023669 !important;">Search</button>
                            </div>
                        </form>       
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Telegram Username</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->username }}</td>
                                    <td class="text-center">{{ $user->telegram_username }}</td>
                                    <td class="text-center">{{ $user->role->name }}</td>
                                    <td class="text-center">
                                        <form action="/admin/{{ $user['id'] }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary  waves-effect waves-light" style="background-color: #023669 !important; border-color: #023669 !important;">Verify</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="text-center">
                                    <p class="text-xl fw-bold mt-3">User not found.</p>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2 px-5">
                    <div>
                        <p class="mb-0">Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results</p>
                    </div>
                    <div>
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                    <style>
                        .pagination .active .page-link {
                            background-color: #023669 !important;
                            border-color: #023669 !important;
                        }
                    </style>                    
                </div>
            </div>
        </div>
    </div>   

</x-layout>