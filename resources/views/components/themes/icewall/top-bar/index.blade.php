<!-- BEGIN: Top Bar -->
<div
    class="top-bar-boxed relative z-[51] -mx-5 mb-12 mt-12 h-[70px] border-b border-white/[0.08] px-3 sm:-mx-8 sm:px-8 md:-mt-5 md:pt-0">
    <div class="flex h-full items-center">
        <!-- BEGIN: Logo -->
        <a class="-intro-x hidden md:flex" href="">
            <img class="w-8 rounded-md" src="{{ Vite::asset('resources/images/pnj.png') }}"
                alt="Icewall Tailwind Admin Dashboard Template" />
            <span class="ml-3 text-lg text-white"> Pendaftaran Mahasiswa </span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        <x-base.breadcrumb class="-intro-x mr-auto h-full border-white/[0.08] md:ml-10 md:border-l md:pl-10" light>
            <x-base.breadcrumb.link :index="0">Role</x-base.breadcrumb.link>
            <x-base.breadcrumb.link :index="1" :active="true">
                {{ auth()->user()->role }}
            </x-base.breadcrumb.link>
        </x-base.breadcrumb>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Account Menu -->
        <x-base.menu>
            <x-base.menu.button
                class="bg-gradient-to-t bg-slate-200 zoom-in intro-x block h-12 w-12 scale-110 overflow-hidden rounded-full shadow-lg">
                @if (auth()->user()->file_img != null)
                    <div class="rounded-full">
                        <img src="{{ auth()->user()->file_img }}" class="w-full h-auto">
                    </div>
                @else
                    <div class="rounded-full">
                        <img src="{{ Vite::asset('resources/images/pnj.png') }}" class="w-full h-auto">
                    </div>
                @endif
            </x-base.menu.button>
            <x-base.menu.items
                class="relative mt-px w-56 bg-theme-1/80 text-white before:absolute before:inset-0 before:z-[-1] before:block before:rounded-md before:bg-black">
                <x-base.menu.header class="font-normal">
                    <div class="font-medium">{{ auth()->user()->name }}</div>
                    <div class="mt-0.5 text-xs text-white/70 dark:text-slate-500">
                        {{ auth()->user()->role }}
                    </div>
                </x-base.menu.header>
                <x-base.menu.divider class="bg-white/[0.08]" />
                <x-base.menu.item class="hover:bg-white/5" data-tw-merge data-tw-toggle="modal"
                    data-tw-target="#logout-modal-preview">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="ToggleRight" />
                    Logout
                </x-base.menu.item>
            </x-base.menu.items>
        </x-base.menu>
        <!-- END: Account Menu -->

    </div>
    <!-- BEGIN: Modal Content -->
    <div data-tw-backdrop="" aria-hidden="true" id="logout-modal-preview"
        class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&amp;:not(.show)]:duration-[0s,0.2s] [&amp;:not(.show)]:delay-[0.2s,0s] [&amp;:not(.show)]:invisible [&amp;:not(.show)]:opacity-0 [&amp;.show]:visible [&amp;.show]:opacity-100 [&amp;.show]:duration-[0s,0.4s]">
        <div data-tw-merge
            class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px]">
            <div class="p-5 text-center">
                <i data-tw-merge data-lucide="log-out" class="stroke-1.5 text-danger mx-auto mt-3 h-10 w-10"></i>
                <div class="mt-5 text-3xl">Anda yakin ingin logout?</div>
                {{-- <div class="mt-2 text-slate-500">
                Do you really want to delete these records? <br />
                This process cannot be undone.
            </div> --}}
            </div>
            <div class="px-5 pb-8 text-center flex justify-evenly">
                <div class="col text-center">
                    <button data-tw-merge data-tw-dismiss="modal" type="button"
                        class="hover:bg-primary hover:bg-opacity-30 hover:border-primary justify-center hover:text-primary py-2 dark:text-white shadow-sm inline-flex dark:bg-slate-700 w-24 rounded-md">Cancel</button>
                </div>
                <div class="col">
                    <a data-tw-merge type="button" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="transition duration-200 border flex-fill shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-danger border-danger text-white dark:border-danger w-24">Logout</a>
                </div>
            </div>

        </div>
    </div>
    <!-- END: Modal Content -->

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</div>
<!-- END: Top Bar -->
@pushOnce('scripts')
    @vite('resources/js/components/themes/icewall/top-bar.js')
@endPushOnce
