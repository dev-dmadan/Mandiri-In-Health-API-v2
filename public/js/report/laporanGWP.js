document.getElementById("printButton").addEventListener("click", printExcel, false);
document.getElementById("kanalDistribusi").addEventListener("change", onChangeKanalDistribusi, false);
document.getElementById("produk").addEventListener("change", onChangeProduct, false);
document.getElementById("bulan").addEventListener("change", onChangeBulan, false);
document.getElementById("tahun").addEventListener("change", onChangeTahun, false);
document.getElementById("tipe").addEventListener("change", onChangeTipe, false);
document.getElementById("periode").addEventListener("change", onChangePeriode, false);
document.getElementById("pageNumber").addEventListener("change", onChangePageNumber, false);
document.getElementById("pageSize").addEventListener("change", onChangePageSize, false);

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


var TAHUN = localStorage["Tahun_Report"];
var BULANID = localStorage["BulanId_Report"];
var PRODUKID = localStorage["ProdukId_Report"];
var PERIODE = localStorage["Periode_Report"];
var TIPEID = localStorage["Tipe_Report"];
var PAGENUMBER = localStorage["Page_Number"];
var PAGESIZE = localStorage["Page_Size"];

document.addEventListener("DOMContentLoaded", function () {
    // $('#tableLaporanGWP').DataTable( {
    //     scrollY: "auto",
    //     scrollX: true,
    //     // scrollCollapse: true,
    //     paging: false,
    //     bFilter: false,
    //     // bAutoWidth: false,
    //     info: false,
    //     // rowsGroup : [0,1,2,3],
    //     // fixedColumns:   {
    //     //     left: 6,
    //     //     right: 2
    //     // },
    //     // language : {
    //     //     "zeroRecords": ""
    //     // },
    // });

    renderFilterKalanDistribusi();
    renderFilterProduct();
    renderFilterMonth();
    renderFilterTahun();
    renderListLaporanGWP();
    renderFilterPeriode();
    renderFilterTipeKinerja();
    renderPageNumber();
    renderPageSize();

    isFilterKanalVisible(false);
});

function isFilterKanalVisible(visible = true) {
    if (!visible) {
        const kanitfilter = document.querySelector("#kanitfilter");
        kanitfilter.remove();

        const agenfilter = document.querySelector("#agenfilter");
        agenfilter.remove();

        const targetfilter = document.querySelector("#targetfilter");
        targetfilter.remove();
    } else {
        renderFilterKanit();
        renderFilterTarget();
        renderFilterAgen();
    }
}

function printExcel() {
    let tableData = document.getElementById("tableLaporanGWP").outerHTML;
    tableData = tableData.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tableData = tableData.replace(/<input[^>]*>|<\/input>/gi, ""); //remove input params

    let a = document.createElement("a");
    a.href = `data:application/vnd.ms-excel, ${encodeURIComponent(tableData)}`;
    a.download = "Laporan GWP" + ".xls";
    a.click();
}

function onChangeKanalDistribusi() {
    const kanalDistribusiId = document.getElementById("kanalDistribusi").value;
    localStorage["kanalDistribusiId_Report"] = kanalDistribusiId;
    reload();
}

function onChangeTahun() {
    const tahun = document.getElementById("tahun").value;
    localStorage["Tahun_Report"] = tahun;
    reload();
}

function onChangeBulan() {
    const bulanId = document.getElementById("bulan").value;
    localStorage["BulanId_Report"] = bulanId;
    reload();
}

function onChangeProduct() {
    const productId = document.getElementById("produk").value;
    localStorage["ProdukId_Report"] = productId;
    reload();
}
function onChangePeriode() {
    const periode = document.getElementById("periode").value;
    localStorage["Periode_Report"] = periode;
    console.log(periode);
    reload();
}
function onChangeTipe() {
    const tipe = document.getElementById("tipe").value;
    localStorage["Tipe_Report"] = tipe;
    console.log(tipe);
    reload();
}

function onChangePageNumber() {
    const pageNumber = document.getElementById("pageNumber").value;
    localStorage["Page_Number"] = pageNumber;
    console.log(pageNumber);
    reload();
}

function onChangePageSize() {
    const pageSize = document.getElementById("pageSize").value;
    localStorage["Page_Size"] = pageSize;
    console.log(pageSize);
    reload();
}

