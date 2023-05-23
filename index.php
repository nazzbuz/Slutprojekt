<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- External Stylesheets -->
    <link rel="stylesheet" href="port.css?v=<?php echo time();?>">
    <!-- External Font Icon Library -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Portfolio</title>
    <!-- External JavaScript Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <video src="img/Pexels Videos 2040063.mp4" autoplay loop playsinline muted></video>

    <!-- HEADER -->
    <header class="header">
        <nav class="nav new-grid">
            <div>
                <a href="#hem" class="logo"><img src="img/NJN.png" alt=""></a>
            </div>
            <div class="menu-toggle" id="menu-toggle">
                <!-- Mobile Menu -->
                <div id="mySidenav" class="sidenav">
                    <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="menu-stuff">
                        <a href="#about" onclick="closeNav()">About</a>
                        <a href="#skills" onclick="closeNav()">Skills</a>
                        <a href="#work" onclick="closeNav()">Work</a>
                        <a href="#contact" onclick="closeNav()">Contact</a>
                        <a href="logout.php" style="color: brown;">Log Out</a>
                    </div>
                </div>
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            </div>
            <!-- Desktop Menu -->
            <ul class="menu" id="menu">
                <li class="menu-item"><a href="#about" class="menu-link">About</a></li>
                <li class="menu-item"><a href="#skills" class="menu-link">Skills</a></li>
                <li class="menu-item"><a href="#work" class="menu-link">Work</a></li>
                <li class="menu-item"><a href="#" class="menu-link" id="mbtn" class="btn btn-primary turned-button">Contact</a></li>
                <li class="menu-item"><a href="logout.php" class="menu-link" style="color:brown;">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <main class="l-main">
        <!-- HOME -->
        <section class="hem-container new-grid" id="hem">
            <div class="hem-data">
                <h1 class="hem-title">Hi,<br> <?php echo $user_data['user_name']; ?> <br> Welcome to <br> <span class="hem-title-color">Nasser Jemal's</span> Portfolio</h1>
                <a href="#about" class="button">About Me</a>
            </div>
            <div class="hem-social">
                <!-- Social Icons -->
                <a href="https://www.facebook.com/" class="hem-social-icon"><i class='bx bxl-facebook'></i></a>
                <a href="https://www.instagram.com/" class="hem-social-icon"><i class='bx bxl-instagram'></i></a>
                <a href="https://github.com/" class="hem-social-icon"><i class='bx bxl-github'></i></a>
            </div>
        </section>
              
        <!-- Modal Dialog -->
        <div id="modalDialog" class="modal">
          <div class="modal-content animate-top">
            <div class="modal-header">
              <h5 class="modal-title">Contact Us</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form method="post">
              <div class="modal-body">
                <!-- Contact form -->
                <div class="form-group">
                  <label>Name:</label>
                  <input type="text" class="form-control" placeholder="Enter your name" required="">
                </div>
                <div class="form-group">
                  <label>Email:</label>
                  <input type="email" class="form-control" placeholder="Enter your email" required="">
                </div>
                <div class="form-group">
                  <label>Message:</label>
                  <textarea class="form-control" placeholder="Your message here" rows="6"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <!-- Submit button -->
                <button class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>

        <!-- About Section -->
        <section class="section about" id="about">
          <h2 class="section-title">About</h2>
          <div class="about-container new-grid">
            <div class="about-image">
              <img src="img/DALL·E 2023-05-01 15.59.08 - the king on mars.png" alt="">
            </div>
            <div class="about-content">
              <h2 class="about-subtitle">Nasser Jemal Nasser</h2>
              <p class="about-text">
                Hello and welcome to my About Me section! My name is Nasser Jemal, and I am currently a second-year student studying at NTI Gymnasiet. I have a strong passion for technology and I am specifically interested in web development. My goal is to gain the skills and knowledge needed to build and understand websites, with the aim of one day pursuing a career in this field. <br> <br>
                I believe that hard work and dedication are the keys to success, and I am committed to achieving my goals. Thank you for taking the time to read my About Me section, and feel free to contact me if you have any questions or would like to connect!
              </p>
            </div>
          </div>
        </section>
            <!-- Skill Section -->
            <section class="section skills" id="skills">
              <div class="skills-container">
                <h2 class="section-title">Skills</h2>
                <div class="skills-grid">
                  <!-- Skill: HTML5 -->
                  <div class="skill">
                    <div class="skill-header">
                      <i class="bx bxl-html5 skill-icon"></i>
                      <span class="skill-name">HTML5</span>
                      <div class="skill-percentage">50%</div>
                    </div>
                    <div class="skill-bar skill-html"></div>
                  </div>
                  <!-- Skill: CSS -->
                  <div class="skill">
                    <div class="skill-header">
                      <i class="bx bxl-css3 skill-icon"></i>
                      <span class="skill-name">CSS</span>
                      <div class="skill-percentage">30%</div>
                    </div>
                    <div class="skill-bar skill-css"></div>
                  </div>
                  <!-- Skill: JavaScript -->
                  <div class="skill">
                    <div class="skill-header">
                      <i class="bx bxl-javascript skill-icon"></i>
                      <span class="skill-name">JavaScript</span>
                      <div class="skill-percentage">5%</div>
                    </div>
                    <div class="skill-bar skill-js"></div>
                  </div>
                  <!-- Skill: PHP -->
                  <div class="skill">
                    <div class="skill-header">
                      <i class="bx bxs-paint skill-icon"></i>
                      <span class="skill-name">PHP</span>
                      <div class="skill-percentage">5%</div>
                    </div>
                    <div class="skill-bar skill-php"></div>
                  </div>
                </div>
              </div>
            </section>

            <!-- Work Section -->
            <section class="work-section section" id="work">
              <h2 class="section-title">Work</h2>
            
              <div class="work-container new-grid">
                <!-- Work Item 1 -->
                <div class="work-item">
				<img src="img/Skärmbild 2023-05-17 190525.png" alt="">
                  <div class="work-item-overlay">
                    <h3 class="work-item-title">Project 1</h3>
                    <div class="work-item-buttons">
					<a href="https://nazzbuz.github.io/podcast-allan/" class="button">View Project</a>
                      <a href="https://github.com/nazzbuz/podcast-allan" class="button button--secondary">Learn More</a>
                    </div>
                  </div>
                </div>
            
                <!-- Work Item 2 -->
                <div class="work-item">
                  <img src="img/alex-suprun-A53o1drQS2k-unsplash.jpg" alt="">
                  <div class="work-item-overlay">
                    <h3 class="work-item-title">Project 2</h3>
                    <div class="work-item-buttons">
                      <a href="WebUtvecling/car.html" class="button">View Project</a>
                      <a href="#" class="button button--secondary">Learn More</a>
                    </div>
                  </div>
                </div>
            
                <!-- Work Item 3 -->
                <div class="work-item">
                  <img src="img/laurent-perren-NeH9w4CdmnA-unsplash (1).jpg" alt="">
                  <div class="work-item-overlay">
                    <h3 class="work-item-title">Project 3</h3>
                    <div class="work-item-buttons">
                      <a href="#" class="button">View Project</a>
                      <a href="#" class="button button--secondary">Learn More</a>
                    </div>
                  </div>
                </div>
            
                <!-- Work Item 4 -->
                <div class="work-item">
                  <img src="img/shannon-potter-bHlZX1D4I8g-unsplash.jpg" alt="">
                  <div class="work-item-overlay">
                    <h3 class="work-item-title">Project 4</h3>
                    <div class="work-item-buttons">
                      <a href="#" class="button">View Project</a>
                      <a href="#" class="button button--secondary">Learn More</a>
                    </div>
                  </div>
                </div>
            
                <!-- Work Item 5 -->
                <div class="work-item">
                  <img src="img/mitya-ivanov-G5HkBfwOths-unsplash.jpg" alt="" style>
                  <div class="work-item-overlay">
                    <h3 class="work-item-title">Project 5</h3>
                    <div class="work-item-buttons">
                      <a href="qr/qr.html" class="button">View Project</a>
                      <a href="#" class="button button--secondary">Learn More</a>
                    </div>
                  </div>
                </div>
            
                <!-- Work Item 6 -->
                <div class="work-item">
                  <img src="img/Skärmbild.jpg" alt="">
                  <div class="work-item-overlay">
                    <h3 class="work-item-title">Comming Soon</h3>
                    <div class="work-item-buttons">
                      <a href="#" class="button">View Project</a>
                      <a href="#" class="button button--secondary">Learn More</a>
                    </div>
                  </div>
                </div>
              </div>
                
              <!-- Footer Part -->
              <footer class="footer">
                <p class="footer-title">I HOPE YOU ENJOYED</p>
                <div class="footer-social">
                  <a href="https://www.facebook.com/" class="footer-icon"><i class='bx bxl-facebook'></i></a>
                  <a href="https://www.instagram.com/" class="footer-icon"><i class='bx bxl-instagram'></i></a>
                  <a href="https://github.com/" class="footer-icon"><i class='bx bxl-github'></i></a>
                </div>
                <p>Feel free to contact me via the contact button on the nav bar above</p>
              </footer>
              
            </section>
      </main>
        <script src="port.js"></script>
    </body>
</html>
