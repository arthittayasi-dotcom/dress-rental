<nav x-data="{ open: false }" class="bg-white border-b border-[#EEE8F6]"> 
 
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> 
 
        <div class="flex justify-between h-16"> 
 
            {{-- LOGO --}} 
            <div class="flex items-center"> 
 
                <a href="{{ url('/') }}" 
                   class="text-xl font-semibold text-[#7766A8]"> 
 
                    Dress Rental 
 
                </a> 
 
            </div> 
 
 
 
            {{-- MENU --}} 
            <div class="hidden sm:flex sm:items-center sm:gap-8"> 
 
                @auth 
 
                    {{-- CUSTOMER --}} 
                    @if(auth()->user()->role === 'customer') 
 
                        <a href="{{ route('customer.home') }}" 
                           class="text-sm font-medium text-slate-600 hover:text-[#7766A8]"> 
 
                            หน้าหลัก 
 
                        </a> 
 
                        <a href="{{ route('customer.rentals') }}" 
                           class="text-sm font-medium text-slate-600 hover:text-[#7766A8]"> 
 
                            การเช่าของฉัน 
 
                        </a> 
                    @endif 
 
 
 
                    {{-- OWNER --}} 
                    @if(auth()->user()->role === 'owner') 
 
                        <a href="{{ route('owner.dashboard') }}" 
                           class="text-sm font-medium text-slate-600 hover:text-[#7766A8]"> 
 
                            แดชบอร์ด 
 
                        </a> 
 
                        <a href="{{ route('owner.reports') }}" 
                           class="text-sm font-medium text-slate-600 hover:text-[#7766A8]"> 
 
                            รายงาน 
 
                        </a> 
 
                        <a href="{{ route('owner.users') }}" 
                           class="text-sm font-medium text-slate-600 hover:text-[#7766A8]"> 
 
                            ผู้ใช้งาน 
 
                        </a> 

                        <a href="{{ route('owner.history') }}"
                            class="text-sm font-medium text-slate-600 hover:text-[#7766A8]"> 
                            ประวัติการเช่า
                        </a>
                    @endif 
 
 
 
                    {{-- ADMIN --}} 
                    @if(auth()->user()->role === 'admin') 
 
                        <a href="{{ route('admin.dashboard') }}" 
                           class="text-sm font-medium text-slate-600 hover:text-[#7766A8]"> 
 
                            แดชบอร์ด 
 
                        </a> 
 
 
 
                        <a href="{{ route('admin.rentals') }}" 
                           class="text-sm font-medium text-slate-600 hover:text-[#7766A8]"> 
 
                            รายการเช่า 
 
                        </a> 
 
 
 
                        <a href="{{ route('admin.dresses') }}" 
                           class="text-sm font-medium text-slate-600 hover:text-[#7766A8]"> 
 
                            จัดการชุด 
 
                        </a> 
                        
                        <a href="{{ route('admin.calendar') }}"
                            class="text-sm font-medium text-slate-600 hover:text-[#7766A8]">

                            ปฏิทินคิวชุด

                        </a>
 
 
                        <a href="{{ route('admin.returns') }}" 
                           class="text-sm font-medium text-slate-600 hover:text-[#7766A8]"> 
 
                            ตรวจสอบคืนชุด 
 
                        </a> 
 
 
 
                        <a href="{{ route('admin.history') }}" 
                           class="text-sm font-medium text-slate-600 hover:text-[#7766A8]"> 
 
                            ประวัติ 
 
                        </a> 
 
                    @endif 
 
                @endauth 
 
            </div> 
 
 
 
            {{-- USER AREA --}} 
            <div class="hidden sm:flex sm:items-center"> 
 
                @auth 
 
                    <div class="mr-4 text-right"> 
 
                        <p class="text-sm font-semibold text-slate-700"> 
 
                            {{ auth()->user()->name }} 
 
                        </p> 
 
                        <p class="text-xs text-slate-400"> 
 
                            {{ auth()->user()->role }} 
 
                        </p> 
 
                    </div> 
 
 
 
                    <a href="{{ route('profile.edit') }}" 
                       class="px-4 py-2 rounded-xl text-sm bg-[#F5F0FF] text-[#7766A8]"> 
 
                        โปรไฟล์ 
 
                    </a> 
 
 
 
                    @if(auth()->user()->role === 'customer') 
 
                        <form method="POST" 
                              action="{{ route('logout') }}" 
                              class="ml-3"> 
 
                            @csrf 
 
                            <button type="submit" 
                                    class="px-5 py-2 rounded-xl text-sm text-white bg-gradient-to-r from-[#87BFE8] via-[#A89CCF] to-[#DEA9BF]"> 
 
                                ออกจากระบบ 
 
                            </button> 
 
                        </form> 
 
                    @else 
 
                        <form method="POST" 
                              action="{{ route('staff.logout') }}" 
                              class="ml-3"> 
 
                            @csrf 
 
                            <button type="submit" 
                                    class="px-5 py-2 rounded-xl text-sm text-white bg-gradient-to-r from-[#87BFE8] via-[#A89CCF] to-[#DEA9BF]"> 
 
                                ออกจากระบบ 
 
                            </button> 
 
                        </form> 
 
                    @endif 
 
                @endauth 
 
            </div> 
 
        </div> 
 
    </div> 
 
</nav>