$(function () {
    var chartItemLabels = []
    var chartitemDatasets = []

    $('#invoiceListTable').DataTable({
        responsive: true
    })

    $('#stocksListTable').DataTable({
        responsive: true
    })

    var hiddenItemsTable = $('#hiddenReportsItemTable').DataTable({
        responsive: true
    })

    const dChart = document.getElementById('demandChart').getContext('2d');

    hiddenItemsTable.on('draw', function () {
        hiddenItemsTable.rows().every( function ( rowIdx, tableLoop, rowLoop) {
            var data = this.data();
            var nameCell = this.cell({row: rowIdx, column: 1}).data();
            var stockCell = this.cell({row: rowIdx, column: 2}).data();

            chartItemLabels.push(nameCell)
            chartitemDatasets.push(stockCell)
        })

        const demandChart = new Chart(dChart, {
            type: 'bar',
            data: {
                labels: chartItemLabels,
                datasets: [{
                    label: 'Item Demands',
                    data: chartitemDatasets,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    })

    hiddenItemsTable.draw()
    hiddenItemsTable.clear().destroy()
    $('#hiddenItemTableDiv').remove()
});