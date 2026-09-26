<x-app-layout>

<div class="min-h-screen bg-[#FCFAFF] py-10">

<div class="max-w-7xl mx-auto px-6">


<div class="mb-8">

<p class="text-sm tracking-widest text-[#9B8AC9]">
RETURN MANAGEMENT
</p>

<h1 class="text-3xl font-semibold text-slate-800 mt-2">
ตรวจสอบคืนชุด
</h1>

<p class="text-slate-500 mt-2">
รายการชุดที่กำลังเช่าและรอคืน
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
กำหนดคืน
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

</td>



<td class="px-6 py-4">

{{ $rental->end_date }}

</td>



<td class="px-6 py-4">


@if($rental->status == 'approved')

<span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">
รอรับชุด
</span>


@else

<span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700">
กำลังเช่า
</span>


@endif


</td>


</tr>


@empty


<tr>

<td colspan="5"
class="text-center py-10 text-slate-400">

ไม่มีรายการคืนชุด

</td>

</tr>


@endforelse


</tbody>


</table>


</div>


</div>

</div>

</x-app-layout>