function reload() {
    window.location = `${APP_URL}/report/view/reportLaporanGWP/` + guid;
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
        const req = await fetch(
            `${APP_URL}/dashboard/api/report-get-kanal-distribusi?SecretKey=${SECRET_KEY}`,
            {
                method: "POST",
                headers: headers,
                body: JSON.stringify({}),
            }
        );

        if (!req.ok) {
            throw new Error("Something wrong error..");
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
        const req = await fetch(
            `${APP_URL}/dashboard/api/report-get-product?SecretKey=${SECRET_KEY}`,
            {
                method: "POST",
                headers: headers,
                body: JSON.stringify({}),
            }
        );

        if (!req.ok) {
            throw new Error("Something wrong error..");
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
        const req = await fetch(
            `${APP_URL}/dashboard/api/report-get-month?SecretKey=${SECRET_KEY}`,
            {
                method: "POST",
                headers: headers,
                body: JSON.stringify({}),
            }
        );

        if (!req.ok) {
            throw new Error("Something wrong error..");
        }

        return await req.json();
    } catch (error) {
        throw error;
    }
}

/**
 * GET DATA TARGET
 * @returns LIST
 */
async function getTarget() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(
            `${APP_URL}/dashboard/api/report-get-target?SecretKey=${SECRET_KEY}`,
            {
                method: "POST",
                headers: headers,
                body: JSON.stringify({}),
            }
        );

        if (!req.ok) {
            throw new Error("Something wrong error..");
        }

        return await req.json();
    } catch (error) {
        throw error;
    }
}

/**
 * GET DATA KANIT
 * @returns LIST
 */
async function getKanit() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(
            `${APP_URL}/dashboard/api/report-get-kanit?SecretKey=${SECRET_KEY}`,
            {
                method: "POST",
                headers: headers,
                body: JSON.stringify({}),
            }
        );

        if (!req.ok) {
            throw new Error("Something wrong error..");
        }

        return await req.json();
    } catch (error) {
        throw error;
    }
}

/**
 * GET DATA AGEN
 * @returns LIST
 */
async function getAgen() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(
            `${APP_URL}/dashboard/api/report-get-agen?SecretKey=${SECRET_KEY}`,
            {
                method: "POST",
                headers: headers,
                body: JSON.stringify({}),
            }
        );

        if (!req.ok) {
            throw new Error("Something wrong error..");
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
        const req = await fetch(
            `${APP_URL}/dashboard/api/report-get-tipe-kinerja?SecretKey=${SECRET_KEY}`,
            {
                method: "POST",
                headers: headers,
                body: JSON.stringify({}),
            }
        );

        if (!req.ok) {
            throw new Error("Something wrong error..");
        }

        return await req.json();
    } catch (error) {
        throw error;
    }
}

/**
 * GET DATA LAPORAN GWP
 * @returns LIST
 */
