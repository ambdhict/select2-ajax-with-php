<html>
    <head>
        <!-- Select2 Plugins below -->
    </head>
    <body>
        <label>Select2 Populate</label>
        <select id='selectdropdown' class="form-control"></select>
    </body>
</html>

<script>
    $('#selectdropdown').select2({
    placeholder: 'Select2 Populate',
    ajax: {
        url: 'yoururl.php',
        dataType: 'json',
        delay: 250,
        data: function (data) {
            return {
                searchCourse: data.term // search term
            };
        },
        processResults: function (response) {
            return {
                results:response
            };
        },
        cache: true
    }
  });
</script>