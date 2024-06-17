<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    @vite('resources/css/app.css')
</head>

<body>

    @include('components.nav');

    <div class="w-full h-screen flex items-center  justify-center">

        <div class="w-1/2 h-1/2">
            @if(!empty($data))
            <div class="w-full h-fit p-2 bg-purple-400 rounded-md">
                <strong>The quote</strong>
                <p>{{ $data[0]['content'] }}</p>
                <p><strong>Author :</strong> {{ $data[0]['author'] }}</p>
                <p><strong>Length :</strong> {{ $data[0]['length'] }}</p>
            </div>

            @endif
        </div>
    </div>

</body>

</html>