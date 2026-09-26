<x-app-layout>


<div class="min-h-screen bg-[#FCFAFF] py-10">


<div class="max-w-7xl mx-auto px-6">


<div class="mb-8">

<p class="text-sm tracking-widest text-[#9B8AC9]">
RENTAL HISTORY
</p>


<h1 class="text-3xl font-semibold text-slate-800 mt-2">
ประวัติการเช่า
</h1>


<p class="text-slate-500 mt-2">
รายการเช่าที่ดำเนินการเสร็จแล้ว
</p>

</div>





<div class="bg-white rounded-[30px] border overflow-hidden">


<table class="w-full">


<thead class="bg-[#FAF8FF]">

<tr class="text-left">


<th class="px-6 py-4">
ชุด
</th>


<th class="px-6 py-4">
ลูกค้า
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


</tr>

</thead>




<tbody>


@forelse($rentals as $rental)


<tr class="border-t">


<td class="px-6 py-4">


<div class="font-semibold">

{{ $rental->dress->code ?? '-' }}

</div>


<div class="text-sm text-slate-500">

{{ $rental->dress->name ?? '-' }}

</div>


</td>





<td class="px-6 py-4">

{{ $rental->user->name ?? '-' }}

</td>





<td class="px-6 py-4">


{{ $rental->start_date }}

<br>

ถึง

<br>

{{ $rental->end_date }}


</td>





<td class="px-6 py-4">

{{ number_format($rental->total_price ?? 0,2) }}

บาท

</td>





<td class="px-6 py-4">


@if($rental->status == 'returned')


<span class="px-3 py-1 rounded-full bg-green-100 text-green-700">

คืนแล้ว

</span>


@elseif($rental->status == 'rejected')


<span class="px-3 py-1 rounded-full bg-red-100 text-red-700">

ปฏิเสธ

</span>


@else


<span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700">

ยกเลิก

</span>


@endif


</td>


</tr>


@empty


<tr>

<td colspan="5"
class="text-center py-10 text-slate-400">

ยังไม่มีประวัติการเช่า

</td>

</tr>


@endforelse


</tbody>


</table>


</div>


</div>


</div>


</x-app-layout>