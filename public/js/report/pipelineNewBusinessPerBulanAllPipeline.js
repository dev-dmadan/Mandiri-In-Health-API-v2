document.getElementById("printButton").addEventListener("click", printExcel, false);
document.getElementById("kanalDistribusi").addEventListener("change", onChangeKanalDistribusi, false);
document.getElementById("produk").addEventListener("change", onChangeProduct, false);
document.getElementById("bulan").addEventListener("change", onChangeBulan, false);
document.getElementById("tahun").addEventListener("change", onChangeTahun, false);
document.getElementById ("kanit").addEventListener ("change", onChangeKanit, false);
document.getElementById("agen").addEventListener("change", onChangeAgen, false);
document.getElementById ("periode").addEventListener ("change", onChangePeriode, false);

var url = window.location.pathname.split('/');
var guid = url[4];
console.log("data id", url);
if (guid != "00000000-0000-0000-0000-000000000000") {
    localStorage['kanalDistribusiId_Report'] = guid;
    var KANALDISTRIBUSIID = localStorage['kanalDistribusiId_Report']; 
} else {
    var KANALDISTRIBUSIID = localStorage['kanalDistribusiId_Report'];
}

var KANITID = localStorage['KanitId_Report'];
var AGENID = localStorage['AgenId_Report'];
var TAHUN = localStorage['Tahun_Report'];
var BULAN = localStorage['Bulan_Report'];
var PRODUKID = localStorage['ProdukId_Report'];
var PERIODE = localStorage['Periode_Report'];

document.addEventListener('DOMContentLoaded', function () {
    renderFilterKalanDistribusi();
    renderFilterProduct();
    renderFilterMonth();
    renderFilterTahun();
    renderFilterKanit();
    renderFilterAgen();
    renderFilterPeriode();
    
    renderListRekapPipelinePerBulan();
    isFilterKanalVisible(false);

});

function isFilterKanalVisible(visible = true) {
    if (!visible) {
        const closingfilter = document.querySelector('#closingfilter');
        closingfilter.remove();

        const progressfilter = document.querySelector('#progressfilter');
        progressfilter.remove();

    } else {
        // renderFilterKanit();
        // renderFilterAgen();
    }
}

function printExcel() {
    let tableData = document.getElementById("tablePipelineNewBusinessPerBulanAllPipeline").outerHTML;
    tableData = tableData.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tableData = tableData.replace(/<input[^>]*>|<\/input>/gi, ""); //remove input params

    let a = document.createElement('a');
    a.href = `data:application/vnd.ms-excel, ${encodeURIComponent(tableData)}`
    a.download = 'Rekap Progress Pipeline New Business Per Bulan (All Pipeline)' + '.xls'
    a.click();
}

function onChangeKanalDistribusi() {
    const kanalDistribusiId = document.getElementById("kanalDistribusi").value;
    localStorage['kanalDistribusiId_Report'] = kanalDistribusiId;
    reload();
}

function onChangeTahun() {
    const tahun = document.getElementById("tahun").value;
    localStorage['Tahun_Report'] = tahun;
    reload();
}

function onChangeBulan() {
    const bulan = document.getElementById("bulan").value;
    localStorage['Bulan_Report'] = bulan;
    console.log(bulan);
    reload();
}

function onChangeProduct() {
    const productId = document.getElementById("produk").value;
    localStorage['ProdukId_Report'] = productId;
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


function reload() {
    window.location = `${APP_URL}/report/view/pipelineNBRekapProgressAllPipeline/` + guid;
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
 * GET DATA TARGET PERKANAL
 * @returns LIST
 */
async function getRekapPipelinePerBulan() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/report-get-progress-pipeline-newbusiness-all-pipeline?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Bulan: BULAN,
                Periode: PERIODE,
                KanalDistribusiId: KANALDISTRIBUSIID,
                KaUnitId: KANITID,
                AgenId: AGENID,
                ProdukId: PRODUKID,
            })
        });

        console.log(req);

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

        const dataProduk = result.ListProduct.filter(item => item.IsActive == true);

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#produk');
        var opt = document.createElement('option');
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        dataProduk.forEach(item => {
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
        opt.value = 0;
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        result.ListMonth.forEach(item => {
            var opt = document.createElement('option');
            opt.value = item.Position;
            opt.innerHTML = item.Name;
            selectOption.appendChild(opt);
           
        });
        

        selectOption.value = BULAN;

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
 * RENDER LIST KINERJA BISNIS PER BULAN
 * @returns VIEW
 */
async function renderListRekapPipelinePerBulan() {
    const req = await getRekapPipelinePerBulan();
    const result = req.ProgressPipelineNewBusinessAllPipelinePerBulanResult;

    console.log(result);

    if (!result.Status.Success) {
        throw result.Status.Message;
    }

    // document.getElementsByTagName("tr")[6].remove();
    const tbody = document.querySelector('#tablePipelineNewBusinessPerBulanAllPipeline tbody');

    let seqNo = 1;
    result.ListItem.forEach(item => {
        let rows =
            `<th style="border: 1px solid; background:#EEEEEE; font-weight: normal;" class="text-center">${seqNo}</th>` +
            `<th style="border: 1px solid; background:#EEEEEE; font-weight: normal;" class="">${item.Name.toUpperCase()}</th>` +
            `<th style="border: 1px solid; background:#EEEEEE; font-weight: normal;" class="text-center">${item.Item19}</th>` +
            `<th style="border: 1px solid; background:#EEEEEE; font-weight: normal;" class="text-right">${item.Item20}</th>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item1}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item2}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item3}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item4}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item5}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item6}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item7}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item8}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item9}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item10}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item11}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item12}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item13}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item14}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item15}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item16}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item17}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item18}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item21}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item22}</td>` 

        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
        seqNo++;
    });
    const tfoot = document.querySelector('#tablePipelineNewBusinessPerBulanAllPipeline tfoot');
    let rowsTotal =
        `<th style="border: 1px solid black; background-color: #4472C4; z-index:999; width: 50px; min-width: 50px; max-width: 50px; text-align: center; color:white; font-weight:bold"></th>` +
        `<th style="border: 1px solid black; background-color: #4472C4; z-index:999; width: 200px; min-width: 200px; max-width: 200px; text-align: center; color:white; font-weight:bold">TOTAL</th>` +
        `<th style="border: 1px solid black; background-color: #4472C4; z-index:999; width: 150px; min-width: 150px; max-width: 150px; text-align: center; color:white; font-weight:bold">${result.Total.Item19}</th>` + 
        `<th style="border: 1px solid black; background-color: #4472C4; z-index:999; width: 200px; min-width: 200px; max-width: 200px; text-align: right; color:white; font-weight:bold">${result.Total.Item20}</th>` + 
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.Total.Item1}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.Total.Item2}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.Total.Item3}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.Total.Item4}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.Total.Item5}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.Total.Item6}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.Total.Item7}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.Total.Item8}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.Total.Item9}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.Total.Item10}</td>` + 
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.Total.Item11}</td>` + 
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.Total.Item12}</td>` + 
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.Total.Item13}</td>` + 
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.Total.Item14}</td>` + 
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.Total.Item15}</td>` + 
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.Total.Item16}</td>` + 
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.Total.Item17}</td>` + 
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.Total.Item18}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.Total.Item21}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.Total.Item22}</td>` 
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

    if (parseFloat(amount) < 95 ) {
        result = COLORS.RED;
    }
    return result;
}