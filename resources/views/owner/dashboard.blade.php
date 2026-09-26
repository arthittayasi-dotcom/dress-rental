<x-app-layout>

<x-slot name="header">

<div>

<p class="text-sm font-medium tracking-[0.2em] uppercase text-[#9B8AC9]">
Owner Dashboard
</p>

<h2 class="mt-2 text-3xl font-semibold text-slate-800">
สรุปยอดขาย
</h2>

<p class="mt-2 text-sm text-slate-500">
ดูยอดขายรายวัน รายเดือน และภาพรวมของร้าน
</p>

</div>

</x-slot>



<div class="min-h-screen bg-gradient-to-br from-[#FCFAFF] via-[#F8F6FF] to-[#FFF8FB] py-10">


<div class="max-w-7xl mx-auto px-6 space-y-8">



{{-- HERO --}}

<section class="rounded-[34px]
bg-gradient-to-r
from-[#EDF7FF]
via-[#F5F0FF]
to-[#FFF0F6]
p-10">


<div class="flex justify-between items-center">


<div>


<span class="rounded-full bg-white px-4 py-2 text-xs text-[#8D78BD]">

Owner

</span>



<h1 class="mt-5 text-4xl font-semibold">

ภาพรวมยอดขายของร้าน

</h1>



<p class="mt-4 text-slate-600">

ติดตามรายได้ จำนวนการเช่า และข้อมูลจากฐานข้อมูลจริง

</p>


</div>



<a href="{{ route('owner.reports') }}"
class="px-7 py-3 rounded-2xl text-white
bg-gradient-to-r from-[#87BFE8] via-[#A89CCF] to-[#DEA9BF]">

ดูรายงานยอดขาย

</a>



</div>


</section>







{{-- STATS --}}


<section class="grid grid-cols-1 md:grid-cols-4 gap-5">



<div class="bg-white rounded-[26px] p-6 border">


<p class="text-slate-500">
ยอดขายวันนี้
</p>


<p class="mt-2 text-3xl font-semibold text-[#4F8DBA]">

{{ number_format($todaySales,2) }}

</p>


<p class="text-sm text-slate-400">

บาท

</p>


</div>





<div class="bg-white rounded-[26px] p-6 border">


<p class="text-slate-500">
ยอดขายเดือนนี้
</p>


<p class="mt-2 text-3xl font-semibold text-[#7766A8]">

{{ number_format($monthSales,2) }}

</p>


<p class="text-sm text-slate-400">

บาท

</p>


</div>






<div class="bg-white rounded-[26px] p-6 border">


<p class="text-slate-500">
ยอดขายเดือนก่อน
</p>


<p class="mt-2 text-3xl font-semibold text-[#D06C96]">

{{ number_format($lastMonthSales,2) }}

</p>


<p class="text-sm text-slate-400">

บาท

</p>


</div>







<div class="bg-white rounded-[26px] p-6 border">


<p class="text-slate-500">
ค่าเฉลี่ย / รายการ
</p>


<p class="mt-2 text-3xl font-semibold text-[#67A88B]">

{{ number_format($averageRental,2) }}

</p>


<p class="text-sm text-slate-400">

บาท

</p>


</div>



</section>
{{-- CHART --}}

<section class="rounded-[30px]
bg-white
border border-[#EEE8F6]
p-7">


<div class="flex justify-between items-center">


<div>

<p class="text-sm font-medium text-[#9B8AC9]">
Monthly Sales
</p>


<h3 class="mt-1 text-2xl font-semibold text-slate-800">
ยอดขาย 7 วันล่าสุด
</h3>


</div>



<a href="{{ route('owner.reports') }}"
class="text-sm text-[#7766A8] hover:underline">

ดูรายละเอียด

</a>


</div>






<div class="mt-8">


@if($chartData->count() > 0)


<div class="flex items-end gap-4 h-[280px]">


@php

$max = $chartData->max() ?: 1;

@endphp



@foreach($chartData as $day=>$amount)


<div class="flex-1 flex flex-col items-center justify-end">


<p class="text-xs text-slate-500 mb-2">

{{ number_format($amount) }}

</p>




<div

class="w-full rounded-t-2xl
bg-gradient-to-t
from-[#9BC9E8]
via-[#AEA1D2]
to-[#E3B1C6]"

style="height: {{ ($amount/$max)*100 }}%">

</div>




<p class="mt-3 text-xs text-slate-400">

{{ $day }}

</p>



</div>


@endforeach



</div>


@else


<div class="text-center py-16 text-slate-400">

ยังไม่มีข้อมูลยอดขาย

</div>


@endif



</div>



</section>









{{-- TODAY DETAIL --}}


<section class="grid grid-cols-1 lg:grid-cols-2 gap-6">





<div class="rounded-[30px]
bg-white
border border-[#EEE8F6]
p-7">


<p class="text-sm font-medium text-[#9B8AC9]">

Today

</p>



<h3 class="mt-1 text-xl font-semibold">

ยอดขายวันนี้

</h3>




<div class="mt-6 space-y-3">





<div class="flex justify-between
rounded-2xl
bg-[#FAF8FF]
px-4 py-4">


<span class="text-slate-500">

จำนวนรายการเช่าวันนี้

</span>



<span class="font-semibold">

{{ $todayRentals }} รายการ

</span>


</div>







<div class="flex justify-between
rounded-2xl
bg-[#F8FBFE]
px-4 py-4">


<span class="text-slate-500">

ยอดขายวันนี้

</span>



<span class="font-semibold text-[#4F8DBA]">

{{ number_format($todaySales,2) }} ฿

</span>


</div>








<div class="flex justify-between
rounded-2xl
bg-[#FFF7FA]
px-4 py-4">


<span class="text-slate-500">

ค่าเฉลี่ยต่อรายการ

</span>



<span class="font-semibold text-[#D06C96]">

{{ number_format($averageRental,2) }} ฿

</span>


</div>




</div>


</div>








<div class="rounded-[30px]
bg-white
border border-[#EEE8F6]
p-7">


<p class="text-sm font-medium text-[#9B8AC9]">

Report

</p>




<h3 class="mt-1 text-xl font-semibold">

ดูยอดขายย้อนหลัง

</h3>




<p class="mt-3 text-sm text-slate-500 leading-6">

เลือกช่วงวันที่เพื่อดูยอดขายย้อนหลัง
รายการเช่า และพิมพ์รายงาน PDF

</p>





<a href="{{ route('owner.reports') }}"

class="mt-6 flex items-center justify-center
rounded-2xl
bg-[#7766A8]
px-6 py-3
text-white">

เปิดรายงานยอดขาย

</a>



</div>






</section>





</div>

</div>


</x-app-layout>