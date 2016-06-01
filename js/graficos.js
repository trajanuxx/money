

function gerarGraficoPizza(id, title, dados) {

    /*
     * Exemplo de uso
     
     
     var data = [{name: 'M',
     y: 56.33,
     clicar:'gerarColuna("#bancos", "dados", categoria, serie)'
     }, {
     name: 'Chrome',
     y: 24.03
     
     }, {
     name: 'Firefox',
     y: 10.38
     }, {
     name: 'Safari',
     y: 4.77
     }, {
     name: 'Opera',
     y: 0.91
     }, {
     name: 'Proprietary or Undetectable',
     y: 0.2
     }];
     
     var data1 = [{name: 'M',
     y: 56.33,
     clicar:'gerarGraficoPizza(id, title,dados)'
     }, {
     
     name: 'Proprietary or Undetectable',
     y: 0.2
     }];
     
     gerarGraficoPizza("#bancos", "Geral Entradas e Saidas", data);
     
     
     * 
     * 
     */

    $(id).highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            zoomType: 'xy'
        },
        title: {
            text: title
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br> Quantidade:<b>  {point.quantidade} </b><br>Valor: R$ {point.valor}'
        },
        plotOptions: {
            cursor: 'pointer',
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                events: {
                    click: function (obj) {
                       // console.log(this);
                        //console.log(obj.point.name);
                       eval(obj.point.clicar);
                    }
                },
                dataLabels: {
                    enabled: true,
                    format: '{point.name} {point.percentage:.1f} % ',
                    style: {
                        'color': 'black',
                        'overflow': 'hidden',
                        'text-overflow': 'ellipsis',
                        'display': '-webkit-box',
                        'line-height': '16px',
                        'max-height': '32px',
                        '-webkit-line-clamp': '1',
                        '-webkit-box-orient': 'vertical',
                        'width': '300px'

                    }
                }
            },
        },
        series: [{
                name: 'Porcentagem',
                colorByPoint: true,
                data: dados
            }]
    });
}

function gerarColuna(id, titulo, categorias, serie) {

    /* exemplo de uso
     * 
     var categoria = [
     'Jan',
     'Feb',
     'Mar',
     'Apr',
     'May',
     'Jun',
     'Jul',
     'Aug',
     'Sep',
     'Oct',
     'Nov',
     'Dec'
     ];
     
     var serie = [{
     name: 'Tokyo',
     data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
     clicar: 'alert(obj.point.category+" - "+obj.point.series.name)'         
     
     
     }];
     
     ;
     
     gerarColuna("#bancos", "dados", categoria, serie)
     
     */

    $(id).highcharts({
        chart: {
            type: 'column',
            zoomType: 'xy'
        },
        title: {
            text: titulo
        },
        xAxis: {
            categories: categorias,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Valores em R$'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>R$ {point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            points: {
                events: {
                    click: function (obj) {
                        console.log(obj);
                    }
                }
            },
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
                events: {
                    click: function (obj) {
                        eval(obj.point.series.options.clicar);
                    }

                }
            }
        },
        series: serie
    });


}

function gerarLinhas(id, categorias, title, series) {
  $('#'+id).highcharts({
        title: {
            text: title,
            x: -20 //center
        },
 
        xAxis: {
            categories: categorias
        },

        tooltip: {
            valuepreffix: 'R$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series:series
    });
}







