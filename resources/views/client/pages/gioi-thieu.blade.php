@extends('client.layouts.app')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
    <meta name="description" content="Lewis - Creative Portfolio HTML Template">
    <meta name="author" content="Paul, Logan Cee">

    @push('styles')
        <link href="{{ asset('assets/client/cssupdate/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/client/cssupdate/css/jquery.pagepiling.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/client/cssupdate/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/client/cssupdate/css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/client/cssupdate/css/animate.min.css') }}" rel="stylesheet">

        <link href="{{ asset('assets/client/cssupdate/css/style.css') }}" rel="stylesheet">


    @endpush


  </head>

  <body class="body-piling">
    <div class="wrapper">
      <header id="header" class="header">
        <div class="container-fluid">
          <div class="brand">
            <a href="#About" class="brand-name">Ethant <span class="brand-name-s">Hunt</span></a>
          </div>

          <button class="nav-toggle-btn a-nav-toggle">
            <span class="hamburger">
              <span class="top-bun"></span>
              <span class="meat"></span>
              <span class="bottom-bun"></span>
            </span>
          </button>

          

          <div class="menu">
            <div class="menu-lang">
              <a href="#" class="menu-lang-item active">Eng.</a>
              <a href="#" class="menu-lang-item">Fra.</a>
              <a href="#" class="menu-lang-item">Ara.</a>
            </div>

            <div class="menu-main" id="accordion">
              <ul id="menuMain">
                <li data-menuanchor="About" class="active"><a href="#About">About</a></li>
                <li data-menuanchor="Services"><a href="#Services">Services</a></li>
                <li data-menuanchor="Skills"><a href="#Skills">Skills</a></li>
                <li data-menuanchor="Resume"><a href="#Resume">Resume</a></li>
                <li data-menuanchor="Portfolio"><a href="#Portfolio">Portfolio</a></li>
                <li data-menuanchor="Awards"><a href="#Awards">Awards</a></li>
                <li data-menuanchor="Testimonials"><a href="#Testimonials">Testimonials</a></li>
                <li data-menuanchor="Clients"><a href="#Clients">Clients</a></li>
                <li data-menuanchor="Contact"><a href="#Contact">Contact</a></li>
              </ul>
            </div>

            <div class="menu-footer">
              <div class="menu-footer-contacts">
                <div class="menu-footer-phone"><a href="tel:+121553554427" class="phone-link">(+1) 215 5355 4427</a></div>
                <div class="menu-footer-mail"><a href="mailto:ethant.hunt@design.com" class="mail-link">ethant.hunt@design.com</a></div>
              </div>
              <div class="menu-footer-copyright">&copy; Ethant 2019. All Rights Reseverd</div>
            </div>
            <div class="menu-ornament"></div>
          </div>
        </div>
      </header>


      <div id="content">
        <div class="a-pagepiling full-page">
          <div class="section pp-scrollable slide slide-about a-slide-typed" data-name="about">
            <div class="slide-container">
              <div class="lines"><div></div><div></div><div></div><div></div></div>
              <div class="parallax" id="a-parallax">
                <div class="layer shape shape2" data-depth="0.4"><div class="inside animate-element delay4 bounceIn"></div></div>
                <div class="layer shape shape3" data-depth="0.5"><div class="inside animate-element delay5 bounceIn"></div></div>
                <div class="layer shape shape4" data-depth="0.7"><div class="inside animate-element delay4 bounceIn"></div></div>
                <div class="layer shape shape5" data-depth="0.9"><div class="inside animate-element delay5 bounceIn"></div></div>
                <div class="layer shape shape6" data-depth="0.2"><div class="inside animate-element delay6 bounceIn"></div></div>
                <div class="layer shape shape7" data-depth="0.3"><div class="inside animate-element delay3 bounceIn"></div></div>
                <div class="layer shape shape8" data-depth="0.5"><div class="inside animate-element delay8 bounceIn"></div></div>
                <div class="layer shape shape9" data-depth="0.5"><div class="inside animate-element delay9 bounceIn"></div></div>
                <div class="layer shape shape10" data-depth="0.2"><div class="inside animate-element delay7 bounceIn"></div></div>
                <div class="layer shape shape11" data-depth="0.3"><div class="inside animate-element delay8 bounceIn"></div></div>
                <div class="layer shape shape12" data-depth="0.2"><div class="inside animate-element delay9 bounceIn"></div></div>
                <div class="layer shape shape13" data-depth="0.2"><div class="inside animate-element delay10 bounceIn"></div></div>
                <div class="layer shape shape14" data-depth="0.2"><div class="inside animate-element delay11 bounceIn"></div></div>
                <div class="layer shape shape15" data-depth="0.2"><div class="inside animate-element delay12 bounceIn"></div></div>
                <div class="layer shape shape16" data-depth="0.1"><div class="inside animate-element delay13 bounceIn"></div></div>
                <div class="layer shape shape1" data-depth="0.6"><div class="inside animate-element delay4 bounceIn"></div></div>
              </div>
              <div class="container">
                <div class="row justify-content-center text-center">
                  <div class="col-lg-8">
                    <div class="animate-element delay5 fadeInUp">
                      <div class="title-mini text-primary">About me</div>
                      <h1 class="slide-title font-custom">Hello, I’m <span class="text-typed a-typed a-typed-about" data-text="Ethant Hunt"></span><br /> I’m working as UX/UI Designers.</h1>
                    </div>
                    <div class="slide-descr animate-element delay7 fadeInUp">I will help you <strong>build your brand</strong> and <strong>grow your business</strong>. I create clarifying strategy, beautiful logo and identity design, engaging websites and ongoing marketing support.</div>
                    <div class="slide-photo slide-photo-about">
                      <div class="rounded-text">
                        <svg viewBox="0 0 200 200">
                          <path id="textPath" d="M 85,0 A 85,85 0 0 1 -85,0 A 85,85 0 0 1 85,0" transform="translate(100,100)" fill="none" stroke-width="0"></path>
                          <g font-size="18.5px">
                            <text text-anchor="start">
                              <textPath xlink:href="#textPath" startOffset="0%">UX/UI Design - Product Design - Digital Painting - Artist -</textPath>
                            </text>
                          </g>
                        </svg>
                      </div>
                      <div class="inside"><img src="{{ asset('assets/client/cssupdate/img/slide1.png')}}" alt="" /></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section pp-scrollable slide slide-services slide-dark slide-services a-slide-typed" data-name="services">
            <div class="slide-container">
              <div class="lines"><div></div><div></div><div></div><div></div></div>
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-5">
                    <div class="animate-element delay5 fadeInUp">
                      <div class="title-mini text-primary">my services</div>
                      <h2 class="slide-title font-custom"><span class="text-typed a-typed a-typed-services" data-text="Build your brand"></span> and<br /> grow your business.</h2>
                    </div>
                    <div class="slide-descr animate-element delay7 fadeInUp">Whether you are working on a new startup or have an existing product, I'd love the opportunity to help you and your team <strong>solve your most challenging</strong> problems.</div>

                    <nav class="service-list animate-element delay9 fadeInUp">
                      <ul class="">
                        <li class="primary-link"><a href="#">UX & UI Design</a></li>
                        <li class="primary-link"><a href="#">Branding Design</a></li>
                        <li class="primary-link"><a href="#">Mobile App Design</a></li>
                        <li class="primary-link"><a href="#">Art & Illustration</a></li>
                        <li class="primary-link"><a href="#">3D Modeling & Motion</a></li>
                      </ul>
                    </nav>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <div class="slide-photo slide-photo-services">
                      <div class="inside"><img src="{{ asset('assets/client/cssupdate/img/slide2.png')}}" alt="" /></div>
                      <div class="image-card card2-1 animate-element delay8 fadeInRight">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card2-1.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card2-2 animate-element delay9 fadeInUp">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card2-2.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card2-3 animate-element delay10 fadeInUp">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card2-3.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card image-card-dark card2-4 animate-element delay11 fadeInRight">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card2-4.png')}}" alt="" /></div></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section pp-scrollable slide slide-skills a-slide-typed" data-name="skills">
            <div class="slide-container">
              <div class="lines"><div></div><div></div><div></div><div></div></div>
              <div class="container">
                <div class="row align-items-center flex-row-reverse">
                  <div class="col-md-5">
                    <div class="animate-element delay5 fadeInUp">
                      <div class="title-mini text-primary">my featured skills</div>
                      <h2 class="slide-title font-custom">I’m using <span class="text-typed a-typed a-typed-skills" data-text="top leading"></span><br /> design methods.</h2>
                    </div>
                    <div class="slide-descr animate-element delay7 fadeInUp">I specialize in helping early stage startups validate their riskiest assumptions using <strong>leading design methods</strong>.</div>

                    <div class="bar-list a-progressbar animate-element delay9 fadeInUp">
                      <div class="bar-item">
                        <div class="row">
                          <div class="col bar-item-title">Mobile Design</div>
                          <div class="col-auto text-right bar-item-value">80%</div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="bar-item">
                        <div class="row">
                          <div class="col bar-item-title">3D Modeling</div>
                          <div class="col-auto text-right bar-item-value">100%</div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="bar-item">
                        <div class="row">
                          <div class="col bar-item-title">Illustration</div>
                          <div class="col-auto text-right bar-item-value">80%</div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="bar-item">
                        <div class="row">
                          <div class="col bar-item-title">Typography</div>
                          <div class="col-auto text-right bar-item-value">90%</div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <div class="slide-photo">
                      <div class="image-card card3-1 animate-element delay8 zoomIn">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/slide3.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card3-2 image-card-dark animate-element delay12 fadeInUp">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card3-2.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card3-3 animate-element delay9 fadeInUp">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card3-3.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card3-4 animate-element delay13 fadeInLeft">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card3-4.png')}}" alt="" /></div></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section pp-scrollable slide slide-resume slide-dark">
            <div class="slide-container">
              <div class="lines"><div></div><div></div><div></div><div></div></div>
              <div class="container">
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-4">
                    <div class="slide-photo slide-photo-education">
                      <div class="slide-photo-bg-rounded photo-bg-education animate-element delay5 bounceIn">
                        <div class="inside"><div class="education-image"><img src="{{ asset('assets/client/cssupdate/img/slide4-1.png')}}" alt="" /></div></div>
                      </div>
                    </div>
                    <div class="animate-element delay9 fadeInUp">
                      <h2 class="slide-title font-custom slide-title-margin-md">Education</h2>
                      <div class="vacancy-item">
                        <div class="vacancy-item-title"><a href="#">Graphic Design</a></div>
                        <div class="vacancy-item-place">University of Studies, Caloforlia</div>
                        <div class="vacancy-item-time text-primary">Jan 2002 - Dec 2007</div>
                        <div class="vacancy-item-text">Major in Graphic Design, UX/UI Design, Product Desgin and Illustration</div>
                      </div>
                      <div class="vacancy-item">
                        <div class="vacancy-item-title"><a href="#">Graphic Design</a></div>
                        <div class="vacancy-item-place">Eco Design Agency, Caloforlia</div>
                        <div class="vacancy-item-time text-primary">Jan 2004 - Dec 2006</div>
                        <div class="vacancy-item-text">Major in Graphic Design, UX/UI Design, Product Desgin, Illustration, 3D Modeling and Marketing</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-4">
                    <div class="slide-photo slide-photo-experience">
                      <div class="slide-photo-bg-rounded photo-bg-experience animate-element delay7 bounceIn">
                        <div class="inside"><div class="experience-image"><img src="{{ asset('assets/client/cssupdate/img/slide4-2.png')}}" alt="" /></div></div>
                      </div>
                    </div>
                    <div class="animate-element delay11 fadeInUp">
                      <h2 class="slide-title font-custom slide-title-margin-md">Experience</h2>
                      <div class="vacancy-item">
                        <div class="vacancy-item-title"><a href="#">Senior Graphic Designer</a></div>
                        <div class="vacancy-item-place">Market Studios, Ltd., Norwalk, California</div>
                        <div class="vacancy-item-time text-primary">Jan 2018 - Present</div>
                        <div class="vacancy-item-text">Created design theme & graphics for marketing and sales presentations, training videos and websites.</div>
                      </div>
                      <div class="vacancy-item">
                        <div class="vacancy-item-title"><a href="#">UX/UI Designer</a></div>
                        <div class="vacancy-item-place">Dimensions, Huntington Beach, California</div>
                        <div class="vacancy-item-time text-primary">June 2004 - Dec 2017</div>
                        <div class="vacancy-item-text">Created new design themes for marketing and collateral materials.</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section pp-scrollable slide slide-portfolio a-slide-typed" data-name="portfolio">
            <div class="slide-container">
              <div class="lines"><div></div><div></div><div></div><div></div></div>
              <div class="slide-ornament"><div class="inside"></div></div>
              <div class="container">
                <div class="row justify-content-center text-center">
                  <div class="col-lg-8 animate-element delay5 fadeInUp">
                    <div class="title-mini text-primary">My portfolio</div>
                    <h1 class="slide-title font-custom slide-title-margin-lg">Some of my <span class="text-typed a-typed a-typed-portfolio" data-text="latest works."></span></h1>
                  </div>
                </div>
                <div class="portfolio-carousel a-portfolio-carousel owl-carousel owl-theme animate-element delay7 fadeInUp">
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen1.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">Polychromatic Logo</a></div>
                      <div class="portfolio-item-descr">Branding Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen2.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">TextBook Redesign Acquisition</a></div>
                      <div class="portfolio-item-descr">UX/UI Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen3.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">Clemo – Fashion Template</a></div>
                      <div class="portfolio-item-descr">UX/UI Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen1.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">Polychromatic Logo</a></div>
                      <div class="portfolio-item-descr">Branding Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen2.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">TextBook Redesign Acquisition</a></div>
                      <div class="portfolio-item-descr">UX/UI Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen3.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">Clemo – Fashion Template</a></div>
                      <div class="portfolio-item-descr">UX/UI Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen1.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">Polychromatic Logo</a></div>
                      <div class="portfolio-item-descr">Branding Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen2.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">TextBook Redesign Acquisition</a></div>
                      <div class="portfolio-item-descr">UX/UI Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen3.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">Clemo – Fashion Template</a></div>
                      <div class="portfolio-item-descr">UX/UI Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen1.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">Polychromatic Logo</a></div>
                      <div class="portfolio-item-descr">Branding Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen2.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">TextBook Redesign Acquisition</a></div>
                      <div class="portfolio-item-descr">UX/UI Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen3.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">Clemo – Fashion Template</a></div>
                      <div class="portfolio-item-descr">UX/UI Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen1.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">Polychromatic Logo</a></div>
                      <div class="portfolio-item-descr">Branding Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen2.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">TextBook Redesign Acquisition</a></div>
                      <div class="portfolio-item-descr">UX/UI Design</div>
                    </div>
                  </div>
                  <div class="portfolio-item">
                    <div class="portfolio-item-photo"><a href="#"><img src="{{ asset('assets/client/cssupdate/img/portfolio-screen3.jpg')}}" alt="" /></a></div>
                    <div class="portfolio-item-detail">
                      <div class="portfolio-item-title primary-link"><a href="#">Clemo – Fashion Template</a></div>
                      <div class="portfolio-item-descr">UX/UI Design</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section pp-scrollable slide slide-awards slide-dark a-slide-typed" data-name="awards">
            <div class="slide-container">
              <div class="lines"><div></div><div></div><div></div><div></div></div>
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-5">
                    <div class="animate-element delay5 fadeInUp">
                      <div class="title-mini title-mini-margin-lg text-primary">my awards/honors</div>
                      <h3 class="slide-title font-custom">Professional awards and<br /> honors <span class="text-typed a-typed a-typed-awards" data-text="I’ve reached"></span>.</h3>
                    </div>
                    <div class="slide-descr animate-element delay7 fadeInUp">Deciding where to place an Awards and Honors section will depend on <strong>the resume format</strong>. However, no matter how impressive this section is, it should of your resume.</div>

                    <div class="reward-list animate-element delay9 fadeInUp">
                      <div class="reward-item">
                        <div class="reward-item-photo"><img src="{{ asset('assets/client/cssupdate/img/reward1.png')}}" alt="" width="69" /></div>
                        <div class="reward-item-detail">
                          <div class="reward-item-title">wandra design awards</div>
                          <div class="reward-item-descr">For Best UX/UI Design App</div>
                        </div>
                      </div>
                      <div class="reward-item">
                        <div class="reward-item-photo"><img src="{{ asset('assets/client/cssupdate/img/reward2.png')}}" alt="" width="128" /></div>
                        <div class="reward-item-detail">
                          <div class="reward-item-title">Inovative ideas design Awards</div>
                          <div class="reward-item-descr">For Most Loved Illustration </div>
                        </div>
                      </div>
                      <div class="reward-item">
                        <div class="reward-item-photo"><img src="{{ asset('assets/client/cssupdate/img/reward3.png')}}" alt="" width="103" /></div>
                        <div class="reward-item-detail">
                          <div class="reward-item-title">creative Design awards</div>
                          <div class="reward-item-descr">For Best UX/UI Project Design</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <div class="slide-photo slide-photo6">
                      <div class="inside"><img src="{{ asset('assets/client/cssupdate/img/slide6.png')}}" alt="" /></div>
                      <div class="image-card image-card-primary card6-1 animate-element delay8 fadeInLeft">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card6-1.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card6-2 animate-element delay11 fadeInLeft">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card6-2.png')}}" alt="" /></div></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section pp-scrollable slide slide-testimonials">
            <div class="slide-container">
              <div class="lines"><div></div><div></div><div></div><div></div></div>
              <div class="container">
                <div class="row align-items-center flex-row-reverse">
                  <div class="col-md-5">
                    <div class="animate-element delay5 fadeInUp">
                      <div class="title-mini title-mini-margin-lg text-primary">testimonials</div>
                      <h3 class="slide-title font-custom">It really saves me time  and effort Ethant is...</h3>
                    </div>

                    <div class="testimonial-carousel a-testimonial-carousel owl-carousel owl-theme animate-element delay7 fadeInUp">
                      <div class="testimonial-item">
                        <div class="slide-descr testimonial-item-text">nice one. It's really wonderful. It's just amazing. Ethant is worth much more than I paid. This is really simply into unbelievable! I just can't get enough of him. I want to get a T-Shirt with Ethant on it so I can show it off to everyone. It's all good."</div>
                        <div class="testimonial-item-author">
                          <div class="media">
                            <div class="align-self-center mr-3"><div class="avatar testimonial-avatar"><div class="inside" style="background-image: url({{ asset('assets/client/cssupdate/img/pic1.jpg')}});"></div></div></div>
                            <div class="align-self-center media-body">
                              <div class="testimonial-item-author-name">Mallory Julian</div>
                              <div class="testimonial-item-author-status">CEO and Co Founder at Husena</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="testimonial-item">
                        <div class="slide-descr testimonial-item-text">nice one. It's really wonderful. It's just amazing. Ethant is worth much more than I paid. This is really simply into unbelievable! I just can't get enough of him. I want to get a T-Shirt with Ethant on it so I can show it off to everyone. It's all good."</div>
                        <div class="testimonial-item-author">
                          <div class="media">
                            <div class="align-self-center mr-3"><div class="avatar testimonial-avatar"><div class="inside" style="background-image: url({{ asset('assets/client/cssupdate/img/pic1.jpg')}});"></div></div></div>
                            <div class="align-self-center media-body">
                              <div class="testimonial-item-author-name">Mallory Julian</div>
                              <div class="testimonial-item-author-status">CEO and Co Founder at Husena</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="testimonial-item">
                        <div class="slide-descr testimonial-item-text">nice one. It's really wonderful. It's just amazing. Ethant is worth much more than I paid. This is really simply into unbelievable! I just can't get enough of him. I want to get a T-Shirt with Ethant on it so I can show it off to everyone. It's all good."</div>
                        <div class="testimonial-item-author">
                          <div class="media">
                            <div class="align-self-center mr-3"><div class="avatar testimonial-avatar"><div class="inside" style="background-image: url({{ asset('assets/client/cssupdate/img/pic1.jpg')}});"></div></div></div>
                            <div class="align-self-center media-body">
                              <div class="testimonial-item-author-name">Mallory Julian</div>
                              <div class="testimonial-item-author-status">CEO and Co Founder at Husena</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="testimonial-item">
                        <div class="slide-descr testimonial-item-text">nice one. It's really wonderful. It's just amazing. Ethant is worth much more than I paid. This is really simply into unbelievable! I just can't get enough of him. I want to get a T-Shirt with Ethant on it so I can show it off to everyone. It's all good."</div>
                        <div class="testimonial-item-author">
                          <div class="media">
                            <div class="align-self-center mr-3"><div class="avatar testimonial-avatar"><div class="inside" style="background-image: url({{ asset('assets/client/cssupdate/img/pic1.jpg')}});"></div></div></div>
                            <div class="align-self-center media-body">
                              <div class="testimonial-item-author-name">Mallory Julian</div>
                              <div class="testimonial-item-author-status">CEO and Co Founder at Husena</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="testimonial-item">
                        <div class="slide-descr testimonial-item-text">nice one. It's really wonderful. It's just amazing. Ethant is worth much more than I paid. This is really simply into unbelievable! I just can't get enough of him. I want to get a T-Shirt with Ethant on it so I can show it off to everyone. It's all good."</div>
                        <div class="testimonial-item-author">
                          <div class="media">
                            <div class="align-self-center mr-3"><div class="avatar testimonial-avatar"><div class="inside" style="background-image: url({{ asset('assets/client/cssupdate/img/pic1.jpg')}});"></div></div></div>
                            <div class="align-self-center media-body">
                              <div class="testimonial-item-author-name">Mallory Julian</div>
                              <div class="testimonial-item-author-status">CEO and Co Founder at Husena</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <div class="slide-photo slide-photo-testimonials">
                      <div class="inside"><img src="{{ asset('assets/client/cssupdate/img/slide7.png')}}" alt="" /></div>
                      <div class="image-card image-card-primary card7-1 animate-element delay11 fadeInLeft">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card7-1.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card7-2 animate-element delay8 fadeInLeft">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card7-2.png')}}" alt="" /></div></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section pp-scrollable slide slide-clients slide-dark">
            <div class="slide-container">
              <div class="lines"><div></div><div></div><div></div><div></div></div>
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-5">
                    <div class="animate-element delay5 fadeInUp">
                      <div class="title-mini title-mini-margin-lg text-primary">my clients &amp; partners</div>
                      <h3 class="slide-title font-custom">Clients and collaborators.</h3>
                    </div>
                    <div class="slide-descr animate-element delay7 fadeInUp">Over the past ten years, I've been fortunate to work with and for people from some <strong>amazing organizations</strong>.</div>

                    <div class="client-list animate-element delay9 fadeInUp">
                      <div class="client-item">
                        <div class="client-item-value">1,142</div>
                        <div class="client-item-detail">
                          <div class="client-item-title">total clients </div>
                          <div class="client-item-descr">In over 25 countries</div>
                        </div>
                      </div>
                      <div class="client-item">
                        <div class="client-item-value">87</div>
                        <div class="client-item-detail">
                          <div class="client-item-title">trusted sponsors</div>
                          <div class="client-item-descr">Featured by top ranked brand</div>
                        </div>
                      </div>
                      <div class="client-item">
                        <div class="client-item-value">95%</div>
                        <div class="client-item-detail">
                          <div class="client-item-title">sensitve feedback</div>
                          <div class="client-item-descr">At project quality</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <div class="slide-photo slide-photo-clients">
                      <div class="image-card card8-1 animate-element delay11 fadeInUp">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card8-1.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card8-2 animate-element delay10 fadeInRight">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card8-2.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card8-3 animate-element delay8 fadeInLeft">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card8-3.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card8-4 animate-element delay9 fadeInUp">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card8-4.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card8-5 animate-element delay13 fadeInUp">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card8-5.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card8-6 animate-element delay12 fadeInLeft">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card8-6.png')}}" alt="" /></div></div>
                      </div>
                      <div class="image-card card8-7 animate-element delay14 fadeInRight">
                        <div class="image-card-body"><div class="inside"><img src="{{ asset('assets/client/cssupdate/img/card8-7.png')}}" alt="" /></div></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section pp-scrollable slide slide-contacts a-slide-typed" data-name="contacts">
            <div class="slide-container">
              <div class="lines"><div></div><div></div><div></div><div></div></div>
              <div class="contact-ornament"></div>
              <div class="container">
                <div class="row justify-content-center text-center">
                  <div class="col-lg-8">
                    <div class="animate-element delay5 fadeInUp">
                      <div class="title-mini text-primary">contact me</div>
                      <h1 class="slide-title font-custom">Are you ready to <span class="text-typed a-typed a-typed-contacts" data-text="work together?"></span></h1>
                    </div>
                    <div class="slide-descr animate-element delay7 fadeInUp">I’m always interested in hearing about new projects and opportunities.<br /> You can <strong>tell me about the problems</strong> you are trying to solve. I'd love to listen and see if there's anything I can do to help you.</div>
                    <div class="slide-btn animate-element delay9 fadeInUp"><a href="#" class="btn btn-dark" data-toggle="modal" data-target="#request">submit a request</a></div>
                  </div>
                </div>
                <div class="row align-items-center text-center contacts animate-element delay11 fadeInUp">
                  <div class="col-md-4">
                    <div class="contact-item contact-item-phone"><a href="tel:+121553554427" class="phone-link">(+1) 215 5355 4427</a></div>
                  </div>
                  <div class="col-md-4">
                    <div class="contact-item"><a href="mailto:ethant.hunt@design.com" class="mail-link">ethant.hunt@design.com</a></div>
                  </div>
                  <div class="col-md-4">
                    <div class="contact-item">5 Blue Spring St. Jupiter, FL 33458</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <footer id="footer" class="footer">
        <div class="container-fluid">
          <div class="copyright">© Ethant 2019.</div>
          <div class="footer-social">
            <ul class="social">
              <li><a href="#"><i class="icon-behance"></i></a></li>
              <li><a href="#"><i class="icon-dribbble"></i></a></li>
              <li><a href="#"><i class="icon-linkedin"></i></a></li>
            </ul>
            <div class="chat">
              <div class="chat-title">Let’s chat</div>
              <a href="#" class="chat-btn has-new"><i class="icon-chat"></i></a>
            </div>
          </div>
        </div>
      </footer>


      <div class="progress-nav">
        <ul id="menu">
          <li data-menuanchor="About" class="active"></li>
          <li data-menuanchor="Services"></li>
          <li data-menuanchor="Skills"></li>
          <li data-menuanchor="Resume"></li>
          <li data-menuanchor="Portfolio"></li>
          <li data-menuanchor="Awards"></li>
          <li data-menuanchor="Testimonials"></li>
          <li data-menuanchor="Clients"></li>
          <li data-menuanchor="Contact"></li>
        </ul>
      </div>


    </div>


    <div class="modal fade" id="request" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <form class="a-form" novalidate="novalidate">
              <div class="row">
                <div class="form-group col-sm-6">
                  <input type="text" class="form-control" name="name" required="" placeholder="Name*" aria-required="true">
                </div>
                <div class="form-group col-sm-6">
                  <input type="email" class="form-control" required="" name="email" placeholder="Email*">
                </div>
                <div class="form-group col-sm-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject (Optinal)">
                </div>
                <div class="form-group col-sm-12">
                  <textarea name="message" class="form-control" required="" placeholder="Message*"></textarea>
                </div>
                <div class="form-group form-group-message col-sm-12">
                  <span id="success" class="text-primary">Thank You, your message is successfully sent!</span>
                  <span id="error" class="text-primary">Sorry, something went wrong </span>
                </div>
                <div class="col-sm-12 text-center"><button type="submit" class="btn btn-dark">Contact me</button></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

 @push('scripts')


 <script src="{{ asset('assets/client/cssupdate/js/smoothscroll.js') }}"></script>
 <script src="{{ asset('assets/client/cssupdate/js/popper.min.js') }}"></script>
 <script src="{{ asset('assets/client/cssupdate/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('assets/client/cssupdate/js/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('assets/client/cssupdate/js/jquery.pagepiling.min.js') }}"></script>
 <script src="{{ asset('assets/client/cssupdate/js/jquery.viewport.js') }}"></script>
 <script src="{{ asset('assets/client/cssupdate/js/jquery.countdown.min.js') }}"></script>
 <script src="{{ asset('assets/client/cssupdate/js/typed.min.js') }}"></script>
 <script src="{{ asset('assets/client/cssupdate/js/parallax.min.js') }}"></script>
 <script src="{{ asset('assets/client/cssupdate/js/jquery.validate.min.js') }}"></script>
 <script src="{{ asset('assets/client/cssupdate/js/script.js') }}"></script>
    @endpush


  </body>

</html>


@endsection
