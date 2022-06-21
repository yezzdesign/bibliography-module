<x-acp::forms.create
    :title="__('bibliography::forms.book_blurb.title')"
    :description="__('bibliography::forms.book_blurb.description')">

    <div class="">
        <textarea
            name="book_blurb"
            id="summernote"
            cols="30"
            rows="20">
            {!! old('book_blurb') ?? $book->book_blurb ?? '' !!}
        </textarea>

        {{-- SummerNote CSS/JS Files--}}
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <link  href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#summernote').summernote({
                    fontNames: ['Arial', 'Yanone Kaffeesatz']
                });});
        </script>

        @error('book_blurb')<div><p class="text-xs text-main_brand_error">{{$message}}</p></div>@enderror

    </div>

</x-acp::forms.create>
