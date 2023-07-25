var KANALDISTRIBUSIID = localStorage['kanalDistribusiId_QuotationDashboard'];
var STARTDATE = localStorage['startDate'];
var ENDDATE = localStorage['endDate'];

document.addEventListener('DOMContentLoaded', function () {
    init();
});

const content = document.getElementById('filterRange');
var element = document.querySelector('ul.ranges > li.active');
const append = () => content.innerText += ' change';
content.addEventListener('DOMSubtreeModified', () => {
    const data = content.innerText;
    const splitRange = data.split(" - ");
    localStorage['startDate'] = splitRange[0];
    localStorage['endDate'] = splitRange[1];
    console.log(element);
});

async function init() {
    try {
        renderFilter();
        renderQuotationOnProgress();
        renderQuotationClosedWon();
        renderQuotationLoss();
        // Chart
        renderChartQuotationByStatus();
        renderChartQuotationByType();
        renderQuotationBySLA();
        renderQuotationByMonth();
        // List
        renderListQuotationByPolis();
        renderListQuotationByType();
        renderListQuotationBySLA();
        renderListQuotationByMonth();
        renderDate();

    } catch (error) {
        throw error;
    }
}

function renderDate() {
    if (STARTDATE != null && ENDDATE) {
        content.innerText = `${STARTDATE} - ${ENDDATE}`;
    }
}

function onChangeKanalDistribusi() {
    const kanalDistribusiId = document.getElementById("kanalDistribusi").value;
    localStorage['kanalDistribusiId_QuotationDashboard'] = kanalDistribusiId;
    // window.location = `${APP_URL}/dashboard/view/quotationDashboard`;
}

function onRefresh() {
    window.location = `${APP_URL}/dashboard/view/quotationDashboard`;
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
 * GET TOTAL QUOTATION ON PROGRESS
 * @returns RESPONSE
 */
async function getTotalQuotationOnProgress() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-quotation-on-progress?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                StartDate: STARTDATE,
                EndDate: ENDDATE,
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
 * GET TOTAL QUOTATION CLOSED WON
 * @returns RESPONSE
 */
async function getTotalQuotationClosedWon() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-quotation-close-won?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                StartDate: STARTDATE,
                EndDate: ENDDATE,
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
 * GET TOTAL QUOTATION LOSS
 * @returns RESPONSE
 */
async function getTotalQuotationLoss() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-quotation-loss?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                StartDate: STARTDATE,
                EndDate: ENDDATE,
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
 * GET TOTAL QUOTATION BY STATUS
 * @returns RESPONSE
 */
async function getTotalQuotationByStatus() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-quotation-by-status?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                StartDate: STARTDATE,
                EndDate: ENDDATE,
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
 * GET TOTAL QUOTATION BY TYPE
 * @returns RESPONSE
 */
async function getTotalQuotationByType() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-quotation-by-type?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                StartDate: STARTDATE,
                EndDate: ENDDATE,
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
 * GET TOTAL QUOTATION BY SLA
 * @returns RESPONSE
 */
async function getTotalQuotationBySLA() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-total-quotation-by-sla?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                StartDate: STARTDATE,
                EndDate: ENDDATE,
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
 * GET TOTAL QUOTATION BY MONTH
 * @returns RESPONSE
 */
async function getQuotationByMonth() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-quotation-status-by-month?SecretKey=${SECRET_KEY}`, {
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
 * GET TOTAL QUOTATION BY POLIS
 * @returns RESPONSE
 */
async function getListQuotationByPolis() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-quotation-list-by-polis?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                StartDate: STARTDATE,
                EndDate: ENDDATE,
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
 * GET TOTAL QUOTATION BY POLIS
 * @returns RESPONSE
 */
async function getListQuotationByType() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-quotation-list-by-type?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                StartDate: STARTDATE,
                EndDate: ENDDATE,
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
 * GET TOTAL QUOTATION BY POLIS
 * @returns RESPONSE
 */
async function getListQuotationBySLA() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-quotation-list-by-sla?SecretKey=${SECRET_KEY}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                StartDate: STARTDATE,
                EndDate: ENDDATE,
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
 * GET TOTAL QUOTATION BY POLIS
 * @returns RESPONSE
 */
async function getListQuotationByMonth() {
    try {
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/get-quotation-list-by-month?SecretKey=${SECRET_KEY}`, {
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
 * RENDER CARD QUOTATION ON PROGRESS
 * @returns VIEW
 */
async function renderQuotationOnProgress() {
    try {
        const req = await getTotalQuotationOnProgress();
        const result = req.TotalQuotationOnProgressResult;
        if (!result.Success) {
            throw result.Message;
        }

        const totalGWPQuotationOnProgress = document.querySelector('#totalGWPQuotationOnProgress');
        totalGWPQuotationOnProgress.innerHTML = `IDR ${result.Total}`;

        const totalRecordQuotationOnProgress = document.querySelector('#totalRecordQuotationOnProgress');
        totalRecordQuotationOnProgress.innerHTML = `TOTAL NUMBER QUOTATION: ${result.TotalRecord}`;

    } catch (error) {
        throw error;
    }
}
/**
 * RENDER CARD QUOTATION CLOSED WON
 * @returns VIEW
 */
async function renderQuotationClosedWon() {
    try {
        const req = await getTotalQuotationClosedWon();
        const result = req.TotalQuotationClosedWonResult;
        if (!result.Success) {
            throw result.Message;
        }

        const totalGWPQuotationClosedWon = document.querySelector('#totalGWPQuotationClosedWon');
        totalGWPQuotationClosedWon.innerHTML = `IDR ${result.Total}`;

        const totalRecordQuotationClosedWon = document.querySelector('#totalRecordQuotationClosedWon');
        totalRecordQuotationClosedWon.innerHTML = `TOTAL NUMBER QUOTATION: ${result.TotalRecord}`;

    } catch (error) {
        throw error;
    }
}
/**
 * RENDER CARD QUOTATION CLOSED WON
 * @returns VIEW
 */
async function renderQuotationLoss() {
    try {
        const req = await getTotalQuotationLoss();
        const result = req.TotalQuotationLossResult;
        if (!result.Success) {
            throw result.Message;
        }

        const totalGWPQuotationLoss = document.querySelector('#totalGWPQuotationLoss');
        totalGWPQuotationLoss.innerHTML = `IDR ${result.Total}`;

        const totalRecordQuotationLoss = document.querySelector('#totalRecordQuotationLoss');
        totalRecordQuotationLoss.innerHTML = `TOTAL NUMBER QUOTATION: ${result.TotalRecord}`;

    } catch (error) {
        throw error;
    }
}
/**
 * RENDER PERFORMANCE GWP
 * @returns VIEW CHART
 */
async function renderChartQuotationByStatus() {
    const req = await getTotalQuotationByStatus();
    const result = req.TotalQuotationByStatausResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    Highcharts.chart('container1', {
        colors: ['#5f32d3', '#ff8c00', '#ff8c00'],
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
                    categories: ['ON-PROGRESS', 'WIN', 'LOSS/LAPSED'],
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
                        valueSuffix: ' PROPOSAL'
                    }
                },
                {
                    name: result.Series[1].name,
                    type: 'column',
                    yAxis: 0,
                    data: result.Series[1].data,
                    tooltip:
                    {
                        valueSuffix: ' PROPOSAL'
                    },
                },
            ]
    });
}
/**
 * RENDER PERFORMANCE GWP By KANAL
 * @returns VIEW CHART
 */
