document.querySelector('.FilterTime').addEventListener('click', () => {
    time = document.querySelector('#AnalyticsDatePicker').value
    window.location.href = window.location.pathname + "?date=" + time;
})

//world chart
var root = am5.Root.new("chartdiv");
countryCodes.forEach(element => {
    element.columnSettings.fill = root.interfaceColors.get('primaryButton');
});
let iller = [];
AnalyticsCitys.forEach(element=>{
    let data = iltoPlaka.filter(e=>{
        return e.il == element[0];
    })
    
    if(data.length >0){
        data = data[0];
        console.log(data);
        let pushValue= {
            id:"TR-"+data.plaka,
            value : element[1],
            columnSettings: { fill: root.interfaceColors.get("primaryButton") }
        }
        iller.push(pushValue)
    }
})
root.setThemes([
    am5themes_Animated.new(root)
]);

var chart = root.container.children.push(am5map.MapChart.new(root, {
    panX: "rotateX"
}));

var worldSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
    geoJSON: am5geodata_worldLow,
    exclude: ["AQ"]
}));

worldSeries.mapPolygons.template.setAll({
    tooltipText: "{name} {value} kişi",
    interactive: true
});

worldSeries.mapPolygons.template.setAll({
    fill: root.interfaceColors.get("secondaryButton"),
    templateField: "columnSettings"
});

worldSeries.mapPolygons.template.events.on("click", function (ev) {
    var country = ev.target.dataItem.get("id");
    var map;
    switch (country) {
        case "TR":
            map = "turkeyLow.json";
            break;
    }
    worldSeries.zoomToDataItem(ev.target.dataItem);
    homeButton.show();
    if (map) {
        am5.net.load("https://cdn.amcharts.com/lib/5/geodata/json/" + map, chart).then(function (result) {
            var geodata = am5.JSONParser.parse(result.response);
            countrySeries.setAll({
                geoJSON: geodata
            });
            countrySeries.data.setAll(iller);
            countrySeries.show();
            worldSeries.hide();
        });
    }
});

worldSeries.data.setAll(countryCodes);
console.log(worldSeries.data);

var countrySeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
    visible: false
}));


countrySeries.mapPolygons.template.setAll({
    tooltipText: "{name} {value} kişi",
    interactive: true
});

countrySeries.mapPolygons.template.setAll({
    fill: root.interfaceColors.get("secondaryButton"),
    templateField: "columnSettings"
});
countrySeries.mapPolygons.template.states.create("hover", {
    fill: root.interfaceColors.get("primaryButton")
});


var homeButton = chart.children.push(am5.Button.new(root, {
    paddingTop: 10,
    paddingBottom: 10,
    x: am5.percent(100),
    centerX: am5.percent(100),
    opacity: 0,
    interactiveChildren: false,
    icon: am5.Graphics.new(root, {
        svgPath: "M16,8 L14,8 L14,16 L10,16 L10,10 L6,10 L6,16 L2,16 L2,8 L0,8 L8,0 L16,8 Z M16,8",
        fill: am5.color(0xffffff)
    })
}));

homeButton.events.on("click", function () {
    chart.goHome();
    worldSeries.show();
    countrySeries.hide();
    homeButton.hide();
});


