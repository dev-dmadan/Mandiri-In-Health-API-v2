const PERIODE = document.getElementById("periode")
const BULAN = document.getElementById("bulan")
const TAHUN = document.getElementById("tahun")
const KANALDISTRIBUSI = document.getElementById ("kanalDistribusi")
const TIPE = document.getElementById ("tipe")
const TARGET = document.getElementById ("target")
const GUID_EMPTY = "00000000-0000-0000-0000-000000000000"

document.addEventListener('DOMContentLoaded', async function () {
    document.getElementById("polisStatus").addEventListener("change", onChangePolisStatus, false);
    document.getElementById("polisStatusData").addEventListener ("change", onChangePolisStatusData, false);

    await init();
});

async function initFilter() {
    try {
        renderFilterPeriode()
        renderFilterTahun()
        
        await Promise.all([
            renderFilterBulan(),
            renderFilterKanal(),
            renderFilterTipeKinerja(),
            renderFilterTarget(),
        ])

        // event filter
        PERIODE.addEventListener("change", initDashboard, false)
        BULAN.addEventListener("change", initDashboard, false)
        TAHUN.addEventListener("change", initDashboard, false)
        KANALDISTRIBUSI.addEventListener ("change", initDashboard, false)
        TIPE.addEventListener ("change", initDashboard, false)
        TARGET.addEventListener ("change", initDashboard, false)
    } catch (error) {
        console.error('Error in initFilter', {error})
    }
}

async function init() {
    try {
        await initFilter()
        await initDashboard()
        // renderPolisStatus();
        // renderPolisStatusData();


        
        // renderTotalGWPNewBusiness();
        // renderTotalGWPRenewal();
        //Chart
        // renderPerformanceGWP();
        // renderPerfromanceKanal();
        // renderPerformanceByProduk();
        // renderSharingProduk();
        // renderTrendGwpPerBulan();
        // renderGwpPerKepemilikan();
        // renderCahartShareProduk();

        // renderCahartAnpPerKepemilikan();
        // renderListAnpPerKepemilikan();
        // renderCahartAnpPerSinergiBankMandiri();
        // renderListAnpPerSinergiBankMandiri();
        // renderChartAnpPerSektorIndustri();
        // renderListAnpPerSektorIndustri();

        //List
        // renderListArchievementBySumberBisnis();
        // renderListArchievementByKanal();
        // renderListArchievementByProduct();
        // renderListGwpPerKepemilikan();
        // renderListShareProduk();
        // renderListTopBuInforce();
        // renderListLeadingIndicator();
        // renderListLeadingIndicatorKanal();
        // renderDate();
        // renderChartLeadingProposal();
        // renderChartLeadingPolis();
        // renderChartLeadingANP();
        // renderListLeadingProposal();
        // renderListLeadingPolis();
        // renderListLeadingAnp();

      
    } catch (error) {
        throw error;
    }
}

async function initDashboard() {
    await Promise.all([
        renderTotalGWP(),
        renderTotalGWPNewBusiness()
    ])
}


function renderDate() {
    if (STARTDATE != null && ENDDATE) {
        content.innerText = `${STARTDATE} - ${ENDDATE}`;
    }
}


function onChangeKanalDistribusi() {
    const kanalDistribusiId = document.getElementById("kanalDistribusi").value;
    localStorage['kanalDistribusiId_PerformanceNasional'] = kanalDistribusiId;
    reload();
}

function onChangePolisStatus() {
    const polisStatusId = document.getElementById("polisStatus").value;
    localStorage['polis_status'] = polisStatusId;
    reload();
}

