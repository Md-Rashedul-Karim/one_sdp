<x-app-layout>
    <main class="flex-1 w-full max-w-[1600px] mx-auto px-4 sm:px-6 py-6 space-y-5">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div>
                <div class="flex items-center gap-2.5">
                    <h1 class="text-lg font-bold text-slate-800">ONE SDP Operations Overview</h1>
                    <span
                        class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">Live
                        System Healthy</span>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">Real-time carrier billing, Direct Operator Billing (DOB)
                    gateways, and subscriber metrics.</p>
            </div>
            <div class="flex items-center gap-2">
                <button type="button" id="refresh-data-btn"
                    class="px-3.5 py-2 bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 rounded-lg text-xs font-semibold shadow-2xs transition flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span>Refresh</span>
                </button>
                <button type="button" id="new-service-btn"
                    class="px-3.5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-semibold shadow-2xs transition flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>New Service Config</span>
                </button>
            </div>
        </div>

        <!-- 4 KPI Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl border border-slate-200/80 p-4 shadow-2xs">
                <div class="flex items-center justify-between"><span class="text-xs font-medium text-slate-500">Active
                        Subscribers</span><span
                        class="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-xs">👥</span>
                </div>
                <div class="mt-2 flex items-baseline justify-between"><span
                        class="text-xl font-bold text-slate-800">1,482,910</span><span
                        class="text-[11px] font-semibold text-emerald-600">+4.2%</span></div>
            </div>
            <div class="bg-white rounded-xl border border-slate-200/80 p-4 shadow-2xs">
                <div class="flex items-center justify-between"><span
                        class="text-xs font-medium text-slate-500">Today's DOB Revenue</span><span
                        class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xs">৳</span>
                </div>
                <div class="mt-2 flex items-baseline justify-between"><span class="text-xl font-bold text-slate-800">৳
                        642,850</span><span class="text-[11px] font-semibold text-emerald-600">+8.7%</span></div>
            </div>
            <div class="bg-white rounded-xl border border-slate-200/80 p-4 shadow-2xs">
                <div class="flex items-center justify-between"><span
                        class="text-xs font-medium text-slate-500">Gateway Throughput</span><span
                        class="w-7 h-7 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-xs">⚡</span>
                </div>
                <div class="mt-2 flex items-baseline justify-between"><span
                        class="text-xl font-bold text-slate-800">128 TPS</span><span
                        class="text-[11px] font-medium text-slate-500">Avg 45ms</span></div>
            </div>
            <div class="bg-white rounded-xl border border-slate-200/80 p-4 shadow-2xs">
                <div class="flex items-center justify-between"><span
                        class="text-xs font-medium text-slate-500">Charging Success Rate</span><span
                        class="w-7 h-7 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center font-bold text-xs">✓</span>
                </div>
                <div class="mt-2 flex items-baseline justify-between"><span
                        class="text-xl font-bold text-slate-800">96.4%</span><span
                        class="text-[11px] font-semibold text-emerald-600">Optimal</span></div>
            </div>
        </div>

        <!-- Operator Strip -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
            <div class="bg-white rounded-xl border border-slate-200/80 px-4 py-3 flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-slate-400 font-medium">GSD Robi Dob</p>
                    <p class="text-xs font-bold text-slate-800 mt-0.5">৳ 184,200</p>
                </div><span
                    class="px-2 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">Connected</span>
            </div>
            <div class="bg-white rounded-xl border border-slate-200/80 px-4 py-3 flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-slate-400 font-medium">Robi Dob</p>
                    <p class="text-xs font-bold text-slate-800 mt-0.5">৳ 152,900</p>
                </div><span
                    class="px-2 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">Connected</span>
            </div>
            <div class="bg-white rounded-xl border border-slate-200/80 px-4 py-3 flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-slate-400 font-medium">Blink Dob</p>
                    <p class="text-xs font-bold text-slate-800 mt-0.5">৳ 119,450</p>
                </div><span
                    class="px-2 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">Connected</span>
            </div>
            <div class="bg-white rounded-xl border border-slate-200/80 px-4 py-3 flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-slate-400 font-medium">GP Global</p>
                    <p class="text-xs font-bold text-slate-800 mt-0.5">৳ 186,300</p>
                </div><span
                    class="px-2 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">Connected</span>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl border border-slate-200/80 shadow-2xs overflow-hidden">
            <div
                class="px-5 py-3.5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <h2 class="text-sm font-bold text-slate-800">Recent SDP & DOB Charging Logs</h2>
                <input type="text" id="table-search-input" placeholder="Filter MSISDN, ID, or Service..."
                    class="w-full sm:w-64 px-3 py-1.5 text-xs bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:bg-white focus:border-blue-600">
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50/80 border-b border-slate-200/70 text-[11px] font-semibold text-slate-500 uppercase tracking-wider">
                            <th class="px-4 py-3">Txn ID</th>
                            <th class="px-4 py-3">MSISDN</th>
                            <th class="px-4 py-3">Operator Channel</th>
                            <th class="px-4 py-3">Service Name</th>
                            <th class="px-4 py-3">Tariff</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Time</th>
                            <th class="px-4 py-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="hover:bg-slate-50/80 transition border-b border-slate-100 last:border-none">
                            <td class="px-4 py-3 text-xs font-semibold text-blue-600 whitespace-nowrap">TXN-984210</td>
                            <td class="px-4 py-3 text-xs font-mono text-slate-700 whitespace-nowrap">8801819204411</td>
                            <td class="px-4 py-3 text-xs font-medium text-slate-700 whitespace-nowrap">Robi Dob</td>
                            <td class="px-4 py-3 text-xs text-slate-600 whitespace-nowrap">GSD Gaming Pack Daily</td>
                            <td class="px-4 py-3 text-xs font-semibold text-slate-800 whitespace-nowrap">৳ 5.00</td>
                            <td class="px-4 py-3 whitespace-nowrap"><span
                                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200/70"><span
                                        class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Success</span></td>
                            <td class="px-4 py-3 text-xs text-slate-400 whitespace-nowrap">2 mins ago</td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <button type="button"
                                    class="view-txn-btn text-xs font-medium text-blue-600 hover:text-blue-800 hover:underline">Details</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition border-b border-slate-100 last:border-none">
                            <td class="px-4 py-3 text-xs font-semibold text-blue-600 whitespace-nowrap">TXN-984209</td>
                            <td class="px-4 py-3 text-xs font-mono text-slate-700 whitespace-nowrap">8801911883209</td>
                            <td class="px-4 py-3 text-xs font-medium text-slate-700 whitespace-nowrap">Blink Dob</td>
                            <td class="px-4 py-3 text-xs text-slate-600 whitespace-nowrap">Banglalink Music Pro</td>
                            <td class="px-4 py-3 text-xs font-semibold text-slate-800 whitespace-nowrap">৳ 10.00</td>
                            <td class="px-4 py-3 whitespace-nowrap"><span
                                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200/70"><span
                                        class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Success</span></td>
                            <td class="px-4 py-3 text-xs text-slate-400 whitespace-nowrap">4 mins ago</td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <button type="button"
                                    class="view-txn-btn text-xs font-medium text-blue-600 hover:text-blue-800 hover:underline">Details</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition border-b border-slate-100 last:border-none">
                            <td class="px-4 py-3 text-xs font-semibold text-blue-600 whitespace-nowrap">TXN-984208</td>
                            <td class="px-4 py-3 text-xs font-mono text-slate-700 whitespace-nowrap">8801711509821</td>
                            <td class="px-4 py-3 text-xs font-medium text-slate-700 whitespace-nowrap">GP Global</td>
                            <td class="px-4 py-3 text-xs text-slate-600 whitespace-nowrap">GP Global Digital Hub</td>
                            <td class="px-4 py-3 text-xs font-semibold text-slate-800 whitespace-nowrap">৳ 15.00</td>
                            <td class="px-4 py-3 whitespace-nowrap"><span
                                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200/70"><span
                                        class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Success</span></td>
                            <td class="px-4 py-3 text-xs text-slate-400 whitespace-nowrap">6 mins ago</td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <button type="button"
                                    class="view-txn-btn text-xs font-medium text-blue-600 hover:text-blue-800 hover:underline">Details</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition border-b border-slate-100 last:border-none">
                            <td class="px-4 py-3 text-xs font-semibold text-blue-600 whitespace-nowrap">TXN-984207</td>
                            <td class="px-4 py-3 text-xs font-mono text-slate-700 whitespace-nowrap">8801847112233</td>
                            <td class="px-4 py-3 text-xs font-medium text-slate-700 whitespace-nowrap">GSD Robi Dob
                            </td>
                            <td class="px-4 py-3 text-xs text-slate-600 whitespace-nowrap">Robi Sports Live Weekly</td>
                            <td class="px-4 py-3 text-xs font-semibold text-slate-800 whitespace-nowrap">৳ 20.00</td>
                            <td class="px-4 py-3 whitespace-nowrap"><span
                                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-medium bg-amber-50 text-amber-700 border border-amber-200/70"><span
                                        class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>Pending</span></td>
                            <td class="px-4 py-3 text-xs text-slate-400 whitespace-nowrap">9 mins ago</td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <button type="button"
                                    class="view-txn-btn text-xs font-medium text-blue-600 hover:text-blue-800 hover:underline">Details</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition border-b border-slate-100 last:border-none">
                            <td class="px-4 py-3 text-xs font-semibold text-blue-600 whitespace-nowrap">TXN-984206</td>
                            <td class="px-4 py-3 text-xs font-mono text-slate-700 whitespace-nowrap">8801922456789</td>
                            <td class="px-4 py-3 text-xs font-medium text-slate-700 whitespace-nowrap">Blink Dob</td>
                            <td class="px-4 py-3 text-xs text-slate-600 whitespace-nowrap">Blink Video Zone</td>
                            <td class="px-4 py-3 text-xs font-semibold text-slate-800 whitespace-nowrap">৳ 5.00</td>
                            <td class="px-4 py-3 whitespace-nowrap"><span
                                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-medium bg-red-50 text-red-700 border border-red-200/70"><span
                                        class="w-1.5 h-1.5 rounded-full bg-red-500"></span>Failed</span></td>
                            <td class="px-4 py-3 text-xs text-slate-400 whitespace-nowrap">12 mins ago</td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <button type="button"
                                    class="view-txn-btn text-xs font-medium text-blue-600 hover:text-blue-800 hover:underline">Details</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition border-b border-slate-100 last:border-none">
                            <td class="px-4 py-3 text-xs font-semibold text-blue-600 whitespace-nowrap">TXN-984205</td>
                            <td class="px-4 py-3 text-xs font-mono text-slate-700 whitespace-nowrap">8801713998877</td>
                            <td class="px-4 py-3 text-xs font-medium text-slate-700 whitespace-nowrap">GP Global</td>
                            <td class="px-4 py-3 text-xs text-slate-600 whitespace-nowrap">GP Cloud App Store</td>
                            <td class="px-4 py-3 text-xs font-semibold text-slate-800 whitespace-nowrap">৳ 30.00</td>
                            <td class="px-4 py-3 whitespace-nowrap"><span
                                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200/70"><span
                                        class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Success</span></td>
                            <td class="px-4 py-3 text-xs text-slate-400 whitespace-nowrap">15 mins ago</td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <button type="button"
                                    class="view-txn-btn text-xs font-medium text-blue-600 hover:text-blue-800 hover:underline">Details</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition border-b border-slate-100 last:border-none">
                            <td class="px-4 py-3 text-xs font-semibold text-blue-600 whitespace-nowrap">TXN-984204</td>
                            <td class="px-4 py-3 text-xs font-mono text-slate-700 whitespace-nowrap">8801817654321</td>
                            <td class="px-4 py-3 text-xs font-medium text-slate-700 whitespace-nowrap">Robi Dob</td>
                            <td class="px-4 py-3 text-xs text-slate-600 whitespace-nowrap">Robi E-Book Unlimited</td>
                            <td class="px-4 py-3 text-xs font-semibold text-slate-800 whitespace-nowrap">৳ 10.00</td>
                            <td class="px-4 py-3 whitespace-nowrap"><span
                                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200/70"><span
                                        class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Success</span></td>
                            <td class="px-4 py-3 text-xs text-slate-400 whitespace-nowrap">18 mins ago</td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <button type="button"
                                    class="view-txn-btn text-xs font-medium text-blue-600 hover:text-blue-800 hover:underline">Details</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div id="toast-container" class="fixed bottom-5 right-5 z-50 flex flex-col gap-2 pointer-events-none"></div>

    <div id="app-modal"
        class="hidden fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-[1px] flex items-center justify-center p-4">
        <div
            class="bg-white rounded-xl shadow-xl border border-slate-200 w-full max-w-lg overflow-hidden transform transition-all">
            <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 id="modal-title" class="text-sm font-bold text-slate-800">Modal Title</h3>
                <button type="button" id="close-modal-btn"
                    class="p-1.5 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="modal-body" class="p-5 text-sm text-slate-600"></div>
        </div>
    </div>
</x-app-layout>
