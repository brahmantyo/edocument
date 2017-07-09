<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>
    <?php echo $data['site_title']; ?>
  </title>
  <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="public/assets/css/login.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="panel panel-login">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <?php if (isset($data['error'])) {?>
                <div id="success-alert" class="alert alert-warning alert-dismissable fade in" role="alert">
                  <?php echo $data['error']; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <?php }?>
                <form id="login" action="?url=auth/login" method="post" role="form" style="display: block;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Remember Me</label>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="text-center">
                          <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Javascript Area -->
  <script type="text/javascript" src="public/assets/js/jQuery-2.1.3.min.js"></script>
  <script type="text/javascript" src="public/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="public/assets/js/login.js"></script>
</body>
</html>
