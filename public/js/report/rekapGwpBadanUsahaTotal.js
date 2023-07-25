document.getElementById("printButton").addEventListener("click", printExcel, false);
document.getElementById("kanalDistribusi").addEventListener("change", onChangeKanalDistribusi, false);
document.getElementById("produk").addEventListener("change", onChangeProduct, false);
document.getElementById("bulan").addEventListener("change", onChangeBulan, false);
document.getElementById("tahun").addEventListener("change", onChangeTahun, false);
document.getElementById("target").addEventListener("change", onChangeTarget, false);
document.getElementById("kanit").addEventListener("change", onChangeKanit, false);
document.getElementById("agen").addEventListener("change", onChangeAgen, false);
document.getElementById("periode").addEventListener("change", onChangePeriode, false);
document.getElementById("tipe").addEventListener("change", onChangeTipe, false);
document.getElementById("pageNumber").addEventListener("change", onChangePageNumber, false);
document.getElementById("pageSize").addEventListener("change", onChangePageSize, false);

// document.getElementById("btn_prev").addEventListener("click", prevPage, false);
// document.getElementById("btn_next").addEventListener("click", nextPage, false);
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


var TARGETID = localStorage["TargetId_Report"];
var KANITID = localStorage["KanitId_Report"];
var AGENID = localStorage["AgenId_Report"];
var TAHUN = localStorage["Tahun_Report"];
var BULANID = localStorage["BulanId_Report"];
var PRODUKID = localStorage["ProdukId_Report"];
var PERIODE = localStorage["Periode_Report"];
var TIPEID = localStorage["Tipe_Report"];
var PAGENUMBER = localStorage["Page_Number"];
var PAGESIZE = localStorage["Page_Size"];

document.addEventListener("DOMContentLoaded", function () {
    renderFilterKalanDistribusi();
    renderFilterProduct();
    renderFilterMonth();
    renderFilterTahun();
    renderRekapGwpTotal();
    renderFilterTipeKinerja();
    renderFilterPeriode();
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

        // const periodefilter = document.querySelector('#periodefilter');
        // periodefilter.remove();
    } else {
        renderFilterTarget();
        renderFilterKanit();
        renderFilterAgen();
    }
}


function printExcel() {
    let tableData = document.getElementById(
        "tableRekapGwpBadanUsahaTotal"
    ).outerHTML;
    tableData = tableData.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tableData = tableData.replace(/<input[^>]*>|<\/input>/gi, ""); //remove input params

    let a = document.createElement("a");
    a.href = `data:application/vnd.ms-excel, ${encodeURIComponent(tableData)}`;
    a.download = "REKAP GWP BADAN USAHA TOTAL" + ".xls";
    a.click();
}

function onChangeKanalDistribusi() {
    const kanalDistribusiId = document.getElementById("kanalDistribusi").value;
    localStorage["kanalDistribusiId_Report"] = kanalDistribusiId;
    reload();
    console.log(kanalDistribusiId);
}

function onChangeTahun() {
    const tahun = document.getElementById("tahun").value;
    localStorage["Tahun_Report"] = tahun;
    console.log(tahun);
    reload();
}

function onChangeBulan() {
    const bulanId = document.getElementById("bulan").value;
    localStorage["BulanId_Report"] = bulanId;
    console.log(bulanId);
    reload();
}

function onChangeProduct() {
    const productId = document.getElementById("produk").value;
    localStorage["ProdukId_Report"] = productId;
    console.log(productId);
    reload();
}
function onChangeTarget() {
    const targetId = document.getElementById("target").value;
    localStorage["TargetId_Report"] = targetId;
    console.log(targetId);
    reload();
}

function onChangeKanit() {
    const kanitId = document.getElementById("kanit").value;
    localStorage["KanitId_Report"] = kanitId;
    console.log(kanitId);
    reload();
}

