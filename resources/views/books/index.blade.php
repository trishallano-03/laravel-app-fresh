<x-layout>

<div class="min-h-screen animate-mesh py-12 px-4 flex items-center justify-center">
        <div class="max-w-6xl mx-auto w-full">
            
            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">
                
                <div class="px-8 pt-8 pb-6 bg-gradient-to-b from-white/5 to-transparent flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-blue-500/20 rounded-2xl ring-1 ring-blue-400/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white tracking-tight">Library Inventory</h1>
                            <p class="text-xs text-blue-300 uppercase tracking-widest font-bold opacity-70">Manage your collection</p>
                        </div>
                    </div>
                    <a href="/books/create" class="bg-green-600 hover:bg-green-500 px-6 py-2 rounded-xl text-sm font-bold text-white shadow-lg transition-all active:scale-95">
                        + Add Book
                    </a>
                </div>

                <div class="px-8 pb-4">
                    <form action="/books" method="GET" class="flex gap-2">
                        <input type="text" name="search" placeholder="Search by title or author..." value="{{ request('search') }}" 
                               class="flex-1 rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none">
                        <button type="submit" class="px-6 py-2 bg-slate-800 text-white rounded-xl text-sm font-bold hover:bg-slate-700 transition-all">
                            Search
                        </button>
                    </form>
                </div>

                <div class="px-8 pb-8 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-slate-400 text-xs uppercase tracking-widest border-b border-slate-700/50">
                                <th class="py-4 px-2">Book Info</th>
                                <th class="py-4 px-2">Genre</th>
                                <th class="py-4 px-2">Price</th>
                                <th class="py-4 px-2">Status</th>
                                <th class="py-4 px-2 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-slate-300">
                            @foreach($books as $book)
                            <tr class="border-b border-slate-800/50 hover:bg-white/5 transition-all">
                                <td class="py-4 px-2">
                                    <div class="font-bold text-white">{{ $book->title }}</div>
                                    <div class="text-xs text-slate-500">{{ $book->author }}</div>
                                </td>
                                <td class="py-4 px-2">{{ $book->genre }}</td>
                                <td class="py-4 px-2 text-green-400 font-mono">${{ number_format($book->price, 2) }}</td>
                                <td class="py-4 px-2">
                                    @if($book->is_available)
                                        <span class="px-2 py-1 rounded-md bg-green-500/10 text-green-400 text-[10px] font-bold uppercase ring-1 ring-green-500/30">Available</span>
                                    @else
                                        <span class="px-2 py-1 rounded-md bg-red-500/10 text-red-400 text-[10px] font-bold uppercase ring-1 ring-red-500/30">Out</span>
                                    @endif
                                </td>
                                <td class="py-4 px-2 text-right space-x-2">
                                    <a href="/books/{{ $book->id }}/edit" class="text-blue-400 hover:text-white transition-colors">Edit</a>
                                    <form action="/books/{{ $book->id }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Remove this book?')" class="text-red-400 hover:text-white transition-colors">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>