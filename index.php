<?php
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- browser logo -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/ico/iconfinder_weather_3_2682848.svg" />
    <!-- fontaeswome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- google saira font link  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Saira&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Weather</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mt-md-2 mx-md-2 px-3 ">
        <div class="container-fluid d-flex">
            
            <a class="navbar-brand" href="#">Weather</a>
        
          <!-- <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li> 
            </ul>
          </div> -->
          <form class="d-flex" method="GET" name="city_form" action="./">
              <input class="form-control me-2" name="city" type="search" placeholder="Enter City Name" aria-label="Search" >
              <button class="btn btn-outline-success" type="submit" >Search</button>
          </form>
          </div>
        </div>
    </nav>
<?php
  if(isset($_GET['city']) and $_GET['city']!=NULL  )
  {
    $city=$_GET['city'];
    $url="http://api.openweathermap.org/data/2.5/weather?q=$city&units=metric&mode=xml&appid=8b202f75161139405a432d8d4f150a1b";
    $xml=simplexml_load_file($url) or die("Error: Cannot Find object");

  }
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 bg-dark mx-auto weather_card">
                <div class="container-fluid ">

                  <?php if (isset($xml)) { ?>
                    <div class="header py-5">
                        <h1 class="display-6 text-white text-center"><?php echo$xml->city['name'].",".$xml->city->country; ?></h1>
                        <h4 class=" text-white text-center"><?php echo$xml->weather['value']; ?></h4>
                        <div class="d-flex text-center py-3 justify-content-center">
                            <img class="img-fluid" src="http://openweathermap.org/img/wn/<?php echo $xml->weather['icon']; ?>@4x.png" alt="">
                            <h1 class="display-4 text-white"><?php echo$xml->temperature['value']; ?>°C</h1>
                        </div>
                    </div>
                    <div class="foot py-4">
                        <div class="foo_head">
                            <h4 class="text-center"><?php print(date('l').",".date("g:i a")); ?></h4>
                        </div>
                        <div class="foot_body table-responsive">
                            <table class="table  text-center mt-2">
                                <tbody>
                                  <tr>
                                    <th scope="row">Humidity</th>
                                    <td><?php echo$xml->humidity['value']; ?>%</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pressure</th>
                                    <td><?php echo$xml->pressure['value']; ?> mb</td>
                                </tr>
                                  <tr>
                                    <th scope="row">Visibility</th> 
                                    <td><?php echo$xml->visibility['value']; ?>M</td>
                                </tr>
                                <tr>
                                    <th scope="row">Wind</th>
                                    <td><?php echo$xml->wind->direction['name'];echo" ".$xml->wind->speed['value'];echo" ".$xml->wind->speed['unit'] ?></td>
                                </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                 <?php }else{ ?>
                  <h1 class="display-6 text-white text-center">No Data Found</h1>
                  <?php } ?>
                </div>
            </div>
        </div>
    </div>

  

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>