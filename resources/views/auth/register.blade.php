<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <p class="text-sm tracking-[0.3em] uppercase text-[#8C80B4] font-medium">
                    Dress Rental
                </p>

                <h1 class="mt-4 text-3xl font-semibold text-slate-800">
                    สมัครสมาชิก
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    สร้างบัญชีลูกค้าเพื่อเริ่มเช่าชุด
                </p>
            </div>

            <div class="bg-white rounded-[28px] border border-[#E9E4F4]
                        shadow-[0_18px_55px_rgba(102,91,140,0.10)] p-8">

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-2">
                            ชื่อ
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="กรอกชื่อของคุณ"
                            class="w-full rounded-2xl border border-[#DDD9E8]
                                   bg-[#FCFBFE] px-4 py-3 text-slate-800
                                   placeholder:text-slate-400
                                   focus:border-[#A89CCF]
                                   focus:ring-4 focus:ring-[#EEEAF8]"
                        >

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <label for="username" class="block text-sm font-medium text-slate-700 mb-2">
                            ชื่อผู้ใช้
                        </label>

                        <input
                            id="username"
                            type="text"
                            name="username"
                            value="{{ old('username') }}"
                            required
                            autocomplete="username"
                            placeholder="กรอกชื่อผู้ใช้"
                            class="w-full rounded-2xl border border-[#DDD9E8]
                                   bg-[#FCFBFE] px-4 py-3 text-slate-800
                                   placeholder:text-slate-400
                                   focus:border-[#A89CCF]
                                   focus:ring-4 focus:ring-[#EEEAF8]"
                        >

                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                            รหัสผ่าน
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="กรอกรหัสผ่าน"
                            class="w-full rounded-2xl border border-[#DDD9E8]
                                   bg-[#FCFBFE] px-4 py-3 text-slate-800
                                   placeholder:text-slate-400
                                   focus:border-[#A89CCF]
                                   focus:ring-4 focus:ring-[#EEEAF8]"
                        >

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">
                            ยืนยันรหัสผ่าน
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="กรอกรหัสผ่านอีกครั้ง"
                            class="w-full rounded-2xl border border-[#DDD9E8]
                                   bg-[#FCFBFE] px-4 py-3 text-slate-800
                                   placeholder:text-slate-400
                                   focus:border-[#A89CCF]
                                   focus:ring-4 focus:ring-[#EEEAF8]"
                        >
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-2xl py-3.5
                               font-medium text-white
                               bg-gradient-to-r
                               from-[#87BFE8]
                               via-[#A89CCF]
                               to-[#DEA9BF]
                               hover:opacity-90 transition shadow-sm"
                    >
                        สมัครสมาชิก
                    </button>

                    <div class="text-center pt-2">
                        <span class="text-sm text-slate-500">
                            มีบัญชีอยู่แล้ว?
                        </span>

                        <a
                            href="{{ route('login') }}"
                            class="ml-1 text-sm font-semibold text-[#8C80B4]
                                   hover:text-[#74689E]"
                        >
                            เข้าสู่ระบบ
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-guest-layout>