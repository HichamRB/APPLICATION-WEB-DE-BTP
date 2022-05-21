@extends('layouts.admin')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
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
    .card[data-color="blue"] {
        background: #b8d8d8;
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
    @import url(https://fonts.googleapis.com/css?family=Open+sans);
@import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
@import url(https://fonts.googleapis.com/css?family=Playfair+Display);
.snip1515 {
  font-family: 'Open Sans', Arial, sans-serif;
  position: relative;
  margin: 10px;
  min-width: 230px;
  max-width: 315px;
  width: 100%;
  color: #000000;
  text-align: center;
  line-height: 1.4em;
  font-size: 14px;
  box-shadow: none !important;
}

.snip1515 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}



.snip1515 figcaption {
  width: 100%;
  background-color: #141414;
  color: rgb(253, 253, 253);
  padding: 30px 25px 25px;
  display: inline-block;
}

.snip1515 h3,
.snip1515 h4,
.snip1515 p {
  margin: 0 0 5px;
}

.snip1515 h3 {
  font-weight: 600;
  font-size: 1.3em;
  font-family: 'Playfair Display', Arial, sans-serif;
}

.snip1515 h4 {
    font-size: 150%;
  color: #8c8c8c;
  font-weight: 400;
  letter-spacing: 2px;
}

.snip1515 p {
  font-size: 0.9em;
  letter-spacing: 1px;
  opacity: 0.9;
}

.snip1515 #aff {
    margin-right: 5%;
    border: 4px solid #2eaacc;
    color: rgb(253, 253, 253);
    padding: 5%;
}



.snip1515 figcaption a {
  padding: 15px;
  border: 1px solid #ffffff;
  color: #ffffff;
  font-size: 0.7em;
  text-transform: uppercase;
  margin: 10px 0;
  display: inline-block;
  opacity: 0.65;
  width: 96%;
  text-align: center;
  text-decoration: none;
  font-weight: 700;
  letter-spacing: 4px;
}

.snip1515 i {
  padding: 10px 2px;
  display: inline-block;
  font-size: 18px;
  font-weight: normal;
  color: #e8b563;
  opacity: 0.75;
}
.snip1515 h4 span {
  display: block;
  font-size: 0.5em;
  color: #2980b9;
}

    .snip1515 :hover {
font-size: 105%;
      }

      .snip1515 :active {
        font-size: 150%;
      }

</style>
@section('content')

<body style="background-image: url(https://agrinova.ma/wp-content/uploads/2020/01/Background-website-01.jpg);
height:auto;
background-attachement:fixed;
background-size:cover; ">

<div class="container bootstrap snippets bootdeys">
    <div class="row">
      
        <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

                <figure class="snip1515">
            <a href="affectation" >
             <figcaption>
                <div>
                <h3>Chantier 1</h3>
                <h4><span>Chef de chantier</span>SAMADI Yassir</h4>
                <p> Adresse : <br>Elmehaneche 1 , Rue ahmed elhayyani  <br>
                Progress : 10 <br></p>
                <p id="aff">Affectation</p>
                </div>
            </figcaption>
            </a>
        </figure>

               
          

 
  

    </div>
</div>
</body>

@endsection
