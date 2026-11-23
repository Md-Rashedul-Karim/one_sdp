@extends('layouts.app')

@section('title', 'User Permissions')

@section('content')


@php
    $modules = $modules ?? [
        'Operation' => [
            'USER' => ['Add', 'Edit', 'Delete', 'Permission'],
            'SETTING' => ['Add', 'Edit', 'Delete'],
        ],
        'Portal' => [
            'PORTAL' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'SDP' => [
            'SDP' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'Gateway' => [
            'GATEWAY' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'Myanmar' => [
            'MYANMAR' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'Marketing' => [
            'MARKETING' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'Setting' => [
            'SETTING' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'Promotion' => [
            'PROMOTION' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'Game Loft' => [
            'GAME LOFT' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'Marvel' => [
            'MARVEL' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'Dob' => [
            'DOB' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'Blink Dob' => [
            'BLINK DOB' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'Robi Dob' => [
            'ROBI DOB' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'GSD Robi Dob' => [
            'GSD ROBI DOB' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'Gp Global' => [
            'GP GLOBAL' => ['Add', 'Edit', 'Delete', 'View'],
        ],
        'CSO Tool' => [
            'CSO TOOL' => ['Add', 'Edit', 'Delete', 'View'],
        ],
    ];

    $userPermissions = $userPermissions ?? [
        'Operation.USER.Add',
        'Operation.USER.Edit',
        'Operation.USER.Delete',
        'Operation.USER.Permission',
        'Operation.SETTING.Add',
        'Operation.SETTING.Edit',
        'Operation.SETTING.Delete',
    ];
@endphp

<div class="w-full px-4 py-6 sm:px-6">
   <p> User : {{ $user?->name ?? 'User' }}</p>
    @if (session('success'))
        <div class="mb-4 rounded border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ $formAction ?? '#' }}" method="POST">
        @csrf
        @if(isset($selectedUser))
            <input type="hidden" name="user_id" value="{{ $selectedUser->id }}">
        @endif

        <div class="overflow-hidden rounded border border-slate-200 bg-white shadow-sm">
            <!-- Top Module Tabs -->
            <div class="flex flex-wrap items-center border-b border-slate-200 bg-white">
                @foreach ($modules as $moduleName => $groups)
                    @php
                        $tabSlug = \Illuminate\Support\Str::slug($moduleName);
                        $isFirst = $loop->first;
                    @endphp
                    <button type="button"
                            data-tab-target="{{ $tabSlug }}"
                            class="perm-tab-btn px-4 py-3 text-[13px] font-medium transition-colors {{ $isFirst ? 'bg-[#3b7ddd] text-white' : 'bg-white text-[#3b7ddd] hover:bg-slate-50' }}">
                        {{ $moduleName }}
                    </button>
                @endforeach
            </div>

            <!-- Tab Content Panels -->
            <div class="p-4 sm:p-5">
                @foreach ($modules as $moduleName => $groups)
                    @php
                        $tabSlug = \Illuminate\Support\Str::slug($moduleName);
                        $isFirst = $loop->first;
                    @endphp
                    <div id="tab-panel-{{ $tabSlug }}"
                         class="perm-tab-panel {{ $isFirst ? 'block' : 'hidden' }}">
                        <div class="overflow-hidden rounded border border-slate-200 bg-white">
                            <!-- Module Header with Select All Checkbox -->
                            <div class="flex items-center justify-between border-b border-slate-200 bg-white px-4 py-3.5">
                                <h6 class="text-[15px] font-normal text-slate-800">{{ $moduleName }}</h6>
                                <input type="checkbox"
                                       class="module-select-all h-4 w-4 rounded border-slate-300 text-[#3b7ddd] focus:ring-[#3b7ddd]"
                                       data-module="{{ $tabSlug }}"
                                       title="Select all in {{ $moduleName }}">
                            </div>

                            <!-- Permission Groups Table -->
                            <div class="divide-y divide-slate-200">
                                @foreach ($groups as $groupName => $actions)
                                    @php
                                        $groupSlug = $tabSlug . '-' . \Illuminate\Support\Str::slug($groupName);
                                    @endphp
                                    <div class="flex flex-col sm:flex-row">
                                        <!-- Left Group Label + Group Checkbox -->
                                        <div class="flex w-full items-center border-b border-slate-200 bg-[#f4f5f7] px-4 py-3.5 sm:w-44 sm:shrink-0 sm:border-b-0 sm:border-r">
                                            <input type="checkbox"
                                                   class="group-select-all h-4 w-4 rounded border-slate-300 text-[#3b7ddd] focus:ring-[#3b7ddd]"
                                                   data-module="{{ $tabSlug }}"
                                                   data-group="{{ $groupSlug }}">
                                            <span class="flex-1 text-center text-xs font-semibold uppercase tracking-wide text-slate-500">
                                                {{ $groupName }}
                                            </span>
                                        </div>

                                        <!-- Right Action Checkboxes -->
                                        <div class="flex flex-1 flex-wrap items-center gap-x-6 gap-y-2.5 bg-white px-4 py-3.5">
                                            @foreach ($actions as $action)
                                                @php
                                                    $permKey = "{$moduleName}.{$groupName}.{$action}";
                                                    $isChecked = in_array($permKey, old('permissions', $userPermissions));
                                                @endphp
                                                <label class="inline-flex cursor-pointer items-center gap-2 text-[13px] text-slate-700 select-none">
                                                    <input type="checkbox"
                                                           name="permissions[]"
                                                           value="{{ $permKey }}"
                                                           data-module="{{ $tabSlug }}"
                                                           data-group="{{ $groupSlug }}"
                                                           {{ $isChecked ? 'checked' : '' }}
                                                           class="perm-item-checkbox h-4 w-4 rounded border-slate-300 text-[#3b7ddd] focus:ring-[#3b7ddd]">
                                                    <span>{{ $action }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Footer Actions -->
            <div class="flex items-center gap-2 border-t border-slate-200 bg-white px-4 py-3.5 sm:px-5">
                <a href="{{ route('user') }}"
                   class="rounded border border-slate-300 bg-white px-3.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-50">
                    Back
                </a>
                <button type="submit"
                        class="rounded bg-[#3b7ddd] px-4 py-1.5 text-xs font-medium text-white hover:bg-blue-600">
                    Save Changes
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('.perm-tab-btn');
    const tabPanels = document.querySelectorAll('.perm-tab-panel');

    tabButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const target = this.dataset.tabTarget;

            tabButtons.forEach(b => {
                b.classList.remove('bg-[#3b7ddd]', 'text-white');
                b.classList.add('bg-white', 'text-[#3b7ddd]', 'hover:bg-slate-50');
            });

            this.classList.remove('bg-white', 'text-[#3b7ddd]', 'hover:bg-slate-50');
            this.classList.add('bg-[#3b7ddd]', 'text-white');

            tabPanels.forEach(panel => {
                panel.classList.toggle('hidden', panel.id !== 'tab-panel-' + target);
            });
        });
    });

    function syncCheckboxes() {
        document.querySelectorAll('.group-select-all').forEach(groupCb => {
            const group = groupCb.dataset.group;
            const items = document.querySelectorAll(`.perm-item-checkbox[data-group="${group}"]`);
            groupCb.checked = items.length > 0 && Array.from(items).every(i => i.checked);
        });

        document.querySelectorAll('.module-select-all').forEach(modCb => {
            const mod = modCb.dataset.module;
            const items = document.querySelectorAll(`.perm-item-checkbox[data-module="${mod}"]`);
            modCb.checked = items.length > 0 && Array.from(items).every(i => i.checked);
        });
    }

    document.querySelectorAll('.module-select-all').forEach(modCb => {
        modCb.addEventListener('change', function () {
            const mod = this.dataset.module;
            const checked = this.checked;
            document.querySelectorAll(`.perm-item-checkbox[data-module="${mod}"]`).forEach(i => i.checked = checked);
            document.querySelectorAll(`.group-select-all[data-module="${mod}"]`).forEach(g => g.checked = checked);
        });
    });

    document.querySelectorAll('.group-select-all').forEach(groupCb => {
        groupCb.addEventListener('change', function () {
            const group = this.dataset.group;
            const checked = this.checked;
            document.querySelectorAll(`.perm-item-checkbox[data-group="${group}"]`).forEach(i => i.checked = checked);
            syncCheckboxes();
        });
    });

    document.querySelectorAll('.perm-item-checkbox').forEach(itemCb => {
        itemCb.addEventListener('change', syncCheckboxes);
    });

    syncCheckboxes();
});
</script>
@endpush
@endsection
