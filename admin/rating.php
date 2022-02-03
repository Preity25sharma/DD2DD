<?php

$rootpath = dirname(__DIR__);
include('../db/db_dd2dd.php');
if (isset($_POST['submit'])) {
    //echo $_POST['name'];
    $rating= $_POST['rating'];
     $review= $_POST['review'];
     $alias= $_POST['alias'];
  //echo $alias;
    $sql = "INSERT INTO `rating`( `rating`, `alias`, `review`) VALUES ('$rating', '$alias', '$review') ";
   // echo $sql;
   $result = mysqli_query($conn, $sql);
   if ($result){
            ?><script>alert("Rating success...Thank you for your review!");
            window.location = "/DD2DD/index.php?logout=1";
           </script><?php
            
        }
        else{
            ?><script>alert("Something Missing !");</script><?php
        }
    
}

                    
?>

 

   
        <div class='rating-box'>
<form class='rating-form' method="post">
    
  <fieldset>
      
    <span class="star-cb-group">
      <input type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
      <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
      <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
      <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
      <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
      <input type="radio" id="rating-0" name="rating" value="0" checked="checked" class="star-cb-clear" /><label for="rating-0">0</label>
    </span>
  </fieldset>
  <fieldset>
    <input type='text' name='alias' id='alias' class='text-field' value='' maxlength='50' placeholder='Your Public name or alias (Required)' required>
    </fieldset>
  <fieldset>
    <textarea name='review' id='review' maxlength='100' placeholder='Write your review (Required)' required></textarea>
    </fieldset>
  
  <div>
                    <button type="submit" name="submit"  class="btn btn-primary">Submit</button>
                     <input type="button" onclick="location.href='/DD2DD/index.php?logout=1'"  class="btn btn-danger btn-lg btn-block" value="Skip">
                  </div>
  
</form>
 
</div>

<style>
*{
 margin:0;
  padding:0;
  box-sizing:border-box;
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  box-color:red;
}
.star-cb-group {
  /* remove inline-block whitespace */
  font-size: 18px;
  color:red;
  /* flip the order so we can use the + and ~ combinators */
  unicode-bidi: bidi-override;
  direction: rtl;
  /* the hidden clearer */
}
.star-cb-group * {
  font-size: 2rem;
}
.star-cb-group > input {
  display: none;
}
.star-cb-group > input + label {
  /* only enough room for the star */
  display: inline-block;
  overflow: hidden;
  text-indent: 9999px;
  width: 1em;
  white-space: nowrap;
  cursor: pointer;
}
.star-cb-group > input + label:before {
  display: inline-block;
  text-indent: -9999px;
  content: "☆";
  color: #888;
}
.star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
  content: "★";
  color: #e52;
  text-shadow: 0 0 1px #333;
}
.star-cb-group > .star-cb-clear + label {
  text-indent: -9999px;
  width: .5em;
  margin-left: -.5em;
}
.star-cb-group > .star-cb-clear + label:before {
  width: .5em;
}
.star-cb-group:hover > input + label:before {
  content: "☆";
  color: #888;
  text-shadow: none;
}
.star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
  content: "★";
  color: #e52;
  text-shadow: 0 0 1px #333;
}


.rating-box{
  width:300px;
  height:300px;
  border:solid 1px #c1c1c1;
  margin:0 auto;
  position:relative;
}

fieldset{border:none;padding:5px 20px;}
.rating-success{display:none;
    text-align: center;
    font-size: 20px;
    padding: 30px 0;}
.rating-success.active{display:block}

.rating-form input.text-field{display:block;width:100%;line-height:25px;font-size:14px;padding:0 10px;border:solid 1px #c1c1c1;}

.rating-form #review{width:100%;padding:0 10px;line-height:25px;font-size:14px;height:100px;border:solid 1px #c1c1c1;}

.rating-form #submit{width:100px;line-height:30px;font-size:14px;border-radius:0;-webkit-appearance:none;background: #467379;color: white;border:none;outline:none;}

.error{padding-left:20px;color:red;font-size:12px;}
</style>

<script>
    $('#submit').on('click',function(){
  var rating = $("input[name=rating]:checked").attr('value');
  var name = $('#alias').val();
  var review = $('#review').val();
  if(rating == '0'){
    $('.error').html('Please select rating');
    
  }else if(name == ''){
    $('.error').html('Please enter name');
  }else if(name.length <=2 || name.legth >=50){
     $('.error').html('Please enter name in less than 50 Characters');
  }else if(review == ''){
    $('.error').html('Please enter review');
  }else if(review.length <=2 || review.legth >=250){
     $('.error').html('Please enter review in less than 250 Characters');
  }else{
    $('.error').html('');       
    alert(rating+'|'+name+'|'+review);
    $('.rating-form').hide();
    $('.rating-success').addClass('active');
  }
})
</script>
