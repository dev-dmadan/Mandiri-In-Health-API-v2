document.getElementById ("printButton").addEventListener ("click", printExcel, false);
document.getElementById ("kanalDistribusi").addEventListener ("change", onChangeKanalDistribusi, false);
document.getElementById ("produk").addEventListener ("change", onChangeProduct, false);
document.getElementById ("bulan").addEventListener ("change", onChangeBulan, false);
document.getElementById ("tahun").addEventListener ("change", onChangeTahun, false);
document.getElementById("periode").addEventListener("change", onChangePeriode, false);
document.getElementById ("tipe").addEventListener ("change", onChangeTipe, false);

var url = window.location.pathname.split('/');
var guid = url[4];
console.log("data id", url);

if (guid != "00000000-0000-0000-0000-000000000000") {
    localStorage['kanalDistribusiId_Report'] = guid;
    localStorage["Tipe_Report"] = "19752653-2e64-4683-bb33-548464536c98";
    localStorage["TargetId_Report"] = "88ea96e3-a566-4fe3-bd45-4410bd5a2e76";

    var TIPEID = localStorage["Tipe_Report"];
    var TARGETID = localStorage["TargetId_Report"];
    var KANALDISTRIBUSIID = localStorage['kanalDistribusiId_Report']; 
} else {
    var KANALDISTRIBUSIID = localStorage['kanalDistribusiId_Report'];
    var TIPEID = localStorage["Tipe_Report"];
    var TARGETID = localStorage["TargetId_Report"];
}


var TAHUN = localStorage['Tahun_Report'];
var BULANID = localStorage['BulanId_Report'];
var PRODUKID = localStorage['ProdukId_Report'];
var PERIODE = localStorage['Periode_Report'];
var TIPEID = localStorage['Tipe_Report'];

document.addEventListener('DOMContentLoaded', function () {

    renderFilterKalanDistribusi();
    renderFilterProduct();
    renderFilterMonth();
    renderFilterTahun();
    renderListActualPerProduk();
    renderFilterPeriode();
    renderFilterTipeKinerja();

    isFilterKanalVisible(false);
});

function isFilterKanalVisible(visible = true) {
    if (!visible) {
        const kanitfilter = document.querySelector('#kanitfilter');
        kanitfilter.remove();

        const agenfilter = document.querySelector('#agenfilter');
        agenfilter.remove();

        const produkfilter = document.querySelector('#targetfilter');
        produkfilter.remove();

        
    } else {
        renderFilterKanit();
        renderFilterProduct();
        renderFilterAgen();
    }
}

function printExcel() {
    let tableData = document.getElementById("tableActualPerProduk").outerHTML;
    tableData = tableData.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tableData = tableData.replace(/<input[^>]*>|<\/input>/gi, ""); //remove input params

    let a = document.createElement('a');
    a.href = `data:application/vnd.ms-excel, ${encodeURIComponent(tableData)}`
    a.download = 'Actual GWP Per Produk' + '.xls'
    a.click();
}

function onChangeKanalDistribusi() {
    const kanalDistribusiId = document.getElementById("kanalDistribusi").value;
    localStorage['kanalDistribusiId_Report'] = kanalDistribusiId;
    console.log(kanalDistribusiId);
    reload();
}

function onChangeTahun() {
    const tahun = document.getElementById("tahun").value;
    localStorage['Tahun_Report'] = tahun;
    console.log(tahun);
    reload();
}

function onChangeBulan() {
    const bulanId = document.getElementById("bulan").value;
    localStorage['BulanId_Report'] = bulanId;
    console.log(bulanId);
    reload();
}

function onChangeProduct() {
    const productId = document.getElementById("produk").value;
    localStorage['ProdukId_Report'] = productId;
    console.log(productId);
    reload();
}

function onChangePeriode() {
    const periode = document.getElementById("periode").value;
    localStorage['Periode_Report'] = periode;
    console.log(periode);
    reload();
}

function onChangeTipe() {
    const tipe = document.getElementById("tipe").value;
    localStorage['Tipe_Report'] = tipe;
    console.log(tipe);
    reload();
}

function reload() {
    window.location = `${APP_URL}/report/view/reportActualPerProduk`;
}

