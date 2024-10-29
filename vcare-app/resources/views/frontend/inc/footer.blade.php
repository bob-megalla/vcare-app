<footer class="container-fluid bg-blue text-white py-3">
    <div class="row gap-2">

        <div class="col-sm order-sm-1">
            <h1 class="h1">{{ ucwords($settings['footer_title']) }}</h1>
            <p>{{ ucwords($settings['footer_contact']) }}</p>
        </div>
        <div class="col-sm order-sm-2">
            <h1 class="h1">Links</h1>
            <div class="links d-flex gap-2 flex-wrap">
                <a href="{{ route('home') }}" class="link text-white">Home</a>
                <a href="{{ route('indexMajor') }}" class="link text-white">Majors</a>
                <a href="{{ route('indexDoctors') }}" class="link text-white">Doctors</a>
                @if (!auth()->user())
                <a href="{{ route('indexLogin') }}" class="link text-white">Login</a>
                <a href="{{ route('indexRegister') }}" class="link text-white">Register</a>
                <a href="{{ route('indexContact') }}" class="link text-white">Contact</a>
                @else
                <a href="{{ route('logout') }}" class="link text-white">Logout</a>

                @endif
            </div>
        </div>
    </div>
</footer>
