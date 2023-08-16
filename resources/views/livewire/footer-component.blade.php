<!--  footer -->
<footer id="contact">
    <div class="footer">
       <div class="container">
          <div class="row">
             <div class="col-md-6">
                <div class="titlepage">
                   <h2>Nous contacter</h2>
                </div>
                <div class="cont">
                   <h3>Vous avez un avis un avis à nous soumettre ? </h3>
                   <p>Laissez votre message ici, et nous vous répondrons dès que possible. Notre service client est à votre portée aux jours ouvrables</p>
                </div>
             </div>

             <div class="col-md-6">
                <form id="request" class="main_form" wire:submit.prevent="contact">
                   <div class="row">
                      <div class="col-md-12 ">
                         <input class="contactus" placeholder="Nom Complet" type="type" name="name" wire:model="name">
                      </div>
                      <div class="col-md-12">
                         <input class="contactus" placeholder="Email" type="type" name="email" wire:model="email">
                      </div>

                      <div class="col-md-12">
                         <textarea class="textarea" placeholder="Message" type="type" name="message" wire:model="message"></textarea>
                      </div>
                      <div class="col-sm-12">
                         <button class="send_btn" type="submit">Envoyez</button>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
       <div class="copyright">
          <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <p>Copyright 2023 Tout droit reservé par <a href="https://emery-ntumba.genielectrik.com/">Emery NTUMBA</a></p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </footer>
