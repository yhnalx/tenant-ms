@extends('partial.getstarted')

@section('title', 'Get Started')

@section('content')
  <div class="fullscreen-header">
    <h1 class="display-5 fw-bold mb-3">TENANT MANAGEMENT SYSTEM</h1>
    <h5 class="mb-4">One system. Every tenant. Zero stress.</h5>
    <a href="{{ route('login') }}" 
       class="btn btn-light btn-get-started">
      Get Started
    </a>
  </div>
@endsection
