@extends('layouts.base')

@section('content')
  <h1>{{ $concert->title }}</h1>
  <p>{{ $concert->subtitle }}</p>
  <p>{{ $concert->formatted_date }}</p>
  <p>Doors at {{ $concert->formatted_start_time }}</p>
  <p>{{ $concert->ticket_price_in_dollars }}</p>
  <p>{{ $concert->city }}, {{ $concert->state }} {{ $concert->zip }}</p>
  <p>{{ $concert->venue }}</p>
  <p>{{ $concert->venue_address }}</p>
  <p>{{ $concert->additional_information }}</p>
@endsection
     $concert = factory(Concert::class)->create([
       'date' => Carbon::parse('2016-12-01 8:00pm')
     ]);
