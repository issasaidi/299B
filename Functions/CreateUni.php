<?php
function createUni($name, $src, $desc, $attributes, $prog) {

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
                        <h3 style='font-style: italic;'>$prog</h3>
                        
                    </div>
                    <div class='uniBottomPanel'>
                        <div class='uniTags'>".$spans."</div>
                        <div class='applyButtonContainer'> 
                            <a href= 'Applicationform.php'>
                                <button>Apply now</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>"
    );
}



