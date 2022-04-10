<div class="card mt-3 mb-3" id="size">
    <div class="card-header">
        <h3 class="text-center mb-3">
            Formulaire de contact 
        </h3>
    </div>
    <!--alert messages start-->
    <?php echo $alert; ?>
    <!--alert messages end-->
    <div class="card-body contact-form">
        <form method="post" class="contact">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="objet" class="form-label">Objet</label>
                <input type="text" name="objet" id="objet" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Votre message</label>
                <textarea name="message" rows="5" id="message" class="form-control" required></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button type="reset" class="btn btn-danger me-2">Annuler</button>
                <button type="submit" name="submit" class="btn btn-success">Envoyer</button>
            </div>
        </form>
    </div>
</div>

<style>
    #size
    {
        width: 200% !important;
        margin-left: -50% !important;
    }
</style>

<script type="text/javascript">
if(window.history.replaceState){
    window.history.replaceState(null, null, window.location.href);
}
</script>

</body>
</html>