function onChangePolisStatusData() {
    const polisStatusData = document.getElementById("polisStatusData").value;
    localStorage['polis_status_data'] = polisStatusData;
    reload();
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


function onChangePeriode() {
    const periode = document.getElementById("periode").value;
    localStorage['Periode_Dashboard'] = periode;
    console.log(periode);
    reload();
}

function onChangeTipe() {
    const tipe = document.getElementById("tipe").value;
    localStorage['Tipe_Dashboard'] = tipe;
    console.log(tipe);
    reload();
}

function onChangeTarget() {
    const target = document.getElementById("target").value;
    localStorage['Target_Dashboard'] = target;
    console.log(target);
    reload();
}
function reload() {
    window.location = `${APP_URL}/dashboard/view/performanceNasional/` + guid;
}

/**
** ============================================== GET DATA ==============================================
*/
/***
 * =========================== FILTER =====================================
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
 * GET DATA KANAL DISTRIBUSI
 * @returns LIST
 */
async function getPolisStatus() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/dashboard-get-polis-status?SecretKey=${SECRET_KEY}`, {
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
 * ======================================================================================================
 */
/**
 * GET TOTAL PENCAPAIN GWP
 * @returns DECIMAL
 */
async function getTotalPencapaianGwp() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-pencapaian-gwp?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN.value,
                Periode: PERIODE.value,
                BulanId : BULAN.value,
                KanalDistribusiId: KANALDISTRIBUSI.value,
                TipeId: TIPE.value,
                TargetId: TARGET.value,
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
 * GET TOTAL GWP NEW BUSINESS
 * @returns DECIMAL
 */
async function getTotalGWPNewBusiness() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-gwp-newbusiness?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN.value,
                Periode: PERIODE.value,
                BulanId : BULAN.value,
                KanalDistribusiId: KANALDISTRIBUSI.value,
                TipeId: TIPE.value,
                TargetId: TARGET.value,
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
 * GET TOTAL GWP RENEWAL
 * @returns DECIMAL
 */
async function getTotalGWPRenewal() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-gwp-renewal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                TipeId: TIPEID,
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
 * GET PERFORMANCE GWP
 * @returns LIST<DATA>
 */
async function getPerformanceGWP() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-performance-gwp?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                TipeId: TIPEID,
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
 * GET PERFORMANCE KANAL
 * @returns CHART
 */
async function getPerformanceKanal() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-performance-kanal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                PolisStatusId: POLISSTATUSDATA,
                TipeId: TIPEID,
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
 * GET PERFORMANCE BY PRODUK
 * @returns CHART
 */
async function getPerformanceProduct() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-performance-by-product?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                PolisStatusId: POLISSTATUSID,
                TipeId: TIPEID,
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
 * GET ARCHIEVEMENT BY SUMBER BISNIS
 * @returns LIST<DATA>
 */
async function getArchievementBySumberBisnis() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-archievement-by-sumber-bisnis?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                TipeId: TIPEID,
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
 * GET ARCHIEVEMENT BY PRODUCT
 * @returns LIST<DATA>
 */
async function getArchievementByProduct() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-archievement-by-product?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                PolisStatusId: POLISSTATUSID,
                TipeId: TIPEID,
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
 * GET ARCHIEVEMENT BY KANAL
 * @returns LIST<DATA>
 */
async function getArchievementByKanalDistribusi() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-archievement-by-kanal-distribusi?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                PolisStatusId: POLISSTATUSDATA,
                TipeId: TIPEID,
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
 * GET ARCHIEVEMENT BY KANAL
 * @returns LIST<DATA>
 */
async function getTrendGwpPerBulan() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-trend-gwp-per-bulan?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
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
 * GET ARCHIEVEMENT BY KANAL
 * @returns LIST<DATA>
 */
async function getGwpPerKepemilikan() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-trend-gwp-per-kepemilikan?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
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
 * GET LIST GWP PER KEPEMILIKAN
 * @returns LIST<DATA>
 */
async function getListGwpPerKepemilikan() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-gwp-per-kepemilikan?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
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
 * GET LIST TOP 10 BU INFORCE
 * @returns LIST<DATA>
 */
async function getListTopBuInforce() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-top-bu-inforce?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSIID
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
 * GET LIST SHARE PRODUK
 * @returns LIST<DATA>
 */
async function getListShareProduk() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-share-produk?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
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
 * GET CHART SHARE PRODUK
 * @returns CAHART
 */
async function getChartShareProduk(KanalDistribusiId) {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-chart-share-produk?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
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
 * GET LIST ANP PER KEPEMILIKAN
 * @returns LIST<DATA>
 */
async function getListAnpPerKepemilikan() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-anp-per-kepemilikan?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSIID
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
 * GET CHART ANP PER KEPEMILIKAN
 * @returns CAHART
 */
async function getChartAnpPerKepemilikan() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-chart-anp-per-kepemilikan?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSIID
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
 * GET LIST ANP PER SINERGI BANK MANDIRI
 * @returns LIST<DATA>
 */
async function getListAnpPerSinergiBankMandiri() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-anp-per-sinergi-bank-mandiri?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSIID
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
 * GET CHART ANP PER SINERGI BANK MANDIRI
 * @returns CAHART
 */
async function getChartAnpPerSinergiBankMandiri() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-chart-anp-per-sinergi-bank-mandiri?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSIID
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
 * GET LIST TOP 10 ANP PER SEKTOR INDUSTRI
 * @returns LIST<DATA>
 */
async function getListAnpPerSektorIndustri() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-anp-per-sektor-industri?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSIID
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
 * GET CHART TOP ANP PER SEKTOR INDUSTRI
 * @returns CAHART
 */
async function getChartAnpPerSektorIndustri() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-chart-anp-per-sektor-industri?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId: KANALDISTRIBUSIID
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
 * GET DATA LEADING INDICATOR KANAL 
 * @returns LIST
 */
async function getLeadingIndicatorKanal() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-list-leading-perkanal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                TipeId: TIPEID,
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
 * GET CHART LEADING PROPOSAL
 * @returns CAHART
 */
async function getChartLeadingProposal() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-chart-leading-proposal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                TipeId: TIPEID,
                TargetId: TARGETID
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
 * GET CHART LEADING POLIS
 * @returns CAHART
 */
async function getChartLeadingPolis() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-chart-leading-polis?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                TipeId: TIPEID,
                TargetId: TARGETID
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
 * GET CHART LEADING ANP
 * @returns CAHART
 */
async function getChartLeadingAnp() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-chart-leading-anp?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                Tahun: TAHUN,
                Periode: PERIODE,
                BulanId : BULANID,
                KanalDistribusiId: KANALDISTRIBUSIID,
                TipeId: TIPEID,
                TargetId: TARGETID
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
 * RENDER FILTER
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
 * RENDER FILTER
 * @returns VIEW
 */
async function renderPolisStatus() {
    try {
        const req = await getPolisStatus();
        const result = req.GetPolisStatusResult;

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#polisStatus');
        var opt = document.createElement('option');
        opt.value = GUID_EMPTY;
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        result.ListPolisStatatus.forEach(item => {
            var opt = document.createElement('option');
            opt.value = item.Id;
            opt.innerHTML = item.Name;
            selectOption.appendChild(opt);
        });

        selectOption.value = POLISSTATUSID;

    } catch (error) {
        throw error;
    }
}

/**
 * RENDER FILTER
 * @returns VIEW
 */
async function renderPolisStatusData() {
    try {
        const req = await getPolisStatus();
        const result = req.GetPolisStatusResult;

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#polisStatusData');
        var opt = document.createElement('option');
        opt.value = GUID_EMPTY;
        opt.innerHTML = "ALL";
        selectOption.appendChild(opt);

        result.ListPolisStatatus.forEach(item => {
            var opt = document.createElement('option');
            opt.value = item.Id;
            opt.innerHTML = item.Name;
            selectOption.appendChild(opt);
        });

        selectOption.value = POLISSTATUSDATA;

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
        opt.value = GUID_EMPTY;
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
async function renderFilterTahun() {
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
        var dataTarget = result.ListTarget;
        const firstOpt = new Option("ALL", GUID_EMPTY, true, true);
        TARGET.append(firstOpt);

        dataTarget.forEach(item => {
            var opt = new Option(item.Name, item.Id, false, false);
            TARGET.append(opt);
        });
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

        const dataTipeKinerja = result.ListTipeKinerja;
        const firstOpt = new Option("ALL", GUID_EMPTY, true, true);
        TIPE.append(firstOpt);

        dataTipeKinerja.forEach(item => {
            const opt = new Option(item.Name, item.Id, false, false);
            TIPE.append(opt);
        });
    } catch (error) {
        throw error;
    }
}
/**
 * ======================================================================
 */

/**
 * RENDER PENCAPAIAN TARGET
 * @returns VIEW
 */
async function renderTotalGWP() {
    try {
        const req = await getTotalPencapaianGwp();
        const result = req.TotalPencapaianGwpResult;

        if (!result.Success) {
            throw result.Message;
        }

        let value = result.ProgresBar;
        const progressBarDisplay = document.querySelector('#progressBarDisplay');
        progressBarDisplay.innerHTML = `${value}%`;

        const progressBarValue = document.querySelector('#progressBarValue');
        progressBarValue.ariaValueNow = `${value}%`;
        progressBarValue.style.width = `${value}%`;

        const totalGWP = document.querySelector('#totalGWP');
        totalGWP.innerHTML = `IDR ${result.Total}`;

    } catch (error) {
        throw error;
    }
}
/**
 * RENDER AMOUNT GWP
 * @returns VIEW
 */
async function renderTotalGWPNewBusiness() {
    try {
        const req = await getTotalGWPNewBusiness();
        const result = req.TotalPencapaianGWPNewBusinessResult;
        if (!result.Success) {
            throw result.Message;
        }

        let value = result.ProgresBar;
        const progressBarDisplay = document.querySelector('#progressBarDisplayGwpNewBusiness');
        progressBarDisplay.innerHTML = `${value}%`;

        const progressBarValue = document.querySelector('#progressBarValueGwpNewBusiness');
        progressBarValue.ariaValueNow = `${value}%`;
        progressBarValue.style.width = `${value}%`;

        const totalGWP = document.querySelector('#totalGWPNewBusiness');
        totalGWP.innerHTML = `IDR ${result.Total}`;

    } catch (error) {
        throw error;
    }
}
/**
 * RENDER AMOUNT ANP
 * @returns VIEW
 */
async function renderTotalGWPRenewal() {
    try {
        const req = await getTotalGWPRenewal();
        const result = req.TotalPencapaianGWPRenewalResult;

        if (!result.Success) {
            throw result.Message;
        }

        let value = result.ProgresBar;
        const progressBarDisplay = document.querySelector('#progressBarDisplayGwpRenewal');
        progressBarDisplay.innerHTML = `${value}%`;

        const progressBarValue = document.querySelector('#progressBarValueGwpRenewal');
        progressBarValue.ariaValueNow = `${value}%`;
        progressBarValue.style.width = `${value}%`;

        const totalGWP = document.querySelector('#totalGWPRenewal');
        totalGWP.innerHTML = `IDR ${result.Total}`;
    } catch (error) {
        throw error;
    }
}
/**
 * RENDER PERFORMANCE GWP
 * @returns VIEW CHART
 */
async function renderPerformanceGWP() {
    const req = await getPerformanceGWP();
    const result = req.PerformanceGWPResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    Highcharts.chart('container', {
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
                borderRadiusTopLeft: '0%',
                borderRadiusTopRight: '0%'
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
                        valueSuffix: ' Miliyar'
                    }
                },
                {
                    name: result.Series[1].name,
                    type: 'column',
                    yAxis: 0,
                    data: result.Series[1].data,
                    tooltip:
                    {
                        valueSuffix: ' Miliyar'
                    },
                }
            ]
    });
}
/**
 * RENDER PERFORMANCE GWP By KANAL
 * @returns VIEW CHART
 */
async function renderPerfromanceKanal() {
    const req = await getPerformanceKanal(KANALDISTRIBUSIID);
    const result = req.PerformanceKanalResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    Highcharts.chart('container2', {
        colors: ['#5f32d3', '#ff8c00'],
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: '',
            align: 'left'
        },
        credits: {
            enabled: false

        },
        subtitle: {
            enabled: false,
        },
        xAxis: [{
            categories: result.Category,
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels:
            {
                enabled: false
            },
            gridLineColor: 'white',
            title:
            {
                enabled: false
            },
          
        }, { // Secondary yAxis
            labels:
            {
                enabled: false
            },
            gridLineColor: 'white',
            title:
            {
                enabled: false
            },
        }],
        tooltip: {
            shared: true
        },
        legend: {
            enabled: false,
            align: 'left',
            x: 80,
            verticalAlign: 'top',
            y: 80,
            floating: true,
            // backgroundColor:
            //     Highcharts.defaultOptions.legend.backgroundColor || // theme
            //     'rgba(255,255,255,0.25)'
        },
        series: [{
            name: result.Series[0].name,
            type: 'column',
            yAxis: 1,
            data: result.Series[0].data,
            tooltip: {
                valueSuffix: ' Miliar'
            }
    
        }, {
            name: result.Series[1].name,
            type: 'spline',
            data: result.Series[1].data,
            tooltip: {
                valueSuffix: ' Miliar'
            }
        }]
    });

}
/**
 * RENDER PERFORMANCE GWP By PRODUCT
 * @returns VIEW CHART
 */
async function renderPerformanceByProduk() {
    const req = await getPerformanceProduct(KANALDISTRIBUSIID);
    const result = req.PerformanceByProductResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    Highcharts.setOptions({
        colors: ['#5f32d3', '#ff8c00', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
    });


    Highcharts.chart('container3', {
        credits: {
            enabled: false
        },
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: result.Category,
            crosshair: true
        },


        yAxis: {
            labels: {
                enabled: false
            },
            gridLineColor: 'white',
            min: 0,
            title: {
                text: ' '
            }
        },
        tooltip: {
            // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            //     '<td style="padding:0"><b>{point.y:.1f} Milyar </b></td></tr>',
            // footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {

            column: {
                pointPadding: 0.2,
                borderWidth: 0,
                dataLabels:
                {
                    enabled: true
                },
            }
        },
        legend: {
            enabled: false,
            align: 'left',
            x: 330,
            verticalAlign: 'top',
            y: -50,
            floating: true,
        },
        series: [{
            name: result.Series[0].name,
            data: result.Series[0].data,
            tooltip: {
                valueSuffix: ' Miliyar'
            },

        }, {
            name: result.Series[1].name,
            data: result.Series[1].data,
            tooltip: {
                valueSuffix: ' Miliyar'
            },

        }]
    });

}
/**
 * RENDER LIST DETAIL ARCHIEVEMENT BY SUMBER BISNIS
 * @returns VIEW CHART
 */
async function renderListArchievementBySumberBisnis() {
    const req = await getArchievementBySumberBisnis(KANALDISTRIBUSIID);
    const result = req.ArchievementBySumberBisnisResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableDetailAchievementBySumberBisnis tbody');
    result.ListItem.forEach(item => {

        let rows =
            `<td style="border 1px solid;" class="text-center">${seqNo++}</td>` +
            `<td style="border 1px solid;" class="text-left">${item.Name}</td>` +
            `<td style="border 1px solid;" class="text-right">${item.Item1}</td>` +
            `<td style="border 1px solid;" class="text-right">${item.Item2}</td>` +
            `<td style="border 1px solid;" class="text-center">${item.Item3}%</td>` +
            `<td><div style="background-color: ${progressBarColor(item.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    let rowsTotal =
        `<td></td>` +
        `<td class="align-middle" class="text-center" style="color: #ffffff">TOTAL</td>` +
        `<td class="align-middle" class="text-right" style="color: #ffffff">${result.Total.Item1}</td>` +
        `<td class="align-middle" class="text-right" style="color: #ffffff">${result.Total.Item2}</td>` +
        `<td class="align-middle" class="text-center" style="color: #ffffff">${result.Total.Item3}%</td>` +
        `<td class="align-middle" class="text-center"><div style="background-color: ${progressBarColor(result.Total.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#16aaff";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}
/**
 * RENDER LIST DETAIL ARCHIEVEMENT BY KANAL
 * @returns VIEW CHART
 */
async function renderListArchievementByKanal() {
    const req = await getArchievementByKanalDistribusi(KANALDISTRIBUSIID);
    const result = req.ArchievementByKanalDistribusiResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableDetailAchievementByKanalDistribusi tbody');
    result.ListItem.forEach(item => {
        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td class="text-left">${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-right">${item.Item2}</td>` +
            `<td class="text-center">${item.Item3}%</td>` +
            `<td><div style="background-color: ${progressBarColor(item.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableDetailAchievementByKanalDistribusi tfoot');
    let rowsTotal =
        `<td></td>` +
        `<td style="color:white;" class="text-center align-middle">TOTAL</td>` +
        `<td style="color:white;" class="text-right align-middle">${result.Total.Item1}</td>` +
        `<td style="color:white;" class="text-right align-middle">${result.Total.Item2}</td>` +
        `<td style="color:white;" class="text-center align-middle">${result.Total.Item3}%</td>` +
        `<td class="align-middle"><div style="background-color: ${progressBarColor(result.Total.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}
/**
 * RENDER LIST DETAIL ARCHIEVEMENT BY PRODUCT
 * @returns VIEW CHART
 */
async function renderListArchievementByProduct() {
    const req = await getArchievementByProduct();
    const result = req.KinerjaProdukResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableDetailAchievementByProduk tbody');
    result.ListItem.forEach(item => {
        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td class="text-left">${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-right">${item.Item2}</td>` +
            `<td class="text-center">${item.Item3}%</td>` +
            `<td><div style="background-color: ${progressBarColor(item.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });

    const tfoot = document.querySelector('#tableDetailAchievementByProduk tfoot');
    let rowsTotal =
        `<td></td>` +
        `<td class="align-middle" style="color: #ffffff" class="text-center align-middle">TOTAL</td>` +
        `<td class="align-middle" style="color: #ffffff" class="text-right align-middle">${result.Total.Item1}</td>` +
        `<td class="align-middle" style="color: #ffffff" class="text-right align-middle">${result.Total.Item2}</td>` +
        `<td class="align-middle" style="color: #ffffff" class="text-center align-middle">${result.Total.Item3}%</td>` +
        `<td class="align-middle" style="color: #ffffff" class="align-middle"><div style="background-color: ${progressBarColor(result.Total.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER SHARING PRODUK
 * @returns VIEW CHART
 */
async function renderSharingProduk() {
    const req = await getPerformanceProduct(KANALDISTRIBUSIID);
    const result = req.PerformanceByProductResult;

    if (!result.Status.Success) {
        throw result.Message;
    }
    Highcharts.setOptions({
        colors: ['#ff8c00', '#5f32d3', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
    });


    Highcharts.chart('container4', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '',
            align: 'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Indemnity',
                y: 0,

            }, {
                name: 'Managed Care',
                y:0,
                sliced: true,
                selected: true
            }, {
                name: 'GPA',
                y:0,
                sliced: true,
                selected: true
            }, {
                name: 'GTL',
                y:0,
                sliced: true,
                selected: true
            },]
        }]
    });
}

/**
 * RENDER NEW BUSINESS VS RENEWAL
 * @returns VIEW CHART
 */
async function renderTrendGwpPerBulan() {
    const req = await getTrendGwpPerBulan(KANALDISTRIBUSIID);
    const result = req.RenewalVsNewBusinessResult;

    if (!result.Status.Success) {
        throw result.Message;
    }
    Highcharts.setOptions({
        colors: ['#ff8c00', '#5f32d3', '#16aaff']
    });


    Highcharts.chart('container6', {
        credits: {
            enabled: false
       },
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: result.Category,
            crosshair: false
        },
        yAxis: [{ // Primary yAxis
            labels: {
                enabled: false
            },
            gridLineColor: 'white',
            title: {
                enabled: false
            }
        },
        { // Secondary yAxis
            title: {
                text: '',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }
        }],
        tooltip: {
            // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            //     '<td style="padding:0"><b>{point.y:.1f} Milyar </b></td></tr>',
            // footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            dataLabels:
            {
                enabled: true
            },
            enableMouseTracking: true,
            borderRadiusTopLeft: '0%',
            borderRadiusTopRight: '0%',
            
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
                dataLabels:
                {
                    enabled: true
                },
            }
        },
        legend: {
            enabled: false,
            align: 'left',
            x: 330,
            verticalAlign: 'top',
            y: -50,
            floating: true,
        },
        series: [{
            name: result.Series[0].name,
            data: result.Series[0].data

        }, {
            name: result.Series[1].name,
            data: result.Series[1].data

        }, {
            name: result.Series[2].name,
            data: result.Series[2].data

        }]
    });
}

