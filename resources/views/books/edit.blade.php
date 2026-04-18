<x-layout>
    <div class="min-h-screen animate-mesh py-12 px-4 flex items-center justify-center">
        <div class="max-w-4xl mx-auto w-full">
            
            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">
                
                <div class="px-8 pt-8 pb-6 bg-gradient-to-b from-white/5 to-transparent flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-blue-500/20 rounded-2xl ring-1 ring-blue-400/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white tracking-tight">Edit Book Details</h1>
                            <p class="text-xs text-blue-300 uppercase tracking-widest font-bold opacity-70">Updating: {{ $book->title }}</p>
                        </div>
                    </div>
                    <a href="/books" class="text-slate-400 hover:text-white text-sm font-bold transition-all">
                        &larr; Back to Inventory
                    </a>
                </div>

                <div class="px-8 pb-10">
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 rounded-xl text-red-400 text-xs">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/books/{{ $book->id }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Book Title</label>
                                <input type="text" name="title" value="{{ old('title', $book->title) }}" required 
                                       class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3 text-sm focus:border-blue-500 focus:outline-none transition-all">
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Author</label>
                                <input type="text" name="author" value="{{ old('author', $book->author) }}" required
                                       class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3 text-sm focus:border-blue-500 focus:outline-none transition-all">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Description</label>
                            <textarea name="description" rows="4" required
                                      class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3 text-sm focus:border-blue-500 focus:outline-none transition-all">{{ old('description', $book->description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Genre</label>
                                <select name="genre" class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3 text-sm focus:border-blue-500 focus:outline-none appearance-none">
                                    <option value="Fiction" {{ $book->genre == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                                    <option value="Non-Fiction" {{ $book->genre == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                                    <option value="Sci-Fi" {{ $book->genre == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                                    <option value="Mystery" {{ $book->genre == 'Mystery' ? 'selected' : '' }}>Mystery</option>
                                    <option value="Horror" {{ $book->genre == 'Horror' ? 'selected' : '' }}>Horror</option>
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Price ($)</label>
                                <input type="number" step="0.01" name="price" value="{{ old('price', $book->price) }}" required
                                       class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3 text-sm focus:border-blue-500 focus:outline-none transition-all">
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Status</label>
                                <select name="is_available" class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3 text-sm focus:border-blue-500 focus:outline-none appearance-none">
                                    <option value="1" {{ $book->is_available ? 'selected' : '' }}>Available</option>
                                    <option value="0" {{ !$book->is_available ? 'selected' : '' }}>Out of Stock</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                             <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">ISBN</label>
                                <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" required
                                       class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3 text-sm focus:border-blue-500 focus:outline-none transition-all">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Published Year</label>
                                <input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}" required
                                       class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3 text-sm focus:border-blue-500 focus:outline-none transition-all">
                            </div>
                        </div>

                        <input type="hidden" name="pages" value="{{ $book->pages }}">
                        <input type="hidden" name="language" value="{{ $book->language }}">
                        <input type="hidden" name="publisher" value="{{ $book->publisher }}">

                        <div class="pt-4 flex justify-end">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-500 px-10 py-3 rounded-xl text-sm font-bold text-white shadow-lg transition-all active:scale-95">
                                Update Information
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>