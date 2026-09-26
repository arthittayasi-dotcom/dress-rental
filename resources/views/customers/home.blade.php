<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-medium tracking-[0.2em] uppercase text-[#9B8AC9]">
                Dress Rental
            </p>

            <h2 class="mt-2 text-3xl font-semibold text-slate-800">
                เช่าชุด
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                เลือกชุดที่ต้องการและระบุวันที่เช่า
            </p>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gradient-to-br from-[#FCFAFF] via-[#F8F6FF] to-[#FFF8FB] py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">


            {{-- ERROR FROM SERVER --}}
            @if(session('error'))
                <div class="rounded-[24px]
                            border border-[#F0D8DF]
                            bg-[#FFF7F8]
                            px-6 py-4
                            text-sm text-[#B76575]">

                    {{ session('error') }}

                </div>
            @endif


            {{-- VALIDATION ERROR --}}
            @if($errors->any())
                <div class="rounded-[24px]
                            border border-[#F0D8DF]
                            bg-[#FFF7F8]
                            px-6 py-4">

                    <p class="text-sm font-semibold text-[#B76575]">
                        ไม่สามารถส่งคำขอเช่าได้
                    </p>

                    <ul class="mt-2 space-y-1 text-sm text-[#B76575]">
                        @foreach($errors->all() as $error)
                            <li>
                                • {{ $error }}
                            </li>
                        @endforeach
                    </ul>

                </div>
            @endif



            {{-- HERO --}}
<section class="rounded-[34px]
                bg-gradient-to-r
                from-[#EDF7FF]
                via-[#F5F0FF]
                to-[#FFF0F6]
                border border-white
                shadow-[0_18px_45px_rgba(120,90,170,0.08)]
                p-8 md:p-10">

    {{-- หัวข้อ --}}
    <div class="mb-8">

        <span class="inline-flex rounded-full
                     bg-white/80
                     px-4 py-2
                     text-xs font-medium
                     text-[#8D78BD]
                     shadow-sm">

            Dress Collection

        </span>

        <h1 class="mt-5 text-3xl md:text-4xl font-semibold text-slate-800">
            เลือกชุดที่ใช่สำหรับวันพิเศษของคุณ
        </h1>

        <p class="mt-4 text-slate-600 leading-7 max-w-2xl">
            เลือกชุดที่ต้องการ ระบุวันที่เริ่มเช่าและวันที่คืน
            ระบบจะตรวจสอบวันว่างก่อนบันทึกคำขอเช่า
        </p>

    </div>


{{-- วิธีเช่า + กฎและเงื่อนไข --}}
<div class="mt-8 space-y-6">

    {{-- วิธีเช่า --}}
    <div class="rounded-[28px]
                bg-white/90
                border border-white
                shadow-[0_10px_30px_rgba(120,90,170,0.06)]
                p-7">

        <div class="flex items-center justify-between mb-6">

            <div>
                <p class="text-sm font-semibold text-[#8D78BD]">
                    วิธีเช่า
                </p>

                <p class="mt-1 text-xs text-slate-400">
                    เช่าชุดง่าย ๆ เพียง 3 ขั้นตอน
                </p>
            </div>

            <span class="text-xs text-slate-400">
                3 Steps
            </span>

        </div>


        {{-- 3 ขั้นตอน --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            {{-- 1 --}}
            <div class="relative
                        rounded-2xl
                        bg-[#F7FBFF]
                        border border-[#E7F2FA]
                        p-5">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10
                                rounded-full
                                bg-[#EDF7FF]
                                text-[#4F8DBA]
                                font-semibold
                                flex items-center justify-center
                                shrink-0">
                        1
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-slate-700">
                            เลือกชุด
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            เลือกจากรายการด้านล่าง
                        </p>
                    </div>

                </div>

            </div>


            {{-- 2 --}}
            <div class="relative
                        rounded-2xl
                        bg-[#FAF8FF]
                        border border-[#EEE8F6]
                        p-5">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10
                                rounded-full
                                bg-[#F3F0FA]
                                text-[#7766A8]
                                font-semibold
                                flex items-center justify-center
                                shrink-0">
                        2
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-slate-700">
                            เลือกวันที่
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            ระบุวันเริ่มเช่าและวันคืน
                        </p>
                    </div>

                </div>

            </div>


            {{-- 3 --}}
            <div class="relative
                        rounded-2xl
                        bg-[#FFF8FA]
                        border border-[#F6E7ED]
                        p-5">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10
                                rounded-full
                                bg-[#FFF1F7]
                                text-[#C56690]
                                font-semibold
                                flex items-center justify-center
                                shrink-0">
                        3
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-slate-700">
                            รอการอนุมัติ
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Admin ตรวจสอบคำขอ
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>


   {{-- กฎและเงื่อนไข --}}
<div class="rounded-[28px]
            bg-white/90
            border border-white
            shadow-[0_10px_30px_rgba(120,90,170,0.06)]
            p-7">

    <div class="flex items-center justify-between mb-6">

        <div>
            <p class="text-sm font-semibold text-[#8D78BD]">
                กฎและเงื่อนไขการเช่าชุด
            </p>

            <p class="mt-1 text-xs text-slate-400">
                กรุณาอ่านก่อนทำรายการเช่า
            </p>
        </div>

    </div>


    {{-- กฎ 3 ข้อ --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">


        {{-- การจอง --}}
        <div class="rounded-2xl
                    bg-[#F8F5FF]
                    p-5">

            <h3 class="font-semibold text-[#7766A8]">
                การคืนชุด & ความเสียหาย
                
            </h3>

            <p class="mt-3 text-sm text-slate-600 leading-6">
                • คราบซักไม่ออก: จุดเล็ก ปรับ 20–50 บาท / จุดใหญ่ ปรับ 100 บาท<br>
                • ชุดขาด / อะไหล่หาย / ห้ามแก้ทรงเอง: ปรับตามความเสียหาย เริ่มต้น 50 บาท<br>
                • กรณีต้องซื้อชุดใหม่ 2 เท่าของราคาชุด<br>
                • คราบดูใหญ่จนน่าเกลียด<br>
                • คราบประจำเดือน / ตกขาว<br>
                • ชุดเสียหายจนปล่อยเช่าต่อไม่ได้<br>
            </p>

        </div>


        {{-- เวลารับและคืน --}}
        <div class="rounded-2xl
                    bg-[#FFF7FA]
                    p-5">

            <h3 class="font-semibold text-[#C56690]">
                เวลารับ - คืนชุด
            </h3>

            <p class="mt-3 text-sm text-slate-600 leading-6">
                • รับชุดได้ตั้งแต่เวลา 08:00 น.<br>
                • คืนชุดภายในเวลา 18:00 น. วันที่ทำการนัดคืน<br>
                • กรุณาคืนชุดตามวันที่นัดกำหนด
               
            </p>

        </div>


        {{-- ค่าปรับ --}}
        <div class="rounded-2xl
                    bg-[#EDF7FF]
                    p-5">

            <h3 class="font-semibold text-[#4F8DBA]">
                ค่าปรับคืนล่าช้า
            </h3>

            <p class="mt-3 text-sm text-slate-600 leading-6">
                • คืนชุดเกินเวลาที่กำหนด<br>
                • ค่าปรับ <span class="font-semibold text-[#4F8DBA]">
                    40 บาท / ชั่วโมง
                </span><br>
                • หากเกินเวลาโดยไม่แจ้งร้าน<br>ทางร้านขอสงวนสิทธิ์คิดค่าปรับตามเวลาที่เกินจริง
            </p>

        </div>


    </div>

</div>
</section>

            {{-- COLLECTION HEADER --}}
            <section>

                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">

                    <div>

                        <p class="text-sm font-medium text-[#9B8AC9]">
                            Collection
                        </p>

                        <h2 class="mt-1 text-2xl font-semibold text-slate-800">
                            ชุดทั้งหมด
                        </h2>

                        <p class="mt-2 text-sm text-slate-500">
                            พบ {{ $dresses->count() }} ชุด
                        </p>

                    <div class="flex gap-3 mt-6">




<a href="{{ route('customer.rentals') }}"
class="px-6 py-3 rounded-2xl bg-white border text-[#7766A8]">

การเช่าของฉัน

</a>


</div>

            </section>



            {{-- DRESS LIST --}}
            @if($dresses->count() > 0)

                <section class="grid grid-cols-1
                                sm:grid-cols-2
                                lg:grid-cols-3
                                xl:grid-cols-4
                                gap-6">


                    @foreach($dresses as $dress)

                        <article class="rounded-[28px]
                                        bg-white
                                        border border-[#EEE8F6]
                                        shadow-[0_12px_35px_rgba(120,90,170,0.07)]
                                        overflow-hidden
                                        transition
                                        hover:-translate-y-1
                                        hover:shadow-lg">


                            {{-- IMAGE --}}
                            <div class="aspect-[4/5]
                                        relative
                                        overflow-hidden
                                        bg-gradient-to-br
                                        from-[#EDF7FF]
                                        via-[#F5F0FF]
                                        to-[#FFF0F6]">


                                @if($dress->image)

                                    <img
                                        src="{{ asset('storage/' . $dress->image) }}"
                                        alt="{{ $dress->name }}"
                                        class="w-full h-full object-cover"
                                    >

                                @else

                                    <div class="absolute inset-0 flex items-center justify-center">

                                        <div class="text-center">

                                            <div class="w-20 h-20
                                                        mx-auto
                                                        rounded-full
                                                        bg-white/70
                                                        flex items-center
                                                        justify-center
                                                        shadow-sm">

                                                <span class="text-sm font-semibold text-[#8D78BD]">
                                                    {{ $dress->code }}
                                                </span>

                                            </div>

                                            <p class="mt-3 text-xs text-slate-400">
                                                Dress Image
                                            </p>

                                        </div>

                                    </div>

                                @endif



                                {{-- CODE --}}
                                <div class="absolute top-4 left-4">

                                    <span class="rounded-full
                                                 bg-white/90
                                                 backdrop-blur
                                                 px-3 py-1.5
                                                 text-xs font-semibold
                                                 text-[#7766A8]
                                                 shadow-sm">

                                        {{ $dress->code }}

                                    </span>

                                </div>



                                {{-- STATUS --}}
                                <div class="absolute top-4 right-4">

                                    @if($dress->status === 'available')

                                        <span class="rounded-full
                                                     bg-[#ECFDF5]
                                                     px-3 py-1.5
                                                     text-xs font-medium
                                                     text-[#378566]">

                                            พร้อมให้เช่า

                                        </span>

                                    @elseif($dress->status === 'booked')

                                        <span class="rounded-full
                                                     bg-[#FFF1F7]
                                                     px-3 py-1.5
                                                     text-xs font-medium
                                                     text-[#C56690]">

                                            ถูกจอง

                                        </span>

                                    @elseif($dress->status === 'rented')

                                        <span class="rounded-full
                                                     bg-[#F0EDFF]
                                                     px-3 py-1.5
                                                     text-xs font-medium
                                                     text-[#7766A8]">

                                            กำลังเช่า

                                        </span>

                                    @elseif($dress->status === 'returning')

                                        <span class="rounded-full
                                                     bg-[#EDF7FF]
                                                     px-3 py-1.5
                                                     text-xs font-medium
                                                     text-[#4F8DBA]">

                                            รอรับคืน

                                        </span>

                                    @elseif($dress->status === 'maintenance')

                                        <span class="rounded-full
                                                     bg-[#FFF7E8]
                                                     px-3 py-1.5
                                                     text-xs font-medium
                                                     text-[#B97A32]">

                                            ไม่พร้อมใช้งาน

                                        </span>

                                    @else

                                        <span class="rounded-full
                                                     bg-white
                                                     px-3 py-1.5
                                                     text-xs font-medium
                                                     text-slate-500">

                                            ตรวจสอบสถานะ

                                        </span>

                                    @endif

                                </div>

                            </div>



                            {{-- CONTENT --}}
                            <div class="p-6">

                                <h3 class="text-lg font-semibold text-slate-800">
                                    {{ $dress->name }}
                                </h3>


                                <div class="mt-3 flex flex-wrap gap-2">

                                    @if($dress->size)

                                        <span class="rounded-full
                                                     bg-[#F8F6FC]
                                                     px-3 py-1
                                                     text-xs text-slate-500">

                                            Size {{ $dress->size }}

                                        </span>

                                    @endif


                                    @if($dress->type)

                                        <span class="rounded-full
                                                     bg-[#F8F6FC]
                                                     px-3 py-1
                                                     text-xs text-slate-500">

                                            {{ $dress->type }}

                                        </span>

                                    @endif

                                </div>


                                @if($dress->description)

                                    <p class="mt-4 text-sm leading-6 text-slate-500">
                                        {{ $dress->description }}
                                    </p>

                                @endif


                                <div class="mt-5">

                                    <p class="text-xs text-slate-400">
                                        ราคาเช่า
                                    </p>

                                    <p class="mt-1 text-xl font-semibold text-[#7766A8]">

                                        {{ number_format($dress->price_per_day, 0) }} ฿

                                        <span class="text-xs font-normal text-slate-400">
                                            / วัน
                                        </span>

                                    </p>

                                </div>



                                {{-- SELECT --}}
                                <button
                                    type="button"

                                    data-id="{{ $dress->id }}"
                                    data-code="{{ $dress->code }}"
                                    data-name="{{ $dress->name }}"
                                    data-size="{{ $dress->size }}"
                                    data-type="{{ $dress->type }}"
                                    data-price="{{ $dress->price_per_day }}"
                                    data-status="{{ $dress->status }}"

                                    onclick="selectDress(this)"

                                    class="mt-6 w-full
                                           rounded-2xl
                                           px-5 py-3
                                           text-sm font-medium
                                           transition
                                           {{ $dress->status === 'maintenance'
                                               ? 'bg-slate-100 text-slate-400 cursor-not-allowed'
                                               : 'bg-gradient-to-r from-[#87BFE8] via-[#A89CCF] to-[#DEA9BF] text-white hover:opacity-90 shadow-sm' }}"

                                    {{ $dress->status === 'maintenance' ? 'disabled' : '' }}
                                >

                                    {{ $dress->status === 'maintenance'
                                        ? 'ไม่พร้อมให้เช่า'
                                        : 'เลือกชุดนี้' }}

                                </button>

                            </div>

                        </article>

                    @endforeach


<div class="flex justify-center items-center py-8 min-h-[100px]">

    {{ $dresses->links() }}

</div>


</section>

            @else

                <section class="rounded-[30px]
                                bg-white
                                border border-[#EEE8F6]
                                p-12
                                text-center
                                shadow-sm">

                    <h3 class="text-xl font-semibold text-slate-700">
                        ยังไม่มีชุดในระบบ
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        กรุณาเพิ่มข้อมูลชุดก่อน
                    </p>

                </section>

            @endif



            {{-- RENTAL FORM --}}
            <section id="rentalForm"
                     class="rounded-[34px]
                            bg-white
                            border border-[#EEE8F6]
                            shadow-[0_16px_40px_rgba(120,90,170,0.08)]
                            p-7 md:p-9">


                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">


                    {{-- SELECTED DRESS --}}
                    <div>

                        <p class="text-sm font-medium text-[#9B8AC9]">
                            Selected Dress
                        </p>

                        <h2 class="mt-1 text-2xl font-semibold text-slate-800">
                            ชุดที่เลือก
                        </h2>


                        <div id="noDressSelected"
                             class="mt-6
                                    rounded-[24px]
                                    bg-[#FAF8FF]
                                    border border-[#EEE8F6]
                                    p-6">

                            <p class="text-sm font-medium text-slate-600">
                                ยังไม่ได้เลือกชุด
                            </p>

                            <p class="mt-2 text-xs leading-5 text-slate-400">
                                กด “เลือกชุดนี้” จากรายการด้านบน
                            </p>

                        </div>



                        <div id="selectedDressBox"
                             class="hidden
                                    mt-6
                                    rounded-[24px]
                                    bg-gradient-to-br
                                    from-[#F2FAFF]
                                    via-[#FAF7FF]
                                    to-[#FFF7FA]
                                    border border-[#E9E2F3]
                                    p-6">


                            <span id="selectedDressCode"
                                  class="rounded-full
                                         bg-white
                                         px-3 py-1
                                         text-xs font-semibold
                                         text-[#7766A8]">
                            </span>


                            <h3 id="selectedDressName"
                                class="mt-4 text-lg font-semibold text-slate-800">
                            </h3>


                            <p id="selectedDressDetail"
                               class="mt-2 text-sm text-slate-500">
                            </p>


                            <p class="mt-5 text-xs text-slate-400">
                                ราคาเช่า
                            </p>

                            <p id="selectedDressPrice"
                               class="mt-1 text-2xl font-semibold text-[#7766A8]">
                            </p>

                        </div>

                    </div>



                    {{-- BOOKING FORM --}}
                    <div class="lg:col-span-2">

                        <p class="text-sm font-medium text-[#9B8AC9]">
                            Booking
                        </p>

                        <h2 class="mt-1 text-2xl font-semibold text-slate-800">
                            ระบุวันที่เช่า
                        </h2>

                        <p class="mt-2 text-sm text-slate-500">
                            หลังจากส่งคำขอแล้ว สถานะจะเป็น “รออนุมัติ”
                        </p>



                        <form
                            id="bookingForm"
                            action="{{ route('customer.rentals.store') }}"
                            method="POST"
                            class="mt-7"
                        >

                            @csrf


                            <input
                                type="hidden"
                                name="dress_id"
                                id="dress_id"
                                value="{{ old('dress_id') }}"
                            >



                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                {{-- START DATE --}}
                                <div>

                                    <label for="start_date"
                                           class="block mb-2 text-sm font-medium text-slate-700">

                                        วันที่เริ่มเช่า

                                    </label>

                                    <input
                                        id="start_date"
                                        name="start_date"
                                        type="date"
                                        value="{{ old('start_date') }}"
                                        required

                                        class="w-full
                                               rounded-2xl
                                               border border-[#DDD9E8]
                                               bg-[#FCFBFE]
                                               px-4 py-3
                                               text-slate-700
                                               focus:border-[#A89CCF]
                                               focus:ring-4
                                               focus:ring-[#EEEAF8]"
                                    >

                                </div>



                                {{-- END DATE --}}
                                <div>

                                    <label for="end_date"
                                           class="block mb-2 text-sm font-medium text-slate-700">

                                        วันที่คืน

                                    </label>

                                    <input
                                        id="end_date"
                                        name="end_date"
                                        type="date"
                                        value="{{ old('end_date') }}"
                                        required

                                        class="w-full
                                               rounded-2xl
                                               border border-[#DDD9E8]
                                               bg-[#FCFBFE]
                                               px-4 py-3
                                               text-slate-700
                                               focus:border-[#A89CCF]
                                               focus:ring-4
                                               focus:ring-[#EEEAF8]"
                                    >

                                </div>

                            </div>



                            {{-- SUMMARY --}}
                            <div id="bookingSummary"
                                 class="hidden
                                        mt-6
                                        rounded-[24px]
                                        bg-[#FAF8FF]
                                        border border-[#EEE8F6]
                                        p-5">

                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">


                                    <div>

                                        <p class="text-xs text-slate-400">
                                            จำนวนวัน
                                        </p>

                                        <p id="summaryDays"
                                           class="mt-1 text-lg font-semibold text-slate-700">

                                            -

                                        </p>

                                    </div>



                                    <div>

                                        <p class="text-xs text-slate-400">
                                            ราคาต่อวัน
                                        </p>

                                        <p id="summaryPrice"
                                           class="mt-1 text-lg font-semibold text-slate-700">

                                            -

                                        </p>

                                    </div>



                                    <div>

                                        <p class="text-xs text-slate-400">
                                            ยอดรวม
                                        </p>

                                        <p id="summaryTotal"
                                           class="mt-1 text-lg font-semibold text-[#7766A8]">

                                            -

                                        </p>

                                    </div>

                                </div>

                            </div>



                            {{-- JS ERROR --}}
                            <p id="bookingError"
                               class="hidden
                                      mt-5
                                      rounded-2xl
                                      bg-[#FFF7F8]
                                      border border-[#F0D8DF]
                                      px-4 py-3
                                      text-sm
                                      text-[#B76575]">
                            </p>



                            {{-- BUTTONS --}}
                            <div class="mt-7 flex flex-col sm:flex-row gap-3">

                                <button
                                    type="submit"
                                    class="inline-flex
                                           justify-center
                                           rounded-2xl
                                           px-7 py-3.5
                                           text-sm font-medium
                                           text-white
                                           bg-gradient-to-r
                                           from-[#87BFE8]
                                           via-[#A89CCF]
                                           to-[#DEA9BF]
                                           shadow-md
                                           hover:opacity-90
                                           transition">

                                    ส่งคำขอเช่า

                                </button>



                                <button
                                    type="button"
                                    onclick="clearSelection()"
                                    class="inline-flex
                                           justify-center
                                           rounded-2xl
                                           border border-[#DED6EC]
                                           bg-white
                                           px-7 py-3.5
                                           text-sm font-medium
                                           text-[#7766A8]
                                           hover:bg-[#F8F5FC]
                                           transition">

                                    ล้างข้อมูล

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </section>

        </div>

    </div>



    <script>

        let selectedDress = null;


        function selectDress(button) {

            selectedDress = {
                id: button.dataset.id,
                code: button.dataset.code,
                name: button.dataset.name,
                size: button.dataset.size,
                type: button.dataset.type,
                price: Number(button.dataset.price),
                status: button.dataset.status
            };


            document.getElementById('dress_id').value =
                selectedDress.id;


            document.getElementById('selectedDressCode').textContent =
                selectedDress.code;


            document.getElementById('selectedDressName').textContent =
                selectedDress.name;


            let details = [];


            if (selectedDress.size) {
                details.push('Size ' + selectedDress.size);
            }


            if (selectedDress.type) {
                details.push(selectedDress.type);
            }


            document.getElementById('selectedDressDetail').textContent =
                details.join(' · ');


            document.getElementById('selectedDressPrice').textContent =
                selectedDress.price.toLocaleString('th-TH')
                + ' ฿ / วัน';


            document.getElementById('noDressSelected')
                .classList.add('hidden');


            document.getElementById('selectedDressBox')
                .classList.remove('hidden');


            document.getElementById('bookingError')
                .classList.add('hidden');


            calculateBooking();


            document.getElementById('rentalForm')
                .scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

        }



        function calculateBooking() {

            const startValue =
                document.getElementById('start_date').value;


            const endValue =
                document.getElementById('end_date').value;


            if (!selectedDress || !startValue || !endValue) {

                document.getElementById('bookingSummary')
                    .classList.add('hidden');

                return;

            }


            const start =
                new Date(startValue + 'T00:00:00');


            const end =
                new Date(endValue + 'T00:00:00');


            if (end < start) {

                document.getElementById('bookingSummary')
                    .classList.add('hidden');

                return;

            }


            const oneDay =
                1000 * 60 * 60 * 24;


            const days =
                Math.floor(
                    (end - start) / oneDay
                );


            const total =
                days * selectedDress.price;


            document.getElementById('summaryDays').textContent =
                days + ' วัน';


            document.getElementById('summaryPrice').textContent =
                selectedDress.price.toLocaleString('th-TH')
                + ' ฿';


            document.getElementById('summaryTotal').textContent =
                total.toLocaleString('th-TH')
                + ' ฿';


            document.getElementById('bookingSummary')
                .classList.remove('hidden');

        }



        function clearSelection() {

            selectedDress = null;


            document.getElementById('bookingForm').reset();


            document.getElementById('dress_id').value = '';


            document.getElementById('selectedDressBox')
                .classList.add('hidden');


            document.getElementById('noDressSelected')
                .classList.remove('hidden');


            document.getElementById('bookingSummary')
                .classList.add('hidden');


            document.getElementById('bookingError')
                .classList.add('hidden');

        }



        document.getElementById('start_date')
            .addEventListener('change', function () {

                document.getElementById('end_date').min =
                    this.value;

                calculateBooking();

            });



        document.getElementById('end_date')
            .addEventListener(
                'change',
                calculateBooking
            );



        document.getElementById('bookingForm')
            .addEventListener('submit', function (event) {

                const dressId =
                    document.getElementById('dress_id').value;


                const startDate =
                    document.getElementById('start_date').value;


                const endDate =
                    document.getElementById('end_date').value;


                const error =
                    document.getElementById('bookingError');


                error.classList.add('hidden');


                if (!dressId) {

                    event.preventDefault();


                    error.textContent =
                        'กรุณาเลือกชุดก่อนส่งคำขอเช่า';


                    error.classList.remove('hidden');

                    return;

                }


                if (!startDate || !endDate) {

                    event.preventDefault();


                    error.textContent =
                        'กรุณาระบุวันที่เริ่มเช่าและวันที่คืน';


                    error.classList.remove('hidden');

                    return;

                }


                if (new Date(endDate) < new Date(startDate)) {

                    event.preventDefault();


                    error.textContent =
                        'วันที่คืนต้องไม่น้อยกว่าวันที่เริ่มเช่า';


                    error.classList.remove('hidden');

                }

            });



        const today =
            new Date().toISOString().split('T')[0];


        document.getElementById('start_date').min =
            today;


        document.getElementById('end_date').min =
            today;

    </script>

</x-app-layout>
<section class="mt-12">

<div class="bg-white rounded-[32px]
border border-[#EEE8F6]
p-8">


<div class="flex items-center gap-3">

<div class="w-10 h-10 rounded-2xl
bg-[#FFF1F7]
flex items-center justify-center">




</div>


</div>

</section>