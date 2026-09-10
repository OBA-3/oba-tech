@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')


@section('content')

    {{-- Welcome --}}
    <div class="mb-8">

        <h2 class="text-2xl font-bold text-slate-900">
            Dashboard Overview
        </h2>

        <p class="mt-2 text-slate-500">
            Monitor and manage your OBA TECH website.
        </p>

    </div>


    {{-- Statistics --}}
    <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Projects --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Projects
                    </p>

                    <h3 class="mt-3 text-3xl font-bold text-slate-900">
                        2
                    </h3>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-xl">
                    📁
                </div>

            </div>

        </div>


        {{-- Services --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Services
                    </p>

                    <h3 class="mt-3 text-3xl font-bold text-slate-900">
                        4
                    </h3>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-xl">
                    🛠
                </div>

            </div>

        </div>


        {{-- Team --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Team Members
                    </p>

                    <h3 class="mt-3 text-3xl font-bold text-slate-900">
                        3
                    </h3>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-xl">
                    👥
                </div>

            </div>

        </div>


        {{-- Messages --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Messages
                    </p>

                    <h3 class="mt-3 text-3xl font-bold text-slate-900">
                        0
                    </h3>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-xl">
                    📩
                </div>

            </div>

        </div>

    </div>


    {{-- Quick Actions --}}
    <div class="mt-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

        <h3 class="text-lg font-semibold text-slate-900">
            Quick Actions
        </h3>

        <p class="mt-1 text-sm text-slate-500">
            Quickly manage your website content.
        </p>

        <div class="mt-6 flex flex-wrap gap-4">

            <button
                class="rounded-xl bg-blue-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-blue-500"
            >
                + Add Project
            </button>

            <button
                class="rounded-xl border border-slate-200 px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50"
            >
                + Add Service
            </button>

            <button
                class="rounded-xl border border-slate-200 px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50"
            >
                + Add Team Member
            </button>

        </div>

    </div>

@endsection