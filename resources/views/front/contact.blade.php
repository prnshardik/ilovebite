@extends('front.layout.app')

@section('meta')
@endsection

@section('title')
    Contact
@endsection

@section('styles')
@endsection

@section('content')
    <div class="page-title-area item-bg-1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Contact</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><i class="flaticon-tea-cup"></i></li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-title-shape">
            <img src="{{ asset('front/img/page-title/down-shape.png') }}" alt="image">
        </div>
    </div>
    <section class="contact-box-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="box-item">
                        <div class="contact-box-content">
                            <div class="icon">
                                <i class="flaticon-world"></i>
                            </div>
                            <p>{!! _settings('CONTACT_ADDRESS') !!}</p>
                            <div class="shape">
                                <img src="{{ asset('front/assets/img/image-icon/2.png') }}" alt="image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="box-item">
                        <ul class="box-table">
                           @if(isset($timing) && $timing->isNotEmpty())
                                @foreach($timing as $row)
                                    <li>
                                        {{ $row->days }}
                                        <span>
                                            @if($row->status == 'inactive')
                                                Closed
                                            @else
                                                {{ $row->start_time }} - {{ $row->end_time }}                                     
                                            @endif
                                        </span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="box-item">
                        <div class="contact-box-content">
                            <div class="icon">
                                <i class="flaticon-phone-ringing"></i>
                            </div>
                            <p>
                                <a href="tel:{{ _settings('CONTACT_NUMBER') }}">{{ _settings('CONTACT_NUMBER') }}</a>
                            </p>
                            <br>
                            <div class="icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <p>
                                <a href="tel:{{ _settings('CONTACT_EMAIL') }}">{{ _settings('CONTACT_EMAIL') }}</a>
                            </p>
                            <div class="shape">
                                <img src="{{ asset('front/img/image-icon/1.png') }}" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-area pb-100">
        <div class="container">
            <div class="contact-form">
                <div class="title">
                    <span>Contact Us</span>
                    <h3>Contact With Us</h3>
                </div>
                <form id="contactForm" action="{{ route('front.contact_store') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control" id="message" cols="30" rows="5" required data-error="Write your message" placeholder="Your Message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="default-btn">
                                Send Message
                                <i class="flaticon-play-button"></i>
                                <span></span>
                            </button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="map pb-100">
        <div class="container">
            <iframe src="{{ _settings('MAP_LINK') }}"></iframe>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    
    $(document).ready(function () {
        var form = $('#contactForm');
        $('.kt-form__help').html('');
        form.submit(function(e) {
            $('.help-block').html('');
            $('.m-form__help').html('');
            $.ajax({
                url : form.attr('action'),
                type : form.attr('method'),
                data : form.serialize(),
                dataType: 'json',
                async:false,
                success : function(json){
                    
                    if(json.code == 200){
                        toastr.success('Record Insertd successfully.', 'Success');
                        $("#contactForm").trigger("reset");
                    }else{
                        toastr.error('Faild To Insert Record !.', 'Error');
                    }
                },
                error: function(json){
                    if(json.status === 422) {
                        e.preventDefault();
                        var errors_ = json.responseJSON;
                        $('.kt-form__help').html('');
                        $.each(errors_.errors, function (key, value) {
                            $('.'+key).html(value);
                        });
                    }
                }
            });
        });
    });

</script>
@endsection
