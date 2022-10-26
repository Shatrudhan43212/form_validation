<?php 
    session_start();
    if(isset($_REQUEST['submit'])){
        $name = trim($_POST['name']);
        if(!empty($name)){
            echo ucfirst(strtolower($_REQUEST['name']));
        }
        else{
            $_SESSION['err'] = 'Please enter your name';
        }
    }
?>
<style>
    .err_msg{
        color: red;
    }
</style>
<form method="post" action="" name="myform" onsubmit="return CheckValidation()">
<input type="text" name="name" onkeyup="LowerToUpper(this.value)" id="text1">
<div class="err_msg"><?php echo (isset($_SESSION['err'])) ? $_SESSION['err'] : ''; ?>
<button type="submit" name="submit">Submit</button>
</form>
<script>
    function CheckValidation(){
        let name = document.myform.name;
        if(name.value.trim() == ""){
            alert('Please Enter your name.');
            document.myform.name.focus();
            return false;
        }
    }
    function LowerToUpper(str){
        document.getElementById('text1').value = str.toUpperCase();
    }
</script>
 <?php 
    
    if(isset($_SESSION)){
        unset($_SESSION['err']);
        session_destroy();
    }
 
 ?>