/**
 * RENDER SHARING GWP PER KEPEMILIKAN
 * @returns VIEW CHART
 */
async function renderGwpPerKepemilikan() {
    const req = await getGwpPerKepemilikan();
    const result = req.GwpPerKepemilikanResult;

    let dataSeries = [];
    if (!result.Status.Success) {
        throw result.Message;
    }
    Highcharts.setOptions({
        colors: ['#ff8c00', '#5f32d3', '#DDDF00',   '#16AAFF', '#FFF263', '#6AF9C4',"#017EB8", "#28B3AC", "#F7AD1A", "#E86340", "#9FE7F5", "#063F5C"]
    });

    result.data.forEach(item => {
        dataSeries.push({
            name: item.Name,
            y: item.Persentase
        });
    });

    Highcharts.chart('container7', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 5
            }
        },
        title: {
            text: '',
            style: {
                fontWeight: 'bold',
                fontSize: '25px'
            }
        },
        subtitle: {
            // text: '3D donut in Highcharts'
        },
        tooltip: {
            // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
            pointFormat: '<tr><td style="padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>&nbsp;{point.y:1f}%</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            pie: {
                innerSize: "60%",
                depth: 5,
                showInLegend: true,
                dataLabels: {
                    formatter: function() {
                        return this.point.y
                    },
                    color: 'white',
                    distance:-25
                }
                // dataLabels: {
                //     enabled: false
                // }
            }
        },
        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical',
            format : '<b>{point.key}</b><br>',
            itemStyle: {
                fontSize:'11px',
            },
        },
        credits: {
            enabled: false
        },
        exporting: {
            showTable: false,
            allowHTML: true
        },
        series: [{
            name: 'Persentase',
            data: dataSeries
        }]
    });

}

