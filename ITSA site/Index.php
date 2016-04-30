<!DOCTYPE html>
<html>
	<head>
		<title>Bootstrap Example!</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
		<script type="text/javascript" src="myjs.js"></script>
		<script src="myjs1.js"></script>
	    <link rel="stylesheet" type="text/css" href="mycss.css">
	</head>	
	<body data-spy="scroll" data-target=".navbar" data-offset="50" onload="echokar()">
		<?php
			if(isset($_GET['register'])){
				echo "<script type='text/javascript'>";
				echo "alert('Registered')";
				echo "</script>";
			}
			if(isset($_GET['message'])){
				echo "<script type='text/javascript'>";
				echo "alert('Message Received. We will get back to you shortly.')";
				echo "</script>";
			}
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
			}else{$id=0;}
			
		?>
		<script type="text/javascript">
			
			function echokar(){
				var id="";
				id="<?php echo $id ?>";
				if (id!=0) {
					document.getElementById("register").style.visibility = "hidden";
					document.getElementById("signin").style.visibility = "hidden";
					document.getElementById("usertext").innerHTML = "&nbsp &nbsp" + id;
				}else{
					document.getElementById("user").style.visibility = "hidden";
					document.getElementById("signout").style.visibility = "hidden";
				}
			}
		</script>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavBar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.php" class="navbar-brand"><div class="overlay"></div>
						<img src="images/icons/itsalogo1.png" height="100%">
					</a>
				</div>
				<!--<button onclick="hide()" id="button">Click ME</button>-->
				<div class="collapse navbar-collapse" id="myNavBar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">HOME</a></li>
						<li><a href="#aboutus">ABOUT US</a></li>
						<li><a href="#techfest">TECHFEST</a></li>
						<li><a href="#committee">COMMITTEE</a></li>
						<li><a href="#sponsors">SPONSORS</a></li>
						<li><a href="#contact-us">CONTACT US</a></li>
				        <li role="separator" class="divider"></li>
					</ul>
					<div class="navbar-right">
						<ul class="nav navbar-nav">
							<li data-toggle="modal" class="register" id="register" data-target="#registerModal" onclick="resetSignUp1()"><a href="#"><span class="glyphicon glyphicon-edit" aria-hidden="true"> Register</span></a></li>
							<li data-toggle="modal" class="signin" id="signin" data-target="#loginModal" onclick="resetSignUp2()"><a href="#"><span class="glyphicon glyphicon-log-in" aria-hidden="true"> SignIn</span></a></li>
							<li id="user"><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><p id="usertext" style="float:right"></p></a></li>
							<li id="signout"><a href="index.php"><span id="spansignout" class="glyphicon glyphicon-log-out" aria-hidden="true"> SignOut</span></a></li>

						</ul>
				    	<form class="navbar-form navbar-left" role="search">
				    		<div class="form-group">
				    			<input type="text" class="my-form-control form-control " placeholder="Search">
				    		</div>
				    		<button type="submit" class="my-btn btn btn-default">Submit</button>
					    </form>
					</div>
				</div>
			</div>
		</nav>
		<!-- Register Modal-->
		<div id="registerModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<form action="register.php" method="post" onsubmit="return registercheck()">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Register</h4><br>
							<label for="name">First Name:</label>
							<input type="text" class="form-control" id="inputFName" name="inputFName" placeholder="Enter your first name" required><br>
							<label for="name">Last Name:</label>
							<input type="text" class="form-control" id="inputLName" name="inputLName" placeholder="Enter your last name" required><br>
							<label for="Gender">Gender:</label>
							<div class="radio genderdiv">
								&ensp;&ensp;&ensp;
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="M" checked>Male</input>&ensp;&ensp;&ensp;
								<input type="radio" name="optionsRadios" id="optionsRadios2" value="F">Female</input>
							</div><span class="help-block"></span>
							<label for="inputEmail1">Email address:</label>
					    	<input type="email" class="form-control" id="inputEmail1" name="email" onblur="emailBlur1()" method="post" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" placeholder="Enter your email address" required>
						    <div id="password1div">
							    <label for="inputPassword11">Password:</label>
								<input type="password" class="form-control" id="inputPassword11" name="password" placeholder="Password" required><br>
								<label for="inputPassword12">Re-Enter Password:</label>
								<input type="password" class="form-control" id="inputPassword12" placeholder="Password"><br>
							</div>
							<input type="submit" class="btn btn-default pull-right" href="#" value="Register"></input>
						</form>
					</div>
				</div>

			</div>
		</div>
		<!-- Login Modal -->
		<div id="loginModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
			
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<form method="post" action="login.php" onsubmit="return logincheck()">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Sign In</h4><br>
							<label for="inputEmail2">Email address:</label>
					    	<input type="email" class="form-control" id="inputEmail2" onblur="emailBlur2()" name="inputEmail2"
					    	  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" placeholder="Enter your email address" required>
						    <label for="inputPassword2">Password:</label>
					    	<input type="password" class="form-control" id="inputPassword2" name="inputPassword2" placeholder="Password" required><br>
					    	<input id="loginSubmit" type="submit" class="btn btn-default pull-right" href="#" value="Sign In" data-target="#loginModal" name="submit"></input>
						</form>
					</div>
				</div>

			</div>
		</div>
		<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    	<li data-target="#myCarousel" data-slide-to="1"></li>
		    	<li data-target="#myCarousel" data-slide-to="2"></li>
		    	<li data-target="#myCarousel" data-slide-to="3"></li>
		    	<li data-target="#myCarousel" data-slide-to="4"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner my-slide" role="listbox">


		    	<div class="item active">
		        	<img src="images/techware.jpg" alt="Chania" width="100%" style="z-index:1">
		        	<!--<div class="caption-bg"></div>-->
		        	<div class="carousel-caption" style="z-index:10;">
			        	<h3>Techware 2016</h3>
			        	<p><a href="#"><i>Click here</i></a> to view all photos.</p>
		        	</div>
		    	</div>
		    	<div class="item">
		        	<img src="images/fullstack.jpg" alt="Chania" width="100%">
		        	<!--<div class="caption-bg"></div>-->
		        	<div class="carousel-caption">
			        	<h3>Full Stack Development Workshop</h3>
			        	<p><a href="https://drive.google.com/folderview?id=0B2GqffYHlrtPZmstdVZ0UHFMQzA&usp=sharing_eid&ts=56af7453"><i>Click here</i></a> to view the photos</p>
		        	</div>
		    	</div>

			    <div class="item">
			        <img src="images/kyros.jpg" alt="Chania" width="100%">
		        	<!--<div class="caption-bg"></div>-->
			        <div class="carousel-caption">
			          <h3>Kyros</h3>
			          <p>The annual newsletter of ITSA, RAIT.</p>
			        </div>
			    </div>
		    
			    <div class="item">
			        <img src="images/aspire.jpg" alt="Flower" width="100%">
		        	<!--<div class="caption-bg"></div>-->
			        <div class="carousel-caption">
			        	<h3>Aspire 2015</h3>
			    	    <p>The theme for the event was GAMING.  <a href="#"><i>Click here</i></a> to view all photos.</p>
			        </div>
			    </div>		

			    <div class="item">
			        <img src="images/androidws.jpg" alt="Flower" width="100%">
		        	<!--<div class="caption-bg"></div>-->
			        <div class="carousel-caption">
			        	<h3>Android Workshop</h3>
			    	    <p><a href="#"><i>Click here</i></a> to view all photos.</p>
			        </div>
			    </div>	  
			</div>

			    <!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			</a>
		</div>
		<div class="container-fluid" id="aboutus" style="background-color:#F5F5F5;color:#727272;">
			<p class="sectiontitle">About Us</p><div class="mainhr"></div>
			<div class="infodiv">
				<img src="images/icons/itsa-logo.png" />
				<div style="float:right;width:65%;padding-right:10%;">
					<h2>ITSA RAIT</h2><div class="subhr"></div>
					<h4 class="info" style="font-family:Tahoma;line-height:150%;">
					The Information Technology Students’ Association (ITSA) is a 
					Non-Profit professional meet to exchange views and information, 
					learn and share ideas. The wide spectrum of members is 
					committed to the advancement of the theory and practice of 
					Computer Engineering and Technology Systems, Science and 
					Engineering, Information Processing and related areas. 
					With more than 250 active members, ITSA is one of the biggest committees of RAIT. 
					The Forum also encourages and assists professionals to maintain the 
					integrity and competence of the profession and fosters a sense of 
					partnership amongst members.<br>Besides the activities held at the 
					Chapters and Student Branches, the forum also conducts periodic 
					conferences, seminars, workshops etc. ITSA-RAIT also organizes 2 annual Technical Festivals,
					 Aspire and Techware. Along with that it also publishes annual newsletter Kyros.</h4>
				</div>
			</div><div class="row"></div>
			<div class="workshopdiv">
				<div style="width:40%; margin:4% 0% 0% 4%;" class="col-lg-6">
					<h2>Workshops</h2><div class="subhr"></div>
					<h4 class="info" style="font-family:Tahoma;line-height:150%;">
						ITSA organizes timely workshops for the students of all branches covering the most 
						important topics which are required in this new age of technology. The topics are the ones 
						which are related to the Mumbai University syllabus. Our speakers are highly qualified
						in the particular subjects and students get to learn more deeply about the topics.<br>
						Our recent workshops were Android Database, Full Stack Development, Big Data and Hadoop, etc.
					</h4>
				</div>
				<div id="wsCarousel" class="carousel slide col-lg-6" data-ride="carousel" style="float:right;width:40%;margin:6% 8%;">
				    <!-- Indicators -->
				    <ol class="carousel-indicators" style="margin-bottom:-10px;">
				    	<li data-target="#wsCarousel" data-slide-to="0" class="active"></li>
				    	<li data-target="#wsCarousel" data-slide-to="1"></li>
				    	<li data-target="#wsCarousel" data-slide-to="2"></li>
				    </ol>

				    <!-- Wrapper for slides -->
				    <div class="carousel-inner my-slide1" role="listbox">

				    	<div class="item active">
				        	<img src="images/bigdataws.jpg" alt="Chania" width="100%">
				        	<div class="carousel-caption ws-carousel-caption">
					        	<h4>Big Data and Hadoop Workshop</h4>
					        	<p><a href="https://drive.google.com/folderview?id=0B7jz8taA_6inN0Jvb1RrSW9NbzA&usp=sharing">Click here</a> to view the photos</p>
				        	</div>
				    	</div>

					    <div class="item">
					        <img src="images/fullstack.jpg" alt="Chania" width="100%">
					        <div class="carousel-caption ws-carousel-caption">
					          <h4>Full Stack Development</h4>
					          <p><a href="https://drive.google.com/folderview?id=0B2GqffYHlrtPZmstdVZ0UHFMQzA&usp=sharing_eid&ts=56af7453">Click here</a> to view the photos</p>
					        </div>
					    </div>
				    
					    <div class="item">
					        <img src="images/androidws.jpg" alt="Flower" width="100%">
					        <div class="carousel-caption ws-carousel-caption">
					        	<h4>Android Database Workshop</h4>
					    	    <p><a href="#">Click here</a> to view the photos</p>
					        </div>
					    </div>				  
					</div>

					    <!-- Left and right controls -->
					<a class="left carousel-control" href="#wsCarousel" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#wsCarousel" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<div class="container-fluid" id="techfest" style="background-color:#B2EBF2;color:#212121; padding:3%;">
			<p class="sectiontitle">TECHFEST</p><div class="mainhr"></div>
			<div class="techwarediv">
				<img src="images/icons/techware.png" width="25%" style="margin-left:3%;"/>
				<div style="float:right;width:65%;padding-right:8%;">
					<h2>TECHWARE 2016</h2><div class="subhr"></div>
					<h4 class="info" style="font-family:Tahoma;line-height:150%;">
						Techware is the even semester Technical Fest organized by ITSA. The 2016 edition was huge
						success, with SMART CITY as the theme for the event. Approximately 400 students participated 
						from colleges all over Mumbai.Techware is the even semester Technical Fest organized by ITSA. The 2016 edition was huge
						success, with SMART CITY as the theme for the event. Approximately 400 students participated 
						from colleges all over Mumbai.Techware is the even semester Technical Fest organized by ITSA. The 2016 edition was huge
						success, with SMART CITY as the theme for the event. Approximately 400 students participated 
						from colleges all over Mumbai.Techware is the even semester Technical Fest organized by ITSA. The 2016 edition was huge
						success, with SMART CITY as the theme for the event. Approximately 400 students participated 
						from colleges all over Mumbai.<br>
						<a href="#">Click Here</a> to view photos of Techware 2016.
					</h4>
				</div>
			</div>
			<div class="aspirediv">
				<div style="float:left;width:53%; margin:4% 0% 0% 4%;">
					<h2>ASPIRE 2015</h2><div class="subhr"></div>
					<h4 class="info" style="font-family:Tahoma;line-height:150%;">
						ITSA organizes timely workshops for the students of all branches covering the most 
						important topics which are required in this new age of technology. The topics are the ones 
						which are related to the Mumbai University syllabus. Our speakers are highly qualified
						in the particular subjects and students get to learn more deeply about the topics.
						Our recent workshops were Android Database, Full Stack Development, Big Hadoop and Data, etc.<br>
						<a href="#">Click Here</a> to view photos of Aspire 2015.
					</h4>
				</div>
				<img src="images/icons/aspire.jpg" width="25%" style="float:right;margin:3% 8%;" />
			</div>
		</div>
		<div class="container-fluid" id="committee" style="background-color:#F5F5F5;color:#727272; padding:3%;">
			<p class="sectiontitle">COMMITTEE</p><div class="mainhr"></div>
			<div class="row row1">
				<div class="col-lg-5"></div>
				<div class="members col-lg-2">
					<center><img src="images/committee/female.jpg" class="img-circle"/>
					<h4>Mrs. Dipti Jadhav</h4>
					<h5>HOD IT Department</h5></center>
				</div>
			</div>
			<div class="row row2">
				<div class="members col-lg-3">
					<center><img src="images/committee/male.jpg" class="img-circle"/>
					<h4>Sammit Rane</h4>
					<h5>President</h5></center>
				</div>
				<div class="members col-lg-3">
					<center><img src="images/committee/male.jpg" class="img-circle"/>
					<h4>Aashish Raikwar</h4>
					<h5>Vice President</h5></center>
				</div>
				<div class="members col-lg-3">
					<center><img src="images/committee/male.jpg" class="img-circle"/>
					<h4>Kalpesh Bhangale</h4>
					<h5>Treasurer</h5></center>
				</div>
				<div class="members col-lg-3">
					<center><img src="images/committee/female.jpg" class="img-circle"/>
					<h4>Mitali Bhoir</h4>
					<h5>General Secretary</h5></center>
				</div>
			</div>
			<div class="row row3">
				<div class="members col-lg-3">
					<center><img src="images/committee/male.jpg" class="img-circle"/>
					<h4>Kaustubh Khandagale</h4>
					<h5>Chief Technical Officer</h5></center>
				</div>
				<div class="members col-lg-3">
					<center><img src="images/committee/male.jpg" class="img-circle"/>
					<h4>Sumit Bopche</h4>
					<h5>Sponsorship Head</h5></center>
				</div>
				<div class="members col-lg-3">
					<center><img src="images/committee/male.jpg" class="img-circle"/>
					<h4>Pavan Mahadik</h4>
					<h5>Sponsorship Co-Head</h5></center>
				</div>
				<div class="members col-lg-3">
					<center><img src="images/committee/female.jpg" class="img-circle"/>
					<h4>Niyati Chopra</h4>
					<h5>Public Relations Officer</h5></center>
				</div>
			</div>
			<div class="row row4">
				<div class="members col-lg-3">
					<center><img src="images/committee/male.jpg" class="img-circle"/>
					<h4>Nakul Chauhan</h4>
					<h5>Publicity Head</h5></center>
				</div>
				<div class="members col-lg-3">
					<center><img src="images/committee/female.jpg" class="img-circle"/>
					<h4>Sharvari Barge</h4>
					<h5>Publicity Co-Head</h5></center>
				</div>
				<div class="members col-lg-3">
					<center><img src="images/committee/male.jpg" class="img-circle"/>
					<h4>Omkar Mahadik</h4>
					<h5>Hospitality Head</h5></center>
				</div>
				<div class="members col-lg-3">
					<center><img src="images/committee/male.jpg" class="img-circle"/>
					<h4>Suyog Bilaskar</h4>
					<h5>Hospitality Co-Head</h5></center>
				</div>
			</div>
			<div class="row row5">
				<div class="members col-lg-4">
					<center><img src="images/committee/female.jpg" class="img-circle"/>
					<h4>Pranjali Gawade </h4>
					<h5>Creativity Head</h5></center>
				</div>
				<div class="members col-lg-4">
					<center><img src="images/committee/female.jpg" class="img-circle"/>
					<h4>Swati Bade</h4>
					<h5>Creativity Co-Head</h5></center>
				</div>
				<div class="members col-lg-4">
					<center><img src="images/committee/female.jpg" class="img-circle"/>
					<h4>Sonali Koli</h4>
					<h5>Creativity Co-Head</h5></center>
				</div>
			</div>
			<div class="row row6">
				<center><div class="members col-lg-6">
					<img src="images/committee/male.jpg" class="img-circle"/>
					<h4>Vrushabh Bhaskar</h4>
					<h5>Membership Head</h5>
				</div>
				<div class="members col-lg-6">
					<img src="images/committee/female.jpg" class="img-circle"/>
					<h4>Bhuvana Iyer</h4>
					<h5>Membership Co-Head</h5>
				</div></center>
			</div>
		</div>
		<div class="container-fluid" id="sponsors" style="background-color:#B2EBF2;color:#212121; padding:3%;">
			<p class="sectiontitle">Sponsors</p><div class="mainhr"></div>
			<div class="row sponrow1">
				<center><div class="col-lg-6">
					<img src="images/sponsors/nmtv.jpg" width="80%">
				</div>
				<div class="col-lg-6">
					<img src="images/sponsors/kfc.jpg" width="80%">
				</div></center>
			</div>
			<div class="row sponrow2">
				<center><div class="col-lg-6">
					<img src="images/sponsors/future group.jpg" width="80%">
				</div>
				<div class="col-lg-6">
					<img src="images/sponsors/frapp.jpg" width="80%">
				</div></center>
			</div>
			<div class="row sponrow3">
				<center><div class="col-lg-4">
					<img src="images/sponsors/just in time.jpg" width="80%">
				</div>
				<div class="col-lg-4">
					<img src="images/sponsors/maac.jpg" width="80%">
				</div>
				<div class="col-lg-4">
					<img src="images/sponsors/five star.jpg" width="80%">
				</div></center>
			</div>
		</div>

		<div class="container-fluid" id="contact-us" style="background-color:#F5F5F5;color:#727272; padding:3%;">
			<p class="sectiontitle">Contact Us</p><div class="mainhr"></div>
			<div class="col-lg-4">
				<div class="row controw1">
					<a href="https://www.facebook.com/ITSARAIT15" target="_blank">
						<img src="images/icons/fbicon.png" style="float:left; width:15%;">
						<p style="font-size:250%;float:left;margin:0.8% 0% 0% 2%;">Like Us on Facebook</p>
					</a><br>
				</div>
				<div class="row controw2">
					<a href="https://twitter.com/itsa_rait" target="_blank">
						<img src="images/icons/twitter.png" style="float:left; width:15%;">
						<p style="font-size:250%;float:left;margin:0.8% 0% 0% 2%;"> Follow Us on Twitter</p>
					</a><br>
				</div>
				<div class="row controw3">
					<a href="mailto:reachitsa@gmail.com" target="_blank">
						<img src="images/icons/email.png" style="float:left; width:15%;">
						<p style="font-size:250%;float:left;margin:0.5% 0% 0% 2%;"> Send Us an Email</p>
					</a><br>
				</div>
			</div>
			<div class="col-lg-11" style="float:right;width:40%;margin-right:5%;">
				<center><h3>Or Drop Us a Message</h3></center>
				<div class="subhr"></div>
				<form style="padding-top:1%;" id="message" method="post" action="message.php">
					<label>*Full Name:</label>
					<input type="text" class="form-control" id="msgname" name="msgname" placeholder="Enter your full name" required><br>
					<label>*Email:</label>
					<input type="email" class="form-control" id="msgmail" name="msgmail" placeholder="Enter your email" required><br>
					<label>Subject:</label>
					<input type="text" class="form-control" id="msgsubject" name="msgsubject" placeholder="Enter subject"><br>
					<label>*Message:</label>
					<textarea class="form-control" id="msg" name="msg" form="message" rows="15" placeholder="Enter your message" style="resize:none;"></textarea><br>
					<input type="submit" class="btn btn-default pull-right" href="#" value="Submit" style="margin-right:40%"></input>
				</form>
			</div>
		</div>
		<footer class="footer" style="background-color:#222222;color:#9d9d9d;">
			&copy; Created By: Pavankumar Mahadik<br>
	</body>
</html>