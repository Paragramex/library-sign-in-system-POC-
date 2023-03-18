<?php
include "writer.php";
if (!empty($_POST)) {
    $jt = new JsonTexter("data.json");
    $jt->write([
        "fname" => $_POST["firstName"],
        "lname" => $_POST["lastName"],
        "mail" => $_POST["email"],
        "id" => $_POST["password"],
        "day" => $_POST["timeDay"],
        "month" => $_POST["timeMonth"],
        "period" => $_POST["timePeriod"],
    ]);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login | AHS Library</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
      integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <div class="row">
          <div
            class="col-12 col-sm-8 col-md-6 col-lg-4 offset-sm-2 offset-md-3 offset-lg-4"
          >
            <h1 class="mb-3 text-center">Login to the library</h1>
            <p class="lead">
              Please login as it helps our librarians keep track of library visits per person.
            </p>
            <form class="mb-3" action="<?php echo $_SERVER[
                "PHP_SELF"
            ]; ?>" method="post" target="_self">
              <div class="row">
                <div class="form-group col-12 col-sm-6">
                  <label for="firstName">First name:</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First name"
                    id="firstName"
										name="firstName"
                  />
                </div>
                <div class="form-group col-12 col-sm-6">
                  <label for="lastName">Last name:</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last name"
                    id="lastName"
										name="lastName"
                  />
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input
                  type="email"
                  class="form-control"
                  placeholder="examplemn26@ausdk12.org"
                  id="email"
									name="email"
                  required
                />
              </div>
              <div class="form-group">
                <label for="password">Student-ID:</label>
                <input
                  type="password"
                  class="form-control"
									placeholder="5-12 digits located on your student card"
                  id="password"
									name="password"
                  required
                />
              </div>
              <label>Date/Period of Visit:</label>
              <div class="row no-gutters">
                <div class="form-group col-4">
                  <label for="timeDay" class="sr-only">Day</label>
                  <select class="form-control" id="timeDay" name="timeDay">
                    <option value="">Day</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                  </select>
                </div>
                <div class="form-group col-4">
                  <label for="timeMonth" class="sr-only"
                    >Month</label
                  >
                  <select class="form-control" id="timeMonth" name="timeMonth">
                    <option value="">Month</option>
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                    <option value="april">April</option>
                    <option value="may">May</option>
                    <option value="june">June</option>
                    <option value="july">July</option>
                    <option value="august">August</option>
                    <option value="september">September</option>
                    <option value="october">October</option>
                    <option value="november">November</option>
                    <option value="december">December</option>
                  </select>
                </div>
                <div class="form-group col-4">
                  <label for="timePeriod" class="sr-only"
                    >Period</label
                  >
                  <select class="form-control" id="timePeriod" name="timePeriod">
										<option value="">Period</option>
										<option value="before">Before School</option>
                    <option value="1">Period 1</option>
                    <option value="2">Period 2</option>
                    <option value="3">Period 3</option>
                    <option value="4">Period 4</option>
                    <option value="lunch">Lunch</option>
                    <option value="5">Period 5</option>
                    <option value="6">Period 6</option>
                    <option value="7">Period 7</option>
                    <option value="after">After School</option>
										<option value="advisory">Advisory</option>
                  </select>
                </div>
              </div>
              <input type="submit" class="btn btn-primary btn-block mb-3">
                Continue
              </input>
              <div class="alert alert-info small" role="alert">
                This login is new so please report any problems to 
                the <a href="mailto:kadinjd26@ausdk12.org?subject=Library%20Login%20Page%20Problem%3F&body=Hey%2C%20there%20might%20be%20a%20problem%20with%20the%20library%20sign%20in%20page.%20Heres%20some%20detail%3A">Developer</a>.
              </div>
              <div class="text-center">
                <p>or ...</p>
                <a href="/admin.php" class="btn btn-success">Login to Admin Panel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
      integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
      integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
      crossorigin="anonymous"
    ></script>
  </body>
</html>