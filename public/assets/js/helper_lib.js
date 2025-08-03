function showPagination(totalItems, currentPage, limit) {
    let totalPages = Math.ceil(totalItems / limit);  
    let paginationHtml = '';

    paginationHtml += '<li class="page-item ' + (currentPage === 1 ? 'disabled' : '') + '"><a class="page-link prev" href="#">«</a></li>';

    for (let i = 1; i <= totalPages; i++) {
        paginationHtml += '<li class="page-item ' + (i === currentPage ? 'active' : '') + '"><a class="page-link" href="#">' + i + '</a></li>';
    }

    paginationHtml += '<li class="page-item ' + (currentPage === totalPages ? 'disabled' : '') + '"><a class="page-link next" href="#">»</a></li>';

    $('.pagination').html(paginationHtml);  
}

function showPaginationText(currentPage, limit, totalItems) {
    let start = (currentPage - 1) * limit + 1;
    let end = Math.min(currentPage * limit, totalItems);

    let showingText = `Showing ${start} to ${end} of ${totalItems} entries`;
    $('.showing-info').text(showingText);  
}


function gotopage(obj, tab) {
    var a = $(obj).prev().val();
    var b = parseInt(a);
    if (b === 0) {
        b = 1;
    };
    paging(b, tab);
}

function pagination(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li><a onclick="paging(1,' + tab + ')">First</a></li>';
    var last = '<li><a onclick="paging(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
        click_prev = 'onclick="paging(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li><a ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
        click_next = 'onclick="paging(' + (page + 1) + ',' + tab + ')"';
    };
    var next = '<li><a ' + click_next + '>&raquo;</a></li>';

    var page_numb = '';
    var act_click = '';
    var start = page - 2;
    var finish = page + 2;
    if (start < 1) {
        start = 1;
    }

    if (finish > total_page) {
        finish = total_page;
    }

    for (var p = start; p <= finish; p++) {

        if (p !== page) {
            page_numb += '<li><a onclick="paging(' + p + ',' + tab + ')">' + p + '</a></li>';
        } else {
            page_numb += '<li class="active"><span>'+
                '<input min="1" onkeyup="KuduAngka(this)" type="number" value="' + page + '" style="width:50px;height:26.5px;text-align:center;border:none;font-size:14px;" /><button style="border:none;" class="btn btn-default btn-xs" title="Lompat ke halaman" onclick="gotopage(this, ' + tab + ')"><i class="fa fa-search"></i></button>'+
                '</span></li>';
        }

    };



    return '<ul class="pagination pointer">' + first + prev + page_numb + next + last + '</ul>';
}

function page_summary(total_data, total_datapage, limit, page) {
    var start = ((page - 1) * limit) + 1;

    var finish = (start - 1) + total_datapage;
    if (finish < 1) {
        start = 0;
    };
    var str = '<div class="dataTables_info">Showing ' + start + ' to ' + finish + ' of ' + total_data + ' entries</div>';

    return str;
}


function KuduAngka(obj) {
    a = obj.value;
    b = a.replace(/[^\d]/g, '');
    if (b.charAt(0) === '0') {
        b = b.substring(1, b.length)
    };
    c = '';
    lengthchar = b.length;
    j = 0;
    for (i = lengthchar; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
            c = b.substr(i - 1, 1) + '' + c;
        } else {
            c = b.substr(i - 1, 1) + c;
        }
    }

    if (c === '') {
        c = 0;
    };
    obj.value = c;
}

/* 
    require : 'YYYY-MM-DD'
    return : 'DD-MM-YYYY'
*/
function datefsql(date) {
    if (date !== undefined && date !== null && date !== 'null') {
        var elem = date.split('-');
        var tahun = elem[0];
        var bulan = elem[1];
        var hari = elem[2];
        return hari + '/' + bulan + '/' + tahun;
    } else {
        return '';
    }
}

