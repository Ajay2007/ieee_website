<?php
	require_once("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/ieee_merge.ico" />
<title>Member Affiliation - IEEE SB IIIT Allahabad</title>
<meta name="keywords" content="IEEE, IIITA, IIIT Allahabad, IEEE Students Branch, Engineering" />
<meta name="description" content="Official Page of IEEE Students Branch of IIIT Allahabad." />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.7.2.min.js" ></script>

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 
<script type="text/JavaScript" src="js/table.js"></script> 
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

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
			<h3>IEEE Members</h3>
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
                
		<h3 style="text-align:center; font-weight: 900">Affiliated IEEE Members</h3><br>


		<table border="1">
		<th>Sr.No</th>
	        <th>Name</th>
	        <th>Member Type</th>
	        <th>Email ID</th>
	        <th>Member ID</th>
			<tbody id = "tableData"></tbody>
		</table>
		<script type="text/javascript">func(1); </script>
		<!-- Buttons for table navigation -->
		<br/>
	    <button onclick="func(1)">1</button>
	    <button onclick="func(2)">2</button>
	    <button onclick="func(3)">3</button>
	    <button onclick="func(4)">4</button>
	    
    </div> <!-- END of templatemo_main_content -->
    <div id="templatemo_footer">
			Copyright © 2014 <a href = "http://www.iiita.ac.in" target = "_blank" style="font-size: 110%; color: #0c0cff; text-decoration: underline;">IIIT Allahabad</a>
	    </div> <!-- END of templatemo_footer -->
</div> <!-- END of templatemo_wrapper -->
</body>

</html>
