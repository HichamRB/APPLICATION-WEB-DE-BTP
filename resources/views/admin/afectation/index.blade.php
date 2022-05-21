@extends('layouts.admin')
<style>
    body{margin-top:20px;}

    .card-big-shadow {
        max-width: 320px;
        position: relative;
    }

    .coloured-cards .card {
        margin-top: 30px;
    }

    .card[data-radius="none"] {
        border-radius: 0px;
    }
    .card {
        border-radius: 8px;
        box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
        background-color: #FFFFFF;
        color: #252422;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }


    .card[data-background="image"] .title, .card[data-background="image"] .stats, .card[data-background="image"] .category, .card[data-background="image"] .description, .card[data-background="image"] .content, .card[data-background="image"] .card-footer, .card[data-background="image"] small, .card[data-background="image"] .content a, .card[data-background="color"] .title, .card[data-background="color"] .stats, .card[data-background="color"] .category, .card[data-background="color"] .description, .card[data-background="color"] .content, .card[data-background="color"] .card-footer, .card[data-background="color"] small, .card[data-background="color"] .content a {
        color: #FFFFFF;
    }
    .card.card-just-text .content {
        padding: 50px 65px;
        text-align: center;
    }
    .card .content {
        padding: 20px 20px 10px 20px;
    }
    .card[data-color="blue"] .category {
        color: #7a9e9f;
    }

    .card .category, .card .label {
        font-size: 14px;
        margin-bottom: 0px;
    }
    .card-big-shadow:before {
        background-image: url("http://static.tumblr.com/i21wc39/coTmrkw40/shadow.png");
        background-position: center bottom;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        bottom: -12%;
        content: "";
        display: block;
        left: -12%;
        position: absolute;
        right: 0;
        top: 0;
        z-index: 0;
    }
    .card:hover{
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
    }
    h4, .h4 {
        font-size: 1.5em;
        font-weight: 600;
        line-height: 1.2em;
    }
    h6, .h6 {
        font-size: 0.9em;
        font-weight: 600;
        text-transform: uppercase;
    }
    .card .description {
        font-size: 16px;
        color: #66615b;
    }
    .content-card{
        margin-top:30px;
    }
    a:hover, a:focus {
        text-decoration: none;
    }

    /*======== COLORS ===========*/
    .card[data-background="image"] {
        background: url("asset/dessin-plan-technique-fond-espace-copie-bois_23-2148393152.jpg");
    }
    .card[data-color="blue"] .description {
        color: #506568;
    }

    .card[data-color="green"] {
        background: #d5e5a3;
    }
    .card[data-color="green"] .description {
        color: #60773d;
    }
    .card[data-color="green"] .category {
        color: #92ac56;
    }

    .card[data-color="yellow"] {
        background: #ffe28c;
    }
    .card[data-color="yellow"] .description {
        color: #b25825;
    }
    .card[data-color="yellow"] .category {
        color: #d88715;
    }

    .card[data-color="brown"] {
        background: #d6c1ab;
    }
    .card[data-color="brown"] .description {
        color: #75442e;
    }
    .card[data-color="brown"] .category {
        color: #a47e65;
    }

    .card[data-color="purple"] {
        background: #baa9ba;
    }
    .card[data-color="purple"] .description {
        color: #3a283d;
    }
    .card[data-color="purple"] .category {
        color: #5a283d;
    }

    .card[data-color="orange"] {
        background: #ff8f5e;
    }
    .card[data-color="orange"] .description {
        color: #772510;
    }
    .card[data-color="orange"] .category {
        color: #e95e37;
    }

    @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,600);
.snip1336 {
  font-family: 'Roboto', Arial, sans-serif;
  position: relative;
  overflow: hidden;
  margin: 10px;
  min-width: 230px;
  max-width: 315px;
  width: 100%;
  color: #ffffff;
  text-align: left;
  line-height: 1.4em;
  background-color: #223144;
}
.snip1336 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
}


.snip1336 figcaption {
  width: 100%;
  background-color: #141414;
  padding: 25px;
  position: relative;
}
.snip1336 figcaption:before {
  position: absolute;
  content: '';
  bottom: 100%;
  left: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 55px 0 0 400px;
  border-color: transparent transparent transparent #141414;
}


.snip1336 #follow {
;
      margin-right: 5%;
    border: 4px solid #2eaacc;
    color: rgb(253, 253, 253);
    padding: 5%;

}

.snip1336 h2 {
  margin: 0 0 5px;
  font-weight: 300;
}
.snip1336 h2 span {
  display: block;
  font-size: 0.5em;
  color: #2980b9;
}
.snip1336 p {
  margin: 0 0 10px;
  font-size: 0.8em;
  letter-spacing: 1px;
  opacity: 0.8;
}
    .snip1336 :hover {
       
  padding-bottom: 4555px;
      }

      .snip1336 :active {
        font-size: 150%;
        background-color: yellow;
      }


</style>
@section('content')


<body style="background-image: url(https://agrinova.ma/wp-content/uploads/2020/01/Background-website-01.jpg);
height:auto;
background-attachement:fixed;
background-size:cover; ">
<div class="container bootstrap snippets bootdeys">
    <div class="row">

        <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>


                <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

                  <figure class="snip1336">
            <a href="affectationsite" style="text-decoration: none;color: inherit;">
            <figcaption>
              <div>
              <h2>Projet 1<span>Chef de projet</span></h2>
              <h4 class="title">HAJJI ALI</h4>
              <p>
                client : HR FACTORY<br>
                Type de marché : Batiment <br>
                Statut : started</p>
                <p id="follow">Chantiers</p>
              </div>
            </figcaption>
            </a>
          </figure>

          
                  


    <script>
        /* Demo purposes only */
$(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);
</script>
</body>

@endsection

