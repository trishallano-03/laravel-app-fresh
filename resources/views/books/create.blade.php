<x-layout>

<div class="min-h-screen animate-mesh py-12 px-4 flex items-center justify-center">
        <div class="max-w-3xl mx-auto w-full">
            
            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">
                
                <div class="px-8 pt-8 pb-6 bg-gradient-to-b from-white/5 to-transparent">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-green-500/20 rounded-2xl ring-1 ring-green-400/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white tracking-tight">Add New Book</h1>
                            <p class="text-xs text-green-300 uppercase tracking-widest font-bold opacity-70">Register New Inventory</p>
                        </div>
                    </div>
                </div>

                <div class="px-8 pb-8">
                    <form method="POST" action="/books" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1 uppercase">Book Title</label>
                                <input type="text" name="title" required value="{{ old('title') }}" class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 text-sm focus:border-green-500 focus:outline-none">
                                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1 uppercase">Author</label>
                                <input type="text" name="author" required value="{{ old('author') }}" class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 text-sm focus:border-green-500 focus:outline-none">
                                @error('author') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1 uppercase">Description / Summary</label>
                            <textarea name="description" rows="3" required class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 text-sm focus:border-green-500 focus:outline-none" placeholder="What is this book about?">{{ old('description') }}</textarea>
                            @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1 uppercase">Genre</label>
                                <select name="genre" class="w-full rounded-xl bg-slate-950 text-white px-4 py-2 text-sm focus:border-green-500 focus:outline-none">
                                    <option value="Fiction" {{ old('genre') == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                                    <option value="Non-Fiction" {{ old('genre') == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                                    <option value="Sci-Fi" {{ old('genre') == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                                    <option value="Mystery" {{ old('genre') == 'Mystery' ? 'selected' : '' }}>Mystery</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1 uppercase">Published Year</label>
                                <input type="number" name="published_year" required value="{{ old('published_year') }}" class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 text-sm focus:border-green-500 focus:outline-none">
                                @error('published_year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1 uppercase">ISBN</label>
                                <input type="text" name="isbn" required value="{{ old('isbn') }}" class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 text-sm focus:border-green-500 focus:outline-none">
                                @error('isbn') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1 uppercase">Pages</label>
                                <input type="number" name="pages" required value="{{ old('pages') }}" class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 text-sm focus:border-green-500 focus:outline-none">
                                @error('pages') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1 uppercase">Language</label>
                                <input type="text" name="language" required value="{{ old('language') }}" class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 text-sm focus:border-green-500 focus:outline-none">
                                @error('language') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1 uppercase">Publisher</label>
                                <input type="text" name="publisher" required value="{{ old('publisher') }}" class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 text-sm focus:border-green-500 focus:outline-none">
                                @error('publisher') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1 uppercase">Price ($)</label>
                                <input type="number" step="0.01" name="price" required value="{{ old('price') }}" class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 text-sm focus:border-green-500 focus:outline-none">
                                @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1 uppercase">Cover Image</label>
                                <input type="file" name="cover_image" class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-green-600 file:text-white hover:file:bg-green-500 transition-all">
                                @error('cover_image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="flex items-center space-x-2 pt-2">
                            <input type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available') ? 'checked' : 'checked' }} class="rounded border-slate-700 bg-slate-950 text-green-500 focus:ring-green-500/20">
                            <label for="is_available" class="text-sm text-slate-300">Available for immediate borrowing</label>
                        </div>

                        <div class="mt-8 flex justify-end space-x-4">
                            <a href="/books" class="px-8 py-3 rounded-xl text-sm font-bold text-slate-400 hover:text-white transition-all">Cancel</a>
                            <button type="submit" class="bg-green-600 hover:bg-green-500 active:scale-95 transition-all px-10 py-3 rounded-xl text-sm font-bold text-white shadow-lg shadow-green-500/20">
                                Save Book to System
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>