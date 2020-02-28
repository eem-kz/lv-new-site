@extends('layouts.main.header')

@section('title','Ата жолы')

@section('content')
   @include('pub.components.s-sites')
   @include('pub.components.s-books')
   @include('pub.components.s-about')
   @include('pub.components.s-aqul')
   @include('pub.components.contact')

@endsection