<!-- BEGIN: Top Bar -->
<div
    class="top-bar-boxed relative z-[51] -mx-5 mb-12 mt-12 h-[70px] border-b border-white/[0.08] px-3 sm:-mx-8 sm:px-8 md:-mt-5 md:pt-0">
    <div class="flex h-full items-center">
        <!-- BEGIN: Logo -->
        <a class="-intro-x hidden md:flex" href="">
            <img class="w-6" src="{{ Vite::asset('resources/images/logo.svg') }}"
                alt="Icewall Tailwind Admin Dashboard Template" />
            <span class="ml-3 text-lg text-white"> Pendaftaran Mahasiswa </span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        <x-base.breadcrumb class="-intro-x mr-auto h-full border-white/[0.08] md:ml-10 md:border-l md:pl-10" light>
            <x-base.breadcrumb.link :index="0">Application</x-base.breadcrumb.link>
            <x-base.breadcrumb.link :index="1" :active="true">
                {{ auth()->user()->role }}
            </x-base.breadcrumb.link>
        </x-base.breadcrumb>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Account Menu -->
        <x-base.menu>
            <x-base.menu.button
                class="bg-gradient-to-t bg-slate-200 zoom-in intro-x block h-8 w-8 scale-110 overflow-hidden rounded-full shadow-lg">
            </x-base.menu.button>
            <x-base.menu.items
                class="relative mt-px w-56 bg-theme-1/80 text-white before:absolute before:inset-0 before:z-[-1] before:block before:rounded-md before:bg-black">
                <x-base.menu.header class="font-normal">
                    <div class="font-medium">{{ auth()->user()->name }}</div>
                    <div class="mt-0.5 text-xs text-white/70 dark:text-slate-500">
                        {{ auth()->user()->role }}
                    </div>
                </x-base.menu.header>
                {{-- <x-base.menu.divider class="bg-white/[0.08]" />
                <x-base.menu.item class="hover:bg-white/5">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="User" /> Profile
                </x-base.menu.item>
                <x-base.menu.item class="hover:bg-white/5">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="Edit" /> Add Account
                </x-base.menu.item>
                <x-base.menu.item class="hover:bg-white/5">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="Lock" /> Reset Password
                </x-base.menu.item>
                <x-base.menu.item class="hover:bg-white/5">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="HelpCircle" /> Help
                </x-base.menu.item>
                <x-base.menu.divider class="bg-white/[0.08]" /> --}}
                <x-base.menu.item class="hover:bg-white/5" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="ToggleRight" /> Logout
                </x-base.menu.item>
            </x-base.menu.items>
        </x-base.menu>
        <!-- END: Account Menu -->
    </div>
</div>
<!-- END: Top Bar -->

@pushOnce('scripts')
    @vite('resources/js/components/themes/icewall/top-bar.js')
@endPushOnce
