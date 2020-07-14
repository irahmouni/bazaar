<?php
  require_once "user.class.php"; 
  session_start();
  

  $isLogged = !empty($_SESSION["user"]);
  if ($isLogged){
    $user = $_SESSION["user"]->toArray();
  }
  
  $classError = !empty($_SESSION["error_message"]) ? "show" : "hide"; 
  $errorMessage = !empty($_SESSION["error_message"]) ? $_SESSION["error_message"] : false;
  
    
  $classSuccess = !empty($_SESSION["success_message"]) ? "show" : "hide"; 
  $successMessage = !empty($_SESSION["success_message"]) ? $_SESSION["success_message"] : false;
  
  
  if ($errorMessage){ unset($_SESSION["error_message"]); }
  if ($successMessage){ unset($_SESSION["success_message"]); }
  
?>
<html>
  <head>
    <title>TP4 - Les formulaires</title>
    <style>
      .global {
        width : 1024px;
        margin : 0 auto;
      }
      
      .global .content {
        display: flex; 
        justify-content: space-around;
      }
      
      
      
      .error-pane{
        padding: 8px;
        background: rgba(255, 168, 168, 0.5);
        color: #ff6d6d;
        border: solid 1px #ff6d6d;
        margin-bottom: 32px;
      }
      
      .success-pane{
        padding: 8px;
        background: rgba(162, 204, 174, 0.5);
        color: #368a54;
        border: solid 1px #368a54;
        margin-bottom: 32px;
      }
      
      .hide {
        display :none;
      }
      
      .welcome-pane{
        margin-bottom: 32px;
      }
    </style>
  </head>
  <body>
    <div class="global">
      <h3>Correction TP4 - Les formulaires</h3>
      <?php
        if ($isLogged){
          ?>
            <div class="welcome-pane">
              Bienvenue <?=$_SESSION["user"]->getName()?> <?=$_SESSION["user"]->getSurname()?> - <a href="logout.php">Loggout</a>
            </div>
          <?php
        }
      ?>
     
      <div class="error-pane <?=$classError?>">
        <?=$errorMessage?>
      </div>

      <div class="success-pane <?=$classSuccess?>">
        <?=$successMessage?>
      </div>
      
      
      <div class="content">
        <div class="inscription <?=$isLogged?'hide':'show'?>">
          <form method="post" action="createAccount.php">
            
            <div class="input">
              <label for="name">Name</label>
              <div class="input">
                <input type="text" name="name" value="" />
              </div>
            </div>
            
            <div class="input">
              <label for="name">Surname</label>
              <div class="input">
                <input type="text" name="surname" value="" />
              </div>
            </div>   
            
            <div class="input">
              <label for="name">Login</label>
              <div class="input">
                <input type="text" name="login" value="" />
              </div> 
            </div>
            
            <div class="input">
              <label for="name">Password</label>
              <div class="input">s
                <input type="password" name="password" value="" />
              </div>
            </div>     
            
            <input type="submit" value="Create account" />
          </form>
        </div>
        
        
        
        
        <div class="update <?=$isLogged?'show':'hide'?>">
          <form method="post" action="updateAccount.php">
            
            <div class="input">
              <label for="name">Name</label>
              <div class="input">
                <input type="text" name="name" value="<?=!empty($user["name"])?$user["name"]:''?>" />
              </div>
            </div>
            
            <div class="input">
              <label for="name">Surname</label>
              <div class="input">
                <input type="text" name="surname" value="<?=!empty($user["surname"])?$user["surname"]:''?>" />
              </div>
            </div>   
            
            <div class="input">
              <label for="name">Login</label>
              <div class="input">
                <input type="text" name="login" value="<?=!empty($user["login"])?$user["login"]:''?>" />
              </div> 
            </div>
            
            <div class="input">
              <label for="name">Password</label>
              <div class="input">
                <input type="password" name="password" value="<?=!empty($user["password"])?$user["password"]:''?>" />
              </div>
            </div>     
            
            <input type="submit" value="Update my account" />
          </form>
        </div>
        
        
        
        
        
        
        <div class="connexion <?=$isLogged?'hide':'show'?>">
          <form method="post" action="login.php">
            <div class="input">
              <label for="name">Login</label>
              <div class="input">
                <input type="text" name="login" value="" />
              </div> 
            </div>
            
            <div class="input">
              <label for="name">Password</label>
              <div class="input">
                <input type="password" name="password" value="" />
              </div>
            </div>  
            
            <input type="submit" value="Login" />
          </form>
        </div>
      </div>
    </div>
  </body>
</html>