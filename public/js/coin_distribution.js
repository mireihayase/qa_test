var url = location.pathname;
var url_array = url.split('/');
var coin_id = url_array[url_array.length - 1];

var ratio_label = [];
var ratio_data = [];
var backgroundColor = [
    window.chartColors.red,
    window.chartColors.orange,
    window.chartColors.green,
    window.chartColors.blue,
    window.chartColors.purple,
    window.chartColors.yellow,
];


$.ajax({
    type: "GET",
    url: "/api/coins/distributions/" + coin_id,
    dataType: "json"
}).done(function( data, textStatus, jqXHR){ //成功した場合
    // var ratio_label = [];
    // var ratio_data = [];
    for (let key in data) {
        ratio_label.push(key);
        ratio_data.push( parseInt(data[key], 10));
    }

}).fail(function(jqXHR, textStatus, errorThrown){ //失敗した場合
    console.log("error", jqXHR);
});

    setPieChart(ratio_label, ratio_data);
    setTimeout(function() {
        setDataTable(ratio_label, ratio_data);
    }, 1500);


function setPieChart(label_array, data_array) {
// グラフのタイプとか値とかを設定
    var config = {
        type: "pie",
        data: {
            labels: label_array,
            datasets: [{
                data: data_array,
                backgroundColor: backgroundColor
            }],
        },
        options: {
            responsive: false,
            plugins: {
                datalabels: {
                    align: "end",
                    anchor: "end",
                    // offset: 0,
                    offset: -60,
                    color: "#000",
                    font: {
                        weight: "bold",
                        size: 15,
                    },
                    formatter: (value, ctx) => {
                    let label = ctx.chart.data.labels[ctx.dataIndex];
                    // return label + '\n' + value + '%';
                    return  value + '%';
                    },
                }
            },
            layout: { // 凡例が入りきるように位置調整
                padding: {
                    left: 40, right: 40
                }
            },
            legend: {
                display: false
            }
        }
    };

// チャートの生成
    window.addEventListener("load", function () {
        let ctx = document.getElementById("myChart").getContext("2d");
        setTimeout(function() {
            myChart = new Chart(ctx, config);
        }, 1500);
    }, false);
}

function setDataTable(ratio_label, ratio_data) {
    var data_num = ratio_data.length;

    for(var i = 0; i <  data_num; i++) {
        var $add_li  = $('.distribution_list li:first').clone();
        $add_li.attr('id', 'distribute_li' + i);
        $('<div class=\"distribute_color\" style=\"width: 10%\">　　</div>').appendTo($add_li).css('background-color', backgroundColor[i]);
        $("<div class=\"distribute_name\" style=\"width: 60%\"></div>").appendTo($add_li).text(ratio_label[i]);
        $("<div class=\"distribute_rate\" style=\"width: 17%\"></div>").appendTo($add_li).text(ratio_data[i] + '%');
        $(".distribution_list ul").append($add_li);

    }

}