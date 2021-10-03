@extends('layouts.dashboard')

@section('content')
    <h1 class="h2">بروزرسانی پست </h1>
    @include('partials.update-post-form')

@endsection




@section('cssinput')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('editor')
    <script src="{{ asset('admin/assets/dist/js/tinymce.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'directionality',
            toolbar: 'ltr rtl'
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endsection
