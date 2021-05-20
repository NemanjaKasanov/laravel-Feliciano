<section class="ftco-section img"
    @if($image_exists == 'yes')
        style="background-image: url({{ asset('assets/img/bg_3.jpg') }})"
    @endif
    data-stellar-background-ratio="0.5">

    <div class="container">
        @if(!session()->has('user'))
        <div class="row d-flex">
            <div class="col-md-7 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                <div class="heading-section ftco-animate mb-5 text-center">
                    <span class="subheading">Register</span>
                    <h2 class="mb-4">to order online</h2>
                </div>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Your Name"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Your Last Name"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Your Email"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Your Phone"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Your Address"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="municipality">Municipality</label>
                                <input type="text" name="municipality" class="form-control" placeholder="Voždovac, Stari Grad, etc."/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation">Repeat Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat Password"/>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group text-center">
                                <input type="submit" name="submit" value="Register" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @if($errors->any())
                <div class="col-md-5 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
        @else
            <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                <div class="heading-section ftco-animate mb-5 text-center">
                    <span class="subheading">Oops!</span>
                    <h2 class="mb-4">You must be logged out to register.</h2>
                </div>
            </div>
        @endif
    </div>
</section>



{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">Phone</label>--}}
{{--                                    <input type="text" class="form-control" id="book_date" placeholder="Date">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">Time</label>--}}
{{--                                    <input type="text" class="form-control" id="book_time" placeholder="Time">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">Person</label>--}}
{{--                                    <div class="select-wrap one-third">--}}
{{--                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>--}}
{{--                                        <select name="" id="" class="form-control">--}}
{{--                                            <option value="">Person</option>--}}
{{--                                            <option value="">1</option>--}}
{{--                                            <option value="">2</option>--}}
{{--                                            <option value="">3</option>--}}
{{--                                            <option value="">4+</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
