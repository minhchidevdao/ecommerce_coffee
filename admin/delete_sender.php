<?php 
    
    if(!isset($_SESSION['admin_username'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_sender'])){
        
        $delete_sender_id = $_GET['delete_sender'];
        
        $delete_sender = "delete from sender where sender_id='$delete_sender_id'";
        
        $run_delete = mysqli_query($con,$delete_sender);
        
        if($run_delete){
            
            echo "<script>alert('Một ý kiến khách hàng đã bị xoá')</script>";
            
            echo "<script>window.open('index.php?view_sender','_self')</script>";
            
        }
        
    }

?>




<?php } ?>