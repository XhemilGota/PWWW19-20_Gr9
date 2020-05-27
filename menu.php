<?php
session_start();

?>

<?php
if(isset($_POST["log-out-submit"]))
{
    $_SESSION = [];
    header("location: LoginPage.php",true);
}
?>

<header>
                <div class='search'>
                    <input type='search' placeholder='Search by city' id='searchBar'>
                    <input type='button' value='SEARCH' id='searchButton' onclick='search(); window.location.href = 'Buy_Page1.html';'>
                </div>
                
                <div class='title'>
                    <h1 onclick='pentaClick();'>TRUESTATE</h1>
                    <nav>
                        <ul>
                            <li><a href='index.php' id='homepage'>HOMEPAGE</a></li>
                            <li><a href='Buy_Page1.php' id='buy' onclick='changeColorOfMenu('buy')'>BUY</a></li>
                            <li><a href='Sell.php' id='sell'>SELL</a></li>
                            <li><a href='#' id='aboutUs'>ABOUT US &#9660;</a>
                                <ul>
                                    <li><a href='OurCompany.php'>OUR COMPANY</a></li>
                                    <li><a href='AboutUs.php'>OUR TEAM</a></li>
                                    <li><a href='blog.php'>BLOG</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href='faq.php' id='faq'>FAQ</a></li>
                            <li><a href='Testimonials.php' id='testimonials'>TESTIMONIALS</a></li> -->
                            <li><a href='Contact.php' id='contact'>CONTACT</a></li>
                            <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"]==1) {
                                echo '
                            <li>
                                <a href="#" id="manageListings">MANAGE LISTINGS &#9660;</a>
                                <ul>
                                    <li><a href="add_listings.php">ADD</a></li>
                                    <li><a href="update_listings.php">UPDATE</a></li>
                                    <li><a href="delete_listings.php">DELETE</a></li>
                                </ul>
                            </li>';
                            }
                            ?>
                            <li><?php
                                if(isset($_SESSION["login_user"]))
                                {
                                    echo '<form method="post" action=""><input id=\'logout\' name="log-out-submit" style="background: none;
                                                                                   border: none;
                                                                                   font: inherit;
                                                                                   cursor: pointer;
                                                                                   outline: none;
                                                                                   font-size: 13px;
                                                                                   text-align: left;
                                                                                   padding: 7px 3px;
                                                                                   display: block;
                                                                                   text-decoration: none;
                                                                                   color: #666666;
                                                                                   " 
                                           type="submit" value="LOG OUT"></form>';
                                }
                                else
                                {
                                    echo '<a href=\'LoginPage.php\' id=\'login\'>LOG IN</a>';
                                }

                                ?>
                            </li>
                        </ul>
                    </nav>
                    <p class='caption'>Do you wanna buy a home? We make it possible.</p>
                </div>
            </header>
