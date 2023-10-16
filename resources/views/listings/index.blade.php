<x-layout>
@include('partials._search')
<div class="mx-4 mb-4 flex flex-row justify-end">
    <form>
        @php
            $showSelections = ['all', '5', '10', '25', '50'];

            $perPage = \Request::get('per_page') ?? null;
            if (!in_array($perPage, $showSelections)) {
                $perPage = '10'; 
            }
        @endphp
        <select id="locales" class="p-2">
            @foreach ($showSelections as $showSelector)
                <option value="{{ $showSelector }}" {{ $showSelector ==  $perPage? 'selected' :'' }}>{{ $showSelector }}</option>
            @endforeach
        </select>
        <script>
            function replaceQueryParam(param, value, url) {
                var regex = new RegExp("([?;&])" + param + "[^&;]*[;&]?");
                var query = url.replace(regex, "$1").replace(/&$/, '');
                return (query.length > 2 ? query + "&" : "?") + (value ? param + "=" + value : '');
            }
            document.getElementById('locales').onchange = function() {
                window.location = '{{ route('listings') }}' + replaceQueryParam('per_page', this.value, window.location.search)
            };
        </script>
    </form>
</div>
<div class="lg:grid lg:grid-cols-4 gap-4 space-y-4 md:space-y-0 mx-4">


@if(count($listings) == 0)
 <p>Jela nisu pronađena </p>
@endif

@unless(count($listings) == 0)

@foreach($listings as $listing)
    <x-listing-card :listing="$listing" />
@endforeach

@else
 <p> Jela nisu pronađena </p>
@endunless

</div>

<div class="mt-6 p-4">
    {{$listings->links()}}
</div>

</x-layout>