async function renderChartQuotationByType() {
    const req = await getTotalQuotationByType();
    const result = req.TotalQuotationByTypeResult;

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
                    valueSuffix: ' PROPOSAL'
                }

            }, {
                name: result.Series[1].name,
                type: 'column',
                yAxis: 0,
                data: result.Series[1].data,
                tooltip: {
                    valueSuffix: ' PROPOSAL'
                },
            }
        ]
    });
}
/**
 * RENDER PERFORMANCE GWP By PRODUCT
 * @returns VIEW CHART
 */
async function renderQuotationBySLA() {
    const req = await getTotalQuotationBySLA();
    const result = req.TotalQuotationBySLAResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    Highcharts.chart('container3', {
        colors: ['#5f32d3', '#ff8c00', '#16aaff'],
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
            enabled: true,
            x: 300,
            verticalAlign: 'top',
            y: 0,
            floating: true,
        },
        series: [
            {
                type: 'pie',
                innerSize: "70%",
                yAxis: 0,
                data: [
                    {
                        name: result.data[0].Name,
                        y: result.data[0].Total

                    },
                    {
                        name: result.data[1].Name,
                        y: result.data[1].Total

                    },
                    {
                        name: result.data[2].Name,
                        y: result.data[2].Total

                    }
                ],
                tooltip: {
                    valueSuffix: ' Miliyar'
                }

            }]
    });
}
/**
 * RENDER PERFORMANCE GWP By PRODUCT
 * @returns VIEW CHART
 */
