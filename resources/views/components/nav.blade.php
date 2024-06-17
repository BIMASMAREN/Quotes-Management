    <nav class="w-full p-3 flex justify-between bg-gray-800 text-right">
        <div>
            <a href="{{route('newquote')}}" class="bg-green-400 text-black font-mono text-md p-1.5 rounded">Create Quote</a>
            <a href="{{route('QuotesList')}}" class="bg-green-400 text-black font-mono text-md p-1.5 rounded">List Quotes</a>
            <a href="{{route('quotes')}}" class="bg-green-400 text-black font-mono text-md p-1.5 rounded">Random Quote</a>
        </div>
        <div>
            <a href="{{route('logout')}}" class="bg-red-400 text-black font-mono text-md p-1.5 rounded">Log out</a>
        </div>
    </nav>