<div style="margin:0 auto; font-family:Helvetica, sans-serif; padding: 15px 0;background: #f3f3f3;; font-size: 1.1em">
    <div style="background: #fff; color: #000000; max-width:615px;margin: 0 auto; padding: 15px">
        <div>
            @include('emails.layouts.master.header')
            <div style="margin-top: 40px">
                @yield('content')
            </div>
            @include('emails.layouts.master.footer')
        </div>
    </div>
</div>


