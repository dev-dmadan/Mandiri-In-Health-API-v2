const PERIODE = document.getElementById("periode")
const BULAN = document.getElementById("bulan")
const TAHUN = document.getElementById("tahun")
const KANALDISTRIBUSI = document.getElementById ("kanalDistribusi")
const POLISSTATUS = document.getElementById ("polisStatusData")
const POLISSTATUS1 = document.getElementById ("polisStatus")
const TIPE = document.getElementById ("tipe")
const TARGET = document.getElementById ("target")
const PRODUK = document.getElementById ("produk")
const GUID_EMPTY = "00000000-0000-0000-0000-000000000000"

document.addEventListener('DOMContentLoaded', function () {
    init()
});

async function init() {
    try {
        await initFilter()
        await initDashboard()
    } catch (error) {
        throw error;
    }
}

async function initFilter() {
    try {
        renderFilterPeriode()
        renderFilterTahun()
        
        await Promise.all([
            renderFilterBulan(),
            renderFilterKanal(),
            renderFilterProduk()
        ])

        // event filter
        PERIODE.addEventListener("change", initDashboard, false)
        BULAN.addEventListener("change", initDashboard, false)
        TAHUN.addEventListener("change", initDashboard, false)
        KANALDISTRIBUSI.addEventListener ("change", initDashboard, false)
        TIPE.addEventListener ("change", initDashboard, false)
        PRODUK.addEventListener ("change", initDashboard, false)
        // TARGET.addEventListener ("change", initDashboard, false)
        // POLISSTATUS.addEventListener ("change", renderPerfromanceKanal, false)
        // POLISSTATUS1.addEventListener ("change", renderPerformanceByProduk, false)
    } catch (error) {
        console.error('Error in initFilter', {error})
    }
}

