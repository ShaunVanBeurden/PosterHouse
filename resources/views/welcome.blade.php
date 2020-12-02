@extends('layouts.master')

@section('content')
    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Doelstelling</h2>
                    <h3 class="section-subheading text-muted">Wat willen wij bereiken met het Nationaal Jeugd
                        Ontbijt?</h3>
                </div>
            </div>
            <div class="row text-center is-table-row">
                <div class="col-md-4 page_section_parent">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    @if($page_sections->where('section', 'top-left')->first())
                        @include('layouts.components.editableContent', ['page_section' => $page_sections->where('section', 'top-left')->first()])
                    @endif
                </div>
                <div class="col-md-4 page_section_parent">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    @if($page_sections->where('section', 'top-middle')->first())
                        @include('layouts.components.editableContent', ['page_section' => $page_sections->where('section', 'top-middle')->first()])
                    @endif
                </div>
                <div class="col-md-4 page_section_parent">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    @if($page_sections->where('section', 'top-right')->first())
                        @include('layouts.components.editableContent', ['page_section' => $page_sections->where('section', 'top-right')->first()])
                    @endif

                </div>

            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Recente Blogsposts</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="/images/portfolio/roundicons.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Round Icons</h4>
                        <p class="text-muted">Graphic Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="/images/portfolio/startup-framework.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Startup Framework</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="/images/portfolio/treehouse.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Treehouse</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="map">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Waar zijn wij actief?</h2>
                </div>
                <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBgqhcyzPwupw9MxCBIlQc6WnTR6C6Blis&callback=initializeMap"></script>
                <div id="map-canvas"></div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Over ons</h2>
                    <h3 class="section-subheading text-muted">Hoe het allemaal begon</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="/images/frontpageimages/breakfast.jpg"
                                     alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>9 mei 2016</h4>
                                    <h4 class="subheading">Pilot</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Tussen 9 mei en 22 juli 2016 (de laatste rapport-periode van
                                        dat schooljaar) werd er in 's-Hertogenbosch een pilot uitgevoerd om de impact
                                        van een voedzaam ontbijt bij 35 deelnemende scholieren in de doelgroep te kunnen
                                        meten. Gedurende deze deze pilot van tien weken werden er bij de scholieren
                                        thuis -gratis- ontbijtboxen afgeleverd met zeven gevarieerde ontbijten. </p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="/images/frontpageimages/ekoplazalogo.jpg"
                                     alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>September 2016</h4>
                                    <h4 class="subheading">Samenwerking Eko-plaza</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Na een positieve evaluatie van de pilot, waarbij er bij > 65%
                                        van de scholieren positieve ontwikkelingen zijn vastgesteld, starten wij een
                                        Nationale Roll Out op. Daarbij willen wij een samenwerking aangaan met landelijk
                                        opererende supermarktorganisaties in september 2016 te beginnen met EKO-Plaza /
                                        Udea </p>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>De
                                    <br>toekomst
                                    <br>tegemoet!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">De gezichten achter NJO</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="/images/people/jacques.jpg" class="img-responsive img-circle" alt="">
                        <h4>Jacques Hendrikx</h4>
                        <p class="text-muted">Innovatief ondernemer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="https://twitter.com/jacqueshendrikx"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="https://www.facebook.com/Nationaal-Jeugd-Ontbijt-241237166256654/"><i
                                            class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="https://www.linkedin.com/in/jacqueshendrikx/"><i
                                            class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="/images/people/meral.jpg" class="img-responsive img-circle" alt="">
                        <h4>Meral Ghossein-Koca</h4>
                        <p class="text-muted">Studente Geneeskunde UVA</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="https://www.facebook.com/Nationaal-Jeugd-Ontbijt-241237166256654/"><i
                                            class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="https://www.linkedin.com/in/meral-koca-a87632b2/"><i
                                            class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="/images/people/mach.jpg" class="img-responsive img-circle" alt="">
                        <h4>Mach Ghossein</h4>
                        <p class="text-muted">Werktuigbouwkundig Ingenieur </p>
                        <ul class="list-inline social-buttons">
                            <li><a href="https://www.facebook.com/Nationaal-Jeugd-Ontbijt-241237166256654/"><i
                                            class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="https://www.linkedin.com/in/mach-ghossein-698654a4/"><i
                                            class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
                @foreach($sponsors as $sponsor)
                    <div class="col-md-3 col-sm-6">
                        <a href="{{ $sponsor->url }}" title="{{ $sponsor->name }}">
                            <img src="{{ $sponsor->getImagePathAttribute() }}" class="img-responsive img-centered"
                                 alt="{{ $sponsor->name }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </aside>

    <!-- Contact Section -->
    <section id="contact" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Neem contact met ons op!</h2>
                </div>
            </div>

            <br><br><br>

            <div class="row ccform">
                <div class="col-sm-6 col-lg-4">
                    <div class="panel">
                        <div class="panel-body">
                            <address>
                                <h5><strong>Stichting Nationaal Jeugd Ontbijt</strong></h5>
                                <h6>Esdoornstraat 105<br>
                                    5213 CB ’s-Hertogenbosch</h6><br>
                                <h5>Bestuurslid & Co-Founder Mach Ghossein</h5>
                                <h6>m.ghossein@nationaaljeugdontbijt.nl<br>
                                    +31 642 241 768</h6><br>
                                <h5>Bestuurslid & Co-Founder Meral Ghossein-Koca</h5>
                                <h6>m.ghossein-koca@nationaaljeugdontbijt.nl<br>
                                    +31 634 876 446</h6><br>
                                <h5>Bestuurslid & Co-Founder Jacques Hendrikx</h5>
                                <h6>j.hendrikx@nationaaljeugdontbijt.nl<br>
                                    +31 653 187 133</h6>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="text-center">
                                <i class="icon-envelope main-color"></i>
                                Nog vragen? Stuur ze gerust
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="{{ route('contact.store') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="ccfield-prepend">
                                        <span class="ccform-addon"><i class="fa fa-user fa-2x"></i></span>
                                        <input type="text" class="ccformfield" id="name" placeholder="Volledige naam"
                                               name="name"
                                               value="{{ old('name') }}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="ccfield-prepend">
                                        <span class="ccform-addon"><i class="fa fa-envelope fa-2x"></i></span>
                                        <input type="text" class="ccformfield" id="email" placeholder="Email"
                                               name="email"
                                               value="{{ old('email') }}" required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <div class="ccfield-prepend">
                                        <span class="ccform-addon"><i
                                                    class="glyphicon glyphicon-phone fa-2x"></i></span>
                                        <input type="text" class="ccformfield" id="phone" placeholder="Telefoon nummer"
                                               name="phone"
                                               value="{{ old('phone') }}" required>
                                    </div>
                                    @if ($errors->has('phone'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                    <div class="ccfield-prepend">
                                        <span class="ccform-addon"><i class="fa fa-info fa-2x"></i></span>
                                        <input type="text" class="ccformfield" id="subject" placeholder="Onderwerp"
                                               name="subject"
                                               value="{{ old('subject') }}" required>
                                    </div>
                                    @if ($errors->has('subject'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('subject') }}</strong>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                    <div class="ccfield-prepend">
                                        <span class="ccform-addon"><i class="fa fa-comment fa-2x"></i></span>
                                        <textarea name="message" class="ccformfield" placeholder="Bericht" id="message"
                                                  cols="30"
                                                  rows="10" required>{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="ccfield-prepend">
                                    <input class="ccbtn" type="submit" value="Verzenden">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection