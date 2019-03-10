<?php
	require_once("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/ieee_merge.ico" />
	<title>Events - IEEE SB IIIT Allahabad</title>
	
	<meta name="keywords" content="IEEE, IIITA, IIIT Allahabad, IEEE Students Branch, Engineering" />
	<meta name="description" content="Official Page of IEEE Students Branch of IIIT Allahabad." />
	
	<link rel="stylesheet" type="text/css" href="css/templatemo_style.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
	<link rel="stylesheet" type="text/css" href="css/slimbox2.css" media="screen" /> 
	
	<script type="text/javascript" src="js/jquery-1.7.2.min.js" ></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
	<script type="text/javaScript" src="js/slimbox2.js"></script> 
	<script type="text/javascript">
		ddsmoothmenu.init({
			mainmenuid: "templatemo_menu", //menu DIV id
			orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
			classname: 'ddsmoothmenu', //class added to menu's outer DIV
			//customtheme: ["#1c5a80", "#18374a"],
			contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
		})
	</script>
	<script>
	  $(function() {
	    $( "#accordion" ).accordion({
	      heightStyle: "content"
	    });
	  });
	</script>
</head>
<body>

<div id="templatemo_wrapper">
	<a href="index.php"><img id = "site_title" src = "images/header.png" style = "height: 150px"></a>
	<div id="templatemo_header"><span class="header_border"></span>
		<div id="templatemo_menu" class="ddsmoothmenu">
          <ul >
					<li style="left:-150px;"><a href="index.php" class="selected" ><span></span>Home</a></li>
					<li style="left:-150px;"><a href="#"><span></span>Office Bearers</a>
						<ul>
							<li><a href="faculty_advisors.php">Faculty Advisors</a></li>
							<li><a href="office_bearers.php">Office Bearers</a></li>
							<li><a href="Execom.php">ExCom Members</a></li>
							<li><a href="Student_Volunteers.php">Team Members</a></li>
						</ul></li>
					<li style="left:-150px;"><a href="#"><span></span>Chapters</a>
						<ul>
							<li><a href="ras_chapter.php">RAS (SBC14321A)</a></li>							
							<li><a href="cs_chapter.php">Computer Society (SBC14321B)</a><br/></li>
							<li><a href="sp_chapter.php">Signal Processing (SBC14321C)</a><br/></li>
							<li><a href="wie_chapter.php">WIE Affinity Group (SBA14321)</a><br/></li>
						</ul></li>
					<li style="left:-150px;"><a href="IEEE_Student_Members.php"><span>Members</span></a>
					
					<li style="left:-150px;"><a href="event.php"><span></span>Activities</a>
						</li>					
						
					<li style="left:-150px;"><a href="#"><span></span>Downloads</a>
					<ul>
							<li><a href="reports.php">Reports</a></li>							
							<li><a href="download.php">Documents/Forms</a></li>
							<li><a href="press_release.php">Press release</a></li>
							
						</ul></li>	
						<li style="left:-150px;"><a href="sponsors.pdf"><span>Sponsor</span></a>	
								
				</ul>
            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->
        <div class="clear"></div>
    </div> <!-- END of header -->
    
    
    <div id="templatemo_main_content">
    	<div id="templatemo_sidebar">
		<div class="sidebar_content_box">
			<h3>IEEE Members</a></h3>
			<ul class="sidebar_gallery">
				<?php
					$imgs = 1;
					$check = array();
					while ($imgs <= 9) {
						    $qry = "SELECT * FROM student_team";
	                        $smt = $dbh->prepare($qry);
	                        $smt->execute();
	                        $rw = $smt->rowCount();
						    $rand_img = rand (1, $rw);
						    $rand_img = rand (11, 22);
						    while (in_array($rand_img, $check)) {
							  $rand_img = rand (1, $rw);
							  $rand_img = rand (11, 22);
					    }
					    array_push($check, $rand_img);
					    $p = "stu_images/member" . $rand_img . ".jpg";
					    $query2 = "SELECT member_id FROM student_image WHERE image_id = (SELECT image_id FROM image WHERE image_path = :path)";
					    $stmt2 = $dbh->prepare($query2);
					    $stmt2->bindParam(':path', $p, PDO::PARAM_STR);
					    $stmt2->execute();
					    $row = $stmt2->fetch(PDO::FETCH_ASSOC);
					    $member_id = $row['member_id'];
					    $num = 1;
					    $query2 = "SELECT member_id FROM student_team";
					    $stmt2 = $dbh->prepare($query2);
					    $stmt2->execute();
					    while ($r = $stmt2->fetch(PDO::FETCH_ASSOC)) {
						if ($member_id == $r['member_id']) {
						    break;
						}
						$num++;
					    }
					    $a = $num;
					    if ($num%10 == 0) {
						$num = $num / 10;
					    } else {
						$num = (int) ($num / 10) + 1;
					    }
				?>
			    <li><img src="<?php echo $p; ?>"  /></li>
			    <?php
				$imgs++;
				}
			    ?>
			</ul>
			<div class="clear"></div>
		</div>
		
		<div class="sidebar_content_box ">
				<a href = "http://www.ieeer10.org/" target="_blank"><image src = "images/linksUp/ieeeRegion10.jpg" height = "50px" width = "65"></a>
				<a href = "http://ewh.ieee.org/r10/india_council/" target="_blank"><image src = "images/linksUp/ieee_india_council.png" height = "50px" width = "65px" style="margin-left:10px"></a>
				<a href = "http://www.ieeeup.org/"  target="_blank"><image src = "images/linksUp/ieee-up.png" height = "50px" width = "73px" style="margin-left:10px"></a>
		</div>
      </div>
	 <div id="templatemo_content">
        	<div id="accordion">
			<h3 style="font-weight:800; font-size: 20px; background-color:#bbbdef"> Session (2017-18)</h3>
              <div>
                             
                             	                
              </div>


		<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">  Minutes of 2nd Ex-Com Meeting of IEEE-SB-IIITA Session 2017- 2018</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#"><sup></sup> March 30, 2017</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/Min2nd_ExCOM.bmp" alt="Post Image 2" />
                <br>
                <br>
               	<p> The 2nd Ex-Com Meeting of the IEEE Student Branch, IIIT Allahabad for the session 2017-2018 was conducted on 30th March 2017 (5:00 to 7:00 P.M.) at CC-3 Building (5055). All the Office Bearers were present in the meeting. The Program and Schedule Committee was given the responsibility to manage and organize the Ex-Com Meeting and they conducted it very nicely.<br>
</p>
                    <b>Venue:</b> 5055, CC-3 Building, IIIT Allahabad <br>
                    <b>Time:</b> 5:00 PM - 7:00 PM
			
                    <p>
<a target="_blank" href="documents/Minutes_of_2nd_Ex-Com_Meeting_of_IEEE-SB-IIITA_Session_2017-2018.pdf"><span style="color: #3366FF;text-decoration: underline;float: right;">Click here to Download the Report</a>
		</p>
</div>

			<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">  IEEE Computer Society India Symposium (CSIS) 2017</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#"><sup></sup> 17-19 March, 2017</a></span>
                </div><br>
The <b> IEEE Computer Society India Symposium (CSIS) 2017</b> is to be held at IIIT Allahabad in the third week of March 2017. It will be jointly conducted by the IEEE Computer Society India Council SAC, IEEE SP/C Joint Chapter, UP Section and IEEE Student Branch, IIIT Allahabad. <br>

The main scope of this symposium is to bring together professionals, speakers, experts and other academicians so that the students can interact with and learn from them. The theme of the event is <b>“Humans & Computers”</b>. The symposium will include talks, workshops, and events on a wide array of CS/IT domains such as Human Computer Interaction, Machine Learning, Network Security, Cognitive Science and much more. As a platform to bring all the Computer Society chapters of India together, IEEE CSIS 2017 focuses on improving the future activities of all the different chapters of Computer Society all over India as well as to cast a focus on the immense depth of computer science. <br>

The IEEE CSIS 2017 will be a three-day event and will provide the students and young professionals with an opportunity to interact with the esteemed speakers and professionals from all over India. Technical talks on currently flourishing fields and workshops thereafter based on the same will nurture the creative minds and open them to a new world.<br>  
<p> 
<a target="_blank" href="http://ieeecsis.org/"><span style="color: #3366FF;text-decoration: underline;float: right;">Click here to visit CSIS Website</a> 
</p>
                
                <br>
               	
                    <b>Venue:</b> IIIT Allahabad <br>
	<!--		
                    <p>
<a target="_blank" href="https://ieee.sb.iiita.ac.in/Synergy"><span style="color: #3366FF;text-decoration: underline;float: right;">Click here to visit Synergy Website</a>
		    </p>
      -->          
                </div>
           
		
			<h3 style="font-weight:800; font-size: 20px; background-color:#bbbdef"> Session (2016-17)</h3>
              <div>
                               
                             	                
              </div>

				
		<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">  IEEE AGM Meeting IEEE-SB-IIITA (2016-17)</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#"><sup></sup> 13th January, 2017</a></span>
                </div><br>
<img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/AGM_Meeting_2017.jpg" alt="Post Image 2" />
                <br>
                <br>

                
<p> The Annual General Meeting (AGM) of the IEEE Student Branch, IIIT Allahabad for the session 2016-17 was conducted on 13th January, 2017. All the office bearers, coordinators and team members of Student Branch were present in the meeting. The meeting began with Mr. Vinod Kumar Jatav (Chair, IEEE-SB-IIITA) extending his gratitude to the members of the student branch for their hard work and dedication which contributed to its well functioning in the past session. After this, Mr. Shivam (Chair, Publicity Committee) discussed about the various tech talks and events which took place in the previous session. He also enlightened about the upcoming event Computer Society India Symposium (CSIS) – 2017 being organised at IIIT Allahabad.</p>

      <p>
<a target="_blank" href="documents/IEEE_AGM_IEEE_SB_IIITA_Jan_2017.pdf"><span style="color: #3366FF;text-decoration: underline;float: right;">Click here to Download the Report</a>
		</p>

                    <b>Venue:</b> 5006, CC-3 Building, IIIT Allahabad <br>
                    <b>Time:</b> 6:00 PM - 7:30 PM
			
                </div>


		<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">  IEEE Meeting with Director, R10 (Asia Pacific)  </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#"><sup></sup> 11 December, 2017</a></span>
                </div><br>
                
                                    
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/IEEE_Meeting_R10_Director_11_Dec_ 2016.jpg" alt="Post Image 2" />
                <br>
                <br>
               	<p> A meeting has been scheduled with the members of IEEE SP/C Joint Chapter UP Section and IEEE-SB IIITA Section at 3:00 PM (VH-1, IIIT Allahabad)for exchanging throughts and ideas related to utilizing the benefits provided by IEEE in all aspects. The meeting was headed by the guest Prof. Ramakrishna Kappagantu (Director IEEE Region 10Asia Pacific Region), Prof. Gaurav Sharma, (Professor University of Rochester), Prof U S Tiwary Chariperson, Signal Processing chapter UP Section), Dr. Rajat Kumar Singh (Faculty Counselor, IEEE-SB-IIITA), Dr. Satish Kumar Singh(Faculty Coordinator, IEEE-SB-IIITA). Meeting begins with the introduction uttered by Dr. Sathish Kumar Singh to honored guests. Prof. Ramakrishna Kappagantu as Director  IEEE Region 10 Asia Pacific Region discussed the benefits one can get as being member of IEEE as well as through getting associating with various chapters hosted by IEEE, as a volunteer. <br>
