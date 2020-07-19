@extends('layouts.layout')

@section('content')

    <div class="container success">
        <p>{{ session('message') }}</p>
    </div>

    <div class="container section center">
        <div class="row">
            @foreach($posts as $post)
                @if(($post->id % 2) != 0)
                    <div class="col s12 m6">
                        <div class="card ">
                            <div class="card-image">
                                <img src="{{asset('/storage/post_images/'.$post->image)}}" alt="">
                            </div>
                            <div class="card-content black-text">
                                <span class="card-title black-text">{{ $post->title }}</span>
                                {{ $post->content }}
                            </div>
                            <div class="card-action">
                                Created at: {{ $post->created_at ?? '' }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col s12 m6">
                        <div class="card ">
                            <div class="card-image">
                                <img src="{{asset('/storage/post_images/'.$post->image)}}" alt="">
                            </div>
                            <div class="card-content black-text">
                                <span class="card-title black-text">{{ $post->title }}</span>
                                {{ $post->content }}
                            </div> 
                            <div class="card-action">
                                Created at: {{ $post->created_at ?? '' }}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="container section-2 scrollspy" id="ordernow">
        <fieldset>
            <legend>Order Details:</legend>
            <div class="row">
                <form class="col s12 create-order" action="{{ route('create.order')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="full_name" name="full_name" type="text" class="validate" value="{{ htmlspecialchars(session('orders')->full_name ?? '') }}">
                        <label for="full_name">Full Name</label>
                        <span>{{ session('errors')['full_name'] ?? '' }}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                        <i class="material-icons prefix">place</i>
                        <input id="delivery_address" name="delivery_address" type="text" class="validate" value="{{ htmlspecialchars(session('orders')->delivery_address ?? '') }}">
                        <label for="delivery_address">Delivery Address</label>
                        <span>{{ session('errors')['delivery_address'] ?? '' }}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                        <i class="material-icons prefix">place</i>
                        <input id="state" name="state" type="text" class="validate" value="{{ htmlspecialchars(session('orders')->state ?? '') }}">
                        <label for="state">State</label>
                        <span>{{ session('errors')['state'] ?? '' }}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                        <i class="material-icons prefix">phone_iphone</i>
                        <input id="phone_number" name="phone_number" type="text" class="validate" value="{{ htmlspecialchars(session('orders')->phone_number ?? '') }}">
                        <label for="phone_number">Phone Number</label>
                        <span>{{ session('errors')['phone_number'] ?? ''}}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                        <i class="material-icons prefix">local_phone</i>
                        <input id="alt_phone_number" name="alt_phone_number" type="text" class="validate">
                        <label for="alt_phone_number">Alternative Phone Number</label>
                        </div>
                    </div>

                    <div class="input-field col s12">

                        <select class="browser-default" name="qty">
                        
                            <option value="" disabled selected>Select Quantity</option>
                            @foreach ($quantities as $quantity)
                                <option value="{{ $quantity->id }}"> 
                                    {{ $quantity->value }} 
                                </option>
                            @endforeach   
                             
                        </select>
                        <span>{{ session('errors')['qty'] ?? '' }}</span>

                    </div>

                    <div class="row">
                        <button class="btn waves-effect waves-light right indigo darken-4" type="submit" name="action">Submit Order
                            <i class="material-icons right">send</i>
                        </button>
                    </div>

                </form>

            </div>
        </fieldset>
        
    </div>

    <!-- parallax -->
    <div class="parallax-container">
        <div class="parallax">
            <img src="img/stars.jpg" alt="" class="responsive-img">
        </div>
    </div>

    <footer class="page-footer grey darken-3 scrollspy" id="about">
        
            <div class="container">
                <div class="row">
                    @foreach($abouts as $about)
                        <div class="col s12 l6">
                            <h5>About Us</h5>
                            <p>{{ $about->about_line }}</p>
                        </div>
                        <div class="col s12 l4 offset-l2">
                            <h5>Connect</h5>
                            <p>
                                <a href="{{ $about->instagram_link ?? '#' }}" class="tooltipped btn-floating btn-small indigo darken-4" data-tooltip="Instagram" target=_blank>
                                        <i class="fab fa-instagram"></i></a>
                                    
                                <a href="{{ $about->facebook_link ?? '#' }}" class="tooltipped btn-floating btn-small indigo darken-4" data-tooltip="Facebook">
                                        <i class="fab fa-facebook"></i></a>
                                    
                                <a href="{{ $about->twitter_link ?? '#' }}" class="tooltipped btn-floating btn-small indigo darken-4" data-tooltip="Twitter">
                                        <i class="fab fa-twitter"></i></a>
                                    
                                <a href="{{ $about->linkedin_link ?? '#' }}" class="tooltipped btn-floating btn-small indigo darken-4" data-tooltip="LinkedIn">
                                        <i class="fab fa-linkedin"></i></a>
                            </p>
                            <p>
                                <ul>
                                    <div class="row">
                                        <li><i class="material-icons">phone_iphone</i>{{ $about->phone_line_1 ?? '' }}</li>
                                    </div>
                                    <div class="row">
                                        <li><i class="material-icons">phone</i>{{ $about->phone_line_2 ?? '' }}</li>
                                    </div>
                                    <div class="row">
                                        <li><i class="material-icons">phone</i>{{ $about->phone_line_3 ?? '' }}</li>
                                    </div>
                                </ul>
                            </p>
                        </div> 
                    @endforeach
                </div>
            </div>

        <div class="footer-copyright grey darken-4">
          <div class="container center-align">&copy; 2020 Oyindamola Akindele</div>
        </div>
    </footer>

@endsection
