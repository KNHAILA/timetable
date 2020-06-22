<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand"><!--ENSA --> ENSA DE KHOURIBGA</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        
		
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>Welcome <?php if(@$_SESSION['name'])echo $_SESSION['name']; ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>
  
</head>