async function renderQuotationByMonth() {
    const req = await getQuotationByMonth();
    const result = req.QuotationStatusByMonthResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    Highcharts.chart('container4', {
        colors: ['#5f32d3', '#ff8c00', '#16aaff'],
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
                    type: 'line',
                    yAxis: 0,
                    data: result.Series[0].data,
                    tooltip:
                    {
                        valueSuffix: ' PROPOSAL'
                    }
                },
                {
                    name: result.Series[1].name,
                    type: 'line',
                    yAxis: 0,
                    data: result.Series[1].data,
                    tooltip:
                    {
                        valueSuffix: ' PROPOSAL'
                    },
                },
                {
                    name: result.Series[2].name,
                    type: 'line',
                    yAxis: 0,
                    data: result.Series[2].data,
                    tooltip:
                    {
                        valueSuffix: ' PROPOSAL'
                    },
                },
            ]
    });
}
/**
 * RENDER LIST DETAIL QUOTATION BY POLIS
 * @returns VIEW CHART
 */
async function renderListQuotationByPolis() {
    const req = await getListQuotationByPolis();
    const result = req.QuotationListByPolisStatusResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableDetailQuotationByPolis tbody');
    result.ListItem.forEach(item => {
        let rows = `<td class="text-center">${seqNo++}</td>` +
            `<td>${item.Name}</td>` +
            `<td class="text-center">${item.Item1}</td>` +
            `<td class="text-center">${item.Item2}</td>` +
            `<td class="text-center">${item.Item3}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    let rowsTotal =
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center"></td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">TOTAL</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center" >${result.Total.Item1}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center" >${result.Total.Item2}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center" >${result.Total.Item3}</td>`
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#ff8c00";
    trTotal.style.color = "white";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}
/**
 * RENDER LIST DETAIL QUOTATION BY TYPE
 * @returns VIEW CHART
 */
async function renderListQuotationByType() {
    const req = await getListQuotationByType();
    const result = req.QuotationListByTypeResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableDetailQuotationByType tbody');
    result.ListItem.forEach(item => {
        let rows = `<td class="text-center">${seqNo++}</td>` +
            `<td>${item.Name}</td>` +
            `<td class="text-center">${item.Item1}</td>` +
            `<td class="text-center">${item.Item2}</td>` +
            `<td class="text-center">${item.Item3}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    let rowsTotal =
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center"></td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">TOTAL</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center" >${result.Total.Item1}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center" >${result.Total.Item2}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center" >${result.Total.Item3}</td>`
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#ff8c00";
    trTotal.style.color = "white";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}
/**
 * RENDER LIST DETAIL QUOTATION BY SLA
 * @returns VIEW CHART
 */
async function renderListQuotationBySLA() {
    const req = await getListQuotationBySLA();
    const result = req.QuotationListBySLAResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableDetailQuotationBySLA tbody');
    result.ListItem.forEach(item => {
        let rows =
            `<td class="text-center">${seqNo++}</td>` +
            `<td>${item.Name}</td>` +
            `<td class="text-center">${item.Item1}</td>` +
            `<td class="text-center">${item.Item2}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    let rowsTotal =
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center"></td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">TOTAL</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item1}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item2}</td>`
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#ff8c00";
    trTotal.style.color = "white";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}
/**
 * RENDER LIST DETAIL QUOTATION BY MONTH
 * @returns VIEW CHART
 */
async function renderListQuotationByMonth() {
    const req = await getListQuotationByMonth();
    const result = req.QuotationListByMonthResult;

    if (!result.Status.Success) {
        throw result.Message;
    }

    let seqNo = 1;
    const tbody = document.querySelector('#tableDetailQuotationByMonth tbody');
    result.ListItem.forEach(item => {
        let rows = `<td class="text-center">${seqNo++}</td>` +
            `<td>${item.Name}</td>` +
            `<td class="text-center">${item.Item1}</td>` +
            `<td class="text-center">${item.Item2}</td>` +
            `<td class="text-center">${item.Item3}</td>` +
            `<td class="text-center">${item.Item4}</td>` +
            `<td class="text-center">${item.Item5}</td>` +
            `<td class="text-center">${item.Item6}</td>` +
            `<td class="text-center">${item.Item7}</td>` +
            `<td class="text-center">${item.Item8}</td>` +
            `<td class="text-center">${item.Item9}</td>` +
            `<td class="text-center">${item.Item10}</td>` +
            `<td class="text-center">${item.Item11}</td>` +
            `<td class="text-center">${item.Item12}</td>`
        let tr = document.createElement('tr');
        tr.innerHTML = rows;
        tbody.appendChild(tr);
    });
    let rowsTotal =
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center"></td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">TOTAL</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item1}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item2}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item3}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item4}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item5}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item6}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item7}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item8}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item9}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item10}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item11}</td>` +
        `<td style="background-color: #16aaff; color: white; font-wigth: bold" class="text-center">${result.Total.Item12}</td>`
    let trTotal = document.createElement('tr');
    trTotal.style.backgroundColor = "#ff8c00";
    trTotal.style.color = "white";
    trTotal.style.fontWeight = "bold";
    trTotal.innerHTML = rowsTotal;
    tbody.appendChild(trTotal);
}