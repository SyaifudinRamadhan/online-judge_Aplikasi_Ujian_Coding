<?php 

session_start();

session_destroy();

echo "
<script>
alert('Logout sukses');
document.location.href='login.php';
</script>
";


 ?>