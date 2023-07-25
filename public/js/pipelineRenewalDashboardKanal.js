
document.getElementById ("kanalDistribusi").addEventListener ("change", onChangeKanalDistribusi, false);
document.getElementById ("produk").addEventListener ("change", onChangeProduct, false);
document.getElementById ("bulan").addEventListener ("change", onChangeBulan, false);
document.getElementById("tahun").addEventListener("change", onChangeTahun, false);
document.getElementById ("periode").addEventListener ("change", onChangePeriode, false);

var PERIODE = localStorage['Periode_Report'];
var url = window.location.href;
var guid = url.substring(url.length, url.length-36);
localStorage['kanalDistribusiId_Dashboard'] = guid;

var KANALDISTRIBUSIID = localStorage['kanalDistribusiId_Dashboard'];
var TAHUN = localStorage['Tahun_Dashboard'];
var BULANID = localStorage['BulanId_Dashboard'];
var PRODUKID = localStorage['ProdukId_Dashboard'];

document.addEventListener('DOMContentLoaded', function () {
    renderFilterKalanDistribusi();
    console.log("Tes......");
    renderFilterProduk();
    renderFilterBulan();
    renderFilterTahun();
    renderFilterPeriode();


    renderTotalPipelineClosing();
    renderTotalPipelineLapse();
    renderTotalPipelineInProgress();


    renderListPipelineProgress();
    renderChartPipelineByProgress();

    renderListTopBuClosing();
    renderListTopBuLapse();
    renderListTopBuInProgress();
    renderListRekapPipelineRenewal();

    isFilterKanalVisible(false);

    
    var url = window.location.href;
    var guid = url.substring(url.length, url.length-36);
    console.log(guid)

   
});

function isFilterKanalVisible(visible = true) {
    if (!visible) {
        const kanitfilter = document.querySelector('#kanalfilter');
        kanitfilter.childNodes[1].firstElementChild.remove();
    } else {
        renderFilterKalanDistribusi();
    }
}

function onChangeKanalDistribusi() {
    const kanalDistribusiId = document.getElementById("kanalDistribusi").value;
    localStorage['kanalDistribusiId_Dashboard'] = kanalDistribusiId;
    reload();
    console.log(kanalDistribusiId);
}

function onChangeTahun() {
    const tahun = document.getElementById("tahun").value;
    localStorage['Tahun_Dashboard'] = tahun;
    console.log(tahun);
    reload();
}

function onChangeBulan() {
    const bulanId = document.getElementById("bulan").value;
    localStorage['BulanId_Dashboard'] = bulanId;
    console.log(bulanId);
    reload();
}

function onChangeProduct() {
    const produkId = document.getElementById("produk").value;
    localStorage['ProdukId_Dashboard'] = produkId;
    console.log(produkId);
    reload();
}

function onChangePeriode() {
    const periode = document.getElementById("periode").value;
    localStorage['Periode_Report'] = periode;
    console.log(periode);
    reload();
}

function reload() {
    window.location = `${APP_URL}/dashboard/view/pipelineRenewalDashboard`;
}

/**
** ============================================== GET DATA ==============================================
*/

/**
 * GET DATA KANAL DISTRIBUSI
 * @returns LIST
 */
