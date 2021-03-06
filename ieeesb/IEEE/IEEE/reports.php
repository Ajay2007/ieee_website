<?php
	require_once("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/ieee_merge.ico" />
	<title>Reports - IEEE SB IIIT Allahabad</title>
	
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
              <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> Reports </h3>
              <div>
                <br> 
                <br>
                    
                    <p>
					<ul style = "list-style-type:square">
<b>Session 2017-18</b><br>

					<li><a target="_blank" href="documents/IEEE_Invited_Talk_Prof.PK.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">01/05/2017 Talk/seminar on “Data Science for Security & Privacy”</a></li><br><br>

					<li><a target="_blank" href="documents/Minutes_of_2nd_Ex-Com_Meeting_of_IEEE-SB-IIITA_Session_2017-2018.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">30/03/2017 Minutes of 2nd Ex-Com Meeting of IEEE-SB-IIITA Session 2017- 2018</a></li><br><br>

					<li><a target="_blank" href="documents/MoM_ExCom_Meeting_IEEE-SB-IIITA_21_Feb_2017.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">21/02/2017 Minutes of Meeting : 1st ExCom Meeting of IEEE-SB-IIITA for session 2017-18</a></li><br><br>				

					<li><a target="_blank" href="documents/List_Members_IEEE_SB_IIITA 2017-18.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">16/01/2017 List of IEEE-SB-IIITA Team Members for session 2017-2018</a></li><br>


<b>Session 2016-17</b><br>
					
					<li><a target="_blank" href="documents/IEEE_AGM_IEEE_SB_IIITA_Jan_2017.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">13/01/2017 IEEE Annual General Meeting (AGM) - 2017 for session 2016-17</a></li><br>
					
					<li><a target="_blank" href="documents/List_Members_IEEE_SB_IIITA_Final 2016-17.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">11/01/2017 Final List of IEEE-SB-IIITA Team Members for session 2016-2017</a></li><br>

<li><a target="_blank" href="documents/IEEE_Meeting_R10_Director_11_Dec_2016.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">11/12/2016 IEEE Meeting with Director, IEEE R10 (Asia Pacific Region)</a></li><br>
					
					<li><a target="_blank" href="documents/MoM_3rd_ExCom_Meeting_STB14321_25-Nov-2016.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">25/11/2016 Minutes of Meeting : 3rd ExCom Meeting of IEEE-SB-IIITA for session 2016-17</a></li><br><br>

					<li><a target="_blank" href="documents/IEEE_Day_2016_Panel Discussion.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">06/10/2016 Panel Discussion on The advancement of Humanitarian Technology</a></li><br>

					<li><a target="_blank" href="documents/IEEE_Day_2016.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">06/10/2016 IEEE Day 2016 Celebration at IEEE-SB-IIITA </a></li><br>

					<li><a target="_blank" href="documents/MoM_2nd_ExCom_Meeting_STB14321_26-Sept-2016.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">26/09/2016 Minutes of Meeting : 2nd ExCom Meeting of IEEE-SB-IIITA for session 2016-17</a></li><br>

					<li><a target="_blank" href="documents/IEEE_Invited_Talk_Mr_Siddharth.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">07/09/2016 IEEE Invited Talk by Mr. Siddharth</a></li><br>

					<li><a target="_blank" href="documents/IEEE_TechProfessional_Meet_Prof_S_N_Singh.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">30/08/2016 IEEE Tech-Professional meeting with Prof S.N. Singh (IIT, KAnpur)</a></li><br>

					
					<li><a target="_blank" href="documents/IEEE_Technikwiz_2016.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">28/08/2016 IEEE Technikwiz 2016</a></li><br>
					<li><a target="_blank" href="documents/IEEE_Latex_Workshop_2016.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">14/08/2016 IEEE LaTex Workshop 2016</a></li><br>
					<li><a target="_blank" href="documents/IEEE_Invited_Talk_Prof_M_Sur.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">10/08/2016 IEEE Invited Talk by Prof. Mriganka Sur (MIT)</a></li><br>
					<li><a target="_blank" href="documents/MoM_ExCom_Meeting_STB14321_04-Aug-2016.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">04/08/2016 Minutes of Meeting : 1st ExCom Meeting of IEEE-SB-IIITA for session 2016-17</a></li><br><br>
					<li><a target="_blank" href="documents/office bearers.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">17/05/2016 Appoint of New Office Bearers of IEEE Student Branch</a></li><br> 


<b>Session 2015-16</b><br>
					<li><a target="_blank" href="documents/IEEE_PosterPresentation_2015.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">06/10/2015 IEEE Poster Presentation on Humanitarian Technology - 2015 </a></li><br>					
					<li><a target="_blank" href="documents/IEEE_technical_talk_ak_deb.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">03/10/2015 IEEE Tech Talk by Dr. Alok Kanti Deb </a></li><br>					
					<li><a target="_blank" href="documents/Reports_14-09-2015.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">14/09/2015 Minutes of Meeting </a></li><br>					
					<li><a target="_blank" href="documents/inauguration.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">11/09/2015 Inauguration of IEEE SB IIITA office </a></li><br>					
					<li><a target="_blank" href="documents/list_of_members_of_ieee_sb_iiita_(2015_16).pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">05/09/2015 The List of Members of IEEE Student Branch for 2015-2016</a></li><br>
					<li><a target="_blank" href="documents/IEEE_Tech_Talk_steven_pearce.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">05/09/2015 IEEE Tech Talk by Dr. Steven Pearce</a></li><br>
					<li><a target="_blank" href="documents/IEEE_WIE_Awareness.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">31/08/2015 IEEE Women In Engineering (WIE) Awareness Committee Formation</a></li><br>
					<li><a target="_blank" href="documents/MoM_28-08-2015.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">28/08/2015 Minutes of Meeting</a></li><br>
					<li><a target="_blank" href="documents/MoM_26-08-2015.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">26/08/2015 Minutes of Meeting</a></li><br>
					<li><a target="_blank" href="documents/Technikwiz_2015_2.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">22/08/2015 IEEE Annual Technikwiz IIIT Allahabad - Report 2 </li><br>
					<li><a target="_blank" href="documents/Technikwiz_2015.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">22/08/2015 IEEE Annual Technikwiz IIIT Allahabad - Report 1 </li><br>
					<li><a target="_blank" href="documents/IEEE_Awareness_to_new_comers.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">10/08/2015 IEEE Awareness Program 2015 to new students</li><br> 


<b>Session 2014-15</b><br>
					<li><a target="_blank" href="documents/Report_on_talk_by_Davide_Scaramuzza.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">18/03/2015 Report on talk by Davide Scaramuzza IIIT Allahabad</li><br>
					<li><a target="_blank" href="documents/Report_TechQuiz.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">08/11/2014 IEEE Technical Quiz - 8<sup>th</sup> November 2014, IIIT Allahabad</li><br>
					<li><a target="_blank" href="documents/IEEE_ExCom_2_NOV_2014.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">02/11/2014 5<sup>th</sup> IEEE Executive Committee Meeting IIIT Allahabad </li><br>
					<li><a target="_blank" href="documents/IEEE_Leadership_Workshop_1_NOV_2014.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">01/11/2014 IEEE Sponsored Leadership Workshop IIIT Allahabad </li><br>
					<li><a target="_blank" href="documents/Report_15_10_2014_1.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">15/10/2014 Meeting with IEEE UP Section Chairperson</a></li><br>
                   	<li><a target="_blank" href="documents/Report_15_10_2014_2.pdf"><span style="color:#3366FF;text-decoration: underline;float: left;">15/10/2014 PROJECT CARNIVAL</a></li><br>
					<li><a target="_blank" href="documents/MoM_28_10_2014.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">05/10/2014 Minutes of Meeting</a><br>
					</li>
                    
					</ul>
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
			Copyright \A9 2014, IEEE Student Branch IIIT Allahabad (Web: ieee.sb.iiita.ac.in; Email: ieee.sb@iiita.ac.in)
	    </div> <!-- END of templatemo_footer -->
</div> <!-- END of templatemo_wrapper -->
</body>


</html>
