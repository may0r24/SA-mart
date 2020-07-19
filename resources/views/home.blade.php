@extends('layouts.app')

@section('content')
    <div class="container section">
        <div class="container success">
            <p>{{ session('message') ?? '' }}</p>
        </div>
        <div class="container success">
            <p>{{ session('update-order') ?? '' }}</p>
        </div>
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a href="#post">Post</a></li>
                    <li class="tab col s3"><a class="{{ session('errors')['tab'] != null ? '' : 'active' }}" href="#orders">Orders</a></li>
                    <li class="tab col s3"><a class="{{ session('errors')['tab'] ?? '' }}" href="#settings">Settings</a></li>
                </ul>
            </div>
        <div id="post" class="container col s12">
            <fieldset>
                <legend>Post Data:</legend>
                <div class="row">
                    <form class="col s12 create-post" action="{{ route('create.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">title</i>
                                <input id="title" name="title" type="text" class="validate" value="{{ htmlspecialchars(session('post')->title ?? '') }}">
                                <label for="title">Post Title</label>
                                <span>{{ session('errors')['title'] ?? '' }}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">message</i>
                                <textarea id="post_content" class="materialize-textarea" name="content">
                                    {{htmlspecialchars(session('post')->content ?? '')}}
                                </textarea>
                                <label for="post_content">Post Content</label>
                                <span>{{ session('errors')['content'] ?? '' }}</span>
                            </div>
                        </div>

                        <div class="row">
                        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg"/>
                        <span>{{ session('errors')['postimage'] ?? '' }}</span>
                        </div>
                        <div class="row">
                            <button class="btn waves-effect waves-light right indigo darken-4" type="submit" name="action">Post
                                <i class="material-icons right">send</i>
                            </button>
                        </div>

                    </form>

                </div>
            </fieldset>
            <div>
                <div class="container error">
                    <p>{{ session('delete-post-message') ?? '' }}</p>
                </div>
                <table class="highlight">
                    <thead>
                        <tr>
                            <th>Post title</th>
                            <th>Content</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($posts as $post)
                        <tbody>
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td><img src="{{ asset('/storage/post_images/'.$post->image) }}" alt="{{ $post->image }}" class="responsive-img materialboxed"></td>
                                <td><a href="{{ route('delete.post', $post->id) }}"><i class="medium material-icons tooltipped indigo-text" data-tooltip="Delete Forever">delete_sweep</i></a></td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
            <div id="orders" class="col s12">
                <div class="container" >
                    <form action="{{ route('search.order') }}" method="POST">
                        @csrf
                        <div class="row search">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">search</i>
                                <input id="" name="search" type="text" class="validate" value="{{ htmlspecialchars(session('orders')->search ?? '') }}">
                            </div>
                            <button class="btn waves-effect waves-light right indigo darken-4" type="submit" name="action">Search
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>
                <div>
                    <table class="responsive-table orders-table">
                        
                        @foreach($orders as $order)
                            <tbody>
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Delivery Address</th>
                                        <th>State</th>
                                        <th>Phone</th>
                                        <th>Alternate Phone</th>
                                        <th>Quantity</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tr>
                                    <form action="{{ route('update.order', $order->id) }} " method="POST">
                                        @csrf
                                        <td>{{ $order->full_name }}</td>
                                        <td>{{ $order->delivery_address }}</td>
                                        <td>{{ $order->state }}</td>
                                        <td>{{ $order->phone_number }}</td>
                                        <td>{{ $order->alt_phone_number ?? 'Not filled' }}</td>
                                        <td>
                                            <select class="browser-default" name="qty">
                            
                                                <option value="" disabled selected>Quantity</option>
                                                @foreach ($quantities as $quantity)
                                                    <option value="{{ $quantity->value }}" {{ $quantity->value == $order->qty ? 'selected' : '' }}> 
                                                        {{ $quantity->value }} 
                                                    </option>
                                                @endforeach
                                                
                                            </select>
                                        </td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            <select class="browser-default" name="status">
                            
                                                <option value="" disabled selected>Update Status</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->status }}" {{ $state->status == $order->status ? 'selected' : '' }}> 
                                                        {{ $state->status }} 
                                                    </option>
                                                @endforeach
                                                
                                            </select>
                                        </td>
                                        <td>
                                            <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="action">Update
                                                <i class="material-icons right">update</i>
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        <div id="settings" class="col s12">
            <div class="container settings">
                <div>
                    @foreach ($abouts as $about)
                    <form action="{{ route('update.abouts', $about->id) }} " method="POST">
                    @endforeach
                        @csrf
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Instagram</th>
                                    <th>LinkedIn</th>
                                    <th>Phone Line 1</th>
                                    <th>Phone Line 2</th>
                                    <th>Phone Line 3</th>
                                </tr>
                            </thead>
                            @foreach($abouts as $about)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="fb" name="facebook_link" type="text" class="validate" value="{{ htmlspecialchars(session('about')->facebook_link ?? $about->facebook_link) }}">
                                                    <label for="fb">Facebook</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="tw" name="twitter_link" type="text" class="validate" value="{{ htmlspecialchars(session('about')->twitter_link ?? $about->twitter_link) }}">
                                                    <label for="tw">Twitter</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="ig" name="instagram_link" type="text" class="validate" value="{{ htmlspecialchars(session('about')->instagram_link ?? $about->instagram_link) }}">
                                                    <label for="ig">Instagram</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="li" name="linkedin_link" type="text" class="validate" value="{{ htmlspecialchars(session('about')->linkedin_link ?? $about->linkedin_link) }}">
                                                    <label for="li">LinkedIn</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="ph1" name="phone_line_1" type="text" class="validate" value="{{ htmlspecialchars(session('about')->phone_line_1 ?? $about->phone_line_1) }}">
                                                    <label for="ph1">Phone Line 1</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="ph2" name="phone_line_2" type="text" class="validate" value="{{ htmlspecialchars(session('about')->phone_line_2 ?? $about->phone_line_2) }}">
                                                    <label for="ph2">Phone Line 2</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="ph3" name="phone_line_3" type="text" class="validate" value="{{ htmlspecialchars(session('about')->phone_line_3 ?? $about->phone_line_3) }}">
                                                    <label for="ph3">Phone Line 3</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        @foreach($abouts as $about)
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="about" class="materialize-textarea" name="about_line">
                                        {{htmlspecialchars(session('about')->about_line ?? $about->about_line)}}
                                    </textarea>
                                    <label for="about">About Line</label>
                                </div>
                            </div>
                            <div class="row right">
                                <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="action">Update
                                    <i class="material-icons right">update</i>
                                </button>
                            </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