/**
** ============================================== GET DATA ==============================================
*/

/**
 * GET DATA KANAL DISTRIBUSI
 * @returns LIST
 */
async function getKanalDistribusi() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/report-get-kanal-distribusi?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                
            })
        });

        if (!req.ok) {
            throw new Error('Something wrong error..');
        }

        return await req.json();
    } catch (error) {
        throw error;
    }
}
/**
 * GET DATA PRODUCT
 * @returns LIST
 */
async function getProduct() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/report-get-product?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                
            })
        });

        if (!req.ok) {
            throw new Error('Something wrong error..');
        }

        return await req.json();
    } catch (error) {
        throw error;
    }
}
/**
 * GET DATA BULAN
 * @returns LIST
 */
async function getMonth() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/report-get-month?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                
            })
        });

        if (!req.ok) {
            throw new Error('Something wrong error..');
        }

        return await req.json();
    } catch (error) {
        throw error;
    }
}

/**
 * GET DATA TIPE KINERJA
 * @returns LIST
 */
async function getTipeKinerja() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/report-get-tipe-kinerja?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                
            })
        });

        if (!req.ok) {
            throw new Error('Something wrong error..');
        }

        return await req.json();
    } catch (error) {
        throw error;
    }
}
/**
 * GET DATA ACTUAL PER KANAL
 * @returns LIST
 */
async function getActualPerProduk() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/report-get-actual-produk?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KANALDISTRIBUSIID,
                Tahun: TAHUN,
                BulanId : BULANID,
                ProdukId: PRODUKID,
                Periode: PERIODE,
                TipeId: TIPEID,
            })
        });

        if (!req.ok) {
            throw new Error('Something wrong error..');
        }

        return await req.json();
    } catch (error) {
        throw error;
    }
}
/**
** ============================================== RENDER ==============================================
*/

/**
 * RENDER FILTER KANAL DISTRIBUSI
 * @returns VIEW
 */
async function renderFilterKalanDistribusi() {
    try {
        const req = await getKanalDistribusi();
        const result = req.GetKanalDistribusiResult;
   
        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#kanalDistribusi');
        var dataKanal = result.ListKanalDistribusi;
        
        if (guid != "00000000-0000-0000-0000-000000000000") {
            dataKanal = dataKanal.filter(item => item.Id == guid);
        } else {
            dataKanal = dataKanal;
            var opt = document.createElement('option');
            opt.value = "00000000-0000-0000-0000-000000000000";
            opt.innerHTML = "ALL";
            selectOption.appendChild(opt);
        }

        dataKanal.forEach(item => {
            var opt = document.createElement('option');
            opt.value = item.Id;
            opt.innerHTML = item.NamaKC;
            selectOption.appendChild(opt);
        });

        selectOption.value = KANALDISTRIBUSIID;

    } catch (error) {
        throw error;
    }
}

/**
 * RENDER FILTER PRODUCT
 * @returns VIEW
 */
async function renderFilterProduct() {
    try {
        const req = await getProduct();
        const result = req.GetProductResult;

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#produk');
        var opt = document.createElement('option');
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        result.ListProduct.forEach(item => {
            var opt = document.createElement('option');
            opt.value = item.Id;
            opt.innerHTML = item.Name;
            selectOption.appendChild(opt);
        });

        selectOption.value = PRODUKID;

    } catch (error) {
        throw error;
    }
}

/**
 * RENDER FILTER PERKIRAAN CLOSING
 * @returns VIEW
 */

async function renderFilterMonth() {
    try {
        const req = await getMonth();
        const result = req.GetMonthResult;

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#bulan');
        var opt = document.createElement('option');
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        result.ListMonth.forEach(item => {
            var opt = document.createElement('option');
            opt.value = item.Id;
            opt.innerHTML = item.Name;
            selectOption.appendChild(opt);
        });

        selectOption.value = BULANID;

    } catch (error) {
        throw error;
    }
}
/**
 * RENDER FILTER TAHUN
 * @returns VIEW
 */