/**
 * RENDER LIST GWP PER KEPEMILIKAN
 * @returns VIEW CHART
 */
async function renderListGwpPerKepemilikan() {
    const req = await getListGwpPerKepemilikan(KANALDISTRIBUSIID);
    const result = req.ListGwpPerKepemilikanResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableListGwpPerKepemilikan tbody');
    result.ListItem.forEach(item => {
        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td>${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-center">${item.Item2}%</td>` 
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    let rowsTotal =
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center align-middle" colspan="2">TOTAL</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-right align-middle">${result.Total.Item1}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center align-middle">${result.Total.Item2}%</td>` 
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#16aaff";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}

/**
 * RENDER LIST TOP 10 BU INFORCE
 * @returns VIEW CHART
 */
async function renderListTopBuInforce() {
    const req = await getListTopBuInforce(KANALDISTRIBUSIID);
    const result = req.ListBuInforceResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableListTopBuInforce tbody');
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
    let rowsTotal =
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center" colspan="2">TOTAL</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-right">${result.Total.Item1}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-right">${result.Total.Item2}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center"></td>` 
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#16aaff";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}

/**
 * RENDER LIST LEADING INDICATOR
 * @returns VIEW CHART
 */
// async function renderListLeadingIndicator() {
//     const req = await getLeadingIndicator(KANALDISTRIBUSIID);
//     const result = req.LeadingIndicatorNewBusinessKanalResult;

//     if (!result.Status.Success) {
//         throw result.Message;
//     }

//     let seqNo = 1;
//     const tbody = document.querySelector('#tableListLeadingIndicator tbody');
//     result.ListItem.forEach(item => {
//         let rows =
//             `<td class="text-center">${seqNo++}</td>` +
//             `<td>${item.Name}</td>` +
//             `<td class="text-center">${item.Item1}</td>` +
//             `<td class="text-center">${item.Item2}</td>` +
//             `<td class="text-center">${item.Item3}</td>` 
//         let tr = document.createElement('tr');
//         tr.innerHTML = rows;
//         tbody.appendChild(tr);
//     });
//     let rowsTotal =
//         `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center" colspan="2">TOTAL</td>` +
//         `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item1}</td>` +
//         `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item2}</td>` +
//         `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item3}</td>` 
//     let trTotal = document.createElement('tr');
//     trTotal.style.backgroundColor = "#16aaff";
//     trTotal.style.fontWeight = "bold";
//     trTotal.innerHTML = rowsTotal;
//     tbody.appendChild(trTotal);
// }

/**
 * RENDER SHARING PRODUK
 * @returns VIEW CHART
 */
async function renderCahartShareProduk() {
    const req = await getChartShareProduk();
    const result = req.ChartProdukShareByGwpResult;
    let dataSeries = [];

    if (!result.Status.Success) {
        throw result.Message;
    }
    Highcharts.setOptions({
        // colors: ["#017EB8", "#28B3AC", "#F7AD1A", "#E86340", "#9FE7F5", "#063F5C"],
        colors: ['#5f32d3', '#ff8c00', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4',"#017EB8", "#28B3AC", "#F7AD1A", "#E86340", "#9FE7F5", "#063F5C"]
    });

    result.data.forEach(item => {
        dataSeries.push({
            name: item.Name,
            y: item.Persentase
        });
    });

    Highcharts.chart('container8', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 5
            }
        },
        title: {
            text: '',
            style: {
                fontWeight: 'bold',
                fontSize: '25px'
            }
        },
        subtitle: {
            // text: '3D donut in Highcharts'
        },
        tooltip: {
            //  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>',
            headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
            pointFormat: '<tr><td style="padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>&nbsp;{point.y:1f}%</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            pie: {
                innerSize: "60%",
                depth: 5,
                showInLegend: true,
                dataLabels: {
                    formatter: function() {
                        return this.point.y
                    },
                    color: 'white',
                    distance:-25
                }
                // dataLabels: {
                //     enabled: false
                // }
            }
        },
        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical',
            format : '<b>{point.key}</b><br>',
            itemStyle: {
                fontSize:'8px',
            },
        },
        credits: {
            enabled: false
        },
        exporting: {
            showTable: false,
            allowHTML: true
        },
        series: [{
            name: 'Persentase',
            data: dataSeries,
          
        }]
    });
}

/**
 * RENDER LIST SHARE PRODUK
 * @returns VIEW LIST
 */
async function renderListShareProduk() {
    const req = await getListShareProduk();
    const result = req.ListProdukShareByGwpResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableListShareProduk tbody');
    result.ListItem.forEach(item => {
        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td class="text-left">${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-center">${item.Item2}%</td>` 
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableListShareProduk tfoot');
    let rowsTotal =
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center align-middle" colspan="2">TOTAL</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-right align-middle">${result.Total.Item1}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center align-middle">${result.Total.Item2}%</td>` 
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER CHART ANP PER KEPEMILIKAN
 * @returns VIEW CHART
 */
async function renderCahartAnpPerKepemilikan() {
    const req = await getChartAnpPerKepemilikan();
    const result = req.ChartAnpPerKepemilikanResult;
    let dataSeries = [];

    if (!result.Status.Success) {
        throw result.Message;
    }
    Highcharts.setOptions({
        // colors: ["#017EB8", "#28B3AC", "#F7AD1A", "#E86340", "#9FE7F5", "#063F5C"],
        colors: ['#5f32d3', '#ff8c00', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4',"#017EB8", "#28B3AC", "#F7AD1A", "#E86340", "#9FE7F5", "#063F5C"]
    });

    result.data.forEach(item => {
        dataSeries.push({
            name: item.Name,
            y: item.Total
        });
    });

    Highcharts.chart('container9', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 5
            }
        },
        title: {
            text: '',
            style: {
                fontWeight: 'bold',
                fontSize: '25px'
            }
        },
        subtitle: {
            // text: '3D donut in Highcharts'
        },
        tooltip: {
            // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
            pointFormat: '<tr><td style="padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>&nbsp;{point.y:1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            pie: {
                innerSize: "60%",
                depth: 5,
                showInLegend: true,
                dataLabels: {
                    formatter: function() {
                        return this.point.y
                    },
                    color: 'white',
                    distance:-25
                }
                // dataLabels: {
                //     enabled: false
                // }
            }
        },
        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical',
            format : '<b>{point.key}</b><br>',
            itemStyle: {
                fontSize:'8px',
            },
        },
        credits: {
            enabled: false
        },
        exporting: {
            showTable: false,
            allowHTML: true
        },
        series: [{
            name: 'Jumlah BU',
            data: dataSeries
        }]
    });
}

/**
 * RENDER LIST ANP PER KEPEMILIKAN
 * @returns VIEW LIST
 */
async function renderListAnpPerKepemilikan() {
    const req = await getListAnpPerKepemilikan();
    const result = req.ListAnpPerKepemilikanResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableListAnpPerKepemilikan tbody');
    result.ListItem.forEach(item => {
        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td class="text-left">${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-center">${item.Item2}</td>` 
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableListAnpPerKepemilikan tfoot');
    let rowsTotal =
        `<td class="align-middle" style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center" colspan="2">TOTAL</td>` +
        `<td class="align-middle" style="background-color: #16aaff; color: white; font-wigth: bold" class="text-right">${result.Total.Item1}</td>` +
        `<td class="align-middle" style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item2}</td>` 
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER CHART ANP PER SINERGI BANK MANDIRI
 * @returns VIEW CHART
 */
async function renderCahartAnpPerSinergiBankMandiri() {
    const req = await getChartAnpPerSinergiBankMandiri();
    const result = req.ChartAnpPerSinergiBankMandiriResult;
    let dataSeries = [];

    if (!result.Status.Success) {
        throw result.Message;
    }
    Highcharts.setOptions({
        // colors: ["#017EB8", "#28B3AC", "#F7AD1A", "#E86340", "#9FE7F5", "#063F5C"],
        colors: ['#5f32d3', '#ff8c00', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4',"#017EB8", "#28B3AC", "#F7AD1A", "#E86340", "#9FE7F5", "#063F5C"]
    });

    result.data.forEach(item => {
        dataSeries.push({
            name: item.Name,
            y: item.Total
        });
    });

    Highcharts.chart('container10', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 5
            }
        },
        title: {
            text: '',
            style: {
                fontWeight: 'bold',
                fontSize: '25px'
            }
        },
        subtitle: {
            // text: '3D donut in Highcharts'
        },
        tooltip: {
            // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
            pointFormat: '<tr><td style="padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>&nbsp;{point.y:1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            pie: {
                innerSize: "60%",
                depth: 5,
                showInLegend: true,
                dataLabels: {
                    formatter: function() {
                        return this.point.y
                    },
                    color: 'white',
                    distance:-25
                }
                // dataLabels: {
                //     enabled: false
                // }
            }
        },
        // legend: {
        //     align: 'right',
        //     verticalAlign: 'middle',
        //     layout: 'vertical',
        //     format : '<b>{point.key}</b><br>',
        //     itemStyle: {
        //         fontSize:'8px',
        //     },
        // },
        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical',
            itemStyle: {
                fontSize:'9px',
            },
            labelFormatter: function() {
                var words = this.name.split(/[\s]+/);
                var numWordsPerLine = 2;
                var str = [];
    
                for (var word in words) {
                    if (word > 0 && word % numWordsPerLine == 0)
                        str.push('<br>');
    
                     str.push(words[word]);
                }
    
                return str.join(' ');
            }
        },
        credits: {
            enabled: false
        },
        exporting: {
            showTable: false,
            allowHTML: true
        },
        series: [{
            name: 'Jumlah BU',
            data: dataSeries
        }]
    });
}

/**
 * RENDER LIST ANP PER SINERGI BANK MANDIRI
 * @returns VIEW LIST
 */
async function renderListAnpPerSinergiBankMandiri() {
    const req = await getListAnpPerSinergiBankMandiri();
    const result = req.ListAnpPerSinergiBankMandiriResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableListAnpPerSinergiBankMandiri tbody');
    result.ListItem.forEach(item => {
        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td class="text-left">${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-center">${item.Item2}</td>` 
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableListAnpPerSinergiBankMandiri tfoot');
    let rowsTotal =
        `<td class="align-middle" style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center" colspan="2">TOTAL</td>` +
        `<td class="align-middle" style="background-color: #16aaff; color: white; font-wigth: bold" class="text-right">${result.Total.Item1}</td>` +
        `<td class="align-middle" style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item2}</td>` 
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER CHART TOP 10 ANP PER SEKTOR INDUSTRI
 * @returns VIEW CHART
 */
async function renderChartAnpPerSektorIndustri() {
    const req = await getChartAnpPerSektorIndustri();
    const result = req.ChartAnpPerSektorIndustriResult;
    let dataSeries = [];

    if (!result.Status.Success) {
        throw result.Message;
    }
    Highcharts.setOptions({
        // colors: ["#017EB8", "#28B3AC", "#F7AD1A", "#E86340", "#9FE7F5", "#063F5C"],
        colors: ['#5f32d3', '#ff8c00', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4',"#017EB8", "#28B3AC", "#F7AD1A", "#E86340", "#9FE7F5", "#063F5C"]
    });

    result.data.forEach(item => {
        dataSeries.push({
            name: item.Name,
            y: item.Total
        });
    });

    Highcharts.chart('container11', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 5
            }
        },
        title: {
            text: '',
            style: {
                fontWeight: 'bold',
                fontSize: '25px'
            }
        },
        subtitle: {
            // text: '3D donut in Highcharts'
        },
        tooltip: {
            // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
            pointFormat: '<tr><td style="padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>&nbsp;{point.y:1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            pie: {
                innerSize: "60%",
                depth: 5,
                showInLegend: true,
                dataLabels: {
                    formatter: function() {
                        return this.point.y
                    },
                    color: 'white',
                    distance:-25
                }
                // dataLabels: {
                //     enabled: false
                // }
            }
        },
        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical',
            format : '<b>{point.key}</b><br>',
            itemStyle: {
                fontSize:'8px',
            },
        },
        credits: {
            enabled: false
        },
        exporting: {
            showTable: false,
            allowHTML: true
        },
        series: [{
            name: 'Jumlah BU',
            data: dataSeries
        }]
    });
}

/**
 * RENDER LIST TOP 10 ANP PER SEKTOR INDUSTRI
 * @returns VIEW LIST
 */
async function renderListAnpPerSektorIndustri() {
    const req = await getListAnpPerSektorIndustri();
    const result = req.ListAnpPerSektorIndustriResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableListAnpPerSektorIndustri tbody');
    result.ListItem.forEach(item => {
        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td class="text-left">${item.Name}</td>` +
            `<td class="text-right">${item.Item1}</td>` +
            `<td class="text-center">${item.Item2}</td>` 
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    const tfoot = document.querySelector('#tableListAnpPerSektorIndustri tfoot');
    let rowsTotal =
        `<td class="align-middle" style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center" colspan="2">TOTAL</td>` +
        `<td class="align-middle" style="background-color: #16aaff; color: white; font-wigth: bold" class="text-right">${result.Total.Item1}</td>` +
        `<td class="align-middle" style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item2}</td>` 
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}


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

async function renderChartLeadingProposal() {
    const req = await getChartLeadingProposal();
    const result = req.LeadingProposalResult;

    console.log(req);
    if (!result.Status.Success) {
        throw result.Status.Message;
    }

    Highcharts.setOptions({
        colors: ['#5f32d3', '#ff8c00', '#DDDF00']
    });
    Highcharts.chart('container16', {
    chart: {
        zoomType: 'xy'
    },
    
    credits: { enabled: false },
    title: {
        text: '',
        align: 'left'
    },
    subtitle: {
        // text: 'Source: WorldClimate.com',
        align: 'left'
    },
    xAxis: [{
        categories: result.Category,
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        gridLineColor: 'white',
        labels: {
            enabled: false,
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        title: {
            enabled: false,
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true

    }, { // Secondary yAxis
        gridLineColor: 'white',
        title: {
            enabled: false
        },
        labels: {
            enabled: false
        }

    }, { // Tertiary yAxis
        gridLineColor: 'white',
        title: {
            enabled: false
           
        },
        labels: {
            enabled: false
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        enabled: false,
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || // theme
            'rgba(255,255,255,0.25)'
    },
    series: [{
        name: result.Series[0].name,
        type: 'column',
        yAxis: 1,
        data: result.Series[0].data,
        tooltip: {
            valueSuffix: ' BU'
        }

    }, {
        name: result.Series[1].name,
        type: 'spline',
        yAxis: 2,
        data: result.Series[1].data,
        marker: {
            enabled: false
        },
        dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' BU'
        }

        }, {
        
        name: result.Series[2].name,
        type: 'spline',
        data: result.Series[2].data,
        tooltip: {
            valueSuffix: '%'
        }
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                },
                yAxis: [{
                    labels: {
                        align: 'right',
                        x: 0,
                        y: -6
                    },
                    showLastLabel: false
                }, {
                    labels: {
                        align: 'left',
                        x: 0,
                        y: -6
                    },
                    showLastLabel: false
                }, {
                    visible: false
                }]
            }
        }]
    }
});

}

async function renderChartLeadingPolis() {
    const req = await getChartLeadingPolis();
    const result = req.LeadingPolisResult;

    console.log(req);
    if (!result.Status.Success) {
        throw result.Status.Message;
    }
    Highcharts.setOptions({
        colors: [ '#16AAFF', '#5F32D3',  '#e5cb24' ]
    });

    Highcharts.chart('container17', {
    chart: {
        zoomType: 'xy'
        },
    credits: { enabled: false },
    title: {
        text: '',
        align: 'left'
    },
    subtitle: {
        // text: 'Source: WorldClimate.com',
        align: 'left'
    },
    xAxis: [{
        categories: result.Category,
        crosshair: true
    }],
        yAxis: [{ // Primary yAxis
        gridLineColor: 'white',
        labels: {
            enabled: false
        },
        title: {
            enabled: false
        },
        opposite: true

    }, { // Secondary yAxis
        gridLineColor: 'white',
        title: {
            enabled: false
        },
        labels: {
            enabled: false
        }

    }, { // Tertiary yAxis
        gridLineColor: 'white',
        title: {
            enabled: false
        },
        labels: {
            enabled: false
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        enabled: false,
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || // theme
            'rgba(255,255,255,0.25)'
    },
    series: [{
        name: result.Series[0].name,
        type: 'column',
        yAxis: 1,
        data: result.Series[0].data,
        tooltip: {
            valueSuffix: ' BU'
        }

    }, {
        name: result.Series[1].name,
        type: 'spline',
        yAxis: 2,
        data: result.Series[1].data,
        marker: {
            enabled: false
        },
        dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' BU'
        }

    }, {
        name: result.Series[2].name,
        type: 'spline',
        data: result.Series[2].data,
        tooltip: {
            valueSuffix: '%'
        }
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                   
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                },
                yAxis: [{
                    labels: {
                        align: 'right',
                        x: 0,
                        y: -6
                    },
                    showLastLabel: false
                }, {
                    labels: {
                        align: 'left',
                        x: 0,
                        y: -6
                    },
                    showLastLabel: false
                }, {
                    visible: false
                }]
            }
        }]
    }
});

}

async function renderChartLeadingANP() {
    const req = await getChartLeadingAnp();
    const result = req.LeadingAnpResult;

    console.log(req);
    if (!result.Status.Success) {
        throw result.Status.Message;
    }
    
    Highcharts.chart('container18', {
    colors: ['#ff8c00', '#5f32d3', '#16AAFF' ],
    chart: {
        zoomType: 'xy'
    },
    credits: { enabled: false },
    title: {
        text: '',
        align: 'left'
    },
    subtitle: {
        // text: 'Source: WorldClimate.com',
        align: 'left'
    },
    xAxis: [{
        categories: result.Category,
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        gridLineColor: 'white',
        labels: {
           enabled: false
        },
        title: {
            enabled: false
        },
        opposite: true

    }, { // Secondary yAxis
        gridLineColor: 'white',
        title: {
            enabled: false
        },
        labels: {
            enabled: false
        }

    }, { // Tertiary yAxis
        gridLineColor: 'white',
        title: {
            enabled: false
        },
        labels: {
            enabled: false
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        enabled: false,
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || // theme
            'rgba(255,255,255,0.25)'
    },
    series: [{
        name: result.Series[0].name,
        type: 'column',
        yAxis: 1,
        data: result.Series[0].data,
        tooltip: {
            valueSuffix: ' Miliar'
        }

    }, {
        name: result.Series[1].name,
        type: 'spline',
        yAxis: 2,
        data: result.Series[1].data,
        marker: {
            enabled: false
        },
        dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' Miliar'
        }

    }, {
        name: result.Series[2].name,
        type: 'spline',
        data: result.Series[2].data,
        tooltip: {
            valueSuffix: '%'
        }
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                },
                yAxis: [{
                    labels: {
                        align: 'right',
                        x: 0,
                        y: -6
                    },
                    showLastLabel: false
                }, {
                    labels: {
                        align: 'left',
                        x: 0,
                        y: -6
                    },
                    showLastLabel: false
                }, {
                    visible: false
                }]
            }
        }]
    }
});

}

