<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>USD Exchange Rate</title>

    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex justify-center h-screen items-center">

        <table class="w-3/5 h-3/5 border-collapse border rounded-lg border-spacing-3">
            <caption class="mb-2 font-bold">USD Exchange Rate</caption>
            <tr class="bg-slate-700 text-white font-bold text-left border-lg">
                <th>&nbsp;Currency</th>
                <th>Rate</th>
            </tr>
            @foreach ($rates as $key => $item)
                <tr class="border-2 border-gray-400">
                    <td>
                        &nbsp;{{ $key }}
                    </td>
                    <td>
                        {{ $item }}
                    </td>
                </tr>
            @endforeach

        </table>

    </div>
</body>

</html>