async function renderFilterTahun() {
    try {
        // const data = [
        //     "2021",
        //     "2023"
        // ];

        const selectOption = document.querySelector('#tahun');
        var opt = document.createElement('option');
        opt.value = "2023";
        opt.innerHTML = "2023";
        opt.selected = true;
        selectOption.appendChild(opt);

        // data.forEach(item => {
        //     var opt = document.createElement('option');
        //     opt.value = item;
        //     opt.innerHTML = item;
        //     selectOption.appendChild(opt);
        // });

        selectOption.value = TAHUN;

    } catch (error) {
        throw error;
    }
}

/**
 * RENDER FILTER PERIODE
 * @returns VIEW
 */
async function renderFilterPeriode() {
    try {
        const data = [
            "Ytd"
        ];

        const selectOption = document.querySelector('#periode');
        var opt = document.createElement('option');
        opt.value = "Mtd";
        opt.innerHTML = "Mtd";
        opt.selected = true;
        selectOption.appendChild(opt);

        data.forEach(item => {
            var opt = document.createElement('option');
            opt.value = item;
            opt.innerHTML = item;
            selectOption.appendChild(opt);
        });

        selectOption.value = PERIODE;

    } catch (error) {
        throw error;
    }
}
/**
 * RENDER FILTER TIPE KINERJA
 * @returns VIEW
 */

async function renderFilterTipeKinerja() {
    try {
        const req = await getTipeKinerja();
        const result = req.GetTipeKinerjaResult;

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#tipe');
        var dataTipeKinerja = result.ListTipeKinerja;

        if (guid != "00000000-0000-0000-0000-000000000000") {
            dataTipeKinerja = dataTipeKinerja.filter(item => item.Id == "19752653-2e64-4683-bb33-548464536c98");
        } else {
            dataTipeKinerja = dataTipeKinerja;
            var opt = document.createElement('option');
            opt.value = "00000000-0000-0000-0000-000000000000";
            opt.innerHTML = "ALL";
            selectOption.appendChild(opt);
        }

        dataTipeKinerja.forEach(item => {
            var opt = document.createElement('option');
            opt.value = item.Id;
            opt.innerHTML = item.Name;
            selectOption.appendChild(opt);
        });

        selectOption.value = TIPEID;

    } catch (error) {
        throw error;
    }
}

/**
 * RENDER LIST DETAIL AKTUAL PER PRODUK
 * @returns VIEW
 */
async function renderListActualPerProduk() {
    const req = await getActualPerProduk();
    const result = req.ActualPerProdukResult;

    var dataProduk = result.ListItem;
    dataProduk = dataProduk.filter(item => item.Name != "INDIVIDU");
    
    if (!result.Status.Success) {
        throw result.Status.Message;
    }

    // document.getElementsByTagName("tr")[6].remove();
    const tbody = document.querySelector('#tableActualPerProduk tbody');

    let seqNo = 1;
    dataProduk.forEach(item => {
        let rows =
            `<th style="border: 1px solid; text-align: center; background:#EEEEEE;font-weight: normal;">${seqNo}</th>` +
            `<th style="border: 1px solid; text-align: left; background:#EEEEEE;font-weight: normal;">${item.Name}</th>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item1}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item2}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item3}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item4}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item5}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item6}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item7}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item8}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item9}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item10}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item11}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item12}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item13}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item14}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item15}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item16}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item17}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item18}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item19}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item20}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item21}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item22}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item23}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item24}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item25}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item26}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item27}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item28}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item29}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item30}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item31}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item32}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item33}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item34}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item35}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item36}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item37}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item38}</td>` +
            `<td style="border: 1px solid; text-align: right; background:#EEEEEE;">${item.Item39}</td>` 
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
        seqNo++;
    });
    const tfoot = document.querySelector('#tableActualPerProduk tfoot');
    let rowsTotal =
        `<th style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold" colspan ="2">TOTAL</th>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item1}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item2}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item3}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item4}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item5}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item6}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item7}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item8}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item9}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item10}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item11}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item12}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item13}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item14}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item15}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item16}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item17}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item18}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item19}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item20}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item21}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item22}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item23}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item24}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item25}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item26}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item27}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item28}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item29}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item30}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item31}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item32}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item33}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item34}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item35}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item36}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item37}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item38}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Item39}</td>` 
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}