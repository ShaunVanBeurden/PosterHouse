@extends('layouts.dashboard')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@section('page_heading', 'Nieuws brieven')

@section('section')

<h1>{{$newsletter->title}}</h1>
<h2>{{$newsletter->body}}</h2>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Paragraaf toevoegen</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <h1>Paragraaf Toevoegen</h1>
            <form action="{{ route('mailParagraph.store', $newsletter) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                    <label for="subject">Onderwerp</label>
                    <input type="text" class="form-control" id="subject" name="subject"
                           value="{{ old('subject') }}">

                    @if ($errors->has('title'))
                        <p class="help-block">
                            <strong>{{ $errors->first('subject') }}</strong>
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <table class="head-wrap">
        <tr>
            <td></td>
            <td class="header container" >

                <!-- /content -->
                <div class="content">
                    <table>
                        <tr>
                            <td align="right"><h6 class="collapse">Newsletter</h6></td>
                        </tr>
                    </table>
                </div><!-- /content -->

            </td>
            <td></td>
        </tr>
    </table><!-- /HEADER -->

    <!-- BODY -->
    <table class="body-wrap">
        <tr>
            <td></td>
            <td class="container">

                <!-- content -->
                    <table>
                        <tr>
                            <td>

                                <h1 class="text-center">{{$newsletter->title}}</h1>
                                <img width="100%" src="/images/beterontbijttafel.jpg"/><!-- /hero -->
                                <p class="text-center">{{$newsletter->body}}</p>
                            </td>
                        </tr>
                    </table>
                <div class="content">
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content form-padding">
                                <h1>Paragraaf Toevoegen</h1>
                                <form action="{{ route('mailParagraph.store', $newsletter) }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                        <label for="subject">Onderwerp</label>
                                        <input type="text" class="form-control" id="subject" name="subject"
                                               value="{{ old('subject') }}" required>

                                        @if ($errors->has('title'))
                                            <p class="help-block">
                                                <strong>{{ $errors->first('subject') }}</strong>
                                            </p>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                        <label for="body">Inhoud</label>
                                        <textarea name="body" class="form-control" id="body" cols="30"
                                                  rows="10" required>{{ old('body') }}</textarea>

                                        @if ($errors->has('body'))
                                            <p class="help-block">
                                                <strong>{{ $errors->first('body') }}</strong>
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                        <label for="link">Link (dit is optioneel)</label>
                                        <input type="text" class="form-control" id="link" name="link"
                                               value="{{ old('link') }}">

                                        @if ($errors->has('title'))
                                            <p class="help-block">
                                                <strong>{{ $errors->first('link') }}</strong>
                                            </p>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Toevoegen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if($paragraphs)
                        @foreach($paragraphs as $paragraph)
                            <div class="w3-container">

                                <div class="w3-card-4" >
                                    <header class="w3-container w3-light-grey text-center">
                                        <h3>{{$paragraph->subject}}</h3>
                                    </header>
                                    <div class="w3-container">
                                        <img class="paraimg" src="http://placehold.it/75x75" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"/>
                                        <p class="half">{{$paragraph->body}}</p>
                                        @if($paragraph->link)
                                            <a class="btn align-right" href="{{$paragraph->link}}">Ga naar&raquo;</a>
                                        @endif
                                    </div>
                                    <form method="POST" action="{{ route('mailParagraph.destroy', $paragraph) }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button class="w3-button w3-block w3-red">Verwijderen</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <br>
                    <br>
                    <div class="container">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Paragraaf toevoegen</button>
                    </div>
                    <!-- content -->

                    <br>
                    <!-- content -->
                    <div class="content">
                        <table bgcolor="">
                            <tr>
                                <td>

                                    <!-- social & contact -->
                                    <table class="social">
                                        <tr>
                                            <td>

                                                <!--- column 1 -->
                                                <div class="column">
                                                    <table bgcolor="" cellpadding="" align="left">
                                                        <tr>
                                                            <td>

                                                                <h5 class="">Connect with Us:</h5>
                                                                <p class=""><a href="Facebook.com" class="soc-btn fb">Facebook</a> <a href="Twitter.com" class="soc-btn tw">Twitter</a> <a href="Google.com" class="soc-btn gp">Google+</a></p>


                                                            </td>
                                                        </tr>
                                                    </table><!-- /column 1 -->
                                                </div>

                                                <!--- column 2 -->
                                                <div class="column text-left">
                                                    <table>
                                                        <tr>
                                                            <td>

                                                                <h5 class="">Contact Informatie:</h5>
                                                                <p>Phone: <strong>408.341.0600</strong><br/>
                                                                    Email: <strong><a href="JacquesHendriks@hotmail.com">Jacques@hotmail.com</a></strong></p>

                                                            </td>
                                                        </tr>
                                                    </table><!-- /column 2 -->
                                                </div>

                                                <div class="clear"></div>

                                            </td>
                                        </tr>
                                    </table><!-- /social & contact -->

                                </td>
                            </tr>
                        </table>
                    </div><!-- /content -->
                </div>
            </td>
            <td></td>
        </tr>
    </table><!-- /BODY -->

    <!-- FOOTER -->
    <table class="footer-wrap">
        <tr>
            <td></td>
            <td class="container">

                <!-- content -->
                <div class="content">
                    <table>
                        <tr>
                            <td align="center">
                                <p>
                                    <a href="#">Terms</a> |
                                    <a href="#">Privacy</a> |
                                    <a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div><!-- /content -->

            </td>
            <td></td>
        </tr>
    </table>
</div>
@endsection
