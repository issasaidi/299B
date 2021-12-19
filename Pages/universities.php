<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/MainStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/NavBar.css">
    <link rel="stylesheet" type="text/css" href="../css/SideMenu.css">
    <link rel="stylesheet" type="text/css" href="../css/MainContent.css">
    <link rel="stylesheet" type="text/css" href="../css/Search.css">
    <link rel="stylesheet" type="text/css" href="../css/Login.css">
    <link rel="stylesheet" type="text/css" href="../css/dropDown.css">
    <link rel="stylesheet" href="../css/unis.css">
    <script src="../js/SideBar.js" defer></script>
    <script src="../js/Login.js" defer></script>
    <script src="../js/dropDown.js" defer></script>
    <title>Getting Started</title>
</head>
<body>
    <!--- NavBar --->
    <div id="NavBar">
        <div id="SideButton"><img src="../images/icons/menu_black.png" alt=""/></div>
        <div id="logo"><a href="home.html">Home</a></div>
        <button onclick="Register()">Register</button>
        <button onclick="ShowLogin()">Login</button>
    </div>

    <!--- SideMenu --->
    <div id="SideMenu">
        <ul>
            <li class="dropDown"><a href="../index.html">Home</a></li>
            <li class="dropDown"><a href="./profile.html">Profile</a></li>
            <li class="dropDown"><a href="">About Us</a></li>
            <li class="dropDown"><a href="./universities.php">Universities</a></li>
        </ul>
    </div>

    <!--- Main Content --->
    <div id="MainContent">
        <form id="searchDiv" method="GET" action="universities.php">
            <input type="search" name="searchQ" placeholder="Search" class="searchInput">
            <input type="image" value="submit" src="../images/icons/search-img-W.png">
        </form>
        <form class="form" method="GET" action="universities.php">
            <div class="form__group" id="contain">
                <div>
                    <label for="country">Countries</label>
                    <select id="country" name="country" data-dropdown>
                      <option value="">Please select a country</option>
                      <option value="Lebanon">Lebanon</option>
                      <option value="Germany">Germany</option>
                      <option value="Algeria">Algeria</option>
                      <option value="Qatar">Qatar</option>
                      <option value="Norway">Norway</option>
                      <option value="United Kingdom">United Kingdom</option>
                      <option value="United States">United States</option>
                      <option value="Turkey">Turkey</option>
                      <option value="France">France</option>
                      <option value="Sweden">Sweden</option>
                      <option value="Spain">Spain</option>
                      <option value="Australia">Australia</option>
                  </select>
                </div>
                
                    <div>
                        <label for="major">Majors</label>
                        <select name="major" id="major" data-dropdown>
                        <option value="">Please select a major</option>
                        <option value="Agribusiness">Agribusiness</option>
                        <option value="Agriculture">Agriculture</option>
                        <option value="Agricultural Economics">Agricultural Economics</option>
                        <option value="Animal Science">Animal Science</option>
                        <option value="Anthropology">Anthropology</option>
                        <option value="Applied Energy">Applied Energy</option>
                        <option value="Applied Math">Applied Math</option>
                        <option value="Arab and Middle Eastern History">Arab and Middle Eastern History</option>
                        <option value="Arabic Language and Literature">Arabic Language and Literature</option>
                        <option value="Archaeology">Archaeology</option>
                        <option value="Architecture">Architecture</option>
                        <option value="Art History">Art History</option>
                        <option value="Art History and Curating">Art History and Curating</option>
                        <option value="Biochemistry">Biochemistry</option>
                        <option value="Biology">Biology</option>
                        <option value="Biomedical Engineering">Biomedical Engineering</option>
                        <option value="Biomedical Sciences">Biomedical Sciences</option>
                        <option value="Building Energy Systems">Building Energy Systems</option>
                        <option value="Business Administration">Business Administration</option>
                        <option value="Business Analytics">Business Analytics</option>
                        <option value="Cell and Molecular Biology">Cell and Molecular Biology</option>
                        <option value="Chemical Engineering">Chemical Engineering</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Civil Engineering">Civil Engineering</option>
                        <option value="Clinical Psychology">Clinical Psychology</option>
                        <option value="Computational Science">Computational Science</option>
                        <option value="Computer and Communications Engineering">Computer and Communications Engineering</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Computer Science Engineering">Computer Science Engineering</option>
                        <option value="Construction Engineering">Construction Engineering</option>
                        <option value="Economics">Economics</option>
                        <option value="Eco-system Management">Eco-system Management</option>
                        <option value="Education">Education</option>
                        <option value="Education/Elementary">Education/Elementary</option>
                        <option value="Educational Management and Leadership Diplomas">Educational Management and Leadership Diplomas</option>
                        <option value="Electrical and Computer Engineering">Electrical and Computer Engineering</option>
                        <option value="Energy Studies">Energy Studies</option>
                        <option value="Engineering Management">Engineering Management</option>
                        <option value="English Language">English Language</option>
                        <option value="English Literature">English Literature</option>
                        <option value="Environmental and Water Resources Engineering">Environmental and Water Resources Engineering</option>
                        <option value="Environmental Health">Environmental Health</option>
                        <option value="Environmental Policy Planning">Environmental Policy Planning</option>
                        <option value="Environmental Technology">Environmental Technology</option>
                        <option value="Epidemiology">Epidemiology</option>
                        <option value="Executive Master of Business Administration">Executive Master of Business Administration</option>
                        <option value="Financial Economics">Financial Economics</option>
                        <option value="Finance">Finance</option>
                        <option value="Food Safety">Food Safety</option>
                        <option value="Food Science and Management">Food Science and Management</option>
                        <option value="Food Security">Food Security</option>
                        <option value="Food Technology">Food Technology</option>
                        <option value="Geology">Geology</option>
                        <option value="Graphic Design">Graphic Design</option>
                        <option value="Green Technologies">Green Technologies</option>
                        <option value="Health Communication">Health Communication</option>
                        <option value="History">History</option>
                        <option value="Human Morphology">Human Morphology</option>
                        <option value="Human Resource Management">Human Resource Management</option>
                        <option value="Industrial Engineering">Industrial Engineering</option>
                        <option value="Irrigation">Irrigation</option>
                        <option value="Islamic Studies">Islamic Studies</option>
                        <option value="Landscape Architecture">Landscape Architecture</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                        <option value="Media and Communication">Media and Communication</option>
                        <option value="Media Studies">Media Studies</option>
                        <option value="Medical Audiology Sciences">Medical Audiology Sciences</option>
                        <option value="Medical Imaging Sciences">Medical Imaging Sciences</option>
                        <option value="Medical Laboratory Sciences">Medical Laboratory Sciences</option>
                        <option value="Medicine">Medicine</option>
                        <option value="Microbiology and Immunology">Microbiology and Immunology</option>
                        <option value="Middle Eastern Studies">Middle Eastern Studies</option>
                        <option value="Neuroscience">Neuroscience</option>
                        <option value="Nursing">Nursing</option>
                        <option value="Nutrition">Nutrition</option>
                        <option value="Nutrition and Dietetics">Nutrition and Dietetics</option>
                        <option value="Nutrition and Dietetics - Coordinated">Nutrition and Dietetics - Coordinated</option>
                        <option value="Orthodontics">Orthodontics</option>
                        <option value="Petroleum Studies">Petroleum Studies</option>
                        <option value="Pharmacology and Therapeutics">Pharmacology and Therapeutics</option>
                        <option value="Philosophy">Philosophy</option>
                        <option value="Physics">Physics</option>
                        <option value="Physiology">Physiology</option>
                        <option value="Plant Protection">Plant Protection</option>
                        <option value="Plant Science">Plant Science</option>
                        <option value="Political Studies">Political Studies</option>
                        <option value="Population Health">Population Health</option>
                        <option value="Poultry Science">Poultry Science</option>
                        <option value="Psychology">Psychology</option>
                        <option value="Public Administration">Public Administration</option>
                        <option value="Public Health">Public Health</option>
                        <option value="Public Health Nutrition">Public Health Nutrition</option>
                        <option value="Public Policy and International Affairs">Public Policy and International Affairs</option>
                        <option value="Rural Community Development">Rural Community Development</option>
                        <option value="SHARP">SHARP</option>
                        <option value="Sociology">Sociology</option>
                        <option value="Sociology-Anthropology">Sociology-Anthropology</option>
                        <option value="Statistics">Statistics</option>
                        <option value="Studio Arts">Studio Arts</option>
                        <option value="Special Education">Special Education</option>
                        <option value="Teaching of Arabic">Teaching of Arabic</option>
                        <option value="Health Education">Health Education</option>
                        <option value="Elementary Education">Elementary Education</option>
                        <option value="Informatics Education">Informatics Education</option>
                        <option value="Mathematics Education">Mathematics Education</option>
                        <option value="Science Education">Science Education</option>
                        <option value="Teaching of Social Studies">Teaching of Social Studies</option>
                        <option value="Teaching of English as a foreign language">Teaching of English as a foreign language</option>
                        <option value="Theoretical Physics">Theoretical Physics</option>
                        <option value="Transnational American Studies">Transnational American Studies</option>
                        <option value="Urban Design">Urban Design</option>
                        <option value="Urban Planning and Policy">Urban Planning and Policy</option>
                        </select>


                  </div>
            <!-- <input type="radio" name="Education_Level" id="EdLevel"> -->
                <div>
                    <p>What are you looking for?</p>
                    <label class="contr">Bachelor Degree
                        <input type="radio" checked="checked" name="Education_Level" value="Bachelor">
                        <span class="checkmark"></span>
                    </label>
                    <label class="contr">Masters Degree
                        <input type="radio" name="Education_Level" value="Master">
                        <span class="checkmark"></span>
                    </label>
                    <label class="contr">PhD Program
                        <input type="radio" name="Education_Level" value="PhD">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <input type="submit" class="btn" value="Filter">
        </form>
        <div id = "Unis">
            <?php
                require '../vendor/autoload.php';
                include_once "../Functions/CreateUni.php";

                $client = new MongoDB\Client(
                    'mongodb+srv://horizon299fyp:IbNkuf0gnBDXYdPi@cluster0.82fqu.mongodb.net/horizon?retryWrites=true&w=majority'
                );
                $db = $client->horizon;
                $coll = $db->instituteInfo;

                if (isset($_GET["searchQ"])) {
                    // return documents like the search query
                   $docs = $coll->find( 
                       [ 'name'=> new MongoDB\BSON\Regex($_GET["searchQ"],'i') ]
                    );
                } else {
                    // returns all documents
                    $docs = $coll->find();
                }
                 

                foreach($docs as $doc) {

                    $uni_name = $doc->name;
                    $uni_img = $doc->image;
                    $desc = $doc->desc;
                    $country = $doc->country;
                    $majors=$doc->majors;
                    $actualMajor = "";
                    $actualMajorDegrees = [];
                    $majorExists=false;
                    if (isset($_GET["major"]) && $_GET["major"] != '') {
                        foreach($majors as $major){
                            if ($_GET["major"] == $major->{'name'}) {
                                $actualMajor = $major->{'name'};
                                $actualMajorDegrees = (array) $major->{'degrees'};
                                $majorExists=true;
                                break;
                            }
                        }
                        if ($majorExists==false){
                            continue;
                        }
                    }
                    if (isset($_GET["country"]) && $_GET["country"] != '') {
                        if ($_GET["country"] != $country) {
                            continue;
                        }
                    }
                    $educationalLevelExists = false;
                    if (isset($_GET["Education_Level"])) {
                        foreach($doc->degrees as $degree){
                            if($_GET["Education_Level"] == $degree) {
                                $educationalLevelExists=true;
                                break;
                            }
                        }
                        if ($educationalLevelExists==false){
                            continue;
                        }
                    }
                    $programs = "";
                    if($majorExists){
                        $programs = implode(", ", $actualMajorDegrees);
                    } else {
                        $programs = implode(", ", (array) $doc->degrees);
                    }
                    $attr = [$country, $programs];
                    $major = "Computer Science";

                    echo createUni(
                        $uni_name, 
                        $uni_img, 
                        $desc, 
                        $attr,
                        $actualMajor
                    );

                }
                
            ?>

            <!-- <div class="uni">
                <div class="uniImageContainer">
                    <img src="../images/Bliss-2.jpg" alt="university Image">
                </div>
                <div class="uniDetails">
                    
                    <h3 class="uniName">AUB</h3>
                    <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, accusamus quod reiciendis quaerat iste atque laudantium quo molestias asperiores obcaecati! Doloremque aspernatur quos quod dolores tempora reiciendis non exercitationem maxime.</p>
                    <div class="queries">
                        <span class="uniProg">Bachelor's</span>
                        <span class="uniCountry">Lebanon</span>
                        <span class="uniFaculty">Arts and Sciences</span>
                    </div>
                    <div class="uniBottomPanel">
                        <div class="uniTags">
                            <span>Lebanon</span>
                            <span>Has phD program</span>
                            <span>Undergraduates</span>
                            <span>LOREM IPSUM</span>
                        </div>
                        <div class="applyButtonContainer">
                                <a href= "Applicationform.html">
                                    <button>Apply now</button>
                </a>
                        </div>
                    </div>
                </div>
            </div> -->

            
        </div>
    </div>

    <?php 
    require_once("../config.php");
    require_once("../FormSanitizer.php"); 
    require_once("../Constants.php"); 
    require_once("../Account.php"); 
    $account = new Account($con);
    if(isset($_POST["Submit"])) {
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $success = $account->login($username,$password);
        if($success) {
            $_SESSION["loggedIn"] = $username;
        }
    }
    
    function getInputValue($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }
    
     ?>

    <!--- Login --->
    <div id="loginBox">
        <h1>Login</h1>
        <Form method ="POST" action = "universities.php" autocomplete="on">
            <div class="formElement">
                <span>Username</span>
                <input type="text" name = "username" id = "UsernameInput" placeholder= "Username" required>
            </div>
            <div class="formElement" >
                <span>Password:</span>
                <input type="password" name ="Password" placeholder = "Password" required>
            </div>
            <input type="submit" name = "Submit" value="Login">
            <input type="button" value="No account? Register here" onclick = "Register()">
        </Form>
    </div>
    
</body>