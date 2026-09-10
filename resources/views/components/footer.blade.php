<footer class="border-t border-slate-800 bg-slate-950 text-slate-300">

    <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8">

        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">

            {{-- Brand --}}
            <div>

                <h3 class="text-2xl font-bold text-white">
                    OBA <span class="text-blue-500">TECH</span>
                </h3>

                <p class="mt-5 max-w-sm leading-7 text-slate-400">
                    Building innovative digital solutions for businesses
                    and organizations.
                </p>

            </div>


            {{-- Services --}}
            <div>

                <h4 class="mb-5 font-semibold text-white">
                    Services
                </h4>

                <ul class="space-y-3 text-slate-400">

                    <li>
                        <a href="/#services" class="transition hover:text-blue-400">
                            Web Development
                        </a>
                    </li>

                    <li>
                        <a href="/#services" class="transition hover:text-blue-400">
                            Mobile Development
                        </a>
                    </li>

                    <li>
                        <a href="/#services" class="transition hover:text-blue-400">
                            Backend & APIs
                        </a>
                    </li>

                    <li>
                        <a href="/#services" class="transition hover:text-blue-400">
                            Digital Solutions
                        </a>
                    </li>

                </ul>

            </div>


            {{-- Company --}}
            <div>

                <h4 class="mb-5 font-semibold text-white">
                    Company
                </h4>

                <ul class="space-y-3 text-slate-400">

                    <li>
                        <a href="/" class="transition hover:text-blue-400">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="/#services" class="transition hover:text-blue-400">
                            Services
                        </a>
                    </li>

                    <li>
                        <a href="/#projects" class="transition hover:text-blue-400">
                            Projects
                        </a>
                    </li>

                    <li>
                        <a href="/#team" class="transition hover:text-blue-400">
                            About
                        </a>
                    </li>

                </ul>

            </div>


            {{-- Contact --}}
            <div>

                <h4 class="mb-5 font-semibold text-white">
                    Contact
                </h4>

                <div class="space-y-3 text-slate-400">

                    <p>
                        Algeria
                    </p>

                    <a
                        href="mailto:contact@obatech.dev"
                        class="block transition hover:text-blue-400"
                    >
                        contact@obatech.dev
                    </a>

                    <a
                        href="/#contact"
                        class="inline-block pt-2 font-medium text-blue-400 transition hover:text-blue-300"
                    >
                        Let's work together →
                    </a>

                </div>

            </div>

        </div>


        {{-- Bottom Footer --}}
        <div class="mt-16 flex flex-col gap-4 border-t border-slate-800 pt-8 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between">

            <p>
                © {{ date('Y') }} OBA TECH. All rights reserved.
            </p>

            <p>
                Building the future through technology.
            </p>

        </div>

    </div>

</footer>