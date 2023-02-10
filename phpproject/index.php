<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1>LOG IN</h1>

    <form>
        <?php 
        if(isset($_GET["error"]))
        {?>
<p class="error"> <?php echo $_GET["error"];?> </p>
        <?php } ?>
       
    <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">User Name</div>
        </div>
        <input type="text" class="form-control" name="username" id="inlineFormInputGroup" placeholder="Username"
          value="<?php if(isset($_COOKIE['Name'])) {
            echo$_COOKIE['Name']; } ?>">
      </div>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">PassWord</div>
        </div>
        <input type="password" class="form-control" name="password" id="inlineFormInputGroup" placeholder="password"
        value="<?php if(isset($_COOKIE['Password'])) {
            echo$_COOKIE['Password']; } ?>"> 
      </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1"name="Remember" 
    <?php  if(isset($_COOKIE['Name']) && isset($_COOKIE['Password'])) { ?> checked  <?php }?> >
    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>