<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotes</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.nav')
    <div class="w-full h-fit p-2 flex  gap-2">
        @foreach($Quotes as $Quote)
        <div class="rounded w-fit h-fit p-2 bg-gray-800 text-white">
            {{$Quote->content}}
        </div>
        @endforeach
    </div>

</body>

</html>