</p>
<p>
<a target="_blank" href="documents/IEEE_Meeting_R10_Director_11_Dec_2016.pdf"><span style="color: #3366FF;text-decoration: underline;float: right;">Click here to Download the Report</a>
		</p>

                    <b>Venue:</b> VH-1, IIIT Allahabad <br>
                    <b>Time:</b> 3:00 PM - 4:00 PM
			
                    <p>

               	
              </div>

		<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">  IEEE Tech Talk by Prof. Gaurav Sharma</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#"><sup></sup> 11 December, 2017</a></span>
                </div><br>
                <b>Venue:</b> Auditorium, IIIT Allahabad <br>
                    
                <br>
               	
              </div>


		
		<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">  IEEE 3rd ExCom Meeting IEEE-SB-IIITA (2016-17)</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#"><sup></sup> 25 November, 2016</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/3rd_ExCOM.bmp" alt="Post Image 2" />
                <br>
                <br>
               	<p> IEEE-SB-IIITA Chairperson Mr. Vinod Kumar Jatav called an executive committee (Ex-Com) meeting on Nov 25th, 2016 (6:00 PM - 7:00 PM) in order to discuss various agendas decided earlier such as organizing CSIS-2017 symposium, Technical Talks etc. The meeting was preceded by the presentations delivered by Ms. Suvidha Tripathi (Chair, WIE Affinity Group) on R10 SYWLC’16 and Mr. Vinod Kumar Jatav (Chair, IEEE-SB-IIITA) on AISYWC’16. In the presentation, they have shared their experience attained during the congresses.<br>