/**
 * RENDER LIST LEADING PROPOSAL
 * @returns VIEW
 */
async function renderListLeadingProposal() {
    const req = await getLeadingIndicatorKanal();
    const result = req.LeadingIndicatorPerKanalResult;

    if (!result.Status.Success) {
        throw result.Status.Message;
    }

    const tbody = document.querySelector('#tableListLeadingIndicatorProposal tbody');
    
    let seqNo = 1;
    result.ListItem.forEach(item => {
        let rows =
            `<td style="text-align: center">${seqNo}</td>` +
            `<td style="text-align: left">${item.Name}</td>` +
            `<td style="text-align: center">${item.Item1}</td>` +
            `<td style="text-align: center">${item.Item2}</td>` +
            `<td style="text-align: center">${item.Item3}%</td>` +
            `<td style="text-align: center"><div style="background-color: ${progressBarColor(item.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>` 
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
        seqNo++;
    });
    const tfoot = document.querySelector('#tableListLeadingIndicatorProposal tfoot');
    let rowsTotal =
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold" colspan="2">TOTAL</td>` +
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold">${result.Total.Item1}</td>` +
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold">${result.Total.Item2}</td>` +
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold">${result.Total.Item3}%</td>`+ 
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold"><div style="background-color: ${progressBarColor(result.Total.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER LIST LEADING PROPOSAL
 * @returns VIEW
 */
async function renderListLeadingPolis() {
    const req = await getLeadingIndicatorKanal();
    const result = req.LeadingIndicatorPerKanalResult;

    if (!result.Status.Success) {
        throw result.Status.Message;
    }

    const tbody = document.querySelector('#tableListLeadingIndicatorPolis tbody');
    
    let seqNo = 1;
    result.ListItem.forEach(item => {
        let rows =
            `<td style="text-align: center">${seqNo}</td>` +
            `<td style="text-align: left">${item.Name}</td>` +
            `<td style="text-align: center">${item.Item4}</td>` +
            `<td style="text-align: center">${item.Item5}</td>` +
            `<td style="text-align: center">${item.Item6}%</td>` +
            `<td style="text-align: center"><div style="background-color: ${progressBarColor(item.Item6)};border-radius:50%;width:15px;height:15px;"></div></td>` 
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
        seqNo++;
    });
    const tfoot = document.querySelector('#tableListLeadingIndicatorPolis tfoot');
    let rowsTotal =
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold" colspan="2">TOTAL</td>` +
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold">${result.Total.Item4}</td>` +
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold">${result.Total.Item5}</td>` +
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold">${result.Total.Item6}%</td>`+ 
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold"><div style="background-color: ${progressBarColor(result.Total.Item6)};border-radius:50%;width:15px;height:15px;"></div></td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}

/**
 * RENDER LIST LEADING PROPOSAL
 * @returns VIEW
 */
async function renderListLeadingAnp() {
    const req = await getLeadingIndicatorKanal();
    const result = req.LeadingIndicatorPerKanalResult;

    if (!result.Status.Success) {
        throw result.Status.Message;
    }

    const tbody = document.querySelector('#tableListLeadingIndicatorAnp tbody');
    
    let seqNo = 1;
    result.ListItem.forEach(item => {
        let rows =
            `<td style="text-align: center">${seqNo}</td>` +
            `<td style="text-align: left">${item.Name}</td>` +
            `<td style="text-align: center">${item.Item10}</td>` +
            `<td style="text-align: center">${item.Item11}</td>` +
            `<td style="text-align: center">${item.Item12}%</td>` +
            `<td style="text-align: center"><div style="background-color: ${progressBarColor(item.Item12)};border-radius:50%;width:15px;height:15px;"></div></td>` 
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
        seqNo++;
    });
    const tfoot = document.querySelector('#tableListLeadingIndicatorAnp tfoot');
    let rowsTotal =
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold" colspan="2">TOTAL</td>` +
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold">${result.Total.Item10}</td>` +
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold">${result.Total.Item11}</td>` +
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold">${result.Total.Item12}%</td>`+ 
        `<td class="align-middle" style="background-color: #16aaff; text-align: center; color:white; font-weight:bold"><div style="background-color: ${progressBarColor(result.Total.Item12)};border-radius:50%;width:15px;height:15px;"></div></td>`
    let trTotal = document.createElement('tr');
    trTotal.innerHTML = rowsTotal;
    tfoot.appendChild(trTotal);
}