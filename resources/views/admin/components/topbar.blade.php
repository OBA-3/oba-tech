<header class="flex h-20 items-center justify-between border-b border-slate-200 bg-white px-6 lg:px-8">

    {{-- Page Title --}}
    <div>

        <h1 class="text-lg font-semibold text-slate-900">
            @yield('page-title', 'Dashboard')
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Welcome back to OBA TECH Administration
        </p>

    </div>


    {{-- Admin Profile --}}
    <div class="flex items-center gap-4">

        {{-- Notification --}}
        <button
            type="button"
            class="flex h-10 w-10 items-center justify-center rounded-xl text-slate-500 transition hover:bg-slate-100 hover:text-slate-900"
            aria-label="Notifications"
        >
            🔔
        </button>


        {{-- Admin Info --}}
        <div class="flex items-center gap-3">

            {{-- Avatar --}}
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-sm font-bold text-white">
                A
            </div>


            <div class="hidden sm:block">

                <p class="text-sm font-semibold text-slate-900">
                    Admin
                </p>

                <p class="text-xs text-slate-500">
                    Administrator
                </p>

            </div>

        </div>

    </div>

</header>