</p>
                    <b>Venue:</b> 5006, CC-3 Building, IIIT Allahabad <br>
                    <b>Time:</b> 7:00 PM - 8:00 PM
			
                    <p>
<a target="_blank" href="documents/MoM_3rd_ExCom_Meeting_STB14321_25-Nov-2016.pdf"><span style="color: #3366FF;text-decoration: underline;float: right;">Click here to Download the Report</a>
		</p>
</div>

		<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> Presentation on IEEE India Council AISYWC'16 </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#"><sup></sup> 25 November, 2016</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/AISYWC16 Group2.jpg" alt="Post Image 2" />
                <br>
                <br>
               	<p> Mr. Vinod Kumar Jatav (Chair, IEEE-SB-IIITA) has given a presentation to IEEE-SB-IIITA team members and active IEEE members from IIIT Allahabad about India Council All India Student Young Professionals WIE congress - 2016 (India Council AISYWC’16).  This year India Council AISYWC’16 was jointly hosted by IEEE India Council, IEEE Rajasthan Subsection and IEEE Delhi Section during 07th-09th October, 2016 at LNMIIIT, Jaipur. In the presentation, he has shared his experience attained during the India Council congress. He has attended Students/Young Professionals track at the congress and was overwhelmed with the interaction of reputed IEEE members from different IEEE sections under India Council. He has guided and encouraged the audience to attend the IEEE congresses or Symposiums to get new ideas from delegates from other sections to enhance the level SB activities.   <br>
</p>
                    <b>Venue:</b> 5006, CC-3 Building, IIIT Allahabad <br>
                    <b>Time:</b> 6:30 PM - 7:00 PM
			
              </div>


                 
                <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> Presentation on IEEE R10 SYWLC’16 </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#"><sup></sup> 25 November, 2016</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/R10 Congress Bangalore.JPG" alt="Post Image 2" />
                <br>
                <br>
               	<p> Ms. Suvidha Tripathi (Chair, WIE Affinity Group) has given a presentation to IEEE-SB-IIITA team members and active IEEE members from IIIT Allahabad about R10 IEEE Student Young Professionals WIE life Member Congress - 2016 (R10 SYWLC’16).  This year R10 SYWLC’16 was hosted by IEEE Bangalore section during 25th-27th August, 2016 at Lalit ashoka Hotel, bangalore. In the presentation, she has shared her experience attained during the congress. She has attended WIE track talks at the congress and was overwhelmed with the interaction of reputed IEEE members from different sections under R10 Asia pacific Region. She has guided and encouraged the audience to attend the IEEE congresses or Symposiums to get new ideas from delegates from other sections to enhance the level SB activities.  <br>
