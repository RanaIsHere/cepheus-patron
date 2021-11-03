function checkIfNotEmpty(tableObject) {
    if (tableObject.rows().count() > 0) {
        $('#addTransactionBtn').prop('disabled', false)
    } else {
        $('#addTransactionBtn').prop('disabled', true)
    }
}

function setValueOfTransaction(tableObject, id) {
    $('#totalItems').val(tableObject.rows().count());
}

function checkIfSus() {
    if ($('#supplierId').val() == "") {
        $('#supplyAddBtn').prop('disabled', true)
    } else {
        $('#supplyAddBtn').prop('disabled', false)
    }
}

$(function () {
    var totalPrice = 0
    var cartAll = []
    var totalPrice = 0
    var tempPrice = 0

    $('#patronsTable').DataTable({
        responsive: false
    });
    $('#productsTable').DataTable({
        responsive: true
    });
    $('#itemsTable').DataTable({
        responsive: true
    });
    $('#suppliersTable').DataTable({
        responsive: false,
        "lengthMenu": [[5, 10, 25], [5, 10, 25]]
    });
    $('#usersTable').DataTable({
        responsive: true
    });
    var pickedItemsTable = $('#pickedItemsTable').DataTable({
        responsive: true,
        "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, 'All']]
    });

    // $('.chooseProductBtn').click(function (e) {
    //     e.preventDefault();
    // });

    $('#alert_success').delay(5000).fadeOut()

    $('#productsTable').on('click', '.chooseProductBtn', function () {
        let em = $(this).closest('tr');
        let id = em.find('td').eq(0).text();
        let name = em.find('td').eq(1).text();

        $('#productId').val(id);
        $('#pid_name').html(name);
    });

    $('#patronsTable').on('click', '.choosePatronBtn', function () {
        let em = $(this).closest('tr');
        let id = em.find('td').eq(0).text();
        let name = em.find('td').eq(2).text();

        $('#patronId').val(id);
        $('#patronName').val(name);
        // $('#patronSelectModal').toggle();
    });

    $('#itemsTable').on('click', '.addItemBtn', function () {
        let em = $(this).closest('tr')
        let id = em.find('td').eq(0).text();
        let item_name = em.find('td').eq(3).text();
        let item_price = em.find('td').eq(5).text();

        if (!cartAll.includes(id)) {
            pickedItemsTable.row.add([
                id,
                item_name,
                item_price,
                "<input type='text' class='form-control item_quantity' name='item_quantity' id='item_quantity_" + id + "' aria-describedby='basic-addon1' value='1'>",
                "<button class='btn btn-success removeItemBtn'> Remove </button>"
            ]).draw();
            setValueOfTransaction(pickedItemsTable, id)

            cartAll.push(id)

            // $('#groupOfHiddens').append("<input type='hidden' name='chosen_items[]' id='chosenInput' value='" + id + "'>")
            $('#groupOfHiddens').append("<input type='hidden' name='chosen_items[" + id + "][id]' id='" + id + "' value='" + id + "'>")
            $('#groupOfHiddens').append("<input type='hidden' name='chosen_items[" + id + "][quantity]' id='qty_" + id + "' value='" + $('.item_quantity').val() + "'>")
        }
    });

    $('#itemsTable').on('click', '.addItemBtn', function () {
        checkIfNotEmpty(pickedItemsTable)
    });

    // Calculate according to subtotal, and put it in a total input
    pickedItemsTable.on('draw', function () {
        total = pickedItemsTable.column(2).data().sum()
        _total = 0
        pickedItemsTable.rows().every(function (rowIdx, tableLoop, rowLoop) {
            var data = this.data();
            var cell = this.cell({ row: rowIdx, column: 3 }).node()
            var subTotal = data[2] * $('input', cell).val()

            // console.log(subTotal)
            _total += subTotal
            console.log("total price: " + _total)
        });

        $('#totalPrice').val(_total)
    });

    $('#pickedItemsTable').on('click', '.removeItemBtn', function () {
        let em = $(this).closest('tr')
        let id = em.find('td').eq(0).text();
        let item_name = em.find('td').eq(3).text();
        let item_price = em.find('td').eq(5).text();

        for (let i = 0; i < cartAll.length; i++) {
            if (cartAll[i] == id) {
                $('#' + id + '').remove()
                $('#qty_' + id + '').remove()

                cartAll.splice(i, 1)
            }
        }

        pickedItemsTable.row($(this).parents('tr')).remove().draw()
        setValueOfTransaction(pickedItemsTable, id)
        checkIfNotEmpty(pickedItemsTable)
    });

    $('#pickedItemsTable').on('change', '.item_quantity', function () {
        let em = $(this).closest('tr')
        let id = em.find('td').eq(0).text();

        pickedItemsTable.draw()
        setValueOfTransaction(pickedItemsTable, id)
        $('#qty_' + id + '').remove()
        $('#groupOfHiddens').append("<input type='hidden' name='chosen_items[" + id + "][quantity]' id='qty_" + id + "' value='" + $('#item_quantity_' + id + '').val() + "'>")
    });

    checkIfNotEmpty(pickedItemsTable)
    checkIfSus()

    $('#suppliersTable').on('click', '.chooseSupplierBtn', function () {
        let em = $(this).closest('tr');
        let id = em.find('td').eq(0).text();
        let supplier_name = em.find('td').eq(2).text();

        $('#supplierId').val(id);
        $('#supplierName').val(supplier_name);
        checkIfSus()
    });

    $('#itemsTable').on('click', '.resupplyStockBtn', function () {
        let em = $(this).closest('tr');
        let id = em.find('td').eq(0).text();
        let item_name = em.find('td').eq(2).text();
        let price = em.find('td').eq(3).text();

        tempPrice = price
        totalPrice = tempPrice * $('#stockQuantity').val();

        $('#totalPrice').val(totalPrice);
        $('#supplyName').html(item_name);
        $('#itemId').val(id);
        checkIfSus()
    });

    $('#stockQuantity').change(function () {
        totalPrice = tempPrice * $('#stockQuantity').val();
        $('#totalPrice').val(totalPrice);
        checkIfSus()
    });

    $('#stockQuantity').keypress(function (e) {
        e.preventDefault();
    });
});