<footer class="content_block">
    <h4>Contactez-Nous</h4>
    <form action="#">
<label for="name">Nom: </label>
        <input type="text" class="input" name="name" placeholder="Votre nom">
        <label for="name">E-mail: </label>
        <input type="email" class="input" name="email" placeholder="courriel@courriel.com">
        <textarea name="message" placeholder="Votre message ici" class="input" rows="5"></textarea>
        <input type="submit" value="envoyer" class="button">
    </form>

    <p> &copy; CN " La gare de rires" 2016 </p>
<img src="images/railroad_crossing_43.png" alt="train_light" id="train_light">
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
        padding : 0,
        iframe : {
            preload: false
        }
    });
</script>


</body>



</html>