async function initDashboard() {
    await Promise.all([
        renderTotalPipelineKomitmen(),
        renderTotalPipelineQuotation(),
        renderTotalPipelineClosing(),
        renderTotalPipelineLoss(),
        renderTotalPipelineInProgress(),
        renderTotalPipelineExpiredQuotation(),
        renderListPipelineKomitmenKanal(),
        renderListPipelineProgress(),
        renderListTopBuKomitmen(),
        renderListTopBuQuotation(),
        renderListTopBuLoss(),
        renderListTopBuInProgress(),
        renderListTopBuExpiredQuotation(),
        renderListRekapPipelineNewBusiness()

    ])
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
        const req = await fetch(`${APP_URL}/dashboard/api/dashboard-get-kanal-distribusi?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers
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
            headers: headers
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
            headers: headers
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
 * GET TOTAL PIPELINE KOMITMEN
 * @returns DECIMAL
 */
async function getTotalPipelineKomitmen() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-pipeline-komitmen?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
 * GET TOTAL PIPELINE QUOTATION
 * @returns DECIMAL
 */
async function getTotalPipelineQuotation() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-pipeline-quotation?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-pipeline-closing?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
 * GET TOTAL PIPELINE LOSS
 * @returns DECIMAL
 */
async function getTotalPipelineLoss() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-pipeline-loss?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-pipeline-inprogress?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
 * GET TOTAL PIPELINE EXPIRED QUOTATION
 * @returns DECIMAL
 */
async function getTotalPipelineExpiredQuotation() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-pipeline-expired-quotation?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
 * GET LIST PIPELINE KOMITMENT
 * @returns LIST
 */
async function getListPipelineKomitmenKanal() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-pipeline-komitmen-kanal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-pipeline-progress?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
async function getChartPipelineByProgress() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-chart-pipeline-progress?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
async function getChartPipelineKomitmenByKanal() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-chart-pipeline-komitmen-kanal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSIID,
                Tahun: TAHUN,
                BulanId: BULANID,
                ProdukId: PRODUKID,
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
 * GET LIST TOP 10 BU KOMITMEN
 * @returns LIST
 */
async function getListTopBuKomitmen() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-top-bu-komitmen?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
 * GET LIST TOP 10 BU QUOTATION
 * @returns LIST
 */
async function getListTopBuQuotation() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-top-bu-quotation?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
 * GET LIST TOP 10 BU CLOSING
 * @returns LIST
 */
async function getListTopBuClosing() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-top-bu-closing?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
async function getListTopBuLoss() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-top-bu-loss?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
 * GET LIST TOP 10 BU IN PROGRESS
 * @returns LIST
 */
async function getListTopBuInProgress() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-top-bu-inprogress?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
 * GET LIST TOP 10 BU EXPIRED QUOTATION
 * @returns LIST
 */
async function getListTopBuExpiredQuotation() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-top-bu-expired-quotation?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
 * GET LIST REKAP PIPELINE NEW BUSINESS
 * @returns LIST
 */
async function getListRekapPipelineNewBusiness() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-rekap-pipeline-newbusiness?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSI.value,
                Tahun: TAHUN.value,
                BulanId: BULAN.value,
                ProdukId: PRODUK.value,
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
async function renderFilterKanal() {
    try {
        const req = await getKanalDistribusi();
        const result = req.GetKanalDistribusiResult;

        if (!result.Success) {
            throw result.Message;
        }

        const dataKanal = result.ListKanalDistribusi;
        const firstOpt = new Option("ALL KANAL", GUID_EMPTY, true, true);
        KANALDISTRIBUSI.append(firstOpt)

        dataKanal.forEach(item => {
            const opt = new Option(item.NamaKC, item.Id, false, false);
            KANALDISTRIBUSI.append(opt);
        });
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

        const dataProduct = result.ListProduk;
        const firstOpt = new Option("ALL PRODUCT", GUID_EMPTY, true, true);
        PRODUK.append(firstOpt)

        dataProduct.forEach(item => {
            const opt = new Option(item.Name, item.Id, false, false);
            PRODUK.append(opt);
        });

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

        const firstOpt = new Option("ALL BULAN", GUID_EMPTY, true, true);
        BULAN.append(firstOpt);

        result.ListBulan.forEach(item => {
            const opt = new Option(item.Name, item.Id, false, false)
            BULAN.append(opt);
        });
    } catch (error) {
        throw error;
    }
}

/**
 * RENDER FILTER TAHUN
 * @returns VIEW
 */
function renderFilterTahun() {
    try {
        const firstOpt = new Option("2023", "2023", true, true);
        TAHUN.append(firstOpt);
    } catch (error) {
        throw error;
    }
}

/**
 * RENDER FILTER PERIODE
 * @returns VIEW
 */
function renderFilterPeriode() {
    try {
        const data = [
            new Option("Mtd", "Mtd", true, true),
            new Option("Ytd", "Ytd", false, false)
        ];

        data.forEach(item => {
            PERIODE.append(item)
        })
    } catch (error) {
        throw error;
    }
}
/**
 * RENDER TOTAL PIPELINE KOMITMEN NEW BUSINESS
 * @returns VIEW
 */
async function renderTotalPipelineKomitmen() {
    try {
        const req = await getTotalPipelineKomitmen();
        const result = req.TotalPipelineKomitmenResult;
        if (!result.Success) {
            throw result.Message;
        }

        const totalANPPipelineKomitmen = document.querySelector('#totalANPPipelineKomitmen');
        totalANPPipelineKomitmen.innerHTML = `<b><span style="font-size:25px; color:#FFBF00">IDR ${result.Total}</span></b>`;

        const totalRecordPipelineKomitmen = document.querySelector('#totalRecordPipelineKomitmen');
        totalRecordPipelineKomitmen.innerHTML = `<b><span class="text-white" style="font-size:45px;">${result.TotalRecord}</span></b>`;

    } catch (error) {
        throw error;
    }
}

/**
 * RENDER TOTAL PIPELINE QUOTATION NEW BUSINESS
 * @returns VIEW
 */
async function renderTotalPipelineQuotation() {
    try {
        const req = await getTotalPipelineQuotation();
        const result = req.TotalPipelineQuotationResult;
        if (!result.Success) {
            throw result.Message;
        }

        const totalANPPipelineQuotation = document.querySelector('#totalANPPipelineQuotation');
        totalANPPipelineQuotation.innerHTML = `<b><span style="font-size:25px; color:#FFBF00">IDR ${result.Total}</span></b>`;

        const totalRecordPipelineQuotation = document.querySelector('#totalRecordPipelineQuotation');
        totalRecordPipelineQuotation.innerHTML = `<b><span class="text-white" style="font-size:45px;">${result.TotalRecord}</span></b>`;

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
async function renderTotalPipelineLoss() {
    try {
        const req = await getTotalPipelineLoss();
        const result = req.TotalPipelineLossResult;
        if (!result.Success) {
            throw result.Message;
        }

        const totalANPPipelineLoss = document.querySelector('#totalANPPipelineLoss');
        totalANPPipelineLoss.innerHTML = `<b><span style="font-size:25px; color:#FFBF00">IDR ${result.Total}</span></b>`;

        const totalRecordPipelineLoss = document.querySelector('#totalRecordPipelineLoss');
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
 * RENDER TOTAL PIPELINE EXPIRED QUOTATION NEW BUSINESS
 * @returns VIEW
 */
async function renderTotalPipelineExpiredQuotation() {
    try {
        const req = await getTotalPipelineExpiredQuotation();
        const result = req.TotalExpiredQuotationResult;
        if (!result.Success) {
            throw result.Message;
        }

        const totalANPPipelineExpiredQuotation = document.querySelector('#totalANPPipelineExpiredQuotation');
        totalANPPipelineExpiredQuotation.innerHTML = `<b><span style="font-size:25px; color:#FFBF00">IDR ${result.Total}</span></b>`;

        const totalRecordPipelineExpiredQuotation = document.querySelector('#totalRecordPipelineExpiredQuotation');
        totalRecordPipelineExpiredQuotation.innerHTML = `<b><span class="text-white" style="font-size:45px;">${result.TotalRecord}</span></b>`;

    } catch (error) {
        throw error;
    }
}

/**
 * RENDER LIST PIPELINE KOMITMEN KANAL
 * @returns VIEW LIST
 */
async function renderListPipelineKomitmenKanal() {
    const req = await getListPipelineKomitmenKanal();
    console.log(req)
    const result = req.PipelineKomitmenNewBusinessByKanalResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableListPipelineKomitmenKanal tbody');
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    result.ListItem.forEach(item => {

        let rows =
            `<td class="text-center align-middle">${seqNo++}</td>` +
            `<td class="align-middle">${item.Name}</td>` +
            `<td class="text-center align-middle">${item.Item1}</td>` +
            `<td class="text-right align-middle">${item.Item2}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableListPipelineKomitmenKanal tfoot');
    while (tfoot.firstChild) {
        tfoot.removeChild(tfoot.firstChild);
    }

    let rowsTotal =
        `<td></td>` +
        `<td class="text-center align-middle">TOTAL</td>` +
        `<td class="text-center align-middle">${result.Total.Item1}</td>` +
        `<td class="text-right align-middle">${result.Total.Item2}</td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER LIST PIPELINE PROGRESS
 * @returns VIEW LIST
 */
async function renderListPipelineProgress() {
    const req = await getListPipelineByProgress();
    const result = req.PipelineNewBusinessByProgresResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableListPipelineByProgress tbody');
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    result.ListItem.forEach(item => {

        let rows =
            `<td class="text-center align-middle">${seqNo++}</td>` +
            `<td class="align-middle">${item.Name}</td>` +
            `<td class="text-center align-middle">${item.Item1}</td>` +
            `<td class="text-right align-middle">${item.Item2}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableListPipelineByProgress tfoot');
    while (tfoot.firstChild) {
        tfoot.removeChild(tfoot.firstChild);
    }

    let rowsTotal =
        `<td></td>` +
        `<td class="text-center align-middle">TOTAL</td>` +
        `<td class="text-center align-middle">${result.Total.Item1}</td>` +
        `<td class="text-right align-middle">${result.Total.Item2}</td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}


/**
 * RENDER CHART PIPELINE BY PROGRESSS
 * @returns VIEW CHART
 */
async function renderChartPipelineByProgress() {
    const req = await getChartPipelineByProgress();
    const result = req.PipelineByProgresNewBusinessResult;

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
        credits: { enabled: false },
        title: "test",
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
 * RENDER CHART PIPELINE BY PROGRESSS
 * @returns VIEW CHART
 */
async function renderChartPipelineKomitmenByKanal() {
    const req = await getChartPipelineKomitmenByKanal();
    const result = req.PipelineKomitmenNewBusinessResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    Highcharts.chart('chartpipelinekomitmenbykanal', {
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
        credits: { enabled: false },
        title: "test",
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
                    type: 'column',
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
 * RENDER LIST TOP BU KOMITMEN
 * @returns VIEW LIST
 */
async function renderListTopBuKomitmen() {
    const req = await getListTopBuKomitmen();
    const result = req.TopBuKomitmenNewBusinessResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableTopBuKomitmen tbody');
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    result.ListItem.forEach(item => {

        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td>${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-right">${item.Item2}</td>` +
            `<td class="text-center">${item.Item3}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableTopBuKomitmen tfoot');
    while (tfoot.firstChild) {
        tfoot.removeChild(tfoot.firstChild);
    }

    let rowsTotal = `<td></td>` +
        `<td class="text-center">TOTAL</td>` +
        `<td class="text-right">${result.Total.Item1}</td>` +
        `<td class="text-right">${result.Total.Item2}</td>` +
        `<td></td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER LIST TOP BU QUOTATION
 * @returns VIEW LIST
 */
async function renderListTopBuQuotation() {
    const req = await getListTopBuQuotation();
    const result = req.TopBuQuotationNewBusinessResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableTopBuQuotation tbody');
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    result.ListItem.forEach(item => {

        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td>${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-right">${item.Item2}</td>` +
            `<td class="text-center">${item.Item3}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableTopBuQuotation tfoot');
    while (tfoot.firstChild) {
        tfoot.removeChild(tfoot.firstChild);
    }

    let rowsTotal =
        `<td></td>` +
        `<td class="text-center">TOTAL</td>` +
        `<td class="text-right">${result.Total.Item1}</td>` +
        `<td class="text-right">${result.Total.Item2}</td>` +
        `<td></td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER LIST TOP BU CLOSING
 * @returns VIEW LIST
 */
async function renderListTopBuClosing() {
    const req = await getListTopBuClosing();
    const result = req.TopBuClosingNewBusinessResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableTopBuClosing tbody');
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    result.ListItem.forEach(item => {

        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td>${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-right">${item.Item2}</td>` +
            `<td class="text-center">${item.Item3}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableTopBuClosing tfoot');
    while (tfoot.firstChild) {
        tfoot.removeChild(tfoot.firstChild);
    }

    let rowsTotal =
        `<td></td>` +
        `<td class="text-center">TOTAL</td>` +
        `<td class="text-right">${result.Total.Item1}</td>` +
        `<td class="text-right">${result.Total.Item2}</td>` +
        `<td></td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER LIST TOP BU LOSS
 * @returns VIEW LIST
 */
async function renderListTopBuLoss() {
    const req = await getListTopBuLoss();
    const result = req.TopBuLossNewBusinessResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableTopBuLoss tbody');
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    result.ListItem.forEach(item => {

        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td>${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-right">${item.Item2}</td>` +
            `<td class="text-center">${item.Item3}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableTopBuLoss tfoot');
    while (tfoot.firstChild) {
        tfoot.removeChild(tfoot.firstChild);
    }

    let rowsTotal =
        `<td></td>` +
        `<td class="text-center">TOTAL</td>` +
        `<td class="text-right">${result.Total.Item1}</td>` +
        `<td class="text-right">${result.Total.Item2}</td>` +
        `<td></td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER LIST TOP BU IN PROGRESS
 * @returns VIEW LIST
 */
async function renderListTopBuInProgress() {
    const req = await getListTopBuInProgress();
    const result = req.TopBuInProgressNewBusinessResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableTopBuInProgress tbody');
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    result.ListItem.forEach(item => {

        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td>${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-right">${item.Item2}</td>` +
            `<td class="text-center">${item.Item3}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableTopBuInProgress tfoot');
    while (tfoot.firstChild) {
        tfoot.removeChild(tfoot.firstChild);
    }

    let rowsTotal =
        `<td></td>` +
        `<td class="text-center">TOTAL</td>` +
        `<td class="text-right">${result.Total.Item1}</td>` +
        `<td class="text-right">${result.Total.Item2}</td>` +
        `<td></td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER LIST TOP BU EXPIRED QUOTATION
 * @returns VIEW LIST
 */
async function renderListTopBuExpiredQuotation() {
    const req = await getListTopBuExpiredQuotation();
    const result = req.TopBuExpiredQuotationNewBusinessResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableTopBuExpiredQuotation tbody');
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    result.ListItem.forEach(item => {

        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td>${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-right">${item.Item2}</td>` +
            `<td class="text-center">${item.Item3}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableTopBuExpiredQuotation tfoot');
    while (tfoot.firstChild) {
        tfoot.removeChild(tfoot.firstChild);
    }

    let rowsTotal =
        `<td></td>` +
        `<td class="text-center">TOTAL</td>` +
        `<td class="text-right">${result.Total.Item1}</td>` +
        `<td class="text-right">${result.Total.Item2}</td>` +
        `<td></td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER LIST REKAP PIPELINE NEW BUSINESS
 * @returns VIEW LIST
 */
async function renderListRekapPipelineNewBusiness() {
    const req = await getListRekapPipelineNewBusiness();
    const result = req.RekapPipelineNewBusinessResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableRekapPipelineNewBusiness tbody');
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    result.ListItem.forEach(item => {

        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td>${item.Name}</td>` +
            `<td class="text-center">${item.Item3}</td>` +
            `<td class="text-right">${item.Item4}</td>` +
            `<td class="text-center">${item.Item5}</td>` +
            `<td class="text-right">${item.Item6}</td>` +
            `<td class="text-center">${item.Item7}</td>` +
            `<td class="text-right">${item.Item8}</td>` +
            `<td class="text-center">${item.Item1}</td>` +
            `<td class="text-right">${item.Item2}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableRekapPipelineNewBusiness tfoot');
    while (tfoot.firstChild) {
        tfoot.removeChild(tfoot.firstChild);
    }

    let rowsTotal =
        `<td class="text-center" colspan = "2">TOTAL</td>` +
        `<td class="text-center">${result.Total.Item3}</td>` +
        `<td class="text-right">${result.Total.Item4}</td>` +
        `<td class="text-center">${result.Total.Item5}</td>` +
        `<td class="text-right">${result.Total.Item6}</td>` +
        `<td class="text-center">${result.Total.Item7}</td>` +
        `<td class="text-right">${result.Total.Item8}</td>` +
        `<td class="text-center">${result.Total.Item1}</td>` +
        `<td class="text-right">${result.Total.Item2}</td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}