async function getKanalDistribusiId() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/dashboard-get-kanal-distribusi?SecretKey=${SECRET_KEY}`, {
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
 * GET DATA PRODUK
 * @returns LIST
 */
async function getProduk() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/dashboard-get-produk?SecretKey=${SECRET_KEY}`, {
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
async function getBulan() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/dashboard-get-bulan?SecretKey=${SECRET_KEY}`, {
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
 * GET TOTAL PIPELINE CLOSING
 * @returns DECIMAL
 */
async function getTotalPipelineClosing() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-pipeline-closing-renewal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KANALDISTRIBUSIID,
                Tahun: TAHUN,
                BulanId : BULANID,
                ProdukId : PRODUKID,
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
 * GET TOTAL PIPELINE LAPSE
 * @returns DECIMAL
 */
async function getTotalPipelineLapse() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-pipeline-lapse-renewal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KANALDISTRIBUSIID,
                Tahun: TAHUN,
                BulanId : BULANID,
                ProdukId : PRODUKID,
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
 * GET TOTAL PIPELINE IN PROGRESS
 * @returns DECIMAL
 */
async function getTotalPipelineInProgress() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-pipeline-inprogress-renewal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KANALDISTRIBUSIID,
                Tahun: TAHUN,
                BulanId : BULANID,
                ProdukId : PRODUKID,
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
 * GET CHART PIPELINE BY PROGRESS
 * @returns LIST
 */
async function getChartPipelineByProgress() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-chart-pipeline-by-progress-renewal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KANALDISTRIBUSIID,
                Tahun: TAHUN,
                BulanId : BULANID,
                ProdukId : PRODUKID,
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
 * GET LIST PIPELINE BY PROGRESS
 * @returns LIST
 */
async function getListPipelineByProgress() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-pipeline-by-progress-renewal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KANALDISTRIBUSIID,
                Tahun: TAHUN,
                BulanId : BULANID,
                ProdukId : PRODUKID,
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
 * GET LIST TOP 10 BU CLOSING RENEWAL
 * @returns LIST
 */
async function getListTopBuClosing() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-top-bu-closing-renewal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KANALDISTRIBUSIID,
                Tahun: TAHUN,
                BulanId : BULANID,
                ProdukId : PRODUKID,
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
 * GET LIST TOP 10 BU LOSS
 * @returns LIST
 */
async function getListTopBuLapse() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-top-bu-lapse-renewal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KANALDISTRIBUSIID,
                Tahun: TAHUN,
                BulanId : BULANID,
                ProdukId : PRODUKID,
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
 * GET LIST TOP 10 BU IN PROGRESS RENEWAL
 * @returns LIST
 */
async function getListTopBuInProgress() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-top-bu-inprogress-renewal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KANALDISTRIBUSIID,
                Tahun: TAHUN,
                BulanId : BULANID,
                ProdukId : PRODUKID,
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
 * GET LIST REKAP PIPELINE RENEWAL
 * @returns LIST
 */
async function getListRekapPipelineRenewal() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-rekap-pipeline-renewal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KANALDISTRIBUSIID,
                Tahun: TAHUN,
                BulanId : BULANID,
                ProdukId : PRODUKID,
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
        const req = await getKanalDistribusiId();
        const result = req.GetKanalDistribusiResult;
   
        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#kanalDistribusi');
        var opt = document.createElement('option');
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL KANAL";
        selectOption.appendChild(opt);

        result.ListKanalDistribusi.forEach(item => {
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
 * RENDER FILTER PRODUK
 * @returns VIEW
 */
async function renderFilterProduk() {
    try {
        const req = await getProduk();
        const result = req.GetProdukResult;

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#produk');
        var opt = document.createElement('option');
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL PRODUK";
        selectOption.appendChild(opt);

        result.ListProduk.forEach(item => {
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
 * RENDER FILTER BULAN
 * @returns VIEW
 */
async function renderFilterBulan() {
    try {
        const req = await getBulan();
        const result = req.GetBulanResult;

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#bulan');
        var opt = document.createElement('option');
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL BULAN";
        selectOption.appendChild(opt);

        result.ListBulan.forEach(item => {
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

        data.forEach(item => {
            var opt = document.createElement('option');
            opt.value = item;
            opt.innerHTML = item;
            selectOption.appendChild(opt);
        });

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
            "Mtd",
            "Ytd"
        ];

        const selectOption = document.querySelector('#periode');
        var opt = document.createElement('option');
        opt.value = "PERIODE";
        opt.innerHTML = "PERIODE";
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
 * RENDER TOTAL PIPELINE CLOSING NEW BUSINESS
 * @returns VIEW
 */
async function renderTotalPipelineClosing() {
    try {
        const req = await getTotalPipelineClosing();
        const result = req.TotalPipelineClosingResult;
        if (!result.Success) {
            throw result.Message;
        }

        const totalANPPipelineClosing = document.querySelector('#totalANPPipelineClosing');
        totalANPPipelineClosing.innerHTML = `<b><span style="font-size:25px; color:#FFBF00">IDR ${result.Total}</span></b>`;

        const totalRecordPipelineClosing = document.querySelector('#totalRecordPipelineClosing');
        totalRecordPipelineClosing.innerHTML = `<b><span class="text-white" style="font-size:45px;">${result.TotalRecord}</span></b>`;

    } catch (error) {
        throw error;
    }
}
/**
 * RENDER TOTAL PIPELINE LOSS NEW BUSINESS
 * @returns VIEW
 */
async function renderTotalPipelineLapse() {
    try {
        const req = await getTotalPipelineLapse();
        const result = req.TotalPipelineLapseResult;
        if (!result.Success) {
            throw result.Message;
        }

        const totalANPPipelineLoss = document.querySelector('#totalANPPipelineLapse');
        totalANPPipelineLoss.innerHTML = `<b><span style="font-size:25px; color:#FFBF00">IDR ${result.Total}</span></b>`;

        const totalRecordPipelineLoss = document.querySelector('#totalRecordPipelineLapse');
        totalRecordPipelineLoss.innerHTML = `<b><span class="text-white" style="font-size:45px;">${result.TotalRecord}</span></b>`;

    } catch (error) {
        throw error;
    }
}
/**
 * RENDER TOTAL PIPELINE IN PROGRESS NEW BUSINESS
 * @returns VIEW
 */
async function renderTotalPipelineInProgress() {
    try {
        const req = await getTotalPipelineInProgress();
        const result = req.TotalPipelineInProgressResult;
        if (!result.Success) {
            throw result.Message;
        }

        const totalANPPipelineInProgress = document.querySelector('#totalANPPipelineInProgress');
        totalANPPipelineInProgress.innerHTML = `<b><span style="font-size:25px; color:#FFBF00">IDR ${result.Total}</span></b>`;

        const totalRecordPipelineInProgress = document.querySelector('#totalRecordPipelineInProgress');
        totalRecordPipelineInProgress.innerHTML = `<b><span class="text-white" style="font-size:45px;">${result.TotalRecord}</span></b>`;
    } catch (error) {
        throw error;
    }
}


/**
 * RENDER LIST PIPELINE BY PROGRESS
 * @returns VIEW LIST
 */
async function renderListPipelineProgress() {
    const req = await getListPipelineByProgress();
    const result = req.ListPipelineByProgresRenewalResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableListPipelineByProgress tbody');
        result.ListItem.forEach(item => {

        let rows =  `<td>${seqNo++}</td>` +
                    `<td>${item.Name}</td>` +
                    `<td class="text-center">${item.Item1}</td>` +
                    `<td class="text-center">${item.Item2}</td>`
            let tr = document.createElement('tr');
            tr.innerHTML = rows;
            tbody.appendChild(tr);
        });
    let rowsTotal = `<td></td>` +
                    `<td>TOTAL</td>` +
                    `<td class="text-center">${result.Total.Item1}</td>` +
                    `<td class="text-center">${result.Total.Item2}</td>`
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#16aaff";
    trTotal.style.color = "white";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}


/**
 * RENDER CHART PIPELINE BY PROGRESSS
 * @returns VIEW CHART
 */
async function renderChartPipelineByProgress() {
    const req = await getChartPipelineByProgress();
    const result = req.ChartPipelineByProgresRenewalResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    Highcharts.chart('chartpipelinebyprogress', {
        colors: ['#5f32d3', '#ff8c00'],
        chart: 
        {
            zoomType: 'xy',
            backgroundColor: 'transparent'
            
        },
        plotOptions: 
        {
            series: 
            {
                dataLabels: 
                {
                    enabled: true
                },
                enableMouseTracking: true,
                borderRadiusTopLeft: '8%',
                borderRadiusTopRight: '8%'
            },
            line: 
            {
                dataLabels: 
                {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        credits: {enabled: false},
        title:"test",
        xAxis: 
        [
            {
                categories: result.Category,
                crosshair: true
            }
        ],
        yAxis: 
        [
            {
                // Primary yAxis
                labels: 
                {
                    enabled: false
                },
                gridLineColor: 'white',
                title: 
                {
                    enabled: false
                }
            },
            { 
                // Secondary yAxis
                title:
                {
                    enabled: false
                }
                
            },
        ],
        tooltip: 
        {
            shared: true
        },
        legend: 
        {
            enabled: false,
            align: 'left',
            x: 100,
            verticalAlign: 'top',
            y: 0,
            floating: true,
        },
        series: 
        [
            {
                name: result.Series[0].name,
                type: 'bar',
                yAxis: 0,
                data: result.Series[0].data,
                tooltip: 
                {
                    valueSuffix: ' '
                }
            }, 
           
        ]
    });
}


/**
 * RENDER LIST TOP BU CLOSING
 * @returns VIEW LIST
 */
async function renderListTopBuClosing() {
    const req = await getListTopBuClosing();
    const result = req.TopBuClosingRenewalResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableTopBuClosing tbody');
        result.ListItem.forEach(item => {

        let rows =  `<td>${seqNo++}</td>` +
                    `<td>${item.Name}</td>` +
                    `<td class="text-center">${item.Item1}</td>` +
                    `<td class="text-center">${item.Item2}</td>` +
                    `<td class="text-center">${item.Item3}</td>`
            let tr = document.createElement('tr');
            tr.innerHTML = rows;
            tbody.appendChild(tr);
        });
    let rowsTotal = `<td></td>` +
                    `<td>TOTAL</td>` +
                    `<td class="text-center">${result.Total.Item1}</td>` +
                    `<td class="text-center">${result.Total.Item2}</td>` +
                    `<td></td>` 
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#16aaff";
    trTotal.style.color = "white";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}

/**
 * RENDER LIST TOP BU LAPSE
 * @returns VIEW LIST
 */
async function renderListTopBuLapse() {
    const req = await getListTopBuLapse();
    const result = req.TopBuLapseRenewalResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableTopBuLapse tbody');
        result.ListItem.forEach(item => {

        let rows =  `<td>${seqNo++}</td>` +
                    `<td>${item.Name}</td>` +
                    `<td class="text-center">${item.Item1}</td>` +
                    `<td class="text-center">${item.Item2}</td>` +
                    `<td class="text-center">${item.Item3}</td>`
            let tr = document.createElement('tr');
            tr.innerHTML = rows;
            tbody.appendChild(tr);
        });
    let rowsTotal = `<td></td>` +
                    `<td>TOTAL</td>` +
                    `<td class="text-center">${result.Total.Item1}</td>` +
                    `<td class="text-center">${result.Total.Item2}</td>` +
                    `<td></td>` 
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#16aaff";
    trTotal.style.color = "white";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}

/**
 * RENDER LIST TOP BU IN PROGRESS
 * @returns VIEW LIST
 */
async function renderListTopBuInProgress() {
    const req = await getListTopBuInProgress();
    const result = req.TopBuInProgressRenewalResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableTopBuInProgress tbody');
        result.ListItem.forEach(item => {

        let rows =  `<td>${seqNo++}</td>` +
                    `<td>${item.Name}</td>` +
                    `<td class="text-center">${item.Item1}</td>` +
                    `<td class="text-center">${item.Item2}</td>` +
                    `<td class="text-center">${item.Item3}</td>`
            let tr = document.createElement('tr');
            tr.innerHTML = rows;
            tbody.appendChild(tr);
        });
    let rowsTotal = `<td></td>` +
                    `<td>TOTAL</td>` +
                    `<td class="text-center">${result.Total.Item1}</td>` +
                    `<td class="text-center">${result.Total.Item2}</td>` +
                    `<td></td>` 
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#16aaff";
    trTotal.style.color = "white";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}

/**
 * RENDER LIST REKAP PIPELINE RENEWAL
 * @returns VIEW LIST
 */
async function renderListRekapPipelineRenewal() {
    const req = await getListRekapPipelineRenewal();
    const result = req.RekapPipelineRenewalResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableRekapPipelineRenewal tbody');
        result.ListItem.forEach(item => {

            let rows =
                `<td class="text-center">${seqNo++}</td>` +
                `<td>${item.Name}</td>` +
                `<td class="text-center">${item.Item1}</td>` +
                `<td class="text-center">${item.Item2}</td>` +
                `<td class="text-center">${item.Item3}</td>` +
                `<td class="text-center">${item.Item4}</td>` +
                `<td class="text-center">${item.Item5}</td>` +
                `<td class="text-center">${item.Item6}</td>` +
                `<td class="text-center">${item.Item7}</td>` +
                `<td class="text-center">${item.Item8}</td>`
            let tr = document.createElement('tr');
            tr.innerHTML = rows;
            tbody.appendChild(tr);
        });
    let rowsTotal = 
        `<td class="text-center" colspan = "2">TOTAL</td>` +
        `<td class="text-center">${result.Total.Item1}</td>` +
        `<td class="text-center">${result.Total.Item2}</td>` +
        `<td class="text-center">${result.Total.Item3}</td>` +
        `<td class="text-center">${result.Total.Item4}</td>` +
        `<td class="text-center">${result.Total.Item5}</td>` +
        `<td class="text-center">${result.Total.Item6}</td>` +
        `<td class="text-center">${result.Total.Item7}</td>` +
        `<td class="text-center">${result.Total.Item8}</td>` 
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#16aaff";
    trTotal.style.color = "white";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}


