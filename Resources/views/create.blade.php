<x-bibliography::app title="{{ __('bibliography::create.title') }} - {{ config('bibliography.name') }}">

    {{-- Header for Breadcrumb and create new Items --}}
    <x-acp::header>

        {{-- Breadcrumb --}}
        <x-acp::breadcrumb>
            <x-acp::breadcrumb.item-main    :href="route('acp.backend.index')"          >@lang('acp::nav.home')  </x-acp::breadcrumb.item-main>
            <x-acp::breadcrumb.item         :href="route('bibliography.backend.index')" >@lang('bibliography::nav.bibliography') </x-acp::breadcrumb.item>
            <x-acp::breadcrumb.item                                                     >@lang('bibliography::nav.edit')</x-acp::breadcrumb.item>
        </x-acp::breadcrumb>
        {{-- /Breadcrumb --}}

    </x-acp::header>
    {{-- End Header --}}

<form action="{{ route('bibliography.backend.store') }}" method="post" enctype="multipart/form-data"> @csrf
    <div id="content">

        {!! app('BibliographyCreatePage')->render() !!}

    </div>
</form>
</x-bibliography::app>
