<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <p class="text-sm tracking-[0.3em] uppercase text-[#8C80B4] font-medium">
                    Dress Rental
                </p>

                <h1 class="mt-4 text-3xl font-semibold text-slate-800">
                    Staff Login
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    สำหรับเจ้าของร้านและผู้ดูแลระบบ
                </p>
            </div>

            <div class="bg-white rounded-[28px] border border-[#E9E4F4]
                        shadow-[0_18px_55px_rgba(102,91,140,0.10)] p-8">

                <form method="POST" action="{{ route('staff.login.store') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-3">
                            ประเภทบัญชี
                        </label>

                        <div class="grid grid-cols-2 gap-3">

                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    name="role"
                                    value="owner"
                                    class="peer sr-only"
                                    {{ old('role', 'owner') === 'owner' ? 'checked' : '' }}
                                >

                                <div class="rounded-2xl border border-[#E6DDF5]
                                            bg-[#FBF8FF] px-3 py-4 text-center
                                            peer-checked:border-[#9D8BD0]
                                            peer-checked:ring-2
                                            peer-checked:ring-[#E6DDF5]
                                            transition">

                                    <p class="text-sm font-semibold text-[#7C6AA8]">
                                        เจ้าของร้าน
                                    </p>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    name="role"
                                    value="admin"
                                    class="peer sr-only"
                                    {{ old('role') === 'admin' ? 'checked' : '' }}
                                >

                                <div class="rounded-2xl border border-[#F4DCE8]
                                            bg-[#FFF8FB] px-3 py-4 text-center
                                            peer-checked:border-[#D68AAE]
                                            peer-checked:ring-2
                                            peer-checked:ring-[#F4DCE8]
                                            transition">

                                    <p class="text-sm font-semibold text-[#C16C94]">
                                        แอดมิน
                                    </p>
                                </div>
                            </label>

                        </div>
                    </div>

                    <div>
                        <label for="username"
                               class="block text-sm font-medium text-slate-700 mb-2">
                            ชื่อผู้ใช้
                        </label>

                        <input
                            id="username"
                            type="text"
                            name="username"
                            value="{{ old('username') }}"
                            required
                            autofocus
                            placeholder="กรอกชื่อผู้ใช้"
                            class="w-full rounded-2xl border border-[#DDD9E8]
                                   bg-[#FCFBFE] px-4 py-3 text-slate-800
                                   focus:border-[#A89CCF]
                                   focus:ring-4 focus:ring-[#EEEAF8]"
                        >

                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <div>
                        <label for="password"
                               class="block text-sm font-medium text-slate-700 mb-2">
                            รหัสผ่าน
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="กรอกรหัสผ่าน"
                            class="w-full rounded-2xl border border-[#DDD9E8]
                                   bg-[#FCFBFE] px-4 py-3 text-slate-800
                                   focus:border-[#A89CCF]
                                   focus:ring-4 focus:ring-[#EEEAF8]"
                        >
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-2xl py-3.5 font-medium text-white
                               bg-gradient-to-r
                               from-[#87BFE8]
                               via-[#A89CCF]
                               to-[#DEA9BF]
                               hover:opacity-90 transition shadow-sm"
                    >
                        เข้าสู่ระบบ
                    </button>

                    

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