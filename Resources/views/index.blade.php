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

    {{-- Beginn Table Booklist --}}
    <x-acp::table>
        <x-acp::table.header>
            @foreach($tableHeader as $header)
                <x-acp::table.header.item> {{ $header }} </x-acp::table.header.item>
            @endforeach
        </x-acp::table.header>

        {{-- Begin Table Body--}}
        <x-acp::table.body>
            @foreach($books as $book)
                <x-acp::table.tr>

                    @foreach($tableBodyValue as $bodyValue)
                        <!-- -->
                        <x-acp::table.td>
                        @include($bodyValue)
                        </x-acp::table.td>
                        <!-- -->
                    @endforeach

                </x-acp::table.tr>
            @endforeach
        </x-acp::table.body>
        {{-- End Table Body--}}
    </x-acp::table>
    {{-- End Table Booklist--}}

</x-bibliography::app>
