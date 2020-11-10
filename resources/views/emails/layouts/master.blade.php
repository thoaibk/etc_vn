<div style="margin:0 auto; font-family:Helvetica, sans-serif; padding: 15px 0; font-size: 1.1em">
    <div style="background: #fff; color: #000000; max-width:561px; margin: 0 auto; padding: 15px; border: solid thin #dadce0; border-radius: 8px;">
        <div>
            @include('emails.layouts.master.header')
            <div style="margin-top: 40px">
                @yield('content')
            </div>
            @include('emails.layouts.master.footer')
        </div>
    </div>
</div>


