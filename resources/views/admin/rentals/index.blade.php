<x-app-layout>

<div class="max-w-7xl mx-auto px-6 py-10">


<div class="mb-8">

<p class="text-sm text-[#8C80B4]">
Rental Management
</p>


<h1 class="text-3xl font-semibold text-slate-800">
รายการเช่าชุด
</h1>


</div>



@if(session('success'))

<div class="mb-5 rounded-2xl bg-green-100 px-5 py-3 text-green-700">

{{ session('success') }}

</div>

@endif





<div class="bg-white rounded-[28px] border border-[#EEE8F6] overflow-hidden">


<table class="w-full">


<thead class="bg-[#FBF8FF]">


<tr class="text-left text-sm text-slate-600">


<th class="px-5 py-4">
ชุด
</th>


<th class="px-5 py-4">
ลูกค้า
</th>


<th class="px-5 py-4">
วันที่เช่า
</th>


<th class="px-5 py-4">
จำนวนวัน
</th>


<th class="px-5 py-4">
ราคา
</th>


<th class="px-5 py-4">
สถานะ
</th>


<th class="px-5 py-4">
จัดการ
</th>


</tr>


</thead>




<tbody>


@forelse($rentals as $rental)


<tr class="border-t">


<td class="px-5 py-4">


<p class="font-semibold">

{{ $rental->dress->name ?? '-' }}

</p>


<p class="text-sm text-slate-400">

{{ $rental->dress->code ?? '' }}

</p>


</td>




<td class="px-5 py-4">

{{ $rental->user->name ?? '-' }}

</td>




<td class="px-5 py-4">

{{ $rental->start_date }}

<br>

ถึง

<br>

{{ $rental->end_date }}

</td>




<td class="px-5 py-4">

{{ $rental->rental_days }}

วัน

</td>




<td class="px-5 py-4">

{{ number_format($rental->total_price,2) }}

บาท

</td>
                <td class="px-5 py-4">


                    @if($rental->status == 'pending')


                    <span class="px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-700">

                        รออนุมัติ

                    </span>




                    @elseif($rental->status == 'approved')


                    <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">

                        อนุมัติแล้ว

                    </span>




                    @elseif($rental->status == 'renting')


                    <span class="px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-700">

                        กำลังเช่า

                    </span>




                    @elseif($rental->status == 'returned')


                    <span class="px-3 py-1 rounded-full text-sm bg-purple-100 text-purple-700">

                        คืนแล้ว

                    </span>




                    @elseif($rental->status == 'rejected')


                    <span class="px-3 py-1 rounded-full text-sm bg-red-100 text-red-700">

                        ปฏิเสธ

                    </span>




                    @else


                    <span class="px-3 py-1 rounded-full text-sm bg-gray-100 text-gray-700">

                        {{ $rental->status }}

                    </span>


                    @endif


                </td>









                <td class="px-5 py-4">


                <div class="flex flex-col gap-2">





                @if($rental->status == 'pending')




                    {{-- อนุมัติ --}}

                    <form method="POST"
                    action="{{ route('admin.rentals.approve',$rental->id) }}">

                        @csrf


                        <button
                        type="submit"
                        class="w-full px-4 py-2 rounded-xl bg-green-100 text-green-700">

                            ✓ อนุมัติ

                        </button>


                    </form>








                    {{-- ปฏิเสธ --}}

                    <button
                    type="button"

                    onclick="document.getElementById('reject-{{ $rental->id }}').classList.remove('hidden')"

                    class="w-full px-4 py-2 rounded-xl bg-red-100 text-red-700">

                        ✕ ปฏิเสธ

                    </button>






                    {{-- กล่องเหตุผล --}}

                    <div

                    id="reject-{{ $rental->id }}"

                    class="hidden mt-2 bg-red-50 rounded-xl p-4 border border-red-200">


                    <form method="POST"

                    action="{{ route('admin.rentals.reject',$rental->id) }}">


                    @csrf




                    <label class="text-sm font-semibold text-red-700">

                    เหตุผลที่ปฏิเสธ

                    </label>




                    <textarea

                    name="rejection_reason"

                    required

                    maxlength="255"

                    class="w-full mt-2 rounded-xl border p-2"

                    placeholder="เช่น ชุดไม่ว่าง, วันที่ซ้ำ, ข้อมูลไม่ครบ"

                    ></textarea>





                    <div class="flex gap-2 mt-3">



                    <button

                    type="submit"

                    class="flex-1 px-3 py-2 rounded-xl bg-red-500 text-white">

                    ยืนยัน

                    </button>





                    <button

                    type="button"

                    onclick="document.getElementById('reject-{{ $rental->id }}').classList.add('hidden')"

                    class="flex-1 px-3 py-2 rounded-xl bg-gray-200">

                    ยกเลิก

                    </button>



                    </div>




                    </form>


                    </div>




                @endif
                                @if($rental->status == 'approved')


                    {{-- เริ่มเช่า --}}

                    <form method="POST"

                    action="{{ route('admin.rentals.start',$rental->id) }}">


                        @csrf



                        <button

                        type="submit"

                        class="w-full px-4 py-2 rounded-xl bg-blue-100 text-blue-700">


                            รับชุด / เริ่มเช่า


                        </button>


                    </form>


                @endif







                @if($rental->status == 'renting')


                    {{-- รับคืนชุด --}}

                    <form method="POST"

                    action="{{ route('admin.rentals.return',$rental->id) }}">


                        @csrf



                        <input

                        type="hidden"

                        name="return_condition"

                        value="สภาพปกติ">





                        <button

                        type="submit"

                        class="w-full px-4 py-2 rounded-xl bg-purple-100 text-purple-700">


                            รับคืนชุด


                        </button>


                    </form>


                @endif







                </div>


                </td>





            </tr>





            @empty


            <tr>


                <td colspan="7"

                class="text-center py-10 text-slate-400">


                    ยังไม่มีรายการเช่า


                </td>


            </tr>


            @endforelse





            </tbody>


        </table>


    </div>


</div>


</x-app-layout>