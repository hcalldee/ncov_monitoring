<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<!-- 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    -->


<!-- jquery harus diatas bootsrap  -->
<script src="<?= base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>

<!-- js sendiri -->

<!-- js offline -->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/js/scriptku.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- <script>
    $(document).ready(function() {
        $('#login').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?= base_url(); ?>api/User",
                method: "post",
                dataType: 'json',
                data: {
                    usr: $('#username').val(),
                    pass: $('#pass').val(),
                },
                beforeSend: function() {
                    $('#get').attr('disabled', 'disabled');
                },
                success: function(data) {
                    console.log(data)
                    $('#get').attr('disabled', false);
                },
            })
        })
    });
</script> -->

</body>

</html>