async function getLaporanGWP() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(
            `${APP_URL}/dashboard/api/report-get-laporan-gwp?SecretKey=${SECRET_KEY}`,
            {
                method: "POST",
                headers: headers,
                body: JSON.stringify({
                    PageNumber: PAGENUMBER,
                    PageSize: PAGESIZE,
                    Tahun: TAHUN,
                    Periode: PERIODE,
                    BulanId: BULANID,
                    KanalDistribusiId: KANALDISTRIBUSIID,
                    ProductId: PRODUKID,
                    TipeId: TIPEID,
                }),
            }
        );

        if (!req.ok) {
            throw new Error("Something wrong error..");
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

        const selectOption = document.querySelector("#produk");
        var opt = document.createElement("option");
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        result.ListProduct.forEach((item) => {
            var opt = document.createElement("option");
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
 * RENDER FILTER BULAN
 * @returns VIEW
 */
async function renderFilterMonth() {
    try {
        const req = await getMonth();
        const result = req.GetMonthResult;

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector("#bulan");
        var opt = document.createElement("option");
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        result.ListMonth.forEach((item) => {
            var opt = document.createElement("option");
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

        const selectOption = document.querySelector("#tahun");
        var opt = document.createElement("option");
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
        const data = ["Ytd"];

        const selectOption = document.querySelector("#periode");
        var opt = document.createElement("option");
        opt.value = "Mtd";
        opt.innerHTML = "Mtd";
        opt.selected = true;
        selectOption.appendChild(opt);

        data.forEach((item) => {
            var opt = document.createElement("option");
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
 * RENDER FILTER KANIT
 * @returns VIEW
 */
async function renderFilterKanit() {
    try {
        const req = await getKanit();
        const result = req.GetKepalaUnitResult;
        // console.log(result);

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector("#kanit");
        var opt = document.createElement("option");
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        result.ListKepalaKanit.forEach((item) => {
            var opt = document.createElement("option");
            opt.value = item.Id;
            opt.innerHTML = item.NamaLengkap.toUpperCase();
            selectOption.appendChild(opt);
        });

        selectOption.value = KANITID;
    } catch (error) {
        throw error;
    }
}

/**
 * RENDER FILTER AGEN
 * @returns VIEW
 */
async function renderFilterAgen() {
    try {
        const req = await getAgen();
        const result = req.GetAgenResult;
        // console.log(result);

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector("#agen");
        var opt = document.createElement("option");
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        result.ListAgen.forEach((item) => {
            var opt = document.createElement("option");
            opt.value = item.Id;
            opt.innerHTML = item.AgentName.toUpperCase();
            selectOption.appendChild(opt);
        });

        selectOption.value = AGENID;
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
 * RENDER PAGE NUMBER
 * @returns VIEW
 */

async function renderPageNumber() {
    try {
        const req = await getLaporanGWP();
        const result = req.LaporanGWPResult;
        let dataSeries = [];

        let number = 0;

        if (PAGESIZE != 0) {
            number = Math.ceil(result.TotalData / PAGESIZE);
            for (let i = 1; i <= number; i++) {
                dataSeries.push(i);
            }
        } else {
            number = 0;
        }

        console.log(dataSeries);

        const selectOption = document.querySelector("#pageNumber");
        var opt = document.createElement("option");
        opt.value = 0;
        opt.innerHTML = "All";
        selectOption.appendChild(opt);

        dataSeries.forEach((item) => {
            var opt = document.createElement("option");
            opt.value = item;
            opt.innerHTML = item;
            selectOption.appendChild(opt);
        });

        selectOption.value = PAGENUMBER;
        var page_span = document.getElementById("page");
        page_span.innerHTML = PAGENUMBER + "/" + number;

        var totaldata = document.getElementById("totaldata");
        totaldata.innerHTML = result.TotalData;
    } catch (error) {
        throw error;
    }
}
/**
 * RENDER PAGE SIZE
 * @returns VIEW
 */
async function renderPageSize() {
    try {
        const data = [10, 25, 50, 100];

        const selectOption = document.querySelector("#pageSize");
        var opt = document.createElement("option");
        opt.value = 0;
        opt.innerHTML = "All";
        opt.selected = true;
        selectOption.appendChild(opt);

        data.forEach((item) => {
            var opt = document.createElement("option");
            opt.value = item;
            opt.innerHTML = item;
            selectOption.appendChild(opt);
        });

        selectOption.value = PAGESIZE;
    } catch (error) {
        throw error;
    }
}

/**
 * RENDER LIST DETAIL LAPORAN GWP
 * @returns VIEW
 */
async function renderListLaporanGWP() {
    const req = await getLaporanGWP();
    const result = req.LaporanGWPResult;
    console.log(result);

    //     if (!result.Success) {
    //         throw result.Message;
    //     }

    const tbody = document.querySelector("#tableLaporanGWP tbody");
    //     // document.getElementsByTagName("tr")[2].remove();

    let seqNo = 1;
    result.ListItem.forEach((item) => {
        let rows =
            `<th style="border: 1px solid;  background:#EEEEEE;font-weight: normal;" class="text-center">${item.SeqNo}</th>` +
            `<th style="border: 1px solid;  background:#EEEEEE;font-weight: normal;" class="text-left">${item.KanalDistribusi}</th>` +
            `<th style="border: 1px solid;  background:#EEEEEE;font-weight: normal;" class="text-center">${item.KodeBU}</th>` +
            `<th style="border: 1px solid;  background:#EEEEEE;font-weight: normal;" class="text-left">${item.NamaBU}</th>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-left text-nowrap align-middle">${item.ProdukName}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-center text-nowrap align-middle">${item.TMT}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-center text-nowrap align-middle">${item.TMB}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-center text-nowrap align-middle">${item.Termin}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-center text-nowrap align-middle">${item.KepemilikanBU}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-center text-nowrap align-middle">${item.RenewalOrNewBusiness}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.Januari}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.Februari}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.Maret}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.April}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.Mei}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.Juni}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.Juli}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.Agustus}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.September}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.Oktober}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.November}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.Desember}</td>` +
            `<td style="border: 1px solid;  background:#EEEEEE" class="text-right">${item.Total}</td>`;
        let tr = document.createElement("tr");
        tr.innerHTML = rows;
        tbody.appendChild(tr);
        seqNo++;
    });
    const tfoot = document.querySelector('#tableLaporanGWP tfoot');
    let rowsTotal =
        `<th style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold" colspan="4">TOTAL</th>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold; z-index:0"></td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold; z-index:0"></td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold; z-index:0"></td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold; z-index:0"></td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold; z-index:0"></td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold; z-index:0"></td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Januari}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Februari}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Maret}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.April}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Mei}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Juni}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Juli}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Agustus}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.September}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Oktober}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.November}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Desember}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.Total.Total}</td>`;
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}
