@extends('layouts.sidebar_main')

@section('header')
<h2 class="text-2xl font-semibold">Manage Payments</h2>
@endsection

@section('content')
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<div class="container mx-auto" x-data="posApp()">

    <div class="bg-white rounded-lg shadow p-4 mb-6">
        @php
        if(request('student_id') == null)
        $stud_disable= 'disabled';
        else
        $stud_disable= '';

        $student_f = DB::table('users')->where('student_id',request('student_id'))->first();
        $student_name_found = $student_f->name??null;
        $student_id_found = $student_f->id??null;
        $student_program_found = $student_f->program??null;
        @endphp
        <form method="GET" action="{{ route('admin.pos', request()->route('id')) }}" onsubmit="loading(); return true;" class="space-y-2">
            @foreach(array_merge(request()->except('student_id'), []) as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <input
                type="text"
                name="student_id"
                placeholder="Input Student ID"
                value="{{ request('student_id') }}"
                class="border-[1.5px] {{$student_name_found ? 'font-semibold text-green-600 border-green-600' : (request('student_id') ? 'text-red-700 border-red-700' : 'border-gray-600')}} rounded-md px-2 py-2 w-full">
            <p class="text-sm">Student Name:
                @if($student_name_found)
                <span class="text-blue-700 font-semibold">{{$student_name_found}}</span>
                @else
                @if(request('student_id'))
                <span class="text-red-700 font-semibold">(not found)</span>
                @else
                <span class="text-gray-500">(enter ID to search)</span>
                @endif
                @endif
            </p>
        </form>
    </div>

    @if($student_name_found)
    <!-- POS Layout -->
    <div class="bg-white rounded-t-md grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-4">
        <!-- POS Table (Left) -->
        <div class="space-y-6">
            <div class="bg-gray-50 rounded-lg shadow p-4 overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">Fee</th>
                            <th class="px-4 py-2 border">Due Date</th>
                            <th class="px-4 py-2 border">Amount</th>
                            <th class="px-4 py-2 border">Penalty</th>
                            <th class="px-4 py-2 border">Subtotal</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="item in cart" :key="item.id">
                            <tr>
                                <td class="px-4 py-2 border" x-text="item.name"></td>
                                <td class="px-4 py-2 border" x-text="item.due"></td>
                                <td class="px-4 py-2 border">₱ <span x-text="item.amount.toFixed(2)"></span></td>
                                <td class="px-4 py-2 border">
                                    <span :class="isPastDue(item.due) ? 'text-red-600 font-semibold' : 'text-gray-400'">
                                        ₱ <span x-text="item.penalty.toFixed(2)"></span>
                                    </span>
                                </td>
                                <td class="px-4 py-2 border">
                                    ₱ <span x-text="(item.amount + (isPastDue(item.due) ? item.penalty : 0)).toFixed(2)"></span>
                                </td>
                                <td class="px-4 py-2 border text-center">
                                    <button @click="cart = cart.filter(f => f.id !== item.id)" class="text-red-600 hover:underline">Remove</button>
                                </td>

                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right Side: Fees & Checkout -->
        <div class="space-y-6">
            <!-- Button to open fees modal -->
            <div class="bg-gray-50 rounded-lg shadow p-4 flex justify-between items-center">
                <h2 class="text-lg font-bold">Add Fees</h2>
                <button @click="openFees = true" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">Select Fees</button>
            </div>

            <!-- Checkout -->
            <div class="bg-gray-50 rounded-lg shadow p-6">
                <h2 class="text-lg font-bold mb-4">Checkout</h2>
                <form method="POST" action="{{ route('admin.pos.payment_submit') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{  $student_id_found }}">
                    <input type="hidden" name="student_id" value="{{ request('student_id') }}">
                    <input type="hidden" name="cart" :value="JSON.stringify(cart)">
                    <input type="hidden" name="total" :value="total.toFixed(2)">

                    <!-- Totals -->
                    <div class="flex justify-end mt-2 text-right">
                        <p class="text-lg font-semibold">Total: ₱ <span x-text="total.toFixed(2)"></span></p>
                    </div>

                    <div class="space-y-3 mt-4">
                        <!-- Payment Method -->
                        <div>
                            <label class="block mb-1 font-semibold">Payment Method</label>
                            <select x-model="paymentMethod" name="payment_method" class="w-full border rounded p-2">
                                <option value="cash">Cash</option>
                                <option value="gcash">Gcash</option>
                            </select>
                        </div>

                        <!-- Cash Fields -->
                        <template x-if="paymentMethod === 'cash'">
                            <div>
                                <label class="block mb-1 font-semibold">Money Tendered</label>
                                <input type="number" step="0.01" x-model="moneyTendered" name="money_tendered" class="w-full border rounded p-2">
                                <p class="mt-1 text-sm">Change: ₱
                                    <span x-text="(moneyTendered - total > 0 ? (moneyTendered - total).toFixed(2) : '0.00')"></span>
                                </p>
                            </div>
                        </template>

                        <!-- Gcash Fields -->
                        <template x-if="paymentMethod === 'gcash'">
                            <div class="space-y-2">
                                <div>
                                    <label class="block mb-1 font-semibold">Gcash Reference Number</label>
                                    <input type="text" name="gcash_reference" class="w-full border rounded p-2">
                                </div>
                                <div>
                                    <label class="block mb-1 font-semibold">Gcash Name</label>
                                    <input type="text" name="gcash_name" class="w-full border rounded p-2">
                                </div>
                                <div>
                                    <label class="block mb-1 font-semibold">Money Tendered</label>
                                    <input type="number" step="0.01" x-model="moneyTendered" name="money_tendered" class="w-full border rounded p-2">
                                    <p class="mt-1 text-sm">Change: ₱
                                        <span x-text="(moneyTendered - total > 0 ? (moneyTendered - total).toFixed(2) : '0.00')"></span>
                                    </p>
                                </div>
                            </div>
                        </template>
                    </div>

                    <button type="submit" class="w-full mt-4 bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700">
                        Submit Payment
                    </button>
                </form>
            </div>
        </div>

    </div>
    
    <!-- Modal for Fees -->
    <div x-show="openFees"
        class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50"
        x-transition>
        <div class="bg-white rounded-lg shadow-lg p-6 w-[50%]" x-data="{ search: '', orgFilter: '' }">
            <h2 class="text-lg font-bold mb-4">Available Fees</h2>

            <!-- Search and Filter -->
            <div class="flex flex-col space-y-2 mb-4 ">
                <!-- Search Input -->
                <input
                    type="text"
                    placeholder="Search fees..."
                    x-model="search"
                    class="w-full border rounded px-2 py-1 text-sm focus:ring-2 focus:ring-blue-500">

                <!-- Organization Filter -->
                <select x-model="orgFilter" class="w-full border rounded px-2 py-1 text-sm focus:ring-2 focus:ring-blue-500">
                    <option value="">All Organizations</option>
                    @foreach($organizations as $org)
                    <option value="{{ $org->id }}">{{ $org->description }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Fee List -->
            <div class="space-y-2  max-h-[50vh]  overflow-y-auto">
                @foreach($fees as $fee)
                <div
                    x-show="(search === '' || '{{ strtolower($fee->payment) }}'.includes(search.toLowerCase())) 
                          && (orgFilter === '' || orgFilter == '{{ $fee->organization_id }}')"
                    class="border rounded p-3 flex justify-between items-center">
                    <div>
                        <p class="font-medium">{{ $fee->payment }}</p>
                        <p class="text-sm text-gray-600">Due: {{ $fee->due }}</p>
                        <p class="text-sm text-gray-600">Amount: ₱{{ number_format($fee->amount, 2) }}</p>
                        <p class="text-sm text-gray-600">Penalty: ₱{{ number_format($fee->penalty, 2) }}</p>
                        <p class="text-xs text-gray-500">Org: {{ DB::table('organization')->where('id', $fee->organization_id)->value('description') }} </p>
                    </div>
                    <button
                        @click="addToCart({id: {{$fee->id}}, name: '{{$fee->payment}}', amount: {{$fee->amount}}, penalty: {{$fee->penalty}}, due: '{{$fee->due}}'})"
                        :class="{'opacity-50 pointer-events-none': isInCart({{$fee->id}})}"
                        class="px-3 py-1 text-sm rounded-lg shadow
                               text-white 
                               disabled:opacity-50 
                               bg-blue-600 hover:bg-blue-700">
                        Add
                    </button>
                </div>
                @endforeach
            </div>

            <!-- Close Button -->
            <div class="mt-4 text-right">
                <button @click="openFees = false" class="px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700">
                    Close
                </button>
            </div>
        </div>
    </div>

    @endif
</div>

<script>
    function posApp() {
        return {
            cart: [],
            openFees: false,
            paymentMethod: 'cash',
            moneyTendered: 0,
            get total() {
                return this.cart.reduce((sum, item) => {
                    const penalty = this.isPastDue(item.due) ? item.penalty : 0;
                    return sum + item.amount + penalty;
                }, 0);
            },
            addToCart(fee) {
                if (!this.isInCart(fee.id)) {
                    this.cart.push(fee);
                }
                this.openFees = false;
            },
            isInCart(id) {
                return this.cart.some(f => f.id === id);
            },
            isPastDue(due) {
                const today = new Date().setHours(0, 0, 0, 0);
                const dueDate = new Date(due).setHours(0, 0, 0, 0);
                return today > dueDate;
            }
        }
    }
</script>
@endsection