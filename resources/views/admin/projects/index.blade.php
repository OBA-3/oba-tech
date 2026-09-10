@extends('admin.layouts.app')

@section('title', 'Projects')

@section('page-title', 'Projects')


@section('content')

    {{-- Page Header --}}
    <div class="mb-8 flex items-center justify-between">

        <div>

            <h2 class="text-2xl font-bold text-slate-900">
                Projects
            </h2>

            <p class="mt-2 text-slate-500">
                Manage your portfolio projects.
            </p>

        </div>


        {{-- Add Project --}}
        <a
            href="#"
            class="rounded-xl bg-blue-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-blue-500"
        >
            + Add Project
        </a>

    </div>


    {{-- Projects Table --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="border-b border-slate-200 bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Project
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Category
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right text-sm font-semibold text-slate-600">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    {{-- EduFix --}}
                    <tr class="border-b border-slate-100">

                        <td class="px-6 py-5">

                            <div>

                                <p class="font-semibold text-slate-900">
                                    EduFix Management Platform
                                </p>

                                <p class="mt-1 text-sm text-slate-500">
                                    IT equipment and incident management.
                                </p>

                            </div>

                        </td>


                        <td class="px-6 py-5 text-sm text-slate-600">
                            Web Application
                        </td>


                        <td class="px-6 py-5">

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
                                Completed
                            </span>

                        </td>


                        <td class="px-6 py-5 text-right">

                            <button class="text-sm font-medium text-blue-600 hover:text-blue-500">
                                Edit
                            </button>

                        </td>

                    </tr>


                    {{-- AMAN --}}
                    <tr>

                        <td class="px-6 py-5">

                            <div>

                                <p class="font-semibold text-slate-900">
                                    AMAN
                                </p>

                                <p class="mt-1 text-sm text-slate-500">
                                    Digital financial inclusion solution.
                                </p>

                            </div>

                        </td>


                        <td class="px-6 py-5 text-sm text-slate-600">
                            Mobile Application
                        </td>


                        <td class="px-6 py-5">

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
                                Completed
                            </span>

                        </td>


                        <td class="px-6 py-5 text-right">

                            <button class="text-sm font-medium text-blue-600 hover:text-blue-500">
                                Edit
                            </button>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

@endsection