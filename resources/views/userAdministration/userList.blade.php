@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        @include('partials.page_header')
        <section class="content">

            @include('userAdministration.partials.table',['title' =>'Users'])


        </section>
    </div>
@endsection
