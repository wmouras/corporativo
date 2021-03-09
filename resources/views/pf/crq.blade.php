{{-- <x-app-layout> --}}

    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <style>

            h1 {
            color:#c00;
            font-family:sans-serif;
            font-size:2em;
            margin-bottom:0;
            }

            table {
            font-family:sans-serif;
            background-color:#000;
            th, td {
                padding:.25em .5em;
                text-align:left;
                &:nth-child(2) {
                text-align:right;
                }
            }
            td {
                background-color:#fff;
            }
            th {
                background-color:#009;
                color:#fff;
            }
            }

            .zigzag {
            border-collapse:separate;
            border-spacing:.25em 1em;
            thead tr,

            }

            </style>
        </head>
        <body class="font-sans antialiased">

        {{-- <x-slot name="header"> --}}
            <h2 class='' id="paper">
                Registro de Profissional: ({{ $pessoafisica->nome ?? ''}})
            </h2>
        {{-- </x-slot> --}}
        <br>

        <div>

        </div>

        {{-- </x-app-layout> --}}

        </body>
        </html>
