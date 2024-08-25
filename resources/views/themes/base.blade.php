<!DOCTYPE html>
<!--
Template Name: Midone - Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html class="opacity-0" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Uji Kompetensi BNSP Politeknik Negeri Jakarta.">
    <meta name="keywords" content="Gokil Bro!">
    <meta name="author" content="Abdurojak">

    <link href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    @yield('head')

    <!-- BEGIN: CSS Assets-->
    @stack('styles')
    <!-- END: CSS Assets-->

    @vite(['resources/js/app.js'])
    @vite('resources/css/app.css')

    <style>
        @media print {

            .page-wrapper,
            .page-content-wrapper {
                margin: 0 !important;
            }

            .container {
                margin-top: 0 !important;
            }

            body * {
                visibility: hidden;
                font-size: 10pt;
            }

            .container-fluid,
            .row,
            .card,
            .card-body {
                margin: 12px !important;
                padding: 0 !important;
                box-sizing: border-box;
            }

            #printable-section,
            #printable-section * {
                visibility: visible;
            }

            #printable-section {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<!-- END: Head -->

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.tailwindcss.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

    <x-theme-switcher />
    <x-alert />

    @yield('content')

    <!-- BEGIN: Vendor JS Assets-->
    @vite('resources/js/vendors/dom.js')
    @vite('resources/js/vendors/tailwind-merge.js')
    @stack('vendors')
    <!-- END: Vendor JS Assets-->

    <!-- BEGIN: Pages, layouts, components JS Assets-->
    @vite('resources/js/components/base/theme-color.js')
    @stack('scripts')
    <!-- END: Pages, layouts, components JS Assets-->

</body>

</html>
