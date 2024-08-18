@extends('front.layouts.app')
@section('application')
<section class="contact_section ">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 px-0">
          <div class="img-box">
            <img src="{{asset('images/contact-img.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-lg-5 col-md-6">
          <div class="form_container pr-0 pr-lg-5 mr-0 mr-lg-2">
            <div class="heading_container">
              <h2>
                Application
              </h2>
            </div>
            <form action="{{route('home.store')}}" method="post">
              @csrf
              <div>
                <input type="text" name='name' placeholder="Name" />
              </div>
              <div>
                <input type="email" name='email' placeholder="Email" />
              </div>
              <div>
                <input type="text" name='phone' placeholder="Phone Number" @error('name') is-invalid @enderror />
                @error('name')
                 <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong> </span>
                 @enderror
              </div>
              <div>
              <input type="date" name="start_date" id="date"  style="width: 100%; display: inline;">
              </div>
              <div>
              <input type="date" name="end_date" id="date"  style="width: 100%; display: inline;">
              </div>
              <div class="mb-3">
              <label for="sports"  class="form-label">Choose Sports:</label>
              <select class="form-select" name="sports[]" id="sports" multiple>
              @foreach($sports as $sport)
                 <option value="{{ $sport->id }}">{{ $sport->name }}</option>
              @endforeach
              </div>
    </select>
              <div class="d-flex ">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection