@extends('landing.layouts.app')

@section('title','Ата жолы')

@section('content')
   @include('landing.components.s-sites')
   @include('landing.components.s-books')
   @include('landing.components.s-about')
   @include('landing.components.s-aqul')
   @include('landing.components.contact')

@endsection