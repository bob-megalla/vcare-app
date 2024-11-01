<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('user.dashboard') }}" class="nav-link">Home</a>

        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('user.logout') }}" class="nav-link">Logout</a>
        </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.logout') }}">
                <i class="fa fa-unlock-alt" title="Sign out"></i>
            </a>
        </li>
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" target="_blank" rel="noopener noreferrer" href="{{ route('home') }}">
                <i class="fa fa-globe" title="Go To WebSite"></i>
            </a>
        </li>


        <!-- Notifications Booked Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                @php
                    $unreaded_messages = App\Models\BookedDoctor::where('is_compeleted', '0')->get();
                @endphp
                @if (count($unreaded_messages) < 1)
                    <span class="badge badge-warning navbar-badge"></span>
                @else
                    <span class="badge badge-warning navbar-badge">{{ count($unreaded_messages) }}</span>
                @endif
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">{{ count($unreaded_messages) }} Booked</span>
                    <div class="dropdown-divider"></div>
                    @foreach ($unreaded_messages as $msg )

                    <a href="?admin=getBooked&id={{ $msg['id'] }}" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Patient Name : {{ $msg['name'] }}
                                    <span class="float-right text-sm text-danger"><i class="fa fa-check"
                                            aria-hidden="true"></i>
                                        @if ($msg['is_readed'] == 1)
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        @endif
                                    </span>
                                </h3>
                                <p class="text-sm"> Phone :<?= $msg['phone'] ?></p>
                                <p class="text-sm"> Email :<?= $msg['email'] ?></p>
                                @php
                                    $Doctor_name = App\Models\Doctors::where('id', $msg['doctor_id'])->first();
                                @endphp
                                <p class="text-sm"> Doctor Name : DR. <?= $Doctor_name['name_doctor'] ?></p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                    <?= date('F d, Y', strtotime($msg['created_at'])) ?></p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    @endforeach
                    <div class="dropdown-divider"></div>
                    <a href="<?= '?admin=allBooked' ?>" class="dropdown-item dropdown-footer">See All Booked</a>
                </div>


            </a>

        </li>

  <!-- Notifications Messages Dropdown Menu -->
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-comments"></i>
        @php
            $unreaded_messages = App\Models\Messages::where('is_readed','0')->get();
        @endphp
        @if (count($unreaded_messages) < 1)
        <span class="badge badge-warning navbar-badge"></span>
        @else
        <span class="badge badge-warning navbar-badge">{{ count($unreaded_messages) }}</span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <span class="dropdown-header">{{ count($unreaded_messages) }} Messages</span>
      <div class="dropdown-divider"></div>
      @foreach ($unreaded_messages as $msg)
      <a href="?admin=getMessage&id=<?=$msg["id"]?>" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
          <div class="media-body">
            <h3 class="dropdown-item-title">
            Name : <?= $msg['name']?>
              <span class="float-right text-sm text-danger"><i class="fa fa-check" aria-hidden="true"></i></span>
            </h3>
            <p class="text-sm"> Subj :<?= $msg['subject']?></p>
            <p class="text-sm"> Msg :<?= $msg['message']?></p>
            @php
                $senderName = App\Models\User::where('id',$msg['user_id'])->first();
            @endphp
            <p class="text-sm"> Sender Name :<?= $senderName->name?></p>
            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>  <?= date("F d, Y",strtotime($msg['created_at']))?></p>
          </div>
        </div>
        <!-- Message End -->
      </a>
      @endforeach
      <div class="dropdown-divider"></div>
      <a href="<?= "?admin=allMessages" ?>" class="dropdown-item dropdown-footer">See All Messages</a>
    </div>
  </li> --}}

    </ul>
</nav>
<!-- /.navbar -->