</p>
                    <b>Venue:</b> 5006, CC-3 Building, IIIT Allahabad <br>
                    <b>Time:</b> 6:00 PM - 6:30 PM
			                    
              </div>
		

			<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">  IEEE Panel Discussion on "The Advancement of Humanitarian Technology"</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#"><sup></sup> 06 October, 2016</a></span>
                </div><br>
                
                <br>
               	<p> The IEEE student branch, IIIT Allahabad in association with IEEE SP/C Joint Chapter, Uttar Pradesh section organised a panel discussion on the occasion of IEEE-Day-2016. The Discussion was held in Room No 5055, CC3 building, IIIT-Allahabad at 6:30 pm onwards. The topic for the panel discussion was “The advancement of Humanitarian Technology”. Prof. U.S Tiwary (Chairperson, SP/C Joint Chapter UP Section), Prof. Shekhar Verma (Head of Department IT, IIIT Allahabad), Dr. Rahul Kala (Assistant Professor, IIIT Allahabad) and Dr. Amit Kumar Dhar (Assistant Professor, IIIT Allahabad) were the dignitaries present.  <br>
</p>
                    <b>Venue:</b> 5055, CC-3 Building, IIIT Allahabad <br>
                    <b>Time:</b> 6:30 PM
			
                    <p>
<a target="_blank" href="documents/IEEE_Day_2016_Panel Discussion.pdf"><span style="color: #3366FF;text-decoration: underline;float: right;">Click here to Download the Report</a>
		</p>
                
              </div>			

			<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">  IEEE Day 2016 Celebration at IEEE-SB-IIITA</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#"><sup></sup> 06 October, 2016</a></span>
                </div><br>
                
                <br>
               	<p> The IEEE student branch, IIIT Allahabad in association with IEEE SP/C Joint Chapter, Uttar Pradesh section celebrated IEEE-Day-2016, themed as “Leveraging Humanitarian technology for a better tomorrow”. The event was held in Room No 5055, CC3 building, IIIT-Allahabad at 6 pm onwards. The primary purpose behind the event was to increase awareness about the current technology and its contribution towards the betterment of society. While the world benefits from what’s new, IEEE focuses on what’s next.  
 <br>
</p>
                    <b>Venue:</b> 5055, CC-3 Building, IIIT Allahabad <br>
                    <b>Time:</b> 6:00 PM
			
                    <p>
<a target="_blank" href="documents/IEEE_Day_2016.pdf"><span style="color: #3366FF;text-decoration: underline;float: right;">Click here to Download the Report</a>
		</p>
                
              </div>

			<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">  IEEE 2nd ExCom Meeting IEEE-SB-IIITA (2016-17)</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#"><sup></sup> 26 September, 2016</a></span>
                </div><br>
                
                <br>
               	<p> IEEE-SB IIITA Chairperson Mr. Vinod Kumar Jatav called an executive committee (ExCom) meeting on Sept 26, 2016 in order to discuss various agendas decided earlier such as organizing coding event SYNERGY- 2016, finalize the coordinators/team members and many more. Furthermore, he emphasized that the size of a committee must conform to the structure of total 10 members with combining both coordinators and team members under the supervision of a single chairperson. The committees can’t have more than 3 coordinators. 
 <br>
</p>
                    <b>Venue:</b> 5007, CC-3 Building, IIIT Allahabad <br>
                    <b>Time:</b> 6:00 PM
			
                    <p>
<a target="_blank" href="documents/MoM_2nd_ExCom_Meeting_STB14321_26-Sept-2016.pdf"><span style="color: #3366FF;text-decoration: underline;float: right;">Click here to Download the Report</a>
		</p>
                
              </div>
                	

              	<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">  IEEE Invited Talk by Mr. Siddharth</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">7<sup>th</sup> September 2016</a></span>
                </div><br>
                
                <br>
               	<p> The IEEE-SB-IIITA in association with IEEE SP/C Joint Chapter, Uttar Pradesh
Section organized an invited talk by Mr. Siddharth on 7th September 2016 at 6:00 PM. Mr. Siddharth is an
alumnus of our institute. He received his B.Tech. Degree in ECE stream from IIIT Allahabad in year
2015. Currently he is pursuing graduate studies in University of California, San Diego. There he is
working as a graduate student with Prof. Terry Sejnowski who
is a world authority in Neuroscience and Machine Learning. <br>
</p>
                    <b>Venue:</b> Admin Audi, IIIT Allahabad <br>
			<b>Time:</b> 6:00 PM
                    <p>
