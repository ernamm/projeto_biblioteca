<div class="rodape">
    <div style="text-align: center;">
        <p>&#169;2022</p>
    </div>
</div>
<script src="../js/biblioteca.js"></script>
<?php
if (isset($_COOKIE['msg'])) {
    echo
    "<script>
        var x = document.cookie.split('=')
        console.log(x[1])
    
        document.getElementById('toast').style.backgroundColor = 'teal';
        document.getElementById('toast').innerHTML = x[1];
        var x = document.getElementById('toast');
        x.className = 'show';
        setTimeout(function(){ x.className = x.className.replace('show', ''); }, 3000);
        document.cookie = 'msg=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=projeto_biblioteca/html;';
    </script>";
} else {
    echo 
    "<script>
    console.log('não tem cookies')
    </script>";
}
?>

</body>

</html>