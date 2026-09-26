<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <p class="text-sm tracking-[0.3em] uppercase text-[#8C80B4] font-medium">
                    Dress Rental
                </p>

                <h1 class="mt-4 text-3xl font-semibold text-slate-800">
                    เข้าสู่ระบบ
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    เข้าสู่ระบบเพื่อใช้งานระบบเช่าชุด
                </p>
            </div>

            <div class="bg-white rounded-[28px] border border-[#E9E4F4]
                        shadow-[0_18px_55px_rgba(102,91,140,0.10)] p-8">

                <x-auth-session-status
                    class="mb-4"
                    :status="session('status')"
                />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label
                            for="username"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            ชื่อผู้ใช้
                        </label>

                        <input
                            id="username"
                            type="text"
                            name="username"
                            value="{{ old('username') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="กรอกชื่อผู้ใช้"
                            class="w-full rounded-2xl border border-[#DDD9E8]
                                   bg-[#FCFBFE] px-4 py-3 text-slate-800
                                   placeholder:text-slate-400
                                   focus:border-[#A89CCF]
                                   focus:ring-4 focus:ring-[#EEEAF8]"
                        >

                        <x-input-error
                            :messages="$errors->get('username')"
                            class="mt-2"
                        />
                    </div>

                    <div>
                        <label
                            for="password"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            รหัสผ่าน
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="กรอกรหัสผ่าน"
                            class="w-full rounded-2xl border border-[#DDD9E8]
                                   bg-[#FCFBFE] px-4 py-3 text-slate-800
                                   placeholder:text-slate-400
                                   focus:border-[#A89CCF]
                                   focus:ring-4 focus:ring-[#EEEAF8]"
                        >

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 text-sm text-slate-500">
                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded border-slate-300
                                       text-[#8C80B4]
                                       focus:ring-[#DCD6EF]"
                            >

                            จดจำฉันไว้
                        </label>
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
                        เข้าสู่ระบบ
                    </button>

                    <div class="text-center pt-2">
                        <span class="text-sm text-slate-500">
                            ยังไม่มีบัญชี?
                        </span>

                        <a
                            href="{{ route('register') }}"
                            class="ml-1 text-sm font-semibold text-[#8C80B4]
                                   hover:text-[#74689E]"
                        >
                            สมัครสมาชิก
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-guest-layout>
<script>

    window.history.pushState(null, "", window.location.href);

    window.onpopstate = function () {

        window.history.pushState(null, "", window.location.href);

    };

</script>