<a target="_blank" href="documents/IEEE_Invited_Talk_Mr_Siddharth.pdf"><span style="color: #3366FF;text-decoration: underline;float: right;">Click here to Download the Report</a>

		</p>
                
              </div>

			
			<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Tech-Professional Meeting 2016</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">30<sup>th</sup> August 2016</a></span>
                </div><br>
                
                <br>
               	<p> The  IEEE  student  branch  IIIT  Allahabad called a Tech-Professional  meeting  with Prof.  S. N. Singh,  (Professor, 
Department of Electrical Engineering, IIT, Kanpur). The meeting was held in CC-3 building (Room No 5055),  IIIT Allahabad
at 3:00 PM. The goal of this  meeting  was to  discuss the  various benefits of IEEE  membership to  increase the  active IEEE 
members. The meeting was also focused to motivate all the team members of IEEE Student Branch IIIT-Allahabad and inspire 
them for active participation in several IEEE activities. Dr. Rajat Kumar Singh (Faculty Counselor, IEEE-SB-IIITA) , Office 
Bearers and Committee Co-coordinators were present in the meeting. <br>
</p>
                    <b>Venue:</b> 5055, CC-3 Building, IIIT Allahabad <br>
			<b>Time:</b> 3:00 PM to 4:00 PM 
                    <p>
