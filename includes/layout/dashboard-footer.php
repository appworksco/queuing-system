    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        /* feather:false */
        (function () {
            'use strict'
            feather.replace({ 'aria-hidden': 'true' });
            new DataTable('#example');
            $('#example-user').DataTable({
                pageLength : 5,
                lengthMenu: [[5], [5]],
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false
            })
            $('#example-user-1').DataTable({
                pageLength : 5,
                lengthMenu: [[5], [5]],
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false
            })
        })()
    </script>
</body>
</html>