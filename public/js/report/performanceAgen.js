document.getElementById ("printButton").addEventListener ("click", printExcel, false);
document.getElementById ("kanalDistribusi").addEventListener ("change", onChangeKanalDistribusi, false);
document.getElementById ("produk").addEventListener ("change", onChangeProduct, false);
document.getElementById ("bulan").addEventListener ("change", onChangeBulan, false);
document.getElementById("tahun").addEventListener("change", onChangeTahun, false);
document.getElementById ("target").addEventListener ("change", onChangeTarget, false);
document.getElementById ("kanit").addEventListener ("change", onChangeKanit, false);
document.getElementById("agen").addEventListener("change", onChangeAgen, false);
document.getElementById ("periode").addEventListener ("change", onChangePeriode, false);
document.getElementById ("tipe").addEventListener ("change", onChangeTipe, false);
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

var TARGETID = localStorage['TargetId_Report'];
var KANITID = localStorage['KanitId_Report'];
var AGENID = localStorage['AgenId_Report'];
var KANALDISTRIBUSIID = localStorage['kanalDistribusiId_Report'];
var TAHUN = localStorage['Tahun_Report'];
var BULANID = localStorage['BulanId_Report'];
var PRODUKID = localStorage['ProdukId_Report'];
var PERIODE = localStorage['Periode_Report'];
var TIPEID = localStorage['Tipe_Report'];
var PAGENUMBER = localStorage["Page_Number"];
var PAGESIZE = localStorage["Page_Size"];

document.addEventListener('DOMContentLoaded', function () {
    renderFilterKalanDistribusi();
    renderFilterProduct();
    renderFilterMonth();
    renderFilterTahun();
    renderListPerformanceAgen();
    renderFilterTipeKinerja();
    // renderFilterPeriode();
    renderFilterTarget();
    renderFilterKanit();
    renderFilterAgen();
    renderPageNumber();
    renderPageSize();


    isFilterKanalVisible(false);
});

function isFilterKanalVisible(visible = true) {
    if (!visible) {

        const periodefilter = document.querySelector('#periodefilter');
        periodefilter.remove();

    } else {
        renderFilterTarget();
        renderFilterKanit();
        renderFilterAgen();
    }
}

function printExcel() {
    let tableData = document.getElementById("tablePerformanceAgen").outerHTML;
    tableData = tableData.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tableData = tableData.replace(/<input[^>]*>|<\/input>/gi, ""); //remove input params

    let a = document.createElement('a');
    a.href = `data:application/vnd.ms-excel, ${encodeURIComponent(tableData)}`
    a.download = 'PERFORMANCE AGEN' + '.xls'
    a.click();
}

