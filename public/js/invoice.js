$(function () {
    let invoiceTable = $('#invoiceTable').DataTable({
        responsive: true,
        searching: false,
        paging: false,
        info: false,
    });

    $('#totalPriceColumn').html( 'Rp. ' + invoiceTable.column(4).data().sum() );
});

