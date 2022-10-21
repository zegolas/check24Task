<form action="index.php?page=loginRequest" method="POST" id="frmLogin">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username"  autocomplete="off">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="off">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      
    </div>
    <input type="hidden" name="token" id="token"/>
    <button class="g-recaptcha w-100 btn btn-lg btn-primary"
        data-sitekey="6LfuRpwiAAAAAAIxwy4T5XaE1XkN1GcVQaqfYn8-"
        data-callback='onSubmit'
        data-action='submit'>Sign in</button>
    <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
  </form>
  
  <script src="https://www.google.com/recaptcha/api.js?render=6LfuRpwiAAAAAAIxwy4T5XaE1XkN1GcVQaqfYn8-"></script>
  <script>
    /*function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
        grecaptcha.execute('reCAPTCHA_site_key', {action: 'submit'}).then(function(token) {
        // Add your logic to submit to your backend server here.
        });
        });
    }*/

function onSubmit(token) {
    var tokenField = document.getElementById("token");
    tokenField.value = token;
    document.getElementById("frmLogin").submit();
}
</script>
