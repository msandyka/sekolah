/**
 * @summary     Custom
 * @description Initialization, Action
 * @file        main.js
 * @author      Vicky Chrystian Sugiarto
 * @contact     vicky.chryst@gmail.com
 *
 * This source file is free software
 *
 * This source file is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.
 *
 */

/**
 * @Input Mask
 *
 */
$('.form-qty').mask("#");
$('.form-money').mask("#.##0", {reverse: true});

/**
 * @Custom Money Display
 *
 */
function money(data) {
    return data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
}

/**
 * @Datatable Initialization
 * @jquery.datatables.js 
 *
 */
$('#master-barang').DataTable();
$('#transaksi-barang').DataTable({
	order: [[0, "asc"], [0, "asc"]]
});
$('#daftar-harga').DataTable();

/**
 * @Bootstrap Select Ajax
 * @Item Ajax, Discount Ajax
 * @ajax-bootstrap-select.js
 *
 */
$('.txtItemAjax').selectpicker({liveSearch: true}).ajaxSelectPicker({
    ajax: {
        type: "GET",
        url: base_url+'inventory/item-transaction/item',
        data: function () {
            var params = {
                q: '{{{q}}}'
            };
            return params;
        },
        cache: false,
    },
    locale: {
        emptyTitle: 'Cari Barang'
    },
    preprocessData: function(data){
        var options = [];
        for (var i = 0; i < data.length; i++) {
            options.push(
                {
                    'value': data[i]['item_id'],
                    'text': data[i]['item_code'] + ' - ' + data[i]['item_name'],
                    'disabled': false
                }
            );
        }
        return options;
    },
    preserveSelected: false
});

$('.txtDiscAjax').selectpicker({liveSearch: true}).ajaxSelectPicker({
    ajax: {
        type: "GET",
        url: base_url+'om/sales/discount',
        data: function () {
            var params = {
                q: '{{{q}}}'
            };
            return params;
        },
        cache: false,
    },
    locale: {
        emptyTitle: 'Cari Diskon'
    },
    preprocessData: function(data){
        var options = [];
        for (var i = 0; i < data.length; i++) {
            options.push(
                {
                    'value': data[i]['discount_id'],
                    'text': data[i]['discount_value']+' '+data[i]['discount_operand']+' ('+data[i]['discount_name']+')',
                    'data': {
                        'amount': data[i]['discount_value']+' '+data[i]['discount_operand']
                    },
                    'disabled': false
                }
            );
        }
        return options;
    },
    preserveSelected: false
});