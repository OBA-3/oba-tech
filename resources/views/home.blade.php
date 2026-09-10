@php
    use Illuminate\Support\Facades\Storage;
@endphp
@extends('layouts.app')

@section('title', 'OBA TECH | Innovative Digital Solutions')

@section('content')

    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-slate-950">

        {{-- Background Effects --}}
        <div class="absolute inset-0">

            <div class="absolute left-1/4 top-0 h-96 w-96 rounded-full bg-blue-600/20 blur-3xl"></div>

            <div class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-indigo-600/20 blur-3xl"></div>

        </div>


        <div class="relative mx-auto max-w-7xl px-6 py-24 lg:py-32">

            <div class="grid items-center gap-16 lg:grid-cols-2">

                {{-- Left Content --}}
                <div>

                    <div
                        class="inline-flex items-center rounded-full border border-blue-500/30 bg-blue-500/10 px-4 py-2 text-sm font-medium text-blue-400">
                        Innovative Digital Solutions
                    </div>


                    <h1 class="mt-8 text-5xl font-bold leading-tight tracking-tight text-white md:text-6xl lg:text-7xl">
                        We build

                        <span class="text-blue-500">
                            digital solutions
                        </span>

                        for the future.
                    </h1>


                    <p class="mt-8 max-w-xl text-lg leading-8 text-slate-400">
                        OBA TECH helps businesses and organizations transform
                        ideas into modern, reliable and scalable digital
                        products.
                    </p>


                    {{-- Buttons --}}
                    <div class="mt-10 flex flex-wrap gap-4">

                        <a href="#projects"
                            class="rounded-xl bg-blue-600 px-7 py-3.5 font-medium text-white transition duration-300 hover:bg-blue-500">
                            Explore Our Projects
                        </a>


                        <a href="#contact"
                            class="rounded-xl border border-slate-700 px-7 py-3.5 font-medium text-white transition duration-300 hover:border-blue-500 hover:bg-slate-900">
                            Contact Us
                        </a>

                    </div>


                    {{-- Statistics --}}
                    <div class="mt-14 grid max-w-xl grid-cols-3 gap-6 border-t border-slate-800 pt-8">

                        <div>
                            <div class="text-2xl font-bold text-white">
                                10+
                            </div>

                            <div class="mt-1 text-sm text-slate-500">
                                Projects
                            </div>
                        </div>


                        <div>
                            <div class="text-2xl font-bold text-white">
                                5+
                            </div>

                            <div class="mt-1 text-sm text-slate-500">
                                Technologies
                            </div>
                        </div>


                        <div>
                            <div class="text-2xl font-bold text-white">
                                3
                            </div>

                            <div class="mt-1 text-sm text-slate-500">
                                Team Members
                            </div>
                        </div>

                    </div>

                </div>


                {{-- Right Visual --}}
                <div class="relative hidden min-h-[550px] lg:block">


                    {{-- Main Card --}}
                    <div
                        class="absolute right-0 top-16 w-[440px] rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl backdrop-blur">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-sm text-slate-400">
                                    OBA TECH
                                </p>

                                <h3 class="mt-2 text-2xl font-semibold text-white">
                                    Digital Innovation
                                </h3>
                            </div>


                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-600 text-xl text-white">
                                ⚡
                            </div>

                        </div>


                        {{-- Code Window --}}
                        <div class="mt-8 rounded-2xl border border-white/10 bg-slate-950 p-5 font-mono text-sm">

                            <div class="text-blue-400">
                                &lt;OBA TECH /&gt;
                            </div>

                            <div class="mt-4 text-slate-400">
                                Building the future...
                            </div>

                            <div class="mt-2 text-emerald-400">
                                ✓ Innovation
                            </div>

                            <div class="mt-2 text-emerald-400">
                                ✓ Technology
                            </div>

                            <div class="mt-2 text-emerald-400">
                                ✓ Scalability
                            </div>

                        </div>

                    </div>


                    {{-- Floating Card --}}
                    <div
                        class="absolute left-0 top-80 w-64 rounded-2xl border border-white/10 bg-slate-900/80 p-6 shadow-xl backdrop-blur">

                        <div class="text-sm text-slate-400">
                            Our Expertise
                        </div>

                        <div class="mt-4 space-y-3">

                            <div class="flex items-center gap-3">

                                <div class="h-3 w-3 rounded-full bg-blue-500"></div>

                                <span class="text-sm text-white">
                                    Web Development
                                </span>

                            </div>


                            <div class="flex items-center gap-3">

                                <div class="h-3 w-3 rounded-full bg-indigo-500"></div>

                                <span class="text-sm text-white">
                                    Mobile Apps
                                </span>

                            </div>


                            <div class="flex items-center gap-3">

                                <div class="h-3 w-3 rounded-full bg-cyan-500"></div>

                                <span class="text-sm text-white">
                                    Digital Solutions
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Decorative Circle --}}
                    <div class="absolute bottom-10 right-10 h-32 w-32 rounded-full border border-blue-500/30"></div>

                </div>

            </div>

        </div>

    </section>
    {{-- Services Section --}}
    <section id="services" class="bg-white py-24">

        <div class="mx-auto max-w-7xl px-6">

            {{-- Section Header --}}
            <div class="max-w-2xl">

                <span class="text-sm font-semibold uppercase tracking-widest text-blue-600">
                    Our Services
                </span>

                <h2 class="mt-4 text-4xl font-bold tracking-tight text-slate-900 md:text-5xl">
                    Technology built around
                    <span class="text-blue-600">
                        your ideas.
                    </span>
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    We design and develop modern digital solutions that help
                    businesses transform ideas into reliable and scalable products.
                </p>

            </div>


            {{-- Services Grid --}}
            <div class="mt-16 grid gap-6 md:grid-cols-2 lg:grid-cols-4">


                {{-- Web Development --}}
                <div
                    class="group rounded-2xl border border-slate-200 bg-white p-7 transition duration-300 hover:-translate-y-2 hover:border-blue-200 hover:shadow-xl">

                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-50 text-2xl">
                        🌐
                    </div>

                    <h3 class="mt-6 text-xl font-semibold text-slate-900">
                        Web Development
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        Modern, responsive and scalable web applications designed
                        for performance and great user experience.
                    </p>

                </div>


                {{-- Mobile Development --}}
                <div
                    class="group rounded-2xl border border-slate-200 bg-white p-7 transition duration-300 hover:-translate-y-2 hover:border-blue-200 hover:shadow-xl">

                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-50 text-2xl">
                        📱
                    </div>

                    <h3 class="mt-6 text-xl font-semibold text-slate-900">
                        Mobile Development
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        Cross-platform mobile applications built to deliver smooth,
                        intuitive and modern user experiences.
                    </p>

                </div>


                {{-- Backend & APIs --}}
                <div
                    class="group rounded-2xl border border-slate-200 bg-white p-7 transition duration-300 hover:-translate-y-2 hover:border-blue-200 hover:shadow-xl">

                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-50 text-2xl">
                        ⚙️
                    </div>

                    <h3 class="mt-6 text-xl font-semibold text-slate-900">
                        Backend & APIs
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        Secure and scalable backend systems, databases and APIs
                        built for reliable digital products.
                    </p>

                </div>


                {{-- Digital Solutions --}}
                <div
                    class="group rounded-2xl border border-slate-200 bg-white p-7 transition duration-300 hover:-translate-y-2 hover:border-blue-200 hover:shadow-xl">

                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-50 text-2xl">
                        💡
                    </div>

                    <h3 class="mt-6 text-xl font-semibold text-slate-900">
                        Digital Solutions
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        Custom digital solutions designed around your business needs,
                        challenges and future growth.
                    </p>

                </div>

            </div>

        </div>

    </section>
    {{-- Projects Section --}}
    <section id="projects" class="bg-slate-950 py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            {{-- Section Header --}}
            <div class="mb-16 flex flex-col justify-between gap-6 md:flex-row md:items-end">

                <div>
                    <p class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-blue-400">
                        Our Projects
                    </p>

                    <h2 class="max-w-2xl text-4xl font-bold tracking-tight text-white sm:text-5xl">
                        Discover some of our
                        <span class="text-blue-500">latest work.</span>
                    </h2>
                </div>

                <a href="#"
                    class="inline-flex items-center gap-2 text-sm font-semibold text-blue-400 transition hover:text-blue-300">
                    View all projects
                    <span>→</span>
                </a>

            </div>


            {{-- Projects Grid --}}
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                @forelse ($projects as $project)

                    <article
                        class="group overflow-hidden rounded-3xl border border-white/10 bg-white/5 transition duration-300 hover:-translate-y-2 hover:border-blue-500/40">

                        {{-- Project Image --}}
                        <div class="relative h-56 overflow-hidden bg-slate-900">

                            @if (
                                    $project->cover_image &&
                                    Storage::disk('public')->exists($project->cover_image)
                                )

                                <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-110">

                            @else

                                <div
                                    class="flex h-full items-center justify-center bg-gradient-to-br from-blue-600/30 to-slate-900">

                                    <span class="text-5xl">
                                        @if ($project->project_type === 'Mobile Application')
                                            📱
                                        @elseif ($project->project_type === 'Web Application')
                                            💻
                                        @else
                                            🚀
                                        @endif
                                    </span>

                                </div>

                            @endif


                            {{-- Featured Badge --}}
                            @if ($project->featured)

                                <div
                                    class="absolute left-4 top-4 rounded-full bg-blue-600 px-3 py-1 text-xs font-semibold text-white">

                                    Featured

                                </div>

                            @endif

                        </div>


                        {{-- Content --}}
                        <div class="p-6">

                            {{-- Category --}}
                            @if ($project->category)

                                <p class="mb-3 text-sm font-medium text-blue-400">

                                    {{ $project->category->name }}

                                </p>

                            @endif


                            {{-- Title --}}
                            <h3 class="mb-3 text-2xl font-bold text-white">

                                {{ $project->title }}

                            </h3>


                            {{-- Description --}}
                            <p class="mb-6 leading-relaxed text-slate-400">

                                {{ $project->short_description }}

                            </p>


                            {{-- Technologies --}}
                            <div class="mb-6 flex flex-wrap gap-2">

                                @foreach ($project->technologies->take(4) as $technology)

                                    <span class="rounded-full bg-white/5 px-3 py-1 text-xs text-slate-300">

                                        {{ $technology->name }}

                                    </span>

                                @endforeach

                            </div>


                            {{-- Project Link --}}
                            <a href="{{ route('projects.show', $project->slug) }}"
                                class="inline-flex items-center gap-2 font-semibold text-white transition hover:text-blue-400">

                                View Project

                                <span class="transition group-hover:translate-x-1">

                                    →

                                </span>

                            </a>

                        </div>

                    </article>

                @empty

                    <div class="col-span-full py-12 text-center">

                        <p class="text-slate-400">

                            No projects available yet.

                        </p>

                    </div>

                @endforelse

            </div>

        </div>
    </section>

    {{-- About Section --}}
