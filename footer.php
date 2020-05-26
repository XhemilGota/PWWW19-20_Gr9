<footer>

        <script>
            function allowDrop(ev)
            {
                ev.preventDefault();
            }

            function drag(ev)
            {
                ev.dataTransfer.setData('text', ev.target.id);
            }

            function drop(ev)
            {
                ev.preventDefault();
                var data = ev.dataTransfer.getData('text');

                var div_drop_element = ev.target.parentElement.parentElement;
                var div_drag_element = document.getElementById(data).parentElement.parentElement;

                div_drag_element.appendChild(document.getElementById(ev.target.id).parentElement);
                div_drop_element.appendChild(document.getElementById(data).parentElement);
            }
        </script>

        <!--Footer wrapper, which was used to put the footer part side to side on the browser page-->
        <div id='footer-wrapper'>
            <div id='Company-details'>
                <h3>Company Details Here</h3>

                <p>
                <Address>
                    530 Southside Lane<br>
                    4391 Hillhaven Drive<br>
                    Los Angeles<br>
                    90023<br>
                </Address>
                </p>

                <p id='contact'>
                    Tel: <a href='tel:213-201-0000'>213-201-0000</a><br>
                    Email: <a href='mailto: contact@truestate.com'>contact@tstate.com</a>
                </p>
            </div>

            <div id='news-events'>
                <h3>Latest News & Events</h3>

                <h4><span>Mortgage Applications</span></h4>

                <p>
                    Mortgage Applications Dip in Late December<br>
                    According to the Mortgage Bankers Association's
                </p>

                <h4><span>Southern U.S. Cities</span></h4>

                <p>
                    Southern U.S. Cities to be Hottest Housing Markets in 2020<br>
                    According to a panel of economists and real estate experts
                </p>
            </div>

            <div id='up-to-date'>
                <h3>Stay Up To Date</h3>

                <p>Subscribe To Our Newsletter</p>

                <input type='text' placeholder='Enter Your Email Here'>
                <input type='button' value='GO'>
                <br>

                <div class='dd_div'><a href='http://www.twitter.com'><img id='dd1' draggable='true' ondragstart='drag(event)' ondrop='drop(event)' ondragover='allowDrop(event)' src='img/footer/twitter.jpg' width='45' height='45'></a></div>
                <div class='dd_div'><a href='http://www.linkedin.com'><img id='dd2' draggable='true' ondragstart='drag(event)' ondrop='drop(event)' ondragover='allowDrop(event)' src='img/footer/linkedin.png' width='45' height='45'></a></div>
                <div class='dd_div'><a href='http://www.facebook.com'><img id='dd3' draggable='true' ondragstart='drag(event)' ondrop='drop(event)' ondragover='allowDrop(event)' src='img/footer/facebook.png' width='45' height='45'></a></div>
                <div class='dd_div'><a href='http://www.rss.com'><img id='dd4' draggable='true' ondragstart='drag(event)' ondrop='drop(event)' ondragover='allowDrop(event)' src='img/footer/rss.png' width='45' height='45'></a></div>
            </div>

        </div>

        <div id='footer-bottom'>

            <div>
                <p id='copyright'>
                    Copyright &copy; 2020 - All Rights Reserved - PWWW19-20_Gr9
                </p>

                <p id='template-origin'>
                    Template by OS Templates
                </p>
            </div>
        </div>
    </footer>