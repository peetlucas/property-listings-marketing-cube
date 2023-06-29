@extends('errors::minimal')
<h2>{{ $exception->getMessage() }}</h2>
@section('title', __('Permanently moved!'))
@section('code', '410')
@section('message', __('Resource has been permanently moved!'))