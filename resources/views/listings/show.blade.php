<x-layout>
    @include('partials._search')



    <div class="mx-4 flex justify-between">
        <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
        <div class="">
            <form>
                @php
                    $currentLocale = \Request::get('lang') ?? config('translatable.fallback_locale');
                @endphp
                <select id="locales">
                    @foreach (config('translatable.locales') as $locale)
                        <option value="{{ mb_strtolower($locale) }}" {{ $currentLocale === $locale ? 'selected' :'' }}>{{ mb_strtoupper($locale) }}</option>
                    @endforeach
                </select>
                <script>
                document.getElementById('locales').onchange = function() {
                    window.location = "{!! route('listings.show', ['listing' => $listing->id]) !!}?lang=" + this.value;
                };
                </script>
            </form>
        </div>
    </div>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="" />

                <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                <x-listing-tags :tagsCsv="$listing->tags" />

                <div class="border border-gray-250 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Opis jela
                    </h3>
                    <div class="text-lg space-y-6">
                        {{$listing->description}}


                    </div>
                </div>
            </div>
        </x-card>
    </div>

</x-layout>
