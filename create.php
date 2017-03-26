     <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/bootstrap-select.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/update.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/bootstrap-select.min.js"></script>
     <script src="js/bootstrap-checkbox.min.js" defer></script>
</head>
<body>

  <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Customer</h3>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>" required=''>
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($surnameError)?'error':'';?>">
                        <label class="control-label">Surname</label>
                        <div class="controls">
                            <input name="surname" type="text"  placeholder="Surname" value="<?php echo !empty($surname)?$surname:'';?>" required=''>
                            <?php if (!empty($surnameError)): ?>
                                <span class="help-inline"><?php echo $surnameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($birthdateError)?'error':'';?>">
                        <label class="control-label">Birthdate</label>
                        <div class="controls">
                            <input name="birthdate" type="date" placeholder="birthdate" value="<?php echo !empty($birthdate)?$birthdate:'';?>" required=''>
                            <?php if (!empty($birthdateError)): ?>
                                <span class="help-inline"><?php echo $birthdateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Descriptione</label>
                        <div class="controls">
                            <input name="descriptione" type="textarea"  placeholder="Area" value="<?php echo !empty($descriptione)?$description:'';?>" rows="5" required="">
                  
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label"> Marital Status</label>
                        <div class="controls" required="">
                            <input name="marital_status" type="checkbox"  placeholder="Wife" value="Wife"  checked>Wife
                            <input name="marital_status" type="checkbox"  placeholder="Children" value="Children">Children
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Language</label>
                        <div class="controls" required="">
                            <input name="language" type="radio"  value="english"  checked>English
                            <input name="language" type="radio"  value="french">French
                            <input name="language" type="radio"  value="deutch">Deutch
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Interesist</label>
                        <div class="controls">
                           <select class="selectpicker" multiple title="Choose one of the following..." name="interes[]" required="">
                              <option value="Sport">Sport</option>
                              <option value="Books">Books</option>
                              <option value="Games">Games</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-actions">
                          <a href="index.php"><input type="submit" class="btn btn-success" value="Create"></a>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
</div>


<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $birthdateError = null;
        $mobileError = null;
        $surnameError = null;
        // keep track post values
        $name = $_POST['name'];
        $surname=$_POST['surname'];
        $descriptione = $_POST['descriptione'];
        $birthdate=$_POST['birthdate']; 
        $marital_status=$_POST['marital_status'];
        $language=$_POST['language'];
        $interes=$_POST['interes'];
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($descriptione)) {
            $descriptioneError = 'Please enter Descriptione';
            $valid = false;
        }
        
         if (empty($surname)) {
            $surnameError = 'Please enter Surname';
            $valid = false;
        } 

        if (empty($birthdate)) {
            $birthdateError = 'Please enter Birthdate';
            $valid = false;
        } 
        if (empty($marital_status)) {
            $maritalError = 'Please enter Birthdate';
            $valid = false;
        } 

        $arr_count=0;
        if ($interes){
         foreach ($interes as $t){
                $arr=$arr." ".$t;
          }
        }
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO student (name,surname,birthdate,descriptione,marital_status,language,interes) values(?, ?, ?, ?, ?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$surname,$birthdate,$descriptione,$marital_status, $language,$arr));
            Database::disconnect();

            
        }

    }
?>