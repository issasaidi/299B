<?php
function createUni($name, $src, $desc, $attributes, $prog, $country, $faculty) {

    $src = '../images/'.$src;

    $spans = "";
    foreach($attributes as $a) {
        $spans = $spans. "<span>".$a."</span>";           
    }
       
      return (
        "<div class='uni'>
                <div class='uniImageContainer'>
                    <img src=$src alt='university Image'>
                </div>
                <div class='uniDetails'>

                    <h3 class='uniName'>$name</h3>
                    <p class='desc'>$desc</p>
                    <div class='queries'>
                        <span class='uniProg'>$prog</span>
                        <span class='uniCountry'>$country</span>
                        <span class='uniFaculty'>$faculty</span>
                    </div>
                    <div class='uniBottomPanel'>
                        <div class='uniTags'>".$spans."</div>
                        <div class='applyButtonContainer'> 
                            <button>Apply now</button>
                        </div>
                    </div>
                </div>
            </div>"
    );
}


