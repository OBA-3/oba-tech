@extends('layouts.app')

@section('title', $project->title . ' | OBA TECH')

@section('content')

{{-- Project Hero --}}
<section class="relative overflow-hidden bg-slate-950 py-24 lg:py-32">

    {{-- Background Effects --}}
    <div class="absolute inset-0">

        <div
            class="absolute left-1/4 top-0 h-96 w-96 rounded-full bg-blue-600/20 blur-3xl"
        ></div>

        <div
            class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-indigo-600/20 blur-3xl"
        ></div>

    </div>


    <div class="relative mx-auto max-w-7xl px-6">

        {{-- Back --}}
        <a
            href="{{ route('home') }}#projects"
            class="inline-flex items-center gap-2 text-sm font-medium text-blue-400 transition hover:text-blue-300"
        >
            ← Back to Projects
        </a>


        <div class="mt-12 grid items-center gap-16 lg:grid-cols-2">

            {{-- Project Information --}}
            <div>

                {{-- Category --}}
                <div class="flex flex-wrap gap-3">

                    @if ($project->category)

                        <span class="rounded-full bg-blue-500/10 px-4 py-2 text-sm font-medium text-blue-400">

                            {{ $project->category->name }}

                        </span>

                    @endif


                    @if ($project->status)

                        <span class="rounded-full bg-emerald-500/10 px-4 py-2 text-sm font-medium text-emerald-400">

                            {{ $project->status }}

                        </span>

                    @endif

                </div>


                {{-- Title --}}
                <h1 class="mt-8 text-5xl font-bold tracking-tight text-white md:text-6xl">

                    {{ $project->title }}

                </h1>


                {{-- Short Description --}}
                <p class="mt-6 text-xl leading-8 text-slate-400">

                    {{ $project->short_description }}

                </p>


                {{-- Technologies --}}
                @if ($project->technologies->count())

                    <div class="mt-8 flex flex-wrap gap-3">

                        @foreach ($project->technologies as $technology)

                            <span class="rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-300">

                                {{ $technology->name }}

                            </span>

                        @endforeach

                    </div>

                @endif


                {{-- Links --}}
                <div class="mt-10 flex flex-wrap gap-4">

                    @if ($project->demo_url)

                        <a
                            href="{{ $project->demo_url }}"
                            target="_blank"
                            class="rounded-xl bg-blue-600 px-6 py-3 font-medium text-white transition hover:bg-blue-500"
                        >
                            View Demo
                        </a>

                    @endif


                    @if ($project->github_url)

                        <a
                            href="{{ $project->github_url }}"
                            target="_blank"
                            class="rounded-xl border border-slate-700 px-6 py-3 font-medium text-white transition hover:border-blue-500"
                        >
                            GitHub
                        </a>

                    @endif

                </div>

            </div>


            {{-- Project Visual --}}
            <div>

                <div class="overflow-hidden rounded-3xl border border-white/10 bg-white/5">

                    @if (
                        $project->cover_image &&
                        Storage::disk('public')->exists($project->cover_image)
                    )

                        <img
                            src="{{ asset('storage/' . $project->cover_image) }}"
                            alt="{{ $project->title }}"
                            class="h-[450px] w-full object-cover"
                        >

                    @else

                        <div class="flex h-[450px] items-center justify-center bg-gradient-to-br from-blue-600/30 to-slate-900">

                            <span class="text-8xl">

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

                </div>

            </div>

        </div>

    </div>

</section>


