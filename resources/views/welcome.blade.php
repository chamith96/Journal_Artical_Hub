@extends('layouts.app')
  @section('content')

      @include('layouts.messages')

      <main class="site-main">
    <section class="hero_area">
        <div class="hero_content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Sabaragamuwa University of Sri Lanka</h4>
                        <p>Donec Elit Non Porta Gravida Eget Metus</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

              <section class="services">
                  <h2 class="section-title">JOURNALS</h2>
                  <div class="container">
<br>
                        @if(count($journals) > 0)
                      <div class="row text-center text-lg-left">
                                       @foreach ($journals as $journal)
                                 <div class="col-lg-4 col-md-4 col-xs-6">
                                     <img class="img-fluid img-thumbnail" src="storage/journals/{{$journal->id}}/{{ $journal->image }}" alt="">
                                   <h4>{{ $journal->jtitle }}</h4>
                                   <p>{{ $journal->description }}</p>
                                   <p>{{ $journal->name }}</p>
                                 </div>
                                   @endforeach
                               </div>
                              {{$journals->links()}}
                              @endif

                  </div>
              </section>


          </main>
          <footer class="site-footer">
              <div class="container">
                  <div class="row">
                      <div class="col-md-3 col-sm-6 col-xs-12 fbox">
                          <h4>MISSION</h4>
                          <p class="text">Our mission is to search for and disseminate knowledge, promote learning, research and training to produce men and women proficient in their respective disciplines possessing practical skills and positive attitudes enabling them to contribute towards the manpower requirements of the nation.</p>

                      </div>
                      <div class="col-md-3 col-sm-6 col-xs-12 fbox">
                          <h4>VISION</h4>
                            <p class="text">To be an internationally acclaimed centre of excellence in higher learning producing dynamic leaders and nation builders to guide the destiny of Sri Lanka.</p>
                      </div>
                      <div class="col-md-3 col-sm-6 col-xs-12 fbox">
                          <h4>QUICK LINKS</h4>
                          <ul>
                              <li><a href="http://www.sab.ac.lk">SUSL - Main Page</a></li>
                              <li><a href="http://www.sab.ac.lk/agri">Faculty of Agricultural Sciences</a></li>
                              <li><a href="http://www.sab.ac.lk/app/">Faculty of Applied Sciences</a></li>
                              <li><a href="http://www.sab.ac.lk/geo/">Faculty of Geomatics</a></li>
                              <li><a href="http://www.sab.ac.lk/mgmt/">Faculty of Management Studies</a></li>
                              <li><a href="http://www.sab.ac.lk/med/">Faculty of Medicine</a></li>
                              <li><a href="http://www.sab.ac.lk/fssl/">Faculty of Social Sciences and Languages</a></li>
                              <li><a href="http://www.sab.ac.lk/tech/">Faculty of Technology</a></li>
                          </ul>
                      </div>
                      <div class="col-md-3 col-sm-6 col-xs-12 fbox">
                          <h4>CONTACT</h4>
                          <p><a href="#"><i class="fas fa-address-card"></i> Sabaragamuwa University of Sri Lanka,  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; P.O. Box 02, Belihuloya, Sri Lanka.</a></p>
                          <p><a><i class="fas fa-phone"></i> +90 222 222 22 22</a></p>
                          <p><a href="mailto:iletisim@agrisosgb.com"><i class="fas fa-envelope"></i> mail@awebsitename.com</a></p>
                      </div>
                  </div>
              </div>
              <div id="copyright">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-4">
                              <p class="pull-left">&copy; 2018 SUSL</p>
                          </div>
                          <div class="col-md-8">
                              <ul class="list-inline navbar-right">
                                  <li><a href="{{url('/')}}">HOME</a></li>
                                  <li><a href="{{url('/login')}}">USER</a></li>
                                  <li><a href="{{url('/admin/login')}}">ADMIN</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </footer>
          </div>


  @endsection