function onChangeAgen() {
    const agenId = document.getElementById("agen").value;
    localStorage["AgenId_Report"] = agenId;
    console.log(agenId);
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
    window.location = `${APP_URL}/report/view/performanceRekapGWPBUTotal/` + guid;
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
 * GET DATA KINERJA KANIT PER PRODUK
 * @returns LIST
 */
async function getRekapGwpTotal() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(
            `${APP_URL}/dashboard/api/report-get-rekap-gwp-bu-total?SecretKey=${SECRET_KEY}`,
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
                    ProdukId: PRODUKID,
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
 * RENDER FILTER TARGET
 * @returns VIEW
 */
async function renderFilterTarget() {
    try {
        const req = await getTarget();
        const result = req.GetTargetResult;

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#target');
        var dataTarget = result.ListTarget;

        if (guid != "00000000-0000-0000-0000-000000000000") {
            dataTarget = dataTarget.filter(item => item.Id == "88ea96e3-a566-4fe3-bd45-4410bd5a2e76");
        } else {
            dataTarget = dataTarget;
            var opt = document.createElement('option');
            opt.value = "00000000-0000-0000-0000-000000000000";
            opt.innerHTML = "ALL";
            selectOption.appendChild(opt);
        }

        dataTarget.forEach(item => {
            var opt = document.createElement('option');
            opt.value = item.Id;
            opt.innerHTML = item.Name;
            selectOption.appendChild(opt);
        });

        selectOption.value = TARGETID;
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
 * RENDER PAGE NUMBER
 * @returns VIEW
 */

async function renderPageNumber() {
    try {
        const req = await getRekapGwpTotal();
        const result = req.RekapGWPBuTotalResult;
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

        if (guid != "") {
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
 * RENDER LIST REKAP GWP TOTAL
 * @returns VIEW
 */
async function renderRekapGwpTotal() {
    const req = await getRekapGwpTotal();
    const result = req.RekapGWPBuTotalResult;

    if (!result.Status.Success) {
        throw result.Status.Message;
    }

    // document.getElementsByTagName("tr")[7].remove();
    const tbody = document.querySelector("#tableRekapGwpBadanUsahaTotal tbody");

    // let seqNo = 1;
    result.ListItemRekapGWP.forEach((item) => {
        let rows =
            `<th  style="border: 1px solid; text-align: center; background:#EEEEEE; font-weight: normal;">${item.Item16}</th>` +
            `<th  style="border: 1px solid; text-align: left; background:#EEEEEE; font-weight: normal;">${item.Name}</th>` +
            `<th  style="border: 1px solid; text-align: center; background:#EEEEEE; font-weight: normal;">${item.Item14}</th>` +
            `<th   style="border: 1px solid; text-align: left; background:#EEEEEE; font-weight: normal;">${item.Item15}</th>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item1}</td>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item2}</td>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item3}</td>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item4}</td>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item5}</td>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item6}</td>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item7}</td>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item8}</td>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item9}</td>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item10}</td>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item11}</td>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item12}</td>` +
            `<td  style="border: 1px solid; text-align: right; background:#EEEEEE">${item.Item13}</td>`;

        let tr = document.createElement("tr");
        tr.innerHTML = rows;
        tbody.appendChild(tr);
        // seqNo++;
    });
    const tfoot = document.querySelector('#tableRekapGwpBadanUsahaTotal tfoot');
    let rowsTotal =
        `<th style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold" colspan="4">TOTAL</th>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item1}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item2}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item3}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item4}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item5}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item6}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item7}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item8}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item9}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item10}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item11}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item12}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold; z-index:0">${result.TotalRekapGWP.Item13}</td>`;
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * HELPER COLOR PROGRESS BAR
 * @returns COLOR
 */
function progressBarColor(amount) {
    let result;

    if (parseFloat(amount) >= 100) {
        result = COLORS.GREEN;
    }

    if (parseFloat(amount) >= 95 && parseFloat(amount) < 100) {
        result = COLORS.YELLOW;
    }

    if (parseFloat(amount) < 95) {
        result = COLORS.RED;
    }
    return result;
}
