$(function () {
    $('#patronsTable').DataTable();
    $('#productsTable').DataTable( {
        responsive: true
    });
    $('#itemsTable').DataTable({
        responsive: true
    });
    $('#suppliersTable').DataTable({
        responsive: false
    });
    $('#usersTable').DataTable({
        responsive: true
    });

    $('.chooseProductBtn').click(function (e) {
        e.preventDefault();
    });

    $('#productsTable').on('click', '.chooseProductBtn', function () {
        let em = $(this).closest('tr');
        let id = em.find('td').eq(0).text();
        let name = em.find('td').eq(1).text();

        $('#productId').val(id);
        $('#pid_name').html(name);
    });
});