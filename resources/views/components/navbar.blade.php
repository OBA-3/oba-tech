<nav class="relative z-50 border-b border-white/10 bg-slate-950">

    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">

        {{-- Logo --}}
        <a href="/" class="text-2xl font-bold tracking-tight">
            <span class="text-white">OBA</span>
            <span class="text-blue-500">TECH</span>
        </a>


        {{-- Desktop Navigation --}}
        <div class="hidden items-center gap-8 md:flex">

            <a href="/" class="text-sm font-medium text-slate-400 hover:text-white">
                Home
            </a>

            <a href="/#services" class="text-sm font-medium text-slate-400 hover:text-white">
                Services
            </a>

            <a href="/#projects" class="text-sm font-medium text-slate-400 hover:text-white">
                Projects
            </a>

            <a href="/#team" class="text-sm font-medium text-slate-400 hover:text-white">
                Team
            </a>

            <a href="/#about" class="text-sm font-medium text-slate-400 hover:text-white">
                About
            </a>

        </div>


        {{-- Desktop Contact --}}
        <a
            href="#contact"
            class="hidden rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-500 md:block"
        >
            Contact Us
        </a>


        {{-- Mobile Button --}}
        <button
            id="mobile-menu-button"
            type="button"
            class="text-2xl text-white md:hidden"
        >
            ☰
        </button>

    </div>


    {{-- Mobile Menu --}}
    <div
        id="mobile-menu"
        class="hidden border-t border-white/10 bg-slate-950 px-6 py-6 md:hidden"
    >

        <div class="flex flex-col gap-5">

            <a href="/" class="mobile-link text-slate-300 hover:text-blue-400">
                Home
            </a>

            <a href="#services" class="mobile-link text-slate-300 hover:text-blue-400">
                Services
            </a>

            <a href="#projects" class="mobile-link text-slate-300 hover:text-blue-400">
                Projects
            </a>

            <a href="#team" class="mobile-link text-slate-300 hover:text-blue-400">
                Team
            </a>

            <a href="#about" class="mobile-link text-slate-300 hover:text-blue-400">
                About
            </a>

            <a
                href="#contact"
                class="mobile-link rounded-xl bg-blue-600 px-5 py-3 text-center text-white"
            >
                Contact Us
            </a>

        </div>

    </div>

</nav>