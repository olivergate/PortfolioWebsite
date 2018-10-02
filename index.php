<?php
require 'pull_data.php';

?>


<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Stalemate" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Italiana" rel="stylesheet">

    <title>OLIVER GATE CODING</title>
</head>
<body>

     <div id="home" class="home_page">
         <div class="home_container">
            <div class="hero_statement">

                <h2>Oliver Kaikane Gate</h2><p>Full-stack Web development</p>
                        <p><?php echo $hero_statement; ?></p>

            </div>
             <div class="buttons"> <a href="#about"> How can I help </a> </div>
        </div>
     </div>
     <nav>
         <img src="img/logo.png" class="logo"/>
         <img class="burger_selector" src="img/burger2.png">
         <div class="nav_container">
             <div class="logo_name">
                 OKG Web Development
             </div>
             <div class="nav_links">
                 <div class="buttons">
                     <a href="#home">Home</a>
                 </div>
                 <div class="buttons">
                     <a href="#portfolioId">Work</a>
                 </div>
                 <div class="buttons">
                     <a href="#about">About</a>
                 </div>
                 <!--<div class="buttons">-->
                     <!--Contact-->
                 <!--</div>-->
             </div>
         </div>

     </nav>
     <section id="about" >
         <div class="body_container">
             <div class="col70_col30">
                 <h2>About</h2>
                 <p><?php echo $about_me1; ?><p>
                     Oliver is a junior developer training at Mayden Academy, Bath. He enjoys long walks in the woods and occasionally a calvados by the fireside. One day he hopes to develop for a friendly local independent coding company to hone his skills and develop professionaly within. </p>
                 </p>
                 <h3>Skill set</h3>
                 <p>
                     Oliver is trained as a full stack developer, he is punctual and polite and all the attributes that people generally put in this section he is also.                 </p>
                 <h3>Contact details</h3>
                 <p>Email: oliver.kg2@gmail.com</p>
                 <p>Telephone: 07532762313</p>
             </div>

             <div class="col30_col70">
                 <!--<img src="portraitimg.jpeg" />-->
                 <!--<div class="coding_langs">-->

                 <!--</div>-->
             </div>
         </div>
     </section>
     <section id="portfolioId">
         <div class="portfolio_title">
                Portfolio
         </div>
            <div class="portfolio_container">

                <?php display_portfolio($portfolio_db); ?>

            </div>
     </section>
    <footer>
        <div class="footer_text_container">
            <h3>
                A website made by Oliver Gate
            </h3>
        </div>
    </footer>


</body>
</html>

