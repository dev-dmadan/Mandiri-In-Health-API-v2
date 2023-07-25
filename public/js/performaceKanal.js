var url = window.location.href;
var guid = url.substring(url.length, url.length-36);
localStorage['kanalDistribusiId_PerformanceKanal'] = guid;
var KANALDISTRIBUSIID = localStorage['kanalDistribusiId_PerformanceKanal'];

document.addEventListener('DOMContentLoaded', function () {
    init();
});

async function init() {
    try {

        var url = window.location.href;
        var guid = url.substring(url.length, url.length-36);
        console.log(guid);
        
        isFilterKanalVisible(false);
        renderProgressBar();
        renderTotalGWP();
        renderTotalANP();
        //Chart
        renderPerformanceGWP();
        renderPerfromanceKanal();
        renderPerformanceByProduk();
        //List
        renderListArchievementBySumberBisnis();
        renderListArchievementByKanal();
        renderListArchievementByProduct();
    } catch (error) {
        throw error;
    }
}

function isFilterKanalVisible(visible = true) {
    if (!visible) {
        const filter = document.querySelector('#filterDashboard');
        filter.childNodes[1].firstElementChild.remove();
    } else {
        renderFilter();
    }
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
        const req = await fetch(`${APP_URL}/dashboard/api/get-kanal-distribusi?SecretKey=${SECRET_KEY}`, {
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
 * GET PENCAPAIN TARGET
 * @returns DECIMAL
 */
async function getTotalPencapaianTarget(KanalDistribusiId) {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-pencapaian-target?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KanalDistribusiId
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
 * GET TOTAL GWP
 * @returns DECIMAL
 */
async function getTotalGWP(KanalDistribusiId) {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-curentYear-total-gwp?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KanalDistribusiId
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
 * GET TOTAL ANP
 * @returns DECIMAL
 */
async function getTotalANP(KanalDistribusiId) {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-curentYear-total-anp?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KanalDistribusiId
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
async function getPerformanceGWP(KanalDistribusiId) {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-performance-gwp?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KanalDistribusiId
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
async function getPerformanceKanal(KanalDistribusiId) {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-performance-kanal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KanalDistribusiId
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
async function getPerformanceProduct(KanalDistribusiId) {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-performance-by-product?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KanalDistribusiId
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
async function getArchievementBySumberBisnis(KanalDistribusiId) {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-archievement-by-sumber-bisnis?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KanalDistribusiId
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
async function getArchievementByProduct(KanalDistribusiId) {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-archievement-by-product?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KanalDistribusiId
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
async function getArchievementByKanalDistribusi(KanalDistribusiId) {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-archievement-by-kanal-distribusi?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KanalDistribusiId
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
async function getPerformancePerKanal(KanalDistribusiId) {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-performance-by-kanal?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                KanalDistribusiId : KanalDistribusiId
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
async function renderFilter() {
    try {
        const req = await getKanalDistribusi();
        const result = req.GetKanalDistribusiResult;

        if (!result.Success) {
            throw result.Message;
        }

        const selectOption = document.querySelector('#kanalDistribusi');
        var opt = document.createElement('option');
        opt.value = "00000000-0000-0000-0000-000000000000";
        opt.innerHTML = "ALL";
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
 * RENDER PENCAPAIAN TARGET
 * @returns VIEW
 */
async function renderProgressBar() {
    try {
        const req = await getTotalPencapaianTarget(KANALDISTRIBUSIID);
        const result = req.TotalPencapaianTargetResult;

        if (!result.Success) {
            throw result.Message;
        }

        let value = result.Total;
        const progressBarDisplay = document.querySelector('#progressBarDisplay');
        progressBarDisplay.innerHTML = `${value}%`;

        const progressBarValue = document.querySelector('#progressBarValue');
        progressBarValue.ariaValueNow = `${value}%`;
        progressBarValue.style.width = `${value}%`;

    } catch (error) {
        throw error;
    }
}
/**
 * RENDER AMOUNT GWP
 * @returns VIEW
 */
async function renderTotalGWP() {
    try {
        const req = await getTotalGWP(KANALDISTRIBUSIID);
        const result = req.TotalGWPCurrentYearResult;
        if (!result.Success) {
            throw result.Message;
        }

        const totalGWP = document.querySelector('#totalGWP');
        totalGWP.innerHTML = `IDR ${result.Total}`;

    } catch (error) {
        throw error;
    }
}
/**
 * RENDER AMOUNT ANP
 * @returns VIEW
 */
async function renderTotalANP() {
    try {
        const req = await getTotalANP(KANALDISTRIBUSIID);
        const result = req.TotalANPCurrentYearResult;

        if (!result.Success) {
            throw result.Message;
        }

        const totalGWP = document.querySelector('#totalANP');
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
    const req = await getPerformanceGWP(KANALDISTRIBUSIID);
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
    const req = await getPerformancePerKanal(KANALDISTRIBUSIID);
    const result = req.PerformancePerKanalResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    Highcharts.chart('container2', {
        colors: ['#5f32d3', '#ff8c00'],
        chart:
        {
            zoomType: 'xy'
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
        xAxis: [{
            categories: result.Category,
            crosshair: true,
            labels: {
                style: {
                    textOverflow: 'none'
                }
            }
        }],
        yAxis: [
            { // Primary yAxis
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
            shared: true
        },
        legend: {
            enabled: false,
            align: 'left',
            x: 330,
            verticalAlign: 'top',
            y: -50,
            floating: true,
        },
        series: [
            {
                name: result.Series[0].name,
                type: 'column',
                yAxis: 0,
                data: result.Series[0].data,
                tooltip: {
                    valueSuffix: ' Miliyar'
                }
        
            }, {
                name: result.Series[1].name,
                type: 'column',
                yAxis: 0,
                data: result.Series[1].data,
                tooltip: {
                    valueSuffix: ' Miliyar'
                },
            }
        ]
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

    Highcharts.chart('container3', {
        colors: ['#5f32d3', '#ff8c00'],
        chart: {
            zoomType: 'xy'
        },
        plotOptions: {
            series: {
                dataLabels:
                {
                    enabled: true
                },
                enableMouseTracking: true,
                borderRadiusTopLeft: '8%',
                borderRadiusTopRight: '8%'
            },
            line: {
                dataLabels:
                {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        credits: { enabled: false },
        title: "test",
        xAxis: [{
            categories: result.Category,
            crosshair: true
        }],
        yAxis: [
            { // Primary yAxis
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
            shared: true
        },
        legend: {
            align: 'left',
            enabled: false,
            x: 300,
            verticalAlign: 'top',
            y: 0,
            floating: true,
        },
        series: [{
            name: result.Series[0].name,
            type: 'column',
            yAxis: 0,
            data: result.Series[0].data,
            tooltip: {
                valueSuffix: ' Miliyar'
            }
    
        }, {
            name: result.Series[1].name,
            type: 'column',
            yAxis: 0,
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

        let rows =  `<td>${seqNo++}</td>` +
                    `<td>${item.Name}</td>` +
                    `<td>${item.Item1}</td>` +
                    `<td>${item.Item2}</td>` +
                    `<td>${item.Item3}%</td>` +
                    `<td><div style="background-color: ${progressBarColor(item.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
            let tr = document.createElement('tr');
            tr.innerHTML = rows;
            tbody.appendChild(tr);
        });
    let rowsTotal = `<td></td>` +
                    `<td>TOTAL</td>` +
                    `<td>${result.Total.Item1}</td>` +
                    `<td>${result.Total.Item2}</td>` +
                    `<td>${result.Total.Item3}%</td>` +
                    `<td><div style="background-color: ${progressBarColor(result.Total.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#ff8c00";
    trTotal.style.color = "white";
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
        let rows =  `<td>${seqNo++}</td>` +
                    `<td>${item.Name}</td>` +
                    `<td>${item.Item1}</td>` +
                    `<td>${item.Item2}</td>` +
                    `<td>${item.Item3}$</td>` +
                    `<td><div style="background-color: ${progressBarColor(item.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    let rowsTotal = `<td></td>` +
                    `<td>TOTAL</td>` +
                    `<td>${result.Total.Item1}</td>` +
                    `<td>${result.Total.Item2}</td>` +
                    `<td>${result.Total.Item3}%</td>` +
                    `<td><div style="background-color: ${progressBarColor(result.Total.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#ff8c00";
    trTotal.style.color = "white";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}
/**
 * RENDER LIST DETAIL ARCHIEVEMENT BY PRODUCT
 * @returns VIEW CHART
 */
async function renderListArchievementByProduct() {
    const req = await getArchievementByProduct(KANALDISTRIBUSIID);
    const result = req.ArchievementByProdukResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableDetailAchievementByProduk tbody');
        result.ListItem.forEach(item => {
        let rows =  `<td>${seqNo++}</td>` +
                    `<td>${item.Name}</td>` +
                    `<td>${item.Item1}</td>` +
                    `<td>${item.Item2}</td>` +
                    `<td>${item.Item3}%</td>` +
                    `<td><div style="background-color: ${progressBarColor(item.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
            let tr = document.createElement('tr');
            tr.innerHTML = rows;
            tbody.appendChild(tr);
        });
    let rowsTotal = `<td></td>` +
                    `<td>TOTAL</td>` +
                    `<td>${result.Total.Item1}</td>` +
                    `<td>${result.Total.Item2}</td>` +
                    `<td>${result.Total.Item3}%</td>` +
                    `<td><div style="background-color: ${progressBarColor(result.Total.Item3)};border-radius:50%;width:15px;height:15px;"></div></td>`
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#ff8c00";
    trTotal.style.color = "white";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}
/**
 * HELPER COLOR PROGRESS BAR
 * @returns COLOR
 */
function progressBarColor(amount) {
    let result;

    if (parseFloat(amount) >= 0 && parseFloat(amount) < 25) {
        result = COLORS.BLACK;
    }

    if (parseFloat(amount) >= 25 && parseFloat(amount) < 50) {
        result = COLORS.GREY;
    }

    if (parseFloat(amount) >= 50 && parseFloat(amount) < 75) {
        result = COLORS.YELLOW;
    }

    if (parseFloat(amount) >= 75) {
        result = COLORS.GREEN;
    }

    return result;
}