{{-- Project Details --}}
<section class="bg-white py-24">

    <div class="mx-auto max-w-7xl px-6">


        <div class="grid gap-16 lg:grid-cols-3">

            {{-- Main Content --}}
            <div class="lg:col-span-2">


                {{-- About --}}
                <div>

                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">
                        About the Project
                    </p>

                    <h2 class="mt-4 text-4xl font-bold text-slate-900">

                        Project Overview

                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600">

                        {{ $project->description }}

                    </p>

                </div>


                {{-- Challenge --}}
                @if ($project->challenge)

                    <div class="mt-16">

                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">
                            The Challenge
                        </p>

                        <h2 class="mt-4 text-3xl font-bold text-slate-900">

                            What problem did we solve?

                        </h2>

                        <p class="mt-6 text-lg leading-8 text-slate-600">

                            {{ $project->challenge }}

                        </p>

                    </div>

                @endif


                {{-- Solution --}}
                @if ($project->solution)

                    <div class="mt-16">

                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">
                            Our Solution
                        </p>

                        <h2 class="mt-4 text-3xl font-bold text-slate-900">

                            How we approached it.

                        </h2>

                        <p class="mt-6 text-lg leading-8 text-slate-600">

                            {{ $project->solution }}

                        </p>

                    </div>

                @endif


                {{-- Results --}}
                @if ($project->results)

                    <div class="mt-16 rounded-3xl bg-slate-950 p-8">

                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-400">
                            Results
                        </p>

                        <p class="mt-6 text-lg leading-8 text-slate-300">

                            {{ $project->results }}

                        </p>

                    </div>

                @endif

            </div>


            {{-- Project Info --}}
            <aside>

                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-8">

                    <h3 class="text-xl font-bold text-slate-900">

                        Project Information

                    </h3>


                    <div class="mt-8 space-y-6">


                        @if ($project->project_type)

                            <div>

                                <p class="text-sm text-slate-500">
                                    Project Type
                                </p>

                                <p class="mt-1 font-medium text-slate-900">

                                    {{ $project->project_type }}

                                </p>

                            </div>

                        @endif


                        @if ($project->client_type)

                            <div>

                                <p class="text-sm text-slate-500">
                                    Client
                                </p>

                                <p class="mt-1 font-medium text-slate-900">

                                    {{ $project->client_type }}

                                </p>

                            </div>

                        @endif


                        @if ($project->duration)

                            <div>

                                <p class="text-sm text-slate-500">
                                    Duration
                                </p>

                                <p class="mt-1 font-medium text-slate-900">

                                    {{ $project->duration }}

                                </p>

                            </div>

                        @endif


                        @if ($project->role)

                            <div>

                                <p class="text-sm text-slate-500">
                                    Our Role
                                </p>

                                <p class="mt-1 font-medium text-slate-900">

                                    {{ $project->role }}

                                </p>

                            </div>

                        @endif


                        @if ($project->published_at)

                            <div>

                                <p class="text-sm text-slate-500">
                                    Published
                                </p>

                                <p class="mt-1 font-medium text-slate-900">

                                    {{ $project->published_at->format('M Y') }}

                                </p>

                            </div>

                        @endif

                    </div>

                </div>

            </aside>

        </div>

    </div>

</section>


{{-- Team Section --}}
@if ($project->teamMembers->count())

<section class="bg-slate-50 py-24">

    <div class="mx-auto max-w-7xl px-6">

        <div>

            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">
                Team
            </p>

            <h2 class="mt-4 text-4xl font-bold text-slate-900">

                The people behind this project.

            </h2>

        </div>


        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

            @foreach ($project->teamMembers as $member)

                <div class="rounded-2xl border border-slate-200 bg-white p-6">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-100 text-xl font-bold text-blue-600">

                        {{ strtoupper(substr($member->name, 0, 1)) }}

                    </div>


                    <h3 class="mt-5 text-xl font-bold text-slate-900">

                        {{ $member->name }}

                    </h3>


                    <p class="mt-2 text-sm text-blue-600">

                        {{ $member->pivot->role ?? $member->role }}

                    </p>


                    @if ($member->bio)

                        <p class="mt-4 text-sm leading-6 text-slate-600">

                            {{ $member->bio }}

                        </p>

                    @endif

                </div>

            @endforeach

        </div>

    </div>

</section>

@endif


{{-- More Projects CTA --}}
<section class="bg-slate-950 py-20">

    <div class="mx-auto max-w-4xl px-6 text-center">

        <h2 class="text-4xl font-bold text-white">

            Explore more of our work.

        </h2>

        <p class="mt-5 text-lg text-slate-400">

            Discover other digital solutions and projects developed by OBA TECH.

        </p>

        <a
            href="{{ route('home') }}#projects"
            class="mt-8 inline-flex rounded-xl bg-blue-600 px-7 py-3.5 font-medium text-white transition hover:bg-blue-500"
        >

            View All Projects

        </a>

    </div>

</section>

@endsection