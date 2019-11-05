//=== Submit Products Table Script  ===
$(document).on('click', '.submit', function () {

    var url = location.protocol + '//' + location.host + '/' + window.location.pathname.split('/')[1] + '/controllers/productsCtrl.php?function=getTopProducts';

    $.ajax({
        url: url,
        dataType: 'json',
        data: {dateRange: $(".dateRange").val()},
        type: 'POST',
        timeout: 10000,
        beforeSend: function () {
            $("#overlay").fadeIn(300);
        },
        success: function (data) {

            if(data.error == true)
            {
                $(".dateErrorMsg").text(data.errorMsg);
            }
            else
            {
                var products = JSON.parse(data.products);
                var serial = 0;

                $(".dateErrorMsg").empty();
                $(".noResults").empty();
                $(".table tbody").empty();
                
                if(products.length > 0)
                {
                    for (var i = 0; i < products.length; i++)
                    {
                        serial++;
                        var tableData = '<tr>';
                        tableData += '<td>' + serial + '</td>';
                        tableData += '<td>' + products[i]['id'] + '</td>';
                        tableData += '<td>' + products[i]['name'] + '</td>';
                        tableData += '<td>' + products[i]['total_purchase'] + '</td>';
                        tableData += '</tr>';
                        $(".table tbody").append(tableData);
                    }
                }
                else
                {
                    $(".noResults").text('There are no matched records');
                }
            }
            $("#overlay").fadeOut(300);
        },
        error: function () {
            alert('Timeout, check your internet connection');
            $("#overlay").fadeOut(300);
        }
    });
});
//=== End Script ===

//=== Date Range Configuration Script ===
$('.dateRange').daterangepicker({
    startDate: moment().subtract(1, 'months').format('YYYY-MM-DD'),
    endDate: moment(),
    locale: {
        format: 'YYYY/MM/DD'
    }
})
//=== End Script ===
