<x-bibliography::app title="{{__('bibliography::index.title')}} - {{ config('bibliography.name') }}">

    {{-- Header for Breadcrumb and create new Items --}}
    <x-acp::header>
        {{-- Breadcrumb --}}
        <x-acp::breadcrumb>
            <x-acp::breadcrumb.item-main    :href="route('acp.backend.index')"          >@lang('acp::nav.home')  </x-acp::breadcrumb.item-main>
            <x-acp::breadcrumb.item         :href="route('bibliography.backend.index')" >@lang('bibliography::nav.bibliography') </x-acp::breadcrumb.item>
            <x-acp::breadcrumb.item                                                     >@lang('bibliography::nav.index')</x-acp::breadcrumb.item>
        </x-acp::breadcrumb>
        {{-- Create new Button--}}
        <x-acp::forms.a-button :href="route('bibliography.backend.create')"><i class="fa-solid fa-plus"></i> {{ __('bibliography::index.button.add.book') }}</x-acp::forms.a-button>
        {{-- End Create new --}}
    </x-acp::header>
    {{-- End Header --}}

    {{-- Table Booklist --}}
    {!! app( 'BibliographyIndexTable' )->render( $books , 'book') !!}
    {{ $books->links() }}

</x-bibliography::app>
