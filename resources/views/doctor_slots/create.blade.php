@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{route('store.slot')}}">
                @csrf
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
              <div class="form-group">
                <label for="doctorid">DoctorId</label>
                <input type="text" class="form-control" id="doctorid" name="doctorId"  placeholder="Enter doctorId">
              </div>
              <div class="form-group">
                <label for="date">Date</label>
                <input  type="date" class="form-control" id="date" name="date" >
              </div>
              <div class="row">
                  <div class="form-group col-md-6">
                    <label for="start_time">start time</label>
                    <input type="time" class="form-control" id="start_time" name="start_time" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="end_time">End time</label>
                    <input type="time" class="form-control" id="end_time" name="end_time" >
                  </div>
            </div>
              <div class="form-group">
                <label for="duratiion">slot Duration</label>
                <select class="form-control" name="slot_duration">
                  <option>select rows</option>
                  <option value="15">15 Mininutes</option>
                  <option value="30">30 Mininutes</option>
                  <option value="45">45 Mininutes</option>
                  <option value="60">60 Mininutes</option>
                </select>

              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('custom-js')

    <script type="text/javascript">
        /*for futuure date*/
      

</script>
@endpush