function validFeedback(inputEl, message) {
    // validFeedback('#old_pw_change', 'Please provide a valid password');

    const inputElement = $(inputEl);
    const feedbackElement = inputElement.siblings('.valid-feedback');

    if (!feedbackElement.length) {
        inputElement.after('<div class="valid-feedback"><small>' + message + '</small></div>');
    }

    inputElement.removeClass('is-invalid');
    inputElement.addClass('is-valid');
    feedbackElement.hide();
}

function invalidFeedback(inputEl, message) {
    const inputElement = $(inputEl);
    const feedbackElement = inputElement.siblings('.invalid-feedback');

    if (!feedbackElement.length) {
        inputElement.after('<div class="invalid-feedback"><small>' + message + '</small></div>');
    }

    inputElement.removeClass('is-valid');
    inputElement.addClass('is-invalid');
    feedbackElement.text(message).show();
}

function removeFeedback(inputEl) {
    const inputElement = $(inputEl);
    const feedbackElement = inputElement.siblings('.invalid-feedback');

    inputElement.removeClass('is-valid');
    inputElement.removeClass('is-invalid');
    feedbackElement.hide();
}

function currencyToNumber(a) {
    var c = 0; var n = 0;
    if (a !== null && a !== undefined) {
        c = a.replace(/\.+/g, '');
        n = c.replace(/,/g, '.');
    }
    return parseFloat(n);
}

function roundToTwo(num) {
    return +(Math.round(num + "e+2") + "e-2");
}

function numtocurr(a) {
    if (a !== null) {
        a = a.toString();
        var b = a.replace(/[^\d\,]/g, '');
        var dump = b.split(',');
        var c = '';
        var lengthchar = dump[0].length;
        var j = 0;
        for (var i = lengthchar; i > 0; i--) {
            j = j + 1;
            if (((j % 3) == 1) && (j != 1)) {
                c = dump[0].substr(i - 1, 1) + '.' + c;
            } else {
                c = dump[0].substr(i - 1, 1) + c;
            }
        }

        if (dump.length > 1) {
            if (dump[1].length > 0) {
                c += ',' + dump[1];
            } else {
                c += ',';
            }
        }
        return c;
    } else {
        return '0';
    }
}

function money_format(num, def = '') {
    if (num != null) {
        if (num >= 0) {
            if (num.toString().indexOf('.') !== -1) {
                var coma = roundToTwo(num).toString().split('.');
                var new_coma = numtocurr(coma[0]);
                var new_coma2 = '';
                if (coma[1] !== undefined && coma[1].length === 1) {
                    new_coma2 = coma[1] + '0';
                }
                else if (coma[1] === undefined) {
                    new_coma2 = '00';
                }
                else {
                    new_coma2 = coma[1];
                }
                if (new_coma2 === '00') {
                    return new_coma;
                } else {
                    var new_num = new_coma + ',' + new_coma2;
                    return new_num;
                }

            } else {
                return numtocurr(num);
            }
        }
        if (num < 0) {
            if (Math.abs(num).toString().indexOf('.') !== -1) {
                var coma = roundToTwo(num).toString().split('.');
                var new_coma = numtocurr(coma[0]);
                var new_coma2 = '';

                if (((coma[1] !== undefined) ? coma[1] : '0').length === 1) {
                    new_coma2 = ((coma[1] !== undefined) ? coma[1] : '0') + '0';
                } else {
                    new_coma2 = coma[1];
                }
                var new_num = new_coma + ',' + new_coma2;
                return '-' + new_num;
            } else {
                return '-' + numtocurr(num);
            }
        }
    } else {
        return def;
    }
}

function toFormation(obj) {
    var a = obj.value;
    var b = a.split('.');
    var after_koma = b[1];
    if (parseFloat(after_koma) === 0 || after_koma === undefined) {
        after_koma = '00';
    }
    if (parseFloat(after_koma) > 0) {
        after_koma = b[1];
    }
    var c = '';
    if (a !== '') {
        c = numberToCurrency(currencyToNumber(b[0])) + ',' + after_koma;
    }
    obj.value = c;
}


