@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="w-full px-4 py-6 sm:px-6">
    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
        <!-- Card Header -->
        <div class="flex items-center justify-between border-b border-slate-200 bg-white px-5 py-3.5">
            <h5 class="text-base font-medium text-slate-800">Users</h5>
            <a href="{{ route('user.create') }}"
               class="rounded bg-blue-500 px-3.5 py-1.5 text-xs font-medium text-white hover:bg-blue-600">
                New User
            </a>
        </div>

        <!-- Table Section -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-left text-sm">
                <thead class="border-b border-slate-200 bg-[#efefef] text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                    <tr>
                        <th class="w-16 border-r border-slate-200 px-3 py-2.5 text-center">NO.</th>
                        <th class="border-r border-slate-200 px-4 py-2.5">USERNAME</th>
                        <th class="border-r border-slate-200 px-4 py-2.5">EMAIL</th>
                        <th class="border-r border-slate-200 px-4 py-2.5">ROLE</th>
                        {{-- <th class="border-r border-slate-200 px-4 py-2.5">PERMISSION</th> --}}
                        <th class="px-4 py-2.5">ACTION</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white text-[13px] text-slate-700">
                    @forelse ($users as $user)
                        <tr class="hover:bg-slate-50">
                            <td class="border-r border-slate-200 px-3 py-2 text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class="border-r border-slate-200 px-4 py-2">
                                {{ $user->username ?? $user->name }}
                            </td>
                            <td class="border-r border-slate-200 px-4 py-2">
                                {{ $user->email }}
                            </td>
                            <td class="border-r border-slate-200 px-4 py-2">
                                {{ ucfirst($user->role ?? 'User') }}
                            </td>
                            {{-- <td class="border-r border-slate-200 px-4 py-2">
                                <div class="flex flex-wrap gap-1.5">
                                    <a href="#"
                                       class="rounded border border-slate-300 bg-white px-2.5 py-1 text-xs text-slate-700 hover:bg-slate-100">
                                        Permission
                                    </a>
                                    <a href="#"
                                       class="rounded border border-slate-300 bg-slate-100 px-2.5 py-1 text-xs text-slate-700 hover:bg-slate-200">
                                        IP Whitelist
                                    </a>
                                </div>
                            </td> --}}
                            <td class="px-4 py-2">
                                <div class="flex flex-wrap gap-1.5">
                                    <a href="{{route('user.edit', $user->id)}}"
                                       class="rounded border border-slate-300 bg-white px-2.5 py-1 text-xs text-slate-700 hover:bg-slate-100">
                                        Edit
                                    </a>
                                    <a href="{{route('user.permission', $user->id)}}"
                                       class="rounded border border-slate-300 bg-white px-2.5 py-1 text-xs text-slate-700 hover:bg-slate-100">
                                        Permissions
                                    </a>

                                   @if (auth()->id() !== $user->id)
                                        <form action="{{ route('user.delete', $user->id) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="rounded border border-slate-300 bg-white px-2.5 py-1 text-xs text-slate-700 hover:bg-red-50 hover:text-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-slate-400">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
