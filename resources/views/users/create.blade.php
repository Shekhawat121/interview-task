@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{route('store.appointment')}}">
                @csrf
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
              <div class="form-group">
                <label for="duratiion">select doctor</label>
                <select class="form-control" id="doctor_id" name="doctor_id">
                  <option>select doctor</option>
                  @foreach($doctor as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                </select>

              </div>
              <div class="form-group">
                <label for="duratiion">select slot</label>
                <select class="form-control" id="slot" name="slot_id">
                  <option>select slot</option>
                </select>
              </div>


              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('custom-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        /*for futuure date*/
        $("#doctor_id").on("change" , function () {
          // function getval() {
            console.log("Safasdf");
            var id = $(this).val();
            console.log(id);
            $.ajax({
              type: "POST",
              url: "{{route('get.slot')}}",
              data:{"_token" : "{{csrf_token()}}" , "id": id},
              success: function (data) {
                console.log(data.data[0]);
                var select = ''; 
                $.each(data.data , function (key , value) {
                  select += '<option value="'+value.id+'" >'+value.date+ '('+value.start_time+ '-'+value.end_time+ ')</option>'; 
                });
                $("#slot").append(select);
                console.log(select);
              }

            })

        })

</script>
@endpush
