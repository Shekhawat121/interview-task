@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header button"><button class="submit"><a href="{{route('add-appointment')}}">Add Appopintment</a></button> </div>

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
                  <th scope="col">Apppoitment Date</th>
                  <th scope="col">start time</th>
                  <th scope="col">end Date</th>
                  <th scope="col">slot  duration</th>

                </tr>
              </thead>
              <tbody>
                @foreach($appoinntment as $key  => $value)
                    @foreach($value->getDoctorAppointment as $i  => $val)                
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$val->doctor_id}}</td>
                      <td>{{@$val->date}}</td>
                        <td>{{@$val->start_time}}</td>
                      <td>{{@$val->end_time}}</td>
                      <td>{{@$val->slot_duration}}</td>                  
                    </tr>
                    @endforeach
                @endforeach

              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
