// This sum() function is created by Allan Jardine as a plugin to sum a column.

jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
	return this.flatten().reduce( function ( a, b ) {
		if ( typeof a === 'string' ) {
			a = a.replace(/[^\d.-]/g, '') * 1;
		}
		if ( typeof b === 'string' ) {
			b = b.replace(/[^\d.-]/g, '') * 1;
		}

		return a + b;
	}, 0 );
} );

function checkIfNotEmpty(tableObject)
{
    if (tableObject.rows().count() > 0) {
        $('#addTransactionBtn').prop('disabled', false)
    } else {
        $('#addTransactionBtn').prop('disabled', true)
    }
}

function setValueOfTransaction(tableObject)
{
    $('#totalPrice').val( tableObject.column(2).data().sum() );
    $('#totalItems').val(tableObject.rows().count());
}

$(function () {
    var totalPrice = 0
    var cartAll = []
    var totalPrice = 0
    var tempPrice = 0

    $('#patronsTable').DataTable( {
        responsive: false
    });
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
    var pickedItemsTable = $('#pickedItemsTable').DataTable({
        responsive: true
    });

    // $('.chooseProductBtn').click(function (e) {
    //     e.preventDefault();
    // });

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
        $('#patronName').html(name);
    });

    $('#itemsTable').on('click', '.addItemBtn', function () {
        let em = $(this).closest('tr')
        let id = em.find('td').eq(0).text();
        let item_name = em.find('td').eq(3).text();
        let item_price = em.find('td').eq(5).text();

        pickedItemsTable.row.add([
            id,
            item_name,
            item_price,
            "<button class='btn btn-success removeItemBtn'> Remove </button>"
        ]).draw();
        setValueOfTransaction(pickedItemsTable)
        cartAll.push(id)

        $('#groupOfHiddens').append("<input type='hidden' name='chosen_items[]' id='chosenInput' value='" + id + "'>")
    });

    $('#itemsTable').on('click', '.addItemBtn', function () {
        checkIfNotEmpty(pickedItemsTable)
    });

    $('#pickedItemsTable').on('click', '.removeItemBtn', function () {
        let em = $(this).closest('tr')
        let id = em.find('td').eq(0).text();
        let item_name = em.find('td').eq(3).text();
        let item_price = em.find('td').eq(5).text();

        for (let i = 0; i < cartAll.length; i++) {
            if (cartAll[i] == id) {
                // TODO: Fix this stupid error of this array.
                // A problem with the array removing the same values. Might not be a problem
                // if I decided to create a QTY input for all these items.
                if ($('#chosenInput').val() == id) {
                    $('#chosenInput').remove()
                }

                cartAll.splice(i, 1)   
                break;
            }
        }

        alert(cartAll);


        pickedItemsTable.row($(this).parents('tr')).remove().draw()
        setValueOfTransaction(pickedItemsTable)
        checkIfNotEmpty(pickedItemsTable)
    });

    checkIfNotEmpty(pickedItemsTable)
    checkIfSus()

    $('#suppliersTable').on('click', '.chooseSupplierBtn', function () {
        let em = $(this).closest('tr');
        let id = em.find('td').eq(0).text();
        let supplier_name = em.find('td').eq(2).text();

        $('#supplierId').val(id);
        $('#supplierName').html(supplier_name);
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

function checkIfSus()
{
    if ($('#supplierId').val() == "")
    {
        $('#supplyAddBtn').prop('disabled', true)
    } else {
        $('#supplyAddBtn').prop('disabled', false)
    }
}