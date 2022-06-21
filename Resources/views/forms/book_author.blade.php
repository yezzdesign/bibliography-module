<x-acp::forms.create
    :title="__('bibliography::forms.book_author.title')"
    :description="__('bibliography::forms.book_author.description')">

    <x-acp::forms.item
        type="text"
        name="book_author"
        id="book_author"
        errorDBColumn="book_author"
        :value="old('book_author') ?? $book->book_author ?? ''"
        :placeholder="__('bibliography::forms.book_author.placeholder')">

        <x-slot:span>
            <span class="inline-flex items-center px-3 rounded-l-sm border-y border-l border-main_brand/50 bg-main_brand/5 text-main_font/80 text-sm">
                <i class="fa-solid fa-feather w-4 hover:text-main_brand"></i>
            </span>
        </x-slot:span>

    </x-acp::forms.item>

</x-acp::forms.create>
