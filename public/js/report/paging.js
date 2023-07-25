// var current_page = 1;
// var records_per_page = 1;

// async function prevPage()
// {
//     if (current_page > 1) {
//         current_page--;
//         await changePage(current_page);
//         localStorage['Page_Number_Report'] = current_page;
//         console.log(localStorage['Page_Number_Report']);
//     }
// }

// async function nextPage()
// {
//     if (current_page < await numPages()) {
//         current_page++;
//         await changePage(current_page);
        
//         localStorage['Page_Number_Report'] = current_page;
//         console.log(localStorage['Page_Number_Report']);
//       //  reload();
//     }
// }

// async function changePage(page)
// {
//     var btn_next = document.getElementById("btn_next");
//     var btn_prev = document.getElementById("btn_prev");
//     var listing_table = document.getElementById("listingTable");
//     var page_span = document.getElementById("page");

//     // Validate page
//     if (page < 1) page = 1;
//     if (page > await numPages()) page = await numPages();

//     listing_table.innerHTML = "";

//     page_span.innerHTML = page + "/" + await numPages();

//     if (page == 1) {
//         btn_prev.style.visibility = "hidden";
//     } else {
//         btn_prev.style.visibility = "visible";
//     }

//     if (page == await numPages()) {
//         btn_next.style.visibility = "hidden";
//     } else {
//         btn_next.style.visibility = "visible";
//     }
// }



// async function numPages()
// {
//     const req = await getRekapGwpTotal();
//     const result = req.RekapGWPBuTotalResult;

//     return Math.ceil(result.TotalData / records_per_page);
// }

// window.onload =  function() {
//     changePage(1);
// };
