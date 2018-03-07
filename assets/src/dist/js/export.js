$('#exportExcel').click(function() {
    $('#printArea').removeClass('hidden');
    $('#exportTable').tableExport({ heading: true, type: 'xlsx', escape: 'false' });
    $('#printArea').addClass('hidden');
});

$('#exportCSV').click(function() {
    $('#printArea').removeClass('hidden');
    $('#exportTable').tableExport({ heading: true, type: 'csv', escape: 'false' });
    $('#printArea').addClass('hidden');
});

$('#exportPDF').click(function() {

    $('#printArea').removeClass('hidden');
    $('#exportTable').tableExport({ heading: true, type: 'pdf', escape: 'false' });
    $('#printArea').addClass('hidden');
});

$('#exportPrint').click(function() {
    $('#printArea').removeClass('hidden');

    var originalContents = document.body.innerHTML;
    document.body.innerHTML = $('#printArea').html();
    window.print();
    document.body.innerHTML = originalContents;
    location.reload();
});