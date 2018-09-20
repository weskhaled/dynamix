@extends('layouts.landing')
@section('content')
<section class="about-us bg-light">
  <div class="container container-inner">
    <div class="row">
      <div class="col-sm-4">
        <h5 class="light mines-left text-uppercase">About us</h5>
        <h1 class="w700 text-uppercase">
          About Dynamix s.a
        </h1>
      </div>
      <div class="col-sm-8">
        <div class="space30px"></div>
        <p class="text-dark">
          Dynamix s.a is a management company of Java consultants. We are specialized in Java web
          development, the Java consulting
          team at Dynamix s.a is proficient and experienced to create and manage applications aptly
          and
          accordingly adapt with the fast changing technological advancements. They are equipped to
          work
          on existing applications and transform them to meet your future business objectives and
          expectations…
        </p>
        <button class="btn btn-primary black btn-sm float-sm-right">Read More <i class="feathericon feathericon-arrow-right right"></i></button>
      </div>
    </div>
  </div>
</section>
<section class="expertise">
  <div class="container container-inner">
    <div class="section-title text-center">
      <h3 class="big w100 shadow-white text-uppercase">Expertise</h3>
      <div class="seperator"></div>
    </div>
    <div class="row justify-content-center">
      <div class="col-10">
        <p class="text-center text-dark">
          Because expertise is a prerequisite, the consultant Dynamix SA shares a vision where the
          ability to do and say the right
          thing in any social situation. He is also a creator of performance. Adaptive capacity and
          understanding
          of issues are key to the success of our mission Holding people accountable is a fundamental
          premise
          of good management. Aware of the issues, often strategic, in the missions entrusted to him,
          the
          Dynamix consultant acts loyally and ethically
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="icon-info">
          <div class="icon">
            <i class="icon-lightbulb"></i>
          </div>
          <div class="info text-uppercase">
            <h4>Expertise</h4>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="icon-info">
          <div class="icon">
            <i class="icon-key"></i>
          </div>
          <div class="info text-uppercase">
            <h4>Accountability and trust</h4>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="icon-info">
          <div class="icon">
            <i class="icon-clipboard"></i>
          </div>
          <div class="info text-uppercase">
            <h4>Responsibility</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="testimonials" class="inner-shadow pattern-faces">
  <!-- <div class="pattern pattern-1"></div> -->
  <div class="pattern back-35-g"></div>
  <div class="container container-inner text-center">
      <div class="space30px"></div>
      <div class="space30px"></div>
      <div class="row">
          <div id="quote-clients" class="swiper-container">
              <div class="swiper-wrapper text-center color-white">
                  <div class="swiper-slide quote">
                      <div class="client-image">
                          <img src="@asset('images/people/e-bout.jpg')" alt="">
                      </div>
                      <h4 class="live-font text-capitalize">Ekaterina Bout</h4>
                      <blockquote>It is a very pleasant environment to work in. People at Dynamix are more
                          friends
                          than colleagues. The manager is easily approachable and is supportive.</blockquote>
                      <div class="client-info">
                          <span class="badge badge-dark">Admin, Accounting and logistics</span>
                      </div>
                  </div>
                  <!--item-quote-->
                  <div class="swiper-slide quote">
                      <div class="client-image">
                          <img src="@asset('images/people/e-bout.jpg')" alt="">
                      </div>
                      <h4 class="live-font text-capitalize">marwen lamti</h4>
                      <blockquote>
                          It's an incredible feeling to be able to put someone in a job. I get to spend my
                          days talking to all different people across the country and from different walks of
                          life. It's fulfilling to be able to help people get the job they love!"“It’s a
                          pleasure working with Dynamix, They have a global and great understanding of
                          consultants and clients requirements
                      </blockquote>
                      <div class="client-info">
                          <span class="badge badge-dark">Admin, Accounting and logistics</span>
                      </div>
                  </div>
                  <!--item-quote-->
                  <div class="swiper-slide quote">
                      <div class="client-image">
                          <img src="@asset('images/people/e-bout.jpg')" alt="">
                      </div>
                      <h4 class="live-font text-capitalize">chaitali khodwe</h4>
                      <blockquote>
                          With help of Dynamix I can now deep dive into emerging technological advancements
                          by getting placed as desires clients and roles. People in Dynamix are jovial and
                          approachable and helped me to collaborate and adjust with multicultural teams.
                      </blockquote>
                      <div class="client-info">
                          <span class="badge badge-dark">Admin, Accounting and logistics</span>
                      </div>
                  </div>
                  <!--item-quote-->
                  <div class="swiper-slide quote">
                      <div class="client-image">
                          <img src="@asset('images/people/s-jobs.jpg')" alt="">
                      </div>
                      <h4 class="live-font text-capitalize">saidani sami</h4>
                      <blockquote>
                          The recruiters’ team of Dynamix are approachable and knowledgeable with queries and
                          concerns of their employees and consultants
                      </blockquote>
                      <div class="client-info">
                          <span class="badge badge-dark">Admin, Accounting and logistics</span>
                      </div>
                  </div>
                  <!--item-quote-->
              </div>
              <div class="space30px"></div>
              <div class="space30px"></div>
              <div class="swiper-pagination"></div>
          </div>
      </div>
  </div>
