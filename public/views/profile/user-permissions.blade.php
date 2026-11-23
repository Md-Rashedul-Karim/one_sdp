@extends('layouts.app')

@section('title', 'User Permissions')

@section('content')
<div class="w-full px-4 py-6 sm:px-6">
    <div class="mx-auto max-w-3xl overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
        <div class="flex items-center justify-between border-b border-slate-200 bg-white px-5 py-3.5">
            <h5 class="text-base font-medium text-slate-800">
                User Permissions @if($selectedUser) — {{ $selectedUser->name }} @endif
            </h5>
            <a href="{{ route('user') }}"
               class="rounded border border-slate-300 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-50">
                Back to Users
            </a>
        </div>

        <div class="space-y-4 p-5">
            <form method="GET" action="{{ route('user.permissions') }}" class="flex items-center gap-3">
                <label class="text-xs font-semibold text-slate-700">Select User:</label>
                <select name="user_id" onchange="this.form.submit()"
                        class="rounded border border-slate-300 px-3 py-1.5 text-sm text-slate-800 focus:border-blue-500 focus:outline-none">
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}" {{ optional($selectedUser)->id === $u->id ? 'selected' : '' }}>
                            {{ $u->name }} ({{ $u->email }})
                        </option>
                    @endforeach
                </select>
            </form>

            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                @foreach (['View Users', 'Create Users', 'Edit Users', 'Delete Users', 'Manage IP Whitelist', 'Manage Permissions'] as $perm)
                    <label class="flex items-center gap-2.5 rounded border border-slate-200 p-3 text-sm text-slate-700">
                        <input type="checkbox" name="permissions[]" value="{{ $perm }}" class="rounded border-slate-300 text-blue-600">
                        <span>{{ $perm }}</span>
                    </label>
                @endforeach
            </div>

            <div class="flex justify-end pt-2">
                <a href="{{ route('user') }}"
                   class="rounded bg-blue-500 px-4 py-2 text-xs font-medium text-white hover:bg-blue-600">
                    Done
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
