<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #d1d1d1;
            color: rgb(34, 34, 34);
        }

        .indicator {
            display: inline-block;
            height: 12px;
            width: 12px;
            border-radius: 25%;
            border-width: 1px;
            margin-right: 5px;
            /* margin-left: 5px; */
        }

    </style>

</head>

<body>
    <h3>Customer Status Summary</h3>
    <table id="customers">
        <thead>
            <tr>
                <th>Status</th>
                @foreach ($dates as $date)
                <th>{{ $date }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($summaries as $statusId => $values)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap flex items-center">
                    <div
                        class="indicator" style="background:{{ $status[$statusId]['color'] }}">
                    </div>
                    {{ $status[$statusId]['name'] }}
                </td>
                @foreach ($values as $date => $count)
                <td class="px-6 py-4 whitespace-no-wrap">{{ $count }}</td>
                @endforeach
            </tr>
            @endforeach
            <tr class="font-bold">
                <td class="px-6 py-4 whitespace-no-wrap flex items-center bg-gray-100">
                    <div class="rounded-full h-4 w-4 mr-2 bg-white-500"></div>
                    Total
                </td>
                @foreach ($totals as $date => $count)
                <td class="px-6 py-4 bg-gray-100 whitespace-no-wrap">{{ $count }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>

    <h3>Monthly Orders Values</h3>
    <table id="customers">
        <thead>
            <tr>
                @foreach ($orders as $date => $amount)
                    <x-head>{{ $date }}</x-head>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr class="font-bold">
                @foreach ($orders as $date => $amount)
                    <td class="px-6 py-4 whitespace-no-wrap">£{{ $amount }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</body>

</html>
