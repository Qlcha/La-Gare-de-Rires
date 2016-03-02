<footer class="content_block">
    <h2>Contactez-Nous</h2>
    <form action="#">
<label for="name">Nom: </label>
        <input type="text" class="input" name="name" placeholder="Votre nom">
        <label for="name">E-mail: </label>
        <input type="email" class="input" name="email" placeholder="courriel@courriel.com">
        <label for="message">Message: </label>
        <textarea name="message" placeholder="Votre message ici" class="input" rows="5"></textarea>
        <input type="submit" value="envoyer" class="button">
    </form>

    <p> &copy; CN " La gare de rires" 2016 </p>
</footer>
</div>



<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Add fancyBox -->
<script type="text/javascript" src="fancyapps/source/jquery.fancybox.pack.js"></script>


<!-- script affichage PDF -->
<script>
    $(".fancybox").fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        iframe : {
            preload: false
        }
    });
</script>


</body>



</html>