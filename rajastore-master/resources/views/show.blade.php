@extends('app')

@section('content')

            <div class="card mt-2"   >
                <div class="card-body p-0">
                    {{-- image  --}}
                    <img src="{{asset('simba.jpg')}}" alt="" class="img img-fluid" >
                   <div class="p-2">
                     {{-- title  --}}
                     <h3>Jezi mpya thimba</h3>
                     {{-- price  --}}
                     <h4>Tsh 35,000</h4>
                      {{-- description --}}
                      <p>Jezi mpya za simba kwa bei nafuu , delivery mpaka mlangoni kwako</p>
                      <button class="btn btn-danger btn-sm form-control">
                        Nunua
                      </button>
                   </div>
                </div>
            </div>


@endsection
