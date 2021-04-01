<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Feliciano</h2>
                    <p>Feliciano Restaurant is founded on the idea that in the atmosphere of modern, busy life, everyone should have an option to eat healthy and delicious food without cooking for hours.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        @foreach($links as $link)
                            @if($link->image != NULL)
                                <li class="ftco-animate"><a href="{{ $link->href }}" target="_blank"><span class="{{ $link->image }}"></span></a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Open Hours</h2>
                    <ul class="list-unstyled open-hours">
                        <li class="d-flex"><span>Monday</span><span>9:00 - 23:00</span></li>
                        <li class="d-flex"><span>Tuesday</span><span>9:00 - 23:00</span></li>
                        <li class="d-flex"><span>Wednesday</span><span>9:00 - 23:00</span></li>
                        <li class="d-flex"><span>Thursday</span><span>9:00 - 23:00</span></li>
                        <li class="d-flex"><span>Friday</span><span>9:00 - 23:00</span></li>
                        <li class="d-flex"><span>Saturday</span><span>9:00 - 23:00</span></li>
                        <li class="d-flex"><span>Sunday</span><span> 9:00 - 23:00</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Links</h2>
                    <ul class="list-unstyled open-hours">
                        @foreach($links as $link)
                            <li class="d-flex"><a href="{{ $link->href }}" target="_blank">{{ $link->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Home Delivery</h2>
                    <p>We provide fast and easy home delivery for everyone. Just fill in the form and your order will be on it's way to you.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
