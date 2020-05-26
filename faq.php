<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php");?>

		<link href="css/faqstyle.css" rel="stylesheet" />
		<link rel="icon" type="image/png" href="img/logo.png" />

		<title>FAQ</title>
	</head>

	<body>
		<div id="body-part">
			<!--Wrapper div used to work with this part as a whole-->
			<div id="wrapper">
				<?php include("menu.php");?>

				<div id="pageName">
					<h1>FREQUENTLY ASKED QUESTION</h1>
				</div>

				<section id="faq_section">
					<p class="caption">
						<a href="Contact.html">Got a question?</a> We are here
						to answer!
					</p>
					<p></p>
				</section>
			</div>
		</div>

		<script>
			function faq(question, answer, direction) {
				this.question = question;
				this.answer = answer;

				document.getElementById("faq_section").innerHTML +=
					"<article>\n" +
					'<p class="questionmark">?</p>\n' +
					"</article>\n" +
					"<article id='temp'>\n" +
					'<p class="question"></p>\n' +
					'<p class="answer"></p>\n' +
					"</article>";

				document
					.getElementById("temp")
					.setAttribute("class", direction);
				document.getElementById("temp").removeAttribute("id");
			}

			var faqs = [
				new faq(
					"I want to buy a property. What do I do first?",
					"Before you start searching for a property, you need to work out how much the move is likely to cost and see what kind of mortgage deposit you can afford. Our professional Financial Consultants can help you calculate the costs involved in the house buying process.",
					"left"
				),
				new faq(
					"How much will conveyancing cost?",
					"&quot;Conveyancing&quot; sounds like boring legal stuff, but it&rsquo;s everything that needs to happen to make the property officially yours. It can be a confusing process and you need a solicitor to make it happen. Your Move can introduce you to a solicitor and offer a no sale no fee conveyancing service with a guaranteed fixed price to keep everything easy (this excludes disbursements). Contact your local branch to receive an accurate quote for how much this will cost.",
					"right"
				),
				new faq(
					"When do I sign the contract?",
					"After the sale is agreed, the seller&rsquo;s solicitor will draft a contract. Your solicitor will confirm the details of the property and perform searches. At the same time, your mortgage lender will need to conduct a mortgage valuation and send you a mortgage offer. Once all of this is complete, you will be ready to sign.",
					"left"
				),
				new faq(
					"How and when do I get the keys?",
					"Once the seller's solicitor has confirmed receipt of funds to confirm the transaction has completed, the estate agent will be able to confirm where and when you may collect the keys.",
					"right"
				),
				new faq(
					"When is the buyer or seller bound to the sale or purchase?",
					"Until both solicitors receive signed contracts from the seller and the buyer, either party can pull out at any time and for any reason without cost or penalty until the contracts are exchanged.",
					"left"
				),
				new faq(
					"When do I need to pay the deposit?",
					"The deposit is paid to the seller&rsquo;s solicitor, usually upon exchange of contracts.",
					"right"
				),
				new faq(
					"How long will it take to complete my purchase?",
					"If the seller has already vacated the property and you have already secured a mortgage, exchange of contracts and completion can happen relatively quickly.<br> However, if you need a mortgage and the seller is still in the property, the exchange of contracts normally takes between 4 and 6 weeks, the completion takes between 2 and 4 weeks. So in total you should expect up to 10 weeks to complete the purchase.",
					"left"
				),
			];

			for (var i = 0; i < 7; i++) {
				document.getElementsByClassName("question")[i].innerHTML =
					faqs[i].question;
				document.getElementsByClassName("answer")[i].innerHTML =
					faqs[i].answer;
			}
		</script>

		<?php include("footer.php");?>
		<script src="js/general.js" onload="changeColorOfMenu('faq')"></script>
	</body>
</html>
