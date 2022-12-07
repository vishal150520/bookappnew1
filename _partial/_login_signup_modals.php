<?php
echo '<!--Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login to PDF AGILE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action"" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
              </div>
              <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- SignUp Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Account in PDF AGILE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="" method="POST">
              <div class="form-group">
                  <label for="exampleInputname">Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Create Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
              </div>
              <button type="submit" name="create" class="btn btn-primary">Create Account</button>
              <p>have an account already?</p>
            </form>
            <button class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#loginModal">Sign in</button>
      </div>
    </div>
  </div>
</div>';
?>