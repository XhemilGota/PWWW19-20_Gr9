<!DOCTYPE html>
<html>
	<head>
		<?php 
		
			include("header.php");

			include("configDB.php");

            $conn=Database::getConnection();

            $listing_ID = intval($_GET['Id']);
            
			$listing_data_query = "SELECT * FROM listings WHERE Id = $listing_ID";
			
			$query_result = mysqli_query($conn, $listing_data_query);

            $listing_data = mysqli_fetch_assoc($query_result);
			
		?>

		<link href="css/sellstyle.css" rel="stylesheet" />

		<script src="js/interestedContactValidation.js"></script>

		<style type="text/css">
			#sell .checkB {
				width: 20px;
				height: 20px;
				float: left;
				margin-right: 10px;
			}

			#sell input[type="radio"],
			#sell p {
				height: 15px;
				width: 15px;
				padding: 0;
				margin: 0;
				display: inline;
				width: auto;
				margin: 5px 10px;
			}
		</style>
		<title>Interested Contact</title>
	</head>

	<body>
		<div id="body-part">
			<!--Wrapper div used to work with this part as a whole-->
			<div id="wrapper">
				<?php include("menu.php");?>

				<div id="pageName">
					<h1>Home Buyer Form</h1>
				</div>

				<form
					action=""
					method="post"
					id="sell"
					onsubmit="return checkForErrors()"
				>
					<div class="leftdiv" style="width: 50%; float: left;">
						<section>
							<h2>Contact Information</h2>

							<table>
								<tr>
									<td>
										<abbr class="message" title=""
											><input
												type="text"
												placeholder="Full name"
												name="Full name"
												class="required"
												autofocus
										/></abbr>
									</td>
								</tr>
								<tr>
									<td>
										<abbr class="message" title=""
											><input
												type="tel"
												placeholder="Phone"
												name="Phone"
												class="required"
										/></abbr>
									</td>
								</tr>
								<tr>
									<td>
										<abbr class="message" title=""
											><input
												type="email"
												placeholder="Email"
												name="email"
												class="required"
										/></abbr>
									</td>
								</tr>
							</table>
						</section>

						<section>
							<h2>Property Information</h2>

							<table>
								<tr>
									Street Address:
									<br />
									<td colspan="2">
										<input
											type="text"
											name="adress1"
											id="propertyStreet"
											value="<?php echo $listing_data['street'] ?>"
											readonly
										/>
									</td>
								</tr>
								<tr>
									<td>
										City: <br />
										<input
											type="text"
											name="city"
											placeholder="City"
											id="propertyCity"
											value="<?php echo $listing_data['city'] ?>"
											readonly
											required
										/>
									</td>
								</tr>
								<tr>
									<td>
										Bedrooms:
										<input
											type="number"
											name="city"
											placeholder="City"
											id="propertyBed"
											class="halflength"
											value="<?php echo $listing_data['bedroom'] ?>"
											readonly
											required
										/>
									</td>
								</tr>
								<tr>
									<td>
										Bathrooms:
										<input
											type="number"
											name="city"
											placeholder="City"
											id="propertyBath"
											class="halflength"
											value="<?php echo $listing_data['bathroom'] ?>"
											readonly
											required
										/>
									</td>
								</tr>

								<tr>
									<td>
										Square footage:
										<p>
											<input
												class="halflength"
												type="number"
												id="propertySqrt"
												name="squarefootage"
												value="<?php echo $listing_data['sqrfe'] ?>"
												readonly
											/>
										</p>
									</td>
								</tr>
								<tr>
									<td>
										Price:
										<p>
											<input
												class="halflength"
												type="text"
												id="propertyPrice"
												name="squarefootage"
												value="$ <?php echo number_format($listing_data['price'],2) ?>"
												readonly
											/>
										</p>
									</td>
								</tr>
							</table>
						</section>

						<section>
							<h2>Your Situation</h2>
							<table>
								<tr>
									<td colspan="2">
										<abbr class="message" title=""
											><input
												type="text"
												name="profession"
												placeholder="Your profession"
												class="required"
										/></abbr>
									</td>
								</tr>
								<tr>
									<td>
										<abbr class="message" title="">
											<input
												type="text"
												name="city"
												placeholder="City"
												class="halflength required"
										/></abbr>
										<input
											type="text"
											name="state"
											placeholder="State/Province"
											class="halflength"
										/>
									</td>
								</tr>

								<tr>
									<td>
										Social Security Number (SSN):<br />
										<abbr class="message"
											><input
												type="password"
												name="ssn"
												class="required"
										/></abbr>
									</td>
								</tr>

								<tr>
									<td>
										Married:<br />
										<input
											type="radio"
											name="married"
											value="Yes"
											id="marriedYes"
										/>
										<label for="marriedYes">Yes</label>

										<input
											type="radio"
											name="married"
											value="No"
											id="marriedNo"
										/>
										<label for="marriedNo">No</label><br />
									</td>
								</tr>
								<tr>
									<td>
										Down payment:
										<p>
											<select
												class="halflength"
												name="condition"
											>
												<option></option>
												<option>5%</option>
												<option>10%</option>
												<option>15%</option>
												<option>20%</option>
												<option>other</option>
											</select>
										</p>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										Please select which type of buildings
										are you interested in:<br /><br />
										<input
											type="checkbox"
											class="checkB"
											name="buildingType"
											value="house"
											id="house"
										/>
										<label for="house"> House</label
										><br /><br />
										<input
											type="checkbox"
											class="checkB"
											name="buildingType"
											value="apartment"
										/>
										<label for="apartment"> Apartment</label
										><br /><br />
										<input
											type="checkbox"
											class="checkB"
											name="buildingType"
											value="penthouse"
										/>
										<label for="penthouse"> Penthouse</label
										><br /><br />
										<input
											type="checkbox"
											class="checkB"
											name="buildingType"
											value="other"
										/>
										<label for="other"> Other</label
										><br /><br /><br />
									</td>
								</tr>
							</table>
						</section>

						<section>
							<input type="submit" id="submit" value="SUBMIT" />
						</section>
					</div>

					<div
						class="rightdiv"
						style="width: 50%; float: right;"
						align="center"
					>
						<section style="height: 215px;">
							<img
								src="img/sell/personalInformation.jpg"
								style="padding-top: 60px;"
							/>
						</section>
						<section style="height: 677px;">
							<img
								src="img/sell/propertyInformation.png"
								style="padding-top: 180px;"
							/>
						</section>
						<section style="height: 192px;">
							<img
								src="img/sell/whyAreYouSelling.png"
								style="padding-top: 30px;"
							/>
						</section>
					</div>
				</form>
			</div>
		</div>

		<?php include("footer.php");?>
		<script src="js/general.js" onload="changeColorOfMenu('buy')"></script>
	</body>
</html>