//browser chart
let browsers = [];
let browserUserCount = []
browserSessions.forEach(element=>{
    browsers.push(element.browser);
    browserUserCount.push(element.sessions)
})
    var browser = { init: function () { !function () {
        var e = document.getElementById("browser"); 
        if (e) {
            var t = KTUtil.getCssVariableValue("--bs-border-dashed-color"), 
            a = { series: [
                { 
                data: browserUserCount, show: !1 }], 
                chart: { type: "bar", height: 350, 
                toolbar: { show: 1 } }, 
                plotOptions: { bar: { borderRadius: 4, horizontal: !0, distributed: !0, barHeight: 27 } }, dataLabels: { enabled: !1 }, legend: { show: !1 }, 
                colors: ["#3E97FF", "#F1416C", "#50CD89", "#FFC700", "#7239EA", "#50CDCD", "#50CDCD"], 
                xaxis: { categories: browsers, 
                labels: { formatter: function (e) { return e  }, style: { colors: KTUtil.getCssVariableValue("--bs-gray-400"), fontSize: "12px", fontWeight: "600", align: "left" } }, 
                axisBorder: { show: !1 } }, 
                yaxis: { labels: { style: { colors: KTUtil.getCssVariableValue("--bs-gray-800"), fontSize: "14px", fontWeight: "600" }, offsetY: 2, align: "left" } }, 
                grid: { borderColor: t, xaxis: { lines: { show: !0 } }, yaxis: { lines: { show: !1 } }, strokeDashArray: 4 } }, 
                r = new ApexCharts(e, a); setTimeout((function () { r.render() }), 300) } }() } };
                "undefined"!=typeof module&&(module.exports=browser),KTUtil.onDOMContentLoaded((function(){browser.init()}));
//device chart
var device = { init: function () { !function () {
    var e = document.getElementById("device"); 
    if (e) {
        var t = KTUtil.getCssVariableValue("--bs-border-dashed-color"), 
        a = { series: [
            { 
            data: [15, 12, 10, 8, 7, 4, 3], show: !1 }], 
            chart: { type: "bar", height: 350, 
            toolbar: { show: !1 } }, 
            plotOptions: { bar: { borderRadius: 4, horizontal: !0, distributed: !0, barHeight: 23 } }, dataLabels: { enabled: !1 }, legend: { show: !1 }, 
            colors: ["#3E97FF", "#F1416C", "#50CD89", "#FFC700", "#7239EA", "#50CDCD"], 
            xaxis: { categories: ["Phones", "Laptops", "Headsets", "Games", "Keyboardsy", "Monitors", "Speakers"], 
            labels: { formatter: function (e) { return e + "K" }, style: { colors: KTUtil.getCssVariableValue("--bs-gray-400"), fontSize: "14px", fontWeight: "600", align: "left" } }, 
            axisBorder: { show: !1 } }, yaxis: { labels: { style: { colors: KTUtil.getCssVariableValue("--bs-gray-800"), fontSize: "14px", fontWeight: "600" }, offsetY: 2, align: "left" } }, 
            grid: { borderColor: t, xaxis: { lines: { show: !0 } }, yaxis: { lines: { show: !1 } }, strokeDashArray: 4 } }, 
            r = new ApexCharts(e, a); setTimeout((function () { r.render() }), 300) } }() } };
            "undefined"!=typeof module&&(module.exports=device),KTUtil.onDOMContentLoaded((function(){device.init()}));




            // saatlik grafik
            let perHour=[];
            let sessionperHour =[];
            hourActivity.sort(function(a, b){
                return  a[0]-b[0]});
            hourActivity.forEach(element =>{
                perHour.push(element[0]+":00");
                sessionperHour.push(element[1]);
            }) 
            console.log(perHour,sessionperHour);

            var hour=document.getElementById("kt_charts_widget_3_chart_"),
            t=(parseInt(KTUtil.css(hour,"height")),
            KTUtil.getCssVariableValue("--bs-gray-500")),
            a=KTUtil.getCssVariableValue("--bs-gray-200"),
            o=KTUtil.getCssVariableValue("--bs-info"),
            s=KTUtil.getCssVariableValue("--bs-light-info");
            hour&&new ApexCharts(hour,{series:[{name:"Kullanıcı",
            data:sessionperHour}],
            chart:{fontFamily:"inherit",type:"area",height:350,toolbar:{show:!1}}
            ,plotOptions:{},
            legend:{show:!1},
            dataLabels:{enabled:!1},
            fill:{type:"solid",opacity:1},
            stroke:{curve:"smooth",show:!0,width:3,colors:[o]},
            xaxis:{categories:perHour,
            axisBorder:{show:!1},axisTicks:{show:!1},labels:{style:{colors:t,fontSize:"12px"}},crosshairs:{position:"front",
            stroke:{color:o,width:1,dashArray:3}},tooltip:{enabled:!0,formatter:void 0,offsetY:0,style:{fontSize:"12px"}}},
            yaxis:{labels:{style:{colors:t,fontSize:"12px"}}},states:{normal:{filter:{type:"none",value:0}},
            hover:{filter:{type:"none",value:0}},active:{allowMultipleDataPointsSelection:!1,filter:{type:"none",value:0}}},
            tooltip:{style:{fontSize:"12px"},
            y:{formatter:function(e){return e}}},
            colors:[s],grid:{borderColor:a,strokeDashArray:4,yaxis:{lines:{show:!0}}},
            markers:{strokeColor:o,strokeWidth:3}}).render();



