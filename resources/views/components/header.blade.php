<header>
    <!-- header inner -->
    <div class="header">
       <div class="container">
          <div class="row">
             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                <div class="full">
                   <div class="center-desk">
                      <div class="logo">
                         <a href="{{route('index')}}"><strong>Archive !</strong></a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                <nav class="navigation navbar navbar-expand-md navbar-dark ">
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarsExample04">
                      <ul class="navbar-nav mr-auto">
                         <li class="nav-item">
                            <a class="nav-link" href="#">A propos</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="#contact">Nous contacter</a>
                         </li>
                      </ul>

                      <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle" style="font-size: 20px;"></i>
                            @auth
                            {{  auth()->user()->name  }}
                            @endauth
                            @guest
                                Mon compte
                            @endguest
                        </button>
                        <div class="dropdown-menu">
                            @if( auth()->check() )
                                @if (Auth::user()->role_id===2)
                                    <a href="{{route('travail')}}" class="text-decoration-none"><button class="dropdown-item" type="button">Mes publications</button></a>
                                    <a href="{{ url('auth/signout')  }}" class="text-decoration-none"><button class="dropdown-item" type="button">Se deconnecter</button></a>
                                @elseif (Auth::user()->role_id===3)
                                    <a href="{{url('downloaded/')}}" class="text-decoration-none"><button class="dropdown-item" type="button">Mes Téléchargement</button></a>
                                    <a href="{{ url('auth/signout')  }}" class="text-decoration-none"><button class="dropdown-item" type="button">Se deconnecter</button></a>
                                @else
                                <a href="{{url('admin/travails')}}" class="text-decoration-none"><button class="dropdown-item" type="button">Mes publications</button></a>
                                <a href="{{ url('auth/signout')  }}" class="text-decoration-none"><button class="dropdown-item" type="button">Se deconnecter</button></a>
                                @endif

                            @else
                                <a href="{{ url('auth/login')  }}" class="text-decoration-none"><button class="dropdown-item" type="button">Se connecter</button></a>
                                <a href="{{ url('auth/register')  }}" class="text-decoration-none"><button class="dropdown-item" type="button">Créer un compte</button></a>
                            @endif
                        </div>
                      </div>

                   </div>
                </nav>
             </div>
          </div>
       </div>
    </div>
 </header>
 <!-- end header inner -->
 <!-- end header -->
