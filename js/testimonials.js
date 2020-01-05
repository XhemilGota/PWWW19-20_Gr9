        
     function testimonial(testimonialTitle, testimonialText, c1Name, c2Name, cSurname)
        {
            this.testimonialTitle = testimonialTitle;
            this.testimonialText = testimonialText;
            this.c1Name = c1Name;
            this.c2Name = c2Name;
            this.cSurname = cSurname;
        };
        

        
        testimonial.prototype.fullName = function()
        {
                if(this.c2Name.length===0) return  this.c1Name + " " + this.cSurname;
        	return  this.c1Name + " & " + this.c2Name +" " + this.cSurname;
        };

        var testimonials = [new testimonial('Easy transactions', 'You were such a huge help to Brandon & me. You certainly kept us informed on any house you thought might fit our needs. I would highly recommend you to anyone I know needing the services of a Realtor. You were always willing to go the extra mile. Thanks for making the whole transaction so easy!', 'Tamy','Brandom', 'Cassady'),
                            new testimonial('Hard-working agents',"We have bought and sold with Janet more than once! She is our realtor because she gives us good advice, is always one step ahead of us to make sure things go smoothly, and works hard to represent us well. If we decide to move again, she will be the first person we call!", 'Jon', 'Leslie', ''),
                            new testimonial('Exactly what we wanted',"We found the home we wanted in the October 'Parade of Homes'. On October 2nd, we called Tammy, looked at the home which was exactly what we wanted. We bought the home the same day. Thank you Tammy for all you did in making our first home purchase a delightful event!","Carl", "Nancy", "Purdy"),
                            new testimonial('Amazing team', "Can’t praise Luke and the team enough. Since changing our property over to them we have had nothing but the best handling of our townhouse and the best tenants. Raegan has been amazing, always able to answer any questions I have.",'Sonia','','Peacey' ),
                            new testimonial('Incredibly helpful',"I can't praise your team enough. They have been an incredible help getting my partner and I into our first home. Although the house we wanted to buy off them had gone under contract, they helped us investigate another property through a different agent and gave us brilliant advice on what action to take. There was no benefit in this for them, Luke and the team and just genuinely nice people who want to see the best outcome for everyone.", 'Angie', 'Boon'),
                            new testimonial('Fantastic property managment',"The team, Raegan in particular are fantastic to deal with. Both the rental and selling departments have been a pleasure to work with. I'm so happy with the results they have achieved with my properties. I look forward to working with them in the future. Thanks heaps!!!", 'Carmela','','Morello')];       
        
        
        for(var i=0; i<testimonials.length; i++)
        {
            //krijimi i elementeve te html nga js scripta
            
             var article1 = document.createElement("article");
             var p1 = document.createElement("p");
             
             p1.className="quote-mark";
             p1.innerHTML="&ldquo;";
             article1.appendChild(p1);

             var article2 = document.createElement("article");
             var p2_1 = document.createElement("p");
             var p2_2 = document.createElement("p");
             var div = document.createElement("div");


             if(i%2===0)article2.className="left";
             else article2.className="right";
             
             p2_1.className="testimonial-title";
             p2_2.className="testimonial";
             div.className = 'client';
             article2.appendChild(p2_1);
             article2.appendChild(p2_2);
             article2.appendChild(div);
             
             
            document.getElementById("testimonialsSection").appendChild(article1);
            document.getElementById("testimonialsSection").appendChild(article2);
            
            
            
            document.getElementsByClassName("testimonial-title")[i].innerHTML = testimonials[i].testimonialTitle;
            document.getElementsByClassName("testimonial")[i].innerHTML = testimonials[i].testimonialText;
            document.getElementsByClassName('client')[i].innerHTML = "- "+testimonials[i].fullName();
            
        }
        
        
       