function onChangeKanalDistribusi() {
    const kanalDistribusiId = document.getElementById("kanalDistribusi").value;
    localStorage['kanalDistribusiId_Report'] = kanalDistribusiId;
    reload();
    console.log(kanalDistribusiId);
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
function onChangeTarget() {
    const targetId = document.getElementById("target").value;
    localStorage['TargetId_Report'] = targetId;
    console.log(targetId);
    reload();
}

function onChangeKanit() {
    const kanitId = document.getElementById("kanit").value;
    localStorage['KanitId_Report'] = kanitId;
    console.log(kanitId);
    reload();
}

function onChangeAgen() {
    const agenId = document.getElementById("agen").value;
    localStorage['AgenId_Report'] = agenId;
    console.log(agenId);
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
    window.location = `${APP_URL}/report/view/performanceAgen/` + guid;
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
 * GET DATA TARGET
 * @returns LIST
 */
async function getTarget() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/report-get-target?SecretKey=${SECRET_KEY}`, {
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
 * GET DATA KANIT
 * @returns LIST
 */
async function getKanit() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/report-get-kanit?SecretKey=${SECRET_KEY}`, {
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
 * GET DATA AGEN
 * @returns LIST
 */
async function getAgen() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/report-get-agen?SecretKey=${SECRET_KEY}`, {
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
 * GET DATA REKAP GWP BADAN USAHA
 * @returns LIST
 */
async function getPerformanceAgen() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/report-get-performance-agen?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                PageNumber: PAGENUMBER,
                PageSize: PAGESIZE,
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                KaUnitId: KANITID,
                AgenId: AGENID,
                TargetId: TARGETID,
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

        var dataKanit = result.ListKepalaKanit;
        if (KANALDISTRIBUSIID ==  "00000000-0000-0000-0000-000000000000") {
            dataKanit = dataKanit;
        } else {
            dataKanit = dataKanit.filter(item => item.KanalSekarangId == KANALDISTRIBUSIID);
        }

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#kanit');
        var opt = document.createElement('option');
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        dataKanit.forEach(item => {
            var opt = document.createElement('option');
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

        var dataAgen = result.ListAgen;
        if (KANITID ==  "00000000-0000-0000-0000-000000000000") {
            dataAgen = dataAgen;
        } else {
            dataAgen = dataAgen.filter(item => item.KanitId == KANITID);
        }

        if (KANALDISTRIBUSIID == "00000000-0000-0000-0000-000000000000") {
            dataAgen = dataAgen;
        } else {
            dataAgen = dataAgen.filter(item => item.KanalDistribusiId == KANALDISTRIBUSIID);
        }
        

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#agen');
        var opt = document.createElement('option');
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        dataAgen.forEach(item => {
            var opt = document.createElement('option');
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
        const req = await getPerformanceAgen();
        const result = req.PerformanceAgenResult;
        
        let dataSeries = [];

        let number = 0;
        console.log(result.TotalData);
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
 * RENDER LIST REKAP GWP BADAN USAHA
 * @returns VIEW
 */
async function renderListPerformanceAgen() {
    const req = await getPerformanceAgen();
    const result = req.PerformanceAgenResult;

    if (!result.Status.Success) {
        throw result.Status.Message;
    }

    // document.getElementsByTagName("tr")[7].remove();
    const tbody = document.querySelector('#tablePerformanceAgen tbody');
    
    let seqNo = 1;
    result.ListItem.forEach(item => {
        let rows =
            `<td style="border: 1px solid; text-align: center">${seqNo}</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item1}</td>` +
            `<td style="border: 1px solid; text-align: left">${item.Name.toUpperCase()}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item2}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item3}</td>` + 
            `<td style="border: 1px solid; text-align: right">${item.Item4}</td>` + 
            `<td style="border: 1px solid; text-align: right">${item.Item5}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item6}%</td>` + 
            `<td style="border: 1px solid; text-align: center">${item.Item7}%</td>` + 
            `<td style="border: 1px solid; text-align: center">${item.Item8}%</td>` +

            `<td style="border: 1px solid; text-align: right">${item.Item9}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item10}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item11}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item12}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item13}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item14}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item15}%</td>` +

            `<td style="border: 1px solid; text-align: right">${item.Item16}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item17}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item18}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item19}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item20}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item21}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item22}%</td>` +

            `<td style="border: 1px solid; text-align: right">${item.Item23}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item24}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item25}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item26}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item27}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item28}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item29}%</td>` +

            `<td style="border: 1px solid; text-align: right">${item.Item30}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item31}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item32}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item33}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item34}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item35}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item36}%</td>` +

            `<td style="border: 1px solid; text-align: right">${item.Item37}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item38}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item39}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item40}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item41}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item42}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item43}%</td>` +

            `<td style="border: 1px solid; text-align: right">${item.Item44}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item45}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item46}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item47}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item48}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item49}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item50}%</td>` +

            `<td style="border: 1px solid; text-align: right">${item.Item51}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item52}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item53}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item54}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item55}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item56}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item57}%</td>` +

            `<td style="border: 1px solid; text-align: right">${item.Item58}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item59}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item60}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item61}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item62}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item63}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item64}%</td>` +

            `<td style="border: 1px solid; text-align: right">${item.Item65}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item66}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item67}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item68}</td>` +
            
            `<td style="border: 1px solid; text-align: center">${item.Item69}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item70}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item71}%</td>` +

            `<td style="border: 1px solid; text-align: right">${item.Item72}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item73}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item74}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item75}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item76}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item77}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item78}%</td>` +

            `<td style="border: 1px solid; text-align: right">${item.Item79}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item80}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item81}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item82}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item83}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item84}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item85}%</td>` +

            `<td style="border: 1px solid; text-align: right">${item.Item86}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item87}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item88}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item89}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item90}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item91}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item92}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item93}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item94}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item95}%</td>` +
            `<td style="border: 1px solid; text-align: center"><div style="background-color: ${progressBarColor(item.Item95)};border-radius:50%;width:15px;height:15px;"></div></td>` +
            `<td width="1%" style="border: 1px solid; text-align: center">${hasilEvaluasi(item.Item95)}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item96}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item97}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item98}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item99}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item100}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item101}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item102}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item103}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item104}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item105}%</td>` +
            `<td width="1%" style="border: 1px solid; text-align: center"><div style="background-color: ${progressBarColor(item.Item105)};border-radius:50%;width:15px;height:15px;"></div></td>` +
            `<td style="border: 1px solid; text-align: center">${hasilEvaluasi(item.Item105)}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item106}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item107}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item108}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item109}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item110}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item111}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item112}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item113}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item114}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item115}%</td>` +
            `<td width="1%" style="border: 1px solid; text-align: center"><div style="background-color: ${progressBarColor(item.Item115)};border-radius:50%;width:15px;height:15px;"></div></td>` +
            `<td style="border: 1px solid; text-align: center">${hasilEvaluasi(item.Item115)}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item116}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item117}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item118}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item119}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item120}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item121}</td>` +
            `<td style="border: 1px solid; text-align: right">${item.Item122}</td>` +

            `<td style="border: 1px solid; text-align: center">${item.Item123}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item124}%</td>` +
            `<td style="border: 1px solid; text-align: center">${item.Item125}%</td>` +
            `<td width="1%" style="border: 1px solid; text-align: center"><div style="background-color: ${progressBarColor(item.Item125)};border-radius:50%;width:15px;height:15px;"></div></td>` +
            `<td style="border: 1px solid; text-align: center"> ${hasilEvaluasi(item.Item125)}</td>` 
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
        seqNo++;
    });

    let rowsTotal =
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold" colspan="3">TOTAL</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item2}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item3}</td>` + 
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item4}</td>` + 
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item5}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item6}%</td>` + 
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item7}%</td>` + 
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item8}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4;text-align: right; color:white; font-weight:bold">${result.Total.Item9}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4;text-align: right; color:white; font-weight:bold">${result.Total.Item10}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4;text-align: right; color:white; font-weight:bold">${result.Total.Item11}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4;text-align: right; color:white; font-weight:bold">${result.Total.Item12}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item13}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item14}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item15}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item16}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item17}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item18}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item19}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item20}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item21}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item22}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item23}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item24}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item25}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item26}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item27}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item28}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item29}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item30}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item31}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item32}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item33}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item34}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item35}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item36}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item37}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item38}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item39}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item40}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item41}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item42}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item43}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item44}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item45}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item46}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item47}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item48}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item49}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item50}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item51}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item52}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item53}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item54}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item55}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item56}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item57}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item58}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item59}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item60}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item61}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item62}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item63}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item64}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item65}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item66}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item67}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item68}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item69}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item70}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item71}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item72}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item73}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item74}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item75}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item76}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item77}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item78}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item79}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item80}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item81}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item82}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item83}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item84}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item85}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item86}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item87}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item88}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item89}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item90}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item91}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item92}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4;text-align: center; color:white; font-weight:bold">${result.Total.Item93}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4;text-align: center; color:white; font-weight:bold">${result.Total.Item94}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4;text-align: center; color:white; font-weight:bold">${result.Total.Item95}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4;text-align: center; color:white; font-weight:bold"><div style="background-color: ${progressBarColor(result.Total.Item95)};border-radius:50%;width:15px;height:15px;"></div></td>` +
    `<td width="1%" style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${hasilEvaluasi(result.Total.Item95)}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item96}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item97}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item98}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item99}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item100}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item101}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item102}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item103}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item104}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item105}%</td>` +
    `<td width="1%" style="border: 1px solid black;  background-color: #4472C4;text-align: center "><div style="background-color: ${progressBarColor(result.Total.Item105)};border-radius:50%;width:15px;height:15px;"></div></td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${hasilEvaluasi(result.Total.Item105)}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item106}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item107}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item108}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item109}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item110}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item111}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right; color:white; font-weight:bold">${result.Total.Item112}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item113}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item114}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item115}%</td>` +
    `<td width="1%" style="border: 1px solid black; background-color: #4472C4; text-align: center;"><div style="background-color: ${progressBarColor(result.Total.Item115)};border-radius:50%;width:15px;height:15px;"></div></td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${hasilEvaluasi(result.Total.Item115)}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right;  color:white; font-weight:bold">${result.Total.Item116}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right;  color:white; font-weight:bold">${result.Total.Item117}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right;  color:white; font-weight:bold">${result.Total.Item118}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right;  color:white; font-weight:bold">${result.Total.Item119}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right;  color:white; font-weight:bold">${result.Total.Item120}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right;  color:white; font-weight:bold">${result.Total.Item121}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: right;  color:white; font-weight:bold">${result.Total.Item122}</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item123}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item124}%</td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold">${result.Total.Item125}%</td>` +
    `<td width="1%" style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold"><div style="background-color: ${progressBarColor(result.Total.Item125)};border-radius:50%;width:15px;height:15px;"></div></td>` +
    `<td style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold"> ${hasilEvaluasi(result.Total.Item125)}</td>` 
    let trTotal = document.createElement("tr");
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
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

    if (parseFloat(amount) < 95 ) {
        result = COLORS.RED;
    }
    return result;
}

/**
 * HELPER HASIL EVALUASI
 * @returns COLOR
 */
function hasilEvaluasi(amount) {
    let result;

    if (parseFloat(amount) >= 60) {
        result = "Level Tetap";
    }

    if (parseFloat(amount) >= 30 && parseFloat(amount) < 60) {
        result = "Turun Level";
    }

    if (parseFloat(amount) < 30 ) {
        result = "Terminasi";
    }
    return result;
}