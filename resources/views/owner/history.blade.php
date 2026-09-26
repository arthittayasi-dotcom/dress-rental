<x-app-layout>

<div class="max-w-7xl mx-auto px-6 py-10">

<h1 class="text-3xl font-semibold">
ประวัติการเช่าทั้งหมด
</h1>


<div class="mt-8 bg-white rounded-3xl border overflow-hidden">

<table class="w-full">


<thead class="bg-[#FBF8FF]">

<tr>

<th class="px-5 py-4 text-left">
ชุด
</th>

<th class="px-5 py-4 text-left">
ลูกค้า
</th>

<th class="px-5 py-4 text-left">
วันที่เช่า
</th>

<th class="px-5 py-4 text-left">
ราคา
</th>

<th class="px-5 py-4 text-left">
สถานะ
</th>

</tr>

</thead>



<tbody>


@foreach($rentals as $rental)

<tr class="border-t">


<td class="px-5 py-4">

{{ $rental->dress->name ?? '-' }}

</td>


<td class="px-5 py-4">

{{ $rental->user->name ?? '-' }}

</td>


<td class="px-5 py-4">

{{ $rental->start_date }}
-
{{ $rental->end_date }}

</td>


<td class="px-5 py-4">

{{ number_format($rental->total_price,2) }}

บาท

</td>


<td class="px-5 py-4">

{{ $rental->status }}

</td>


</tr>


@endforeach


</tbody>


</table>

</div>


</div>


</x-app-layout>