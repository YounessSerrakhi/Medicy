<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with JohnDoe landing page.">
    <meta name="author" content="Devcrud">
    <title>Medicy</title>
    <link rel="icon" href={{ asset("./imgs/logo.png")}}>

    <!-- font icons -->
    <link rel="stylesheet" href="{{ asset("./css/themify-icons.css")}}">
    <!-- Bootstrap + JohnDoe main styles -->
    <link rel="stylesheet" href={{ asset("./css/client.css")}}>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <a href="components.html" class="btn btn-primary btn-component" data-spy="affix" data-offset-top="600"><i class="ti-shift-left-alt"></i> Components</a>
    <header class="header">
        <div class="container">
            <ul class="social-icons pt-3">
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-google" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-github" aria-hidden="true"></i></a></li>
            </ul>  
            <div class="header-content">
                <h4 class="header-subtitle" >Pharmacy</h4>
                <h1 class="header-title">Medicy IRISI</h1>
                <h6 class="header-mono" >All medicines you need</h6>
            </div>
        </div>
    </header>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white" data-spy="affix" data-offset-top="510">
        <div class="container">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse mt-sm-20 navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#medicines" class="nav-link">Medicines</a>
                    </li>
                    <li class="nav-item">
                        <a href="#promotions" class="nav-link">Promotions</a>
                    </li>
                
                </ul>
                <ul class="navbar-nav brand">
                    <img src= "{{ asset("./imgs/logo.png")}}" alt="" class="brand-img">
                    <li class="brand-txt">
                        <h5 class="brand-title">Medicy</h5>
                        <div class="brand-subtitle">irisi | Pharmacy</div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item last-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                    <li>
                    @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            
            <ul class="navbar-nav ml-auto">
                <li>
                    <a class="btn btn-outline-secondary " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>{{ Auth::user()->name }}
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
                
            </ul>
            @endguest
        </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section class="section bg-dark text-center">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 col-lg-3">
                    <div class="row ">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-alarm-clock icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">24/7</h1>
                            <p class="text-light mb-1">Working</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-layers-alt icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">12</h1>
                            <p class="text-light mb-1">employers</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-face-smile icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">+200K</h1>
                            <p class="text-light mb-1">Happy Clients</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-heart-broken icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">+15k</h1>
                            <p class="text-light mb-1">medicines</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section medicines" id="medicines">
        <div class="container">
            <h2 class="mb-5 pb-4"><span class="text-danger">Medicines</span> list</h2>
            <div class="row">
                @foreach ($medicines as $medicine)
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-support text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h4 class="mb-3 card-title text-dark">{{ $medicine->name }}</h4>
                            <P class="subtitle">
                                <p>
                                    <strong>Form:</strong> {{ $medicine->form }}<br>
                                    <strong>Marketing Status:</strong> {{ $medicine->marketingStatus }}<br>
                                    <strong>Approval Date:</strong> {{ $medicine->approvalDate }}<br>
                                    <strong>Price:</strong> {{ $medicine->price }}DH
                                  </p>
                            </P>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section bg-custom-gray" id="promotions">
        <div class="container">
            <h1 class="mb-5"><span class="text-danger">Medicine</span> Promotions</h1>
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-3">
                    <div class="promotion-card text-center mb-4">
                        <h3 class="promotion-card-title">Free Sample</h3>
                        <div class="promotion-card-description">
                            <p>Get a free sample of a featured medicine</p>
                        </div>
                        <ul class="list">
                            <li class="list-item">1 <span class="text-muted">Free Sample</span></li>
                            <li class="list-item">Limited Quantity</li>
                            <li class="list-item">No Purchase Required</li>
                            <li class="list-item">1 <span class="text-muted">User</span></li>
                        </ul>
                        <button class="btn btn-primary btn-rounded w-lg">Claim Now</button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="promotion-card text-center mb-4">
                        <h3 class="promotion-card-title">Buy One Get One Free</h3>
                        <div class="promotion-card-description">
                            <p>Buy one medicine and get another one for free</p>
                        </div>
                        <ul class="list">
                            <li class="list-item">2 <span class="text-muted">Medicines</span></li>
                            <li class="list-item">Selected Items Only</li>
                            <li class="list-item">Limited Time Offer</li>
                            <li class="list-item">1 <span class="text-muted">User</span></li>
                        </ul>
                        <button class="btn btn-primary btn-rounded w-lg">Shop Now</button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="promotion-card text-center mb-4">
                        <h3 class="promotion-card-title">Discount Bundle</h3>
                        <div class="promotion-card-description">
                            <p>Buy a bundle of medicines at a discounted price</p>
                        </div>
                        <ul class="list">
                            <li class="list-item">5 <span class="text-muted">Medicines</span></li>
                            <li class="list-item">Pre-selected Bundle</li>
                            <li class="list-item">Save up to 20%</li>
                            <li class="list-item">1 <span class="text-muted">User</span></li>
                        </ul>
                        <button class="btn btn-primary btn-rounded w-lg">Shop Now</button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="promotion-card text-center mb-4">
                        <h3 class="promotion-card-title">Membership Benefits</h3>
                        <div class="promotion-card-description">
                            <p>Get exclusive perks and discounts with a membership</p>
                        </div>
                        <ul class="list">
                            <li class="list-item">Access to Special Deals</li>
                            <li class="list-item">Priority Shipping</li>
                            <li class="list-item">Dedicated Support</li>
                            <li class="list-item">Unlimited<span class="text-muted">Users</span></li>
                        </ul>
                        <button class="btn btn-primary btn-rounded w-lg

