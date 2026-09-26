<x-app-layout>

    <x-slot name="header">

        <div>

            <p class="text-sm font-medium tracking-[0.2em] uppercase text-[#9B8AC9]">
                Rental Management
            </p>

            <h2 class="mt-2 text-3xl font-semibold text-slate-800">
                รายการเช่าชุด
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                ตรวจสอบ อนุมัติ และจัดการคำขอเช่าจากลูกค้า
            </p>

        </div>

    </x-slot>



    <div class="min-h-screen
                bg-gradient-to-br
                from-[#FCFAFF]
                via-[#F8F6FF]
                to-[#FFF8FB]
                py-10">


        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">



            {{-- SUCCESS --}}

            @if(session('success'))

                <div class="rounded-[24px]
                            bg-[#F3FCF7]
                            border border-[#CDEADB]
                            px-6 py-4
                            text-sm text-[#478064]">

                    {{ session('success') }}

                </div>

            @endif





            {{-- HEADER --}}

            <section class="rounded-[34px]
                            bg-gradient-to-r
                            from-[#EDF7FF]
                            via-[#F5F0FF]
                            to-[#FFF0F6]
                            p-8
                            shadow-sm">


                <h1 class="text-3xl font-semibold text-slate-800">

                    คำขอเช่าทั้งหมด

                </h1>


                <p class="mt-2 text-sm text-slate-500">

                    จำนวนทั้งหมด {{ $rentals->count() }} รายการ

                </p>


            </section>





            {{-- TABLE --}}

            <section class="rounded-[30px]
                            bg-white
                            border border-[#EEE8F6]
                            shadow-sm
                            overflow-hidden">


                @if($rentals->count() > 0)


                    <div class="overflow-x-auto">


                        <table class="w-full text-sm">


                            <thead class="bg-[#FAF8FF]">


                                <tr class="text-left text-slate-500">


                                    <th class="px-6 py-4">
                                        ลูกค้า
                                    </th>


                                    <th class="px-6 py-4">
                                        ชุด
                                    </th>


                                    <th class="px-6 py-4">
                                        วันที่เช่า
                                    </th>


                                    <th class="px-6 py-4">
                                        ราคา
                                    </th>


                                    <th class="px-6 py-4">
                                        สถานะ
                                    </th>


                                    <th class="px-6 py-4">
                                        จัดการ
                                    </th>


                                </tr>


                            </thead>



                            <tbody class="divide-y divide-[#F1EDF6]">


                                @foreach($rentals as $rental)


                                    <tr>


                                        {{-- USER --}}

                                        <td class="px-6 py-5">

                                            <p class="font-medium text-slate-700">

                                                {{ $rental->user->name ?? '-' }}

                                            </p>


                                            <p class="text-xs text-slate-400">

                                                {{ $rental->user->username ?? '' }}

                                            </p>


                                        </td>





                                        {{-- DRESS --}}

                                        <td class="px-6 py-5">


                                            <p class="font-medium text-slate-700">

                                                {{ $rental->dress->name ?? '-' }}

                                            </p>


                                            <p class="text-xs text-[#7766A8]">

                                                {{ $rental->dress->code ?? '' }}

                                            </p>


                                        </td>






                                        {{-- DATE --}}

                                        <td class="px-6 py-5">


                                            <p>

                                                {{ $rental->start_date->format('d/m/Y') }}

                                            </p>


                                            <p class="text-xs text-slate-400">

                                                ถึง {{ $rental->end_date->format('d/m/Y') }}

                                            </p>


                                        </td>






                                        {{-- PRICE --}}

                                        <td class="px-6 py-5">

                                            {{ number_format($rental->total_price,0) }} ฿

                                        </td>






                                        {{-- STATUS --}}

                                        <td class="px-6 py-5">


                                            @if($rental->status === 'pending')


                                                <span class="rounded-full
                                                             bg-[#FFF7E8]
                                                             px-3 py-1
                                                             text-xs text-[#B97A32]">

                                                    รออนุมัติ

                                                </span>


                                            @elseif($rental->status === 'approved')


                                                <span class="rounded-full
                                                             bg-[#EDF7FF]
                                                             px-3 py-1
                                                             text-xs text-[#4F8DBA]">

                                                    อนุมัติแล้ว

                                                </span>


                                            @elseif($rental->status === 'renting')


                                                <span class="rounded-full
                                                             bg-[#F0EDFF]
                                                             px-3 py-1
                                                             text-xs text-[#7766A8]">

                                                    กำลังเช่า

                                                </span>


                                            @elseif($rental->status === 'returned')


                                                <span class="rounded-full
                                                             bg-[#ECFDF5]
                                                             px-3 py-1
                                                             text-xs text-[#378566]">

                                                    คืนแล้ว

                                                </span>


                                            @elseif($rental->status === 'rejected')


                                                <span class="rounded-full
                                                             bg-[#FFF7F8]
                                                             px-3 py-1
                                                             text-xs text-[#C56690]">

                                                    ปฏิเสธ

                                                </span>


                                            @endif


                                        </td>







                                        {{-- ACTION --}}

                                        <td class="px-6 py-5">


                                            <div class="flex flex-wrap gap-2">



                                                @if($rental->status === 'pending')


                                                    {{-- APPROVE --}}

                                                    <form method="POST"
                                                          action="{{ route('admin.rentals.approve',$rental->id) }}">

                                                        @csrf


                                                        <button
                                                            class="rounded-xl
                                                                   bg-[#EAF8F0]
                                                                   px-4 py-2
                                                                   text-xs
                                                                   text-[#378566]">

                                                            อนุมัติ

                                                        </button>


                                                    </form>





                                                    {{-- REJECT --}}

                                                    <button
                                                        onclick="document.getElementById('reject-{{ $rental->id }}').classList.remove('hidden')"

                                                        class="rounded-xl
                                                               bg-[#FFF1F7]
                                                               px-4 py-2
                                                               text-xs
                                                               text-[#C56690]">

                                                        ปฏิเสธ

                                                    </button>



                                                @endif




                                                @if($rental->status === 'approved')


                                                    <form method="POST"
                                                          action="{{ route('admin.rentals.start',$rental->id) }}">

                                                        @csrf


                                                        <button
                                                            class="rounded-xl
                                                                   bg-[#EDF7FF]
                                                                   px-4 py-2
                                                                   text-xs
                                                                   text-[#4F8DBA]">

                                                            รับชุดแล้ว

                                                        </button>


                                                    </form>


                                                @endif





                                                @if($rental->status === 'renting')


                                                    <form method="POST"
                                                          action="{{ route('admin.rentals.return',$rental->id) }}">

                                                        @csrf


                                                        <input type="hidden"
                                                               name="return_condition"
                                                               value="ปกติ">


                                                        <button
                                                            class="rounded-xl
                                                                   bg-[#ECFDF5]
                                                                   px-4 py-2
                                                                   text-xs
                                                                   text-[#378566]">

                                                            รับคืน

                                                        </button>


                                                    </form>


                                                @endif



                                            </div>



                                        </td>


                                    </tr>





                                    {{-- REJECT BOX --}}

                                    <tr id="reject-{{ $rental->id }}"
                                        class="hidden">


                                        <td colspan="6"
                                            class="px-6 py-5 bg-[#FFF7F8]">


                                            <form method="POST"
                                                  action="{{ route('admin.rentals.reject',$rental->id) }}">

                                                @csrf


                                                <div class="flex gap-3">


                                                    <input
                                                        name="rejection_reason"
                                                        required
                                                        placeholder="ใส่เหตุผลที่ปฏิเสธ..."

                                                        class="flex-1 rounded-xl
                                                               border-[#E8D7DE]">


                                                    <button
                                                        class="rounded-xl
                                                               bg-[#C56690]
                                                               px-5
                                                               text-white">

                                                        ยืนยัน

                                                    </button>


                                                </div>


                                            </form>


                                        </td>


                                    </tr>



                                @endforeach


                            </tbody>


                        </table>


                    </div>



                @else


                    <div class="p-12 text-center">


                        <h3 class="text-xl font-semibold text-slate-700">

                            ยังไม่มีรายการเช่า

                        </h3>


                        <p class="mt-2 text-sm text-slate-500">

                            เมื่อมีลูกค้าส่งคำขอ รายการจะแสดงที่นี่

                        </p>


                    </div>


                @endif


            </section>


        </div>


    </div>


</x-app-layout>