@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header button"><button class="submit"><a href="{{route('add-slot')}}">Add Slot</a></button> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Doctor Id</th>
                  <th scope="col">Date</th>
                  <th scope="col">Start Time</th>
                  <th scope="col">End Time</th>
                  <th scope="col">Slot Duration</th>
                </tr>
              </thead>
              <tbody>
                @foreach($doctor as $key  => $value)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$value->doctor_id}}</td>
                  <td>{{$value->date}}</td>
                    <td>{{$value->start_time}}</td>
                  <td>{{$value->end_time}}</td>
                  <td>{{$value->slot_duration}}</td>                  
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