">Join Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-dark py-5">
        <div class="container text-center">
            <h2 class="text-light mb-5 font-weight-normal">You don't find your medicine </h2>
            <div class="btn-group">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Demand it
                </button>
                <div class="dropdown-menu form">
                   <form method="GET" action="{{ route('clientDemand')}}" class="px-4 py-3">
                      <div class="form-group">
                         <input name="medicine" type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="medicine name">
                      </div>
                      <div class="form-group">
                         <input name="quantity" type="number" class="form-control" id="exampleDropdownFormPassword1" placeholder="quantity">
                      </div>
                      <button type="submit" class="btn btn-primary btn-block">Send demand</button>
                   </form>
             </div>   
        </div>
    </section>
    <!-- End of portfolio section -->
    <div class="section contact" id="contact">
        <div id="map" class="map"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-form-card">
                        <h4 class="contact-title">Send a message</h4>
                        <form action="">
                            <div class="form-group">
                                <input  class="form-control" type="text" placeholder="Name *" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="Email *" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message *" rows="7" required></textarea>
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="form-control btn btn-primary" >Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info-card">
                        <h4 class="contact-title">Get in touch</h4>
                        <div class="row mb-2">
                            <div class="col-1 pt-1 mr-1">
                                <i class="ti-mobile icon-md"></i>
                            </div>
                            <div class="col-10 ">
                                <h6 class="d-inline">Phone : <br> <span class="text-muted">+ (212) 64516-9744</span></h6>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-1 pt-1 mr-1">
                                <i class="ti-map-alt icon-md"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="d-inline">Address :<br> <span class="text-muted">12345 Sidi Abad Marrakech Morroco.</span></h6>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-1 pt-1 mr-1">
                                <i class="ti-envelope icon-md"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="d-inline">Email :<br> <span class="text-muted">serrakhiyounesss@medicy.com</span></h6>
                            </div>
                        </div>
                        <ul class="social-icons pt-4">
                            <li class="social-item"><a class="social-link text-dark" href="#"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="#"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="#"><i class="ti-google" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="#"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="#"><i class="ti-github" aria-hidden="true"></i></a></li>
                        </ul> 
                    </div>
                </div>
            </div>

        </div>
    </div>
    <footer class="footer py-3">
        <div class="container">
            <p class="small mb-0 text-light">
                &copy; <script>document.write(new Date().getFullYear())</script> Created With <i class="ti-heart text-danger"></i> By <a href="https://www.linkedin.com/in/youness-serrakhi/" target="_blank"><span class="text-danger" title="Medicy client side">Serrakhi</span></a> 
            </p>
        </div>
    </footer>

	<!-- core  -->
    <script src="./vendors/jquery/jquery-3.4.1.js"></script>
    <script src="./vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
    <script src="./vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope  -->
    <script src="./vendors/isotope/isotope.pkgd.js"></script>
    
    <!-- Google mpas -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>


</body>
</html>
