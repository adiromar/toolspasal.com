@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        <h4 style="padding: 5px">Sastoshowroom</h4> 
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            &copy; {{ date('Y') }} {{ 'Sastoshowroom.com' }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
