<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script type="text/javascript"
        src="https://github.com/nagix/chartjs-plugin-colorschemes/releases/download/v0.2.0/chartjs-plugin-colorschemes.min.js"></script>

    <title>PIS</title>
</head>

<body>
    <!-- ć±ééšć -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top" id="header">
        <a class="navbar-brand" href="/">TOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <form class="form-inline my-2 my-lg-0">
                    <input name="search_keyword" class="form-control mr-sm-2">
                    <button type="submit" class="btn btn-outline-success my-2 my-sm-0">æ€çŽą</button>
                </form>
            </ul>
        </div>
    </nav>

    <main class="py-4" id="main">

        <!-- index -->
        <div id="index">
            <canvas id="top-price-products"></canvas>
            <canvas id="all-products-price-trends"></canvas>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle float-right" type="button"
                    data-toggle="dropdown">äžŠăłæżă</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="?sort=average_price-desc">ćčłćäŸĄæ Œ(éé )</a>
                    <a class="dropdown-item" href="?sort=average_price-asc">ćčłćäŸĄæ Œ(æé )</a>
                    <a class="dropdown-item" href="?sort=change_rate-desc">ć€ćç(éé )</a>
                    <a class="dropdown-item" href="?sort=change_rate-asc">ć€ćç(æé )</a>
                    <a class="dropdown-item" href="?sort=card_number-oldest_to_latest">ă«ăŒăăăłăăŒ(ć€âæ°)</a>
                    <a class="dropdown-item" href="?sort=card_number-latest_to_oldest">ă«ăŒăăăłăăŒ(æ°âć€)</a>
                </div>
            </div>

            <table class="table table-bordered">
                <caption>äžèŠ§</caption>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ă©ăłăŻ</th>
                        <th scope="col">ç»ć</th>
                        <th scope="col">ćčłćäŸĄæ Œ</th>
                        <th scope="col">ć€ćç</th>
                        <!--<th scope="col">ăăă·ă§ăłć</th>-->
                        <th scope="col">ă«ăŒăçȘć·</th>
                        <!--<th scope="col">ăŹăąăȘăăŁ</th>-->
                        <!--<th scope="col">æ©çšźć</th>-->

                    </tr>
                    <thead>
                    <tbody>
                        <!-- js -->
                    </tbody>
            </table>
        </div>

        <!-- card_number -->
        <div id="card-number">
            <canvas id="price-chart"></canvas>

            <h1>ă©ăŻă</h1>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ă©ăŻă</th>
                        <th scope="col">ç»ć</th>
                        <th scope="col">äŸĄæ Œ</th>
                        <th scope="col">ăżă€ăă«</th>
                        <th scope="col">at</th>
                        <th scope="col">status</th>
                    </tr>
                    <thead>
                    <tbody id="rakuma-products">
                        <!-- js -->
                    </tbody>
            </table>

            <h1>ă€ăăȘăŻ</h1>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ă€ăăȘăŻ</th>
                        <th scope="col">ç»ć</th>
                        <th scope="col">äŸĄæ Œ</th>
                        <th scope="col">ăżă€ăă«</th>
                        <th scope="col">at</th>
                        <th scope="col">status</th>
                    </tr>
                    <thead>
                    <tbody id="yafuoku-products">
                        <!-- js -->
                    </tbody>
            </table>
        </div>

        <!-- search_keyword -->
        <div id="search-keyword">

        </div>








        <script>

            function isSmartPhone() {
                if (navigator.userAgent.match(/iPhone|Android.+Mobile/)) {
                    return true;
                } else {
                    return false;
                }
            }

            function getDateArray() {
                const start = new Date("2020-07-06");
                const today = new Date();
                let dateArray = [];
                for (let d = start; d < today; d.setDate(d.getDate() + 1)) {
                    dateArray.push(`${d.getMonth() + 1}/${d.getDate()}`);
                }
                return dateArray;
            }

            function getVerticalLineArray(baseHorizontalLineArray, actualHorizontalLineArray, recordArray) {
                let verticalLineArray = [];
                let index
                baseHorizontalLineArray.forEach(function (date) {
                    index = actualHorizontalLineArray.indexOf(date);
                    if (index !== -1) {
                        verticalLineArray.push(recordArray[index]['average_price']);
                    } else {
                        verticalLineArray.push(null);
                    }
                });
                return verticalLineArray;
            }

            function getCreatedAtArray(histories) {
                let productHistoriesCreatedAtArray = [];
                histories.forEach(function (history) {
                    let createdAt = new Date(history['created_at']);
                    productHistoriesCreatedAtArray.push(
                        `${createdAt.getMonth() + 1}/${createdAt.getDate()}`);
                });
                return productHistoriesCreatedAtArray;
            }

            function getRegressionLine(horizontalLineArray, verticalLineArray) {
                let startRegressionLineIndex = -1;
                let endRegressionLineIndex = -1;
                let jjj = 0;
                verticalLineArray.forEach(function (verticalLine) {
                    if (verticalLine !== null && startRegressionLineIndex === -1) {
                        startRegressionLineIndex = jjj;
                    }
                    if (verticalLine !== null) {
                        endRegressionLineIndex = jjj;
                    }
                    jjj++;
                });
                const RegressionLineDataNum = endRegressionLineIndex
                    - startRegressionLineIndex + 1;
                const horizontalLineArrayNum = horizontalLineArray.length;
                console.log(horizontalLineArrayNum);

                let xAverage = 0;
                let yAverage = 0;
                let xyAverage = 0;
                let xSquareAverage = 0;

                for (let i = startRegressionLineIndex; i <= endRegressionLineIndex; i++) {
                    console.log(1);
                    if (verticalLineArray[i] !== null) {
                        xAverage += (i / RegressionLineDataNum);
                        yAverage += (verticalLineArray[i] / RegressionLineDataNum);
                        xyAverage += ((i * verticalLineArray[i])
                            / RegressionLineDataNum);
                        xSquareAverage += (i ** 2 / RegressionLineDataNum);
                        console.log(2);
                    }
                }

                const slope = (xyAverage - xAverage * yAverage) /
                    (xSquareAverage - xAverage ** 2);
                const yIntercept = - slope * xAverage + yAverage;

                console.log(slope);
                let regressionLine = [];
                for (let i = 0; i < horizontalLineArrayNum; i++) {
                    if (startRegressionLineIndex <= i && i <= endRegressionLineIndex) {
                        regressionLine.push(yIntercept + slope * i);
                    } else {
                        regressionLine.push(null);
                    }
                }
                return regressionLine;
            }


            const width = screen.width;
            const height = screen.height;
            const cardImg = document.getElementsByTagName('img');
            for (let i = 0; i < cardImg.length; i++) {
                if (isSmartPhone()) {
                    cardImg[i].style.width = `${width / 7} px`;
                    cardImg[i].style.height = 'out';
                } else {
                    cardImg[i].style.width = `${width / 10} px`;
                    cardImg[i].style.height = 'out';
                }
            }

            const topPriceProductsContext
                = document.getElementById('top-price-products').getContext('2d');
            const allProductsPriceTrendsContext
                = document.getElementById('all-products-price-trends').getContext('2d');
            if (isSmartPhone()) {
                topPriceProductsContext.canvas.height = height / 2;
                allProductsPriceTrendsContext.canvas.height = height / 2;
            }
            const main = document.getElementById('main');
            const header_height = document.getElementById('header').clientHeight;
            main.style.position = 'relative';
            main.style.top = `${header_height}px`;

            url_param_key = location.search.replace('?', '').split('=')[0];
            url_param_value = location.search.split('=')[1];


            // index page
            if (location.search === '' || url_param_key === 'sort') {
                $('#index').show()
                $('#card-number').hide();
                $('#search-keyword').hide();
                $.getJSON('products.json', (data) => {
                    let displayDataNum;
                    switch (url_param_value) {
                        case 'average_price-desc':
                            data.sort(function (a, b) {
                                return (a.average_price > b.average_price) ? -1 : 1;
                            });
                            displayDataNum = 50;
                            break;
                        case 'average_price-asc':
                            data.sort(function (a, b) {
                                return (a.average_price < b.average_price) ? -1 : 1;
                            });
                            displayDataNum = 50;
                            break;
                        case 'change_rate-desc':
                            data.sort(function (a, b) {
                                return (a.change_rate > b.change_rate) ? -1 : 1;
                            });
                            displayDataNum = 50;
                            break;
                        case 'change_rate-asc':
                            data.sort(function (a, b) {
                                return (a.change_rate < b.change_rate) ? -1 : 1;
                            });
                            displayDataNum = 50;
                            break;
                        case 'card_number-oldest_to_latest':
                            var oldestToLatestMissionList = ['H', 'HG', 'HJ', 'HGD', 'SH', 'UM', 'BM'];
                            var oldestToLatestProductList = [];
                            oldestToLatestMissionList.forEach(function (mission) {
                                data.forEach(function (product) {
                                    if (product['mission'] === mission) {
                                        oldestToLatestProductList.push(product);
                                    }
                                })
                            });
                            data = oldestToLatestProductList;
                            console.log(data.length);
                            displayDataNum = data.length;
                            break;
                        case 'card_number-latest_to_oldest':
                            var oldestToLatestMissionList = ['H', 'HG', 'HJ', 'HGD', 'SH', 'UM', 'BM'];
                            var oldestToLatestProductList = [];
                            oldestToLatestMissionList.forEach(function (mission) {
                                data.forEach(function (product) {
                                    if (product['mission'] === mission) {
                                        oldestToLatestProductList.push(product);
                                    }
                                })
                            });
                            data = oldestToLatestProductList.reverse();
                            displayDataNum = data.length;
                            break;
                        default:
                            data.sort(function (a, b) {
                                return (a.average_price > b.average_price) ? -1 : 1;
                            });
                            displayDataNum = 50;
                            break;
                    }

                    let x = [];
                    let y = [];
                    for (let i = 0; i < displayDataNum; i++) {
                        x.push(data[i]['product_id']);
                        y.push(data[i]['average_price']);
                        if (data[i]['model'] == 'DBH') {
                            url = `http://carddass.com/dbh/image/cardlist/dummys`
                                + `/${data[i]['product_id'].replace('+PR', '').replace('+', '')}.jpg`;
                        } else {
                            url = `http://carddass.com/dbh/sdbh_bm/images/cardlist/dummys`
                                + `/${data[i]['product_id'].replace('+PR', '').replace('+', '')}.png`;
                        }
                        $('tbody').append(
                            `<tr><th scope="row">${i + 1}</th>`
                            + `<td><a href="?card_number=${data[i]["product_id"]}"><img src=${url}></a></td>`
                            + `<td>${data[i]['average_price']}</td>`
                            + `<td>${data[i]['change_rate']}</td>`
                            + `<td>${data[i]['product_id']}</td>`
                            + `</tr>`
                        );
                    }

                    const topPriceProducts = new Chart(topPriceProductsContext, {
                        type: 'line',
                        data: {
                            labels: x,
                            datasets: [{
                                data: y,
                                backgroundColor: "rgba(0,0,0,0)"
                            }]
                        }
                    });

                    /*
                    const allProductsPriceTrends = new Chart(allProductsPriceTrendsContext, {
                        type: 'line',
                        data: {
                            labels: @json($horizontal_line_date),
                    datasets: @json($vertical_line_average_price['yafuoku'])
                    },
                    })         
                    */
                })

            }


            // card-number page
            if (url_param_key === 'card_number') {
                $('#index').hide();
                $('#card-number').show();
                $('#search-keyword').hide();
                $.getJSON('products.json', (cards) => {
                    const target = cards.find((card) => {
                        return (card.product_id === url_param_value);
                    });
                    card_id = target['id'];
                    $.getJSON('histories.json', (allHistories) => {
                        let histories = [];
                        histories['yafuoku'] = allHistories.filter((history) => {
                            return (history.product_id === card_id
                                && history.flea_market_name === 'yafuoku'
                                && (history.sample_num === 10 || history.sample_num === 0));
                        });
                        histories['rakuma'] = allHistories.filter((history) => {
                            return (history.product_id === card_id
                                && history.flea_market_name === 'rakuma'
                                && (history.sample_num === 10 || history.sample_num === 0));
                        });


                        // éćăăŒăżăććž°çŽç·ăæ±ăă

                        const times = getDateArray();
                        let historiesCreatedAtArray = [];
                        let averagePrices = [];
                        let regressionLineArray = [];
                        historiesCreatedAtArray['yafuoku'] = getCreatedAtArray(histories['yafuoku']);
                        historiesCreatedAtArray['rakuma'] = getCreatedAtArray(histories['rakuma']);
                        averagePrices['yafuoku'] = getVerticalLineArray(
                            times, historiesCreatedAtArray['yafuoku'], histories['yafuoku']);
                        averagePrices['rakuma'] = getVerticalLineArray(
                            times, historiesCreatedAtArray['rakuma'], histories['rakuma']);
                        regressionLineArray['yafuoku'] = getRegressionLine(times, averagePrices['yafuoku']);
                        regressionLineArray['rakuma'] = getRegressionLine(times, averagePrices['rakuma']);
                        console.log(regressionLineArray);

                        const ctx = document.getElementById('price-chart').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: getDateArray(),
                                datasets: [
                                    {
                                        label: 'ă€ăăȘăŻ',
                                        data: averagePrices['yafuoku'],
                                        fill: false,
                                    },
                                    {
                                        label: 'ă©ăŻă',
                                        data: averagePrices['rakuma'],
                                        fill: false,
                                    },
                                    {
                                        label: 'ă€ăăȘăŻććž°çŽç·',
                                        data: regressionLineArray['yafuoku'],
                                        pointRadius: 0,
                                        pointHitRadius: 0,
                                        fill: false,
                                    },
                                    {
                                        label: 'ă©ăŻăććž°çŽç·',
                                        data: regressionLineArray['rakuma'],
                                        pointRadius: 0,
                                        pointHitRadius: 0,
                                        fill: false,
                                    }
                                ]
                            }
                        });
                    });
                    $.getJSON('history_details.json', (all_history_details) => {
                        let history_details = [];
                        history_details['yafuoku'] = all_history_details.filter((history_detail) => {
                            return (history_detail.product_id === card_id
                                && history_detail.flema === 'yafuoku');
                        });
                        history_details['rakuma'] = all_history_details.filter((history_detail) => {
                            return (history_detail.product_id === card_id
                                && history_detail.flema === 'rakuma');
                        });

                        history_details['yafuoku'].forEach(function (history_detail, yafuoku_index) {
                            $('#yafuoku-products').append(
                                `<tr><th scope="row">${yafuoku_index + 1}</th>`
                                + `<td><a href=${history_detail['url']}><img src=${history_detail['img_url']}></a></td>`
                                + `<td>${history_detail['price']}</td>`
                                + `<td>${history_detail['title']}</td>`
                                + `<td>${history_detail['created_at']}</td>`
                                + `<td>${history_detail['status']}</td>`
                                + `</tr>`
                            );
                        });

                        history_details['rakuma'].forEach(function (history_detail, rakuma_index) {
                            $('#rakuma-products').append(
                                `<tr><th scope="row">${rakuma_index + 1}</th>`
                                + `<td><a href=${history_detail['url']}><img src=${history_detail['img_url']}></a></td>`
                                + `<td>${history_detail['price']}</td>`
                                + `<td>${history_detail['title']}</td>`
                                + `<td>${history_detail['created_at']}</td>`
                                + `<td>${history_detail['status']}</td>`
                                + `</tr>`
                            );
                        });
                    });
                });
            }

            /*
                        $('#header > a').click(function () {
                            new URL(location);
                        })
            */
            if (url_param_key === 'search_keyword') {
                $('#index').hide();
                $('#card-number').hide();
                $('#search-keyword').show();
                $.getJSON('products.json', (all_products) => {
                    all_products.forEach(function (product) {

                        if (decodeURIComponent(url_param_value).match(new RegExp(product['name'])) !== null
                            || decodeURIComponent(url_param_value).match(new RegExp(product['product_id'])) !== null) {
                            if (product['model'] == 'DBH') {
                                url = `http://carddass.com/dbh/image/cardlist/dummys`
                                    + `/${product['product_id'].replace('+PR', '').replace('+CP', '')}.jpg`;
                            } else {
                                url = `http://carddass.com/dbh/sdbh_bm/images/cardlist/dummys`
                                    + `/${product['product_id'].replace('+PR', '').replace('+CP', '')}.png`;
                            }
                            $('#search-keyword').append(
                                `<a href="?card_number=${product["product_id"]}">`
                                + `<img src=${url}></a>`
                            );
                        }
                    });
                });
            }
            $('#header button').click(function () {

                console.log($('#header input').val());
            })

        </script>
    </main>

</body>

</html>