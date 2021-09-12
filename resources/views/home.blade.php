@extends('layouts.app')

@section('content')

<p>Szia!</p>

<div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src="hamlet.jpg">
          <span class="card-title">Choose wisely</span>
        </div>
        <div class="card-content">
          <p>"To be, or not to be, that is the question."</p>
        </div>
        <div class="card-action">
          <a href="https://youtu.be/dQw4w9WgXcQ" target="blank">Tubi <i class="small material-icons">sentiment_very_satisfied</i></a>
          <a href="https://suicidepreventionlifeline.org/" target="blank">Nottubi <i class="small material-icons">sentiment_very_dissatisfied</i></a>
        </div>
      </div>
    </div>
  </div>

@endsection
