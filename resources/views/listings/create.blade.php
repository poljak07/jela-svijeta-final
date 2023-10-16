<x-layout>
    <x-card class=" p-10 rounded max-w-lg mx-auto mt-24">

        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Objavi jelo
            </h2>
        </header>
        @php
        if (!empty(request('slovo'))) {
        dump([request('slovo'), request('broj')]);
        }
        @endphp

        @if ($errors->any())
            <ul>
            @foreach ($errors as $message)
                <li>{{ $message }}</li>
            @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('listings.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="category" class="inline-block text-lg mb-2">Kategorija
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="category" value="{{old('category')}}" />

                @error('category')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Naziv jela engleski</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title:en" value="{{old('title:en')}}" placeholder="Primjer: Lorem Ipsum" />
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Naziv jela ( Hrvatski)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title:hr" value="{{old('title:hr')}}" placeholder="Primjer: Lorem Ipsum" />
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Naziv jela ( Njemacki)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title:de" value="{{old('title:de')}}" placeholder="Primjer: Lorem Ipsum" />
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tagovi (Odvojeni zarezom)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" value="{{old('tags')}}" placeholder="Primjer: Lorem, ipsum, dolor, etc" />
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="slika" class="inline-block text-lg mb-2">
                    Slika jela
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="slika" />
                @error('slika')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Recept
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at arcu id est consequat euismod quis et felis.">{{old('description')}}</textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Objavi jelo
                </button>

                <a href="{{ route('listings') }}" class="text-black ml-4"> Povratak </a>
            </div>
        </form>


    </x-card>

</x-layout>
