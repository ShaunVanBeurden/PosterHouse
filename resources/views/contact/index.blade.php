@extends('layouts.master')
@push('styles')
<link href="/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/contact.css">
@endpush

@section('title', 'Alle Blog Posts')

@section('content')

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

            <div class="panel">
                <div class="panel-heading">
                    <h3>Beschikbaar op</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th class="text-center">Dag</th>
                            <th class="text-center">Tijd</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="success">
                            <td>Maandag</td>
                            <td>9:00 tot 18:00</td>
                        </tr>
                        <tr class="success">
                            <td>Dinsdag</td>
                            <td>9:00 tot 18:00</td>
                        </tr>
                        <tr class="success">

                            <td>Woensdag</td>
                            <td>9:00 tot 18:00</td>
                        </tr>
                        <tr class="success">

                            <td>Donderdag</td>
                            <td>9:00 tot 18:00</td>
                        </tr>
                        <tr class="success">

                            <td>Vrijdag</td>
                            <td>9:00 tot 18:00</td>
                        </tr>
                        <tr class="warning">

                            <td>Zaterdag</td>
                            <td>9:00 tot 14:00</td>
                        </tr>
                        <tr class="danger">

                            <td>Zondag</td>
                            <td>Vrij</td>
                        </tr>
                        </tbody>
                    </table>
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
                    <br>
                    <br>
                    <br>
                </div>
                <div class="panel-body">
                        <form method="post" action="{{ route('contact.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="ccfield-prepend">
                                    <span class="ccform-addon"><i class="fa fa-user fa-2x"></i></span>
                                    <input type="text" class="ccformfield" id="name" placeholder="Volledige naam" name="name"
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
                                    <input type="text" class="ccformfield" id="email" placeholder="Email" name="email"
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
                                    <span class="ccform-addon"><i class="glyphicon glyphicon-phone fa-2x"></i></span>
                                    <input type="text" class="ccformfield" id="phone" placeholder="Telefoon nummer" name="phone"
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
                                <input type="text" class="ccformfield" id="subject" placeholder="Onderwerp" name="subject"
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
                                        <textarea name="message" class="ccformfield" placeholder="Bericht" id="message" cols="30"
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
@endsection