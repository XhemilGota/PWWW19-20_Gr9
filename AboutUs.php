<!DOCTYPE html>
<html>

    <head>

        <?php include("header.php");?>
        
        <link href="css/homepagestyle.css" rel="stylesheet">
        <link href="css/aboutUs.css" rel="stylesheet">
        
        <title>About Us</title>

    </head>

    <body>
	<div id="body-part">
        <!--Wrapper div used to work with this part as a whole-->
        <div id="wrapper">
        <?php include("menu.php");?>
            <div id="pageName">
            	<h1>Our Team</h1>
            </div>
            
            <div>
                <dl>
                    <dt>Our team consists of four members</dt>
                    <dd>
                        <ol>
                            <li><a href="#sarai">SARAI SKOUSEN</a></li>
                            <li><a href="#corey">COREY LIGHT</a></li>
                            <li><a href="#eric">ERIC WALSTROM</a></li>
                            <li><a href="#pierre">PIERRE BINANDEH</a></li>
                        </ol>
                    </dd>
                </dl>
            </div>

            <article>
                <div class="entries">
               <a href="img/aboutUs/sarai.png" target="_blank">
                    <img src="img/aboutUs/sarai.png" width="106.65" height="161.4" alt="Sarai Skousen">
               </a>
                    <h2 id="sarai">SARAI SKOUSEN <br> <span>Realtor</span></h2>
                    <ul>
                        <li><img src="img/aboutUs/office.jpg">  248-850-1254</li>
                        <li><img src="img/aboutUs/mobile.png"> 248-534-7452</li>
                        <li><img src="img/aboutUs/email.jpg"><a href="mailto:sarai@tstate.comsarai@tstate.com">Email me</a></li>
                    </ul>

                    <div class="description">
                        <p>Sarai's bio is comprehensive, and it provides detail about the value she provides to customers. She also includes impressive sales statistics to boost her credibility. <br> Favorite line: A high-touch broker known for his extensive market knowledge and her unmatched devotion to clients, Sarai's success is based almost exclusively on positive referrals. She earns the respect of her clients by working tirelessly on their behalf and by always offering them candid advice.</p>
                    </div>
                </div>

                <div class="entries">
                    <a href="img/aboutUs/Corey.png" target="_blank">
                    <img src="img/aboutUs/Corey.png" width="106.65" height="161.4" alt="Corey Light">
                    </a>
                    <h2 id="corey">COREY LIGHT <br> <span>Realtor</span></h2>
                    <ul>
                        <li><img src="img/aboutUs/office.jpg">  248-850-4587</li>
                        <li><img src="img/aboutUs/mobile.png"> 248-125-4521</li>
                        <li><img src="img/aboutUs/email.jpg"><a href="mailto:corey@tstate.com">Email me</a></li>
                    </ul>

                    <div class="description">
                        <p>Corey Light's bio is detailed and includes a high-quality photo of himself. He highlights his success as a real estate agent and keeps things light-hearted by including a few personal details about himself.<br>Favorite line: Reared in the Tri-State Area (New York, New Jersey, Connecticut) and Dallas, Texas, I have an effective combination of Southern charm and Northeastern tenacity. I like to win (for my clients) but do so with a calm demeanor and a smile.</p>
                    </div>
                </div>

                <div class="entries"> 
                    <a href="img/aboutUs/eric.png" target="_blank">
                        <img src="img/aboutUs/eric.png" width="106.65" height="161.4" alt="Eric Walstrom">
                    </a>
                    <h2 id="eric">ERIC WALSTROM <br> <span>Principal Broker</span></h2>
                    <ul>
                        <li><img src="img/aboutUs/office.jpg">  248-850-7845</li>
                        <li><img src="img/aboutUs/mobile.png"> 248-534-3658</li>
                        <li><img src="img/aboutUs/email.jpg"><a href="mailto:eric@tstate.com">Email me</a></li>
                    </ul>

                    <div class="description">
                        <p>This bio is brief, but it includes all of the key information about this realtor. Not only does Eric include an impressive sales statistic, he includes details about his prior experience in the army and about how he gives back to his community.<br>Favorite line: As a Colorado native, and a seasoned real estate professional, I recognize and value the trust my clients place in me and I strive every day to exceed their expectations. I have been a leading top producer for over 18 years.</p>
                    </div>
                </div>

                <div class="entries">
                     <a href="img/aboutUs/pierre.png" target="_blank">
                        <img src="img/aboutUs/pierre.png" width="106.65" height="161.4" alt="Pierre Binandeh">
                     </a>
                    <h2 id="pierre">PIERRE BINANDEH <br> <span>Realtor</span></h2>
                    <ul>
                        <li><img src="img/aboutUs/office.jpg">  248-850-4578</li>
                        <li><img src="img/aboutUs/mobile.png"> 248-534-1248</li>
                        <li><img src="img/aboutUs/email.jpg"><a href="mailto:pierre@tstate.com">Email me</a></li>
                    </ul>

                    <div class="description">
                        <p>Pierre's bio is short and sweet. He details his experience and emphasizes the high-quality service he provides to clients. This excellent service results in repeat customers and referrals. <br>Favorite line: His business is based on more than 80 percent referrals from satisfied clients. Most important to Gawain is providing the most excellent service to buyers and sellers in order to earn their trust, referrals, and repeat business.</p>
                    </div>
                </div>
            </article>
            </div>
            
            <?php include("footer.php");?>
            
        <script src="js/general.js" onload="changeColorOfMenu('aboutUs')"></script>
    </body>
</html>