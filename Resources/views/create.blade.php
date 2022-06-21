<x-bibliography::app title="{{ __('bibliography::create.title') }} - {{ config('bibliography.name') }}">

    {{-- Header for Breadcrumb and create new Items --}}
    <x-acp::header>
        {{-- Breadcrumb --}}
        <x-acp::breadcrumb>
            <x-acp::breadcrumb.item-main    :href="route('acp.backend.index')"          >@lang('acp::nav.home')  </x-acp::breadcrumb.item-main>
            <x-acp::breadcrumb.item         :href="route('bibliography.backend.index')" >@lang('bibliography::nav.bibliography') </x-acp::breadcrumb.item>
            <x-acp::breadcrumb.item                                                     >@lang('bibliography::nav.edit')</x-acp::breadcrumb.item>
        </x-acp::breadcrumb>

    </x-acp::header>
    {{-- End Header --}}

<form action="{{ route('bibliography.backend.store') }}" method="post" enctype="multipart/form-data"> @csrf
    <div id="content">

        <x-acp::forms.divider />

        {{-- Book Titel --}}
        @include('bibliography::forms.book_title')
        <x-acp::forms.divider />
        {{-- /Book Titel --}}

        {{-- Book Author --}}
        @include('bibliography::forms.book_author')
        <x-acp::forms.divider />
        {{-- /Book Author --}}

        {{-- Book Blurb --}}
        @include('bibliography::forms.book_blurb')
        <x-acp::forms.divider />
        {{-- /Book Blurb --}}

        {{-- Publishing Date --}}
        @include('bibliography::forms.read_at')
        <x-acp::forms.divider />
        {{-- /Publishing Date --}}

        {{-- Image Upload --}}
        @include('bibliography::forms.book_cover')
        <x-acp::forms.divider />
        {{-- /Image Upload --}}

        {{-- Book Status --}}
        @include('bibliography::forms.book_status')
        <x-acp::forms.divider />
        {{-- Book Status --}}

        {{-- Save Button --}}
        @include('bibliography::forms.save')
        <x-acp::forms.divider />
        {{-- /Save Button --}}

    </div>
</form>
</x-bibliography::app>
