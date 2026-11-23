@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="w-full px-4 py-6 sm:px-6">
    <div class="mx-auto max-w-2xl overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
        <div class="flex items-center justify-between border-b border-slate-200 bg-white px-5 py-3.5">
            <h5 class="text-base font-medium text-slate-800">Edit User — {{ $user->name }}</h5>
            <a href="{{ route('user') }}"
               class="rounded border border-slate-300 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-50">
                Back to Users
            </a>
        </div>

        <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-4 p-5">
            @csrf
            @method('PUT')

            <div>
                <label class="mb-1 block text-xs font-semibold text-slate-700">Username / Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                       class="w-full rounded border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:outline-none">
                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-1 block text-xs font-semibold text-slate-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                       class="w-full rounded border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:outline-none">
                @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-1 block text-xs font-semibold text-slate-700">Role</label>
                <select name="role"
                        class="w-full rounded border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:outline-none">
                    <option value="User" {{ old('role', $user->role) === 'User' ? 'selected' : '' }}>User</option>
                    <option value="Admin" {{ old('role', $user->role) === 'Admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-1 block text-xs font-semibold text-slate-700">New Password (leave blank to keep current)</label>
                <input type="password" name="password"
                       class="w-full rounded border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:outline-none">
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <a href="{{ route('user') }}"
                   class="rounded border border-slate-300 bg-white px-4 py-2 text-xs font-medium text-slate-700 hover:bg-slate-50">
                    Cancel
                </a>
                <button type="submit"
                        class="rounded bg-blue-500 px-4 py-2 text-xs font-medium text-white hover:bg-blue-600">
                    Update User
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