<section id="about" class="bg-slate-950 py-24 text-white">

    <div class="mx-auto max-w-7xl px-6">

        <div class="grid items-center gap-16 lg:grid-cols-2">

            {{-- Left Content --}}
            <div>

                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-blue-400">
                    About OBA TECH
                </p>

                <h2 class="mt-5 text-4xl font-bold tracking-tight sm:text-5xl">
                    We build digital solutions
                    that create
                    <span class="text-blue-500">
                        real impact.
                    </span>
                </h2>

                <p class="mt-6 max-w-xl text-lg leading-8 text-slate-400">
                    OBA TECH is a technology-driven team focused on creating
                    modern and innovative digital solutions. We combine
                    creativity, technical expertise and innovation to transform
                    ideas into reliable digital products.
                </p>

                <p class="mt-5 max-w-xl leading-7 text-slate-400">
                    From web and mobile applications to powerful backend systems,
                    we help businesses and organizations turn their ideas into
                    scalable digital solutions.
                </p>

            </div>


            {{-- Right Content --}}
            <div class="grid gap-6 sm:grid-cols-2">

                {{-- Mission --}}
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8">

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-500/10 text-2xl">
                        🎯
                    </div>

                    <h3 class="mt-6 text-xl font-semibold">
                        Our Mission
                    </h3>

                    <p class="mt-4 leading-7 text-slate-400">
                        To create innovative, reliable and accessible digital
                        solutions that help businesses grow and succeed.
                    </p>

                </div>


                {{-- Vision --}}
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8">

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-500/10 text-2xl">
                        🚀
                    </div>

                    <h3 class="mt-6 text-xl font-semibold">
                        Our Vision
                    </h3>

                    <p class="mt-4 leading-7 text-slate-400">
                        To become a trusted technology partner and contribute
                        to building the future through digital innovation.
                    </p>

                </div>


                {{-- Innovation --}}
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8">

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-500/10 text-2xl">
                        💡
                    </div>

                    <h3 class="mt-6 text-xl font-semibold">
                        Innovation
                    </h3>

                    <p class="mt-4 leading-7 text-slate-400">
                        We explore modern technologies and creative approaches
                        to deliver better digital experiences.
                    </p>

                </div>


                {{-- Collaboration --}}
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8">

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-500/10 text-2xl">
                        🤝
                    </div>

                    <h3 class="mt-6 text-xl font-semibold">
                        Collaboration
                    </h3>

                    <p class="mt-4 leading-7 text-slate-400">
                        We believe that great digital products are built through
                        teamwork, communication and shared expertise.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

    {{-- Team Section --}}
    <section id="team" class="bg-white py-24">

        <div class="mx-auto max-w-7xl px-6">

            {{-- Section Header --}}
            <div class="max-w-2xl">

                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-blue-600">
                    Our Team
                </p>

                <h2 class="mt-4 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                    The people behind
                    <span class="text-blue-600">
                        OBA TECH.
                    </span>
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    A passionate team combining technology, creativity and
                    expertise to build modern digital solutions.
                </p>

            </div>


            {{-- Team Members --}}
            <div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-3">


                {{-- Member 1 --}}
                <div
                    class="rounded-3xl border border-slate-200 bg-white p-8 transition duration-300 hover:-translate-y-2 hover:border-blue-200 hover:shadow-xl">

                    <div
                        class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 text-xl font-bold text-blue-600">
                        B
                    </div>

                    <h3 class="mt-6 text-xl font-bold text-slate-900">
                        BELGACEM YASSINE
                    </h3>

                    <p class="mt-2 font-medium text-blue-600">
                        Backend Developer & Database Designer
                    </p>

                    <p class="mt-5 leading-7 text-slate-600">
                        Backend developer focused on building reliable, scalable
                        and secure server-side applications and APIs.
                    </p>

                </div>


                {{-- Member 2 --}}
                <div
                    class="rounded-3xl border border-slate-200 bg-white p-8 transition duration-300 hover:-translate-y-2 hover:border-blue-200 hover:shadow-xl">

                    <div
                        class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 text-xl font-bold text-blue-600">
                        A
                    </div>

                    <h3 class="mt-6 text-xl font-bold text-slate-900">
                        ACHACHI MOUHAMMED
                    </h3>

                    <p class="mt-2 font-medium text-blue-600">
                        Frontend Developer
                    </p>

                    <p class="mt-5 leading-7 text-slate-600">
                        Full stack developer working across frontend and backend
                        technologies to build complete and user-focused digital products.
                    </p>

                </div>


                {{-- Member 3 --}}
                <div
                    class="rounded-3xl border border-slate-200 bg-white p-8 transition duration-300 hover:-translate-y-2 hover:border-blue-200 hover:shadow-xl">

                    <div
                        class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 text-xl font-bold text-blue-600">
                        O
                    </div>

                    <h3 class="mt-6 text-xl font-bold text-slate-900">
                        OUBACHIRE MOUHAMED
                    </h3>

                    <p class="mt-2 font-medium text-blue-600">
                        System Analyst
                    </p>

                    <p class="mt-5 leading-7 text-slate-600">
                        System analyst focused on designing efficient solutions
                        and creating modern digital experiences.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="bg-slate-950 py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <!-- Section Header -->
            <div class="mb-16">
                <p class="mb-4 text-sm font-semibold uppercase tracking-[0.3em] text-blue-400">
                    <a href="#contact">
                        Contact Us
                    </a>
                </p>

                <h2 class="max-w-3xl text-4xl font-bold tracking-tight text-white sm:text-5xl">
                    Have a project in mind?
                    <span class="text-blue-500">Let's talk.</span>
                </h2>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-400">
                    Tell us about your project and we'll help you transform your ideas
                    into a modern, scalable and reliable digital solution.
                </p>
            </div>


            <div class="grid gap-12 lg:grid-cols-2">

                <!-- CONTACT INFORMATION -->
                <div>

                    <h3 class="mb-8 text-2xl font-bold text-white">
                        Get in touch
                    </h3>


                    <!-- Email -->
                    <div class="mb-8 flex items-start gap-5">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600/20 text-xl">
                            ✉️
                        </div>

                        <div>
                            <h4 class="font-semibold text-white">
                                Email
                            </h4>

                            <p class="mt-1 text-slate-400">
                                contact@obatech.dev
                            </p>
                        </div>

                    </div>


                    <!-- Location -->
                    <div class="mb-8 flex items-start gap-5">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600/20 text-xl">
                            📍
                        </div>

                        <div>
                            <h4 class="font-semibold text-white">
                                Location
                            </h4>

                            <p class="mt-1 text-slate-400">
                                Algeria
                            </p>
                        </div>

                    </div>


                    <!-- Services -->
                    <div class="flex items-start gap-5">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600/20 text-xl">
                            ⚡
                        </div>

                        <div>
                            <h4 class="font-semibold text-white">
                                Digital Solutions
                            </h4>

                            <p class="mt-1 text-slate-400">
                                Web, Mobile, Backend and Custom Digital Solutions.
                            </p>
                        </div>

                    </div>

                </div>


                <!-- CONTACT FORM -->
                <div class="rounded-3xl border border-slate-800 bg-slate-900 p-8 sm:p-10">

                    <form>

                        <!-- Name -->
                        <div class="mb-6">

                            <label class="mb-2 block text-sm font-medium text-slate-300">
                                Full Name
                            </label>

                            <input type="text" placeholder="Your name"
                                class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-blue-500">

                        </div>


                        <!-- Email -->
                        <div class="mb-6">

                            <label class="mb-2 block text-sm font-medium text-slate-300">
                                Email Address
                            </label>

                            <input type="email" placeholder="your@email.com"
                                class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-blue-500">

                        </div>


                        <!-- Subject -->
                        <div class="mb-6">

                            <label class="mb-2 block text-sm font-medium text-slate-300">
                                Subject
                            </label>

                            <input type="text" placeholder="What is your project about?"
                                class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-blue-500">

                        </div>


                        <!-- Message -->
                        <div class="mb-8">

                            <label class="mb-2 block text-sm font-medium text-slate-300">
                                Message
                            </label>

                            <textarea rows="5" placeholder="Tell us about your project..."
                                class="w-full resize-none rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-blue-500"></textarea>

                        </div>


                        <!-- Button -->
                        <button type="submit"
                            class="w-full rounded-xl bg-blue-600 px-6 py-4 font-semibold text-white transition hover:bg-blue-500">
                            Send Message →
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </section>
@endsection