//ülke başka grafik

// let countryGraph = [];
// countryCodes.forEach(element =>{
//     let data = {
//         "country" : element.id,
//         "visits":parseInt(element.value),
//         "icon":"https://flagcdn.com/64x48/"+element.id.toLowerCase()+".png",
//         "columnSettings":{fill:am5.color(KTUtil.getCssVariableValue("--bs-primary"))},
//     }
//     countryGraph.push(data);
// })

// var KTChartsWidget15_ ={init:function(){!function(){if("undefined"!=typeof am5){
//     var e=document.getElementById("kt_charts_widget_15_chart_");
//         e&&am5.ready((function(){var t=am5.Root.new(e);t.setThemes([am5themes_Animated.new(t)]);
//         var a=t.container.children.push(am5xy.XYChart.new(t,{panX:!1,panY:!1,layout:t.verticalLayout})),
//         r=(a.get("colors"),
//         countryGraph),
//         o=a.xAxes.push(am5xy.CategoryAxis.new(t,{categoryField:"country",renderer:am5xy.AxisRendererX.new(t,{minGridDistance:30}),
//         bullet:function(e,t,a){return am5xy.AxisBullet.new(e,{location:.5,sprite:am5.Picture.new(e,{width:24,height:24,centerY:am5.p50,centerX:am5.p50,src:a.dataContext.icon})})}}));
//         o.get("renderer").labels.template.setAll({paddingTop:20,fontWeight:"400",fontSize:13,fill:am5.color(KTUtil.getCssVariableValue("--bs-gray-500"))}),o.get("renderer").grid.template.setAll({disabled:!0,strokeOpacity:0}),o.data.setAll(r);
//         var i=a.yAxes.push(am5xy.ValueAxis.new(t,{renderer:am5xy.AxisRendererY.new(t,{})}));i.get("renderer").grid.template.setAll({stroke:am5.color(KTUtil.getCssVariableValue("--bs-gray-300")),strokeWidth:1,strokeOpacity:1,strokeDasharray:[3]}),i.get("renderer").labels.template.setAll({fontWeight:"400",fontSize:13,fill:am5.color(KTUtil.getCssVariableValue("--bs-gray-500"))});
//         var s=a.series.push(am5xy.ColumnSeries.new(t,{xAxis:o,yAxis:i,valueYField:"visits",categoryXField:"country"}));
//         s.columns.template.setAll({tooltipText:"{categoryX}: {valueY}",tooltipY:0,strokeOpacity:0,templateField:"columnSettings"}),s.columns.template.setAll({strokeOpacity:0,cornerRadiusBR:0,cornerRadiusTR:6,cornerRadiusBL:0,cornerRadiusTL:6}),s.data.setAll(r),s.appear(),a.appear(1e3,100)}))}}()}};
//         "undefined"!=typeof module&&(module.exports=KTChartsWidget15_),KTUtil.onDOMContentLoaded((function(){KTChartsWidget15_.init()}));

        