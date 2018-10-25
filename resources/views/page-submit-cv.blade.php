{{--
  Template Name: Submit CV Template
--}}

@extends('layouts.landing')
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')  
    <!-- @include('partials.content-page') -->
    @if(isset($_POST['submitted']))
    <h1>test submit</h1>
    @else
    <section class="section section-bg-13 section-cover pt-10 pb-19"> 

        <div class="container">
          <div class="row">
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
              <h3 class="mt-5 mb-4 text-dark">Submit your resume online and let us help you find your next job opportunity.</h3>
                <form action="{{ the_permalink() }}" id="submitcv" method="post">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">First Name</label>
                      <input type="text" class="form-control" id="inputEmail4" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Last Name</label>
                      <input type="text" class="form-control" id="inputPassword4" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress">Phone</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Phone">
                  </div>
                  <div class="form-group">
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Resume</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <input type="hidden" name="submitted" id="submitted" value="true" />
                  <button type="submit" class="btn btn-primary">Submit Your Resume</button>
                </form>
              <div class="mb-5"></div>
            </div>
          </div>
        </div>

    </section>
    @endif
  @endwhile
@endsection