</section>
<section id="partners">
  <div class="container container-inner">
      <div class="section-title text-center">
          <h3 class="big w100 shadow-white text-uppercase">Our partners</h3>
          <div class="seperator"></div>
      </div>
      <div class="row justify-content-center">
          <div class="col-12">
              <div id="partners-slider" class="partners swiper-container">
                  <div class="swiper-wrapper">
                      <div class="swiper-slide">
                          <img src="img/partners/brain.jpg" alt="">
                      </div>
                      <div class="swiper-slide">
                          <img src="img/partners/experis.jpg" alt="">
                      </div>
                      <div class="swiper-slide">
                          <img src="img/partners/clearsource.jpg" alt="">
                      </div>
                      <div class="swiper-slide">
                          <img src="img/partners/koda.jpg" alt="">
                      </div>
                      <div class="swiper-slide">
                          <img src="img/partners/brain.jpg" alt="">
                      </div>
                      <div class="swiper-slide">
                          <img src="img/partners/experis.jpg" alt="">
                      </div>
                      <div class="swiper-slide">
                          <img src="img/partners/clearsource.jpg" alt="">
                      </div>
                  </div>
                  <!-- Add Scrollbar -->
                  <!-- <div class="swiper-scrollbar"></div> -->
              </div>
          </div>
      </div>
  </div>
</section>
<div class="pre-section text-center">
  <p class="color-white text-uppercase">Feel free to drop us a line to contact us</p>
</div>
<section id="contact" class="inner-shadow cover-img bg-city" data-stellar-background-ratio="0.1">
  <div class="pattern pattern-1"></div>
  <div class="pattern back-35"></div>
  <div class="container container-inner">
    <div class="row animated row justify-content-center fadeInUp" data-animate="fadeInUp" style="opacity: 1;">
      <div class="col-md-8">
        <div class="contact-wrap back-55 clearfix">
          <h4 class="big w700 text-center text-uppercase color-white">Get in touch</h4>
          <div class="seperator"></div>
          <form class="needs-validation" novalidate="">
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationTooltipUsername">Name</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" id="validationTooltipUsername" placeholder="name"
                    aria-describedby="validationTooltipUsernamePrepend" required="">
                  <div class="invalid-tooltip">
                    Please choose a unique and valid username.
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationTooltipUsername">Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-at"></i></span>
                  </div>
                  <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Email"
                    aria-describedby="validationTooltipUsernamePrepend" required="">
                  <div class="invalid-tooltip">
                    Please choose a unique and valid username.
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationTooltipUsername">Phone</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control" id="validationTooltipUsername" placeholder="+(216) 99 99 99 99"
                    aria-describedby="validationTooltipUsernamePrepend" required="">
                  <div class="invalid-tooltip">
                    Please choose a unique and valid username.
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationTooltipUsername">Message</label>
                <textarea rows="5" class="form-control" id="validationTooltipUsername" placeholder="Message"
                  aria-describedby="validationTooltipUsernamePrepend" required=""></textarea>
                <div class="invalid-tooltip">
                  Please choose a unique and valid username.
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-fill white float-right" type="submit">Contact us
              now!</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div id="map" class="map-toggle text-center">
    <a href="#map" class="w600 text-uppercase color-white viewmap">Locate Us on Map</a>
    <div class="google-map" id="gmap"></div>
  </div>
</section>
@endsection