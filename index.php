<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/MainStyle.css">
    <link rel="stylesheet" type="text/css" href="./css/NavBar.css">
    <link rel="stylesheet" type="text/css" href="./css/SideMenu.css">
    <link rel="stylesheet" type="text/css" href="./css/MainContent.css">
    <link rel="stylesheet" type="text/css" href="./css/Search.css">
    <link rel="stylesheet" type="text/css" href="./css/Login.css">
    <link rel="stylesheet" type="text/css" href="./css/dropDown.css">
    <script src="./js/SideBar.js" defer></script>
    <script src="./js/Login.js" defer></script>
    <script src="./js/dropDown.js" defer></script>
    <title>New Page</title>
</head>
<body>
    <!--- NavBar --->
    <div id="NavBar">
        <div id="SideButton"><img src="./images/icons/menu_black.png" alt=""/></div>
        <div id="logo"><a href="#">Home</a></div>
        <button>Register</button>
        <button onclick="ShowLogin()">Login</button>
    </div>

    <!--- SideMenu --->
    <div id="SideMenu">
        <ul>
            <li class="dropDown">Profile</li>
            <li class="dropDown">Settings</li>
            <li class="dropDown">List Item 3</li>
            <li class="dropDown">List Item 4</li>
        </ul>
    </div>

    <!--- Main Content --->
    <div id="MainContent">
        <form id="searchDiv" method="GET" action="ProductsPage.php">
            <input type="search" name="searchQ" placeholder="Search" class="searchInput">
            <input type="image" value="submit" src="./images/icons/search-img-W.png">
        </form>
        
        <form class="form">
            <div class="form__group" id="contain">
                <div>
                    <label for="country">Countries</label>
                    <select id="country" name="country" data-dropdown>
                      <option value="">Please select a country</option>
                      <option value="Lebanon">Lebanon</option>
                      <option value="Geramany">Germany</option>
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
                  <label for="faculty">Faculties</label>
                  <select name="faculty" id="faculty" data-dropdown>
                      <option value="">Please select your field of study</option>
                      <option value="Arts and Sciences">Arts and Sciences</option>
                      <option value="Engineering">Engineering</option>
                      <option value="Architecture">Architecture</option>
                      <option value="Nursing">Nursing</option>
                      <option value="Health Science">Health Science</option>
                      <option value="Medicine">Medicine</option>
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
                  <label class="contr">Scholarship Program
                    <input type="radio" name="Education_Level" value="scholarship">
                    <span class="checkmark"></span>
                  </label>

            </div>
              
            <!--   <input type="radio" id="bach" name="Education_Level" value="Bachelor">
            <label for="bach">Bachelor Degree</label>
              <input type="radio" id="master" name="Education_Level" value="Education_Level">
              <label for="master">Masters Degree</label>
              <input type="radio" id="scholar" name="Education_Level" value="Scholarship">
              <label for="scholar">Scholarship</label> -->
            </div>
  
        <button type="submit" class="btn">Filter</button>
      </form>
        <div id = "Items">
            <p>Some Text</p>
        </div>
    </div>

    <!--- Login --->
    <div id="loginBox">
        <h1>Login</h1>
        <Form method ="POST" action = "#" autocomplete="on">
            <div class="formElement">
                <span>Username</span>
                <input type="text" name = "username" id = "UsernameInput" placeholder= "Username" required>
            </div>
            <div class="formElement" >
                <span>Password:</span>
                <input type="password" name ="Password" placeholder = "Password" required>
            </div>
            <input type="submit" value="Login">
            <input type="button" value="No account? Register here" >
        </Form>
    </div>
    
</body>