<a target="_blank" href="documents/IEEE_TechProfessional_Meet_Prof_S_N_Singh.pdf"><span style="color: #3366FF;text-decoration: underline;float: right;">Click here to Download the Report</a>

		</p>
                
              </div>

        		<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Technikwiz 2016</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">21<sup>st</sup> - 28<sup>th</sup> August 2016</a></span>
                </div><br>
                
                <br>
                 	<p>
                    Technikwiz is a quizzing extravaganza that puts the participants quizzing skills to test. 
					</p><p>The IEEE StudentBranch IIIT Allahabad and the IEEE Computer Society Student Chapter IIIT Allahabad will conduct it online as well as offline across India. Two screening rounds will be conducted an online round and a offline round. Four Teams each will be selected from both online and offline rounds and will compete at the live quiz final round at IIIT-Allahabad.Teams would be of 2 students currently pursuing B.Tech/M.Tech.In case of Online round cross-college teams would be allowed.</p>
                    <b>Venue:</b> Auditorium, IIIT Allahabad <br>
		    <b>Time:</b> 2.00 pm to 6.00 pm
					<p>
					<a target="_blank" href="https://ieee.sb.iiita.ac.in/Technikwiz2016/" target="blank"><span style="color: #2222cc;text-decoration: underline;float: right;">Details of the Event</span></a>

                    <br>
					
                    <p>
				<!--	<a target="_blank" href="http://goo.gl/forms/akAXrIqcQGz3prvg2"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to Participate</span></a>  -->

					<a target="_blank" href="documents/IEEE_Technikwiz16.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Press Release Report </a></li>

                    <br>
                    </p>
                
              </div>
			
        		<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Workshop on LaTeX Typesetting</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">13<sup>th</sup> - 14<sup>th</sup> August 2016</a></span>
                </div><br>
                
                <br>
                 	<p>
                    The IEEE Signal Processing /Computer Joint Chapter (Uttar Pradesh) and IEEE Student Branch IIITA are organizing an IEEE workshop over 'LaTeX Typesetting' conducted by Mr. Arun Kant Singh (IIT Kanpur), Assistant Professor, IIIT Allahabad. LaTeX (based on Donald E. Knuth's TeX typesetting language) is a high-quality typesetting system widely used in academia technical writing and presentations in current days. LaTeX encourages the user to focus on the content they put in their documents and not in its design. 
					</p><p>The workshop will be organized on August 13-14, 2016 in IIIT Allahabad campus. On the first day of the workshop, all the basic packages will be installed and an introduction to LaTeX's features will be provided. On the second all the core and advanced topics will be covered, and by the end of this workshop you will be able to create any document using LaTeX.</p><p>If you are interested in attending the workshop, then kindly fill the form at the given link.</p>
                    <b>Venue:</b> 5006, CC-3 Building, IIIT Allahabad <br>
			<b>Time:</b> 11:00 AM - 6:00 PM
					<p>
					<a target="_blank" href="documents/LatexWorkshop.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Details of the Workshop</span></a>

                    <br>
					
                    <p>
					<a target="_blank" href="documents/Final_List_Participants.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">List of Participants</span></a>

                    <br>
                    </p>
                
              </div>
			<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Invited Talk by Prof. Mriganka Sur (MIT)</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">10<sup>th</sup> August, 2016</a></span>
                </div><br>
             <!--   <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="#" alt="Post Image 2" /> 
                <br><br><br> -->
                 	<p>
                     The IEEE-SB-IIITA in association with IEEE SP/C Joint Chapter, Uttar Pradesh Section organized an invited Talk by Prof. Mriganka Sur (MIT). The talk was held in the CC-3 Building Room No. - 5054 on August 10, 2016. Prof. M. Sur has discussed about the research possibilities in NeuroScience. He has emphasized on the innovation and devotion in research work.Prof. M. Sur encouraged the UG students to join higher studies to acquire depth knowledge in the area of their interest. 
					</p>
                    <b>Venue:</b> 5055, CC-3 Building, IIIT Allahabad <br>
		    <b>Time:</b> 2:30 PM 
                    <br>
		    <p>
					<a target="_blank" href="documents/IEEE_Invited_Talk_by_Prof_Mriganka.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>

                    </p>

		<br><br>
                
              </div>

		<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE 1st ExCom Meeting IEEE-SB-IIITA (2016-17)</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">04<sup>th</sup> August 2016</a></span>
                </div><br>
                
                <br>
               	<p> IEEE  SB  IIITA  Chairperson  Mr.  Vinod  Kumar  Jatav  called  an  executive  committee  (ExCom)
meeting  on  August  04,  2016  for the  appointment  of  Chairperson  Membership  Committee,  Chairperson
IEEE Women in Engineering (WIE) Affinity Group  for the session 2016-17, and to monitor the progress 
of forthcoming events organized by the branch.
Branch chair Mr. Vinod Kumar Jatav explained the roles and responsibilities  of office bearers to 
the students. He emphasized that any elected student should have the IEEE Student Membership and can be recalled at any time if found inactive.<br>
</p>
                    
			<b>Venue:</b> 5055, CC-3 Building, IIIT Allahabad <br>
			<b>Time:</b> 6.00 pm to 7.00 pm 
                    <br>
                    <p>
<a target="_blank" href="documents/MoM_ExCom_Meeting_STB14321_04-Aug-2016.pdf"><span style="color: #3366FF;text-decoration: underline;float: right;">Click here to Read More...</a>

		</p>
                
              </div>


			<h3 style="font-weight:800; font-size: 20px; background-color:#bbbdef"> Session (2015-16)</h3>
              <div>
                <div class="post_meta">
                    
                </div><br>
                
                <br>
               	                
              </div>

			<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Poster Presentation on Humanitarian Technology </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">06<sup>th</sup> October 2015</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/IEEE_Poster_Presentation.JPG" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                     The much awaited ‘Poster Presentation’ event was organized by IEEE Student Branch, IIIT Allahabad on the IEEE Day, 06-October-2015. The theme for the event was ‘Humanitarian Technology’. The event witnessed a huge participation from UG, PG, and Ph.D. students.
					</p>
                    <div class = "imp">Venue:</div> 5055, CV Raman Bhavan, IIIT Allahabad
					<div class = "imp">Time:</div> 6.00 pm to 9.00 pm
                    <p>
					<a target="_blank" href="documents/IEEE_PosterPresentation_2015.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                    </p>
                
              </div>
			<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Tech Talk by Dr. Alok Kanti Deb </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">03<sup>rd</sup> October 2015</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/IEEE_technical_talk_ak_deb.JPG" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                     The IEEE-SB-IIITA in association with IEEE SP/C Joint Chapter, Uttar Pradesh Section organized a Tech Talk (guest lecture) by Dr. Alok Kanti Deb. The talk was held in the Institute Admin Auditorium on October 03, 2015 at 5:00 PM. Dr. A.K. Deb talked about Support Vector Machines and its Applications.
					</p>
                    <div class = "imp">Venue:</div> Admin Auditorium, IIIT Allahabad
					<div class = "imp">Time:</div> 5.00 pm to 6.00 pm
                    <p>
					<a target="_blank" href="documents/IEEE_technical_talk_ak_deb.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                    </p>
                
              </div>
			<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Tech Talk by Dr. Steven Pearce </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">05<sup>th</sup> September 2015</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/IEEE_Tech_Talk_steven_pearce.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                     The IEEE-SB-IIITA organized a Tech Talk (guest lecture) by Dr. Steven Pearce from the School of Computing Science, Simon Fraser University, British Columbia, Canada. The talk was held in the Institute Auditorium on September 05, 2015 at 5:00 PM. Dr. Steven addressed The Relationship of Contemporary Information Technology to Privacy.
					</p>

                    <div class = "imp">Venue:</div> Admin Auditorium, IIIT Allahabad
					<div class = "imp">Time:</div> 5.00 pm to 6.00 pm
                    <p>
					<a target="_blank" href="documents/IEEE_Tech_Talk_steven_pearce.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                    </p>
                
              </div>
			<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Women In Engineering (WIE) Awareness Program </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">31<sup>st</sup> August 2015</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/IEEE_WIE_Awareness.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                     Meeting for the awareness of the IEEE Women In Engineering (WIE) Affinity Group of IEEE-SB-IIITA as well as for the selection of its interim office bearers. This was the first meeting to start such group in IIIT Allahabad. The IEEE-SB IIIT Allahabad branch chair Mr. Vijay Bhaskar Semwal gave a presentation on the role and responsibilities of office bearers to be elected. It was followed by a brief introductory speech by the branch secretary Mr. Shiv Ram Dubey. The new Office bearers were elected for the foundation of the IEEE WIE Affinity Group and the elected members will also serve for the 2015-2016 session. The newly elected chair of WIE affinity group Ms. Monika Rani addressed the members. The meeting ends with group photo. The meeting was very motivational for IEEE-SB-IIITA as many students took part in.
					</p>

                    <div class = "imp">Venue:</div> CC3, IIIT Allahabad
					<div class = "imp">Time:</div> 6.00 pm to 7.30 pm
                    <p>
					<a target="_blank" href="documents/IEEE_WIE_Awareness.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
					<br>
                    </p>
              </div>
			<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> Mentors and Coordinators for Industry Interface Committee</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">28<sup>th</sup> August 2015</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/MoM_28_08_2015.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                     The meeting has been conducted on August 28, 2015 regarding the selection of the “Mentor for Industry Interface Committee” and “Coordinators for each committee” of IEEE-SB-IIITA. The process was started by an address speech of the branch chair Mr. Vijay Bhaskar Semwal. The IEEE-SB-IIITA team selected the students for the above mentioned positions on the basis of a short interview. It was also decided in this meeting to form an IEEE Women In Engineering (WIE) Affinity Group under the IEEE-SB-IIITA. The meeting was very motivational for IEEE-SB-IIITA as many students took part in meeting, as result meeting turned out to be a huge success.
					</p>

                    <div class = "imp">Venue:</div> CC3, IIIT-Allahabad
					<div class = "imp">Time:</div> 6.00 pm to 7.30 pm
                    <p>
					<a target="_blank" href="documents/MoM_28-08-2015.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                   </p>
                
              </div>
			
			<h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> Meeting with New Members of IEEE SB IIITA    </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">26<sup>th</sup> August 2015</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/MoM_26-08-2015.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                     The meeting has been conducted on August 26, 2015 regarding the revamping of Office Bearers, Mentors and Coordinators of different committees of IEEE Student Branch IIIT Allahabad. The branch chair Mr. Avinash Kumar Singh dissolved all the existing committees. The new members of the Office bearer, mentor, and coordinator are elected for the 2015-2016 session. All the present members congratulated Mr. Avinash Kumar Singh for pre submission defense of his PhD and given a farewell to him. Mr. Avinash Kumar Singh motivated the new members of IEEE-SB-IIITA and shared his valuable views. The meeting ends with group photo. The meeting was very motivational for IEEE-SB-IIITA as many students took part in meeting, as result meeting turned out to be a huge success.
					</p>

                    <div class = "imp">Venue:</div> CC3, IIIT-Allahabad
					<div class = "imp">Time:</div> 1.00 pm to 2.30 pm
                    <p>
					<a target="_blank" href="documents/MoM_26-08-2015.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                   </p>
                
              </div>
              <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Annual Technikwiz 2015  </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">22<sup>nd</sup> August 2015</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/Technikwiz_2015.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                     The final round of IEEE Annual Technikwiz 2015 was held on 22nd August 2015.
					</p>

                    <div class = "imp">Venue:</div> Auditorium, IIIT-Allahabad
					<div class = "imp">Time:</div> 3.00 pm to 6.00 pm
                    <p>
					<a target="_blank" href="documents/Technikwiz_2015.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report 1</span></a>
                    <p>
					<a target="_blank" href="documents/Technikwiz_2015_2.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report 2</span></a>
                    <br>
                   </p>                
              </div>
              <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Awareness to Newly Admitted Students 2015  </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">10<sup>th</sup> August 2015</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/IEEE_Awareness_to_new_comers.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                     The IEEE-SB-IIITA organized an IEEE awareness program for newly admitted students in the institute. The chairperson of IEEE SB IIIITA Mr. Avinash Kumar Singh started the program by introducing the Office Bearers first and then explained the organization of IEEE SB IIITA in respect to its functioning, structure, committees and etc.
					</p>
                    <div class = "imp">Venue:</div> 5006, CC3, IIIT-Allahabad
					<div class = "imp">Time:</div> 1.00 pm to 1.30 pm
                    <p>
					<a target="_blank" href="documents/IEEE_Awareness_to_new_comers.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                   </p>
              </div>

			<h3 style="font-weight:800; font-size: 20px; background-color:#bbbdef"> Session (2014-15)</h3>
              <div>
                <div class="post_meta">
                    
                </div><br>
                
                <br>
               	                
              </div>




			  <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> Talk on Vision-Controlled Micro Flying Robots by Prof Davide Scaramuzza  </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">18<sup>th</sup> March 2015</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/IMG_20150319_112312.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                     Renowned Robotics specialist, Prof Davide Scaramuzza from the university of Zurich, Switzerland visited Indian Institute of Information Technology , Allahabad during 18-19, March, 2015 . He gave an overview of his research activities on visual navigation of MAVs, from slow navigation (using standard frame-based cameras) to agile flight (using event-based cameras). This was first technical event under the umbrella of IEEE Robotics and Automation society held in IIITA
					</p>

                    <div class = "imp">Venue:</div> Auditorium, IIIT-Allahabad
					<div class = "imp">Time:</div> 6.00 pm to 7.30 pm
                    <p>
					<a target="_blank" href="documents/Report_on_talk_by_Davide_Scaramuzza.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                   </p>
                
              </div>
			  <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Technical Quiz </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">8<sup>th</sup>-9<sup>th</sup> November 2014</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/TechnicalQuiz.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                		Technical quiz was successfully organized by IEEE Students Branch IIIT Allahabad with the approval of the IEEE Uttar Pradesh section. The event was initiated with the call for participation at November 5th 2014. The main aim of this event was to provide a platform for all students to showcase their technical talent with the global visibility. Students were required to register as a team with the size of maximum two members per team or solo as per individual choice. A total of 165 teams participated in the first day of quiz on November 8th 2014
					</p>

					<p>
						The quiz was started with a motivating presentation consisting of the benefits of IEEE Student membership which was presented by branch office bearers and mentors to extend the awareness within the student community. First round of quiz was consisting of the various types of written multiple choice questions from the area of logical reasoning, coding (C), IEEE, Electronics and General Sciences.
                	</p>
                    <div class = "imp">Venue:</div> CC-3, IIIT-Allahabad
                    <p>
					<a target="_blank" href="documents/Report_TechQuiz.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                </p>
                
              </div>
			  
			  <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">5<sup>th</sup> IEEE Executive Committee Meeting </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">2<sup>nd</sup> November 2014</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/Excom_meeting_2Nov2014.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                		The 5<sup>th</sup> Executive committee meeting of the IEEE Uttar Pradesh Section was hosted by IEEE Students Branch, Indian Institute of Information Technology - Allahabad on 2<sup>nd</sup> November 2014. The meeting began with the welcome note, delivered by Dr. S.N. Singh (Chairperson, IEEE Uttar Pradesh Section). Various other betterment plans along with the goals related to IEEE Uttar Pradesh Section were the key issues of the part of discussion.
					</p>

                    <div class = "imp">Venue:</div> Board Room, IIIT-Allahabad
                    <p>
					<a target="_blank" href="documents/IEEE_ExCom_2_NOV_2014.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                </p>
                
              </div>
			  <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Sponsored Leadership Workshop </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">1<sup>st</sup> November 2014</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/IEEELeadershipWorkshop.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                		Indian Institute of Information Technology Allahabad organized a one day IEEE Sponsored Leadership Workshop. The workshop was coordinated by Dr. Satish Kumar Singh, IIIT Allahabad and sponsored by IEEE Uttar Pradesh Section. This type of event is first time conducted by the section. About 100 participants including IEEE Student branch office bearer and faculty counsellors from Uttar Pradesh section were registered and attended the workshop.
					</p>

					<p>
						The workshop started with the welcome address by Prof. Somenath Biswas (Director, IIIT Allahabad) followed by lamp lighting and bucket presentation to invited speakers and guests. Dr. S. N. Singh (Chairperson IEEE UP Section) IITK, Dr. S. C. Srivastava (Executive Committee Member, IEEE UP Section) IITK, Dr. Dilip K Sharma (Joint Sec. IEEE UP Section) Dr. G.C. Nandi IIITA, Dr. U.S. Tiwary IIITA, Dr. Madhvendra Mishra IIITA were in the list of few eminent invited resource persons.                 	</p>
                    <div class = "imp">Venue:</div> Main Auditorium, IIIT-Allahabad
                    <p>
					<a href="leadership/leadershipindex.html"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to go to the gallery</span></a><br></p>
					<p>
					<a target="_blank" href="documents/IEEELeadershipWorkshop_1Nov2014.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                </p>
                
              </div>
              <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> Meeting with the Chairperson, IEEE UP Section</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">15<sup>th</sup> October, 2014</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/14.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                		Chairperson of IEEE UP section, Dr. S.N. Singh (IIT Kanpur) visited Indian Institute of Information Technology Allahabad and extolled students for their efforts. He briefed students about IEEE and encouraged them to be part of our society. He apprised about benefits and opportunities students can get over IEEE platform. He also motivated the IEEE Student Branch IIITA for holding the similar events in future
					</p>

					<p>
						He then conducted a small summit with Dr. S.K Singh (Coordinator, IEEE Student Branch, IIIT-Allahabad) and all the office bearers including the chair, co-chair, secretary and treasurer and other active members of IEEE Student Branch IIIT-Allahabad.  Dr. Pavan Chkraborty was the special invitee during the meeting and event. Professor S. N. Singh had a brief discussion on the upcoming IEEE Leadership workshop and IEEE Executive Committee Meeting to be held during 1-2 Nov. 2014, in IIIT Allahabad. the meeting ended up with the few group photographs
                	</p>
                    <div class = "imp">Venue:</div> CC-3, IIIT-Allahabad
                    <p>
					<a target="_blank" href="documents/Report_15_10_2014_1.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                </p>
                
              </div>

              <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">Project Carnival</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">15<sup>th</sup> October, 2014</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/04.jpg" alt="Post Image 2" />
                <br><br><br>
                <p>
                    The <b>IEEE Student Branch</b> and <b>Tesla, The Electronics Society, Indian Institute of Information Technology, Allahabad</b> jointly organized the institute level project competition named as “PROJECT CARNIVAL”. 
				</p>

                <p>
                	Around 20 teams (including the students from B.Tech., Electronics and Communication Engineering, Information Technology and Biomedical Engineering form all the years) were registered for the event. Mostly the project were some working, demonstrating hardware models solving problems from various domains. The students actively participated and showcased their models, as result event turned out to be a huge success. The technical merit of the projects/models were judged by Dr. Satish Kumar Singh and Dr. Manish Goswami. The winners were announced on the basis of judging and were awarded the certificates on 2nd Nov 2014
                    <div class = "imp">Venue:</div> CC-3, IIIT-Allahabad
                    <a href="gallery/"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to go to the gallery</span></a>
					<br>
					<a target="_blank" href="documents/Report_15_10_2014_2.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the full report</span></a>
                    <br>
                </p>
                
              </div>


		<!--
		* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
		* This notice MUST stay intact for legal use
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		-->
            </div>
        </div> <!-- END of templatemo_content -->
       
		<div class="clear"></div>
    </div> <!-- END of templatemo_main_content -->
    <br>
   <div id="templatemo_footer">
			Copyright © 2014, IEEE-SB-IIITA (Web: ieee.sb.iiita.ac.in; Email: ieee.sb@iiita.ac.in)
	    </div> <!-- END of templatemo_footer -->
</div> <!-- END of templatemo_wrapper -->
</body>


</html>
