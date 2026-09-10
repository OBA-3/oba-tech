<aside class="flex min-h-screen w-64 flex-col bg-slate-950 text-white">

    {{-- Logo --}}
    <div class="flex h-20 items-center border-b border-white/10 px-6">

        <a
            href="{{ url('/') }}"
            class="text-xl font-bold tracking-tight"
        >
            OBA <span class="text-blue-500">TECH</span>
        </a>

    </div>


    {{-- Navigation --}}
    <nav class="flex-1 px-4 py-6">

        <p class="mb-4 px-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
            Administration
        </p>


        <div class="space-y-2">

            {{-- Dashboard --}}
            <a
                href="#"
                class="flex items-center gap-3 rounded-xl bg-blue-600 px-4 py-3 text-sm font-medium text-white"
            >
                <span>📊</span>
                Dashboard
            </a>


            {{-- Projects --}}
            <a
                href="#"
                class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-400 transition hover:bg-white/5 hover:text-white"
            >
                <span>📁</span>
                Projects
            </a>


            {{-- Services --}}
            <a
                href="#"
                class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-400 transition hover:bg-white/5 hover:text-white"
            >
                <span>🛠</span>
                Services
            </a>


            {{-- Team --}}
            <a
                href="#"
                class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-400 transition hover:bg-white/5 hover:text-white"
            >
                <span>👥</span>
                Team
            </a>


            {{-- Messages --}}
            <a
                href="#"
                class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-400 transition hover:bg-white/5 hover:text-white"
            >
                <span>📩</span>
                Messages
            </a>

        </div>


        {{-- Settings --}}
        <div class="mt-8">

            <p class="mb-4 px-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                System
            </p>

            <a
                href="#"
                class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-400 transition hover:bg-white/5 hover:text-white"
            >
                <span>⚙️</span>
                Settings
            </a>

        </div>

    </nav>


    {{-- Bottom --}}
    <div class="border-t border-white/10 p-4">

        <a
            href="{{ url('/') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-400 transition hover:bg-white/5 hover:text-white"
        >
            <span>🌐</span>
            View Website
        </a>

    </div>

</aside>