
</div>
</div>


</div>
</div>
</div>



</div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->



<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>


</body>

</html>
<script>
    jQuery('.numonly').bind('input paste', function(){
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    jQuery('.deconly').bind('input paste', function(){
        this.value = this.value.replace(/([^0-9]*[.][0-9]+)/g, '');
    });
</script>