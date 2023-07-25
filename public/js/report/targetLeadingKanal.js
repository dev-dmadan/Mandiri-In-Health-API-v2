document.getElementById("printButton").addEventListener("click", printExcel, false);
document.getElementById("kanalDistribusi").addEventListener("change", onChangeKanalDistribusi, false);
document.getElementById("produk").addEventListener("change", onChangeProduct, false);
document.getElementById("bulan").addEventListener("change", onChangeBulan, false);
document.getElementById("tahun").addEventListener("change", onChangeTahun, false);
document.getElementById ("target").addEventListener ("change", onChangeTarget, false);
document.getElementById ("kanit").addEventListener ("change", onChangeKanit, false);
document.getElementById("agen").addEventListener("change", onChangeAgen, false);
document.getElementById ("tipe").addEventListener ("change", onChangeTipe, false);
document.getElementById ("periode").addEventListener ("change", onChangePeriode, false);


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
var TAHUN = localStorage['Tahun_Report'];
var BULANID = localStorage['BulanId_Report'];
var PRODUKID = localStorage['ProdukId_Report'];
var TIPEID = localStorage['Tipe_Report'];
var PERIODE = localStorage['Periode_Report'];

document.addEventListener('DOMContentLoaded', function () {


    renderFilterKalanDistribusi();
    // renderFilterProduct();
    renderFilterMonth();
    renderFilterTahun();
    renderListTargetPerKanal();

    renderFilterTarget();
    // renderFilterKanit();
    // renderFilterAgen();
    renderFilterPeriode();
    // renderFilterTipeKinerja();

    isFilterKanalVisible(false);

});

function isFilterKanalVisible(visible = true) {
    if (!visible) {
        const kanitfilter = document.querySelector('#kanitfilter');
        kanitfilter.remove();

        const agenfilter = document.querySelector('#agenfilter');
        agenfilter.remove();

        const tipe = document.querySelector('#tipefilter');
        tipe.remove();

        const produk = document.querySelector('#produkfilter');
        produk.remove();
    } else {
        renderFilterKanit();
        renderFilterProduct();
        renderFilterAgen();
    }
}

function printExcel() {
    let tableData = document.getElementById("tableKinerjaBisnisPerKanal").outerHTML;
    tableData = tableData.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tableData = tableData.replace(/<input[^>]*>|<\/input>/gi, ""); //remove input params

    let a = document.createElement('a');
    a.href = `data:application/vnd.ms-excel, ${encodeURIComponent(tableData)}`
    a.download = 'Kinerja Bisnis Per Kanal' + '.xls'
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
    const bulanId = document.getElementById("bulan").value;
    localStorage['BulanId_Report'] = bulanId;
    reload();
}

function onChangeProduct() {
    const productId = document.getElementById("produk").value;
    localStorage['ProdukId_Report'] = productId;
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

function reload() {
    window.location = `${APP_URL}/report/view/reportTargetLeading/` + guid;
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
async function getTargetPerKanal() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/report-get-target-leding-kanal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId: BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                TargetId: TARGETID,
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

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#kanit');
        var opt = document.createElement('option');
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        result.ListKepalaKanit.forEach(item => {
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

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#agen');
        var opt = document.createElement('option');
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        result.ListAgen.forEach(item => {
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
 * RENDER LIST KINERJA BISNIS PER KANAL
 * @returns VIEW
 */
async function renderListTargetPerKanal() {
    const req = await getTargetPerKanal();
    const result = req.TargetLeadingKanalResult;

    if (!result.Status.Success) {
        throw result.Status.Message;
    }

    // document.getElementsByTagName("tr")[6].remove();
    const tbody = document.querySelector('#tableTargetPerKanal tbody');

    let seqNo = 1;
    result.ListItemTargetLeading.forEach(item => {
        let rows =
            `<th style="border: 1px solid; background:#EEEEEE; font-weight: normal;" class="text-center">${seqNo}</th>` +
            `<th style="border: 1px solid; background:#EEEEEE; font-weight: normal;" class="">${item.Name.toUpperCase()}</th>` +
            // `<td style="border: 1px solid;" class="text-right">${item.Item1 != 0 ? item.Item1 : "-"}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item1}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item2}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item3}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item4}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item5}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item6}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item7}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item8}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item9}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item10}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item11}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item12}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item13}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item14}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item15}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item16}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item17}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item18}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item19}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item20}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item21}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item22}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item23}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item24}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item25}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item26}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item27}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item28}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item29}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item30}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item31}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item32}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item33}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item34}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item35}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item36}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item37}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item38}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item39}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item40}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item41}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item42}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item43}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item44}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item45}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item46}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item47}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item48}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item49}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-center">${item.Item50}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item51}</td>` +
            `<td style="border: 1px solid; background:#EEEEEE;" class="text-right">${item.Item52}</td>` 
        
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
        seqNo++;
    });
    const tfoot = document.querySelector('#tableTargetPerKanal tfoot');
    let rowsTotal =
        `<th style="border: 1px solid black; background-color: #4472C4; text-align: center; color:white; font-weight:bold" colspan="2">TOTAL</th>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item1}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item2}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item3}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item4}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item5}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item6}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item7}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item8}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item9}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item10}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item11}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item12}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item13}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item14}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item15}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item16}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item17}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item18}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item19}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item20}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item21}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item22}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item23}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item24}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item25}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item26}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item27}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item28}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item29}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item30}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item31}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item32}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item33}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item34}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item35}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item36}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item37}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item38}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item39}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item40}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item41}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item42}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item43}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item44}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item45}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item46}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item47}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item48}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item49}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: center; color:white; font-weight:bold">${result.TotalTargetLeading.Item50}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item51}</td>` +
        `<td style="border: 1px solid black; background-color: #4472C4; z-index:0; text-align: right; color:white; font-weight:bold">${result.TotalTargetLeading.Item52}</td>` 
    
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