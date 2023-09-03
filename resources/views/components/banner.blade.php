<!-- banner -->
<section class="banner_main">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="text-bg">
                <div class="padding_lert">
                   <h1>Portail d'Archivage</h1>
                   <span>Soyez le bienvenu :)</span>
                   <p>Sauvegardez votre oeuvre scientifique en toute quiétude et facilité. Permettez aux autres générations de s'en inspirer sans soucis de plagiat. Des filtres de recherche avancés qui vous facilitent de retrouver rapidement un travail</p>
                   @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <p style="color:red">{{session('error')}} puis réessayez</p>
                    </div>
                   @else
                   <a href="{{route('archiver')}}">Archivez ici</a>
                   @endif
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- end banner -->
