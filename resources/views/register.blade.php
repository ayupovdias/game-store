<html>
<head>
    <title>Registration page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="w-50 border rounded-5 m-auto p-3">
        <h3 class="text-center">Registration Page</h3>
        <?php

        echo '<form action="test.php" method="post">
        <div class="row">
      <label class="form-label">First name:
          <input class="form-control" required name="first_name">
      </label>
        </div>
      <div class="row">
          <label class="form-label">Last name:
          <input class="form-control" required name="last_name">
          </label>
      </div>
      <div class="row">
          <label class="form-label">Your email:
          <input class="form-control" type="email" required name="emial">
          </label>
      </div>
    <div class="row">
          <label class="form-label">Your date of birth
              <input class="form-control" type="date" max="2026-03-08" required name="date">
          </label>
    </div>
      <div class="row">
          <label class="form-label">What country do you live in?
              <select class="form-control" name="select" required>
                  <option>The USA</option>
                  <option>Canada</option>
                  <option>The UK</option>
                  <option>Kazakhstan</option>
                  <option>Chine</option>
                  <option>Russian</option>
                  <option>France</option>
                  <option>Spain</option>
                  <option>Germany</option>
                  <option>Italy</option>
                  <option>Portugal</option>
                  <option>Japan</option>
                  <option>India</option>
                  <option>Turkey</option>
              </select>
          </label>
      </div>
      <div class="row">
          <span class="d-block">What do you do?</span>
          <label>
              <input type="radio" value="I study at school" name="do" class="form-check-input" required> I study at school
          </label>
          <label>
              <input type="radio" value="I study at university" name="do" class="form-check-input" required> I study at university
          </label>
          <label>
              <input type="radio" value="I work" name="do" class="form-check-input" required> I work
          </label>
          <label>
              <input type="radio" value="I retired" name="do" class="form-check-input" required> I retired
          </label>
          <label>
              <input type="radio" value="I am unemployed" name="do" class="form-check-input" required> I am unemployed
          </label>
      </div>
      <div class="row">
          <label class="form-label">Password:
              <input class="form-control" type="password" required minlength="8" name="password">
          </label>
      </div>
  <div class="row">
      <label class="form-label">Confirm Password:
          <input class="form-control" type="password" required minlength="8" name="confirm_password">
      </label>
  </div>
      <div class="row">
          <label><input type="checkbox" class="form-check-input" required> Agreement</label>
      </div>
    <br>
      <div class="row">
          <input type="submit" class="btn btn-success" value="Register">
      </div>

  </form>';
        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous">
</script>
</body>
</html>
