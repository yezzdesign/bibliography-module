<div class="flex flex-none justify-center">
    {{-- Option Edit--}}
    <x-acp::forms.opt-button :href="route('bibliography.backend.edit', $book)" ><i class="fa-solid fa-pencil w-8 fa-xl"></i> </x-acp::forms.opt-button>
    {{-- --}}

    {{-- Option State--}}
    @if($book->book_status)              <x-acp::forms.opt-button :href="route('bibliography.backend.status.change', $book)"><i class="fa-solid fa-toggle-on text-main_brand_success w-8 fa-xl"></i></x-acp::forms.opt-button>
    @elseif($book->book_status == false) <x-acp::forms.opt-button :href="route('bibliography.backend.status.change', $book)"><i class="fa-solid fa-toggle-off text-main_brand_error w-8 fa-xl"></i></x-acp::forms.opt-button>
    @endif
    {{-- --}}

    {{-- Option Delete--}}
    <form action="{{ route('bibliography.backend.post.delete', $book) }}" method="post"> @csrf @method('DELETE')
        <x-acp::forms.opt-button :href="route('bibliography.backend.post.delete', $book)"
                                 onclick="event.preventDefault();
                                                         this.closest('form').submit();">
            <i class="fa-solid fa-trash w-8 fa-xl hover:text-main_brand_error"></i>
        </x-acp::forms.opt-button>
    </form>
    {{-- --}}
</div>
