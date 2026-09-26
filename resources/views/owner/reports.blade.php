<x-app-layout>


<div class="max-w-7xl mx-auto px-6 py-10">



<div class="mb-8 flex justify-between items-start">


<div>

<p class="text-sm tracking-widest text-[#9B8AC9]">
OWNER REPORT
</p>


<h1 class="text-3xl font-semibold text-slate-800 mt-2">
รายงานร้านเช่าชุด
</h1>


<p class="text-slate-500 mt-2">
ภาพรวมรายได้และข้อมูลการเช่า
</p>


</div>





<a href="{{ route('owner.reports.pdf') }}"
class="px-5 py-3 rounded-xl bg-[#EEE7FF] text-[#7766A8] font-medium hover:bg-[#E4D9FF]">

📄 Export PDF

</a>



</div>









{{-- SUMMARY --}}

<div class="grid md:grid-cols-4 gap-5 mb-8">



<div class="bg-white rounded-[28px] border p-6">


<p class="text-sm text-slate-400">
รายได้รวม
</p>


<p class="text-3xl font-semibold text-[#7766A8] mt-3">

{{ number_format($totalSales,2) }}

</p>


<span class="text-sm text-slate-400">
บาท
</span>


</div>







<div class="bg-white rounded-[28px] border p-6">


<p class="text-sm text-slate-400">
จำนวนการเช่า
</p>


<p class="text-3xl font-semibold text-[#4F8DBA] mt-3">

{{ $totalRentals }}

</p>


<span class="text-sm text-slate-400">
รายการ
</span>


</div>







<div class="bg-white rounded-[28px] border p-6">


<p class="text-sm text-slate-400">
รายได้วันนี้
</p>


<p class="text-3xl font-semibold text-[#67A88B] mt-3">

{{ number_format($todaySales,2) }}

</p>


<span class="text-sm text-slate-400">
บาท
</span>


</div>







<div class="bg-white rounded-[28px] border p-6">


<p class="text-sm text-slate-400">
รายได้เดือนนี้
</p>


<p class="text-3xl font-semibold text-[#C26B7A] mt-3">

{{ number_format($monthSales,2) }}

</p>


<span class="text-sm text-slate-400">
บาท
</span>


</div>



</div>









{{-- POPULAR DRESS --}}


<div class="bg-white rounded-[30px] border p-6 mb-8">


<h2 class="text-xl font-semibold text-slate-800">

ชุดยอดนิยม

</h2>



<div class="mt-4">



@if($popularDress && $popularDress->dress)


<p class="text-lg font-semibold">

{{ $popularDress->dress->name }}

</p>



<p class="text-sm text-slate-500">

ถูกเช่า {{ $popularDress->total }} ครั้ง

</p>



@else


<p class="text-slate-400">

ยังไม่มีข้อมูล

</p>



@endif



</div>



</div>









{{-- LATEST RENTALS --}}


<div class="bg-white rounded-[30px] border overflow-hidden">



<div class="p-6">

<h2 class="text-xl font-semibold">

รายการเช่าล่าสุด

</h2>


</div>








<table class="w-full">



<thead class="bg-[#FBF8FF]">



<tr class="text-left">


<th class="px-6 py-4">
ชุด
</th>



<th class="px-6 py-4">
ลูกค้า
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



@forelse($latestRentals as $rental)



<tr class="border-t">



<td class="px-6 py-4">

{{ $rental->dress->name ?? '-' }}

</td>





<td class="px-6 py-4">

{{ $rental->user->name ?? '-' }}

</td>





<td class="px-6 py-4">

{{ number_format($rental->total_price,2) }}

บาท

</td>





<td class="px-6 py-4">


@if($rental->status == 'approved')

<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

อนุมัติแล้ว

</span>


@elseif($rental->status == 'renting')


<span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm">

กำลังเช่า

</span>


@elseif($rental->status == 'returned')


<span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-sm">

คืนแล้ว

</span>


@else


{{ $rental->status }}


@endif


</td>




</tr>



@empty



<tr>


<td colspan="4"
class="text-center py-10 text-slate-400">


ยังไม่มีรายการ


</td>


</tr>



@endforelse




</tbody>



</table>



</div>





</div>


</x-app-layout>