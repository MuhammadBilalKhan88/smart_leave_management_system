<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart LMS - Home</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- AOS Animations -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<style>
  /* Section Titles */
h2.section-title {
  font-weight: 700;
  font-size: 2.7rem;
  color: #222;
  margin-bottom: 45px;
  position: relative;
  display: inline-block;
  text-transform: capitalize;
  letter-spacing: 1.2px;
  background: linear-gradient(90deg, #6c63ff, #48c6ef);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

h2.section-title::after {
  content: '';
  width: 120px;
  height: 6px;
  background: linear-gradient(90deg, #ff7eb3, #6c63ff, #48c6ef);
  display: block;
  margin: 14px auto 0;
  border-radius: 10px;
  box-shadow: 0 4px 15px rgba(108,99,255,0.5);
  animation: underlineAnim 1.2s ease forwards;
}

@keyframes underlineAnim {
  from { width: 0; opacity: 0; }
  to { width: 120px; opacity: 1; }
}

/* Buttons */
.btn-custom {
  border-radius: 30px;
  padding: 12px 28px;
  font-size: 1.1rem;
  font-weight: 600;
  background: linear-gradient(135deg, #6c63ff, #48c6ef);
  border: none;
  color: #fff;
  transition: all 0.4s ease;
}
.btn-custom:hover {
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 10px 25px rgba(108,99,255,0.4);
  background: linear-gradient(135deg, #48c6ef, #6c63ff);
}

/* Hero Section Extra Glow */
.hero-section h1 {
  text-shadow: 0px 4px 20px rgba(0,0,0,0.4);
}
.hero-section p {
  font-size: 1.3rem;
  opacity: 0.9;
}

/* Feature Cards */
.feature-card {
  border: none;
  background: rgba(255,255,255,0.7);
  backdrop-filter: blur(14px);
  border-radius: 25px;
  transition: all 0.4s ease;
  box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}
.feature-card:hover {
  transform: translateY(-12px) scale(1.05);
  box-shadow: 0 20px 45px rgba(0,0,0,0.15);
}
.feature-card i {
  width: 80px;
  height: 80px;
  font-size: 2rem;
  background:#fff;
  border-radius: 50%;
  box-shadow: 0 8px 20px rgba(108,99,255,0.4);
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Team Cards */
.team-card {
  border-radius: 25px;
  background: linear-gradient(135deg, #ffffff, #f7f8fc);
  transition: 0.4s ease;
}
.team-card:hover {
  transform: translateY(-12px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.12);
}

/* Testimonials */
.testimonial-card {
  border-radius: 25px;
  padding: 30px;
  background: linear-gradient(135deg, #ffffff, #f9f9ff);
  box-shadow: 0 5px 20px rgba(0,0,0,0.08);
  transition: 0.4s ease;
}
.testimonial-card:hover {
  transform: translateY(-10px) rotate(-1deg);
  box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}
.testimonial-card p {
  font-size: 1.05rem;
  color: #444;
}

/* Contact */
.contact-form input,
.contact-form textarea {
  border-radius: 15px;
  padding: 14px;
  border: 1px solid #ddd;
}
.contact-form input:focus,
.contact-form textarea:focus {
  border-color: #6c63ff;
  box-shadow: 0 0 12px rgba(108,99,255,0.3);
}
.contact-form button {
  border-radius: 30px;
  padding: 12px;
  background: linear-gradient(135deg, #6c63ff, #48c6ef);
  font-weight: 600;
  border: none;
}
.contact-form button:hover {
  transform: scale(1.07);
  box-shadow: 0 12px 25px rgba(0,0,0,0.2);
}

/* Footer */
footer {
  background: linear-gradient(135deg, #6c63ff, #48c6ef);
  padding: 40px 0;
  color: #fff;
  position: relative;
}
footer p {
  font-size: 1rem;
  opacity: 0.9;
}
/* Hero Section Styling */
.hero-section {
  position: relative;
  height: 100vh;
  background: linear-gradient(135deg, #6c63ff, #48c6ef);
  color: #fff;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.hero-section h1 {
  font-size: 3.5rem;
  font-weight: 800;
  letter-spacing: 1.5px;
  background:#fff;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  text-shadow: 0 6px 25px rgba(0,0,0,0.3);
  animation: fadeSlideDown 1.2s ease;
}

.hero-section p {
  font-size: 1.3rem;
  margin-top: 15px;
  opacity: 0.95;
  color: #f1f1f1;
  animation: fadeSlideUp 1.4s ease;
}

.hero-section .btn-custom {
  margin-top: 25px;
  padding: 14px 32px;
  font-size: 1.1rem;
  border-radius: 35px;
  background: linear-gradient(135deg, #ff7eb3, #6c63ff, #48c6ef);
  border: none;
  color: #fff;
  font-weight: 600;
  transition: all 0.4s ease;
  box-shadow: 0 8px 20px rgba(0,0,0,0.25);
}
.hero-section .btn-custom:hover {
  transform: translateY(-4px) scale(1.05);
  box-shadow: 0 12px 30px rgba(0,0,0,0.35);
}

/* Hero Section Floating Circles */
.hero-section::before,
.hero-section::after {
  content: "";
  position: absolute;
  width: 450px;
  height: 450px;
  border-radius: 50%;
  background: rgba(255,255,255,0.08);
  animation: float 6s infinite ease-in-out alternate;
  z-index: 0;
}
.hero-section::before {
  top: -120px;
  left: -120px;
}
.hero-section::after {
  bottom: -150px;
  right: -150px;
}

/* Animations */
@keyframes fadeSlideDown {
  from { opacity: 0; transform: translateY(-40px); }
  to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeSlideUp {
  from { opacity: 0; transform: translateY(40px); }
  to { opacity: 1; transform: translateY(0); }
}

</style>
</head>

<body>
  <!-- Navbar -->

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg shadow" style="background: linear-gradient(135deg, #6c63ff, #48c6ef);">
    <div class="container">
      <a class="navbar-brand fw-bold text-white" href="#">Smart LMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link text-white active" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#features">Features</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#team">Team</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#testimonials">Testimonials</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#contact">Contact</a></li>
          @if (Auth::check())
            @if (Auth::user()->Utype === 'ADM')
              <li class="nav-item">
                <a class="btn btn-warning ms-2 mx-2" href="{{ route('admin.index') }}"> AdminDashboard</a>
              </li>
            @else
              <li class="nav-item">
                <a class="btn btn-warning ms-2 mx-2" href="{{ route('emp_index') }}">EmployeeDashboard</a>
              </li>
            @endif
            <!-- Disable the login button if the user is logged in -->
          @else
            <li class="nav-item">
              <a class="btn btn-warning ms-2 mx-2" href="{{ route('login') }}" @if(Auth::check()) disabled
              @endif>Login</a>
            </li>
          @endif
          <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Hero -->
  <section id="home" class="hero-section text-white text-center d-flex align-items-center">
    <div class="container" data-aos="fade-up">
      <h1 class="display-3 fw-bold">Revolutionize Leave Management</h1>
      <p class="lead mt-3">Smart, seamless, and modern LMS for your organization.</p>
      <a href="#features" class="btn btn-light btn-lg btn-custom shadow-lg">🚀 Get Started</a>
    </div>
  </section>


 <!-- Features -->
  <section id="features" class="container py-5 text-center">
    <h2 class="section-title">Why Choose Us?</h2>
    <div class="row g-4">
      <div class="col-md-4" data-aos="zoom-in">
        <div class="card feature-card h-100 p-4">
          <i class="bi bi-speedometer2 text-primary fs-1 mb-3"></i>
          <h5 class="card-title">Fast & Easy</h5>
          <p class="text-muted">Approve, reject, and track leave requests in seconds.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="card feature-card h-100 p-4">
          <i class="bi bi-shield-check text-success fs-1 mb-3"></i>
          <h5 class="card-title">Secure & Reliable</h5>
          <p class="text-muted">All employee data is managed with top-notch security.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
        <div class="card feature-card h-100 p-4">
          <i class="bi bi-lightning-charge text-danger fs-1 mb-3"></i>
          <h5 class="card-title">AI Powered</h5>
          <p class="text-muted">Smart analytics to help HR make informed decisions.</p>
        </div>
      </div>
    </div>
  </section>


  <section id="team" class="py-5 bg-light text-center">
    <div class="container">
      <h2 class="section-title">Meet Our Team</h2>
      <div class="row g-4">

        
        @foreach ($emp as $employe)
          <div class="col-md-4">
            <div class="card team-card p-4">
              <h5 class="mt-3">{{ $employe->emp_name }}</h5>
              <p class="text-muted">{{ $employe->emp_position }}</p>
            </div>
          </div>
        @endforeach
      


      </div>
    </div>
  </section>


<!-- Testimonials -->
  <section id="testimonials" class="py-5 text-center">
    <div class="container">
      <h2 class="section-title">What Our Clients Say</h2>
      <div class="row g-4">
        <div class="col-md-4" data-aos="flip-left">
          <div class="card testimonial-card p-4 shadow-sm">
            <p>"Smart LMS has made leave management 10x easier for our HR team!"</p>
            <h6 class="mt-3 text-primary">- HR Manager</h6>
          </div>
        </div>
        <div class="col-md-4" data-aos="flip-left" data-aos-delay="200">
          <div class="card testimonial-card p-4 shadow-sm">
            <p>"Employees can now check leave status anytime. Very transparent system."</p>
            <h6 class="mt-3 text-success">- Employee</h6>
          </div>
        </div>
        <div class="col-md-4" data-aos="flip-left" data-aos-delay="400">
          <div class="card testimonial-card p-4 shadow-sm">
            <p>"We love the modern design and analytics features. Highly recommend!"</p>
            <h6 class="mt-3 text-danger">- Company CEO</h6>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Leave Benefits Section -->
  <section class="py-5 text-center">
    <div class="container">
      <h2 class="fw-bold mb-4">Leave Benefits</h2>
      <div class="row g-4">
        <div class="col-md-6">
          <div class="p-4 border rounded shadow-sm h-100"> <i class="bi bi-calendar-check text-info fs-1 mb-3"></i>
            <h5>Better Work-Life Balance</h5>
            <p class="text-muted">Employees can easily manage leaves to maintain productivity and well-being.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-4 border rounded shadow-sm h-100"> <i class="bi bi-people text-warning fs-1 mb-3"></i>
            <h5>Improved Collaboration</h5>
            <p class="text-muted">Managers and HR can collaborate better with transparent leave tracking.</p>
          </div>
        </div>
      </div>
    </div>
  </section>




  <!-- Contact -->
  <section id="contact" class="py-5 bg-light text-center">
    <div class="container">
      <h2 class="section-title">Contact Us</h2>
          @if (session('Status'))
        <div class="alert alert-success">{{ session('Status') }}</div>
      @endif
      <form class="row g-3 justify-content-center contact-form" method="post" action="{{ route('contactSumbitform') }}">
        @csrf
         <div class="col-md-5">
          <input type="text" class="form-control" name="name" placeholder="Your Name">

          @error('name')
            <span class="alert alert-danger text-center">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-5">
          <input type="email" class="form-control" name="email" placeholder="Your Email">
        </div>
        @error('email')
          <span class="alert alert-danger text-center">{{ $message }}</span>
        @enderror

        <div class="col-md-10">
          <textarea class="form-control" rows="4" name="message" placeholder="Your Message"></textarea>
        </div>
        @error('message')
          <span class="alert alert-danger text-center">{{ $message }}</span>
        @enderror
        <div class="col-md-10">
          <button type="submit" class="btn btn-primary w-100">Send Message</button>
        </div>
      </form>
    </div>
  </section>
  <!-- Footer -->
  <footer class="text-center py-4 mt-5">
    <p class="mb-1">&copy; 2025 Smart LMS. All Rights Reserved.</p>
    <small>Made with ❤️ using Bootstrap 5</small>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>
</body>

</html>