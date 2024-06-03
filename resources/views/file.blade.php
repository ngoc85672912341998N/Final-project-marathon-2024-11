@extends('layout.view_dashboard')
@section('content')
<style>
    .iframe-container {
  height: 30vh;

}

.iframe {
  position: absolute;
  top: 20;
  width: 94%;
  height: 85%;
}
</style>
<div class="iframe-container">
    <iframe class="iframe" src="{{ url('/filemanager') }}" frameborder="0"></iframe>
  </div>
@endsection