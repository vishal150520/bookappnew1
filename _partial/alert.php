<div class="container my-2">
<?php
// alert for signUp functionality 
  if($emailExists==True){
    echo ' <div class="alert alert-danger" role="alert">
      Email Id already exists.
      <button type="button" class="close" data-dismiss="alert" aria-lable="close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
  }
  elseif($signUp==TRUE){
    echo ' <div class="alert alert-danger" role="alert">'. $_SESSION['msg'].'
            <button type="button" class="close" data-dismiss="alert" aria-lable="close">
      <span aria-hidden="true">&times;</span>
      </button>
            </div>';  
  }
  elseif($insert == false){
    echo ' <div class="alert alert-danger" role="alert">
    Something went wrong.
    <button type="button" class="close" data-dismiss="alert" aria-lable="close">
  <span aria-hidden="true">&times;</span>
  </button>
    </div>';
  }
  elseif($passwordMatch == false){
    echo ' <div class="alert alert-danger" role="alert">
    Password are not matching.
    <button type="button" class="close" data-dismiss="alert" aria-lable="close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  
  
  // alert for login function
  if($loggin==TRUE){
    echo ' <div class="alert alert-success" role="alert">
            <strong>Success!</strong> You have Login successfully
            <button type="button" class="close" data-dismiss="alert" aria-lable="close">
      <span aria-hidden="true">&times;</span>
      </button>
            </div>';
  }
  elseif($passwordIncorrect==TRUE){
    echo ' <div class="alert alert-danger" role="alert">
            <strong>Oops!</strong> Password is incorrect.
            <button type="button" class="close" data-dismiss="alert" aria-lable="close">
      <span aria-hidden="true">&times;</span>
      </button>
            </div>';
  }
  elseif($emailNotExists == TRUE){
    echo ' <div class="alert alert-danger" role="alert">
      Oops! Your email does not eixsts or your account not active yet.
      <button type="button" class="close" data-dismiss="alert" aria-lable="close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
  }

//   alert to do login

// if($username==TRUE){
//   echo ' <div class="alert alert-danger" role="alert">
//   Please login to access download page and more services.
//   <button type="button" class="close" data-dismiss="alert" aria-lable="close">
//   <span aria-hidden="true">&times;</span>
//   </button>
//   </div>';
// }

//Alert for account setting
$update = FALSE;
if($update==TRUE){
  echo ' <div class="alert alert-success" role="alert">
          <strong>Success!</strong> Your details updated successfully
          <button type="button" class="close" data-dismiss="alert" aria-lable="close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>';
}
?>
</div>