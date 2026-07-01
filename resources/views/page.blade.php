@extends('layouts.app')

@section('content')
    @if(isset($customCss) && !empty($customCss))
        <style>
            {!! $customCss !!}
        </style>
    @endif
    
    {!! $contentHtml !!}
@endsection
